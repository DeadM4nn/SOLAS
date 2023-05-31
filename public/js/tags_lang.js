
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
    console.log("Language = "+ document.getElementById("language").value);
    return languageContentList;
}