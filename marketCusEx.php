<?php
include "db_conn.php";

if (isset($_POST['addBtn_M'])) {

    $productName = $_POST['productName'];
    $seller = $_POST['seller'];

    $picture = $_FILES['picture'];
    $picture_name = $_FILES['picture']['name'];
    $picture_ext = pathinfo($picture_name, PATHINFO_EXTENSION);
    $picture_new_name = $productName . "_".$seller."." . $picture_ext;

    $pdf = $_FILES['pdf'];
    $pdf_name = $_FILES['pdf']['name'];
    $pdf_ext = pathinfo($pdf_name, PATHINFO_EXTENSION);
    $pdf_new_name = $productName . "_".$seller."." . $pdf_ext;

    $picture_ex = pathinfo($picture_name, PATHINFO_EXTENSION);
    $picture_ex_lc = strtolower($picture_ex);

    $pdf_ex = pathinfo($pdf_name, PATHINFO_EXTENSION);
    $pdf_ex_lc = strtolower($pdf_ex);

    $allowed_exs = array("jpg", "jpeg", "png");
    $accepted_exs = array("pdf");

    $sql = "SELECT * FROM `market` WHERE `name` = '$productName'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo '<script type="text/javascript">';
        echo 'alert("Product Name is already been used");';
        echo 'window.location.back;';
        echo '</script>';

    } else {

        if (in_array($picture_ex_lc, $allowed_exs)) {
        
            if (in_array($pdf_ex_lc, $accepted_exs)) {
        
                move_uploaded_file($picture["tmp_name"], "documents/product/".$picture_new_name);
                move_uploaded_file($pdf["tmp_name"], "documents/pdf/".$pdf_new_name);
                
                $price = $_POST['price'];
                $date = $_POST['date'];
                $category = $_POST['category'];
        
                $sql = "INSERT INTO `market`(`productid`,`name`,`state`, `price`, `seller`, `date`, `category`, `image`, `file`) 
                        VALUES ('','$productName','not-verified','$price','$seller', '$date', '$category','$picture_new_name','$pdf_new_name')";
        
                $result = mysqli_query($conn, $sql);
        
                echo '<script type="text/javascript">'; 
                echo 'alert("Product added successfully!");';
                echo 'window.location.href = "marketCus.php";';
                echo '</script>';
        
            } else {
                echo '<script type="text/javascript">'; 
                echo 'alert("Product Picture needs to be in jpg, jpeg or png format");';
            echo 'window.location.back;';
                echo '</script>';
            }
        
        } else {
            echo '<script type="text/javascript">'; 
            echo 'alert("PDF needs to be in pdf format");';
            echo 'window.location.back;';
            echo '</script>';
        }
    }
}

if (isset($_POST['editBtn_M'])) {
    
    $id = $_POST['productID'];
    $name = $_POST['productName'];
    
    $sql = "SELECT * FROM `account` WHERE `name` = '$name' AND `productid` = '$id'";
    
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo '<script type="text/javascript">'; 
        echo 'alert("'.$id.' ID or '.$name.' product is not found");';
        echo 'window.history.back();';
        echo '</script>';

    } else {

        //Images
        $picture = $_FILES['picture'];
        $picture_name = $_FILES['picture']['name'];
        $picture_ext = pathinfo($picture_name, PATHINFO_EXTENSION);
        $picture_new_name = $name . "_Profile-Picture." . $picture_ext;

        $pdf = $_FILES['pdf'];
        $pdf_name = $_FILES['pdf']['name'];
        $pdf_ext = pathinfo($pdf_name, PATHINFO_EXTENSION);
        $pdf_new_name = $name . "_PDF." . $pdf_ext;

        //Image format or extension
        $picture_ex = pathinfo($picture_name, PATHINFO_EXTENSION);
        $picture_ex_lc = strtolower($picture_ex);

        $pdf_ex = pathinfo($pdf_name, PATHINFO_EXTENSION);
        $pdf_ex_lc = strtolower($pdf_ex);

        $allowed_exs = array("jpg", "jpeg", "png");
        $accepted_exs = array("pdf");

        if (in_array($picture_ex_lc, $allowed_exs)) {

            if (in_array($pdf_ex_lc, $accepted_exs)) {
            
                move_uploaded_file($picture["tmp_name"], "documents/product/".$picture_new_name);
                move_uploaded_file($pdf["tmp_name"], "documents/pdf/".$pdf_new_name);
                    
                $productid = $_POST['productID'];
                $category = $_POST['category'];
                $price = $_POST['price'];
                $date = $_POST['date'];
                
                $sql = "UPDATE `market` SET `name`='$name',`category`='$category',`price`='$price',`date`='$date',`image`='$picture_new_name',`file`='$pdf_new_name' WHERE `productid`='$productid'";
                
                $result = mysqli_query($conn, $sql);
                
                echo '<script type="text/javascript">'; 
                echo 'alert("'.$name.' product was updated!");';
                echo 'window.location.href = "marketCus.php";';
                echo '</script>';

            } else {
            echo '<script type="text/javascript">'; 
            echo 'alert("PDF needs to be in pdf format");';
            echo 'window.history.back();';
            echo '</script>';
            }
        } else {
            echo '<script type="text/javascript">'; 
            echo 'alert("Profile Picture needs to be in jpg, jpeg or png format");';
            echo 'window.history.back();';
            echo '</script>';
        }
    }

}

if (isset($_POST['removeBtn_M'])) {
    
    $id = $_POST['productID'];
    $name = $_POST['productName'];
    
    $sql = "SELECT * FROM `market` WHERE `name` = '$name' AND `productid` = '$id'";
    
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        $sql2 = "DELETE FROM `market` WHERE `name`='$name'";
        
        $result2 = mysqli_query($conn, $sql2);
            
        echo '<script type="text/javascript">'; 
        echo 'alert("'.$name.' product was removed!");';
        echo 'window.location.href = "marketCus.php";';
        echo '</script>';
    } else {
        echo '<script type="text/javascript">'; 
        echo 'alert("'.$id.' ID or '.$name.' product is not found");';
        echo 'window.history.back();';
        echo '</script>';
    }

}

?>