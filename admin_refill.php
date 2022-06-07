<?php
    session_start();
?>
<?php
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "pharmacy";
    
    $conn = mysqli_connect($dbHost ,$dbUser ,$dbPass ,$dbName);
    if($conn === false){
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
    }

    $amount = $_COOKIE['uid'];
    $pid = $_SESSION['product_id'];
    $sql = "UPDATE product SET product_count=$amount where product_id=$pid";
    // echo $sql;
    if(mysqli_query($conn,$sql))
    {
        echo '<script type="text/javascript" language="javascript">
                if(confirm("Updated Successfully!!"))
                {
                    self.location="admin_product_stock.php";
                }
                </script> ';
    }
?>