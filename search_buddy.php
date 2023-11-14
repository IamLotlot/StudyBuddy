<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>StudyBuddy | Search Buddy Page</title>
    <link rel="shortcut icon" type="icon" href="img">
	<link rel="icon" type="image/x-icon" href="css/img/StudyBuddy.ico">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/notepad.css">
    <link rel="stylesheet" href="css/search_buddy.css">
  	<script src="https://kit.fontawesome.com/8ef5e4d9da.js"></script>
</head>
<body onload="Online()">
<?php
	include 'nav.php';

    $course;
    $category;
    $sex;
    $age;
    $description;
    $queue;

    if (isset($_SESSION['userOnline'])) {

		$userOnline = $_SESSION['userOnline'];

        $sql1 = "SELECT * FROM `account` WHERE `username` = '$userOnline'";
        $result1 = mysqli_query($conn, $sql1);

        if (mysqli_num_rows($result1) > 0) {
            while ($row = mysqli_fetch_assoc($result1)) {

                $fullname = $row['fullname'];

                $sql2 = "SELECT * FROM `search_queue` WHERE `fullname` = '$fullname'";
                $result2 = mysqli_query($conn, $sql2);
                
                if (mysqli_num_rows($result2) > 0) {

                    $queue = "true";

                    while ($row = mysqli_fetch_assoc($result2)) {
                        $course = $row['course'];
                        $category = $row['category'];
                        $sex = $row['sex'];
                        $age = intval($row['age']);
                        $description = $row['description'];
                    }
                } else {

                    $course = "none";
                    $category = "none";
                    $sex = "none";
                    $age = 0;
                    $description = "none";
                }
            }
        } else {

        }
    } else {

    }
?>
    <section>
        <div id="input-con">
            <div id="first-section">
                <h2 class="labels">Course</h2>
                <select id="course" class="labels">
                    <option value="<?php echo($course); ?>"><?php echo($course); ?></option>
                    <option value="option2">Option 2</option>
                    <option value="option3">Option 3</option>
                    <option value="option4">Option 4</option>
                </select>
                <h2 class="labels">Category</h2>
                <select id="category" class="labels">
                    <option value="<?php echo($category); ?>"><?php echo($category); ?></option>
                    <option value="option2">Option 2</option>
                    <option value="option3">Option 3</option>
                    <option value="option4">Option 4</option>
                </select>
                <h2 class="labels">Sex</h2>
                <select id="sex" class="labels">
                    <option value="<?php echo($sex); ?>"><?php echo($sex); ?></option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                <h2 class="labels">Age</h2>
                <input type="number" class="inputs" id="age" value="<?php echo($age); ?>">
            </div>
            <div id="second-section">
                <textarea id="description" placeholder="Description..."><?php echo($description); ?></textarea>
                <?php 
                function useGlobalVar() {
                    global $queue;

                    if ($queue === "true") {
                        echo '<button id="cancel-btn">Cancel</button>';
                        echo '<button id="chat-btn" style="display: none;">Chat</button>';
                    } else {
                        echo '<button id="search-btn">Search</button>';
                        echo '<button id="chat-btn" style="display: none;">Chat</button>';
                    }
                }
                useGlobalVar();
                ?>
            </div>
        </div>
        <div id="result-con">
            <div id="matched-con">
                <div id="des-wrapper">
                    <div id="img-con">
                        <img src="" alt="" id="profile-img">
                    </div>
                    <div id="description-con">
                        <?php

                        $match_fullname = "";
                        $match_course = "";
                        $match_category = "";
                        $match_sex = "";
                        $match_age = "";
                        $match_description = "";

                        $sql3 = "SELECT * FROM `search_queue_con` WHERE `fullname` = '$fullname'";
                        $result3 = mysqli_query($conn, $sql3);

                        if (mysqli_num_rows($result3) > 0) {
                            while ($row = mysqli_fetch_assoc($result3)) {
                                $matchId = $row['matchId'];

                                $sql4 = "SELECT * FROM `search_queue_con` WHERE `matchId` = '$matchId' AND `fullname` != '$fullname'";
                                $result4 = mysqli_query($conn, $sql4);

                                if (mysqli_num_rows($result4) > 0) {
                                    while ($row = mysqli_fetch_assoc($result4)) {
                                        $match_fullname = $row['fullname'];
                                        $match_course = $row['course'];
                                        $match_category = $row['category'];
                                        $match_sex = $row['sex'];
                                        $match_age = $row['age'];
                                        $match_description = $row['description'];
                                    }
                                }
                            }

                        }

                        ?>
                        <h2>Fullname</h2><h3>:</h3><h1 id="searched-fn"><?php echo($match_fullname); ?></h1>
                        <h2>Course</h2><h3>:</h3><h1 id="searched-cou"><?php echo($match_course); ?></h1>
                        <h2>Category</h2><h3>:</h3><h1 id="searched-cat"><?php echo($match_category); ?></h1>
                        <h2>Sex</h2><h3>:</h3><h1 id="searched-sex"><?php echo($match_sex); ?></h1>
                        <h2>Age</h2><h3>:</h3><h1 id="searched-age"><?php echo($match_age); ?></h1>
                    </div>
                </div>
            <h2 id="searched-des"><?php echo($match_description); ?></h2>
            </div>
            <div id="loading-con">
                <h1 id="searching">Searching</h1>
            </div>
            <h1></h1>
        </div>
    </section>
	<script src="js/jQuery-3.6.4.js"></script>
	<script src="js/main.js"></script>
    <script src="js/notepad.js"></script>
    <script src="js/search_buddy.js"></script>
</body>
</html>