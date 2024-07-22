<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard ReSis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        .navbar {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 60px;
        }

        .navbar-brand {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            margin: 0;
        }
    </style>
</head>

<body class="d-flex flex-row">
    {{-- Navbar --}}
    <div class="d-flex flex-column flex-shrink-0 p-3" style="width: 280px; height: 100vh; background-color: #B6E7CA">
        <a
            href="#"class="d-flex align-items-center mb-3 mb-md-0 me-md-auto fw-bold text-dark text-decoration-none">
            <span class="fs-4">Dasboard</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                @if (Request::is('sampah') || Request::is('sampah/*'))
                    <a href="/sampah" class="bg-white nav-link fw-bold text-dark" aria-current="page"
                        style='width:110%'>
                        Daftar Sampah
                    </a>
                @else
                    <a href="/sampah" class="nav-link fw-bold text-dark" aria-current="page">
                        Daftar Sampah
                    </a>
                @endif
            </li>
            <li>
                @if (Request::is('olahan') || Request::is('olahan/*'))
                    <a href="/olahan" class="bg-white nav-link fw-bold text-dark" aria-current="page"
                        style='width:110%'>
                        Daftar Olahan
                    </a>
                @else
                    <a href="/olahan" class="nav-link fw-bold text-dark" aria-current="page">
                        Daftar Olahan
                    </a>
                @endif
            </li>
        </ul>
        <hr>
        <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="btn">Sign Out</button>
        </form>

    </div>

    @yield('content')

</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
</script>

</html>
