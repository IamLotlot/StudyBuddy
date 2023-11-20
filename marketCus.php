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
    <link rel="stylesheet" href="css/marketCus.css">
  	<script src="https://kit.fontawesome.com/8ef5e4d9da.js"></script>
</head>
<body onload="Online(); getSeller()">
<?php
	include 'nav.php';
    include 'notepad.php';
?>
	<div id="warning-wrapper" style="display: none;">
		<div id="warning-con">
			<h1 id="warning-title">Title</h1>
			<p id="warning-description">Description</p>
			<div id="warning-btn-grp">
				<button class="warning-btn" id="warning-disagree-btn">Disagree</button>
				<button class="warning-btn" id="warning-agree-btn">Agree</button>
			</div>
		</div>
	</div>
    <form action="marketCusEx.php" method="post" enctype="multipart/form-data">
		<section>
			<div class="productCon">
				<label class="productTitle">Product List:</label>
				<?php
				$username = "";

				if (isset($_SESSION['userOnline'])) {
					$username = $_SESSION['userOnline'];
				} else {
					echo 'Try to re-login!';
				}

	            $sql = "SELECT * FROM `market` WHERE `seller` = '$username'";

	            $result = mysqli_query($conn, $sql);
	
	            if ($result) {
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
						<label class="product" onclick="getProduct(this)">'.$productid.'</label>';
						$average = 0;
						$count = 0;
						$total_rate = 0;

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
						}
						echo '
						<input type="text" id="'.$productid.'-rate" value="'.$total_rate.'" style="display:none" disabled>
						<input type="text" id="'.$productid.'-name" value="'.$name.'" style="display:none" disabled>
						<input type="text" id="'.$productid.'-price" value="'.$price.'" style="display:none" disabled>
						<input type="text" id="'.$productid.'-seller" value="'.$seller.'" style="display:none" disabled>
						<input type="text" id="'.$productid.'-date" value="'.$date.'" style="display:none" disabled>
						<input type="text" id="'.$productid.'-category" value="'.$category.'" style="display:none" disabled>
						<input type="text" id="'.$productid.'-image" value="'.$image.'" style="display:none" disabled>
						<input type="text" id="'.$productid.'-file" value="'.$file.'" style="display:none" disabled>';
	                }
	            }
            	?>
			</div>
			<div class="productCus">
				<div class="pictureCon">
					<img id="chosenPicture" name="chosenPicture">
					<div class="rateCon">
			              <i class="fa-solid fa-star" id="star1"></i>
			              <i class="fa-solid fa-star" id="star2"></i>
			              <i class="fa-solid fa-star" id="star3"></i>
			              <i class="fa-solid fa-star" id="star4"></i>
			              <i class="fa-solid fa-star" id="star5"></i>
					</div>
				</div>
				<div class="detailsCon">
					<div class="detailsCol">
						<label>Product ID:<input type="text" class="inputs" id="productID" name="productID" value="ID (Auto-Generate)" readonly></label>
						<label>Product Name:<input type="text" class="inputs" id="productName" name="productName" placeholder="(e.g ITEP306 Reviewer)" oninput="this.value = this.value.replace(/[^a-zA-Z0-9\s]/g, '')"></label>
						<label>Price (SC):<input type="text" id="price" class="inputs" name="price" placeholder="(e.g 19.99)" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"></label>
						<label>Product Picture:<input type="file" class="inputs" id="picture" name="picture" accept=".jpg, .jpeg, .png" onchange="displayImage(this)"></label>
					</div>
					<div class="detailsCol">
						<label>Seller:<input type="text" class="inputs" id="seller" name="seller" readonly></label>
						<label>Category:<input type="text" class="inputs" id="category" name="category" placeholder="(e.g Programming)"></label>
						<label id="dateLabel">Date:<input type="date" class="inputs" id="date" name="date"></label>
						<label>PDF:<input type="file" class="inputs" id="pdf" name="pdf" accept=".pdf" onchange="displayPDF(this)"></label>
					</div>
				</div>
				<div class="pdfCon">
					<iframe id="pdfViewer"></iframe>
					<div class="buttonCon">
						<div>
					    	<input type="submit" id="removeBtn_M" name="removeBtn_M" value="Remove" style="display:none"></input>
					    	<i class="fa-solid fa-trash-can" onclick="clickRemove_M()"></i>
							<div class="slide-content" id="content1">Remove</div>
						</div>
						<div>
						    <input type="submit" id="editBtn_M" name="editBtn_M" value="Edit" style="display:none"></input>
						    <i class="fa-solid fa-pencil" onclick="clickEdit_M()"></i>
							<div class="slide-content" id="content2">Edit</div>
						</div>
						<div>
						    <input type="submit" id="addBtn_M" name="addBtn_M" value="Add" style="display:none"></input>
						    <i class="fa-sharp fa-solid fa-plus" onclick="clickAdd_M()"></i>
							<div class="slide-content" id="content3">Add</div>
						</div>
						<div>
					    	<i class="fa-solid fa-retweet" onclick="clickRefresh_M()"></i>
							<div class="slide-content" id="content4">Refresh</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</form>
	<script src="js/jQuery-3.6.4.js"></script>
	<script src="js/main.js"></script>
    <script src="js/notepad.js"></script>
	<script src="js/marketCus.js"></script>
</body>
</html>