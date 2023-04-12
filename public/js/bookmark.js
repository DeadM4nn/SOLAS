var bookmark_icon = document.getElementsByClassName("solas-bookmark-icon");
var bookmark_icon_activated = document.getElementsByClassName("solas-bookmark-icon-activated");

var assetBaseUrl = window.assetBaseUrl;

console.log(bookmark_icon.length);
console.log(bookmark_icon_activated.length);

for (var i = 0; i < bookmark_icon.length; i++) {

    //console.log(typeof bookmark_icon[i]);
    //console.log(typeof bookmark_icon_activated[i]);

    //bookmark_icon[i].addEventListener("mouseover", function() {
    //    this.src = assetBaseUrl + "icons/bookmark_hover.png";
    //});

    //bookmark_icon[i].addEventListener("mouseout", function() {
    //    this.src = assetBaseUrl + "icons/bookmark.png";
    //});

    //bookmark_icon_activated[i].addEventListener("mouseover", function() {
    //    this.src = assetBaseUrl + "icons/bookmark.png";
    //});

    //bookmark_icon_activated[i].addEventListener("mouseout", function() {
    //    this.src = assetBaseUrl + "icons/bookmark_hover.png";
    //});

    bookmark_icon[i].addEventListener("click", toggleElements.bind(null, bookmark_icon[i], bookmark_icon_activated[i]));

    bookmark_icon_activated[i].addEventListener("click", toggleElements1.bind(null, bookmark_icon[i], bookmark_icon_activated[i]));



}


function toggleElements(element, element1) {
    //console.log(element)
    //console.log(element1)
    //console.log(element2)

    if (element.style.display === "none") {
        element.style.display = "inline-block";
        element1.style.display = "none";
      } else {
        element.style.display = "none";
        element1.style.display = "inline-block";
      }
  }
  
  function toggleElements1(element1, element) {
    //onsole.log(element)
    //console.log(element1)
    //console.log(element2)

    if (element1.style.display === "none") {
        element1.style.display = "inline-block";
        element.style.display = "none";
      } else {
        element1.style.display = "none";
      element.style.display = "inline-block";
     }
  }
  