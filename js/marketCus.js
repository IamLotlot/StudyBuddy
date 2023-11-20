////Gets the products's other information and set it into the inputs
  function getProduct(label) {
  
    var inputs = document.getElementsByClassName("inputs");
    for (var i = 0; i < inputs.length; i++) {
      inputs[i].value = "";
    }

    var id = label.innerHTML;
    var rate = document.getElementById(id + "-rate").value;
    var name = document.getElementById(id + "-name").value;
    var price = document.getElementById(id + "-price").value;
    var seller = document.getElementById(id + "-seller").value;
    var date = document.getElementById(id + "-date").value;
    var category = document.getElementById(id + "-category").value;
    var image = document.getElementById(id + "-image").value;
    var file = document.getElementById(id + "-file").value;

    document.getElementById("productID").value = id;
    document.getElementById("productName").value = name;
    document.getElementById("price").value = price;
    document.getElementById("seller").value = seller;
    document.getElementById("date").value = date;
    document.getElementById("category").value = category;
    document.getElementById("chosenPicture").src = "../StudyBuddy/documents/product/"+image;
    document.getElementById("pdfViewer").src = "../StudyBuddy/documents/pdf/"+file;

    if (rate == 0){
      $("#star1").css("color", "#F0ECE6");
      $("#star2").css("color", "#F0ECE6");
      $("#star3").css("color", "#F0ECE6");
      $("#star4").css("color", "#F0ECE6");
      $("#star5").css("color", "#F0ECE6");
    } else if (rate == 1){
      $("#star1").css("color", "yellow");
      $("#star2").css("color", "#F0ECE6");
      $("#star3").css("color", "#F0ECE6");
      $("#star4").css("color", "#F0ECE6");
      $("#star5").css("color", "#F0ECE6");
    } else if (rate == 2){
      $("#star1").css("color", "yellow");
      $("#star2").css("color", "yellow");
      $("#star3").css("color", "#F0ECE6");
      $("#star4").css("color", "#F0ECE6");
      $("#star5").css("color", "#F0ECE6");
    } else if (rate == 3){
      $("#star1").css("color", "yellow");
      $("#star2").css("color", "yellow");
      $("#star3").css("color", "yellow");
      $("#star4").css("color", "#F0ECE6");
      $("#star5").css("color", "#F0ECE6");
    } else if (rate == 4){
      $("#star1").css("color", "yellow");
      $("#star2").css("color", "yellow");
      $("#star3").css("color", "yellow");
      $("#star4").css("color", "yellow");
      $("#star5").css("color", "#F0ECE6");
    } else if (rate == 5){
      $("#star1").css("color", "yellow");
      $("#star2").css("color", "yellow");
      $("#star3").css("color", "yellow");
      $("#star4").css("color", "yellow");
      $("#star5").css("color", "yellow");
    } else {
      $("#star1").css("color", "#F0ECE6");
      $("#star2").css("color", "#F0ECE6");
      $("#star3").css("color", "#F0ECE6");
      $("#star4").css("color", "#F0ECE6");
      $("#star5").css("color", "#F0ECE6");
    }
  }

