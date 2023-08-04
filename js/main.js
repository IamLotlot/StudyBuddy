//// Enable function when the page loads
  function Online() {

    // Sets the account online if only for just a session or to remember them
    var username = "";
    var sessionUsername = sessionStorage.getItem('userOnline');
    var localUsername = localStorage.getItem('userOnline');

    if (localUsername !== null && localUsername !== undefined && localUsername !== '') {

      username = localUsername;

    } else if (sessionUsername !== null && sessionUsername !== undefined && sessionUsername !== '') {

      username = sessionUsername;

    } else {

      console.log("Both session and local are empty.");
    }

    document.getElementById("onlineUser").innerHTML = username;

    $("#dropdown").hide();

    // If someone is logged it will remove register and login label
    var register = document.getElementById("registerNav");
    var userIcon = document.getElementById("userIcon");
    var login = document.getElementById("loginNav");
    var logout = document.getElementById("logoutNav");
    var buddy = document.getElementById("buddyNav");
    var market = document.getElementById("marketNav");
    var creators = document.getElementById("creatorsNav");
    var accounts = document.getElementById("accountsNav");
    var products = document.getElementById("productsNav");
    var logs = document.getElementById("logsNav");
    
    if (username) {

      if (username == "admin") {
        buddy.style.display = "none";
        market.style.display = "none";
        creators.style.display = "none";

        accounts.style.display = "inline-block";
        products.style.display = "inline-block";
        logs.style.display = "inline-block";

        register.style.display = "none";
        login.style.display = "none";
        userIcon.style.display = "inline-block";
        logout.style.display = "inline-block";

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
        logout.style.display = "inline-block";
      }
    } else {
      accounts.style.display = "none";
      products.style.display = "none";

      register.style.display = "inline-block";
      login.style.display = "inline-block";
      userIcon.style.display = "none";
      logout.style.display = "none";
      logs.style.display = "none";
    }
  }

////Logout function
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
      localStorage.removeItem('userOnline');
      location.reload();
      register.style.display = "inline-block";
      login.style.display = "inline-block";
      logout.style.display = "none";
    } else {}
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