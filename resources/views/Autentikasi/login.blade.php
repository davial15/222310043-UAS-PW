<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReSis Admin Login</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>

<body>
    <div class="header" style="margin-bottom: 25px">
        <img src="Resis.jpeg" alt="ReSis Logo" width="150" height="80">
    </div>
    <div>
        <div class="container" style="text-align: center">
            <div class="login-form">
                <h2>Masuk Sebagai Admin</h2>
                <p>Selamat Datang Di ReSis! 🌱</p>

                @if (session()->has('loginError'))
                    <h2>{{ session('loginError') }}</h2>
                @endif

                @if (session()->has('success'))
                    <h2>{{ session('success') }}</h2>
                @endif

                <form method="POST" action="/login">
                    @csrf
                    <input type="text" name="name" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit">Masuk</button>
                </form>
            </div>
        </div>
        <div class="footer" style="margin-bottom: 50px">
            <hr style="margin: 100px; width: 85%;" color="#E1E1E1">
            “Sampah bukanlah masalah, Tetapi sebuah peluang”<br>
            @ReSis
        </div>
    </div>
</body>

</html>
