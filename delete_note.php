<?php

include "db_conn.php";

if (isset($_POST['id'])) {

    $id = $_POST["id"];

    $sql1 = "SELECT * FROM `notes` WHERE `id` = '$id'";
    $result1 = mysqli_query($conn, $sql1);

    if ($result1 && mysqli_num_rows($result1) > 0) {
        $row = mysqli_fetch_array($result1);
    
        $sql2 = "DELETE FROM `notes` WHERE `id` = '$id'";
        $result2 = mysqli_query($conn, $sql2);
    
        if ($result2){
            echo "Success";
        } else {
            echo "Failed";
        }
    } else {
        echo "User";
    }
    
} else {
    echo "Unknown";
}

?>