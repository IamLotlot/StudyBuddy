<?php

include "db_conn.php";

if (isset($_POST['search']) && isset($_POST['action'])) {

    $search = $_POST["search"];
    $action = $_POST["action"];

    if ($action == "verified") {
        if ($search == ""){
            
            $sql1 = "SELECT * FROM `market` WHERE `state` = 'verified'";
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
                echo 'No verified products';
            }
        } else {
            
            $sql1 = "SELECT * FROM `market` WHERE `state` = 'verified' AND `name` LIKE '$search'";
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
                echo 'No verified products OR name like '.$search;
            }
        }
    } else if ($action == "not-verified"){
        if ($search == ""){
            
            $sql1 = "SELECT * FROM `market` WHERE `state` = 'not-verified'";
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
                echo 'No not-verified products';
            }
        } else {
            
            $sql1 = "SELECT * FROM `market` WHERE `state` = 'not-verified' AND `name` LIKE '$search'";
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
                echo 'No not-verified products OR name like '.$search;
            }
        }
    } else if ($action == "reported"){
        if ($search == ""){
            
            $sql1 = "SELECT * FROM `market` WHERE `state` = 'reported'";
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
                echo 'No reported products';
            }
        } else {
            
            $sql1 = "SELECT * FROM `market` WHERE `state` = 'reported' AND `name` LIKE '$search'";
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
                echo "No reported products OR name like ".$search;
            }
        }
    } else {
        echo "Unknown2";
    }
} else {
    echo "Unknown1";
}
?>