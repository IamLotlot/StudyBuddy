<?php

include "db_conn.php";

if (isset($_POST['user']) && isset($_POST['course']) && isset($_POST['category']) && isset($_POST['sex']) && isset($_POST['age']) && isset($_POST['description']) && isset($_POST['action'])) {

    $user = $_POST["user"];
    $course = $_POST["course"];
    $category = $_POST["category"];
    $sex = $_POST["sex"];
    $age = $_POST["age"];
    $description = $_POST["description"];
    $action = $_POST["action"];

    // Adding the user to queue
    if ($action === "queue") {

        $sql1 = "SELECT * FROM `account` WHERE `username` = '$user'";
        $result1 = mysqli_query($conn, $sql1);

        if (mysqli_num_rows($result1) > 0) {
            while ($row = mysqli_fetch_assoc($result1)) {

                $fullname = $row['fullname'];
        
                $sql2 = "SELECT * FROM `search_queue` WHERE `fullname` = '$fullname'";
                $result2 = mysqli_query($conn, $sql2);
            
                if ((mysqli_num_rows($result2) > 0)){
                    echo "Existing";

                } else {

                    date_default_timezone_set('Asia/Manila');
                    $currentDateTime = date('Y-m-d H:i:s');
                    $date = date('Y-m-d', strtotime($currentDateTime));
                    $time = date('H:i:s', strtotime($currentDateTime));

                    $sql3 = "INSERT INTO `search_queue`(`fullname`, `course`, `category`, `sex`, `age`, `description`, `date`, `time`) 
                            VALUES ('$fullname','$course','$category','$sex','$age','$description','$date','$time')";
                    $result3 = mysqli_query($conn, $sql3);

                    if ($result3){
                        echo "Queue_Success";
                    } else {
                        echo "Failed";
                    }
                }
            }
        } else {
            echo "Username";
        }
    // Searching for a match
    } else if ($action === "search") {

        $fullname;
        $sql1;

        $sql1 = "SELECT * FROM `account` WHERE `username` = '$user'";
        $result1 = mysqli_query($conn, $sql1);

        if (mysqli_num_rows($result1) > 0) {
            while ($row = mysqli_fetch_assoc($result1)) {

                $fullname = $row['fullname'];
            }
        } else {
            echo "Username";
        }

        // CSA - Course & Sex & Age
        if ($course == "none" && $sex == "none" && $age == 0) {
            $sql1 = "SELECT * FROM `search_queue` WHERE `fullname` != '$fullname' AND `category` = '$category' ORDER BY `date` DESC LIMIT 1";
            // echo "MISSING: Course, Sex, Age (Category)";
        // CS - Course & Sex
        } else if ($course == "none" && $sex == "none" && $age !== "none") {
            $sql1 = "SELECT * FROM `search_queue` WHERE `fullname` != '$fullname' AND `category` = '$category' AND `age` = '$age' ORDER BY `date` DESC LIMIT 1";
            // echo "MISSING: Course, Sex (Category & Age)";
        // CA - Course & Age
        } else if ($course == "none" && $age == 0 && $sex !== "none") {
            $sql1 = "SELECT * FROM `search_queue` WHERE `fullname` != '$fullname' AND `category` = '$category' AND `sex` = '$sex' ORDER BY `date` DESC LIMIT 1";
            // echo "MISSING: Course, Age (Category & Sex)";
        // SA - Sex & Age
        } else if ($sex == "none" && $age == 0 && $course !== "none") {
            $sql1 = "SELECT * FROM `search_queue` WHERE `fullname` != '$fullname' AND `category` = '$category' AND `course` = '$course' ORDER BY `date` DESC LIMIT 1";
            // echo "MISSING: Sex, Age (Category & Course)";
        // C - Course
        } else if ($course == "none" &&  $sex !== "none" && $age != 0) {
            $sql1 = "SELECT * FROM `search_queue` WHERE `fullname` != '$fullname' AND `category` = '$category' AND `sex` = '$sex' AND `sex` = '$age' ORDER BY `date` DESC LIMIT 1";
            // echo "MISSING: Course (Category & Sex & Age)";
        // No missing
        } else if ($course !== "none" && $sex !== "none" && $age != 0){
            $sql1= "SELECT * FROM `search_queue` WHERE `fullname` != '$fullname' AND `category` = '$category' AND `course` = '$course' AND `sex` = '$sex' AND `age` = '$age' ORDER BY `date` DESC LIMIT 1";
            // echo "NO MISSING (Category & Course & Sex & Age)";
        } else {
            echo "Bug_Variables";
        }

        $result1 = mysqli_query($conn, $sql1);

        if (mysqli_num_rows($result1) > 0) {
            while ($row = mysqli_fetch_assoc($result1)) {

                $matched_queueId = $row['queueId'];

                $sql2 = "SELECT * FROM `search_queue` WHERE `queueId` = '$matched_queueId'";
                $result2 = mysqli_query($conn, $sql2);

                if (mysqli_num_rows($result2) > 0) {
                    while ($row = mysqli_fetch_assoc($result2)) {

                        // Match ID generator
                        function generateMatchId() {
                            // Generate a random number between 100000 and 999999 (inclusive)
                            $matched_Id = rand(100000, 999999);
                            return $matched_Id;
                        }

                        $matched_Id = generateMatchId();
                        $matched_fullname = $row['fullname'];
                        $matched_course = $row['course'];
                        $matched_category = $row['category'];
                        $matched_sex = $row['sex'];
                        $matched_age = $row['age'];
                        $matched_description = $row['description'];
                        $matched_date = $row['date'];
                        $matched_time = $row['time'];
        
                        $sql3 = "INSERT INTO `search_queue_con`(`matchId`, `fullname`, `course`, `category`, `sex`, `age`, `description`, `date`, `time`) 
                                VALUES ('$matched_Id','$matched_fullname','$matched_course','$matched_category','$matched_sex','$matched_age','$matched_description','$matched_date','$matched_time')";
                        $result3 = mysqli_query($conn, $sql3);

                        if ($result3) {

                            $sql4 = "SELECT * FROM `account` WHERE `username` = '$user'";
                            $result4 = mysqli_query($conn, $sql4);
                            
                            if ($result4) {

                                date_default_timezone_set('Asia/Manila');
                                $currentDateTime = date('Y-m-d H:i:s');
                                $date = date('Y-m-d', strtotime($currentDateTime));
                                $time = date('H:i:s', strtotime($currentDateTime));

                                $sql5 = "INSERT INTO `search_queue_con`(`matchId`, `fullname`, `course`, `category`, `sex`, `age`, `description`, `date`, `time`) 
                                        VALUES ('$matched_Id','$fullname','$course','$category','$sex','$age','$description','$date','$time')";
                                $result5 = mysqli_query($conn, $sql5);

                                if ($result5) {

                                    echo "Search_Success";

                                    // $sql6 = "DELETE FROM `search_queue` WHERE `queueId` = '$matched_queueId'";
                                    // $result6 = mysqli_query($conn, $sql6);

                                    // if ($result6) {

                                    //     $sql7 = "DELETE FROM `search_queue_con` WHERE `matchId` = '$matched_Id'";
                                    //     $result7 = mysqli_query($conn, $sql7);

                                    //     echo "Search_Success";
                                    // }
                                }
                            } else {
                                echo "Username";
                            }
                        } else {
                            echo "Failed";
                        }
                    }
                } else {
                    echo "No_QueueID";
                }
            }
        } else {
            echo "No_Match";
        }
    }
} else {
    echo "Unknown";
}

?>