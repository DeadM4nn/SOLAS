@extends('layouts.app')
@section('page_title')
Bookmarks
@endsection
@section('content')
<div class="container">
  <div class="row">
    @foreach($data as $curr_data)
        <div class="col-md-3 mtb-2 d-flex align-items-stretch flex-column">
            @if(!$curr_data->up_to_date)
            <div class="text-center fw-bold text-white text-wrap bg-danger pt-1 pb-1">
                Updated
            </div>
            @endif
            <div class="card w3-card  h-100 ">
            <a class="btn btn-light mb-1 h-100 " href="{{ url('/user/bookmark/libraryupdate/'.$curr_data->library_id) }}">

                <div class="d-flex justify-content-between p-3">
                    <div class="fw-bold fs-5 text-gray-100">       
                            {{$curr_data->name}}
                    </div>
                    <div>
                        <form style="display:inline-block;" action="{{ url('/user/bookmark/remove') }}" method="POST">
                            @csrf
                            <input type="hidden" name="library_id" id="library_id" value="{{$curr_data->library_id}}">
                            <input class="btn btn-light" type="image" class="pt-1 solas-bookmark-icon" style="height:2.3rem;"

                            src="{{ asset('icons/delete.png') }}"
                            >
                        </form>
                    </div>
                </div>
                <div class="mb-1">
                    <hr style="width:90%; margin:auto;">
                </div>
                <div class="ps-3 pe-3 pt-1 text-start">
                    <x-widget-tag :id="$curr_data->library_id" />
                    <x-widget-license :id="$curr_data->library_id" />
                </div>
                </a>
            </div>

            </div>
    @endforeach
  </div>
</div>
@endsection