<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />

    <!-- Your custom CSS styles can be added here -->
    <style>
    .auth-main:after {
        content: "";
        position: absolute;
        right: 0;
        top: 0;
        width: 100%;
        height: 100%;
        z-index: -2;
        background: url("storage/images/auth_bg.jpg") no-repeat top left fixed;
    }
    </style>
    <!-- Scripts -->
    @vite(['resources/css/auth.css'])
</head>

<body>
    <div id="auth" class="theme-cyan">
        <div class="container">
            <div class="d-flex h100vh align-items-center auth-main w-100">
                @yield('content')
            </div>
        </div>
    </div>
</body>
<!-- Include Bootstrap JS (Popper.js and Bootstrap.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</html>