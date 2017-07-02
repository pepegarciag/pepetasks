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
                    <form id="add-task" class="form" method="post" action="/task/">
                        <div class="form-group">
                            <label for="task">Tarea</label>
                                <input type="text" id="task" name="task" value="{{ old('task') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="schedule">Programación</label>
                            <div class="cron-schedule">
                                <input id=""schedule name="schedule" type="hidden" class="cron">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Añadir tarea</button>
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
                    <table class="tasks table table-hover">
                        <thead>
                            <tr>
                                <th>Tarea</th>
                                <th>Programación</th>
                                <th>Activa</th>
                                <th>Editar</th>
                                <th>Borrar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                                <tr data-id="{{ $task->id }}">
                                    <td>{{ $task->name }}</td>
                                    <td class="text-center"><div class="schedule">{{ $task->schedule }}</div></td>
                                    <td class="text-center">
                                        <input class="edit-status" type="checkbox" name="active" value="{{ $task->active }}" {{ ($task->active) ? "checked='checked'" : "" }}>
                                    </td>
                                    <td><button class="btn btn-xs btn-primary edit-task">Editar</button></td>
                                    <td><button class="btn btn-xs btn-danger delete-task">Borrar</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="edit-task" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edición de tarea</h4>
            </div>
            <form class="form" action="" method="post">
                <div class="modal-body">
                        {!! method_field('patch') !!}
                        <div class="form-group">
                            <label for="task">Tarea</label>
                            <input type="text" id="task" name="task" value="{{ old('task') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="schedule">Programación</label>
                            <input id=""schedule name="schedule" type="hidden" class="cron">
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="active" id="active" value="1">
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
