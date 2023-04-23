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
@if(auth()->user() && auth()->user()->is_admin)
<div class="m-5 d-flex justify-content-center">
    <a href="{{ url('library/all') }}">
    <div class="btn btn-light me-5 w3-card solas-admin-dashboard" style="background-image: url('{{ asset('images/Library.png') }}'); padding-right:5rem;">
    <h5 class="ms-2 mt-2 mb-5 text-start fw-bold">
            Libraries
        </h5>
        <div style="width=70%;" class="text-center">
            There are {{$library_count}} Libraries
        </div>
    </div>
    </a>

    <a href="{{ url('/admin/users/all') }}">
    <div class="btn btn-light me-5 w3-card solas-admin-dashboard" style="background-image: url('{{ asset('images/Account.png') }}'); padding-right:7rem;">
    <h5 class="ms-2 mt-2 mb-5 text-start fw-bold">
            Accounts
        </h5>
        <div style="width=70%;" class="text-center">
            There are {{$user_count}} users
        </div>
    </div>
    </a>

</div>
@endif
</body>
<style>
    #account-btn{
        background-image: url("images/Account.png");
    }
    .solas-admin-dashboard{
        background-size: cover;
        width: 320px; /* set a fixed width for the element */
        height: 170px; /* set a fixed height for the element */
        color: #fff;
        padding: 10px;
        border: none;
        border-radius: 25px;
    }
</style>
<x-footer />
