<?php

include "db_conn.php";

if (isset($_POST['action'])) {

    $action = $_POST["action"];

    if ($action == "product-logs") {

        $sql1 = "SELECT * FROM `product_log`";
        $result1 = mysqli_query($conn, $sql1);
    
        if ($result1 && mysqli_num_rows($result1) > 0) {
            while ($row1 = mysqli_fetch_assoc($result1)) {
        
                $productid = $row1["productid"];
                $event = $row1["event"];
                $reason = $row1["reason"];
                $product = $row1["product"];
                $user = $row1["user"];
                $seller = $row1["seller"];
                $issue = $row1["issue"];
                $statement = $row1["statement"];
                $date = $row1["date"];
                $time = $row1["time"];
                
                echo '
                <h2 class="plogs-list-label" id="id-plogs-list">'.$productid.'</h2>
                <h2 class="plogs-list-label" id="">'.$event.'</h2>
                <h2 class="plogs-list-label" id="">'.$product.'</h2>
                <h2 class="plogs-list-label" id="">'.$user.'</h2>
                <h2 class="plogs-list-label" id="">'.$seller.'</h2>
                <h2 class="plogs-list-label" id="">'.$issue.'</h2>
                <h2 class="plogs-list-label" id="">'.$date.'</h2>
                <h2 class="plogs-list-label" id="time-plogs-label">'.$time.'</h2>';
                
            }
        } else {
            echo "Empty";
        }
    } else if ($action == "transaction-logs"){

        $sql1 = "SELECT * FROM `market_log`";
        $result1 = mysqli_query($conn, $sql1);
    
        if ($result1 && mysqli_num_rows($result1) > 0) {
            while ($row1 = mysqli_fetch_assoc($result1)) {
        
                $book = $row1["book"];
                $event = $row1["event"];
                $buyer = $row1["buyer"];
                $seller = $row1["seller"];
                $price = $row1["price"];
                $sc = $row1["sc"];
                $date = $row1["date"];
                $time = $row1["time"];
                
                echo '
                <h2 class="tlogs-list-label" id="id-tlogs-list">'.$book.'</h2>
                <h2 class="tlogs-list-label" id="">'.$event.'</h2>
                <h2 class="tlogs-list-label" id="">'.$buyer.'</h2>
                <h2 class="tlogs-list-label" id="">'.$seller.'</h2>
                <h2 class="tlogs-list-label" id="">'.$price.'</h2>
                <h2 class="tlogs-list-label" id="">'.$date.'</h2>
                <h2 class="tlogs-list-label" id="time-tlogs-label">'.$time.'</h2>';
    
            }
        } else {
            echo "Empty";
        }
    } else if ($action == "session-logs") {

        $sql1 = "SELECT * FROM `log`";
        $result1 = mysqli_query($conn, $sql1);
    
        if ($result1 && mysqli_num_rows($result1) > 0) {
            while ($row1 = mysqli_fetch_assoc($result1)) {
        
                $username = $row1["username"];
                $event = $row1["event"];
                $date = $row1["date"];
                $time = $row1["time"];
                
                if ($username) {
                    echo '
                    <h2 class="slogs-list-label" id="id-slogs-list">'.$username.'</h2>
                    <h2 class="slogs-list-label" id="">'.$event.'</h2>
                    <h2 class="slogs-list-label" id="">'.$date.'</h2>
                    <h2 class="slogs-list-label" id="time-slogs-label">'.$time.'</h2>';
                } else {
                    echo '
                    <h2 class="slogs-list-label" id="id-slogs-list">none</h2>
                    <h2 class="slogs-list-label" id="">'.$event.'</h2>
                    <h2 class="slogs-list-label" id="">'.$date.'</h2>
                    <h2 class="slogs-list-label" id="time-slogs-label">'.$time.'</h2>';
                }
            }
        } else {
            echo "Empty";
        }
    } else {

    }
} else {
    echo "Unknown1";
}

?>