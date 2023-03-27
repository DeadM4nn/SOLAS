<div>

    @php
        if(auth()->check() && auth()->user()->is_admin){
            $image = asset('/images/admin_logo.png');
        } else {
            $image = asset('/images/main_logo.png');
        }
    @endphp

    <div class="solas-header p-2 d-flex justify-content-between" style="padding-bottom:0.2rem !important;">
        <div class="justify-content-start">
            <a href="{{ url('/home') }}">
                <img class="solas-main-logo" src="{{ $image }}" alt="Header Logo">
            </a>
        </div>
        <div class="justify-content-end d-flex align-items-center">
            <x-navbar />
        </div>
    </div>
    <hr class="solid" width=100%>
</div>