@extends('layouts.app')
@section('page_title')
Add Library
@endsection
@section('content')
<div class="ms-5 me-5">
    <form action="../library/add/process" method="POST">
        @csrf
        <div class="mb-3 mt-5">
            <label for="name" class="form-label">Title</label>
            <input type="name" id="name" class="form-control">
            <div id="TitleHelp" class="form-text"></div>
        </div>

        <div class="mb-5">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" name="description" id="description" rows="3"></textarea>
        </div>

        <hr class="hr" style="color: #acacac;" width=100%>

        <div class="mb-3">
        <label for="command" class="form-label">Command</label>
        <input type="command" id="command" class="form-control">
        </div>

        <div class="mb-3">
        <label for="command" class="form-label">Source</label>
        <input type="source" id="source" class="form-control">
        </div>

        <div>
            <x-button class="mt-4 btn btn-primary" style="width:100%; background:#0E7FC0;">
                Add
            </x-button>
        </div>
    </form>
</div>

@endsection