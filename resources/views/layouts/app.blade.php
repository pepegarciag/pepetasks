<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link href="{{ asset('css/bootstrap-switch.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jqCron.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sweetalert.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/bootstrap-switch.js') }}"></script>
    <script src="{{ asset('js/jqCron.js') }}"></script>
    <script src="{{ asset('js/jqCron.es.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script>
        $(function() {
            $("input[type='checkbox']").bootstrapSwitch({
                size: 'mini'
            });

            $("table.events .edit-event").on('click', function(){
                $("#edit-event").modal('show', $(this));
            });

            $("#edit-event").on('show.bs.modal', function(e){
                var element = $(e.relatedTarget).closest('tr');
                $.ajaxSetup({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                });

                $.ajax({
                    type: 'GET',
                    url: "/event/" + element.data('id'),
                    data: '',
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        $("#edit-event #event").val(data.name);
                        $("#edit-event #description").val(data.description);
                        $("#edit-event #active").bootstrapSwitch('state', Boolean(data.active));
			            $("#edit-event #date").val(data.dateFormatted);
                        $("#edit-event form").attr('action', '/event/' + data.id);
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            });

            $('input.edit-status').on('switchChange.bootstrapSwitch', function(event, state) {
                var row = $(this).closest('tr');

                $.ajaxSetup({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                });

                $.ajax({
                    type: 'PATCH',
                    url: "/event/" + row.data('id'),
                    data: {active: state},
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        // May send a notification.
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            });

            $(".delete-event").on('click', function() {
                var row = $(this).closest('tr');

                swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this event!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: false
                },
                function(){
                    $.ajaxSetup({
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                    });

                    $.ajax({
                        type: 'DELETE',
                        url: "/event/" + row.data('id'),
                        data: '',
                        dataType: 'json',
                        success: function (data) {
                            swal("Deleted!", "Your event has been deleted.", "success");
                            swal({
                                title: "Deleted!",
                                text: "Your task has been deleted.",
                                type: "success",
                                timer: 2000,
                                showConfirmButton: false
                            });
                            setTimeout(function () {
                                location.reload();
                            }, 1000);
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>
