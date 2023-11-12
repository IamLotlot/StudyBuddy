//// If cancel button is showing it will activate this function
$(document).ready(function() {
    if ($('#cancel-btn').is(':visible')) {
        
        var course = $("#course").val();
        var category = $("#category").val();
        var sex = $("#sex").val();
        var age = $("#age").val();
        var description = $("#description").val();
        var action = "search";

        cancel();

        $("#matched-con").hide();
        $("#searched-des").hide();
        $("#loading-con").show();

        SearchBuddySearchPHP(global_online_username, course, category, sex, age, description, action);

    } else {
        search();

        $("#result-con").show();
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
            alert("Inputs are missing!");

        } else if (data == "Username") {
            alert("No account is found named: "+user);

        } else if (data == "Existing") {
            alert("A queue is already in progress under your account!");

        } else if (data == "Success") {
            $("#loading-con").hide()
            $("#matched-con").show()
            $("#result-con").show()
            
            // Stops the searching animation
            setTimeout(function() {
                clearInterval(intervalId);
                $('#searching').text("Search complete!");
            }, 10000);

        } else if (data == "Failed") {
            alert("Failed");

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
                    alert("Inputs are missing!");
    
                } else if (data == "Username") {
                    alert("No account is found named: "+user);
    
                } else if (data == "Queue") {
                    alert("You don't have any in queue! Try to re-login.");
    
                } else if (data == "Success") {
                    window.location.reload();
                    $("#search-btn").hide();
                    $("#cancel-btn").show();
                    enableInputs();
    
                } else if (data == "Failed") {
                    alert("Failed");
    
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