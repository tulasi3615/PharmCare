<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Bill</title>
    <!-- <style>
        .internal{
            background-color: orange;
            color: black;
            height: auto;
            width: 50%;
            align-items: center;
        }
        body{
            background-color: cyan;
            font-size: 24px;
        }
    </style> -->
    <style type="text/css">
        .internal{
            background-color: rgb(192,192,192);
            height :auto;
            width :800px;
            color: black;
        }
       
        </style>
        <?php
            $conn = mysqli_connect("localhost", "root", "", "pharmacy");
                    
            if($conn === false){
                die("ERROR: Could not connect. "
                    . mysqli_connect_error());
            }

            $username = $_SESSION["user_name"];
            $order_id = $_SESSION["order_id"];
            $NewDate=Date('d-m-20y', strtotime('+5 days'));

            $sql = "SELECT name,contact FROM customer WHERE username='$username'";
            $result = mysqli_query($conn,$sql);
            // echo $result;
            if(mysqli_num_rows($result)>0)
            {
                while($row=mysqli_fetch_array($result))
                {
                    $name = $row['name'];
                    $contact = $row['contact'];
                }
            }

            $sql1 = "SELECT * FROM order_table WHERE order_id=$order_id";
            $result1 = mysqli_query($conn,$sql1);
            // echo $result;
            if(mysqli_num_rows($result1)>0)
            {
                while($row=mysqli_fetch_array($result1))
                {
                    $address = $row['shipping_address'];
                    $tot_amount = $row['order_amount'];
                }
            }

            $sql1 = "SELECT * FROM order_details WHERE order_id=$order_id";
            $result1 = mysqli_query($conn,$sql1);
            // echo $result;
            if(mysqli_num_rows($result1)>0)
            {
                while($row=mysqli_fetch_array($result1))
                {
                    $product_id = $row['product_id'];
                    $purchase_count = $row['purchase_count'];
                }
            }

            $sql1 = "SELECT * FROM product WHERE product_id=$product_id";
            $result1 = mysqli_query($conn,$sql1);
            // echo $result;
            if(mysqli_num_rows($result1)>0)
            {
                while($row=mysqli_fetch_array($result1))
                {
                    $product_name = $row['product_name'];
                    $product_cost = $row['product_cost'];
                }
                $product_amount=$product_cost*$purchase_count;
                
            }

            mysqli_close($conn);

        ?>
</head>
<body style="background-image: url('hospital.jpg');">
    <br><br>
    <div class="main" >
        <center>
        <div class="internal" style="border: 3px solid rgb(90, 88, 88);box-shadow:25px 20px 20px 0 rgb(110, 105, 105);width:600px;height:1100px;">
            <br>
                <h1 style="color:white;font-size: 40px;padding: 7px;background-color: rgb(90, 88, 88);transform: translateY(-48px); ">ORDER CONFIRMED!!</h1>
              
               <center><img src="logo.jpg" alt="not able" style="height: 80px;width: 80px;transform: translateY(-60px);border: 2px solid black;"></center>
             <div style="transform: translateY(-50px);font-weight: bold;">
              <script >
                    let quote = ["It is clear that the pharmaceutical industry is not, by any stretch of the imagination, doing enough to ensure that the poor have access to adequate medical care","For the first 50 years of your life the food industry is trying to make you fat. Then, the second 50 years, the pharmaceutical industry is treating you for everything.","When you work in the pharmaceutical industry you realize that there's a lot out of people's control, and there's ways that people can be helped.","I would say that the pharmaceutical industry is hyper-competitive from a global perspective.","One of the things that launched the strength in biotech is when the pharmaceutical industry itself got a little slow.","This change to a higher phase of alert is a signal to governments, to ministries of health and other ministries, to the pharmaceutical industry and the business community that certain actions now should be undertaken with increased urgency and at an accelerated pace."]
                    var final = quote[Math.floor(Math.random() * quote.length)]
                    document.write(final.fontsize(3));
                </script><br><br>
                </div>
                <table style="font-size: 15px;">
                    <tr >
                        <img src="truck-delivery.gif" alt="moving truck" style="width: 600px; height : 300px;border-top:6px solid chocolate ;border-bottom:6px solid chocolate ;transform: translateY(-40px);"><br>
                        <p style="font-size:22px;padding: 10px;background-color: chocolate;transform: translateY(-70px);">Your Order has been shipped <?php echo strtoupper($name); ?>!!<br><b>Your Order number is <?php echo "63154".$order_id; ?></b></p>
                    </tr>
            
                    <tr style="transform: translateY(-50px);">
                        <th style="text-align: left;font-style: bold; font-size: 29px;">Products</th>
                        <th style="text-align: left;font-style: bold; font-size: 29px;">Price</th>
                    </tr>
                    <tr style="transform: translateY(-50px);">
                        <td><br></td>
                        <td><br></td>
                    </tr>
                    <tr style="transform: translateY(-50px);">
                        <td style="text-align: left;font-style: bold; font-size: 24px;"><?php echo strtoupper($product_name); ?>&emsp;&emsp;&emsp;&emsp;</td>
                        <td style="text-align: left;font-style: bold; font-size: 24px;">Rs.<?php  echo $product_amount; ?>/-</td>
                    </tr>
                    <tr style="transform: translateY(-50px);">
                        <td><hr></td><td><hr></td>
                    </tr>
                    <tr style="transform: translateY(-50px);">
                        <td style="text-align: left;font-style: bold; font-size: 24px;font-weight: bold;">Total</td>
                        <td style="text-align: left;font-style: bold; font-size: 24px;font-weight: bold;">Rs.<?php echo $tot_amount; ?>/-</td>
                    </tr>
                    <tr style="transform: translateY(-50px);">
                        <td><hr></td><td><hr></td>
                    </tr>
                    <tr style="transform: translateY(-50px);">
                        <td style="text-align: left;font-weight: bold;">Excpected Delivery Date:</td>
                        <td style="text-align: left;font-style: bold;"><?php echo $NewDate; ?></td>
                    </tr>
                    <tr style="transform: translateY(-50px);">
                       
                        <td style="text-align: left;font-weight: bold;">Shipping Address:</td>
                        <td style="text-align: left;font-style: bold;"><?php echo $address; ?></td>
                    </tr>
                    <tr style="transform: translateY(-50px);">
                       
                        <td style="text-align: left;font-weight: bold;">Contact No:</td>
                        <td style="text-align: left;font-style: bold;"><?php echo $contact; ?></td>
                    </tr>
                </table>
                <h2 style="padding: 6px;background-color: chocolate;" style="transform: translateY(-50px);">Thank You For Ordering from PHARM CARE!STAY SAFE</h2><br><br>   
        </div>
    </center>
    </div>
    <br><br>
</body>
</html>