<!-- Navbar Array -->
@php

    //For the current navbar settings
    $is_admin = false;
    $logged_in = true;

    $navbar = array();
    

    $navbar['guest']=array(
        array("Home","/home"),
        array("Tags", "/tags"),
        array("Login", "/login")
    );


    $navbar['user']=array(
        array("Home","/home"),
        array("Tags","/tag"),
        array("Bookmarks", "/user/bookmarks"),
        array("My Libraries", "/user/libraries"),
        array("My Profile", "/user")
    );


    $navbar['admin']=array(
        array("Home","/admin/home"),
        array("My Libraries", "/admin/libraries"),
        array("Accounts", "/admin/accounts"),      
        array("Libraries", "/admin/libraries")

    );


    if($is_admin && $logged_in){
        $group = 'admin';
    }else if($logged_in){
        $group = 'user';
    } else {
        $group = 'guest';
    }

@endphp

<div>
    @foreach($navbar[$group] as $items)
            <!-- {{$items[0]}} -->
    @endforeach

    <!-- Sign In and Out button -->
    @if(session('status'))
        <a class="btn btn-dark" href="{{ url('logout') }}">Sign Out</a>
    @else
        <a class="btn btn-outline-dark" href="{{ url('login') }}">Sign Up</a>
    @endif

</div>