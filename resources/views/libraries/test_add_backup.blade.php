<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

<!-- For tags -->
<div class="container">
	<div class="solas-tag-container">
      <input id="solas-tag-input" placeholder="e.g. Machine Learning (Press Enter to add Tags)" />
    </div>
	<a id="tag-list">
    </a>
</div>


<!-- For language -->
<div class="container">
	<div class="solas-language-container">
      <input id="solas-language-input" placeholder="e.g. Python (Press Enter to add Tags)" />
    </div>
	<a id="language-list">
    </a>
</div>

<style>
</style>




<script>
const tag_input = document.getElementById("solas-tag-input");
const tag_class = "solas-tag";
const tagContainer = document.querySelector(".solas-tag-container");

const languages_input = document.getElementById("solas-language-input");
const languages_class = "solas-language";
const languagesContainer = document.querySelector(".solas-language-container");

let tags_all = [];
let languages_all = [];

init_tag("solas-tag-input");
init_language("solas-language-input");

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
                const language = createLanguage(input.value);
                languagesContainer.prepend(language);
                //Add event listener to remove tag
                language.addEventListener('click', function(){
                languages_all = get_languages();
                language.remove();

                console.log(get_languages());

                });
                //Put it inside the list so that later can be passed through the form easily
                languages_all.unshift(input.value);
            }
            input.value = '';
            console.log(get_languages());
        }
    });
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
}

function get_tags(){
	let tagElements = document.querySelectorAll(".solas-tag");
	let tagContentList = [];

	tagElements.forEach((element) => {
      let tagContent = element.textContent.trim();
      tagContentList.push(tagContent);
		});
     
    tagContentList.forEach((tag, index) => {
  	tagContentList[index] = tag.replace(" ×", "");
	});
    return tagContentList;
}

function get_languages(){
	let languageElements = document.querySelectorAll(".solas-language");
	let languageContentList = [];

	languageElements.forEach((element) => {
      let languageContent = element.textContent.trim();
      languageContentList.push(languageContent);
		});
     
    languageContentList.forEach((lang, index) => {
  	languageContentList[index] = lang.replace(" ×", "");
	});
    return languageContentList;
}
</script>