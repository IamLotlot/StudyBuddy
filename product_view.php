<?php
include "db_conn.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>StudyBuddy | Product View</title>
    <link rel="shortcut icon" type="icon" href="img">
	<link rel="icon" type="image/x-icon" href="css/img/StudyBuddy.ico">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/notepad.css">
    <link rel="stylesheet" href="css/product_view.css">
  	<script src="https://kit.fontawesome.com/8ef5e4d9da.js"></script>
</head>
<body onload="Online(); clearLocalRating()">
<?php
	include 'nav.php';
	include "notepad.php";
	include "product_rate.php";
	include "product_report.php";
?>
	<section>
    	<div id="product">
<?php

	$userOnline;

	if (isset($_SESSION['userOnline'])) {

		$userOnline = $_SESSION['userOnline'];

		if(isset($_SESSION['myData'])){
			$id = $_SESSION['myData'];
			
			$sql = "SELECT * FROM `market` WHERE `productid` = '$id'";
			$result = mysqli_query($conn, $sql);
	
			if ($result && mysqli_num_rows($result) > 0) {
				$row = mysqli_fetch_array($result);
				
				$name = $row["name"];
				$description = $row["description"];
				$rate = $row["rate"];
				$price = $row["price"];
				$seller = $row["seller"];
				$date = $row["date"];
				$category = $row["category"];
				$image = $row["image"];
	
				$button = "";
	
				$sql2 = "SELECT * FROM `owner` WHERE `book` = '$name' AND `name` = '$userOnline'";
				$result2 = mysqli_query($conn, $sql2);
	
				if ($result2) {
					$rowCount = mysqli_num_rows($result2);
					
					if ($rowCount > 0) {
	
						$button = "Owned";
	
					} else {
	
						$button = "Buy ($price SC)";
					}
				} else {
					
					echo "Query error: " . mysqli_error($conn);
				}
	
				echo '
				<div id="first-col">
					<img src="documents/product/'.$image.'" alt="product_image" id="img">
					<div id="action-con">
						<i class="fa-solid fa-triangle-exclamation" id="report-btn"></i>';

					$sql = "SELECT * FROM `product_favorite` WHERE `product` = '$name' AND `seller` = '$seller' AND `user` = '$userOnline'";
					$result = mysqli_query($conn, $sql);

					if ($result) {
						$rowCount = mysqli_num_rows($result);
						
						if ($rowCount > 0) {
							echo '<i class="fa-solid fa-bookmark" id="favorite-btn" data-con="true"></i>';
		
						} else {
							echo '<i class="fa-regular fa-bookmark" id="favorite-btn" data-con="false"></i>';
						}
					} else {
						echo "Query error: " . mysqli_error($conn);
					}

				echo'
					</div>
				</div>
				<div id="second-col">
					<div id="descriptions">
						<h1 id="name">'.$name.'</h1>
						<h2 id="seller">'.$seller.'</h2>
						<div id="rate" value="'.$rate.'">
							<i class="fa-solid fa-star" id="star1"></i>
							<i class="fa-solid fa-star" id="star2"></i>
							<i class="fa-solid fa-star" id="star3"></i>
							<i class="fa-solid fa-star" id="star4"></i>
							<i class="fa-solid fa-star" id="star5"></i>
						</div>
						<h3>'.$description.'</h3>
						
						<div id="image-container">
							<img src="css/img/book2.jpg" alt="Image 1">
							<img src="css/img/book2.jpg" alt="Image 2">
							<img src="css/img/book2.jpg" alt="Image 3">
						</div>
					</div>
					<div id="options">
						<button id="rate-btn">Rate</button>
						<button id="buy-btn" value="'.$price.'">'.$button.'</button>
					</div>
				</div>
				';
			}
	
		} else {
	
			echo "Data not found in session.";
		}
	}


?>
    	</div>
	</section>
	<script src="js/jQuery-3.6.4.js"></script>
	<script src="js/main.js"></script>
    <script src="js/notepad.js"></script>
	<script src="js/product_view.js"></script>
</body>
</html>