<?php

include "db_conn.php";

if (isset($_POST['product']) && isset($_POST['user']) && isset($_POST['seller']) && isset($_POST['issue']) && isset($_POST['statement'])) {

    $product = $_POST["product"];
    $user = $_POST["user"];
    $seller = $_POST["seller"];
    $issue = $_POST["issue"];
    $statement = $_POST["statement"];

    
    $sql1 = "SELECT * FROM `market` WHERE `name` = '$product' AND `seller` = '$seller'";
    $result1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result1) > 0) {

        $row1 = mysqli_fetch_array($result1);
        $productid = $row1["productid"];

        // Get the current time in the Philippines
        date_default_timezone_set('Asia/Manila');
        $currentDateTime = date('Y-m-d H:i:s');
        $date = date('Y-m-d', strtotime($currentDateTime));
        $time = date('H:i:s', strtotime($currentDateTime));
    
        $sql2 = "INSERT INTO `product_report`(`productid`,`product`, `user`, `seller`, `issue`, `statement`, `date`, `time`) 
                VALUES ('$productid','$product','$user','$seller','$issue','$statement','$date','$time')";
        $result2 = mysqli_query($conn, $sql2);
    
        if ($result2){
    
            $sql3 = "UPDATE `market` SET `state`='reported' WHERE `productid` = '$productid'";
            $result3 = mysqli_query($conn, $sql3);

            if ($result3){

                echo "Success";
            } else {
                echo "Failed";
            }
        } else {
            echo "Failed";
        }
    } else {
        echo "Failed";
    }

} else {
    echo "Unknown";
}

?>