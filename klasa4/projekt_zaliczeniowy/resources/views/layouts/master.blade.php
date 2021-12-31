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

<body>
    <header>
        <h1>NAGŁÓWEK</h1>
        <nav>
            @hasSection('nav')
            @yield('nav')
            @else
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Tests</a></li>
            </ul>
            @endif

        </nav>
        <!-- <p>
            <i class="glyphicon glyphicon-log-out" style="font-size:30px"></i>
        </p> -->
    </header>

    <main>
        @hasSection('content')
        @yield('content')
        @endif
    </main>
</body>

</html>