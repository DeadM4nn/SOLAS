<!doctype html>
<html">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
</head>
<body>
    <x-header />

    <div class="solas-content">
    <div class="mb-3" style="font-family: 'Roboto', sans-serif; letter-spacing: 0.05rem; font-size: 1.5rem; font-weight: 900; color: #313D60;">
        @yield('page_title')
    </div>
    
    <hr class="divider">
    @yield('content')
    </div>
</body>
</html>