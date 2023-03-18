<!doctype html>
<html>
    <head>
        <!-- Importing all needed resources -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">    
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>{{ config('app.name') }}</title>

        <!-- Heading_Content -->
        @yield("heading_content")
    </head>
    <body>
        <!-- Body_Content -->
        @yield("body_content")
    </body>
</html>