<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Work-Flow-Hub-V2</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">
<header>
    @if (Route::has('login'))
        <nav class="d-flex">
            @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-link text-decoration-none text-black">Dashboard</a>
            @else
                <div class="ms-auto">
                    <a href="{{ route('login') }}" class="btn btn-link text-decoration-none text-black">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="btn btn-link text-decoration-none text-black">Register</a>
                    @endif
                </div>
            @endauth
        </nav>
    @endif
</header>

<main class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
    <div class="text-center">
        <h1>Welcome to Work Flow Hub!</h1>
    </div>
</main>

</body>
</html>
