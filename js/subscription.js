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
    $("#payment1").show();
    $("#payment2").hide();
});

//// Show function when buy is clicked
$("#buy-btn2").click(function() {
    $("#payment1").hide();
    $("#payment2").show();
});