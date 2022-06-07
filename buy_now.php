<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="buy_now.css" rel="stylesheet">
    <!-- <link href="product_style.css" rel="stylesheet"> -->

    <style>

</style>
    <?php
        $conn = mysqli_connect("localhost", "root", "", "pharmacy");
		
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}

    $username = strval($_SESSION["user_name"]);
    $product_name = $_POST['product_name'];
    $quantity = intval($_POST['quantity']);
    $date = date("Y-m-d");
    $date_html = date("d-m-Y");

    
		$sql1 = "SELECT * FROM product where product_name='$product_name'";
		$result1 = mysqli_query($conn,$sql1);
		if(mysqli_num_rows($result1)<=0)
		{
            echo '<script type="text/javascript" language="javascript">
            if(confirm("error!"))
            {
                self.location="product.php";
            }
            </script> ';
            exit();
		}
		else{
            while($row = mysqli_fetch_array($result1))
            {
                $product_id = $row['product_id'];
                $product_count = $row['product_count'];
                $product_cost = $row['product_cost'];
            }
            $sql = "SELECT * FROM product_belongs_to where product_id=$product_id";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>=1)
            {
                while($row = mysqli_fetch_array($result))
                {
                    $product_company = $row['product_company'];
                }

            }
		}
    

       $pro_name = str_replace(' ','_',$product_name);
        $total_amount = $quantity*$product_cost;
        
        mysqli_close($conn);

    ?>
   
</head>
<body style="background-image:url('ty.jpg');">
<form action="order_confirm.php" method="post">
    <input type="hidden" name="quantity" value="<?php echo $quantity; ?>">
    <input type="hidden" name="product_count" value="<?php echo $product_count; ?>">
    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
    <input type="hidden" name="order_date" value="<?php echo $date; ?>">
    <input type="hidden" name="order_amount" value="<?php echo $total_amount; ?>">


<div class="card" style="transform:translate(350px,20px); background-color: white;width:600px;height:900px;border-top: 10px solid rgb(252, 103, 49);    border-bottom: 10px solid rgb(252, 103, 60);box-shadow: 1px 10px 1000px 0 rgba(209, 37, 7, 0.719);">
    <div class="title" style="text-align: center;font-size:30px">ORDER DETAILS:</div>
    <div class="info">
        <div class="row">
            <div class="col-7"> <span id="heading">Order Date:</span><br> <span id="details"><?php echo $date_html; ?></span> </div>
            <!-- <div class="col-5 pull-right"> <span id="heading">Order No.</span><br> <span id="details">012j1gvs356c</span> </div> -->
        </div>
    </div>
    
    <div class="info" style="transform: translateY(-30px);">
        <div class="row">
            <div class="col-7"> <span id="heading">Product Name:</span><br> <img style="height: 50px;width:50px;transform:translateY(10px);" src="<?php echo $pro_name.'.jpg'; ?>" alt="Italian Trulli"><span><?php echo '     '.strtoupper($product_company).' - '.strtoupper($product_name); ?></span> </div>
           <br> <div class="col-7"> <span id="heading">Product Count: </span><span><?php echo $quantity; ?></span></span> </div>
           <br> <div class="col-7"> <span id="heading">Product Price: </span><span><?php echo 'Rs.'.$product_cost; ?></span></span> </div>

        </div>
    </div>

    <div class="info" style="transform: translateY(-78px);">
        <div class="row">    
        <div class="col-7"> <span id="heading">Enter Shipping Address:</span><br> <span><textarea style="font-size:10pt;border:2px solid rgb(252, 103, 49);" rows="3" cols="30" name="shipping_address"></textarea></span> </div>
        <br>    
        <div class="col-5 pull-right"> <span id="heading">Select Payment Mode:</span><br> 
        <select style="width: 210px;height:40px;border:2px solid rgb(252, 103, 49);font-size:20px;" name="payment_mode">
                <option value="Internet Banking">Internet Banking</option>
                <option value="Cash On Delivery">Cash On Delivery</option>
                <option value="UPI">UPI</option>
                <option value="Debit/Credit Card">Debit/Credit Card</option>
      </select>
       </div>
        </div>
    </div>
  

    <div class="total" style="transform: translateY(-100px);text-align:center;">
        <div class="row">
            <div class="col-9"></div>
            <br><div class="col-3"><big>Total Amount: <span><?php echo 'Rs.'.$total_amount; ?></span></big></div>
            <br><br><input type="submit" value="PLACE ORDER" style="background:linear-gradient(120deg, #f6d365 0%, #fda085 100%);width:510px;height:50px;font-size:25px;cursor:pointer;border:2px solid rgb(252, 103, 49);"/>
</form>
        </div>
    </div>


</body>
</html>