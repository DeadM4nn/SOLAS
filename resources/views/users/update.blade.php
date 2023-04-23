@extends('layouts.app')
@section('page_title')
Update {{$user->username}}
@endsection
@section('content')

@php
        if(auth()->user()->is_admin){
                $link = '/admin/users/update_process';
        }else{
                $link = 'user/update_process/';
        }

@endphp

<form action="{{url( $link )}}" method="POST">
    @csrf
    <!-- id -->
    <input name="id" id="id" type="hidden" value="{{$user->id}}" >
    
    @error('username')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <!-- Username -->
    <div class="mb-3 mt-5">
            <label for="username" class="form-label">Username</label>
            <input name="username" id="username" type="text" value="{{ old('username',$user->username) }}"  class="form-control" oninput="document.getElementById('username-confirm').value = this.value">
    </div>

    <!-- Email -->
    <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input name="email" id="email" type="email" value="{{ old('email',$user->email) }}"  class="form-control" oninput="document.getElementById('email-confirm').value = this.value">
    </div>

        <button type="button" class="mt-4 btn btn-primary" style="width:100%; background:#0E7FC0;" onclick="document.getElementById('alert-confirm').hidden = false;">
                Update
        </button>

<!-- Confirmation Box -->
<div id="alert-confirm" class="solas-alert-bg" hidden>
    <div class="w3-display-container w3-display-middle">
        <div class="container w3-card bg-white p-5">
            <div class="row">
                <h1 class="col-12 mb-5">
                    Please confirm submission.
                </h1>
                <!-- Email -->
                <div class="row mb-3">
                    <div class="fw-bold fs-5 me-5 col-5">E-mail</div>
                    <input class="col-5  fs-5" name="email-confirm" id="email-confirm" type="email" value="{{ old('email',$user->email) }}" class="form-control" disabled required>
                </div>
                <!-- Username -->
                <div class="row mb-3">
                    <div class="fw-bold fs-5 me-5 col-5">Username</div>
                    <input class="col-5 fs-5" name="username-confirm" id="username-confirm" type="text" value="{{ old('username',$user->username) }}" class="form-control" disabled required>
                </div>

                <button type="button" class="mt-4 col-5 me-5 btn btn-outline-dark" onclick="document.getElementById('alert-confirm').hidden = true;">
                    Cancel
                </button>
                <x-button class="col-5 mt-4 btn btn-primary" style="background:#0E7FC0;">
                    Continue
                </x-button>
            </div>
        </div>
    </div>
</div>

</form>
@endsection