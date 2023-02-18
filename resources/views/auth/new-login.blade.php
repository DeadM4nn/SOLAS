@extends('layouts.app_gray')
@section('content')
<div class="card bg-light mb-3 shadow-sm" style="max-width: 25rem;">
    <div class="">
        <div class="solas-title-3 ps-4 pt-4">
            Login
        </div>

        <div class="card-body p-4">

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="username" class="fs-6 ">Username</label>
                    <input id="username" name="username" type="text" class="form-control" value="{{ old('email') }}" required>
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>

                <div class="mb-3">
                    <label for="username" class="fs-6 ">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            Remember Me
                        </label>
                    </div>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">
                        Login
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            'Forgot Your Password?'
                        </a>
                    @endif
                </div>

                <div class="mb-0 fw-light">
                    Don't have an account? <a href="{{ url('/register') }}" class="fw-light">Create one!</a>
                </div>

            </form>
        </div>

    </div>
</div>

@endsection

@section('style')
<style>
    input{
        width:100%;
    }
    .btn{
        width:100%
    }
    .card-body{
        padding-top: 1rem !important;
        padding-bottom:0.2rem !important;
    }

</style>
@endsection