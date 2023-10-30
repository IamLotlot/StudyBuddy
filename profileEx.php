<?php

include "db_conn.php";

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['fullname']) && isset($_POST['address']) && isset($_POST['yearSection']) && isset($_POST['age']) && isset($_POST['studentId']) && isset($_POST['sex']) && isset($_POST['contact'])) {

    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $fullname = $_POST["fullname"];
    $address = $_POST["address"];
    $yearSection = $_POST["yearSection"];
    $age = $_POST["age"];
    $studentId = $_POST["studentId"];
    $sex = $_POST["sex"];
    $contact = $_POST["contact"];

    $sql1 = "SELECT * FROM `account` WHERE `email` = '$email'";
    $result1 = mysqli_query($conn, $sql1);

    if ($result1 && mysqli_num_rows($result1) > 0) {
    
        $sql2 = "UPDATE `account` SET `username`='$username',`password`='$password',`fullname`='$fullname',
                `address`='$address',`yearSection`='$yearSection',`age`='$age', `studentid`='$studentId',`sex`='$sex',
                `contact`='$contact' WHERE `email` = '$email'";
        // profile is missing will add later -> ",`profile`='$profile'"
        $result2 = mysqli_query($conn, $sql2);
    
        if ($result2){
            echo "Success";
        } else {
            echo "Failed";
        }

    } else {
        echo "Nothing";
    }
} else {
    echo "Unknown";
}

?>