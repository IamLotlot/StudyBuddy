////Click function for account buttons using i tag
function clickAdd() {
  var result = confirm("Are you sure you want to create a account?");

  if(result == true){
    document.getElementById("addBtn").click();
  }
}
function clickEdit() {
  var result = confirm("Are you sure you want to edit this account?");

  if(result == true){
    document.getElementById("editBtn").click();
  }
}
function clickRemove() {
  var result = confirm("Are you sure you want to remove this account?");

  if(result == true){
    document.getElementById("removeBtn").click();
  }
}
function clickVerify() {
  var result = confirm("Are you sure you want to verify this account?");

  if(result == true){
    document.getElementById("verifyBtn").click();
  }
}
function clickClear() {
  var result = confirm("Are you sure you want to clear the inputs?");

  if(result == true){
    var username = localStorage.getItem('userOnline');
  
    document.getElementById("username").value = "";
    document.getElementById('password').value = "";
    document.getElementById('state').value = "not-verified";
    document.getElementById('email').value = "";
    document.getElementById('fullname').value = ""; 
    document.getElementById('yearSection').value = ""; 
    document.getElementById('age').value = ""; 
    document.getElementById('studentid').value = ""; 
    document.getElementById('sex').value = ""; 
    document.getElementById('address').value = ""; 
    document.getElementById('contact').value = ""; 
    document.getElementById('profilePreview').src = ""; 
  }
}

////Showing text animation for icons in accounts.php
var labels = document.querySelectorAll('.fa-solid');
var contents = document.querySelectorAll('.show-content');

labels.forEach(function(label, index) {
  label.addEventListener('mouseover', function() {
    closeAllContents();
    shows[index].style.opacity = '1';
    shows[index].style.height = 'auto';
  });
});

function closeAllContents() {
  shows.forEach(function(content) {
    show.style.opacity = '0';
    show.style.height = '0';
  });
}

////Image shows up when picked from a file element (accounts.php)
const label = document.getElementById('profileLabel');
const fileInput = document.getElementById('profileInput');
const preview = document.getElementById('profilePreview');

label.addEventListener('click', () => {
  fileInput.click();
});

fileInput.addEventListener('change', () => {
  const file = fileInput.files[0];

  if (file) {
    label.textContent = file.name;
    const reader = new FileReader();
    reader.onload = () => {
      preview.src = reader.result;
      label.style.display = 'none';
      preview.style.display = 'block';
    };
    reader.readAsDataURL(file);
  }
});

////Gets the username's other information and set it into the inputs
function getUsername(label) {

  var inputs = document.getElementsByClassName("inputField");
  for (var i = 0; i < inputs.length; i++) {
    inputs[i].value = "";
  }

  var userOnline = label.innerHTML;

  var username = document.getElementById("username").value = userOnline;
  var password = document.getElementById(userOnline + "-password").value;
  var state = document.getElementById(userOnline + "-state").value;
  var email = document.getElementById(userOnline + "-email").value;
  var fullname = document.getElementById(userOnline + "-fullname").value;
  var yearSection = document.getElementById(userOnline + "-yearSection").value;
  var age = document.getElementById(userOnline + "-age").value;
  var studentid = document.getElementById(userOnline + "-studentid").value;
  var sex = document.getElementById(userOnline + "-sex").value;
  var address = document.getElementById(userOnline + "-address").value;
  var contact = document.getElementById(userOnline + "-contact").value;
  var profile = document.getElementById(userOnline + "-profile").value;

  document.getElementById("username").value = username;
  document.getElementById("password").value = password;
  document.getElementById("state").value = state;
  document.getElementById("email").value = email;
  document.getElementById("fullname").value = fullname;
  document.getElementById("yearSection").value = yearSection;
  document.getElementById("age").value = age;
  document.getElementById("studentid").value = studentid;
  document.getElementById("sex").value = sex;
  document.getElementById("address").value = address;
  document.getElementById("contact").value = contact;
  document.getElementById("profilePreview").src = "../StudyBuddy/documents/profile/"+profile;

  document.getElementById('profileLabel').style.display = "none";
  document.getElementById('profilePreview').style.display = "block";

}

//////////////////// JQuery //////////////////////////////
//If
// $(document).ready(function() {
//   $("#addIcon").on("click", function() {
//     var username = $('#username').val();
//     var state = $('#state').val();
//     var role = $('#role').val();
//     var yearSection = $('#yearSection').val();
//     var studentid = $('#studentid').val();
//     var address = $('#address').val();
//     var password = $('#password').val();
//     var email = $('#email').val();
//     var fullname = $('#fullname').val();
//     var age = $('#age').val();
//     var sex = $('#sex').val();
//     var contact = $('#contact').val();

//     var result = confirm("Are you sure you want to create an "+username+" account?");
//     if (result) {
//       $.ajax({
//         url: 'accountsEx.php',
//         type: 'POST',
//         data: { data1 : username, data2 : state, data3 : role, data4 : yearSection, 
//         data5 : studentid, data6 : address, data7 : password, data8 : email, 
//         data9 : fullname, data10 : age, data11 : sex, data12 : contact},
//         success: function(response) {
          
//         },
//         error: function(xhr, status, error) {
//           console.error(error);
//         }
//       });
//     } else {
//       // Cancel the delete operation or take appropriate action
//     }
//   });
// });