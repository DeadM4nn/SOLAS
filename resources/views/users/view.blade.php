@extends("layouts.app2")
@section('page_title')
    My Account
@endsection
@section('content1')
<div class="mt-5 d-flex flex-row">
    <a class="me-5 btn btn-light" href="{{ url('user/picture/update') }}">       
        <img class="rounded-circle" style="height:15rem;" src="{{ asset('profile_pic/' . $picture . '.png') }}" />
        <div class="text-center fw-bold mt-2 text-gray">Change Image</div>
</a>
    <div class="row my-4">
        <div class="col-3 mt-2 mb-3 solas-library-column-title col-form-label align-items-center">Username</div>
        <div class="col-9 mt-2 mb-3 align-items-center" style="display:inherit;margin-bottom: 0.7rem;">
            <div class="col-3 solas-library-column-title col-form-label align-items-center">
                {{$username}}
            </div>
        </div>

        <div class="col-3 mb-3 solas-library-column-title col-form-label align-items-center">Email</div>
        <div class="col-9 mb-3 align-items-center" style="display:inherit;margin-bottom: 0.7rem;">
            <div class="col-3 solas-library-column-title col-form-label align-items-center">
                {{$email}}
        </div>
        </div>

                <a href="{{url('/user/update/'.(string)$account_id)}}" type="button" class="btn btn-outline-dark" >Edit</a>

            <!-- Horizontal Divider -->
            <div class="mb-5 col-12">
                <hr class="hr"></hr>
            </div>
</div>
@endsection

<!--
section('content3')
            <div style="font-family: 'Roboto', sans-serif; letter-spacing: 0.05rem; font-size: 2rem; font-weight: 900; color: #313D60;">
                My Libraries
            </div>

            @foreach($libraries as $data)
                <x-display-horizontal :data="$data" />
            @endforeach


endsection
-->