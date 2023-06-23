<!DOCTYPE html>
<html data-theme="winter" lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        @vite('resources/css/app.css')
        <script src="{{ url("https://kit.fontawesome.com/27b0bc8f27.js") }}" crossorigin="anonymous"></script>
        <script src="{{ url('assets/js/jquery.js') }}"></script>
        
        <!-- Styles -->
       

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body style="" class="min-h-screen relative">
        @include('component.navbar')

        @yield('container')

        <div class="h-60"></div>
        @include('component.footer')

        <script src="assets/js/carousel.js"></script>
    </body>
</html>
