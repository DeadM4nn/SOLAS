@extends('layouts.app')
@section('page_title')
<form action="../library/search" method="POST">
    @csrf
    <x-searchBar :query="$searchKey" />
</form>
@endsection

@section('content')

<p class="fw-light">
    @if(count($results)==0)
    No results found for "{{$searchKey}}"
    @else
    {{$amount}} results found for "{{$searchKey}}"
    @endif
</p>

@foreach($results as $data)
    <x-display-horizontal :data="$data" />
@endforeach

{{ $results->links('paginations/solas-pagination') }}
@endsection