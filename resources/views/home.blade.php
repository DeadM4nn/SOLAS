<head>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
    <style>
    </style>
    <title>{{ config('app.name') }}</title>
</head>
<body>

<div class="solas-header">
    <x-navbar/>
</div>

<div class="text-center solas-title-home" style="margin-bottom:-2rem; padding-top:9rem">
    <img class="my-4" src="/images/full_logo.png" height=30% width=auto></img>
</div>

<form action="library/search" method="POST">
    @csrf
    <div class="search-bar" align="center">
        <x-searchBar/>
    </div>
</form>
</body>
<x-footer />
