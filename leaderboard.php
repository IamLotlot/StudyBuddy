<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>StudyBuddy | Leaderboard Page</title>
    <link rel="shortcut icon" type="icon" href="img">
	<link rel="icon" type="image/x-icon" href="css/img/StudyBuddy.ico">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/notepad.css">
    <link rel="stylesheet" href="css/leaderboard.css">
  	<script src="https://kit.fontawesome.com/8ef5e4d9da.js"></script>
</head>
<body onload="Online()">
<?php
	include 'nav.php';
    include 'notepad.php';
?>
    <section>
        <div id="lb-wrapper">
            <div class="lb-con">
                <div id="lb-header-con">
                    <h1 class="lb-header" id="lb-header-img"></h1>
                    <h1 class="lb-header" id="lb-header-username">Username</h1>
                    <h1 class="lb-header" id="lb-header-rank">Ranking</h1>
                </div>
            <?php

            $sql1 = "SELECT * FROM `account` WHERE `role` = 'user' AND `state` = 'verified' ORDER BY `studycoin` DESC LIMIT 5";
            $result1 = mysqli_query($conn, $sql1);

            if ($result1 && mysqli_num_rows($result1) > 0) {
                $rank = 1;
                while ($row1 = mysqli_fetch_assoc($result1)) {

                    $profile = $row1["profile"];
                    $username = $row1["username"];

                    echo '
                    <div class="lb-list">
                        <img src="documents/profile/'.$profile.'" alt="" class="list-label" id="profile">
                        <h1 class="list-label" id="username">'.$username.'</h1>
                        <h1 class="list-label" id="rank">'.$rank.'</h1>
                    </div>';

                    $rank = $rank + 1;
                }
            }
            ?>
            </div>
        </div>
    </section>
	<script src="js/jQuery-3.6.4.js"></script>
	<script src="js/main.js"></script>
    <script src="js/notepad.js"></script>
</body>
</html>