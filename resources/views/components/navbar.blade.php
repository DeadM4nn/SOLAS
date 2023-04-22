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
        array("Compare", "/user/compare"),
        array("My Profile", "/user")
    );


    $navbar['admin']=array(
        array("Home","/home"),
        array("Libraries", "/library/all"),
        array("Accounts", "/admin/users/all"),
        array("My Libraries", "/user/libraries"),
        array("My Account", "/user")
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
        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 me-3">Log in</a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="btn btn-outline-dark me-3">Register</a>
        @endif
    @endauth
</div>