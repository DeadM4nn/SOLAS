<!-- Navbar Array -->
    
@if(auth()->check() && auth()->user()->is_admin)
        <style>
            .solas-header{
                background-color:#1483C3;
            }
            .solas-navbar-items{
                color:white;
            }
            .solas-navbar-items:hover{
                color:white;
                text-decoration:underline;
                text-decoration-color:white ;
            }
        </style>
    @endif


@php
    if(auth()->user()){
        $user_id = auth()->user()->id;
    } else {
        $user_id = "";
    }
    

    //For the current navbar settings
    $logged_in = auth()->check();
    if($logged_in){
        $is_admin = auth()->user()->is_admin;
    } else {
        $is_admin = false;
    }
        $navbar = array();
    

    $navbar['guest']=array(
        array("Home","/home"),
        array("Tags", "/tags"),
        array("Login", "/login")
    );


    $navbar['user']=array(
        array("Home","/home"),
        array("My Libraries", "/user/libraries"),
        array("Discover", "/discover"),
        array("Bookmarks", "/user/bookmark"),
        array("Comparison", "/user/compare"),
        array("My Profile", "/user/view/".$user_id)
    );


    $navbar['admin']=array(
        array("Home","/home"),
        array("Libraries", "/library/all"),
        array("Accounts", "/admin/users/all"),
        array("My Libraries", "/user/libraries"),
        array("My Account", "/user/view/".$user_id)
    );


    if($is_admin && $logged_in){
        $group = 'admin';
    }else if($logged_in){
        $group = 'user';
    } else {
        $group = 'guest';
    }

@endphp

<div style="text-align:right;">
    @auth

        <form method="POST" action="{{ route('logout') }}" style="">
            @foreach($navbar[$group] as $items)

                @if(auth()->user()->is_admin)
                    <a class="solas-navbar-items btn btn-primary" style="background-color: #1483C3;" href="{{ url($items[1]) }}">
                @else
                    <a class="solas-navbar-items btn btn-light" style="" href="{{ url($items[1]) }}">
                @endif
                
                    {{$items[0]}}
                    @if($items[0] == 'Bookmarks' && $has_notif)
                        <img src="{{ asset('icons/alert.png') }}" style="height: 0.8rem;position: relative;bottom: 0.5rem;" />
                    @endif
                </a>
            @endforeach
            @csrf
            <button class="ms-3 btn btn-secondary" type="submit">Logout</button>
        </form>
    @else
        <a class="solas-navbar-items btn btn-light" style="" href="{{ url('/discover') }}">
            Discover
        </a>
        
        <a href="{{ route('login') }}" class="solas-navbar-items btn btn-light me-1" style="">Log in</a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="btn btn-outline-dark me-3">Register</a>
        @endif
    @endauth
</div>