@extends('layouts.app')
@section('page_title')
    My Libraries
@endsection

@section('content')
<x-add-button />
<p class="fw-light">
    @if(isset($searchKey))
        @if(count($results)==0)
            No results found for "{{$searchKey}}"
        @else
            {{$amount}} results found for "{{$searchKey}}"
        @endif
    @else
        {{$amount}} results found
    @endif
</p>

@foreach($results as $data)
    <x-display-horizontal :data="$data" />
@endforeach


@endsection