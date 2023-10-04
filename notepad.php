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
            <div class="title-con"><h1 id="'.$id.'" class="title">'.$title.'</h1><i class="fa-solid fa-share-from-square" onclick="shareNote('.$id.')"></i></div>
            <textarea id="content'.$id.'" class="content">'.$content.'</textarea>
            ';
        }
    }
    ?>
        <form action="POST">
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