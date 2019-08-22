function addMsg(event) { 
    var clickedButton = event.target;
    clickedButton.classList.add("success");
}

var buttons = document.getElementsByClassName("sharer");

for(var i = 0; i < buttons.length; i += 1) {
    buttons[i].addEventListener("click", addMsg, false);
}   