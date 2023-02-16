@extends('layouts/solas_layout')
@section('page_title')
<form action="../library/search" method="POST">
    @csrf
    <x-searchBar/>
</form>
@endsection

@section('content')
<p class="fw-light">
    @if(count($results)==0)
    No results found.
    @else
    {{count($results)}} results found
    @endif
    <x-alert-box/>
</p>
@foreach($results as $data)
    <x-display-horizontal :data="$data" />
@endforeach


@endsection