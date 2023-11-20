<?php

include "db_conn.php";

if (isset($_POST['product']) && isset($_POST['user']) && isset($_POST['seller']) && isset($_POST['comment']) && isset($_POST['rate'])) {

    $product = $_POST["product"];
    $user = $_POST["user"];
    $seller = $_POST["seller"];
    $comment = $_POST["comment"];
    $rate = $_POST["rate"];

    $sql1 = "SELECT * FROM `market` WHERE `name` = '$product' AND `seller` = '$seller'";
    $result1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result1) > 0) {
        $row1 = mysqli_fetch_array($result1);

        $productid = $row1["productid"];

        $sql2 = "SELECT * FROM `product_rating` WHERE `productid` = '$productid' AND `seller` = '$seller'";
        $result2 = mysqli_query($conn, $sql2);
    
        if ($result2 && mysqli_num_rows($result2) > 0) {
            echo "Existing";
    
        } else {
    
            // Get the current time in the Philippines
            date_default_timezone_set('Asia/Manila');
            $currentDateTime = date('Y-m-d H:i:s');
            $date = date('Y-m-d', strtotime($currentDateTime));
            $time = date('H:i:s', strtotime($currentDateTime));
        
            $sql3 = "INSERT INTO `product_rating`(`productid`,`user`, `seller`, `rate`, `comment`, `date`, `time`) 
                    VALUES ('$productid','$user','$seller','$rate','$comment','$date','$time')";
            $result3 = mysqli_query($conn, $sql3);
        
            if ($result2){
                echo "Success";
            } else {
                echo "Failed";
            }
        }
    } else {
        echo "Product-Name";
    }
} else {
    echo "Unknown";
}

?>