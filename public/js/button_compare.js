let save = document.getElementById("save_button");
save.hidden = true;

function compare_toggle(button) {
    if (button.innerHTML === "Compare +") {
      button.disabled = true;
      button.innerHTML = "Added";
    }
  }

  function reveal_button(){
    save.hidden = false;
  }