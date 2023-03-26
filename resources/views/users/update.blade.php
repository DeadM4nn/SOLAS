@extends('layouts.app')
@section('page_title')
Update {{$user->username}}
@endsection
@section('content')
<form action="{{url( '/admin/users/update_process' )}}" method="POST">
    @csrf
    <!-- id -->
    <input name="id" id="id" type="hidden" value="{{$user->id}}" >


    <!-- Username -->
    <div class="mb-3 mt-5">
            <label for="username" class="form-label">Username</label>
            <input name="username" id="username" type="text" value="{{ old('username',$user->username) }}"  class="form-control" required>
    </div>

    <!-- Email -->
    <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input name="email" id="email" type="text" value="{{ old('email',$user->email) }}"  class="form-control" required>
    </div>

    <x-button class="mt-4 btn btn-primary" style="width:100%; background:#0E7FC0;">
                Update
    </x-button>
</form>
@endsection