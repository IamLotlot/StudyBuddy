<?php
session_start();

if(isset($_POST['data'])){
    $_SESSION['myData'] = $_POST['data'];
    echo "Data received and stored in session.";
} else {
    echo "Data not received.";
}
?>