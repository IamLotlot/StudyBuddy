<?php

include "db_conn.php";

if (isset($_POST['password']) && isset($_POST['email'])) {

    $password = $_POST["password"];
    $email = $_POST["email"];
        
    $sql1 = "SELECT * FROM `account` WHERE email = '$email'";
    $result1 = mysqli_query($conn, $sql1);
    
    if ($result1 && mysqli_num_rows($result1) > 0) {

        $sql2 = "UPDATE `account` SET `password` = '$password' WHERE email = '$email'";
        $result2 = mysqli_query($conn, $sql2);

        if ($result2) {
            echo "Success";
        } else {
            echo "Failed";
        }
    } else {
        echo "Username";
    }
} else {
    echo "Unknown";
}
?>