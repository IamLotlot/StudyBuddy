<?php

include "db_conn.php";

if (isset($_POST['title']) && isset($_POST['content']) && isset($_POST['username'])) {

    $title = $_POST["title"];
    $content = $_POST["content"];
    $username = $_POST["username"];

    if ($title){
        if ($content){
            if ($username){
                // Get the current time in the Philippines
                date_default_timezone_set('Asia/Manila');
                $currentDateTime = date('Y-m-d H:i:s');
                $date = date('Y-m-d', strtotime($currentDateTime));
                $time = date('H:i:s', strtotime($currentDateTime));

                $sql = "INSERT INTO `notes`(`id`, `title`, `content`, `sender`, `user`, `status`, `date`, `time`) 
                        VALUES ('','$title','$content','','$username','created','$date','$time')";

                $result = mysqli_query($conn, $sql);

                if ($result){
                    echo "Success";
                } else {
                    echo "Failed";
                }
            } else {
                echo "Username";
            }
        } else {
            echo "Content";
            }
    } else {
        echo "Title"; 
    }
} else {
    echo "Data";
}

?>