<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>StudyBuddy | Market Page</title>
    <link rel="shortcut icon" type="icon" href="img">
	<link rel="icon" type="image/x-icon" href="css/img/StudyBuddy.ico">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/notepad.css">
    <link rel="stylesheet" href="css/market.css">
  	<script src="https://kit.fontawesome.com/8ef5e4d9da.js"></script>
</head>
<body onload="Online(); OnlineMarket()">
<?php
	include 'nav.php';
    include 'notepad.php';
?>
    <section class="marketCon">
    	<div class="utilityCol">
    	<form method="post" action="market.php" enctype="multipart/form-data">
    		<div class="utilityCon">
	    		<input type="text" id="searchBar" name="searchBar" placeholder="Search...">
	    		<label class="utilityTitle">Price Range:</label>
	    		<div class="minMax">
	    			<input type="text" name="min" oninput="this.value = this.value.replace(/[^0-9-]/g, '')">
	    			<label>-</label>
	    			<input type="text" name="max" oninput="this.value = this.value.replace(/[^0-9-]/g, '')">
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
				
				$searchBar;

				if (isset($_POST['searchBar'])) {
					$searchBar = $_POST['searchBar'];
				}

				if (!empty($searchBar)) {
	
					$sql = "SELECT * FROM `market` WHERE `state` = 'verified' OR `state` = 'reported' AND `name` LIKE '$searchBar' OR `seller` LIKE '$searchBar'";
	
					$result = mysqli_query($conn, $sql);
	
					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_assoc($result)) {
							$productid = $row['productid'];
							$name = $row['name'];
							$price = $row['price'];
							$seller = $row['seller'];
							$date = $row['date'];
							$category = $row['category'];
							$image = $row['image'];
							$file = $row['file'];
	
							echo '
							<div class="product" onclick="viewProduct('.$productid.')">
							  <img src="documents/product/'.$image.'" class="productImage">
							  <div class="description">';
							  $average = 0;
							  $count = 0;
	  
							  $sql1 = "SELECT * FROM `product_rating` WHERE `productid` = '$productid'";
							  $result1 = mysqli_query($conn, $sql1);
	  
							  if (mysqli_num_rows($result1) > 0) {
								  while ($row1 = mysqli_fetch_assoc($result1)) {
									  
									  $rate = $row1["rate"];
									  $average = $average + $rate;
									  $count = $count + 1;
								  }
								  $total_rate = $average / $count;
								  $total_rate = ceil($total_rate);
								  if ($total_rate == 0){
									  echo '
									  <div>
										  <i class="fa-solid fa-star" id="star1"></i>
										  <i class="fa-solid fa-star" id="star2"></i>
										  <i class="fa-solid fa-star" id="star3"></i>
										  <i class="fa-solid fa-star" id="star4"></i>
										  <i class="fa-solid fa-star" id="star5"></i>
									  </div>';
								  } else if ($total_rate == 1) {
									  echo '
									  <div>
										  <i class="fa-solid fa-star" id="star1" style="color: gold;"></i>
										  <i class="fa-solid fa-star" id="star2"></i>
										  <i class="fa-solid fa-star" id="star3"></i>
										  <i class="fa-solid fa-star" id="star4"></i>
										  <i class="fa-solid fa-star" id="star5"></i>
									  </div>';
								  } else if ($total_rate == 2) {
									  echo '
									  <div>
										  <i class="fa-solid fa-star" id="star1" style="color: gold;"></i>
										  <i class="fa-solid fa-star" id="star2" style="color: gold;"></i>
										  <i class="fa-solid fa-star" id="star3"></i>
										  <i class="fa-solid fa-star" id="star4"></i>
										  <i class="fa-solid fa-star" id="star5"></i>
									  </div>';
								  } else if ($total_rate == 3) {
									  echo '
									  <div>
										  <i class="fa-solid fa-star" id="star1" style="color: gold;"></i>
										  <i class="fa-solid fa-star" id="star2" style="color: gold;"></i>
										  <i class="fa-solid fa-star" id="star3" style="color: gold;"></i>
										  <i class="fa-solid fa-star" id="star4"></i>
										  <i class="fa-solid fa-star" id="star5"></i>
									  </div>';
								  } else if ($total_rate == 4) {
									  echo '
									  <div>
										  <i class="fa-solid fa-star" id="star1" style="color: gold;"></i>
										  <i class="fa-solid fa-star" id="star2" style="color: gold;"></i>
										  <i class="fa-solid fa-star" id="star3" style="color: gold;"></i>
										  <i class="fa-solid fa-star" id="star4" style="color: gold;"></i>
										  <i class="fa-solid fa-star" id="star5"></i>
									  </div>';
								  } else if ($total_rate == 5) {
									  echo '
									  <div>
										  <i class="fa-solid fa-star" id="star1" style="color: gold;"></i>
										  <i class="fa-solid fa-star" id="star2" style="color: gold;"></i>
										  <i class="fa-solid fa-star" id="star3" style="color: gold;"></i>
										  <i class="fa-solid fa-star" id="star4" style="color: gold;"></i>
										  <i class="fa-solid fa-star" id="star5" style="color: gold;"></i>
									  </div>';
								  } else {
									  echo '
									  <div>
										  <i class="fa-solid fa-star" id="star1"></i>
										  <i class="fa-solid fa-star" id="star2"></i>
										  <i class="fa-solid fa-star" id="star3"></i>
										  <i class="fa-solid fa-star" id="star4"></i>
										  <i class="fa-solid fa-star" id="star5"></i>
									  </div>';
								  }
							  } else {
								  echo '
								  <div>
									  <i class="fa-solid fa-star" id="star1"></i>
									  <i class="fa-solid fa-star" id="star2"></i>
									  <i class="fa-solid fa-star" id="star3"></i>
									  <i class="fa-solid fa-star" id="star4"></i>
									  <i class="fa-solid fa-star" id="star5"></i>
								  </div>';
							  }
								echo '<label id="productName">'.$name.'</label>
								<label id="productSeller">by '.$seller.'</label>
								<label id="productPrice">'.$price.' SC</label>
							  </div>
							</div>';
						}
					}
				} else if (empty($searchBar)){

					$sql = "SELECT * FROM `market` WHERE `state` = 'verified' OR `state` = 'reported'";
	
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
							<div class="product" onclick="viewProduct('.$productid.')">
							  <img src="documents/product/'.$image.'" class="productImage">
							  <div class="description">';
							  $average = 0;
							  $count = 0;
	  
							  $sql1 = "SELECT * FROM `product_rating` WHERE `productid` = '$productid'";
							  $result1 = mysqli_query($conn, $sql1);
	  
							  if (mysqli_num_rows($result1) > 0) {
								  while ($row1 = mysqli_fetch_assoc($result1)) {
									  
									  $rate = $row1["rate"];
									  $average = $average + $rate;
									  $count = $count + 1;
								  }
								  $total_rate = $average / $count;
								  $total_rate = ceil($total_rate);
								  if ($total_rate == 0){
									  echo '
									  <div>
										  <i class="fa-solid fa-star" id="star1"></i>
										  <i class="fa-solid fa-star" id="star2"></i>
										  <i class="fa-solid fa-star" id="star3"></i>
										  <i class="fa-solid fa-star" id="star4"></i>
										  <i class="fa-solid fa-star" id="star5"></i>
									  </div>';
								  } else if ($total_rate == 1) {
									  echo '
									  <div>
										  <i class="fa-solid fa-star" id="star1" style="color: gold;"></i>
										  <i class="fa-solid fa-star" id="star2"></i>
										  <i class="fa-solid fa-star" id="star3"></i>
										  <i class="fa-solid fa-star" id="star4"></i>
										  <i class="fa-solid fa-star" id="star5"></i>
									  </div>';
								  } else if ($total_rate == 2) {
									  echo '
									  <div>
										  <i class="fa-solid fa-star" id="star1" style="color: gold;"></i>
										  <i class="fa-solid fa-star" id="star2" style="color: gold;"></i>
										  <i class="fa-solid fa-star" id="star3"></i>
										  <i class="fa-solid fa-star" id="star4"></i>
										  <i class="fa-solid fa-star" id="star5"></i>
									  </div>';
								  } else if ($total_rate == 3) {
									  echo '
									  <div>
										  <i class="fa-solid fa-star" id="star1" style="color: gold;"></i>
										  <i class="fa-solid fa-star" id="star2" style="color: gold;"></i>
										  <i class="fa-solid fa-star" id="star3" style="color: gold;"></i>
										  <i class="fa-solid fa-star" id="star4"></i>
										  <i class="fa-solid fa-star" id="star5"></i>
									  </div>';
								  } else if ($total_rate == 4) {
									  echo '
									  <div>
										  <i class="fa-solid fa-star" id="star1" style="color: gold;"></i>
										  <i class="fa-solid fa-star" id="star2" style="color: gold;"></i>
										  <i class="fa-solid fa-star" id="star3" style="color: gold;"></i>
										  <i class="fa-solid fa-star" id="star4" style="color: gold;"></i>
										  <i class="fa-solid fa-star" id="star5"></i>
									  </div>';
								  } else if ($total_rate == 5) {
									  echo '
									  <div>
										  <i class="fa-solid fa-star" id="star1" style="color: gold;"></i>
										  <i class="fa-solid fa-star" id="star2" style="color: gold;"></i>
										  <i class="fa-solid fa-star" id="star3" style="color: gold;"></i>
										  <i class="fa-solid fa-star" id="star4" style="color: gold;"></i>
										  <i class="fa-solid fa-star" id="star5" style="color: gold;"></i>
									  </div>';
								  } else {
									  echo '
									  <div>
										  <i class="fa-solid fa-star" id="star1"></i>
										  <i class="fa-solid fa-star" id="star2"></i>
										  <i class="fa-solid fa-star" id="star3"></i>
										  <i class="fa-solid fa-star" id="star4"></i>
										  <i class="fa-solid fa-star" id="star5"></i>
									  </div>';
								  }
							  } else {
								  echo '
								  <div>
									  <i class="fa-solid fa-star" id="star1"></i>
									  <i class="fa-solid fa-star" id="star2"></i>
									  <i class="fa-solid fa-star" id="star3"></i>
									  <i class="fa-solid fa-star" id="star4"></i>
									  <i class="fa-solid fa-star" id="star5"></i>
								  </div>';
							  }
								echo '<label id="productName">'.$name.'</label>
								<label id="productSeller">by '.$seller.'</label>
								<label id="productPrice">'.$price.' SC</label>
							  </div>
							</div>';
						}
					}
				}
            ?>
        	</div>
    	</div>
    </section>
	<script src="js/jQuery-3.6.4.js"></script>
	<script src="js/main.js"></script>
	<script src="js/notepad.js"></script>
	<script src="js/market.js"></script>
</body>
</html>