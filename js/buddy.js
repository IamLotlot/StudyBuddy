//// Global variables
var global_userid;
var global_buddyid;
var global_buddyname;
var global_groupid;
var global_count = false;

//// Functions
// $.fn.updateChat = function() {
//   $("#msgBtn").click();
//   $("#msgTxt").val("");
//   $("#messages").scrollTop($("#messages")[0].scrollHeight);
// };

//// Page loads
$(document).ready(function() {
  $("#messages").scrollTop($("#messages")[0].scrollHeight);
  $("#msgCon").hide();
});

//// When the Send Icon in message is click it will activate the send button and clear the chat box
$(document).ready(function() {
    $("#msgIcon").click(function() {
      sendMessage();
    });
  });

//// When the chat box in message is entered it will send the message then clear the chat box
// $("#msgTxt").on("keydown", function(event) {
//   if (event.key === "Enter") {
//     sendMessage();
//     event.preventDefault(); // Prevent form submission (if needed)
//   }
// });

//// Keeps the messages on the newest message
$(document).ready(function() {
  // Scroll to the bottom of the scrollable container
  $("#messages").scrollTop($("#messages")[0].scrollHeight);

  // Trigger scroll to bottom when input changes
  $("#msgTxt").on("input", function() {
    scrollToBottom();
  });

});

// Function to scroll to the bottom of the scrollable container
function scrollToBottom() {
  $("#messages").scrollTop($("#messages")[0].scrollHeight);
}

//// Check if the message is not a link
// $(document).ready(function() {
//   // Function to sanitize and display user input as plain text
//   function sanitizeAndDisplay(text) {
//     var sanitizedText = $("<div>").text(text).html();
//     $("#messages").append("<p>" + sanitizedText + "</p>");
//   }

//   // Function to check if a given string is a valid URL
//   function isValidURL(url) {
//     var pattern = /^((http|https):\/\/)?[a-zA-Z0-9\-_]+(\.[a-zA-Z0-9\-_]+)+([a-zA-Z0-9\-\.,@?^=%&amp;:/~\+#]*[a-zA-Z0-9\-\@?^=%&amp;/~\+#])?$/;
//     return pattern.test(url);
//   }

//   // Function to handle the "Send" button click event
//   $("#msgBtn").on("click", function() {
//     var message = $("#msgTxt").val();
//     if (message.trim() !== "") {
//       if (isValidURL(message)) {
          // message = "Links are not allowed";
          // notification(message);
//       } else {
//         sanitizeAndDisplay(message);
//         $("#msgTxt").val("");
//       }
//     }
//   });

//   // Function to handle the "Enter" key press event in the input field
//   $("#msgTxt").on("keydown", function(event) {
//     if (event.key === "Enter") {
//       event.preventDefault();
//       $("#msgBtn").trigger("click");
//     }
//   });
// });

//// When a buddy is clicked it will load the messages and update the profiles-con
function clickUser(userid, buddyid, buddyname, groupid) {

  global_userid = userid;
  global_buddyid = buddyid;
  global_buddyname = buddyname;
  global_groupid = groupid;
  global_count = true;
  
  $("#msgTxt").prop("disabled", false);

  updateChat();
}

function updateChat(){
  // Fetch data using the fetch API
  fetch('buddy_messages.php', {
      method: 'POST',
      headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: `userid=${global_userid}&buddyid=${global_buddyid}&groupid=${global_groupid}`,
  })
  .then(response => response.text())
  .then(data => {
      // Update the content of the element
      $("#messages").html(data);
      $("#group-name").text(global_buddyname);
      scrollToBottom();
  })
  .catch(error => console.error('Error:', error));
}

setInterval(updateChat, 1000);

//// Event listener for entering the input
$(document).ready(function () {
  $('#msgTxt').keypress(function (event) {

    if (event.which === 13) {
      sendMessage();
    }
  });
});

//// Function on sending the message
function sendMessage(){

  var message = $("#msgTxt").val();

  $.post("buddy_send_msg.php", { userid: global_userid, buddyid: global_buddyid, groupid: global_groupid, message: message})
    .done(function (data){

        if (data == "Success"){

          $("#msgTxt").val("");
          updateChat();

        } else if (data == "Failed") {

          notif_message = "Failed";
          notification(notif_message);

        } else {
          console.log(data);
        }
    });
}