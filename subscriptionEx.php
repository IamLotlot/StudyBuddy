<?php

include "db_conn.php";

if (isset($_POST['username']) && isset($_POST['id']) && isset($_POST['product']) && isset($_POST['given_name']) && isset($_POST['surname']) && isset($_POST['payer_email']) && isset($_POST['value']) && isset($_POST['payee_email'])) {

    $username = $_POST["username"];
    $id = $_POST["id"];
    $product = $_POST["product"];
    $given_name = $_POST["given_name"];
    $surname = $_POST["surname"];
    $payer_email = $_POST["payer_email"];
    $value = $_POST["value"];
    $payee_email = $_POST["payee_email"];

    $sql1 = "INSERT INTO `transaction_log`(`id`, `product`, `username`, `given_name`, `surname`, `payer_email`, `value`, `payee_email`) 
            VALUES ('$id','$product','$username','$given_name','$surname','$payer_email','$value','$payee_email')";
    $result1 = mysqli_query($conn, $sql1);

    if ($result1) {

        date_default_timezone_set('Asia/Manila');
        $currentDateTime = date('Y-m-d H:i:s');
        $date = date('Y-m-d', strtotime($currentDateTime . ' +1 month'));

        $sql2 = "UPDATE `account` SET `subscriber` = 'true',`date`='$date' WHERE `username` = '$username'";
        $result2 = mysqli_query($conn, $sql2);
        
        if ($result2) {
            echo "Success";
        } else {
            echo "Failed";
        }
    } else {
        echo "Transaction";
    }
} else {
    echo "Unknown";
}

?>