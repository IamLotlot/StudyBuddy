<?php

include "db_conn.php";

if (isset($_POST['user']) && isset($_POST['action'])) {

    $user = $_POST["user"];
    $action = $_POST["action"];
    // Get the fullname of the online user
    $sql1 = "SELECT * FROM `account` WHERE `username` = '$user'";
    $result1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result1) > 0) {
        while ($row = mysqli_fetch_assoc($result1)) {

			$fullname = $row['fullname'];
            // Get the match id of the online user in search_queue_con
            $sql2 = "SELECT * FROM `search_queue_con` WHERE `fullname` = '$fullname' LIMIT 1";
            $result2 = mysqli_query($conn, $sql2);
        
            if ((mysqli_num_rows($result2) > 0)){
                while ($row = mysqli_fetch_assoc($result2)) {

                    $matchId = $row['matchId'];
                    // Get the buddy's fullname
                    $sql3 = "SELECT * FROM `search_queue_con` WHERE `matchId` = '$matchId' AND `fullname` != '$fullname' LIMIT 1"; 
                    $result3 = mysqli_query($conn, $sql3);

                    if ((mysqli_num_rows($result3) > 0)){
                        while ($row = mysqli_fetch_assoc($result3)) {

                            $matched_fullname = $row['fullname'];
                            // Remove the online users queue on search_queue
                            $sql4 = "DELETE FROM `search_queue` WHERE `fullname` = '$fullname'";
                            $result4 = mysqli_query($conn, $sql4);

                            if ($result4) {
                                // Remove the online users queue and its buddy in search_queue_con
                                $sql5 = "DELETE FROM `search_queue_con` WHERE `matchId` = '$matchId'";
                                $result5 = mysqli_query($conn, $sql5);

                                if ($result5) {
                                    // Get the user id of the online user
                                    $sql5 = "SELECT * FROM `account` WHERE `fullname` = '$fullname'";
                                    $result5 = mysqli_query($conn, $sql5);

                                    if ((mysqli_num_rows($result5) > 0)){
                                        while ($row = mysqli_fetch_assoc($result5)) {

                                            $userid = $row['userid'];
                                            // Get the user id of the other user
                                            $sql6 = "SELECT * FROM `account` WHERE `fullname` = '$matched_fullname'";
                                            $result6 = mysqli_query($conn, $sql6);

                                            if ((mysqli_num_rows($result6) > 0)){
                                                while ($row = mysqli_fetch_assoc($result6)) {

                                                    $matched_userid = $row['userid'];

                                                    // Add the group into message_groups
                                                    $sql7 = "INSERT INTO `message_groups`(`groupid`, `groupname`) 
                                                    VALUES ('$matchId','Buddy')";
                                                    $result7 = mysqli_query($conn, $sql7);

                                                    if ($result7) {
                                                        // Insert the online user into the group
                                                        $sql8 = "INSERT INTO `message_members`(`groupid`, `userid`) 
                                                                VALUES ('$matchId','$userid')";
                                                        $result8 = mysqli_query($conn, $sql8);

                                                        if ($result8) {
                                                            // Insert the buddy into the group as well
                                                            $sql9 = "INSERT INTO `message_members`(`groupid`, `userid`) 
                                                                    VALUES ('$matchId','$matched_userid')";
                                                            $result9 = mysqli_query($conn, $sql9);

                                                            if ($result9) {
                                                                echo "Success";
                                                            } else {
                                                                echo "Upload";
                                                            }
                                                        } else {
                                                            echo "Upload";
                                                        }
                                                    } else {
                                                        echo "Upload";
                                                    }
                                                }
                                            } else {
                                                echo "Username";
                                            }
                                        }
                                    } else {
                                        echo "Username";
                                    }
                                } else {
                                    echo "Failed";
                                }
                            } else {
                                echo "Failed";
                            }
                        }
                    } else {
                        echo "MatchID";
                    }
                }
            } else {
                echo "Queue";
            }
        }
    } else {
        echo "Username";
    }
} else {
    echo "Unknown";
}     
?>