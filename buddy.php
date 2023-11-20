<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>StudyBuddy | Buddy Page</title>
    <link rel="shortcut icon" type="icon" href="img">
	<link rel="icon" type="image/x-icon" href="css/img/StudyBuddy.ico">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/notepad.css">
    <link rel="stylesheet" href="css/buddy.css">
  	<script src="https://kit.fontawesome.com/8ef5e4d9da.js"></script>
</head>
<body onload="Online()">
<?php
	include 'nav.php';
    include 'notepad.php';
	// function updateChat(){

	// 	include 'db_conn.php';

	// 	$sql1 = "SELECT COUNT(*) AS row_count FROM `messages`;";
	// 	$result1 = mysqli_query($conn, $sql1);
	
	// 	if ($result1) {
	
	// 		$row = mysqli_fetch_assoc($result1);
	// 		$row_count1 = $row['row_count'];
	
	// 		while ($i = 0) {
				
	// 			$sql2 = "SELECT COUNT(*) AS row_count FROM `messages`;";
	// 			$result2 = mysqli_query($conn, $sql2);
				
	// 			if ($result2) {
	
	// 				$row = mysqli_fetch_assoc($result2);
	// 				$row_count2 = $row['row_count'];
					
	// 				$i++;
				
	// 				if ($row_count1 < $row_count2) {
	// 					break;
	// 				}
	// 			}
	// 		}
	
	// 	} else {
	// 		echo "Error executing query: " . mysqli_error($conn);
	// 	}
	// }
?>
	<section>
		<div class="groupCol">
			<?php

			if (isset($_SESSION['userOnline'])) {

				$userOnline = $_SESSION['userOnline'];

				$sql1 = "SELECT * FROM `account` WHERE `username` = '$userOnline'";
				$result1 = mysqli_query($conn, $sql1);

				if (mysqli_num_rows($result1) > 0) {
					while ($row = mysqli_fetch_assoc($result1)) {
						
						$userid = $row['userid'];

						$sql2 = "SELECT * FROM `message_members` WHERE `userid` = '$userid'";
						$result2 = mysqli_query($conn, $sql2);

						if (mysqli_num_rows($result2) > 0) {
							while ($row = mysqli_fetch_assoc($result2)) {
								
								$groupid = $row['groupid'];

								$sql3 = "SELECT * FROM `message_members` WHERE `groupid` = '$groupid' AND `userid` != '$userid'";
								$result3 = mysqli_query($conn, $sql3);
		
								if (mysqli_num_rows($result3) > 0) {
									while ($row = mysqli_fetch_assoc($result3)) {
										
										$matched_userid = $row['userid'];

										$sql4 = "SELECT * FROM `account` WHERE `userid` = '$matched_userid'";
										$result4 = mysqli_query($conn, $sql4);
				
										if (mysqli_num_rows($result4) > 0) {
											while ($row = mysqli_fetch_assoc($result4)) {
												
												$username = $row['username'];
												$fullname = $row['fullname'];
												$profile = $row['profile'];
												
												$sql5 = "SELECT * FROM `messages` WHERE `groupid` = '$groupid' ORDER BY `id` DESC LIMIT 1";
												$result5 = mysqli_query($conn, $sql5);
							
												if (mysqli_num_rows($result5) > 0) {
													while ($row = mysqli_fetch_assoc($result5)) {

														echo '
														<div class="users-con" onclick="clickUser(\''.$userid.'\', \''.$matched_userid.'\', \''.$username.'\', \''.$groupid.'\')">
															<img src="documents/profile/'.$profile.'" alt="user-profile" class="users-img">
															<div>
																<h2 class="users-name">'.$username.'</h2>
																<h3 class="users-recent-msg"></h3>
															</div>
														</div>';
													}
												} else {
													echo '
													<div class="users-con" onclick="clickUser(\''.$userid.'\', \''.$matched_userid.'\', \''.$username.'\', \''.$groupid.'\')">
														<img src="documents/profile/'.$profile.'" alt="user-profile" class="users-img">
														<div>
															<h2 class="users-name">'.$username.'</h2>
															<h3 class="users-recent-msg"></h3>
														</div>
													</div>';
												}
											}
										} else {
											// echo "No buddy account listed in account";
										}
									}
								} else {
									// No groupid listed in message_members
								}
							}
						} else {
							// No account listed in message_members
						}
					}
				} else {
					// No account listed in account
				}
			} else {

			}
			?>
		</div>
		<div class="messageCol">
			<h1 id="group-name">Group Name</h1>
			<div id="messages">
			</div>
			<div id="sendMsg">
				<input type="text" id="msgTxt" placeholder="Send message..." disabled>
				<input type="submit" id="msgBtn" value="Send" style="display:none">
				<i class="fa-solid fa-share-from-square" id="msgIcon" for="msgBtn"></i>
			</div>
		</div>
		<div class="profileCol">
			<div class="profileWrapper">
			<?php
				$sql = "SELECT * FROM `account`";
	
				$result = mysqli_query($conn, $sql);
	
				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						$username = $row['username'];
						$image = $row['profile'];
	
						echo '
						<div class="profileCon">
							<img src="documents/profile/'.$image.'" class="productImage">
							<label id="profileName">'.$username.'</label>
						</div>';
					}
				}
			?>
			</div>
		</div>
	</section>
	<script src="js/jQuery-3.6.4.js"></script>
	<script src="js/main.js"></script>
    <script src="js/notepad.js"></script>
	<script src="js/buddy.js"></script>
</body>
</html>