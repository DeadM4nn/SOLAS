@extends('layouts/app')
@section('page_title')
Register Account (Admin)
@endsection
@section('content')

    <div class="w-50 mx-auto">
        <div class="mb-3" style="font-family: 'Roboto', sans-serif; letter-spacing: 0.1rem; font-size: 1.5rem; color: #002B65;">Sign Up</div>



            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ url('admin/users/add/process') }}">
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
                <div class="mt-4">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox"  id="is_admin" name="is_admin" onclick="document.getElementById('admin_warning').hidden = !this.checked;  document.getElementById('hide_if_admin').hidden = !this.checked; document.getElementById('hide_if_not_admin').hidden = this.checked;">
                    <label class="form-check-label" for="is_admin">Admin Priviledges</label>
                </div>

                <div class="card text-white bg-danger mb-3" id="admin_warning" hidden>
                    <div class="card-header">WARNING!</div>
                    <div class="card-body">
                    <p class="card-text">By assigning admin privileges to a new user, you are granting them the same level of access as the current user, including the ability to create, modify, and delete content. It's important to note that admins cannot delete other admins, so assigning admin privileges to a new user cannot be undone without direct database access. Please proceed with caution.</p>
                    </div>
                </div>
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


                <div id="hide_if_admin" hidden>
                    <button type="button" class="mt-4 btn btn-primary" style="width:100%"  data-bs-toggle="modal" data-bs-target="#warningModal">
                        {{ __('Register') }}
                    </button>
                </div>
                <div id="hide_if_not_admin" >
                    <x-button class="mt-4 btn btn-primary" style="width:100%">
                        {{ __('Register') }}
                    </x-button>
                </div>

<!-- Warning modal -->
<div class="modal fade" id="warningModal" tabindex="-1" aria-labelledby="warningModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!-- Modal header with close button -->
      <div class="modal-header">
        <h5 class="modal-title text-white" id="warningModalLabel">WARNING!</h5>
        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- Modal body with warning text and checkbox -->
      <div class="modal-body">
        <div class="card text-white bg-danger mb-3">
          <div class="card-header">WARNING!</div>
          <div class="card-body">
            <p class="card-text">By assigning admin privileges to a new user, you are granting them the same level of access as the you, including the ability to create, modify, and delete content. It's important to note that admins cannot delete other admins, so assigning admin privileges to a new user cannot be undone without direct database access. Please proceed with caution.</p>
          </div>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="agreeCheck">
          <label class="form-check-label" for="agreeCheck">
            I understand that making this change may have potential consequences and could impact the overall safety and security of the system.
          </label>
        </div>
      </div>
      <!-- Modal footer with submit button (disabled until checkbox is checked) -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-primary" id="submitButton" type="submit" disabled>Submit</button>
      </div>
    </div>
  </div>
</div>

<script>
const agreeCheck = document.querySelector('#agreeCheck');
const submitButton = document.querySelector('#submitButton');

agreeCheck.addEventListener('change', () => {
  submitButton.disabled = !agreeCheck.checked;
});
</script>


            </form>


    </div>

@endsection

