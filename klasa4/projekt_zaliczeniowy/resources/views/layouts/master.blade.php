<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>@yield('title')</title>
</head>

<body class="container min-vh-100">
    <!-- <div id="header-container" class="vw-100 " style="height: 5vh;"> -->
    <header class="row d-flex align-items-center mb-3 mt-2">
        <!-- <h1 class="col-4 text-center">NAGŁÓWEK</h1> -->
        <div class="col-2 d-flex justify-content-center h-100 mt-2 mb-2" style="border-right: 1px dotted #333;">
            <img style="width: 50px; height: 50px;" src="{{ asset('assets/logo.png') }}" alt="">
        </div>
        <nav class="col-10 h-100">
            @hasSection('nav')
            @yield('nav')
            @else
            <ul class="list-unstyled d-flex align-items-center justify-content-around m-0">
                <li class=""><a class="text-decoration-none link-dark align-middle h4 pe-2" href="/"></a></li>
                <li class=""><a class="text-decoration-none link-dark align-middle h4 ps-2 pe-2" href="/">Home</a></li>
                <li class=""><a class="text-decoration-none link-dark align-middle h4 ps-2 pe-2" href="{{ url('courses') }}">Courses</a></li>
                <li class=""><a class="text-decoration-none link-dark align-middle h4 ps-2 pe-2" href="{{ url('tests') }}">Tests</a></li>
                @guest
                <li class=""><a class="text-decoration-none link-dark align-middle h4 ps-2 pe-2" href="{{ url('register') }}">Zarejestruj się</a></li>
                @endguest
                <!-- @auth
                <li class=""><a class="text-decoration-none link-dark align-middle h4" href='{{ url("logout") }}'>Wyloguj</a></li>
                @endauth -->
            </ul>
            @endif

        </nav>
        <hr>
    </header>
    @guest
    <a class="position-absolute end-0 top-0 pe-2 text-decoration-none link-dark" href="{{ url('login') }}">Zaloguj się</a>
    @endguest
    @auth
    <p class="position-absolute end-0 top-0 pe-2">Użytkownik: {{ Auth::user()->username; }} (<a href=" {{ url('logout') }}">wyloguj</a>) </p>
    @endauth
    <!-- </div> -->
    <main>
        @hasSection('content')
        @yield('content')
        @endif
    </main>
    <footer>

    </footer>
</body>

</html>