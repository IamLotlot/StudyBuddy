<?php
session_start();

include "db_conn.php";

$username = "";

if (isset($_SESSION['userOnline'])) {
    $username = $_SESSION['userOnline'];
} else {
    echo 'Try to re-login!';
}

// Get the current time in the Philippines
date_default_timezone_set('Asia/Manila');
$currentDateTime = date('Y-m-d H:i:s');
$date = date('Y-m-d', strtotime($currentDateTime));
$time = date('H:i:s', strtotime($currentDateTime));

$sql = "INSERT INTO `log`(`username`, `event`, `date`, `time`) 
        VALUES ('$username','logged out', '$date', '$time')";
$result = mysqli_query($conn, $sql);

session_unset();
session_destroy();

// if (ini_get("session.use_cookies")) {
//     $params = session_get_cookie_params();
//     setcookie(session_name(), '', time() - 42000,
//         $params["path"], $params["domain"],
//         $params["secure"], $params["httponly"]
//     );
// }

$response = ['message' => 'Session destroyed successfully'];
echo json_encode($response);
?>