@extends('layouts.app')
@section('page_title')
<style>
#searchKey {
    width : 75% !important;
}
</style>

    <div class="d-flex justify-content-start">
        All Accounts
    </div>

    <div class="d-flex justify-content-end" style="position: relative; top: -3.9rem;">
        <form action="../../admin/users/search" method="POST" class="solas-search-bar">
            @csrf
            @if(isset($searchKey))
                <x-searchBar :query="$searchKey" />
            @else
                <x-searchBar />
            @endif
        </form>
    </div>

@endsection

@section('content')
<div class="solas-add-button">
    <div class="fab-container">
    <a href="{{ url('admin/users/add') }}" class="fab">+</a>
    </div>
</div>

<style>
    .solas-tag{
        width: 6rem;
        top: 1rem;
        margin-bottom: 0px;
        position: relative;
        top: -0.3rem;
        margin-left: 1rem;
    }
</style>

@foreach($results as $data)
    <x-display-account-horizontal :data="$data" /> 
@endforeach

@endsection