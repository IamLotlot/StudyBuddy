<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>StudyBuddy | Login Page</title>
    <link rel="shortcut icon" type="icon" href="img">
	<link rel="icon" type="image/x-icon" href="css/img/StudyBuddy.ico">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/login.css">
  	<script src="https://kit.fontawesome.com/8ef5e4d9da.js"></script>
</head>
<body onload="Online()">
<?php
    include 'nav.php';
?>
    <section>
    	<div class="separator"></div>
        <form action="loginEx.php" method="post" class="input-group">
        	<div class="loginContainer">
        		<div class="loginCol1">
	                <label>Username</label><input type="text" class="input-field" name="username" id="username" required>
	                <label>Password</label><input type="password" class="input-field" name="password" id="password" required>
	                <a href="#ss-container">Don't have an account?</a>
        		</div>
	        	<div class="loginCol2">
	                <button type="submit" id="loginBtn" class="submit-btn" style="display:none"></button>
					<i class="fa-solid fa-right-to-bracket" for="loginBtn" onclick="clickLogin()"></i>
	        	</div>
        	</div>
        </form>
    </section>
	<script src="js/main.js"></script>
	<script src="js/login.js"></script>
</body>
</html>