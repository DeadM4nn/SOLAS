<head>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
    .search-bar .text-field{
        width: 40%;
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
    </style>
</head>
<body>

<div class="text-center" style="margin-bottom:0rem; padding-top:9rem">
    <img class="my-4" src="/images/full_logo.png" height=30% width=auto style="align:center;"></img>
</div>

<form action="library/search" method="POST">
    @csrf
    <div class="search-bar" align="center">
        <x-searchBar/>
    </div>
</form>

</body>

