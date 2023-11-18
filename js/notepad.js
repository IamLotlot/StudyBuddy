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

    if (global_online_username.length != 0){
      var con = $("#title-con");
      var title = $("#add-title");
      var content = $("#add-content");
      
      if (title.is(":hidden") && content.is(":hidden") && con.is(":hidden")){
        $("#title-con").show();
        $("#add-title").show();
        $("#add-content").show();
  
      } else {
        $("#title-con").hide();
        $("#add-title").hide();
        $("#add-content").hide();
      }
    } else {

      notif_message = "You need to be logged in";
      notification(notif_message);
    }
  });
});

//// Share notes function
function shareNote(id){
  $("#notepad").hide();
  $("#share-to-buddy").show();
  localStorage.setItem('note_id', id);
}

//// Add note save function
$(document).ready(function() {
  $('.fa-floppy-disk').click(function() {
    var title = $("#add-title").val();
    var content = $("#add-content").val();
    var username = localStorage.getItem("online");
    
    if (title || content){
      $.post("note_add.php", { title: title, content: content, username:username })
        .done(function (data){

            if (data == "Success"){

              notif_message = "New note created";
              notification(notif_message);

              setTimeout(function () {
                window.location.reload();
              }, 4000);
              // $(document).ready(function() {
              //   function reloadDivContent() {
              //       var currentURL = window.location.href;
              //       $("#notepad").load(currentURL + "#notepad");
              //   }
              // });
            } else if (data == "Failed") {

              notif_message = "Failed to create a note";
              notification(notif_message);
              
            } else if (data == "Title") {
              
              notif_message = "Title is empty";
              notification(notif_message);
              
            } else if (data == "Content") {
              
              notif_message = "Content is empty";
              notification(notif_message);
              
            } else if (data == "Username") {
              
              notif_message = "You need to be logged in";
              notification(notif_message);
              
            } else if (data == "Data") {
              
              notif_message = "Kindly re-log in";
              notification(notif_message);
              
            } else {
              console.log(data);
            }
        });
    } else {
              
      notif_message = "Title or content is empty";
      notification(notif_message);
      
    }
  });
});

//// Delete notes function
function deleteNote(id){
  if (window.confirm("Are you sure you want to remove this note?")){
    $.post("delete_note.php", { id: id })
    .done(function (data){
      if (data == "Success"){

        notif_message = "Removed a note";
        notification(notif_message);

      } else if (data == "Failed"){
              
        notif_message = "Failed to delete a note";
        notification(notif_message);
        
      } else if (data == "User"){
              
        notif_message = "Note ID is invalid";
        notification(notif_message);
        
      } else if (data == "Unknown"){
              
        notif_message = "Unknown note ID";
        notification(notif_message);
        
      } else {

        console.log(data);
      }
  });
  }
}

//// Function for sharing a note to a selected buddy
function selectBuddy(username){
  var id = localStorage.getItem('note_id');
  var username = username;
  if (username){
    $.post("send_note.php", { id: id, username: username })
    .done(function (data){
      if (data == "Success"){

        notif_message = "Sent a note to "+username;
        notification(notif_message);
        
        $("#share-to-buddy").hide();
        $("#notepad").show();

      } else if (data == "Failed"){
              
        notif_message = "Failed to send the note";
        notification(notif_message);
        
      } else if (data == "Unknown"){
              
        notif_message = "Failed to send the note";
        notification(notif_message);
        
      } else {

        console.log(data);
      }
  });
  }
}

//// Hide the buddy list UI after sharing a noe
$(document).ready(function() {
  $('#share-to-buddy').click(function() {
    // $("#share-to-buddy").hide();
    $("#share-to-buddy").toggle();
  });
});