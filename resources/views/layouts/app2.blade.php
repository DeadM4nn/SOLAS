<!doctype html>
<html">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-QzJQgjQjghmVTIzx1fX9KjCk6n/Usq15oU6QjKxgPTNwzg+MnnoR6e9NVjKUZc6Y0q6Uc2+jKflrP+w0+kL+Lw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
    <title>{{ config('app.name') }}</title>
</head>
<body>
    <x-header />
    <div class="d-flex justify-content-between">
        <div class="justify-content-start" style="width:60%">
            <div class="solas-content">  
                <div class="mb-3" style="font-family: 'Roboto', sans-serif; letter-spacing: 0.05rem; font-size: 2rem; font-weight: 900; color: #313D60;">
                    @yield('page_title')
                </div>

                @yield('content1')
            </div>
        
        </div>

        <div class="justify-content-end">
            @yield('content2')
        </div>
    </div>
    
</body>
</html>