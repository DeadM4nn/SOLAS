@extends('layouts/app_gray')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body" style="padding-bottom: 0rem;">
                    <div class="mb-3" style="font-family: 'Roboto', sans-serif; letter-spacing: 0.1rem; font-size: 1.5rem; color: #002B65;">Login</div>

                        <x-slot name="logo">
                        </x-slot>

                        <x-validation-errors class="mb-4" />

                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div>
                                <x-label value="{{ __('Username') }}" />
                                <x-input class="form-control" type="text" name="username" :value="old('username')" autocomplete="username" />
                            </div>

                            <div class="mt-4">
                                <x-label for="password" value="{{ __('Password') }}" />
                                <x-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                            </div>

                            <div class="block mt-4">
                                <label for="remember_me" class="flex items-center">
                                    <x-checkbox id="remember_me" name="remember" />
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                </label>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                @if (Route::has('password.request'))
                                    <a class="text-muted" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif
                            </div>

                            <div>
                                <x-button class="mt-4 btn btn-primary" style="width:100%">
                                    Log in
                                </x-button>
                            </div>

                            <div class="text-muted mt-4" style="text-align:center;">
                                Don't have an account?
                                <a class="text-muted" href="{{ route('register'); }}">
                                    Create One!
                                </a>
                            </div>
                        </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection