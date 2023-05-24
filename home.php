<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>StudyBuddy | Home Page</title>
    <link rel="shortcut icon" type="icon" href="img">
	<link rel="icon" type="image/x-icon" href="css/img/StudyBuddy.ico">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/home.css">
    <script src="https://kit.fontawesome.com/8ef5e4d9da.js"></script>
</head>
<body onload="Online()">
<?php
    include 'nav.php';
?>
    <section class="hero">
        <div class="titleContainer">
            <h1>S</h1>
            <h1>T</h1>
            <h1>U</h1>
            <h1>D</h1>
            <h1>Y</h1>
            <h1 id="space"></h1>
            <h1>B</h1>
            <h1>U</h1>
            <h1>D</h1>
            <h1>D</h1>
            <h1>Y</h1>
        </div>
        <label id="tagLine">Connecting Students for Collaborative Learning and Unlock Academic Success Together</label>
        <div class="buttonContainer">
            <a href="#" id="getStarted">Get Started</a>
            <a href="#" id="searchBuddy">Leaderboards</a>
        </div>
    </section>
    <div class="separator"></div>
    <section class="about">
        <div>
            <div class="blob">
                <div>
                    <h2>About Us</h2>
                    <label>Study Buddy provides an inclusive space for students to find their perfect 
                        study partners. You can tap into the power of collaboration, optimize your 
                        learning experience, and build meaningful connections.</label>
                </div>
                <img src="css/img/about-icon.png" class="blobImage" id="aboutIcon">
            </div>
            <div class="blob">
                <img src="css/img/goal-icon.png" class="blobImage" id="goalIcon">
                <div>
                    <h2>Our Goal</h2>
                    <label>To empower students by facilitating study partnerships that enhance their 
                        academic journey, we believe that students can achieve remarkable educational 
                        outcomes.</label>
                </div>
            </div>
        </div>
    </section>
    <section class="features">
        <h1>Features</h1>
        <div class="featuresWrap">
            <div class="feature">
                <img src="css/img/rate-icon.png">
                <label>Our rating system for both products and users emerges as a valuable tool for 
                    other users. By leveraging the collective knowledge and experiences of our 
                    community, we empower users to make more informed decisions, encourage growth 
                    and improvement.</label>
            </div>
            <div class="feature">
                <img src="css/img/market-icon.png">
                <label>Embrace the power of books and the wisdom of shared experiences. Users 
                    can access a wealth  of knowledge, valuable insights, and authentic 
                    recommendations.</label>
            </div>
            <div class="feature">
                <img src="css/img/report-icon.png">
                <label>Our reporting system underscores our commitment to fostering a safe, 
                    compliant, and inclusive environment for all users. By empowering our 
                    community to report products and individuals that violate our policies or 
                    rules.</label>
            </div>
        </div>
    </section>
    <script src="js/main.js"></script>
</body>
</html>