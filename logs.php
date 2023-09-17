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
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body onload="Online()">
<?php
	include 'nav.php';
?>
	<section>
		<div id="header">
			<label class="title" id="header-username">Username</label>
			<label class="title" id="header-event">Event</label>
			<label class="title" id="header-date">Date</label>
			<label class="title" id="header-time">Time</label>
		</div>
		<?php

		$sql = "SELECT * FROM `log`";

		$result = mysqli_query($conn, $sql);

		if ($result) {
			while ($row = mysqli_fetch_assoc($result)) {
				$username = $row['username'];
				$event = $row['event'];
				$date = $row['date'];
				$time = $row['time'];
					
				echo '
				<div class="rows">
					<label id="username">'.$username.'</label>
					<label id="event">'.$event.'</label>
					<label id="date">'.$date.'</label>
					<label id="time">'.$time.'</label>
				</div>';
			}
		}
		?>
	</section>
	<script src="js/main.js"></script>
</body>
</html>