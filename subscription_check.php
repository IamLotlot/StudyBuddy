<?php

include "db_conn.php";

if (isset($_POST['username'])) {

    $username = $_POST["username"];

    $sql1 = "SELECT * FROM `account` WHERE `username` = '$username' AND `subscriber` = 'true'";
    $result1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result1) > 0) {
            echo "Existing";
    } else {
        echo "Success";
    }
} else {
    echo "Unknown";
}

?>