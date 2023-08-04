//// AJAX for login
$(function() {
    $("#loginBtn").click(function() {
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
                        
                        alert("Admin Detected. Greetings "+username+"!");

                        // Set the user online to localstorage or sessionstorage
                        if (remember) {
                            localStorage.setItem('userOnline', username)
                        } else {
                            sessionStorage.setItem('userOnline', username);
                        }
                        
                        window.location.href = "home.php";
    
                    } else if (data == "User") {
    
                        alert("User Detected. Greetings "+username+"!");

                        if (remember) {
                            localStorage.setItem('userOnline', username)
                        } else {
                            sessionStorage.setItem('userOnline', username);
                        }
                        window.location.href = "home.php";
    
                    } else if (data == "Failed") {

                        $("#message").text("Username or Password is incorrect!");
    
                    } else if (data == "Die") {
    
                        alert("Localhost Connection Failed");
                        window.location.href = "login.php";
                    }
                });
        }
    });
});