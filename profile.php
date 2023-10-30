<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>StudyBuddy | Profile Page</title>
    <link rel="shortcut icon" type="icon" href="img">
	<link rel="icon" type="image/x-icon" href="css/img/StudyBuddy.ico">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/notepad.css">
    <link rel="stylesheet" href="css/profile.css">
  	<script src="https://kit.fontawesome.com/8ef5e4d9da.js"></script>
</head>
<body onload="Online()">
<?php
	include 'nav.php';
?>
	<section>
		<?php

			$username;

			if (isset($_POST['userOnline'])) {
				$username = $_POST['userOnline'];
			}

			$sql = "SELECT * FROM `account` WHERE `username` = '$username'";

			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
					$password = $row['password'];
					$state = $row['state'];
					$email = $row['email'];
					$fullname = $row['fullname'];
					$address = $row['address'];
					$yearSection = $row['yearSection'];
					$age = $row['age'];
					$studentid = $row['studentid'];
					$sex = $row['sex'];
					$contact = $row['contact'];
					$profile = $row['profile'];

					echo '
					<div id="img-con">
						<img src="documents/profile/'.$profile.'">
						<h1 id="badges-label">Badges:</h1>
					</div>
					<div id="des-con">
						<div id="des-row1">
						<h2 class="des-label">Username</h2>
						<h2 class="des-label">Password</h2>
						<input type="text" class="des-input" id="username" placeholder="username" value="'.$username.'" disabled>
						<input type="text" class="des-input" id="password" placeholder="password" value="'.$password.'" disabled>
						<h2 class="des-label">Email</h2>
						<h2 class="des-label">Fullname</h2>
						<input type="text" class="des-input" id="email" placeholder="email" value="'.$email.'" disabled>
						<input type="text" class="des-input" id="fullname" placeholder="fullname" value="'.$fullname.'" disabled>
						<h2 class="des-label">Address</h2>
						<h2 class="des-label">Year & Section</h2>
						<input type="text" class="des-input" id="address" placeholder="address" value="'.$address.'" disabled>
						<input type="text" class="des-input" id="year-section" placeholder="yearSection" value="'.$yearSection.'" disabled>
						<div class="des-sub-row">
							<h2 class="des-label">Age</h2>
							<h2 class="des-label">Student ID</h2>
							<input type="text" class="des-input" id="age" placeholder="age" value="'.$age.'" disabled>
							<input type="text" class="des-input" id="student-id" placeholder="studentid" value="'.$studentid.'" disabled>
						</div>
						<div class="des-sub-row">
							<h2 class="des-label">Sex</h2>
							<h2 class="des-label">Contact</h2>
							<input type="text" class="des-input" id="sex" placeholder="sex" value="'.$sex.'" disabled>
							<input type="text" class="des-input" id="contact" placeholder="contact" value="'.$contact.'" disabled>
						</div>
					</div>
					<div id="des-row2">
						<div id="btn-con">
							<button class="btn" id="edit-btn">Edit</button>
							<button class="btn" id="cancel-btn" style="display: none;">Cancel</button>
							<button class="btn" id="update-btn" style="display: none;">Update</button>
						</div>
					</div>
				</div>
				';
				}
			}
        ?>
	</section>
	<script src="js/jQuery-3.6.4.js"></script>
	<script src="js/main.js"></script>
	<script src="js/profile.js"></script>
</body>
</html>