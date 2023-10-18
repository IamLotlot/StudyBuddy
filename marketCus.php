<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Study Buddy | Market Page</title>
    <link rel="shortcut icon" type="icon" href="img">
	<link rel="icon" type="image/x-icon" href="css/img/StudyBuddy.ico">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/marketCus.css">
  	<script src="https://kit.fontawesome.com/8ef5e4d9da.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body onload="Online(); getSeller()">
<?php
	include 'nav.php';
    include 'notepad.php';
?>
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
						<label class="product" onclick="getProduct(this)">'.$productid.'</label>
						<input type="text" id="'.$productid.'-rate" value="'.$rate.'" style="display:none" disabled>
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
			              <i class="fa-solid fa-star"></i>
			              <i class="fa-solid fa-star"></i>
			              <i class="fa-solid fa-star"></i>
			              <i class="fa-solid fa-star"></i>
			              <i class="fa-solid fa-star"></i>
					</div>
				</div>
				<div class="detailsCon">
					<div class="detailsCol">
						<label>Product ID:<input type="text" class="inputs" id="productID" name="productID" value="ID" readonly></label>
						<label>Product Name:<input type="text" class="inputs" id="productName" name="productName" oninput="validateInput(this)"></label>
						<label>Price:<input type="text" id="price" class="inputs" name="price" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"></label>
						<label>Product Picture:<input type="file" class="inputs" id="picture" name="picture" accept=".jpg, .jpeg, .png" onchange="displayImage(this)"></label>
					</div>
					<div class="detailsCol">
						<label>Seller:<input type="text" class="inputs" id="seller" name="seller" readonly></label>
						<label>Category:<input type="text" class="inputs" id="category" name="category"></label>
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
	<script src="js/main.js"></script>
	<script src="js/marketCus.js"></script>
</body>
</html>