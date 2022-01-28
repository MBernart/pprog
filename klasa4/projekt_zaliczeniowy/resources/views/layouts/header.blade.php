<header class="row d-flex align-items-center mb-3 mt-2 d-absolute">
    <!-- <h1 class="col-4 text-center">NAGŁÓWEK</h1> -->
    <div class="col-2 d-flex justify-content-center h-100 mt-2 mb-2" style="border-right: 1px dotted #333;">
        <img style="width: 50px; height: 50px;" src="{{ asset('assets/logo.png') }}" alt="logo">
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
            @auth
            <li class=""><a class="text-decoration-none link-dark align-middle h4 ps-2 pe-2" href="{{ url('profile') }}">Konto</a></li>
            @endauth
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