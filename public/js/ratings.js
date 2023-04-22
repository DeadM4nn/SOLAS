
let rate_value = document.getElementById("rate-value");
let rate_value_form = document.getElementById("rating");
let stars = [
    document.getElementById("rating-star-1"),
    document.getElementById("rating-star-2"),
    document.getElementById("rating-star-3"),
    document.getElementById("rating-star-4"),
    document.getElementById("rating-star-5"),
];

let stars_solid = [
    document.getElementById("rating-star-1-solid"),
    document.getElementById("rating-star-2-solid"),
    document.getElementById("rating-star-3-solid"),
    document.getElementById("rating-star-4-solid"),
    document.getElementById("rating-star-5-solid"),
];


// Preload the images
let starImg = new Image();
starImg.src = assetUrl + '/icons/star.png';
let solidStarImg = new Image();
solidStarImg.src = assetUrl + '/icons/star_solid.png';

function hide_panel(id = -1){
    let panel = document.getElementById("solas-ratings-panel-"+id);
    panel.hidden = true;
}

function show_panel(id = -1){
    let panel = document.getElementById("solas-ratings-panel-"+id);
    console.log(id);
    panel.hidden = false;
}

function change_star(value){

    // Hide all stars
    for(let i=0; i<5; i++){
        stars[i].hidden = true;
        stars_solid[i].hidden = true;
    }

    //Show solids
    for(let i=0; i<value; i++){
        stars_solid[i].hidden = false;
    }

    //Show Empty
    for(let i=value; i<5; i++){
        stars[i].hidden = false;
    }

    rate_value.innerHTML = value;
    rate_value_form.value = value;
}

//Init
change_star(1);