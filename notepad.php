<div id="notepad">
    <div id="tab">
        <i id="close-icon" class="fa-solid fa-xmark"></i>
    </div>
    <?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $userOnline = $_POST['userOnline'];

        $sql = "SELECT * FROM `notes` WHERE `user` = `$userOnline`";
	
        $result = mysqli_query($conn, $sql);
    
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $title = $row['title'];
                $content = $row['content'];
                $date = $row['date'];
                $time = $row['time'];
    
                echo '
                <h1 class="title">$title</h1>
                <textarea id="content1" class="content">$content</textarea>
                ';
            }
        }
    }
    ?>
    <div id="footer">
        <i id="add-icon" class="fa-solid fa-plus"></i>
        <i id="share-icon" class="fa-solid fa-share-nodes"></i>
        <i id="save-icon" class="fa-regular fa-floppy-disk"></i>
    </div>
</div>