@extends('layouts.app')
@section('page_title')
    All Accounts
@endsection

@section('content')


@foreach($results as $data)
    @if(!$data["is_admin"])
        <x-display-account-horizontal :data="$data" />
    @endif
@endforeach

@endsection