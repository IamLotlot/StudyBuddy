<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>StudyBuddy | Template</title>
    <link rel="shortcut icon" type="icon" href="img">
	<link rel="icon" type="image/x-icon" href="css/img/StudyBuddy.ico">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/notepad.css">
    <link rel="stylesheet" href="css/subscription.css">
  	<script src="https://kit.fontawesome.com/8ef5e4d9da.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body onload="Online()">
<?php
	include 'nav.php';
?>
    <section>
        <div class="membership-plan">
            <h1>1 Month</h1>
            <div id="paypal-button-container-P-1NX82174NM094511MMUJOJGY"></div>
            <script src="https://www.paypal.com/sdk/js?client-id=AfzEVDUhg26nlZW-2fBLNQGvUkf6sm4KRIAumiZPxbV5Z-m4hjqEKUUEysSsVk55X9rKLMfvs5v3yyb7&vault=true&intent=subscription" data-sdk-integration-source="button-factory"></script>
        </div>
        <div class="membership-plan">
        </div>
    </section>
    <script src="js/subscription.js"></script>
	<script src="js/main.js"></script>
    <script src="js/notepad.js"></script>
</body>
</html>