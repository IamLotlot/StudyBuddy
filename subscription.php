<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>StudyBuddy | Subscription Page</title>
    <link rel="shortcut icon" type="icon" href="img">
	<link rel="icon" type="image/x-icon" href="css/img/StudyBuddy.ico">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/notepad.css">
    <link rel="stylesheet" href="css/subscription.css">
  	<script src="https://kit.fontawesome.com/8ef5e4d9da.js"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=AbGQ5DxBqvBMkQgP17MXwsiNj6LNP2UG7HIBtqfjZHxwh5hGnS9AL5FVDZ73Zli3m4ldPJHY8-v-xaG3"></script>
</head>
<body onload="Online()">
<?php
	include 'nav.php';
?>
    <section>
        <div class="membership-plan">
            <h1>Monthly</h1>
            <div class="benefits">
                <h2>P 49.99</h2>
                <div><i class="fa-solid fa-circle-check"></i><h3>Profile Cosmetics</h3></div>
                <div><i class="fa-solid fa-circle-check"></i><h3>Contribution Bonus</h3></div>
                <div><i class="fa-solid fa-circle-check"></i><h3>Discount</h3></div>
                <div id="last"><i class="fa-solid fa-circle-check"></i><h3>Badges</h3></div>
            </div>
            <div class="payment-con" id="payment1" style="display: none;">
                <div id="paypal-button-container"></div>
            </div>
            <h4 id="buy-btn1">BUY</h4>
        </div>
        <div class="membership-plan">
            <h1>Yearly</h1>
            <div class="benefits">
                <h2>P 469.99</h2>
                <div><i class="fa-solid fa-circle-check"></i><h3>Profile Cosmetics</h3></div>
                <div><i class="fa-solid fa-circle-check"></i><h3>Contribution Bonus</h3></div>
                <div><i class="fa-solid fa-circle-check"></i><h3>Discount</h3></div>
                <div id="last"><i class="fa-solid fa-circle-check"></i><h3>Badges</h3></div>
            </div>
            <div class="payment-con" id="payment2" style="display: none;">
                <div id="paypal-button-container"></div>
            </div>
            <h4 id="buy-btn2">BUY</h4>
        </div>
    </section>
	<script src="js/jQuery-3.6.4.js"></script>
    <script src="js/subscription.js"></script>
	<script src="js/main.js"></script>
    <script src="js/notepad.js"></script>
    <script>
      paypal.Buttons({
        style: {
            shape: 'pill',
            color: 'gold',
            layout: 'vertical',
            label: 'subscribe'
        },
        // createSubscription: function(data, actions) {
        //     return actions.subscription.create({
        //     /* Creates the subscription */
        //     plan_id: 'P-1NX82174NM094511MMUJOJGY',
        //     value: '49'
        // });
        // },
        createOrder: function(data, actions){
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '200'
              }
            }]
          })
        },
        onApprove: function(data, actions){
          console.log('Data : '+data);
          console.log('Action : '+actions);
          return actions.order.capture().then(function(details){
            console.log(details.payer.name.given_name);
          })
        }

      }).render('#paypal-button-container');
    </script>
</body>
</html>