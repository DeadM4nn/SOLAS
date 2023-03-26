@extends('layouts.app')
@section('page_title')
    All Accounts
@endsection

@section('content')

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