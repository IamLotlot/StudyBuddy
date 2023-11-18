<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>StudyBuddy | Products Page</title>
    <link rel="shortcut icon" type="icon" href="img">
	<link rel="icon" type="image/x-icon" href="css/img/StudyBuddy.ico">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/notepad.css">
    <link rel="stylesheet" href="css/products.css">
  	<script src="https://kit.fontawesome.com/8ef5e4d9da.js"></script>
</head>
<body onload="Online()">
<?php
	include 'nav.php';
?>
	<section id="product-wrapper">
		<div id="product-list">
			<div id="product-list-filter">
				<input type="text" id="search-input" placeholder="Search...">
				<div id="product-btn-con">
					<button class="search-btn-grp" id="verified-search-btn">Verified</button>
					<button class="search-btn-grp" id="notverified-search-btn">Not-Verified</button>
					<button class="search-btn-grp" id="reported-search-btn">Reported</button>
				</div>
			</div>
			<div id="products-con">
				<?php

				$sql1 = "SELECT * FROM `market`";
				$result1 = mysqli_query($conn, $sql1);

				if (mysqli_num_rows($result1) > 0) {
					while ($row1 = mysqli_fetch_assoc($result1)) {

					$productid = $row1['productid'];
					$rate = $row1['rate'];
					$state = $row1['state'];
					$name = $row1['name'];
					$description = $row1['description'];
					$price = $row1['price'];
					$seller = $row1['seller'];
					$date = $row1['date'];
					$category = $row1['category'];
					$image = $row1['image'];
					$file = $row1['file'];

					echo '<h1 class="products" id="'.$productid.'" onclick="showProduct(\''.$productid.'\', \''.$rate.'\', \''.$state.'\', \''.$name.'\', \''.$description.'\', \''.$price.'\', \''.$seller.'\', \''.$date.'\', \''.$category.'\', \''.$image.'\', \''.$file.'\')">'.$name.'</h1>';

					}
				} else {
					echo 'No products';
				}
				?>
			</div>
		</div>
		<div id="product-des">
			<div id="img-con">
				<img alt="" id="profile-img">
				<button id="view-btn">View</button>
			</div>
			<div id="des-con">
				<div id="des-row1">
					<h1 class="des-labels">Product ID</h1>
					<h1 class="des-labels">Rate</h1>
					<input type="text" class="des-input" id="product-id" readonly>
					<input type="text" class="des-input" id="rate" readonly>
					
					<h1 class="des-labels">State</h1>
					<h1 class="des-labels">Name</h1>
					<input type="text" class="des-input" id="state" readonly>
					<input type="text" class="des-input" id="name" readonly>
					
					<h1 class="des-labels">Price</h1>
					<h1 class="des-labels">Seller</h1>
					<input type="text" class="des-input" id="price" readonly>
					<input type="text" class="des-input" id="seller" readonly>
					
					<h1 class="des-labels">Date</h1>
					<h1 class="des-labels">Category</h1>
					<input type="text" class="des-input" id="date" readonly>
					<input type="text" class="des-input" id="category" readonly>
					</div>
				<div id="des-row2">
					<h1 class="des-labels" id="des-label">Description</h1>
					<textarea name="description" id="des-text-area" readonly></textarea>
					<div id="des-btn-grp">
						<button class="des-btn" id="add-btn">Add</button>
						<button class="des-btn" id="edit-btn">Edit</button>
						<button class="des-btn" id="update-btn" style="display: none;">Update</button>
						<button class="des-btn" id="remove-btn">Remove</button>
						<button class="des-btn" id="verify-btn">Verify</button>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="report-wrappers" id="report-wrapper" style="display: none;">
		<div class="report-cons" id="report-con">
		</div>
	</section>
	<script src="js/jQuery-3.6.4.js"></script>
	<script src="js/main.js"></script>
    <script src="js/notepad.js"></script>
    <script src="js/products.js"></script>
</body>
</html>