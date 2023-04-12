@extends('layouts.app')
@section('page_title')
<form action="../library/search" method="POST">
    @csrf
    @if(isset($searchKey))
        <x-searchBar :query="$searchKey" />
    @else
        <x-searchBar />
    @endif
</form>
@endsection

@section('content')

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

{{ $results->links('paginations/solas-pagination') }}
@endsection