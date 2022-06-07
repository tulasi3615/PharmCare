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

    $pname = $_POST['pname'];
    $pcost = intval($_POST['pcost']);
    $pcount = intval($_POST['pcount']);
    $pmfd = $_POST['pmfd'];
    $pexp = $_POST['pexp'];
    $company = $_POST['company'];
    $category = $_POST['category'];

    $sql = "INSERT INTO product (product_name,product_cost,product_count,product_mfd,product_exd) VALUES ('$pname',$pcost,$pcount,'$pmfd','$pexp')";
    if(mysqli_query($conn,$sql))
    {
        $sql1 = "SELECT product_id FROM product WHERE product_name='$pname'";
        $result = mysqli_query($conn,$sql1);
        if(mysqli_num_rows($result)>0)
        {
            while($row = mysqli_fetch_array($result))
                $pid = $row['product_id'];
            $sql2 = "INSERT INTO product_belongs_to VALUES ('$company','$category',$pid)";
            // echo $sql2;
            if(mysqli_query($conn,$sql2))
            {
                echo '<script type="text/javascript" language="javascript">
                if(confirm("Product Added Successfully!!"))
                {
                    self.location="admin_add_product.php";
                }
                </script> ';
            }
        }
    }
?>