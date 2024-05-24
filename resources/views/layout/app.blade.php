<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/js/app.js', 'resources/css/app.css'])
    </head>
    <body class="d-flex align-content-between justify-content-between flex-column min-vh-100 bg-light-subtle">
        @include('layout.header')
        @include('layout.main')
        @include('layout.footer')
    </body>
</html>
