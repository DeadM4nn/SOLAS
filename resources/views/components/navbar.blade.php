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

<div style="text-align:right;">
    @auth
        <form method="POST" action="{{ route('logout') }}">
            @foreach($navbar[$group] as $items)
                    <a class="m-2 fw-normal" style="text-decoration: none;" href="{{ url($items[1]) }}">{{$items[0]}}</a>
            @endforeach
            @csrf
            <button class="ms-3 btn btn-secondary" type="submit">Logout</button>
        </form>
    @else
        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
        @endif
    @endauth
</div>