<?php
session_start();

include "db_conn.php";

if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $conn = mysqli_connect('localhost', 'root', '', 'studybuddy');
    
    if ($conn===false) {

        echo "Die";
    
    } else {
        // $sql = "SELECT `state` FROM `account` WHERE username = '$username' AND password = '$password'";
        // $result = mysqli_query($conn, $sql);
        // $row = mysqli_fetch_array($result);
        
        // $passwordEn = password_needs_rehash($password, PASSWORD_DEFAULT);
        
        $sql2 = "SELECT * FROM `account` WHERE username = '$username' AND password = '$password'";
        $result2 = mysqli_query($conn, $sql2);
        
        if ($result2 && mysqli_num_rows($result2) > 0) {
            $row2 = mysqli_fetch_array($result2);
            
            $role = $row2["role"];
            $state = $row2["state"];

            // Get the current time in the Philippines
            date_default_timezone_set('Asia/Manila');
            $currentDateTime = date('Y-m-d H:i:s');
            $date = date('Y-m-d', strtotime($currentDateTime));
            $time = date('H:i:s', strtotime($currentDateTime));

            $sql3 = "INSERT INTO `log`(`username`, `event`, `date`, `time`) 
                    VALUES ('$username','logged in', '$date', '$time')";
            $result3 = mysqli_query($conn, $sql3);

            if ($role === "admin") {

                $_SESSION['userOnline'] = $username;
                echo "Admin";
        
            } else if ($role === "user") {
                if ($state == "verified") {

                    $_SESSION['userOnline'] = $username;
                    echo "User";
                } else if ($state == "not-verified"){
                    echo "Not-Verified";
                } else if ($state == "deactivated"){
                    echo "Deactivated";
                }
            } else {
                echo "Failed";
            }
        } else {
            echo "Failed";
        }
    }
}
?>