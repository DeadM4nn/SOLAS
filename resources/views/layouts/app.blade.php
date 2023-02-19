<!doctype html>
<html">
<head>
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
</head>
<body>
    <x-header />

    <div class="solas-content">

    @yield('page_title')
    <div>
    
    <hr class="divider">
    @yield('content')
    </div>
</body>
</html>