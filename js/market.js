//// Extended version of the function Online() in main.js
    function OnlineMarket(){
        
        var username = localStorage.getItem('userOnline');
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