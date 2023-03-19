@extends('layouts.app')
@section('page_title')
Add Library
@endsection
@section('content')
<div class="ms-5 me-5">
    <form action="../library/add/process" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 mt-5">
            <label for="name" class="form-label">Title<span class="text-danger">*</span></label>
            <input type="text" value="{{ old('name') }}" placeholder="e.g. Laravel" name="name" id="name" class="form-control" required>
        </div>

        <div class="mb-5">

            <label for="description" class="form-label">Description<span class="text-danger">*</span></label>
            <textarea class="form-control" name="description" placeholder="Briefly describe what is your library about." id="description" rows="3" required>{{ old('description') }}</textarea>
        </div>

        <hr class="hr" style="color: #acacac;" width=100%>

        <h3 class="mb-5 fw-bold">Please provide the source link, installation command and/or upload the file.</h3>

        <div class="mb-3">
        <label for="command" class="form-label">Command</label>
        <input type="text" id="command" placeholder="e.g. npm install react" value="{{ old('command') }}" name="command" class="form-control">
        </div>

        <div class="mb-3">
        <label for="link" class="form-label">Source</label>
        <input type="text" id="link" placeholder="e.g. https://github.com/laravel/laravel" value="{{ old('link') }}" name="link" class="form-control">
        </div>

        @error('command')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <hr class="hr" style="color: #acacac;" width=100%>

        <div class="mb-4 mt-3">
        <label for="name" class="form-label">File Upload<span class="text-danger">*</span></label>
            <input class="form-control form-control-lg" name="library_file" id="library_file" type="file" enctype="multipart/form-data" required>
            <div class="fs-6 fw-light">Please choose or drag and drop the file. This form only accepts .zip file</div>
        </div>

        @error('library_file')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror


        <div class="mb-3">
            <label for="name" class="form-label">Version Number</label>
            <input type="text" placeholder="e.g. 1.90.2 (Only required if uploading a file)" value="{{ old('version') }}" name="version" id="version" class="form-control" required>
        </div>

        @error('version')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror


        <div class="mb-5">
            <label for="file_description" class="form-label">Version Description</label>
            <textarea class="form-control" placeholder="Briefly describe what is updated or what is in the file (Only required if uploading a file)" name="file_description" id="file_description" rows="3" required>{{ old('file_description') }}</textarea>
        </div>

        @error('file_description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div>
            <x-button class="mt-4 btn btn-primary" style="width:100%; background:#0E7FC0;">
                Add
            </x-button>
        </div>
    </form>
</div>

@endsection