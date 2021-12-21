<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>

    </style>
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
                    <li>Home</li>
                    <li>About</li>
                    <li>Tests</li>
                </ul>
            @endif

        </nav>
    </header>

    <main>
        @hasSection('content')
            @yield('content')
        @endif
    </main>
</body>

</html>
