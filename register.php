<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>StudyBuddy | Register Page</title>
    <link rel="shortcut icon" type="icon" href="img">
	<link rel="icon" type="image/x-icon" href="css/img/StudyBuddy.ico">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/notepad.css">
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
						<img id="chosenPicture" name="chosenPicture" style="display: none;" onclick="">
			    		<input type="file" id="profile" name="profile" style="display: none;" onchange="displayImage(this)">
			    		<label for="profile" id="inputImg">+</label>
			    		<label>Contact Number:</label><input type="contact" id="contact" name="contact" oninput="this.value = this.value.replace(/[^0-9]/g, '')" maxlength="11">
			    	</div>
			    	<div class="perCol2">
			    		<label>Fullname:</label><input type="text" id="fullname" name="fullname" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')">
			    		<label>Address:</label><input type="address" id="address" name="address" oninput="this.value = this.value.replace(/[^a-zA-Z0-9\s]/g, '')">
			    		<div class="perSeparator">
			    			<div class="perBox">
			    				<label>Year & Section:</label><input type="text" id="yearSection" name="yearSection">
			    			</div>
			    			<div class="perBox">
			    				<label>Student ID:</label><input type="text" id="studentid" name="studentid" oninput="this.value = this.value.replace(/[^0-9-]/g, '')">	
			    			</div>
			    			<div class="perBox">
			    				<label>Age:</label><input type="number" id="age" name="age" oninput="this.value = this.value.replace(/[^0-9]/g, '')">	
			    			</div>
			    			<div class="perBox">
							<label for="sex">Sex:</label>
							<select id="sex" name="sex">
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
			    			</div>
			    		</div>
			    	</div>
			    </div>
			</section>
			<section class="account">
			    <label class="accTitle">Account Details</label>
			    <div class="accCon">
			    	<div class="accCol1">
			    		<label>Username:</label><input type="text" class="accInput" id="username" name="username" oninput="this.value = this.value.replace(/[^a-zA-Z0-9\s]/g, '')">
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
			    		<label>Face Capture:</label><input type="button" id="verification-button" name="verification-button" value="Scan">
			    	</div>
					<?php
						include 'face_verification.php';
					?>
			    </div>
			    <input type="submit" id="registerBtn" value="Register"></input>
			</section>
        </form>
	<script src="js/jQuery-3.6.4.js"></script>
    <script src="js/face_verification.js"></script>
    <script src="js/main.js">
        AOS.init();
	</script>
    <script src="js/notepad.js"></script>
    <script src="js/register.js"></script>
</body>
</html>