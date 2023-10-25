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
</head>
<body onload="Online()">
<?php
	include 'nav.php';
?>
    <section>
        <div class="membership-plan">
            <h1>Monthly</h1>
            <div class="benefits">
                <h2>P 99.00</h2>
                <div><i class="fa-solid fa-circle-check"></i><h3>Profile Cosmetics</h3></div>
                <div><i class="fa-solid fa-circle-check"></i><h3>Contribution Bonus</h3></div>
                <div><i class="fa-solid fa-circle-check"></i><h3>Discount</h3></div>
                <div id="last"><i class="fa-solid fa-circle-check"></i><h3>Badges</h3></div>
            </div>
            <div id="payment">
                <div id="paypal-button-container-P-1NX82174NM094511MMUJOJGY"></div>
            </div>
            <script src="https://www.paypal.com/sdk/js?client-id=AfzEVDUhg26nlZW-2fBLNQGvUkf6sm4KRIAumiZPxbV5Z-m4hjqEKUUEysSsVk55X9rKLMfvs5v3yyb7&vault=true&intent=subscription" data-sdk-integration-source="button-factory"></script>
            <h4 id="buy-btn">BUY</h4>
        </div>
        <div class="membership-plan">
            <h1>Yearly</h1>
            <div class="benefits">
                <h2>P 799.00</h2>
                <div><i class="fa-solid fa-circle-check"></i><h3>Profile Cosmetics</h3></div>
                <div><i class="fa-solid fa-circle-check"></i><h3>Contribution Bonus</h3></div>
                <div><i class="fa-solid fa-circle-check"></i><h3>Discount</h3></div>
                <div id="last"><i class="fa-solid fa-circle-check"></i><h3>Badges</h3></div>
            </div>
            <div id="payment">
                <div id="paypal-button-container-P-1NX82174NM094511MMUJOJGY"></div>
            </div>
            <script src="https://www.paypal.com/sdk/js?client-id=AfzEVDUhg26nlZW-2fBLNQGvUkf6sm4KRIAumiZPxbV5Z-m4hjqEKUUEysSsVk55X9rKLMfvs5v3yyb7&vault=true&intent=subscription" data-sdk-integration-source="button-factory"></script>
            <h4 id="buy-btn">BUY</h4>
        </div>
    </section>
	<script src="js/jQuery-3.6.4.js"></script>
    <script src="js/subscription.js"></script>
	<script src="js/main.js"></script>
    <script src="js/notepad.js"></script>
</body>
</html>