$(document).ready(function(){
    // TODO: Refactor this.
    $('#edit-modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var eventId = button.closest('tr').data('id');

        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

        $.ajax({
            type: 'GET',
            url: "/event/" + eventId,
            data: '',
            dataType: 'json',
            success: function (data) {
                $("#edit-event #active").prop('checked', data.active);
                if (data.active == 1) {
                    $("#edit-event .c-switch").addClass('is-active');
                }
                $("#edit-event #event").val(data.name);
                $("#edit-event #description").val(data.description);
                $("#edit-event #date").val(data.dateFormatted);
                $('#edit-event #time').val(data.timeFormatted);
                $("#edit-event").attr('action', '/event/' + data.id);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });

        //var modal = $(this);
        //modal.find('.modal-title').text('New message to ' + recipient);
        //modal.find('.modal-body input').val(recipient);
    });

    $('#delete-modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var eventId = button.closest('tr').data('id');
        $("#delete-event").attr('action', '/event/' + eventId);
    });

    $('.events .c-switch').on('click', function(event) {
        var $switch = $(this);
        var checked = $switch.find('input').prop('checked');
        var row = $switch.closest('tr');

        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

        $.ajax({
            type: 'PATCH',
            url: "/event/" + row.data('id'),
            data: {active: checked},
            dataType: 'json',
            success: function (data) {

            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
});