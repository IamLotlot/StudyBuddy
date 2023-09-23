<?php
session_start();

if(isset($_SESSION['myData'])){
    echo "Data from session: " . $_SESSION['myData'];
} else {
    echo "Data not found in session.";
}
?>
