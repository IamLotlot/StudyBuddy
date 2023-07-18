//// Drag or move function for the notepad
const parentDiv = document.getElementById("notepad");
const childDiv = document.getElementById("tab");

let isDragging = false;
let offsetX, offsetY;

childDiv.addEventListener("mousedown", (event) => {
  isDragging = true;
  offsetX = event.clientX - parentDiv.offsetLeft;
  offsetY = event.clientY - parentDiv.offsetTop;
});

document.addEventListener("mousemove", (event) => {
  if (isDragging) {
    const newX = event.clientX - offsetX;
    const newY = event.clientY - offsetY;

    parentDiv.style.left = newX + "px";
    parentDiv.style.top = newY + "px";
  }
});

document.addEventListener("mouseup", () => {
  isDragging = false;
});

//// Function for the x icon on notepad
$(document).ready(function() {
    $("#close-icon").click(function() {
      $("#notepad").hide();
    });
  });
