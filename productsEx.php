<?php

include "db_conn.php";

if (isset($_POST['action']) && isset($_POST['id'])) {

    $action = $_POST["action"];
    $id = $_POST["id"];

    if ($action == "verify") {

        $sql1 = "SELECT * FROM `market` WHERE `productid` = '$id' AND `state` = 'not-verified'";
        $result1 = mysqli_query($conn, $sql1);
    
        if (mysqli_num_rows($result1) > 0) {
    
                $sql2 = "UPDATE `market` SET `state` = 'verify' WHERE `productid` = '$id'";
                $result2 = mysqli_query($conn, $sql2);
    
                if ($result2) {
                    echo "Verify_Success";
                } else {
                    echo "Verify_Failed";
                }
        } else {
            echo "No_Verify";
        }
    } else {
        echo "Unknown";
    }
} else {
    echo "Unknown";
}
?>