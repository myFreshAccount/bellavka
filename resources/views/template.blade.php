<!DOCTYPE html>
<html lang="ru">
<head>
    <link rel="stylesheet" href="{{asset('css/css/app.css')}}">
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="/favicon.png" type="image/x-icon">
    <meta name="robots" content="noindex, nofollow, noarchive">
    <link rel="icon" href="/favicon.png" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <div class="collapse navbar-collapse text-right">
                @if (Route::has(\App\Consts\WebRoutes::SHOW_LOGIN_FORM))
                    @auth
                        <form method="POST" action="{{ route(\App\Consts\WebRoutes::LOGOUT) }}">
                            @csrf
                            <button type="submit" class="btn btn-light ms-3 ">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route(\App\Consts\WebRoutes::SHOW_LOGIN_FORM) }}" class="btn btn-light ms-3">Login</a>
                    @endauth
                @endif
            </div>
        </div>
    </nav>
</header>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
        @yield('content')
        </div>
    </div>
</div>
<script scr="{{ asset('js/app.js')}}"></script>
</body>
</html>
