<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>StudyBuddy | Register Page</title>
    <link rel="shortcut icon" type="icon" href="img">
	<link rel="icon" type="image/x-icon" href="css/img/StudyBuddy.ico">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/register.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  	<script src="https://kit.fontawesome.com/8ef5e4d9da.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>
<body onload="Online()">
<?php
    include 'nav.php';
?>
        <form action="registerEx.php" method="post" enctype="multipart/form-data">
        	<section class="personal">
			    <label class="perTitle">Personal Details</label>
			    <div class="perCon">
			    	<div class="perCol1">
			    		<input type="file" id="profile" style="display:none;">
			    		<label for="profile" id="inputImg">+</label>
			    		<label>Contact Number:</label><input type="contact" id="contact" name="contact">
			    	</div>
			    	<div class="perCol2">
			    		<label>Fullname:</label><input type="text" id="fullname" name="fullname">
			    		<label>Address:</label><input type="address" id="address" name="address">
			    		<div class="perSeparator">
			    			<div class="perBox">
			    				<label>Year & Section:</label><input type="text" id="yearSection" name="yearSection">
			    			</div>
			    			<div class="perBox">
			    				<label>Student ID:</label><input type="text" id="studentid" name="studentid">	
			    			</div>
			    			<div class="perBox">
			    				<label>Age:</label><input type="text" id="age" name="age">	
			    			</div>
			    			<div class="perBox">
			    				<label>Sex:</label><input type="text" id="sex" name="sex">
			    			</div>
			    		</div>
			    	</div>
			    </div>
			</section>
			<section class="account">
			    <label class="accTitle">Account Details</label>
			    <div class="accCon">
			    	<div class="accCol1">
			    		<label>Username:</label><input type="text" class="accInput" id="username" name="username">
			    		<label>Email:</label><input type="email" class="accInput" id="email" name="email">
			    	</div>
			    	<div class="accCol2">
			    		<label>Password:</label><input type="password" class="accInput" id="password" name="password">
			    		<label>Confirm Password:</label><input type="password" class="accInput" id="confirmPass" name="confirmPass">
			    	</div>
			    </div>
			</section>
			<section class="verification">
			    <label class="verTitle">Verification</label>
			    <div class="verCon">
			    	<div class="verCol1">
			    		<label>Student ID (FRONT):</label><input type="file" id="studFront" name="studFront" accept=".jpg, .jpeg, .png">
			    		<label>Student ID (BACK):</label><input type="file" id="studBack" name="studBack" accept=".jpg, .jpeg, .png">
			    	</div>
			    	<div class="verCol2">
			    		<label>Face Verification:</label><input type="text">
			    	</div>
			    </div>
			    <input type="submit" id="registerBtn" value="Register"></input>
			</section>
        </form>
	<script src="js/main.js">
        AOS.init();
    </script>
</body>
</html>