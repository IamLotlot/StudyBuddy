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
    const username = localStorage.getItem('userOnline');
    document.getElementById("seller").value = username;
  }