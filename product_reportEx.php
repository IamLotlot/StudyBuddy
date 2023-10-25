<?php

include "db_conn.php";

if (isset($_POST['product']) && isset($_POST['user']) && isset($_POST['seller']) && isset($_POST['issue']) && isset($_POST['statement'])) {

    $product = $_POST["product"];
    $user = $_POST["user"];
    $seller = $_POST["seller"];
    $issue = $_POST["issue"];
    $statement = $_POST["statement"];

    // Get the current time in the Philippines
    date_default_timezone_set('Asia/Manila');
    $currentDateTime = date('Y-m-d H:i:s');
    $date = date('Y-m-d', strtotime($currentDateTime));
    $time = date('H:i:s', strtotime($currentDateTime));

    $sql = "INSERT INTO `product_report`(`product`, `user`, `seller`, `issue`, `statement`, `date`, `time`) 
            VALUES ('$product','$user','$seller','$issue','$statement','$date','$time')";
    $result = mysqli_query($conn, $sql);

    if ($result){
        echo "Success";
    } else {
        echo "Failed";
    }
} else {
    echo "Unknown";
}

?>