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