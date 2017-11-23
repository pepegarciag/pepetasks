@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Crear tarea</div>
                <div class="panel-body">
                    <form id="add-event" class="form" method="post" action="/event/">
                        <div class="form-group">
                            <label for="task">Evento</label>
                                <input type="text" id="event" name="event" value="{{ old('event') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="task">Descripción</label>
                            <input type="text" id="description" name="description" value="{{ old('description') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="date">Fecha</label>
                            <input type="date" id="date" name="date" value="{{ old('date') ? old('date') : \Carbon\Carbon::tomorrow()->format('Y-m-d') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Añadir evento</button>
                        </div>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <table class="events table table-hover">
                        <thead>
                            <tr>
                                <th>Tarea</th>
                                <th>Descripcion</th>
                                <th>Fecha</th>
                                <th>Activa</th>
                                <th>Editar</th>
                                <th>Borrar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($events as $event)
                                <tr data-id="{{ $event->id }}">
                                    <td>{{ $event->name }}</td>
                                    <td class="text-center">{{ $event->description }}</td>
                                    <td class="text-center">{{ $event->date->format('d/m/Y') }}</td>
                                    <td class="text-center">
                                        <input class="edit-status" type="checkbox" name="active" value="{{ $event->active }}" {{ ($event->active) ? "checked='checked'" : "" }}>
                                    </td>
                                    <td><button class="btn btn-xs btn-primary edit-event">Editar</button></td>
                                    <td><button class="btn btn-xs btn-danger delete-event">Borrar</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="edit-event" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edición de un evento</h4>
            </div>
            <form class="form" action="" method="post">
                <div class="modal-body">
                        {!! method_field('patch') !!}
                        <div class="form-group">
                            <label for="event">Tarea</label>
                            <input type="text" id="event" name="event" value="{{ old('event') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" id="description" name="description" value="{{ old('description') }}" class="form-control">
                        </div>
			<div class="form-group">
                            <label for="date">Fecha</label>
                            <input type="date" id="date" name="date" value="{{ old('date') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="active" id="active" value="{{ old('active') }}">
                        </div>
                        {{ csrf_field() }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
