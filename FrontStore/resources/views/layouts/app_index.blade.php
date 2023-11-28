<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>FrontEnd Store</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/b4fe636f2d.js" crossorigin="anonymous"></script>
        @vite(['resources/css/app.css','resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body>
        @include('partials.header_index')
        @yield('container')
        {{-- @include('partials.chatbot') --}}
        @include('partials.footer')
        @yield('js')
    </body>
</html>
