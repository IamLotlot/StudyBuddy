<?php

include "db_conn.php";

if (isset($_POST['product']) && isset($_POST['seller']) && isset($_POST['user']) && isset($_POST['condition'])) {

    $product = $_POST["product"];
    $seller = $_POST["seller"];
    $user = $_POST["user"];
    $condition = $_POST["condition"];

    if ($condition === "true") {
        $sql1 = "SELECT * FROM `product_favorite` WHERE `product` = '$product' AND `seller` = '$seller' AND `user` = '$user'";
        $result1 = mysqli_query($conn, $sql1);
    
        if ($result1 && mysqli_num_rows($result1) > 0) {
            date_default_timezone_set('Asia/Manila');
            $currentDateTime = date('Y-m-d H:i:s');
            $date = date('Y-m-d', strtotime($currentDateTime));
            $time = date('H:i:s', strtotime($currentDateTime));
        
            $sql2 = "DELETE FROM `product_favorite` WHERE `product` = '$product' AND `seller` = '$seller' AND `user` = '$user'";
            $result2 = mysqli_query($conn, $sql2);
        
            if ($result2){
                echo "T_Success";
            } else {
                echo "T_Failed";
            }
    
        } else {
            echo "Existing";
        }

    } else if ($condition === "false") {
        $sql1 = "SELECT * FROM `product_favorite` WHERE `product` = '$product' AND `seller` = '$seller' AND `user` = '$user'";
        $result1 = mysqli_query($conn, $sql1);
    
        if ($result1 && mysqli_num_rows($result1) > 0) {
            echo "Existing";
    
        } else {
    
            date_default_timezone_set('Asia/Manila');
            $currentDateTime = date('Y-m-d H:i:s');
            $date = date('Y-m-d', strtotime($currentDateTime));
            $time = date('H:i:s', strtotime($currentDateTime));
        
            $sql2 = "INSERT INTO `product_favorite`(`product`, `user`, `seller`, `date`, `time`) 
                    VALUES ('$product','$user','$seller','$date','$time')";
            $result2 = mysqli_query($conn, $sql2);
        
            if ($result2){
                echo "F_Success";
            } else {
                echo "F_Failed";
            }
        }

    } else {
        echo "Condition";
    }

} else {
    echo "Unknown";
}

?>