//// Global variables
var global_username;
var global_password;
var global_email;
var global_fullname;
var global_address;
var global_yearSection;
var global_age;
var global_studentId;
var global_sex;
var global_contact;
var global_profile;
var otp_attempt;

//// Profile function
$(document).ready(function() {
    $('#profile').click(function() {

        
    });
});

//// Detects if the input was changed
$(document).ready(function() {
    $('.des-input').on('input', updateButtonVisibility);

    function updateButtonVisibility() {
        var hasValue = false;
        $('.des-input').each(function () {
            if ($(this).val().trim() !== '') {
                hasValue = true;
                return false; // Break out of the loop if a non-empty value is found
            }
        });

        if (hasValue) {
            $('#update-btn').show();
        } else {
            $('#update-btn').hide();
        }
    }
});

//// Edit button function
$(document).ready(function() {
    $('#edit-btn').click(function() {
        global_username = $("#username").val();
        global_password = $("#password").val();
        global_email = $("#email").val();
        global_fullname = $("#fullname").val();
        global_address = $("#address").val();
        global_yearSection = $("#year-section").val();
        global_age = $("#age").val();
        global_studentId = $("#student-id").val();
        global_sex = $("#sex").val();
        global_contact = $("#contact").val();

        $("#edit-btn").hide();
        $("#update-btn").hide();
        $("#cancel-btn").show();
        $(".des-input").prop("disabled", false);
        $("#email").prop("disabled", true);
    });
});

//// Cancel button function
$(document).ready(function() {
    $('#cancel-btn').click(function() {
        $("#username").val(global_username);
        $("#password").val(global_password);
        $("#email").val(global_email);
        $("#fullname").val(global_fullname);
        $("#address").val(global_address);
        $("#year-section").val(global_yearSection);
        $("#age").val(global_age);
        $("#student-id").val(global_studentId);
        $("#sex").val(global_sex);
        $("#contact").val(global_contact);

        $("#edit-btn").show();
        $("#cancel-btn").hide();
        $("#update-btn").hide();
        $(".des-input").prop("disabled", true);
    });
});

//// Update button function
$(document).ready(function() {
    $('#update-btn').click(function() {
        var username = $("#username").val();
        var password = $("#password").val();
        var email = $("#email").val();
        var fullname = $("#fullname").val();
        var address = $("#address").val();
        var yearSection = $("#year-section").val();
        var age = $("#age").val();
        var studentId = $("#student-id").val();
        var sex = $("#sex").val();
        var contact = $("#contact").val();

        if (username || password || email || fullname || address || yearSection || age || studentId || sex || contact){
            $.post("profileEx.php", { username: username, password: password, email: email, fullname: fullname, address: address, yearSection: yearSection, age: age, studentId: studentId, sex: sex, contact: contact })
              .done(function (data){
      
                  if (data == "Unknown") {

                    notif_message = "Kindly try to re-log in";
                    notification(notif_message);

                  } else if (data == "Nothing") {

                    notif_message = "No user was found in the database";
                    notification(notif_message);

                  } else if (data == "Failed") {

                    notif_message = "Invalid inputs";
                    notification(notif_message);
                    
                  } else if (data == "Success") {

                    notif_message = username+"'s account has been updated";
                    notification(notif_message);
                    
                    $("#edit-btn").show();
                    $("#cancel-btn").hide();
                    $("#update-btn").hide();
                    $(".des-input").prop("disabled", true);
                  } else {
                    console.log(data);
                  }
              });
          } else {

            notif_message = "Title or content is empty kindly fill them up";
            notification(notif_message);
          }

    });
});

//// Verify function
$(document).ready(function() {
    $('#verify-btn').click(function() {

        var email = $("#email").val();
        var result = confirm("Are you sure you want to verify your email ("+email+")");
        var otp = 0;
        otp_attempt = 0;

        function generateOTP() {
            return Math.floor(100000 + Math.random() * 900000);
        }

        var otp = generateOTP();
        localStorage.setItem('otp', otp);

        if (result) {
            
            $("#email-verify-wrapper").show();
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
        }
    });
});

//// Back OTP function
$(document).ready(function() {
    $('#email-back-btn').click(function() {
        $("#email-verify-wrapper").hide();
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
                
                var action = "verify";

                $.post("profile_verify.php", { user: global_online_username, action: action })
                    .done(function (data){

                        if (data == "Unknown"){

                            notif_message = "Inputs are missing";
                            notification(notif_message);

                        } else if (data == "Username") {

                            notif_message = "No account is found named: "+global_online_username;
                            notification(notif_message);

                        } else if (data == "Failed") {

                            notif_message = "Try to re-login!";
                            notification(notif_message);

                        } else if (data == "Success") {

                            notif_message = "Your email has been verified";
                            notification(notif_message);
                            $("#email-verify-wrapper").hide();
                            $("#verify-btn").hide();

                        } else {
                            console.log(data);
                        }
                    });

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

        var email = $("#email").val();
        var otp = 0;
        otp_attempt = 0;

        function generateOTP() {
            return Math.floor(100000 + Math.random() * 900000);
        }

        var otp = generateOTP();
        localStorage.setItem('otp', otp);
            
        $("#email-verify-wrapper").show();
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