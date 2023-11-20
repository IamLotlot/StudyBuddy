var otp_attempt;
var email;

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

                } else if (data == "Not-Verified") {

                    notif_message = "Your account is not verified. Kindly wait for a notification through the provided email";
                    notification(notif_message);
                    
                } else if (data == "Deativated") {

                    notif_message = "Your account is deativated!";
                    notification(notif_message);
                    
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
        $("#email-verify-wrapper").show();
    });
  });

//// Back OTP function
$(document).ready(function() {
    $('#email-back-btn').click(function() {
        // $("#email-verify-wrapper").hide();
        window.location.reload();
    });
});

//// Next OTP function
$(document).ready(function() {
    $('#email-next-btn').click(function() {
        
        email = $("#email-input").val();
        // localStorage.setItem('email', input);

        if (email) {

            $("#email-output").hide();
            $("#email-input").hide();
            $("#email-next-btn").hide();
            $("#email-verify-input").show();
            $("#email-confirm-btn").show();
            
            var otp = 0;
            otp_attempt = 0;

            function generateOTP() {
                return Math.floor(100000 + Math.random() * 900000);
            }

            var otp = generateOTP();
            localStorage.setItem('otp', otp);
                
            Email.send({
                SecureToken : "2eac672c-ceaf-4038-9697-24c4cbf39010",
                To : email,
                From : "studybuddy123100@gmail.com",
                Subject : "Verify your email",
                Body : "PIN: "+otp
            }).then(
                // alert("OTP has been sent to "+email)
                notification("OTP sent on "+email)
            );

        } else {
            $("#email-output").text("Invalid email");
            $("#email-output").show();
        }
    });
});

//// Confirm function on OTP
$(document).ready(function() {
    $('#email-confirm-btn').click(function() {

        var otp = localStorage.getItem("otp");
        var otp_input = $("#email-verify-input").val();

        if (otp_attempt > 3) {
            notification("Too many attempts made, try again later!");
        } else {
            if (otp_input == otp) {
                $("#email-verify-label").text("Change Password");

                $("#email-output").hide();
                $("#email-input").hide();
                $("#email-password-input").show();
                $("#email-next-btn").hide();
                $("#email-verify-input").hide();
                $("#email-confirm-btn").hide();
                $("#email-update-btn").show();

            } else if (!otp_input) {
                notification("Please enter the OTP!");
            } else {
                notification("OTP is wrong!");
                otp_attempt = otp_attempt + 1;
            }
        }
    });
});

//// Resend OTP function
$(document).ready(function() {
    $('#email-resend-otp').click(function() {

        var otp = 0;
        otp_attempt = 0;

        function generateOTP() {
            return Math.floor(100000 + Math.random() * 900000);
        }

        var otp = generateOTP();
        localStorage.setItem('otp', otp);
            
        Email.send({
            SecureToken : "2eac672c-ceaf-4038-9697-24c4cbf39010",
            To : email,
            From : "studybuddy123100@gmail.com",
            Subject : "Verify your email",
            Body : "PIN: "+otp
        }).then(
            // alert("OTP has been sent to "+email)
            notification("OTP sent on "+email)
        );
    });
});

//// Update password OTP function
$(document).ready(function() {
    $('#email-update-btn').click(function() {

        var password = $("#email-password-input").val();
        
        if (password) {
            
            $.post("login_password.php", {password: password, email: email })
              .done(function (data){
      
                  if (data == "Unknown") {

                    notif_message = "Kindly try to re-log in";
                    notification(notif_message);

                  } else if (data == "Username") {

                    notif_message = "No user or email was found in the database";
                    notification(notif_message);

                  } else if (data == "Failed") {

                    notif_message = "Invalid inputs";
                    notification(notif_message);
                    
                  } else if (data == "Success") {

                    $("#email-verify-label").text("Success!");
                    $("#email-password-input").prop("disabled", true);
                    $("#email-back-btn").prop("disabled", true);
                    $("#email-update-btn").prop("disabled", true);

                    notif_message = "Your password has been updated";
                    notification(notif_message);

                    function reloadPage() {
                        window.location.reload();
                    }
                      
                    setTimeout(reloadPage, 3000);
                    
                  } else {
                    console.log(data);
                  }
              });
        } else {
            notification("Invalid password");
        }
    });
});