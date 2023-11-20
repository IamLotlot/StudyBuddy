<?php
session_start();

include "db_conn.php";

if (isset($_POST['search']) && isset($_POST['action'])) {

    $search = $_POST["search"];
    $action = $_POST["action"];
        
    if ($action == "not-verified") {
        if ($search) {

            $sql1 = "SELECT * FROM `account` WHERE `role` = 'user' AND `state` = 'not-verified' AND username LIKE '$search'";
            $result1 = mysqli_query($conn, $sql1);

            if ($result1 && mysqli_num_rows($result1) > 0) {
                while ($row1 = mysqli_fetch_assoc($result1)) {

                    $username = $row1['username'];
                    $password = $row1['password'];
                    $state = $row1['state'];
                    $email = $row1['email'];
                    $fullname = $row1['fullname'];
                    $address = $row1['address'];
                    $yearSection = $row1['yearSection'];
                    $age = $row1['age'];
                    $studentid = $row1['studentid'];
                    $sex = $row1['sex'];
                    $contact = $row1['contact'];
                    $profile = $row1['profile'];

                    echo '
                    <label class="username" id="usernameLabel" onclick="getUsername(this)">'.$username.'</label>
                    <input type="text" id="'.$username.'-password" value="'.$password.'" style="display:none" disabled>
                    <input type="text" id="'.$username.'-state" value="'.$state.'" style="display:none" disabled>
                    <input type="text" id="'.$username.'-email" value="'.$email.'" style="display:none" disabled>
                    <input type="text" id="'.$username.'-fullname" value="'.$fullname.'" style="display:none" disabled>
                    <input type="text" id="'.$username.'-address" value="'.$address.'" style="display:none" disabled>
                    <input type="text" id="'.$username.'-yearSection" value="'.$yearSection.'" style="display:none" disabled>
                    <input type="text" id="'.$username.'-age" value="'.$age.'" style="display:none" disabled>
                    <input type="text" id="'.$username.'-studentid" value="'.$studentid.'" style="display:none" disabled>
                    <input type="text" id="'.$username.'-sex" value="'.$sex.'" style="display:none" disabled>
                    <input type="text" id="'.$username.'-contact" value="'.$contact.'" style="display:none" disabled>
                    <input type="text" id="'.$username.'-profile" value="'.$profile.'" style="display:none" disabled>
                    ';
                }
            } else {
                // echo "No user1";
            }
        } else {

            $sql2 = "SELECT * FROM `account` WHERE `role` = 'user' AND `state` = 'not-verified'";
            $result2 = mysqli_query($conn, $sql2);

            if ($result2 && mysqli_num_rows($result2) > 0) {
                while ($row2 = mysqli_fetch_assoc($result2)) {

                    $username = $row2['username'];
                    $password = $row2['password'];
                    $state = $row2['state'];
                    $email = $row2['email'];
                    $fullname = $row2['fullname'];
                    $address = $row2['address'];
                    $yearSection = $row2['yearSection'];
                    $age = $row2['age'];
                    $studentid = $row2['studentid'];
                    $sex = $row2['sex'];
                    $contact = $row2['contact'];
                    $profile = $row2['profile'];

                    echo '
                    <label class="username" id="usernameLabel" onclick="getUsername(this)">'.$username.'</label>
                    <input type="text" id="'.$username.'-password" value="'.$password.'" style="display:none" disabled>
                    <input type="text" id="'.$username.'-state" value="'.$state.'" style="display:none" disabled>
                    <input type="text" id="'.$username.'-email" value="'.$email.'" style="display:none" disabled>
                    <input type="text" id="'.$username.'-fullname" value="'.$fullname.'" style="display:none" disabled>
                    <input type="text" id="'.$username.'-address" value="'.$address.'" style="display:none" disabled>
                    <input type="text" id="'.$username.'-yearSection" value="'.$yearSection.'" style="display:none" disabled>
                    <input type="text" id="'.$username.'-age" value="'.$age.'" style="display:none" disabled>
                    <input type="text" id="'.$username.'-studentid" value="'.$studentid.'" style="display:none" disabled>
                    <input type="text" id="'.$username.'-sex" value="'.$sex.'" style="display:none" disabled>
                    <input type="text" id="'.$username.'-contact" value="'.$contact.'" style="display:none" disabled>
                    <input type="text" id="'.$username.'-profile" value="'.$profile.'" style="display:none" disabled>
                    ';
                }
            } else {
                // echo "No user2";
            }
        }
    } else if ($action == "verified") {
        if ($search) {

            $sql3 = "SELECT * FROM `account` WHERE `role` = 'user' AND `state` = 'verified' AND username LIKE '$search'";
            $result3 = mysqli_query($conn, $sql3);

            if ($result3 && mysqli_num_rows($result3) > 0) {
                while ($row3 = mysqli_fetch_assoc($result3)) {

                    $username = $row3['username'];
                    $password = $row3['password'];
                    $state = $row3['state'];
                    $email = $row3['email'];
                    $fullname = $row3['fullname'];
                    $address = $row3['address'];
                    $yearSection = $row3['yearSection'];
                    $age = $row3['age'];
                    $studentid = $row3['studentid'];
                    $sex = $row3['sex'];
                    $contact = $row3['contact'];
                    $profile = $row3['profile'];

                    echo '
                    <label class="username" id="usernameLabel" onclick="getUsername(this)">'.$username.'</label>
                    <input type="text" id="'.$username.'-password" value="'.$password.'" style="display:none" disabled>
                    <input type="text" id="'.$username.'-state" value="'.$state.'" style="display:none" disabled>
                    <input type="text" id="'.$username.'-email" value="'.$email.'" style="display:none" disabled>
                    <input type="text" id="'.$username.'-fullname" value="'.$fullname.'" style="display:none" disabled>
                    <input type="text" id="'.$username.'-address" value="'.$address.'" style="display:none" disabled>
                    <input type="text" id="'.$username.'-yearSection" value="'.$yearSection.'" style="display:none" disabled>
                    <input type="text" id="'.$username.'-age" value="'.$age.'" style="display:none" disabled>
                    <input type="text" id="'.$username.'-studentid" value="'.$studentid.'" style="display:none" disabled>
                    <input type="text" id="'.$username.'-sex" value="'.$sex.'" style="display:none" disabled>
                    <input type="text" id="'.$username.'-contact" value="'.$contact.'" style="display:none" disabled>
                    <input type="text" id="'.$username.'-profile" value="'.$profile.'" style="display:none" disabled>
                    ';
                }
            } else {
                // echo "No user3";
            }
        } else {

            $sql4 = "SELECT * FROM `account` WHERE `role` = 'user' AND `state` = 'verified'";
            $result4 = mysqli_query($conn, $sql4);

            if ($result4 && mysqli_num_rows($result4) > 0) {
                while ($row4 = mysqli_fetch_assoc($result4)) {

                    $username = $row4['username'];
                    $password = $row4['password'];
                    $state = $row4['state'];
                    $email = $row4['email'];
                    $fullname = $row4['fullname'];
                    $address = $row4['address'];
                    $yearSection = $row4['yearSection'];
                    $age = $row4['age'];
                    $studentid = $row4['studentid'];
                    $sex = $row4['sex'];
                    $contact = $row4['contact'];
                    $profile = $row4['profile'];

                    echo '
                    <label class="username" id="usernameLabel" onclick="getUsername(this)">'.$username.'</label>
                    <input type="text" id="'.$username.'-password" value="'.$password.'" style="display:none" disabled>
                    <input type="text" id="'.$username.'-state" value="'.$state.'" style="display:none" disabled>
                    <input type="text" id="'.$username.'-email" value="'.$email.'" style="display:none" disabled>
                    <input type="text" id="'.$username.'-fullname" value="'.$fullname.'" style="display:none" disabled>
                    <input type="text" id="'.$username.'-address" value="'.$address.'" style="display:none" disabled>
                    <input type="text" id="'.$username.'-yearSection" value="'.$yearSection.'" style="display:none" disabled>
                    <input type="text" id="'.$username.'-age" value="'.$age.'" style="display:none" disabled>
                    <input type="text" id="'.$username.'-studentid" value="'.$studentid.'" style="display:none" disabled>
                    <input type="text" id="'.$username.'-sex" value="'.$sex.'" style="display:none" disabled>
                    <input type="text" id="'.$username.'-contact" value="'.$contact.'" style="display:none" disabled>
                    <input type="text" id="'.$username.'-profile" value="'.$profile.'" style="display:none" disabled>
                    ';
                }
            } else {
                // echo "No user4";
            }
        }
    }
}
?>