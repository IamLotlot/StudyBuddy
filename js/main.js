//// Global variables
var global_online_username = "";

//// Enable function when the page loads
  function Online() {
    // Sets the account online if only for just a session or to remember them
    var sessionUsername = sessionStorage.getItem('userOnline');
    var localUsername = localStorage.getItem('userOnline');

    if (localUsername !== null && localUsername !== undefined && localUsername !== '') {

      global_online_username = localUsername;

    } else if (sessionUsername !== null && sessionUsername !== undefined && sessionUsername !== '') {

      global_online_username = sessionUsername;

    } else {}

    document.getElementById("onlineUser").innerHTML = global_online_username;

    $("#dropdown").hide();
    setOnline(global_online_username);

    // If someone is logged it will remove register and login label
    var register = document.getElementById("registerNav");
    var userIcon = document.getElementById("userIcon");
    var login = document.getElementById("loginNav");
    var buddy = document.getElementById("buddyNav");
    var market = document.getElementById("marketNav");
    var creators = document.getElementById("creatorsNav");
    var accounts = document.getElementById("accountsNav");
    var products = document.getElementById("productsNav");
    var logs = document.getElementById("logsNav");
    
    if (global_online_username) {

      if (global_online_username == "admin") {
        buddy.style.display = "none";
        market.style.display = "none";
        creators.style.display = "none";

        accounts.style.display = "inline-block";
        products.style.display = "inline-block";
        logs.style.display = "inline-block";

        register.style.display = "none";
        login.style.display = "none";
        userIcon.style.display = "inline-block";

      } else {
        buddy.style.display = "inline-block";
        market.style.display = "inline-block";
        creators.style.display = "inline-block";

        accounts.style.display = "none";
        products.style.display = "none";
        logs.style.display = "none";

        register.style.display = "none";
        login.style.display = "none";
        userIcon.style.display = "inline-block";
      }
    } else {
      buddy.style.display = "inline-block";
      market.style.display = "inline-block";
      creators.style.display = "inline-block";
      
      accounts.style.display = "none";
      products.style.display = "none";

      register.style.display = "inline-block";
      login.style.display = "inline-block";
      userIcon.style.display = "none";
      logs.style.display = "none";
    }
  }

//// Set the userOnline session when opening the browser again
function setOnline(username){
  var dataToSend = username;

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "online.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  
  xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // window.location.href = "online.php";
      }
  };

  xhr.send("data=" + encodeURIComponent(dataToSend));
}

//// Logout function
  var logout = document.getElementById("logoutNav");
  var register = document.getElementById("registerNav");
  var login = document.getElementById("loginNav");

  logout.addEventListener("click", function() {
    
    Logout();
  });
    
  function Logout() {
    var result = confirm("Are you sure you want to logout?");

    // Check the result
    if (result == true) {
      global_online_username = "";
      localStorage.removeItem('userOnline');
      sessionStorage.removeItem("userOnline");
      location.reload();
      register.style.display = "inline-block";
      login.style.display = "inline-block";
      logout.style.display = "none";
      destroySession();
    } else {}
  }
  
    // Function to destroy the session when logged in
    function destroySession() {
      $.ajax({
          type: "POST",
          url: "logout.php",
          dataType: "json",
          success: function(response) {
            window.location.href = 'home.php';
          },
          error: function(xhr, status, error) {
            console.error(xhr.responseText);
          }
      });
    }

////Scroll to top button
  let mybutton = document.getElementById("scrollTop");
  // When the user scrolls down 20px from the top of the document, show the button
  window.onscroll = function() {scrollFunction()};

  function scrollFunction() {
    if (document.body.scrollTop > 250 || document.documentElement.scrollTop > 250) {
      mybutton.style.display = "block";
    } else {
      mybutton.style.display = "none";
    }
  }

  //When the user clicks on the button, scroll to the top of the document
  function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
  }

////Doesnt allow special characters
function validateInput(input) {
  var regex = /^[a-zA-Z0-9]*$/; // Regex pattern to allow alphanumeric characters

  if (!regex.test(input.value)) {
    // Remove special characters from the input value
    input.value = input.value.replace(/[^a-zA-Z0-9]/g, "");
  }
}

//// Show the dropdown div when onlineuser is clicked
$(document).ready(function() {
  $("#onlineUser").click(function() {
    $("#dropdown").toggle();
  });
});

//// Function for notepad tool icon
$(document).ready(function() {
  $("#noteCon").click(function() {
    var notepad = $("#notepad");

    // sendOnline();
    if (notepad.is(":hidden")) {
      $("#notepad").show();

    } else {
      $("#notepad").hide();
    }
  });
});

//// Function for mode tool icon
$(document).ready(function() {
  $("#modeCon").click(function() {
    
  });
});

// Cancel the redirect event to check for restricted permission
$(document).ready(function(){
  $("#search-buddy").on("click", function(event){
    
    if(global_online_username !== ""){
    } else {
      event.preventDefault();
      notif_message = "You need to be logged in";
      notification(notif_message);
    }
  });
});

//// Function for custom notification that can be used on other JS files
function notification(notif_message) {

  var notification = $("#notification-con");
  
  if (notif_message.length > 0) {
    $("#notification-message").text(notif_message);
    $("#notification-wrapper").show();
    notification.show();
  }

  // Automatically hide the popup after 5 seconds
  setTimeout(function () {
    notification.hide();
  }, 3000);
}

//// Function for closing the notification
// $(document).ready(function() {
//   $("#close-notication").click(function() {
//     $("#notification-con").hide();
//   });
// });

//// Cancel the event of buddy navigation and check for online user
$(document).ready(function() {
  $("#buddyNav").click(function() {
    
    if(global_online_username.length === 0){
      event.preventDefault();
      notif_message = "You need to be logged in";
      notification(notif_message);
    }
  });
});