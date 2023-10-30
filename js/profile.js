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

//// 
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
                    alert("Kindly try to re-login...");
                  } else if (data == "Nothing") {
                    alert("No user was found in the database!");
                  } else if (data == "Failed") {
                    alert("Invalid inputs!");
                  } else if (data == "Success") {
                    alert(username+"'s account has been updated!");
                    $("#edit-btn").show();
                    $("#cancel-btn").hide();
                    $("#update-btn").hide();
                    $(".des-input").prop("disabled", true);
                  } else {
                    console.log(data);
                  }
              });
          } else {
            alert("Title or content is empty kindly fill them up");
          }

    });
});