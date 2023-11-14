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
                                    // Add the online user and their buddy into relationship
                                    $sql6 = "INSERT INTO `relationship`(`id`, `user`, `buddy`, `relation`) 
                                            VALUES ('$matchId','$fullname','$matched_fullname','buddy')";
                                    $result6 = mysqli_query($conn, $sql6);

                                    if ($result6) {
                                        // Vise versa
                                        $sql7 = "INSERT INTO `relationship`(`id`, `user`, `buddy`, `relation`) 
                                                VALUES ('$matchId','$matched_fullname','$fullname','buddy')";
                                        $result7 = mysqli_query($conn, $sql7);

                                        if ($result7) {
                                            echo "Success";
                                        }
                                    } else {
                                        echo "Upload";
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