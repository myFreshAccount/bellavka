@extends('template')
@section('title')
    Редактировать задачу
@endsection
@section('content')
    <h1>Редактировать задачу</h1>
    <br>
    <div class="col-6">
        @php
            /** @var \Illuminate\Support\ViewErrorBag $errors */
        @endphp
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{$errors->first()}}
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{session('success')}}
            </div>
        @endif
        <form action="{{ route(\App\Consts\WebRoutes::UPDATE_TASK, $task->id) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" class="form-control" id="name" name="user_name" autocomplete="off" readonly
                       value="{{$task->user_name}}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" autocomplete="off" readonly
                       value="{{$task->email}}" >
            </div>

            <div class="form-group">
                <label for="body">Текст</label>
                <textarea name="body" id="body" class="form-control">{{$task->body}}</textarea>
            </div>

            <div>
                <label for="checked">Выполнено</label>
                    <input type="hidden" name="checked" value="0">
                    <input type="checkbox" class="form-checkbox" name="checked" id="checked" value="1" @if($task->checked) checked @endif>
            </div>
            <div class="form-group">
                <button class="btn btn-dark" type="submit">Сохранить</button>
                <a href="{{ route(\App\Consts\WebRoutes::SHOW_ALL_TASKS) }}" class="btn btn-secondary ">Назад</a>
            </div>
        </form>
    </div>
@endsection

