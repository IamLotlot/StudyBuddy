//// Paypal payment gateway buttons
// paypal.Buttons({
//     style: {
//         shape: 'pill',
//         color: 'gold',
//         layout: 'vertical',
//         label: 'subscribe'
//     },
//     createSubscription: function(data, actions) {
//     return actions.subscription.create({
//         /* Creates the subscription */
//         plan_id: 'P-1NX82174NM094511MMUJOJGY'
//     });
//     },
//     onApprove: function(data, actions) {
//     alert(data.subscriptionID); // You can add optional success message for the subscriber here
//     alert("testing");
//     }
// }).render('#paypal-button-container-P-1NX82174NM094511MMUJOJGY'); // Renders the PayPal button

//// Show function when buy is clicked
$("#buy-btn1").click(function() {
  $.post("subscription_check.php", { username: global_online_username })
    .done(function (data){
        if (data == "Unknown"){
          // DEBUG: Write a proper message
          notif_message = "Unknown";
          notification(notif_message);

        } else if (data == "Success") {

          localStorage.setItem("product", "1 Month Subscription");
          $("#payment1").show();
          $("#payment2").hide();

        } else if (data == "Existing") {

          notif_message = "You are already a subscriber!";
          notification(notif_message);

        } else {
          console.log(data);
        }
    });
});

//// Show function when buy is clicked
$("#buy-btn2").click(function() {
    localStorage.setItem("product", "1 Year Subscription");
    $("#payment1").hide();
    $("#payment2").show();
});

//// Function for success purchase
function purchaseSuccess(id, given_name, surname, payer_email, value, payee_email){
    var product = localStorage.getItem("product");
    $.post("subscriptionEx.php", { username: global_online_username, id: id, product: product, given_name: given_name, surname: surname, payer_email: payer_email, value: value, payee_email: payee_email })
    .done(function (data){
        if (data == "Unknown"){
          // DEBUG: Write a proper message
          notif_message = "Unknown";
          notification(notif_message);

        } else if (data == "Transaction") {

          notif_message = "Cannot insert the transaction to the database!";
          notification(notif_message);

        } else if (data == "Failed") {

          notif_message = "Couldn't insert the data into the database!";
          notification(notif_message);

        } else if (data == "Success") {
            
            $("#payment1").hide();
            $("#celebration-wrapper").show();
            function hideCelebrationWrapper() {
                $("#celebration-wrapper").hide();
            }
            
            // Set a 5-second timer to call the function
            setTimeout(hideCelebrationWrapper, 8000);

        } else {
          console.log(data);
        }
    });
}