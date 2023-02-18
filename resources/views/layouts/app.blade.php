<!doctype html>
<html">
<head>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="{{ asset('css/w3css_modified.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/solas.css') }}" rel="stylesheet" type="text/css" >
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">

</head>
<body>
    <div class="p-5">
    @yield('page_title')
    <div>
    
    <hr class="divider">
    @yield('content')

</body>
</html>