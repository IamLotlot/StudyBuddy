//// Global variables
var search_status = "Ongoing";

//// Reload the search buddy page on entry
// $(document).ready(function() {
//     var reload = 0;

//     if (reload === 0) {
//         window.location.reload();
//     } else {
//         reload = 1;
//     }
// });
//// If cancel button is showing it will activate this function
$(document).ready(function() {
    var course = $("#course").val();
    var category = $("#category").val();
    var sex = $("#sex").val();
    var age = $("#age").val();
    var description = $("#description").val();
    var action = "search";

    if (search_status === "Ongoing") {
        SearchBuddySearchPHP(global_online_username, course, category, sex, age, description, action);
    } else {

    }
        
    if ($('#cancel-btn').is(':visible')) {

        cancel();

        $("#matched-con").hide();
        $("#searched-des").hide();
        $("#loading-con").show();

    } else if ($('#search-btn').is(':visible')) {

        search();

        $("#result-con").hide();
        $("#searched-des").show();
        $("#loading-con").hide();

    } else if ($('#chat-btn').is(':visible')) {

        cancel();

        $("#matched-con").show();
        $("#searched-des").show();
        $("#loading-con").hide();
    }
});
function cancel(){
    $("#course").prop("disabled", true);
    $("#category").prop("disabled", true);
    $("#sex").prop("disabled", true);
    $("#age").prop("disabled", true);
    $("#description").prop("disabled", true);
}

function search(){
    $("#course").prop("disabled", false);
    $("#category").prop("disabled", false);
    $("#sex").prop("disabled", false);
    $("#age").prop("disabled", false);
    $("#description").prop("disabled", false);
}

function SearchBuddySearchPHP( user, course, category, sex, age, description, action){
    $.post("search_buddy_search.php", { user: user, course: course, category: category, sex: sex, age: age, description: description, action: action })
    .done(function (data){

        if (data == "Unknown"){

            notif_message = "Inputs are missing";
            notification(notif_message);
            
            console.log(data);

        } else if (data == "No_Match") {
            // Will loop the searching process till a match has been found
            SearchBuddySearchPHP( user, course, category, sex, age, description, action);
            search_status = "Ongoing";

        } else if (data == "No_QueueID") {
            // DEBUG: Write a proper message
            notif_message = "No_QueueID";
            notification(notif_message);

        } else if (data == "Username") {

            notif_message = "No account is found named: "+user;
            notification(notif_message);

        } else if (data == "Existing") {

            notif_message = "A queue is already in progress under your account";
            notification(notif_message);

        } else if (data == "Queue_Success") {

            search_status = "Done";

            window.location.reload();

            $("#cancel-btn").show();
            $("#loading-con").show();

            $("#matched-con").hide();
            $("#chat-btn").hide();
            $("#search-btn").hide();

        } else if (data == "Search_Success") {
            
            search_status = "Done";

            // window.location.reload();

            $("#chat-btn").show();
            $("#matched-con").show();

            $("#search-btn").hide();
            $("#cancel-btn").hide();
            $("#loading-con").hide();
        
            // Stops the searching animation
            // setTimeout(function() {
            //     clearInterval(intervalId);
            //     $('#searching').text("Search complete!");
            // }, 10000);

        } else if (data == "Failed") {
            // DEBUG: Write a proper message
            notif_message = "Failed";
            notification(notif_message);

        } else {
            console.log("Error: "+data);
        }
    });
}

//// Function for searching
$(document).ready(function() {
    $("#search-btn").click(function() {
        var course = $("#course").val();
        var category = $("#category").val();
        var sex = $("#sex").val();
        var age = $("#age").val();
        var description = $("#description").val();
        var action = "queue";

        SearchBuddySearchPHP(global_online_username, course, category, sex, age, description, action);

        window.location.reload();
    });
  });

//// Function for cancelling
$(document).ready(function() {
    $("#cancel-btn").click(function() {

        var result = confirm("Are you sure you want to cancel your search?");

        if (result) {
            
            $.post("search_buddy_cancel.php", { user: global_online_username })
            .done(function (data){
    
                if (data == "Unknown"){
            
                    notif_message = "Inputs are missing";
                    notification(notif_message);
    
                } else if (data == "Username") {
            
                    notif_message = "No account is found named: "+user;
                    notification(notif_message);
    
                } else if (data == "Queue") {
            
                    notif_message = "You don't have any in queue! Try to re-login";
                    notification(notif_message);
    
                } else if (data == "Success") {
                    window.location.reload();
                    $("#search-btn").hide();
                    $("#cancel-btn").show();
                    enableInputs();
    
                } else if (data == "Failed") {
                    // DEBUG: Write a proper message
                    notif_message = "Failed";
                    notification(notif_message);
    
                } else {
                    console.log(data);
                }
            });
        }
    });
  });

  //// Searching animation
  $(document).ready(function() {
    var dots = 0;
    var maxDots = 3;

    function updateDots() {
      var text = "Searching";
      for (var i = 0; i < dots; i++) {
        text += '.';
      }
      $('#searching').text(text);
    }

    function animateDots() {
      dots++;
      if (dots > maxDots) {
        dots = 0;
      }
      updateDots();
    }

    var intervalId = setInterval(animateDots, 500);
  });
  
//// Function for chat button
$(document).ready(function() {
    $("#chat-btn").click(function() {
        var action = "chat";
            
        $.post("search_buddy_chat.php", { user: global_online_username, action: action })
        .done(function (data){

            if (data == "Unknown"){

                notif_message = "Inputs are missing";
                notification(notif_message);

            } else if (data == "Username") {

                notif_message = "No account is found named: "+global_online_username;
                notification(notif_message);

            } else if (data == "Queue") {

                notif_message = "You have no queue";
                notification(notif_message);

            } else if (data == "MatchID") {

                notif_message = "Match ID is wrong";
                notification(notif_message);

            } else if (data == "Success") {

                message = "You have a new buddy";
                notification(notif_message);
                
                setTimeout(function () {
                    window.location.href = "buddy.php";
                }, 6000);

            } else if (data == "Failed") {
                // DEBUG: Write a proper message
                notif_message = "Failed";
                notification(notif_message);

            } else if (data == "Upload") {

                notif_message = "Uploading failed";
                notification(notif_message);

            } else {
                console.log(data);
            }
        });
    });
  });