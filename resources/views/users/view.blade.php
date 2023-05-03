@extends("layouts.app")
@section('page_title')
    @if(auth()->user()->is_admin && auth()->user()->id != $account_id)
        {{$username}}'s Profile
    @else
        My Profile
    @endif
    
@endsection
@section('content')
<div class="container">
<div class="mt-5 d-flex flex-row mb-4 text-center">

    @if(auth()->user()->is_admin && auth()->user()->id != $account_id)
        <img class="rounded-circle me-5" style="height:15rem;" src="{{ asset('profile_pic/' . $picture . '.png') }}" />
    @else
        <a class="me-5 btn btn-light" href="{{ url('user/picture/update/'.$account_id) }}">       
            <img class="rounded-circle" style="height:15rem;" src="{{ asset('profile_pic/' . $picture . '.png') }}" />
            <div class="text-center fw-bold mt-2 text-gray">Change Image</div>
        </a>
    @endif

    <div class="container ms-4 flex-grow-1">
        <div class="row">

            <div class="col-2 fw-bold fs-5 mb-3">Username</div>
            <div class="col-9 mb-3">
                <input class="form-control font-monospace fs-5" disabled value="{{$username}}" />
            </div>
            <div class="col-1 text-center ">
                <img style="height: 2rem; opacity:30%;" src="{{ asset('icons/user.png') }}" />
            </div>

            <div class="col-2 fw-bold fs-5 mb-3">Email</div>
            <div class="col-9 fs-5 font-monospace mb-3">
                <input class="form-control font-monospace fs-5" disabled value="{{$email}}" />
            </div>
            <div class="col-1 text-center">
                <img style="height: 2rem; opacity:30%;" src="{{ asset('icons/email.png') }}" />
            </div>

            <div class="col-2 fw-bold fs-5 mb-3">Libraries</div>
            <div class="col-9 fs-5 font-monospace mb-3">
                <input class="form-control font-monospace fs-5" disabled value="{{$library_count}} Libraries" />
            </div>
            <div class="col-1 text-center">
                <img style="height: 2rem; opacity:30%;" src="{{ asset('icons/data.png') }}" />
            </div>
            
            @if($account_id == auth()->user()->id)
            <div class="col-2 fw-bold fs-5 mb-3">Bookmarks</div>
            <div class="col-9 fs-5 font-monospace mb-3">
                <input class="form-control font-monospace fs-5" disabled value="{{$bookmark_count}} Bookmarks" />
            </div>


            <div class="col-1 text-center">
                <img style="height: 2rem; opacity:30%;" src="{{ asset('icons/bookmark_hover.png') }}" />
            </div>
            @endif
            <div class="col-2 fw-bold fs-5 mb-3">Ratings</div>
            <div class="col-9 fs-5 font-monospace mb-5">
                <input class="form-control font-monospace fs-5" disabled value="{{$rating_count}} Ratings" />
            </div>
            <div class="col-1 text-center">
                <img style="height: 2rem; opacity:30%;" src="{{ asset('icons/star_solid.png') }}" />
            </div>

            @if($is_admin == 0 || true)
            <div class="col-12">
                @if(auth()->user()->is_admin)
                    <a href="{{url('/admin/users/update/'.$account_id)}}" type="button" class="btn btn-outline-dark mb-3 w-100" style="width:100%">Edit</a>
                @else
                    <a href="{{ url('/user/update/')}}" type="button" class="btn btn-outline-dark mb-3 w-100" style="width:100%">Edit</a>
                @endif
            </div>
            @endif

            @if(auth()->user() && auth()->user()->id == $account_id)
            <div class="col-12">
                <a href="{{url('/user/password/change')}}" type="button" class="btn btn-outline-dark w-100" style="width:100%">Change Password</a>
            </div>
            @endif

            <!-- Horizontal Divider -->
            <div class="mb-5 col-12">
                <hr class="hr"></hr>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Ratings Section -->
@if(count($ratings) != 0)
<div class="container mb-5">
    <div class="row">
        <div class="col-12 mb-3">
            <h1>My Ratings</h1>
            <hr class="hr w-50"></hr>
        </div>

        @foreach($ratings as $rating)
        <div class="col-5 m-3">
            <x-box-rating :id="$rating->id" :show="true" />
        </div>
        @endforeach
    </div>
</div>
@endif

<!-- Ratings Section -->
@if(count($libraries) != 0)
<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <h1>My Ratings</h1>
            <hr class="hr w-50"></hr>
        </div>

        @foreach($libraries as $library)
        <div class="col-12 m-3">
            <x-display-horizontal :data="$library" />
        </div>
        @endforeach
    </div>
</div>
@endif

<script>
        window.assetUrl = '{{ asset('') }}';
    </script>
<script src="{{ asset('js/ratings.js') }}">


@endsection

