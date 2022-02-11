@extends('template')
@section('title')
    Все задачи
@endsection
@section('content')
    <h1>Все задачи</h1>
    <nav>
        <a href="{{ route(\App\Consts\WebRoutes::SHOW_CREATE_TASK_FORM) }}" class="btn btn-success">Добавить задачу</a>
    </nav>
    <br>
    <div class="row">
        <table class="table">
            <thead>
            <tr style="text-align: center">
                <th>ID</th>
                <th>Имя пользователя</th>
                <th>Email</th>
                <th>Текст</th>
                <th>Status</th>
                @auth
                    <th>action</th>
                @endauth
            </tr>
            </thead>
            <tbody>
            @isset($taskBooks)
                @foreach($taskBooks as $task)
                    <tr>
                        <td align="center">{{$task->id}}</td>
                        <td align="center">{{$task->user_name}}</td>
                        <td align="center">{{$task->email}}</td>
                        <td align="center">{{$task->body}}</td>
                        <td align="center">@if($task->checked) отредактировано администратором @endif</td>
                        @auth
                            <td align="center">
                                <a href="{{ route(\App\Consts\WebRoutes::SHOW_UPDATE_TASK_FORM, $task->id) }}"><i class="fas fa-pencil-alt"></i></a>
                            </td>
                        @endauth
                    </tr>
                @endforeach
            @endisset
            </tbody>
        </table>
    </div>
    @if($taskBooks->total() > $taskBooks->count() )
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        {{ $taskBooks->links() }}
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

