<?php

include "db_conn.php";

if (isset($_POST['userid']) && isset($_POST['buddyid']) && isset($_POST['groupid'])) {

    $userid = $_POST["userid"];
    $buddyid = $_POST["buddyid"];
    $groupid = $_POST["groupid"];

    $sql1 = "SELECT * FROM `messages` WHERE `groupid` = '$groupid' ORDER BY `timestamp` ASC";
    $result1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result1) > 0) {
        while ($row = mysqli_fetch_assoc($result1)) {

            $id = $_POST["id"];
            $senderid = $_POST["senderid"];
            $receiverid = $_POST["receiverid"];
            $message = $_POST["message"];
            $timestamp = $_POST["timestamp"];
            
            $sql2 = "SELECT * FROM `account` WHERE `userid` = '$buddyid'";
            $result2 = mysqli_query($conn, $sql2);
            
            if (mysqli_num_rows($result2) > 0) {
                while ($row = mysqli_fetch_assoc($result2)) {

                    $buddy_username = $_POST["username"];
                    $buddy_profile = $_POST["profile"];

                    if ($senderid == $userid) {
                        echo `
                        <div id="messages">
                            <div id="messages-wrapper">
                                <h2 id="message" title="<?php $timestamp ?>"><?php $message ?></h2>
                            </div>
                        </div>`;
                    } else {
                        echo `
                        <div id="messages">
                            <div id="messages-wrapper">
                                <img src="documents/profile/<?php $buddy_profile ?>" alt="profile-img">
                                <div id="messages-con">
                                    <h1 id="user"><?php $buddy_username ?></h1>
                                    <h2 id="message" title="<?php $timestamp ?>"><?php $message ?></h2>
                                </div>
                            </div>
                        </div>`;
                    }
                }
            } else {
                echo "Failed";
            }
        }
    } else {
        echo "Failed";
    }
} else {
    echo "Unknown";
}

?>