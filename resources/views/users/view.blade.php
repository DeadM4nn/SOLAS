@extends("layouts.app2")
@section('page_title')
    My Account
@endsection
@section('content1')

    <div class="row my-4">

        <div class="col-3 mt-2 mb-3 solas-library-column-title col-form-label align-items-center">Email</div>
        <div class="col-9 mt-2 mb-3 align-items-center" style="display:inherit;margin-bottom: 0.7rem;">
            <div class="col-3 solas-library-column-title col-form-label align-items-center">
                {{$username}}
            </div>
        </div>

        <div class="col-3 mb-3 solas-library-column-title col-form-label align-items-center">Username</div>
        <div class="col-9 mb-3 align-items-center" style="display:inherit;margin-bottom: 0.7rem;">
            <div class="col-3 solas-library-column-title col-form-label align-items-center">
                {{$email}}
        </div>
        </div>

        <a class="btn btn-outline-dark mb-2" style="width:100%;">Edit</a>


            <!-- Horizontal Divider -->
            <div class="mb-5 col-12">
                <hr class="hr"></hr>
            </div>
@endsection
@section('content3')
            <div style="font-family: 'Roboto', sans-serif; letter-spacing: 0.05rem; font-size: 2rem; font-weight: 900; color: #313D60;">
                My Libraries
            </div>

            @foreach($libraries as $data)
                <x-display-horizontal :data="$data" />
            @endforeach


@endsection