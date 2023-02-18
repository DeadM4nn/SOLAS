@extends('layouts/app_gray')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body" style="padding-bottom: 0rem;">
                    <div class="mb-3" style="font-family: 'Roboto', sans-serif; letter-spacing: 0.1rem; font-size: 1.5rem; color: #002B65;">Sign Up</div>


                                    <x-slot name="logo">
                        </x-slot>

                        <x-validation-errors class="mb-4" />

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div>
                                <x-label value="{{ __('Username') }}" />
                                <x-input class="form-control" type="text" name="username" :value="old('username')" autocomplete="username" />
                            </div>

                            <div class="mt-4">
                                <x-label for="email" value="{{ __('Email') }}" />
                                <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
                            </div>

                            <div class="mt-4">
                                <x-label for="password" value="{{ __('Password') }}" />
                                <x-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                            </div>

                            <div class="mt-4">
                                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                <x-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                            </div>

                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                <div class="mt-4">
                                    <x-label for="terms">
                                        <div class="flex items-center">
                                            <x-checkbox name="terms" id="terms" required />

                                            <div class="ml-2">
                                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                                ]) !!}
                                            </div>
                                        </div>
                                    </x-label>
                                </div>
                            @endif

                            <div>
                                <x-button class="mt-4 btn btn-primary" style="width:100%">
                                    {{ __('Register') }}
                                </x-button>
                            </div>

                            <div class="mt-4 text-muted" style="text-align:center !important; display: block;">
                                Already have an account? 
                                <a class="text-muted" href="{{ route('login') }}">
                                    Sign In!
                                </a>
                            </div>
                        </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