////Click function for marketCus buttons using i tag
  function clickAdd_M() {
    $.post("copyright_warning.php", { username: global_online_username, action: "check" })
    .done(function (data){

        if (data == "Unknown") {

          notif_message = "Kindly try to re-log in";
          notification(notif_message);

        } else if (data == "Username") {

          notif_message = "No user was found in the database";
          notification(notif_message);

        } else if (data == "False") {

          var warning_des = `
          Welcome to Study Buddy copyright rules and regulation! We appreciate your presence and participation. As part of our commitment to maintaining a fair and legal environment for all users, it is imperative that you carefully read and understand the following warning regarding the copyright of user-uploaded files.
      
          <br></br>1. Copyrighted Material:<br></br>
          By uploading files to our platform, you acknowledge and agree that you are solely responsible for the content you share. Ensure that the files you upload do not infringe upon the copyrights of others. This includes but is not limited to written content, images, music, videos, and any other creative works protected by copyright law.
      
          <br></br>2. Original Content or Permissions:<br></br>
          You must confirm that the files you upload are either your original creations, for which you hold the copyright, or that you have obtained the necessary permissions from the copyright owner(s) to share the material on our platform.
      
          <br></br>3. Legal Consequences:<br></br>
          Failure to adhere to copyright laws can result in severe legal consequences. Copyright holders have the right to pursue legal action against individuals who violate their rights. Penalties may include financial restitution, removal of content, and potential imprisonment. Our platform may also take appropriate action, including the suspension or termination of user accounts, in response to copyright violations.
      
          <br></br>4. Compliance with the Digital Millennium Copyright Act (DMCA):<br></br>
          Our platform complies with the Digital Millennium Copyright Act (DMCA), which outlines the procedures for addressing copyright infringement. We have mechanisms in place to promptly respond to DMCA notices, including the removal of infringing content and, if necessary, the suspension or termination of user accounts.
      
          <br></br>5. Protecting Your Own Work:<br></br>
          In addition to respecting the copyrights of others, we encourage you to take steps to protect your own creative works. Clearly state the terms of use, licensing agreements, and employ measures to safeguard your intellectual property from unauthorized use.
      
          <br></br>Agreement Confirmation:<br></br>
          By continuing to use our platform and uploading files, you signify your understanding and acceptance of the copyright warning outlined above. If you agree to comply with copyright laws and our platform's policies, please click "Agree" below. Your agreement is essential to fostering a respectful and lawful environment for all users. Thank you for your cooperation.
          `;
          warning("User Agreement: Warning on Copyright Responsibilities", warning_des);
          
        } else if (data == "True") {
          
          document.getElementById("addBtn_M").click();

        } else {
          console.log(data);
        }
    });

////
  }
  function clickEdit_M() {
    var result = confirm("Are you sure you want to edit this product?");

    if(result == true){
      document.getElementById("editBtn_M").click();
    }
  }
  function clickRemove_M() {
    
    var result = confirm("Are you sure you want to remove this product?");

    if(result == true){
      document.getElementById("removeBtn_M").click();
    }
  }
  function clickRefresh_M() {

    var result = confirm("Are you sure you want to clear the inputs?");

    if(result == true){
      var username = "";
      var sessionUsername = sessionStorage.getItem('userOnline');
      var localUsername = localStorage.getItem('userOnline');

      if (localUsername !== null && localUsername !== undefined && localUsername !== '') {

        username = localUsername;

      } else if (sessionUsername !== null && sessionUsername !== undefined && sessionUsername !== '') {

        username = sessionUsername;

      } else {}
  
      document.getElementById("seller").value = username;
      document.getElementById('productID').value = "ID";
      document.getElementById('productName').value = "";
      document.getElementById('category').value = "";
      document.getElementById('price').value = ""; 
      document.getElementById('date').value = ""; 
      document.getElementById('picture').value = ""; 
      document.getElementById('chosenPicture').src = ""; 
      document.getElementById('pdf').value = ""; 
      document.getElementById('pdfViewer').src = ""; 
    } 
  }

////Display the image in marketCus.php
  function displayImage(input) {
    var imgElement = document.getElementById("chosenPicture");

    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        imgElement.src = e.target.result;
      };

      reader.readAsDataURL(input.files[0]);
    } else {
      imgElement.src = "";
    }
  }

////Display the pdf in marketCus.php
  function displayPDF(input) {
    var iframe = document.getElementById("pdfViewer");

    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        iframe.src = e.target.result;
      };

      reader.readAsDataURL(input.files[0]);
    } else {
      iframe.src = "";
    }
  }

////Showing text animation for icons in marketCus.php
  var labels = document.querySelectorAll('.fa-solid');
  var contents = document.querySelectorAll('.slide-content');

  labels.forEach(function(label, index) {
    label.addEventListener('mouseover', function() {
      closeAllContents();
      contents[index].style.opacity = '1';
      contents[index].style.height = 'auto';
    });
  });

  function closeAllContents() {
    contents.forEach(function(content) {
      content.style.opacity = '0';
      content.style.height = '0';
    });
  }

////marketCus.php's seller input
  function getSeller(){
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
    
    document.getElementById("seller").value = username;
  }

//// Warning UI functions
function warning(warning_title, warning_description) {

  $("#warning-title").text(warning_title);
  $("#warning-description").html(warning_description);

  $("#warning-wrapper").show();
}

// Agree button function on warning UI
$(document).ready(function(){
  $("#warning-agree-btn").on("click", function(event){

    $.post("copyright_warning.php", { username: global_online_username, action: "upload" })
    .done(function (data){

        if (data == "Unknown") {

          notif_message = "Kindly try to re-log in";
          notification(notif_message);

        } else if (data == "Username") {

          notif_message = "No user was found in the database";
          notification(notif_message);

        } else if (data == "Failed") {
         
          notif_message = "Failed";
          notification(notif_message);
          
        } else if (data == "Success") {

          document.getElementById("addBtn_M").click();

        } else if (data == "True") {

          notif_message = "You already agree to the terms and regulation!";
          notification(notif_message);

        } else {
          console.log(data);
        }
    });
  });
});

// Disagree button function on warning UI
$(document).ready(function(){
  $("#warning-disagree-btn").on("click", function(event){
    $("#warning-wrapper").hide();
  });
});