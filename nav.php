<?php
session_start();

include "db_conn.php";
?>
<nav>
    <div class="circleContainer">
        <div class="circleNav">
            <a href="home.php" title="Go to home page"><img id="logo" src="css/img/StudyBuddy.png"></a>
        </div>
    </div>
    <ul class="ulLeft">
        <li id="buddyNav" title="Go to buddy page" class="navList" style="display: none;"><a href="buddy.php" class="navLabel">Buddy</a></li>
        <li id="marketNav" title="Go to market page" class="navList" style="display: none;"><a href="market.php" class="navLabel">Market</a></li>
        <li id="creatorsNav" title="Go to creators page" class="navList" style="display: none;"><a href="#" class="navLabel">Creators</a></li>
        <!-- Hidden Nav for admin access -->
        <li id="accountsNav" title="Go to account list page" class="navList" style="display: none;"><a href="accounts.php" class="navLabel">Accounts</a></li>
        <li id="productsNav" title="Go to product list page" class="navList" style="display: none;"><a href="products.php" class="navLabel">Products</a></li>
        <li id="logsNav" title="Go to logs page" class="navList" style="display: none;"><a href="logs.php" class="navLabel">Logs</a></li>
    </ul>
    <ul class="ulRight">
        <li id="registerNav" title="Go to register page" class="navList" style="display: none;"><a href="register.php" class="navLabel">Register</a></li>
        <li id="loginNav" title="Go to login page" class="navList" style="display: none;"><a href="login.php" class="navLabel">Login</a></li>
        <div id="online-container">
            <i class="fa-solid fa-user" id="userIcon"></i>
            <a id="onlineUser" name="onlineUser" class="navLabel"></a>
        </div>
        <div id="dropdown" style="display: none;">
                <li id="subNav" title="Buy more study coin here"><a href="study_store.php" class="dropdown-label-ex"a>
                <?php

                $username = $_SESSION['userOnline'];

                $sql = "SELECT * FROM `account` WHERE username = '$username'";
                $result = mysqli_query($conn, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);

                    echo $row["studycoin"];
                }
                ?>    
                SC</a></li>
                <li id="subNav" title="Go to subscription page"><a href="subscription.php" class="dropdown-label">Subscription</a></li>
                <li id="profileNav" title="Go to your profile"><a href="profile.php" class="dropdown-label">Profile</a></li>
                <li id="settingNav" title="Go to settings"><a href="setting.php" class="dropdown-label">Setting</a></li>
                <li id="logoutNav" title="Logout your account"><a href="home.php" class="dropdown-label">Logout</a></li>
        </div>
    </ul>
    <button onclick="topFunction()" id="scrollTop" title="Scroll to top"><i class="fa-solid fa-chevron-up"></i></button>
    <div class="toolCon">
        <div class="toolWrapper" id="msgCon">
            <i class="fa-solid fa-comment-dots" title="Quick Message Tool"></i>
        </div>
        <div class="toolWrapper" id="noteCon">
            <i class="fa-solid fa-note-sticky" title="Notepad Tool"></i>
        </div>
        <div class="toolWrapper" id="modeCon">
            <i class="fa-solid fa-circle-half-stroke" title="Mode Tool"></i>
        </div>
    </div>
    <div id="notification-wrapper" style="display:none;">
        <div id="notification-con" style="display: none;">
            <i class="fa-solid fa-bell"></i>
            <h1 id="notification-message">Notification Title</h1>
            <!-- <i class="fa-solid fa-xmark" id="close-notification"></i> -->
        </div>
    </div>
</nav>