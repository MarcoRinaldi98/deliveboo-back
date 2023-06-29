<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<title>Deliveboo | @yield('page-title')</title>

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<link rel="icon" type="image/x-icon" href="favicon.ico">

<!-- Scripts -->
@vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body>

    @include('partials.messages')
    @include('partials.header')

    @yield('content')

</body>

</html>
