<div id="notepad">
    <div id="tab">
        <i id="close-icon" class="fa-solid fa-xmark"></i>
    </div>
    <div id="body">
    <?php

    $username = "";

    if (isset($_SESSION['userOnline'])) {
        $username = $_SESSION['userOnline'];
    } else {
        echo 'You are not logged in!';
    }

    $sql = "SELECT * FROM `notes` WHERE `user` = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $title = $row['title'];
            $content = $row['content'];
            $date = $row['date'];
            $time = $row['time'];

            echo '
            <div class="title-con"><h1 id="'.$id.'" class="title">'.$title.'</h1><i class="fa-solid fa-trash-can" onclick="deleteNote('.$id.')"></i><i class="fa-solid fa-share-from-square" onclick="shareNote('.$id.')"></i></div>
            <textarea id="content'.$id.'" class="content">'.$content.'</textarea>
            ';
        }
    }
    ?>
        <form action="POST" id="form-con">
            <div id="title-con"><input id="add-title" class="title" type="text" placeholder="Title..."><i class="fa-regular fa-floppy-disk"></i></div>
            <textarea id="add-content" class="content" placeholder="Content..."></textarea>
        </form>
    </div>
    <div id="footer">
        <i id="add-icon" class="fa-solid fa-plus"></i>
        <i id="share-icon" class="fa-solid fa-share-nodes"></i>
        <i id="save-icon" class="fa-regular fa-floppy-disk"></i>
    </div>
</div>
<div id="share-to-buddy" style="display:none;">
    <div id="buddy-wrapper">
        <h1 id="buddy-label">My Buddies</h1>
        <div id="buddy-con">
            
        <?php
        if (isset($_SESSION['userOnline'])) {

            $username = $_SESSION['userOnline'];
            // Get the userid of the online user
            $sql1 = "SELECT * FROM `account` WHERE `username` = '$username'";
            $result1 = mysqli_query($conn, $sql1);
            
            if ((mysqli_num_rows($result1) > 0)){
                while ($row = mysqli_fetch_assoc($result1)) {

                    $userid = $row['userid'];
                    // Select the buddy of the online user from user1
                    $sql2 = "SELECT * FROM `relationship` WHERE `user` = '$userid'";
                    $result2 = mysqli_query($conn, $sql2);

                    if ((mysqli_num_rows($result2) > 0)){
                        while ($row = mysqli_fetch_assoc($result2)) {
                            
                            $buddy = $row['buddy'];
                            // Get the username of the buddy
                            $sql3 = "SELECT * FROM `account` WHERE `userid` = '$buddy'";
                            $result3 = mysqli_query($conn, $sql3);

                            if ((mysqli_num_rows($result3) > 0)){
                                while ($row = mysqli_fetch_assoc($result3)) {
                                    
                                    $username = $row['username'];
                                    echo '<h2 class="buddies" onclick="selectBuddy(\''.$buddy.'\')">'.$username.'</h2>';
                                }
                            } else {
                                echo "No user id labeled as: $buddy";
                            }
                        }
                    } else {
                        echo "No fullname named as: $fullname";
                    }
                }
            } else {
                echo "No user named as: $username";
            }

        } else {
            echo 'Try to re-login!';
        }
        ?>
        </div>
    </div>
</div>