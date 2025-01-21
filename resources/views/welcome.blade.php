<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Work-Flow-Hub-V2</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">
<header class="p-2 border-bottom position-fixed top-0 w-100">
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
        <p class="lead text-muted mt-3">Streamline your tasks with ease and efficiency</p>
        <a href="{{ route('register') }}" class="btn btn-primary btn-lg mt-4 px-4 shadow-sm">Get Started</a>
    </div>
</main>

<footer class="p-3 border-top position-fixed bottom-0 w-100">
    <div class="container">
        <p class="text-center mb-0">&copy; 2024 All Rights Reserved | Designed by
            <a href="https://webmotech.com" class="text-decoration-none" target="_blank">Webmotech</a></p>
    </div>
</footer>
</body>
</html>
