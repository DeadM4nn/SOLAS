function compare_toggle(button) {
    if (button.innerHTML === "Compare +") {
      button.disabled = true;
      button.innerHTML = "Added";
    }
  }
