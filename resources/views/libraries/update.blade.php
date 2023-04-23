@extends('layouts.app')
@section('page_title')
Update {{$library->name}}
@endsection
@section('content')
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
<div class="ms-5 me-5">
    <form action="{{url( '/library/update/process' )}}" method="POST" id="library-form">
        @csrf
        <div class="mb-3 mt-5">
            <label for="name" class="form-label">Title</label>
            <input type="text" value="{{ old('name',$library->name) }}" placeholder="e.g. Laravel" name="name" id="name" class="form-control" required>
        </div>

        <input type="hidden" value="{{ old('library_id', $library->library_id) }}" placeholder="e.g. Laravel" name="library_id" id="library_id" class="form-control" required>


        <div class="mb-3">

            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" placeholder="Briefly describe what is your library about." id="description" rows="3" required>{{ old('description', $library->description) }}</textarea>
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
                    <input type="hidden" id="tag" name="tag" value="{{$tags}}" />
                </div>
            <ul class="list tags-list"></ul>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">License</label>
            <input type="text" id="license" value="{{ old('license',  $library->license) }}" placeholder="e.g. GNU General Public License" name="license" class="form-control">
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
                <input type="hidden" id="language" name="language" value="{{$languages}}" />
            </div>
            <ul class="list language-list"></ul>
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
            <button type="button" onclick="show_confirmation()" class="mt-4 btn btn-primary" style="width:100%; background:#0E7FC0;">
                Update
            </button>
        </div>


<!-- Confirmation box -->
<div id="confirmation-panel" class="solas-alert-bg p-5" hidden>
<div class="container bg-white w3-card p-5">
    <h1 class="col-12 mb-5">
        Please confirm submission.
    </h1>

	<div class="row mb-3">
		<div class="col-6">Title<span class="text-danger">*</span></div>
		<input class="col-6 required-input" type="text" value="" placeholder="REQUIRED" id="name-confirmation" disabled>
	</div>

	<div class="row mb-3">
		<div class="col-6">Description<span class="text-danger">*</span></div>
		<textarea class="col-6 required-input" placeholder="REQUIRED" id="description-confirmation" rows="3" disabled></textarea>
	</div>

	<div class="row mb-3">
		<div class="col-6">Tag(s)</div>
		<div class="col-6" id="tag-confirmation">None</div>
		<a id="tag-list-confirmation"></a>
	</div>

	<div class="row mb-3">
		<div class="col-6">License</div>
		<input class="col-6" type="text" id="license-confirmation" value="" placeholder="Unspecified" disabled/>
	</div>

	<div class="row mb-3">
		<div class="col-6">Language(s) used</div>
		<div class="col-6" id="language-confirmation" >
            None
        </div>
	</div>


	<div class="row mb-3">
		<div class="col-6">Command</div>
		<input class="col-6" type="text" id="command-confirmation" placeholder="Unspecified" value="" disabled/>
	</div>

	<div class="row mb-3">
		<div class="col-6">Source</div>
		<input class="col-6" type="text" id="link-confirmation" placeholder="Unspecified" value="" disabled/>
	</div>

    <div class="row">
        <button type="button" class="mt-4 btn me-5 btn-outline-dark col-5" onclick="hide_confirmation()">
            Continue filling form
        </button>
        <button id="submit-button" type="submit" class="mt-4 btn btn-primary col-6" disabled>
            Add
        </button>
    </div>
    
</div>
</div>


<script>
    let confirmation_panel = document.getElementById('confirmation-panel');

    let confirmation_ids = [
        'name',
        'license',
        'command',
        'link',
        'description',
    ];



    function hide_confirmation(){
        confirmation_panel.hidden = true; 
    }

    function show_confirmation(){
        confirmation_panel.hidden = false;
        let fileInput = document.getElementById('library_file');

        // Handling Tags
        let tag_list_confirmation = document.getElementById('tag').value.split('<=>').map(item => `<div class="text-wrap d-inline badge bg-primary m-1">${item}</div>`).join("");

        // Handling Tags
        let lang_list_confirmation = document.getElementById('language').value.split('<=>').map(item => `<div class="text-wrap d-inline badge bg-success m-1">${item}</div>`).join("");

        if(document.getElementById('tag').value != ""){
            document.getElementById('tag-confirmation').innerHTML = tag_list_confirmation;
        } 

        if(document.getElementById('language').value != ""){
            document.getElementById('language-confirmation').innerHTML = lang_list_confirmation;
        }

        //Updating the values
        for(let i = 0; i < confirmation_ids.length; i++){
            document.getElementById(confirmation_ids[i]+"-confirmation").value = document.getElementById(confirmation_ids[i]).value;
        }

        //Check validity
        let form = document.getElementById('library-form');
        let submit_btn = document.getElementById('submit-button');

        submit_btn.disabled = !form.checkValidity();
    }
</script>

<style>
    .required-input::placeholder{
        color: #dc3545;
        font-weight: bold;
    }
</style>

<!-- confirmation box -->

</form>


@if(!auth()->user()->is_admin)
    <section id="upload">
    <form method="POST" action="{{ url('library/upload') }}" enctype="multipart/form-data">
        @csrf
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

        <input type="hidden" name="library_id" id="library_id" value="{{ $library->library_id }}">

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
    </section>
@endif
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