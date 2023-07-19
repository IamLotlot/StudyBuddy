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

//// When the title is clicked it will show the content and other icons
$(document).ready(function() {
  $('.title').click(function() {
    const id = $(this).attr('id');
    
    // Call your function and pass the labelID as an argument
    showContent(id);
  });
});

function showContent(id) {
  var content = $("#content"+id);

  if (content.is(":hidden")){
    $("#content"+id).show();
    $("#share-icon").show();
    $("#save-icon").show();

  } else {
    $("#content"+id).hide();
    $("#share-icon").hide();
    $("#save-icon").hide();
  }
}

//// Add notes function
$(document).ready(function() {
  $('#add-icon').click(function() {
    var title = $("#add-title");
    var content = $("#add-content");
    
    if (title.is(":hidden") && content.is(":hidden")){
      $("#add-title").show();
      $("#add-content").show();

    } else {
      $("#add-title").hide();
      $("#add-content").hide();
    }
  });
});