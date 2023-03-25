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
        "Python",
        "C++",
        "Javascript",
    ]

    let tag_id = "solas-tag-input";
    let language_id = "solas-language-input";

init_autocomplete(licenses, license_id, "license-list");
init_autocomplete(tags, tag_id, "tags-list");
init_autocomplete(languages, language_id, "language-list");

// This code was taken from : 
// https://codingartistweb.com/2021/12/autocomplete-suggestions-on-input-field-with-javascript/
// Edited by Muhammad Bin Iskandar to be inside functions instead
function init_autocomplete(item_list, input_field, list_class){

    //Sort names in ascending order
    let sortedNames = item_list.sort();
    //reference
    let input = document.getElementById(input_field);
    //Execute function on keyup
    input.addEventListener("keyup", (e) => {
    //loop through above array
    //Initially remove all elements ( so if user erases a letter or adds new letter then clean previous outputs)
    removeElements();
    for (let i of sortedNames) {
        //convert input to lowercase and compare with each string
        if (
        i.toLowerCase().startsWith(input.value.toLowerCase()) &&
        input.value != ""
        ) {
            //create li element
            let listItem = document.createElement("li");
            //One common class name
            listItem.classList.add("list-items");
            listItem.style.cursor = "pointer";
            listItem.setAttribute("onclick", "displayNames('" + i + "','" + input_field + "')");
            //Display matched part in bold
            let word = "<b>" + i.substr(0, input.value.length) + "</b>";
            word += i.substr(input.value.length);
            //display the value in array
            listItem.innerHTML = word;
            document.querySelector("."+list_class).appendChild(listItem);
        }
    }
    });
}

function removeElements() {
  //clear all the item
  let items = document.querySelectorAll(".list-items");
  items.forEach((item) => {
    item.remove();
  });
}

function displayNames(value, input_field) {
    document.getElementById(input_field).value = value;
    
    //trigger the enter event
    const myInputField = document.getElementById(input_field);
    const enterKeyEvent = new KeyboardEvent("keyup", { key: "Enter" });
    myInputField.dispatchEvent(enterKeyEvent);
    
    removeElements();
}


function createLanguage(label){
    const div = document.createElement('div');
    const span = document.createElement('span');
    span.setAttribute('class', languages_class);
    span.innerHTML = label + " ×";
    div.appendChild(span);
    return div;
}

function createTag(label){
    const div = document.createElement('div');
    const span = document.createElement('span');
    span.setAttribute('class', tag_class);
    span.innerHTML = label + " ×";
    div.appendChild(span);
    return div;
}

function init_language(input_field_id){
    let input = document.getElementById(input_field_id);
    input.addEventListener('keyup', function(e){
        if(e.key == 'Enter'){
            //Check for duplicants
            if(!languages_all.includes(input.value)){
                //Creates the tag
                const curr_language = createLanguage(input.value);
                languagesContainer.prepend(curr_language);
                //Add event listener to remove tag
                curr_language.addEventListener('click', function(){
                languages_all = get_languages();
                curr_language.remove();

                console.log(get_languages());

                });
                //Put it inside the list so that later can be passed through the form easily
                languages_all.unshift(input.value);
            }
            input.value = '';
            console.log(get_languages());
        }
    });

    //Create languages that was alr there
    let language_hidden_input = document.getElementById("language").getAttribute('value');;
    current_languages = language_hidden_input.split("<=>");
    for (const item in current_languages) {
        //Creates the Language
        if(current_languages[item] == " " || current_languages[item] == ""){
            break;
        }
        const curr_language = createLanguage(current_languages[item]);
        languagesContainer.prepend(curr_language);
        //Add event listener to remove language
        curr_language.addEventListener('click', function(){
            languagess_all = get_languages();
            curr_language.remove();
            console.log(get_languages());
        });
        languages_all = get_languages();
    }
}


function init_tag(input_field_id){
    let input = document.getElementById(input_field_id);
    input.addEventListener('keyup', function(e){
        if(e.key == 'Enter'){
            //Check for duplicants
            if(!tags_all.includes(input.value)){
                //Creates the tag
                const tag = createTag(input.value);
                tagContainer.prepend(tag);
                //Add event listener to remove tag
                tag.addEventListener('click', function(){
                tags_all = get_tags();
                tag.remove();
                console.log(get_tags());
                });
                //Put it inside the list so that later can be passed through the form easily
                tags_all.unshift(input.value);
            }
            input.value = '';
            tags_all = get_tags();
            console.log(get_tags());
        }
    });

    //Create Tags that was alr there
    let tag_hidden_input = document.getElementById("tag").getAttribute('value');;
    current_tags = tag_hidden_input.split("<=>");
    for (const item in current_tags) {
        if(current_tags[item] == " " || current_tags[item] == ""){
            break;
        }
        //Creates the tag
        const tag = createTag(current_tags[item]);
        tagContainer.prepend(tag);
        //Add event listener to remove tag
        tag.addEventListener('click', function(){
            tags_all = get_tags();
            tag.remove();
            console.log(get_tags());
        });
        tags_all = get_tags();
    }
}

function get_tags(){
	let tagElements = document.querySelectorAll(".solas-tag-form");
	let tagContentList = [];

	tagElements.forEach((element) => {
      let tagContent = element.textContent.trim();
      tagContentList.push(tagContent);
		});
     
    tagContentList.forEach((tag, index) => {
  	tagContentList[index] = tag.replace(" ×", "");
	});
    document.getElementById("tag").value = tagContentList.join("<=>");
    console.log(document.getElementById("tag").value);
    return tagContentList;
}

function get_languages(){
	let languageElements = document.querySelectorAll(".solas-language-form");
	let languageContentList = [];

	languageElements.forEach((element) => {
      let languageContent = element.textContent.trim();
      languageContentList.push(languageContent);
		});
     
    languageContentList.forEach((lang, index) => {
  	languageContentList[index] = lang.replace(" ×", "");
	});
    document.getElementById("language").value = languageContentList.join("<=>")
    return languageContentList;
}
</script>

@endsection