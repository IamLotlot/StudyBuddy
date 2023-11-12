<?php

include "db_conn.php";

if (isset($_POST['user'])) {

    $user = $_POST["user"];

    $sql1 = "SELECT * FROM `account` WHERE `username` = '$user'";
    $result1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result1) > 0) {
        while ($row = mysqli_fetch_assoc($result1)) {

			$fullname = $row['fullname'];
    
            $sql2 = "SELECT * FROM `search_queue` WHERE `fullname` = '$fullname'";
            $result2 = mysqli_query($conn, $sql2);
        
            if ((mysqli_num_rows($result2) > 0)){
                $sql3 = "DELETE FROM `search_queue` WHERE `fullname` = '$fullname'";
                $result3 = mysqli_query($conn, $sql3);

                if ($result3){
                    echo "Success";
                } else {
                    echo "Failed";
                }

            } else {
                echo "Queue";
            }
        }
    } else {
        echo "Username";
    }
} else {
    echo "Unknown";
}

?>