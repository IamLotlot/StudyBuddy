//// Extended version of the function Online() in main.js
    function OnlineMarket(){

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
        
      var customizeCon = document.getElementById("Buttons");
      var customizePro = document.getElementById("addProduct");

      if (username) {

        if (username=="admin") {
      
        } else {
      
        //Shows the customize product at market when someone is logged
          customizeCon.style.display = "flex";
          customizePro.style.display = "flex";
        }
      } else {
      
        //Hide the customize product at market when someone is not logged
        customizeCon.style.display = "none";
        customizePro.style.display = "none";
      }
    }

//// When clicking a product it will redirect to the product page
function viewProduct(id) {
  if (global_online_username === "") {

    notif_message = "You need to be logged in";
    notification(notif_message);
    
  } else {
    var dataToSend = id;
  
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "data_process.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Redirect to the PHP file
            window.location.href = "product_view.php";
        }
    };
  
    xhr.send("data=" + encodeURIComponent(dataToSend));
  }
}