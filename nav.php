<?php
include "db_conn.php";
?>
<nav>
    <div class="circleContainer">
        <div class="circleNav">
            <a href="home.php" title="Go to home page"><img id="logo" src="css/img/StudyBuddy.png"></a>
        </div>
    </div>
    <ul class="ulLeft">
        <li id="buddyNav" title="Go to buddy page" ><a href="buddy.php">Buddy</a></li>
        <li id="marketNav" title="Go to market page"><a href="market.php">Market</a></li>
        <li id="creatorsNav" title="Go to creators page"><a href="#">Creators</a></li>
        <!-- Hidden Nav for admin access -->
        <li id="accountsNav" title="Go to account list page"><a href="accounts.php">Accounts</a></li>
        <li id="productsNav" title="Go to product list page"><a href="products.php">Products</a></li>
        <li id="logsNav" title="Go to logs page"><a href="logs.php">Logs</a></li>
    </ul>
    <ul class="ulRight">
        <li id="registerNav" title="Go to register page"><a href="register.php">Register</a></li>
        <li id="loginNav" title="Go to login page"><a href="login.php">Login</a></li>
        <div id="online-container">
            <i class="fa-solid fa-user" id="userIcon"></i>
            <a id="onlineUser" name="onlineUser"></a>
        </div>
        <ul id="dropdown">
            <li><span>0 SC</span></li>
            <li id="profileNav" title="Go to your profile"><a href="profile.php">Setting</a></li>
            <li id="settingNav" title="Go to settings"><a href="setting.php">Setting</a></li>
            <li id="logoutNav" title="Logout your account"><a href="home.php">Logout</a></li>
        </ul>
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
</nav>