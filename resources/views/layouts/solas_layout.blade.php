<!doctype html>
<html">
<head>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="{{ asset('css/w3css_modified.css') }}" rel="stylesheet" type="text/css" >
    <style>
    .search-bar .text-field{
        width: 25%;
        border-radius: 0.375rem;
        border: 1px solid #ced4da;
        font-size: 0.9rem;
        line-height: 1.6;
        background-color: #fbfbfb;
        font-size: 0.9rem;
        font-weight: 400;
        padding: 0.375rem 0.75rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
    .search-bar .magnifying-button{
        position: relative;
        top: 10px;
    }
    .fw-light{
        color:#c4c4c4;
    }
    .solas-tag{
        padding: 0.3rem 1.2rem; 
        margin-right:0.5rem; 
        margin-bottom:1rem;
    }

    .solas-bg-language{
        background-color:#4BC51D; 
    }

    .solas-bg-category{
        background-color:#0E7FC0; 
    }

    .solas-bg-license{
        background-color:#7C7C7C;
    }

    .solas-rating-card{
        height: 1.2rem;
        padding: 0rem 1rem;
        bottom: 0.125rem;
        position: relative;
    }

    .solas-padding{
        padding:1rem 2rem;
    }
    </style>
</head>
<body>
    <div class="p-5">
    @yield('page_title')
    <div>
    
    <hr class="divider">
    @yield('content')

</body>
</html>