@extends('layouts.app')
@section('page_title')
Add Library
<style>
    .list {
    list-style: none;
    width: 100%;
    background-color: #ffffff;
    border-radius: 0 0 5px 5px;
    }
    .list-items {
    padding: 10px 5px;
    }
    .list-items:hover {
    background-color: #dddddd;
    }
</style>
@endsection
@section('content')
<div class="ms-5 me-5">
    <form action="../library/add/process" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 mt-5">
            <label for="name" class="form-label">Title<span class="text-danger">*</span></label>
            <input type="text" value="{{ old('name') }}" placeholder="e.g. Laravel" name="name" id="name" class="form-control" required>
        </div>

        <div class="mb-3">

            <label for="description" class="form-label">Description<span class="text-danger">*</span></label>
            <textarea class="form-control" name="description" placeholder="Briefly describe what is your library about." id="description" rows="3" required>{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Tag(s)</label>
                <!-- For tags -->
                <div class="solas-container">
                    <div class="solas-tag-container">
                    <input id="solas-tag-input" placeholder="e.g. Machine Learning (Press Enter to add Tags)" />
                    </div>
                    <a id="tag-list">
                    </a>
                    <input type="hidden" id="tag" name="tag" value="{{ old('tag') }}" />
                </div>
            <ul class="list tags-list"></ul>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">License</label>
            <input type="text" id="license" value="{{ old('license') }}" placeholder="e.g. GNU General Public License" name="license" class="form-control">
            <ul class="list license-list"></ul>
        </div>

        <div class="mb-5">
            <!-- For language -->
            <label for="name" class="form-label">Language(s) used</label>
            <div class="solas-container">
                <div class="solas-language-container">
                <input id="solas-language-input" placeholder="e.g. Python (Press Enter to add Tags)" />
                </div>
                <a id="language-list">
                </a>
                <input type="hidden" id="language" name="language" value="{{ old('language') }}" />
            </div>
            <ul class="list language-list"></ul>
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

<script src="{{ asset('js\tags_lang.js') }}"></script>

<script>
    // Disable form submission when Enter key is pressed
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
        event.preventDefault();
        }
    });



    const tag_input = document.getElementById("solas-tag-input");
    const tag_class = "solas-tag-form";
    const tagContainer = document.querySelector(".solas-tag-container");

    const languages_input = document.getElementById("solas-language-input");
    const languages_class = "solas-language-form";
    const languagesContainer = document.querySelector(".solas-language-container");

    let tags_all = [];
    let languages_all = [];

    init_tag("solas-tag-input");
    init_language("solas-language-input");

    let license_id = "license"

    let licenses = [
        "GNU General Public License (GPL)",
        "Apache License",
        "MIT License",
        "BSD License",
        "Mozilla Public License",
        "Creative Commons License",
        "Eclipse Public License",
        "Affero General Public License (AGPL)",
        "Common Development and Distribution License (CDDL)",
        "Microsoft Public License (MS-PL)",
        "The Unlicense",
        "GNU Lesser General Public License (LGPL)",
        "Artistic License",
        "Boost Software License",
        "Eclipse Distribution License",
        "ISC License",
        "zlib/libpng License",
        "PostgreSQL License",
        "Apple Public Source License (APSL)",
        "Open Software License (OSL)",
        "GNU Affero General Public License Version 3 (AGPLv3)",
        "GNU Free Documentation License (GFDL)",
        "Mozilla Public License Version 2.0",
        "Common Public Attribution License Version 1.0 (CPAL)",
        "European Union Public License Version 1.1 (EUPL)",
        "Open Data Commons Open Database License (ODbL)",
        "Affero General Public License Version 1 (AGPLv1)",
        "Eclipse Public License Version 2.0 (EPL-2.0)",
        "University of Illinois/NCSA Open Source License",
        "GNU Lesser General Public License Version 2.1 (LGPLv2.1)",
        "Free Software Foundation Inc. (FSF) Free Documentation License (FDL)",
        "Unspecified",
    ];

    let tags = [
        @foreach($tag_names as $tag_name)
            "{{$tag_name["name"]}}",
        @endforeach       
    ];

    let languages = [
        @foreach($language_names as $language_name)
            "{{$language_name["name"]}}",
        @endforeach       
    ];

    let tag_id = "solas-tag-input";
    let language_id = "solas-language-input";

init_autocomplete(licenses, license_id, "license-list");
init_autocomplete(tags, tag_id, "tags-list");
init_autocomplete(languages, language_id, "language-list");
</script>

@endsection