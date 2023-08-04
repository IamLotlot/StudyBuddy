<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>StudyBuddy | Login Page</title>
    <link rel="shortcut icon" type="icon" href="img">
	<link rel="icon" type="image/x-icon" href="css/img/StudyBuddy.ico">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/login.css">
  	<script src="https://kit.fontawesome.com/8ef5e4d9da.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body onload="Online()">
<?php
    include 'nav.php';
?>
    <section>
    	<div class="separator"></div>
        <div class="loginContainer">
        	<div class="loginCol1">
	            <label>Username</label><input type="text" class="input-field" name="username" id="username" required>
	            <label>Password</label><input type="password" class="input-field" name="password" id="password" required>
				<div><input type="checkbox" id="remember-me"><span id="remember-me-label">Remember Me</span></div>
				<span id="message"></span>
	            <a href="#ss-container">Don't have an account?</a>
        	</div>
	        <div class="loginCol2">
				<i class="fa-solid fa-right-to-bracket" id="loginBtn" for="loginBtn"></i>
	        </div>
        </div>
    </section>
	<script src="js/main.js"></script>
	<script src="js/login.js"></script>
</body>
</html>