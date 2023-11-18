<?php

include "db_conn.php";

if (isset($_POST['productid'])) {

    $productid = $_POST["productid"];

    $sql1 = "SELECT * FROM `product_report` WHERE `productid` = '$productid'";
    $result1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result1) > 0) {
        while ($row1 = mysqli_fetch_assoc($result1)) {
            
            $id = $row1['id'];
            $user = $row1['user'];
            $issue = $row1['issue'];
            $statement = $row1['statement'];
            $date = $row1['date'];
            $time = $row1['time'];

            $sql2 = "SELECT * FROM `account` WHERE `username` = '$user'";
            $result2 = mysqli_query($conn, $sql2);

            if (mysqli_num_rows($result2) > 0) {
                while ($row2 = mysqli_fetch_assoc($result2)) {

                    $profile = $row2['profile'];

                    echo '
                    <div class="report-cons">
                        <div class="report-img-cons">
                            <img src="documents/profile/'.$profile.'" alt="" class="report-profile-imgs">
                        </div>
                        <div class="report-des-cons">
                            <h1 class="report-title">'.$issue.'</h1>
                            <h2 class="report-username">'.$user.'</h2>
                            <h3 class="report-comment">'.$statement.'</h3>
                        </div>
                        <div class="report-btn-grp">
                            <i class="fa-solid fa-check" id="accept-report" onclick="acceptReport('.$id.')"></i>
                            <i class="fa-solid fa-x" id="reject-report" onclick="rejectReport('.$id.')"></i>
                        </div>
                    </div>';
                }
            } else {
                echo "Failed";
            }
        }
    } else {
        echo "";
    }
} else {
    echo "Unknown1";
}
?>