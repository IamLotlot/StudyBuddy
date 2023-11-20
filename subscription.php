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
  include 'notepad.php';
?>
  <div id="celebration-wrapper" style="display: none;">
    <div id="celebration-con">
      <img src="css/img/celebrate.gif" alt="Infinite Loop GIF" id="celebrate-gif">
    </div>
  </div>
    <section>
        <div class="membership-plan">
            <h1>Monthly</h1>
            <div class="benefits">
                <h2>P 59.99</h2>
                <div><i class="fa-solid fa-circle-check"></i><h3>Profile Cosmetics</h3></div>
                <div><i class="fa-solid fa-circle-check"></i><h3>Free Student Coins</h3></div>
                <div><i class="fa-solid fa-circle-check"></i><h3>Contribution Bonus</h3></div>
                <div><i class="fa-solid fa-circle-check"></i><h3>Discount</h3></div>
                <div id="last"><i class="fa-solid fa-circle-check"></i><h3>Subscriber Badge</h3></div>
            </div>
            <div class="payment-con" id="payment1" style="display: none;">
                <div id="paypal-button-container"></div>
            </div>
            <h4 id="buy-btn1">BUY</h4>
        </div>
        <div class="membership-plan">
            <h1>Yearly<span id="discount">30% OFF</span></h1>
            <div class="benefits">
                <h2>P 504.99</h2>
                <div><i class="fa-solid fa-circle-check"></i><h3>Profile Cosmetics</h3></div>
                <div><i class="fa-solid fa-circle-check"></i><h3>Free Student Coins</h3></div>
                <div><i class="fa-solid fa-circle-check"></i><h3>Contribution Bonus</h3></div>
                <div><i class="fa-solid fa-circle-check"></i><h3>Discount</h3></div>
                <div id="last"><i class="fa-solid fa-circle-check"></i><h3>Subscriber Badge</h3></div>
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
                currency_code: 'USD',
                value: '59.99'
              },
              // items: [{
              //   name: 'Monthly Subscription',
              //   description: 'Every month subscription',
              //   quantity: '1',
              //   category: 'SUBSCRIPTION',
              //   unit_amount: {
              //     currency_code: 'USD',
              //     value: '59.99'
              //   }
              // }],
            }]
          })
        },
        onApprove: function(data, actions){
          console.log('Data :' + data);
          console.log('Action : '+actions);
          return actions.order.capture().then(function(details){
            purchaseSuccess(details.id,
            details.payer.name.given_name,
            details.payer.name.surname,
            details.payer.email_address,
            details.purchase_units[0].amount.value,
            details.purchase_units[0].payee.email_address,
            );
            // console.log(details);
            // console.log("Given Name: "+details.payer.name.given_name);
            // console.log("Surname: "+details.payer.name.surname);
            // console.log("Payer Email: "+details.payer.email_address);
            // console.log("Value: "+details.purchase_units[0].amount.value);
            // console.log("Payee: "+details.purchase_units[0].payee.email_address);

          })
        }

      }).render('#paypal-button-container');
    </script>
</body>
</html>