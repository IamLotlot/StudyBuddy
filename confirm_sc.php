<?php
session_start();

include "db_conn.php";

if (isset($_POST['price']) && isset($_POST['book']) && isset($_POST['seller'])) {

    $price = $_POST['price'];
    $book = $_POST['book'];
    $seller = $_POST['seller'];
    
    $date = date("Y-m-d");
    $time = date("H:i:s");

    if (isset($_SESSION['userOnline'])) {
        
        $username = $_SESSION['userOnline'];

        $sql = "SELECT * FROM `owner` WHERE `book` = '.$book.'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $rowCount = mysqli_num_rows($result);
            
            if ($rowCount > 0) {

                echo "Owned";

            } else {

                $sql2 = "SELECT * FROM `account` WHERE username = '$username'";
                $result2 = mysqli_query($conn, $sql2);
    
                if ($result2 && mysqli_num_rows($result2) > 0) {
                    $row = mysqli_fetch_array($result2);
                    
                    $sc = $row["studdycoin"];
    
                    if ($price < $sc) {
                        
                        $sql3 = "INSERT INTO `owner` (`name`, `book`, `seller`, `date`, `time`) VALUES ('.$username.','.$book.','.$seller.','.$date.','.$time.')";
                        $result3 = mysqli_query($conn, $sql3);
    
                        if ($result3) {
    
                            $priceInt = (int)$price;
                            $scInt = (int)$sc;
        
                            $newSc = $priceInt - $scInt;
        
                            $sql4 = "UPDATE `account` SET `studdycoin`='.$newSc.' WHERE `username` = '.$username.'";
                            $result4 = mysqli_query($conn, $sql4);
        
                            if ($result4) {
        
                                $sql5 = "UPDATE `account` SET `studdycoin`='.$newSc.' WHERE `username` = '.$username.'";
                                $result5 = mysqli_query($conn, $sql5);
            
                                if ($result5) {
            
                                    $sql6 = "INSERT INTO `market_log`(`event`, `buyer`, `book`, `seller`, `price`, `sc`, `date`, `time`) VALUES ('bought','.$username.','.$book.','.$seller.','.$price.','.$sc.','.$date.','.$time.')";
                                    $result6 = mysqli_query($conn, $sql6);
                
                                    if ($result6) {
    
                                        echo "Sufficient";
    
                                    } else {
                
                                        $errorMessage = mysqli_error($conn);
                                        echo "SQL Error: $errorMessage";
                                    }
                                } else {
            
                                    $errorMessage = mysqli_error($conn);
                                    echo "SQL Error: $errorMessage";
                                }
                            } else {
        
                                $errorMessage = mysqli_error($conn);
                                echo "SQL Error: $errorMessage";
                            }
                        } else {
                            
                            $errorMessage = mysqli_error($conn);
                            echo "SQL Error: $errorMessage";
                        }
                    } else {
    
                        echo "Insufficient";
                    }
                }
            }
        } else {

            echo "SQL Error: " . mysqli_error($conn);
        }
    
    } else {

        echo "No_User";
    }

} else {

    echo "Ajax";
}

?>