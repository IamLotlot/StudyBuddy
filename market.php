<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>StudyBuddy | Market Page</title>
    <link rel="shortcut icon" type="icon" href="img">
	<link rel="icon" type="image/x-icon" href="css/img/StudyBuddy.ico">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/market.css">
  	<script src="https://kit.fontawesome.com/8ef5e4d9da.js"></script>
</head>
<body onload="Online(); OnlineMarket()">
<?php
	include 'nav.php';
?>
    <section class="marketCon">
    	<div class="utilityCol">
    	<form method="post" action="market.php" enctype="multipart/form-data">
    		<div class="utilityCon">
	    		<input type="text" id="searchBar" name="searchBar" placeholder="Search...">
	    		<label class="utilityTitle">Price Range:</label>
	    		<div class="minMax">
	    			<input type="text" name="min" >
	    			<label>-</label>
	    			<input type="text" name="max">
	    		</div>
	    		<label class="utilityTitle">Sort By:</label>
	    		<div class="filters">
	    			<input type="button" name="" value="Name">
	    			<input type="button" name="" value="Date">
	    			<input type="button" name="" value="Price">
	    		</div>
	    		<div class="ascDes">
	    			<input type="radio" class="sortBy" id="asc" name="sortBy"><label>Ascending</label>
	    			<input type="radio" class="sortBy" id="des" name="sortBy"><label>Descending</label>
	    		</div>
	    		<button type="submit" id="loginBtn" class="submit-btn" style="display: none;"></button>
    		</div>
    		<div class="Buttons" id="Buttons">
    			<label class="productBtn" id="addProduct" onclick="window.location.href='marketCus.php';">Customize Your Product</label>
    		</div>
    	</form>
    	</div>
    	<div class="productCol">
    		<div class="productCon">
                <?php

				$searchBar = $_POST['searchBar'];

				if (!empty($searchBar)) {

					$min = $_POST['min'];
					$max = $_POST['max'];
	
					$sql = "SELECT * FROM `market` WHERE `name` LIKE '$searchBar' OR `seller` LIKE '$searchBar'";
	
					$result = mysqli_query($conn, $sql);
	
					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_assoc($result)) {
							$productid = $row['productid'];
							$rate = $row['rate'];
							$name = $row['name'];
							$price = $row['price'];
							$seller = $row['seller'];
							$date = $row['date'];
							$category = $row['category'];
							$image = $row['image'];
							$file = $row['file'];
	
							echo '
							<div class="product">
							  <img src="documents/product/'.$image.'" class="productImage">
							  <div class="description">
								  <div>
									  <i class="fa-solid fa-star"></i>
									  <i class="fa-solid fa-star"></i>
									  <i class="fa-solid fa-star"></i>
									  <i class="fa-solid fa-star"></i>
									  <i class="fa-solid fa-star"></i>
								  </div>
								<label id="productName">'.$name.'</label>
								<label id="productPrice">'.$price.'</label>
								<label id="productSeller">'.$seller.'</label>
							  </div>
							  <a><i class="fa-regular fa-bookmark wishlist"></i></a>
							  <a><i class="fa-solid fa-basket-shopping purchase"></i></a>
							</div>';
						}
					}
				} else if (empty($searchBar)){

					$sql = "SELECT * FROM `market`";
	
					$result = mysqli_query($conn, $sql);
	
					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_assoc($result)) {
							$productid = $row['productid'];
							$rate = $row['rate'];
							$name = $row['name'];
							$price = $row['price'];
							$seller = $row['seller'];
							$date = $row['date'];
							$category = $row['category'];
							$image = $row['image'];
							$file = $row['file'];
	
							echo '
							<div class="product">
							  <img src="documents/product/'.$image.'" class="productImage">
							  <div class="description">
								  <div>
									  <i class="fa-solid fa-star"></i>
									  <i class="fa-solid fa-star"></i>
									  <i class="fa-solid fa-star"></i>
									  <i class="fa-solid fa-star"></i>
									  <i class="fa-solid fa-star"></i>
								  </div>
								<label id="productName">'.$name.'</label>
								<label id="productPrice">'.$price.'</label>
								<label id="productSeller">'.$seller.'</label>
							  </div>
							  <a><i class="fa-regular fa-bookmark wishlist"></i></a>
							  <a><i class="fa-solid fa-basket-shopping purchase"></i></a>
							</div>';
						}
					}
				}
            ?>
        	</div>
    	</div>
    </section>
	<script src="js/main.js"></script>
	<script src="js/market.js"></script>
</body>
</html>