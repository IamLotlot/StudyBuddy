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
    <link rel="stylesheet" href="css/products.css">
  	<script src="https://kit.fontawesome.com/8ef5e4d9da.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body onload="Online()">
<?php
	include 'nav.php';
?>
	<form action="productsEx.php" method="post" enctype="multipart/form-data">
		<section class="productsCon">
			<div class="productsCol">
				<label id="usernameTitle">Products:</label>
					<?php
					
		            $sql = "SELECT * FROM `market`";

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
							<label class="productid" id="productLabel" onclick="getProducts(this)">'.$productid.'</label>
							<input type="text" id="'.$productid.'-password" value="'.$rate.'" style="display:none" disabled>
							<input type="text" id="'.$productid.'-state" value="'.$name.'" style="display:none" disabled>
							<input type="text" id="'.$productid.'-email" value="'.$price.'" style="display:none" disabled>
							<input type="text" id="'.$productid.'-fullname" value="'.$seller.'" style="display:none" disabled>
							<input type="text" id="'.$productid.'-address" value="'.$date.'" style="display:none" disabled>
							<input type="text" id="'.$productid.'-yearSection" value="'.$category.'" style="display:none" disabled>
							<input type="text" id="'.$productid.'-age" value="'.$image.'" style="display:none" disabled>
							<input type="text" id="'.$productid.'-studentid" value="'.$file.'" style="display:none" disabled>
							';
		            	}
			        }
			        ?>
			</div>
			<div class="detailsCol">
				<div class="firstCon">
					<div class="imageCon">
						<label for="profileInput" id="profileLabel">+</label>
			    		<input type="file" id="profileInput" name="profileInput" style="display: none">
						<img id="profilePreview" style="display: none">
					</div>
					<div class="detailsCon">
						<label>Username</label><input type="text" class="inputField" id="username" name="username" required>
						<label>State</label><input type="text" class="inputField" id="state" name="state" required>
						<label>Role</label><input type="text" class="inputField" id="role" name="role" value="user" disabled required>
						<label>Year & Section</label><input type="text" class="inputField" id="yearSection" name="yearSection" required>
						<label>Student ID</label><input type="text" class="inputField" id="studentid" name="studentid" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" required>
						<label>Address</label><input type="text" class="inputField" id="address" name="address" required>
					</div>
					<div class="detailsCon">
						<label>Password</label><input type="text" class="inputField" id="password" name="password" required>
						<label>Email</label><input type="email" class="inputField" id="email" name="email" required>
						<label>Fullname</label><input type="text" class="inputField" id="fullname" name="fullname" required>
						<label>Age</label><input type="text" class="inputField" id="age" name="age" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" required>
						<label>Sex</label><input type="text" class="inputField" id="sex" name="sex" required>
						<label>Contact</label><input type="text" id="contact" name="contact" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" required>
					</div>
				</div>
				<div class="secondCon">
					<img src="">
					<img src="">
				</div>
			</div>
			<div class="buttonsCol">
			    <input type="submit" class="buttons" id="addBtn" name="addBtn" value="Add"></input>
			    <input type="submit" class="buttons" id="editBtn" name="editBtn" value="Edit"></input>
			    <input type="submit" class="buttons" id="removeBtn" name="removeBtn" value="Remove"></input>
			    <input type="submit" class="buttons" id="verifyBtn" name="verifyBtn" value="Verify"></input>
			</div>
		</section>
	</form>
	<script src="js/main.js"></script>
</body>
</html>