@extends('layouts.app')
@section('page_title')
Update {{$library->name}}
@endsection
@section('content')
<div class="ms-5 me-5">
    <form action="{{url( '/library/update/process' )}}" method="POST">
        @csrf
        <div class="mb-3 mt-5">
            <label for="name" class="form-label">Title</label>
            <input type="text" value="{{ old('name',$library->name) }}" placeholder="e.g. Laravel" name="name" id="name" class="form-control" required>
        </div>

        <input type="hidden" value="{{ old('library_id', $library->library_id) }}" placeholder="e.g. Laravel" name="library_id" id="library_id" class="form-control" required>


        <div class="mb-5">

            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" placeholder="Briefly describe what is your library about." id="description" rows="3" required>{{ old('description', $library->description) }}</textarea>
        </div>

        <hr class="hr" style="color: #acacac;" width=100%>

        <div class="mb-3">
        <label for="command" class="form-label">Command</label>
        <input type="text" id="command" placeholder="e.g. npm install react" value="{{ old('command', $library->command) }}" name="command" class="form-control">
        </div>

        <div class="mb-3">
        <label for="link" class="form-label">Source</label>
        <input type="text" id="link" placeholder="e.g. https://github.com/laravel/laravel" value="{{ old('link', $library->link) }}" name="link" class="form-control">
        </div>

        @error('command')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div>
            <x-button class="mt-4 btn btn-primary" style="width:100%; background:#0E7FC0;">
                Update
            </x-button>
        </div>
        </form>
        
        <form>
        <hr class="hr" style="color: #acacac;" width=100%>
        <div class="fs-3 fw-bold">Upload new file to {{$library->name}}</div>

        <div class="mb-4 mt-3">
        <label for="name" class="form-label">File Upload</label>
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
                Upload
            </x-button>
        </div>
    </form>
</div>

@endsection