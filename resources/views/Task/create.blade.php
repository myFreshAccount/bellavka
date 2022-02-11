@extends('template')
@section('title')
    Новая задача
@endsection
@section('content')
    <h1>Создать задачу</h1>
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

        <form action="{{ route(\App\Consts\WebRoutes::CREATE_TASK) }}" method="post">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" class="form-control" id="name" name="user_name" autocomplete="off" required
                       value="{{old('user_name',' ')}}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" autocomplete="off" required
                       value="{{old('email',' ')}}">
            </div>

            <div class="form-group">
                <label for="body">Текст</label>
                <textarea name="body" id="body" class="form-control">{{old('body',' ')}}</textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-dark" type="submit">Сохранить</button>
                <a href="{{ route(\App\Consts\WebRoutes::SHOW_ALL_TASKS) }}" class="btn btn-secondary ">Назад</a>
            </div>
        </form>
    </div>
@endsection

