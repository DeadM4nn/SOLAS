@extends('layouts.app')
@section('page_title')
    My Libraries
@endsection

@section('content')
<x-add-button />
<p class="fw-light">
    @if(isset($searchKey))
        @if($amount == 0)
            No results found for "{{$searchKey}}"
        @else
            {{$amount}} results found for "{{$searchKey}}"
        @endif
    @else
        @if($amount == 0)
                <div class="col d-flex justify-content-center align-items-center">
                    <div class="m-5">
                        <img src="{{ url('images/frown.png') }}" style="width:10%; margin-left:40%; opacity:30%">
                        <div class="fw-bold text-center fs-3 text-secondary p-5" style="opacity:50%; width:30%;
                        margin-left:30%;">
                            Oh no! You haven't uploaded any of your libraries to SOLAS yet! Consider adding new ones
                        </div>
                    </div>
                </div>
        @else
            {{$amount}} results found
        @endif
    @endif
</p>

@foreach($results as $data)
    <x-display-horizontal :data="$data" />
@endforeach


@endsection