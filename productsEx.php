<?php

include "db_conn.php";

if (isset($_POST['username']) && isset($_POST['action']) && isset($_POST['id'])) {

    $username = $_POST["username"];
    $action = $_POST["action"];
    $id = $_POST["id"];

    if ($action == "verify") {

        $sql1 = "SELECT * FROM `account` WHERE `username` = '$username'";
        $result1 = mysqli_query($conn, $sql1);

        if (mysqli_num_rows($result1) > 0) {
            $row1 = mysqli_fetch_array($result1);
            
            // $sc = 0.00;
            $sc = $row1["studycoin"];
            $subscriber = $row1["subscriber"];
    
            // if (!is_double($sc)) {

            //     $sc = (double) $sc;
            
            // }

            $sql2 = "SELECT * FROM `market` WHERE `productid` = '$id' AND `state` = 'not-verified'";
            $result2 = mysqli_query($conn, $sql2);
        
            if (mysqli_num_rows($result2) > 0) {
                $row2 = mysqli_fetch_array($result2);
                
                $price = $row2["price"];

                function calculateRewards($price) {
                    $reward = 0.00;

                    if ($price > 500) {
                        $reward = 5.00;
                    } elseif ($price <= 500 && $price > 250) {
                        $reward = 8.00;
                    } elseif ($price <= 250 && $price > 100) {
                        $reward = 10.00;
                    } elseif ($price <= 100 && $price > 50) {
                        $reward = 13.00;
                    } elseif ($price <= 50 && $price > 25) {
                        $reward = 15.00;
                    } elseif ($price <= 25 && $price >= 1) {
                        $reward = 18.00;
                    } elseif ($price == 0) {
                        $reward = 20.00;
                    }

                    return $reward;
                }

                if (!is_double($price)) {

                    $price = (double) $price;
                
                }
                $rewards = calculateRewards($price);
                $total_sc = 0.00;

                if ($subscriber){
                    $total_sc = ($rewards * 2)+ $sc;
                } else {
                    $total_sc = $rewards + $sc;
                }

                $sql3 = "UPDATE `account` SET `studycoin` = '$total_sc' WHERE `username` = '$username'";
                $result3 = mysqli_query($conn, $sql3);

                if ($result3) {
    
                    $sql4 = "UPDATE `market` SET `state` = 'verified' WHERE `productid` = '$id'";
                    $result4 = mysqli_query($conn, $sql4);

                    if ($sql4){
                        echo "Verify_Success";
                    } else {
                        echo "Verify_Failed";
                    }
                } else {
                    echo "Verify_Failed";
                }
            } else {

            }
        } else {
            echo "No_Verify";
        }
    } else if ($action == "remove") {
        
        $sql1 = "SELECT * FROM `market` WHERE `productid` = '$id'";
        $result1 = mysqli_query($conn, $sql1);

        if (mysqli_num_rows($result1) > 0) {
            
            $sql2 = "DELETE FROM `market` WHERE `productid` = '$id'";
            $result2 = mysqli_query($conn, $sql2);

            if ($result2){
                echo "Remove_Success";
            } else {
                echo "Remove_Failed";
            }
        } else {
            echo "Remove_ProductID";
        }
    } else {
        echo "Unknown";
    }
} else {
    echo "Unknown";
}
?>