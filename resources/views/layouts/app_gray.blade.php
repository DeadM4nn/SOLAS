<html>
    <head>
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
        <link href="{{ asset('css/solas.css') }}" rel="stylesheet" type="text/css" >

        
        @yield('style')
        <style>
            .card{
                margin: auto;
                width: 50%;
                Margin-top: 10rem;
            }

            .card-title{
                text-align: center;
                padding: 0.8rem 0;
            }

            .card-text a{
                width: 100%;
                margin: 0;
            }

        </style> 
    </head>
    <body class="solas-bg-gray">
        @yield('content')
    </body>
</html>