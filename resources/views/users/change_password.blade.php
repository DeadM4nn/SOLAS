@extends('layouts/app')
@section('page_title')

@endsection
@section('content')

    <div class="w-50 mx-auto">
        <div class="mb-3" style="font-family: 'Roboto', sans-serif; letter-spacing: 0.1rem; font-size: 1.5rem; color: #002B65;">Change Password</div>

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ url('user/password/change/process') }}">
                @csrf

                <div class="mt-4">
                    <x-label for="old_password" value="Old Password" />
                    <x-input id="old_password" class="form-control" type="password" name="old_password" required autocomplete="new-password" />
                </div>


                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

              <x-button class="mt-4 btn btn-primary" style="width:100%">
                  Change password
              </x-button>

            </form>
    </div>

@endsection

