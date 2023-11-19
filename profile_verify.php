<?php

include "db_conn.php";

if (isset($_POST['user']) && isset($_POST['action'])) {

    $user = $_POST["user"];
    $action = $_POST["action"];
    
    if ($action == "verify") {

        $sql1 = "SELECT * FROM `account` WHERE `username` = '$user'";
        $result1 = mysqli_query($conn, $sql1);
    
        if (mysqli_num_rows($result1) > 0) {
        
            $sql2 = "UPDATE `account` SET `verify_email` = '1' WHERE `username` = '$user'";
            $result2 = mysqli_query($conn, $sql2);
        
            if ($result2){
                echo "Success";
            } else {
                echo "Failed";
            }
        } else {
            echo "Username";
        }

    } else if ($action == "check") {

    }
} else {
    echo "Unknown";
}

?>