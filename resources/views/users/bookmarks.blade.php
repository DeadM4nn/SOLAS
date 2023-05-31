@extends('layouts.app')
@section('page_title')
Bookmarks
@endsection
@section('content')
<div class="container">
  <div class="row">

    @if(count($data) == 0)
        <div class="col d-flex justify-content-center align-items-center">
            <div class="m-5">
                <img src="{{ url('images/frown.png') }}" style="width:10%; margin-left:40%; opacity:30%">
                <div class="fw-bold text-center fs-3 text-secondary p-5" style="opacity:50%; width:30%;
                margin-left:30%;">
                    Oh no! You haven't bookmarked any libraries in your account yet! 
                </div>
            </div>
        </div>
    @endif
    

    @foreach($data as $curr_data)
        <!-- alert-box -->
        <div id="alert-box-bookmark-{{$curr_data->id}}" class="solas-alert-bg" hidden>
            <div class="w3-display-container w3-display-middle">
                <div class="w3-card p-3 mb-3 solas-confirmation bg-white">
                    <div style="text-align:center;">
                        <b>Are you sure? This this change is permenant</b>.
                    </div>
                    <p class="card-text">

                            <div class="text-end">
                                <button class="btn btn-outline-dark" onclick="document.getElementById('alert-box-bookmark-{{$curr_data->id}}').hidden = true;">
                                    No
                                </button>
                                <form method="POST" action="{{ url('/user/bookmark/remove') }}" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="library_id" id="library_id" value="{{$curr_data->library_id}}">
                                    <input type="hidden" name="goto" id="goto" value="{{ url('user/bookmark') }}">
                                    <input type="hidden" name="bookmark_id" id="bookmark_id" value="{{$curr_data->id}}">
                                    <button type="submit" class="btn btn-primary">
                                        Yes
                                    </button>
                                </form>
                            </div>

                    </p>
                </div>
            </div>
        </div>



        <div class="col-md-3 mtb-2 d-flex align-items-stretch flex-column">
            @if(!$curr_data->up_to_date)
            <div class="text-center fw-bold text-white text-wrap bg-danger pt-1 pb-1">
                Updated
            </div>
            @endif
            <div class="card w3-card  h-100  mb-3">
            

                <div class="d-flex justify-content-between p-3">
                    <div class="fw-bold fs-5 text-gray-100">
                    <a class="btn btn-light me-3 mb-1 h-100 " href="{{ url('/user/bookmark/libraryupdate/'.$curr_data->library_id) }}">       
                            {{$curr_data->name}}
                    </a>
                    </div>
                    <div>
                        <div class="btn btn-light" type="image" class="pt-1 solas-bookmark-icon"  onclick="document.getElementById('alert-box-bookmark-{{$curr_data->id}}').hidden = false;">
                            <img style="height:1.6rem;" src="{{ asset('icons/delete.png') }}" />
                        </div>
                    </div>
                </div>
                <div class="mb-1">
                    <hr style="width:90%; margin:auto;">
                </div>
                <div class="ps-3 pe-3 pt-1 text-start">
                    <x-widget-tag :id="$curr_data->library_id" />
                    <x-widget-license :id="$curr_data->library_id" />
                </div>

            </div>

            </div>
    @endforeach


  </div>
</div>
@endsection