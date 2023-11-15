<?php

include "db_conn.php";

if (isset($_POST['userid']) && isset($_POST['buddyid']) && isset($_POST['groupid']) && isset($_POST['message'])) {

    $userid = $_POST["userid"];
    $buddyid = $_POST["buddyid"];
    $groupid = $_POST["groupid"];
    $message = $_POST["message"];

    date_default_timezone_set('Asia/Manila');
    $currentDateTime = date('Y-m-d H:i:s');
    $timestamp = date('H:i:s', strtotime($currentDateTime));

    $sql1 = "INSERT INTO `messages`(`senderid`, `receiverid`, `groupid`, `message`, `timestamp`) 
            VALUES ('$userid','$buddyid','$groupid','$message','$timestamp')";
    $result1 = mysqli_query($conn, $sql1);

    if ($result1) {
        echo "Success";
    } else {
        echo "Failed";
    }
} else {
    echo "Unknown";
}

?>