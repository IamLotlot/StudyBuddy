<?php
session_start();
// Remove the online user in session
unset($_SESSION['userOnline']);

// Remove the online user in localstorage
echo '<script type="text/javascript">'; 
echo 'localStorage.removeItem("userOnline");';
echo 'sessionStorage.removeItem("userOnline");';

session_destroy();

echo 'window.location.href = "home.php";';
echo '</script>';
?>