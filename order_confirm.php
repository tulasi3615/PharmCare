<?php
    session_start();
?>
<?php
        $conn = mysqli_connect("localhost", "root", "", "pharmacy");
		
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}

    $username = strval($_SESSION["user_name"]);
    $product_id= intval($_POST['product_id']);
    $purchase_count = intval($_POST['quantity']);
    $order_date = strval($_POST['order_date']);
    $product_count = intval($_POST['product_count']);
    $order_amount = strval($_POST['order_amount']);
    $shipping_address = strval($_POST['shipping_address']);
    $payment_mode = strval($_POST['payment_mode']);

    // echo $username."<br>";
    // echo $product_id."<br>";
    // echo $purchase_count."<br>";
    // echo $order_date."<br>";
    // echo $product_count."<br>";
    // echo $order_amount."<br>";
    // echo $shipping_address."<br>";
    // echo $payment_mode."<br>";

    

    $sql = "INSERT INTO order_table (order_date,shipping_address,payment_mode,username) VALUES ('$order_date',
    '$shipping_address','$payment_mode','$username')";
    if(mysqli_query($conn, $sql))
    {
        $sql2 = "SELECT order_id FROM order_table where username='$username'";
        $result1 = mysqli_query($conn,$sql2);
        if(mysqli_num_rows($result1)>=1)
        {
            while($row = mysqli_fetch_array($result1))
            {
                $order_id = $row['order_id'];
            } 
        }
        // echo $order_id;
        $_SESSION["order_id"]=$order_id;
    
        $sql1 = "INSERT INTO order_details (order_id,product_id,purchase_count) VALUES ($order_id,$product_id,$purchase_count)";
    //    echo $sql;
    //    echo $sql1;
    //    echo $sql2;
        if(mysqli_query($conn, $sql1)){
            
            if(mysqli_query($conn,"CALL calculate_total($order_id)"))
            {
                echo '<script type="text/javascript" language="javascript">
            if(confirm("ORDER SUCCESSFULL!"))
            {
                self.location="last_page.php";
            }
            </script> ';
            }
            // echo $order_id;
            $_SESSION["order_id"]=$order_id;
    
            
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }
    }


    
    // $records = mysqli_query($conn,"CALL calculate_total($order_id)");

       $pro_name = str_replace(' ','_',$product_name);
        
        // $revised_count=$product_count-$purchased_count;

        // $sql = "UPDATE product SET product_count=$revised_count WHERE product_id=$product_id";
        // $result = mysqli_query($conn,$sql);

        mysqli_close($conn);

    ?>