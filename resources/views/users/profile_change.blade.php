@extends("layouts.app")
@section('page_title')
    <div class="d-flex justify-content-around">
        <div>Change Profile Picture</div>
        <div><a class="btn btn-outline-dark" href=" {{ url('/user') }} ">Back <</a></div>
    </div>
@endsection
@section('content')
    <div class="container">
        <div class="row">
        @for($i = 1; $i <= 50; $i++)
        <form method="POST" style="display:inline-block;" class="col-2" action=" {{ url('user/picture/update/process') }} ">
            @csrf
            <input type="hidden" value="{{ $i }}" name="picture" />
            <button type="submit" class="btn m-3 btn-light w3-card  text-center" >
                <img src=" {{ url('profile_pic/'.$i.'.png') }} " style="height:10rem">
            </button>
        </form>
        @endfor
        </div>
    </div>
@endsection