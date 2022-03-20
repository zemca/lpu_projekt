<!DOCTYPE html>
<html>
<head>
    <title>IS - OK Lokomotiva Pardubice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: #e4fff1">
<header>
    <nav class="navbar navbar-light navbar-expand-lg mb-3" style="background-color: #e3f2fd;">
        <div class="container">
            <a class="navbar-brand mr-auto" href="{{ route('home') }}">LPU</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Přihlásit se</a>
                        </li>
                        {{--                    <li class="nav-item">--}}
                        {{--                        <a class="nav-link" href="{{ route('register-user') }}">Register</a>--}}
                        {{--                    </li>--}}
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Domů</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('zavody') }}">Závody</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('vicedenniZavody') }}">Vícedenní závody</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user') }}">Uživatel</a>
                        </li>
                        <li class="nav-item d-flex">
                            <a class="nav-link" href="{{ route('signout') }}">Odhlásit se</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>
<main class="container pt-5 pb-3 px-4" style="background-color: white; min-height: 740px;">

        @yield('content')

</main>
<footer>
{{--    <nav class="navbar navbar-light navbar-expand-lg mt-5" style="background-color: #e3f2fd; height: 55Px">--}}
{{--        <div class="container">--}}
{{--            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"--}}
{{--                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--                <span class="navbar-toggler-icon"></span>--}}
{{--            </button>--}}
{{--            <div class="collapse navbar-collapse" id="navbarNav">--}}
{{--                <ul class="navbar-nav">--}}
{{--                    @guest--}}
{{--                    @else--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="{{ route('signout') }}">Logout</a>--}}
{{--                        </li>--}}
{{--                    @endguest--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </nav>--}}
</footer>
</body>

</html>
