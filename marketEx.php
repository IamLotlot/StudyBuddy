<?php
include "db_conn.php";

$username = $_POST['username'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$studentid = $_POST['studentid'];

//Images
/*
$profile = $_FILES['profile'];
$profile_name = $_FILES['profile']['name'];
$profile_ext = pathinfo($profile_name, PATHINFO_EXTENSION);
$profile_new_name = $username . "_Profile-Picture." . $profile_ext;
*/

$studFront = $_FILES['studFront'];
$studFront_name = $_FILES['studFront']['name'];
$studFront_ext = pathinfo($studFront_name, PATHINFO_EXTENSION);
$studFront_new_name = $username . "_Student-ID-FRONT." . $studFront_ext;

$studBack = $_FILES['studBack'];
$studBack_name = $_FILES['studBack']['name'];
$studBack_ext = pathinfo($studBack_name, PATHINFO_EXTENSION);
$studBack_new_name = $username . "_Student-ID-BACK." . $studBack_ext;

//Image format or extension
/*
$profile_ex = pathinfo($profile_name, PATHINFO_EXTENSION);
$profile_ex_lc = strtolower($profile_ex);
*/
$studFront_ex = pathinfo($studFront_name, PATHINFO_EXTENSION);
$studFront_ex_lc = strtolower($studFront_ex);

$studBack_ex = pathinfo($studBack_name, PATHINFO_EXTENSION);
$studBack_ex_lc = strtolower($studBack_ex);

$allowed_exs = array("jpg", "jpeg", "png");

$sql1 = "SELECT * FROM `account` WHERE `username` = '$username'";
$sql2 = "SELECT * FROM `account` WHERE `email` = '$email'";
$sql3 = "SELECT * FROM `account` WHERE `username` = '$contact'";
$sql4 = "SELECT * FROM `account` WHERE `email` = '$studentid'";

$result1 = mysqli_query($conn, $sql1);
$result2 = mysqli_query($conn, $sql2);
$result3 = mysqli_query($conn, $sql3);
$result4 = mysqli_query($conn, $sql4);

if (mysqli_num_rows($result1) > 0) {
    echo '<script type="text/javascript">';
    echo 'alert("Username is already been used");';
    echo 'window.location.href = "register.php";';
    echo '</script>';

} else if (mysqli_num_rows($result2) > 0) {
    echo '<script type="text/javascript">';
    echo 'alert("Email is already been used");';
    echo 'window.location.href = "register.php";';
    echo '</script>';
} else if (mysqli_num_rows($result3) > 0) {
    echo '<script type="text/javascript">';
    echo 'alert("Contact Number is already been used");';
    echo 'window.location.href = "register.php";';
    echo '</script>';

} else if (mysqli_num_rows($result4) > 0) {
    echo '<script type="text/javascript">';
    echo 'alert("Student ID is already been used");';
    echo 'window.location.href = "register.php";';
    echo '</script>';

} else {

    //if (in_array($profile_ex_lc, $allowed_exs)) {
     
        if (in_array($studFront_ex_lc, $allowed_exs)) {
    
            if (in_array($studBack_ex_lc, $allowed_exs)) {
    
                //move_uploaded_file($profile["tmp_name"], "documents/Profile/".$profile_new_name);
                move_uploaded_file($studFront["tmp_name"], "documents/StudentID/".$studFront_new_name);
                move_uploaded_file($studBack["tmp_name"], "documents/StudentID/".$studBack_new_name);
            
                $username = $_POST['username'];
                $password = $_POST['password'];
                $password = password_hash($password, PASSWORD_DEFAULT);
                $role = $_POST['role'];
                $email = $_POST['email'];
                $fullname = $_POST['fullname'];
                $address = $_POST['address'];
                $yearSection = $_POST['yearSection'];
                $age = $_POST['age'];
                $studentid = $_POST['studentid'];
                $sex = $_POST['sex'];
                $contact = $_POST['contact'];
        
                $conn = mysqli_connect('localhost', 'root', '', 'studybuddy');
    
                $sql = "INSERT INTO `account`(`username`, `password`, `role`, `state`, `email`, `fullname`, `address`, `yearSection`, `age`, `studentid`, `sex`, `contact`, /*`profile`,*/ `studFront`, `studBack`) 
                        VALUES ('$username','$passwordEn','user', 'not-verified', '$email','$fullname','$address','$yearSection','$age', '$studentid','$sex','$contact',/*'$profile_new_name',*/'$studFront_new_name','$studBack_new_name')";
    
                $result = mysqli_query($conn, $sql);
    
                echo '<script type="text/javascript">'; 
                echo 'alert("Account registered successfully!");';
                echo 'window.location.href = "index.php";';
                echo '</script>';
    
            } else {
                echo '<script type="text/javascript">'; 
                echo 'alert("Student ID (Back) needs to be in jpg, jpeg or png format");';
                echo 'window.location.href = "register.php";';
                echo '</script>';
            }
    
        } else {
            echo '<script type="text/javascript">'; 
            echo 'alert("Student ID (FRONT) needs to be in pdf format");';
            echo 'window.location.href = "register.php";';
            echo '</script>';
        }
    
    /*} else {
        echo '<script type="text/javascript">'; 
        echo 'alert("Profile Picture needs to be in jpg, jpeg or png format");';
        echo 'window.location.href = "registera.php";';
        echo '</script>';
    }*/
}
?>