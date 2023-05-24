<?php
session_start();

include "db_conn.php";

$username = $_POST['username'];
$password = $_POST['password'];

$conn = mysqli_connect('localhost', 'root', '', 'studybuddy');

if ($conn===false) {
    //die('Localhost Connection Failed');
    echo '<script type="text/javascript">'; 
    echo 'alert("Localhost Connection Failed");';
    echo 'window.location.href = "login.php";';
    echo '</script>';

} else {
    $sql = "SELECT `state` FROM `account` WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    
    $sql2 = "SELECT * FROM `account` WHERE username = '$username' AND password = '$password'";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_array($result2);

    if ($row2["role"]=="admin") {
        //Store online username in session
        $_SESSION['userOnline'] = $username;

        echo '<script type="text/javascript">'; 
        echo 'alert("Admin Detected. Greetings '.$username.'!");';

        //Store online username in local storage
        echo "localStorage.setItem('userOnline', '$username');";

        echo 'window.location.href = "home.php";</script>';

    } else if ($row2["role"]=="user") {
        //Store online username in session
        $_SESSION['userOnline'] = $username;
        
	    echo '<script type="text/javascript">'; 
	    echo 'alert("User Detected. Greetings '.$username.'!");';


        //Store online username in local storage
        echo "localStorage.setItem('userOnline', '$username');";

	    echo 'window.location.href = "home.php";';
	    echo '</script>';
    } else {
        echo '<script type="text/javascript">'; 
        echo 'alert("Username or password is incorrect!");';
        echo 'window.history.back();';
        echo '</script>';
    }
}
?>