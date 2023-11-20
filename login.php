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
</head>
<body onload="Online()">
<?php
    include 'nav.php';
?>
    <section>
		<div id="email-verify-wrapper" style="display: none;">
			<div id="email-verify-con">
				<h1 id="email-verify-label">Email OTP Verification</h1>
				<input type="email" id="email-input" placeholder="example@gmail.com">
				<input type="text" id="email-verify-input" style="display: none;">
				<input type="text" id="email-password-input" placeholder="password" style="display: none;">
				<p id="email-output" style="display: none;"></p>
				<a href="#" id="email-resend-otp" style="display: none;">Resend OTP?</a>
				<div id="email-btn-grp">
					<button id="email-back-btn">Back</button>
					<button id="email-next-btn">Next</button>
					<button id="email-confirm-btn" style="display: none;">Confirm</button>
					<button id="email-update-btn" style="display: none;">Update</button>
				</div>
			</div>
		</div>
    	<div class="separator"></div>
        <div class="loginContainer">
        	<div class="loginCol1">
	            <label>Username</label><input type="text" class="input-field" name="username" id="username" required>
	            <label>Password</label><input type="password" class="input-field" name="password" id="password" required>
				<div><input type="checkbox" id="remember-me" checked><span id="remember-me-label">Remember Me</span></div>
				<span id="message"></span>
	            <a href="#ss-container" id="forgot-pass">Forgot your password?</a>
        	</div>
	        <div class="loginCol2">
				<!-- <i class="fa-solid fa-right-to-bracket"></i> -->
				<button id="loginBtn" for="loginBtn">Sign in</button>
	        </div>
        </div>
    </section>
	<script src="js/jQuery-3.6.4.js"></script>
	<script src="js/smtp.js"></script>
	<script src="js/main.js"></script>
	<script src="js/login.js"></script>
</body>
</html>