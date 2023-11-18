<?php

include "db_conn.php";

if (isset($_POST['userid']) && isset($_POST['buddyid']) && isset($_POST['groupid'])) {

    $userid = $_POST["userid"];
    $buddyid = $_POST["buddyid"];
    $groupid = $_POST["groupid"];

    $i = 0;

    $sql1 = "SELECT * FROM `messages` WHERE `groupid` = '$groupid' ORDER BY `id` ASC";
    $result1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result1) > 0) {
        while ($row = mysqli_fetch_assoc($result1)) {

            $id = $row["id"];
            $senderid = $row["senderid"];
            $receiverid = $row["receiverid"];
            $message = $row["message"];
            $timestamp = $row["timestamp"];
            
            $sql2 = "SELECT * FROM `account` WHERE `userid` = '$buddyid'";
            $result2 = mysqli_query($conn, $sql2);
            
            if (mysqli_num_rows($result2) > 0) {
                while ($row = mysqli_fetch_assoc($result2)) {

                    $buddy_username = $row["username"];
                    $buddy_profile = $row["profile"];

                    if ($senderid == $userid) {
                        echo '
                        <div id="my-msg-con">
                            <h3 id="my-message" title="'. $timestamp .'">'. $message .'</h2>
                        </div>';

                        $i = 0;

                    } else {
                        if ($i == 0) {
                            echo '
                                <div class="message-wrapper" id="sender-msg-con">
                                    <img src="documents/profile/'. $buddy_profile .'" alt="profile-img" id="sender-profile">
                                    <h3 id="sender-message" title="'. $timestamp .'">'. $message .'</h2>
                                </div>';

                                $i = 1;
                        } else {
                            echo '
                                <div class="message-wrapper" id="sender-msg-con">
                                    <div id="space"></div>
                                    <h3 id="sender-message" title="'. $timestamp .'">'. $message .'</h2>
                                </div>';
                        }
                    }
                }
            } else {
                // echo "Failed";
            }
        }
    } else {
        // echo "Failed";
    }
} else {
    echo "Unknown";
}

?>