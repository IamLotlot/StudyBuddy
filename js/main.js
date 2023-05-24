////Enable function when the page loads
  function Online() {

    //Show online user
    var username = localStorage.getItem('userOnline');
    document.getElementById("onlineUser").innerHTML = username;

    //If someone is logged it will remove register and login label
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

    var customizeCon = document.getElementById("Buttons");
    var customizePro = document.getElementById("addProduct");
    
    if (username) {

      if (username=="admin") {
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

        //Shows the customize product at market when someone is logged
        customizeCon.style.display = "flex";
        customizePro.style.display = "flex";
      }
    } else {
      accounts.style.display = "none";
      products.style.display = "none";

      register.style.display = "inline-block";
      login.style.display = "inline-block";
      userIcon.style.display = "none";
      logout.style.display = "none";
      logs.style.display = "none";

      //Hide the customize product at market when someone is not logged
      customizeCon.style.display = "none";
      customizePro.style.display = "none";
    }
  }
////
  
///marketCus.php's seller input
function getSeller(){
  const username = localStorage.getItem('userOnline');
  document.getElementById("seller").value = username;
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
    }
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
    }

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

////Click function for marketCus buttons using i tag
  function clickAdd_M() {
    var result = confirm("Are you sure you want to create a product?");

    if(result == true){
      document.getElementById("addBtn_M").click();
    }
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
      var username = localStorage.getItem('userOnline');
  
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

////Click function for login button
  function clickLogin() {
    document.getElementById("loginBtn").click();
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

////Doesnt allow special characters
function validateInput(input) {
  var regex = /^[a-zA-Z0-9]*$/; // Regex pattern to allow alphanumeric characters

  if (!regex.test(input.value)) {
    // Remove special characters from the input value
    input.value = input.value.replace(/[^a-zA-Z0-9]/g, "");
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