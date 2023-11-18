//// AJAX for login
function login() {
    var username = $("#username").val();
    var password = $("#password").val();
    var remember = $('#remember-me').prop('checked');
    
    if (username == "") {
    
        $("#message").text("Username is empty");
    
    } else if (password == "") {
    
        $("#message").text("Password is empty");

    } else {
        // Create an AJAX request
        $.post("loginEx.php", { username: username, password: password })
            .done(function (data){
                if (data == "Admin"){
                    
                    notif_message = "Greetings "+username+", admin detected";
                    notification(notif_message);

                    // Set the user online to localstorage or sessionstorage
                    if (remember) {
                        localStorage.setItem('userOnline', username)
                        localStorage.setItem('online', username)
                    } else {
                        sessionStorage.setItem('userOnline', username);
                        localStorage.setItem('online', username)
                    }
                    
                    window.location.href = "home.php";

                } else if (data == "User") {

                    notif_message = "Greetings "+username+", user detected";
                    notification(notif_message);

                    if (remember) {
                        localStorage.setItem('userOnline', username)
                        localStorage.setItem('online', username)
                    } else {
                        sessionStorage.setItem('userOnline', username);
                        localStorage.setItem('online', username)
                    }
                    window.location.href = "home.php";

                } else if (data == "Failed") {

                    $("#message").text("Username or Password is incorrect!");

                } else if (data == "Die") {

                    notif_message = "Localhost connection failed";
                    notification(notif_message);
                    window.location.href = "login.php";
                }
            });
    }
}

$("#username").on("keydown", function(event) {
    if (event.key === "Enter") {
        login();
    }
});
$("#password").on("keydown", function(event) {
    if (event.key === "Enter") {
        login();
    }
});
$("#loginBtn").on("click", login);

//// Forget password function
$(document).ready(function(){
    $("#forgot-pass").on("click", function(event){
      
        notif_message = "Still in progress";
        notification(notif_message);
    });
  });