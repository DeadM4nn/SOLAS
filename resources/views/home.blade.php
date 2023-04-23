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


<div id="carouselExampleIndicators" class="carousel slide  bg-secondary" style="margin-top:15%;" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner  bg-secondary" style="padding: 25px 20%;">
  <div class="carousel-item active">
        <h3 class="mb-5 mt-3 text-white">Popular</h1>
        <div class="d-flex justify-content-around">
                @foreach($popular as $curr_popular)
                    <div class="w3-card p-4 m-3 col-5 mb-5 bg-white border rounded">    
                        <div class="d-flex justify-content-between">
                            <a class="btn btn-light" href=" {{url('/library/request/'.$curr_popular->library_id)}} "><h5 class="fw-bold text-start me-1">{{$curr_popular->name}}</h5></a>
                            <x-widget-star :id="$curr_popular->library_id" />
                        </div>
                        <div class="text-start me-4 mb-2 mt-1 fw-light">{{$curr_popular->views}} views</div>    
                        <div class='text-center' ><hr style="width:90%;" /></div>
                        <x-widget-tag :id="$curr_popular->library_id" />
                        <x-widget-license :id="$curr_popular->library_id" />
                    </div>
                @endforeach
        </div>
    </div>
    <div class="carousel-item">
    <h3 class="mb-5 mt-3 text-white">Discover</h1>
        <div class="d-flex justify-content-around">
                @foreach($discover as $curr_discover)
                    <div class="w3-card p-4 m-3 col-5 mb-5 bg-white border rounded">    
                        <div class="d-flex justify-content-between">
                            <a href=" {{url('/library/request/'.$curr_discover->library_id)}} " class="btn btn-light"><h5 class="fw-bold text-start me-1">{{$curr_discover->name}}</h5></a>
                            <x-widget-star :id="$curr_discover->library_id" />
                        </div>
                        <div class="text-start me-4 mb-2 mt-1 fw-light">{{$curr_discover->views}} views</div>    
                        <div class='text-center' ><hr style="width:90%;" /></div>
                        <x-widget-tag :id="$curr_discover->library_id" />
                        <x-widget-license :id="$curr_discover->library_id" />
                    </div>
                @endforeach
        </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

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
<footer class="text-center text-lg-start bg-dark align-items-center" style="height:60px; padding-top:30px; margin-top:0rem;">
    <div class="text-white-50 text-center" style="font-size:10px;">
        @2023 SOLAS | Copyright owned by Universiti Tenaga Nasional (UNITEN).
    </div>
</footer>
