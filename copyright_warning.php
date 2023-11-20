<?php

include "db_conn.php";

if (isset($_POST['username']) && isset($_POST['action'])) {

    $username = $_POST["username"];
    $action = $_POST["action"];

    if ($action == "check") {
        
        $sql1 = "SELECT * FROM `account` WHERE `username` = '$username'";
        $result1 = mysqli_query($conn, $sql1);
    
        if ($result1 && mysqli_num_rows($result1) > 0) {
            $row1 = mysqli_fetch_array($result1);
    
            $copyright = $row1["copyright"];
        
            if ($copyright) {
                echo "True";
            } else {
                echo "False";
            }
        } else {
            echo "Username";
        }

    } else if ($action == "upload") {

        $sql1 = "SELECT * FROM `account` WHERE `username` = '$username'";
        $result1 = mysqli_query($conn, $sql1);
    
        if ($result1 && mysqli_num_rows($result1) > 0) {
            $row1 = mysqli_fetch_array($result1);
    
            $copyright = $row1["copyright"];
        
            if ($copyright) {
                echo "True";
            } else {

                $sql2 = "UPDATE `account` SET `copyright` = '1' WHERE `username` = '$username'";
                $result2 = mysqli_query($conn, $sql2);

                if ($result2) {
                    echo "Success";
                } else {
                    echo "Username";
                }
            }
        } else {
            echo "Username";
        }
    } else {

    }
} else {
    echo "Unknown";
}

?>