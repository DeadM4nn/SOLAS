<html>
    
    <!-- Test Data -->

    <head>
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        @yield('style')    
    </head>
    <body class="bg-light">
        @yield('content')
    </body>
</html>