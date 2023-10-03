<?php

include "db_conn.php";

if (isset($_POST['id']) && isset($_POST['username'])) {

    $id = $_POST["id"];
    $username = $_POST["username"];

    $sql1 = "SELECT * FROM `notes` WHERE `id` = '$id'";
    $result1 = mysqli_query($conn, $sql1);

    if ($result1 && mysqli_num_rows($result1) > 0) {
        $row = mysqli_fetch_array($result1);
        
        $title = $row["title"];
        $content = $row["content"];
        $user = $row["user"];

        // Get the current time in the Philippines
        date_default_timezone_set('Asia/Manila');
        $currentDateTime = date('Y-m-d H:i:s');
        $date = date('Y-m-d', strtotime($currentDateTime));
        $time = date('H:i:s', strtotime($currentDateTime));
    
        $sql2 = "INSERT INTO `notes`(`id`, `title`, `content`, `sender`, `user`, `status`, `date`, `time`) 
                VALUES ('','$title','$content','$user','$username','received','$date','$time')";
        $result2 = mysqli_query($conn, $sql2);
    
        if ($result2){
            echo "Success";
        } else {
            echo "Failed2";
        }
    } else {
        echo "Failed1";
    }
    
} else {
    echo "Unknown";
}

?>