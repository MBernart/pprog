<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <title>@yield('title')</title>
</head>

<body class="container min-vh-100">
    <!-- <div id="header-container" class="vw-100 " style="height: 5vh;"> -->
    @include('layouts.header')
    @guest
    @include('layouts.login')
    @endguest
    @auth
    @include('layouts.logout')
    @endauth
    <main>
        @hasSection('content')
        @yield('content')
        @endif
    </main>
    @include('layouts.footer')
</body>

</html>