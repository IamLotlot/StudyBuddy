<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>StudyBuddy | Logs Page</title>
    <link rel="shortcut icon" type="icon" href="img">
	<link rel="icon" type="image/x-icon" href="css/img/StudyBuddy.ico">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/logs.css">
  	<script src="https://kit.fontawesome.com/8ef5e4d9da.js"></script>
</head>
<body onload="Online()">
<?php
	include 'nav.php';
?>
	<section id="logs-wrapper">
		<div id="logs-label">
			<h1 class="log-label" id="product-logs">Product Logs</h1>
			<h1 class="log-label" id="transaction-logs">Transaction Logs</h1>
			<h1 class="log-label" id="session-logs">Session Logs</h1>
		</div>
		<div id="logs-con">
			<div id="plogs-header-con" style="display: none;">
				<h2 class="plogs-header-label" id="id-plogs-header">ID</h2>
				<h2 class="plogs-header-label" id="">Event</h2>
				<h2 class="plogs-header-label" id="">Product</h2>
				<h2 class="plogs-header-label" id="">User</h2>
				<h2 class="plogs-header-label" id="">Seller</h2>
				<h2 class="plogs-header-label" id="">Issue</h2>
				<h2 class="plogs-header-label" id="">Date</h2>
				<h2 class="plogs-header-label" id="time-plogs-header">Time</h2>
			</div>
			<div id="tlogs-header-con" style="display: none;">
				<h2 class="tlogs-header-label" id="id-tlogs-header">Book</h2>
				<h2 class="tlogs-header-label" id="">Event</h2>
				<h2 class="tlogs-header-label" id="">Buyer</h2>
				<h2 class="tlogs-header-label" id="">Seller</h2>
				<h2 class="tlogs-header-label" id="">Price</h2>
				<h2 class="tlogs-header-label" id="">Date</h2>
				<h2 class="tlogs-header-label" id="time-tlogs-header">Time</h2>
			</div>
			<div id="slogs-header-con" style="display: none;">
				<h2 class="tlogs-header-label" id="id-tlogs-header">Username</h2>
				<h2 class="tlogs-header-label" id="">Event</h2>
				<h2 class="tlogs-header-label" id="">Date</h2>
				<h2 class="tlogs-header-label" id="time-tlogs-header">Time</h2>
			</div>
			<div id="logs-list">
				<div class="plogs-list" id="plogs-list" style="display: none;"></div>
				<div class="tlogs-list" id="tlogs-list" style="display: none;"></div>
				<div class="slogs-list" id="slogs-list" style="display: none;"></div>
			</div>
		</div>
	</section>
	<script src="js/jQuery-3.6.4.js"></script>
	<script src="js/main.js"></script>
    <script src="js/notepad.js"></script>
    <script src="js/logs.js"></script>
</body>
</html>