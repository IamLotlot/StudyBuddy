<?php
session_start();

include "db_conn.php";

if (isset($_POST['productid']) && isset($_POST['action']) && isset($_POST['reason'])) {

    $id = $_POST["productid"];
    $action = $_POST["action"];
    $reason = $_POST["reason"];

    if ($action == "accept") {
        
        $sql1 = "SELECT * FROM `product_report` WHERE `id` = '$id'";
        $result1 = mysqli_query($conn, $sql1);
        
        if ($result1 && mysqli_num_rows($result1) > 0) {
            $row1 = mysqli_fetch_array($result1);
            
            $productid = $row1["productid"];
            $product = $row1["product"];
            $user = $row1["user"];
            $seller = $row1["seller"];
            $issue = $row1["issue"];
            $statement = $row1["statement"];
    
            // Get the current time in the Philippines
            date_default_timezone_set('Asia/Manila');
            $currentDateTime = date('Y-m-d H:i:s');
            $date = date('Y-m-d', strtotime($currentDateTime));
            $time = date('H:i:s', strtotime($currentDateTime));
    
            $sql2 = "INSERT INTO `product_log`(`productid`, `event`, `reason`, `product`, `user`, `seller`, `issue`, `statement`, `date`, `time`) 
                    VALUES ('$productid','accepted','$reason','$product','$user','$seller','$issue','$statement','$date','$time')";
            $result2 = mysqli_query($conn, $sql2);
            
            if ($result2) {

                $sql3 = "DELETE FROM `product_report` WHERE `id` = '$id'";
                $result3 = mysqli_query($conn, $sql3);

                if ($result3) {
                    echo "Success_Accepted";
                } else{
                    echo "Failed";
                }
            } else {
                echo "Failed";
            }
        } else {
            echo "ProductId";
        }

    } else if ($action == "reject") {
        
        $sql1 = "SELECT * FROM `product_report` WHERE `id` = '$id'";
        $result1 = mysqli_query($conn, $sql1);
        
        if ($result1 && mysqli_num_rows($result1) > 0) {
            $row1 = mysqli_fetch_array($result1);
            
            $productid = $row1["productid"];
            $product = $row1["product"];
            $user = $row1["user"];
            $seller = $row1["seller"];
            $issue = $row1["issue"];
            $statement = $row1["statement"];
    
            // Get the current time in the Philippines
            date_default_timezone_set('Asia/Manila');
            $currentDateTime = date('Y-m-d H:i:s');
            $date = date('Y-m-d', strtotime($currentDateTime));
            $time = date('H:i:s', strtotime($currentDateTime));
    
            $sql2 = "INSERT INTO `product_log`(`productid`, `event`, `reason`, `product`, `user`, `seller`, `issue`, `statement`, `date`, `time`) 
                    VALUES ('$productid','rejected','$reason','$product','$user','$seller','$issue','$statement','$date','$time')";
            $result2 = mysqli_query($conn, $sql2);
            
            if ($result2) {

                $sql3 = "DELETE FROM `product_report` WHERE `id` = '$id'";
                $result3 = mysqli_query($conn, $sql3);

                if ($result3) {
                    echo "Success_Accepted";
                } else{
                    echo "Failed";
                }
            } else {
                echo "Failed";
            }
        } else {
            echo "ProductId";
        }
    } else {

    }
} else {
    
}
?>