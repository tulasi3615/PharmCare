<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin_product_display</title>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto:400,100,900);
* {
  -moz-box-sizing: inherit;
       box-sizing: inherit;
  -webkit-transition-property: all;
          transition-property: all;
  -webkit-transition-duration: .6s;
          transition-duration: .6s;
  -webkit-transition-timing-function: ease;
          transition-timing-function: ease;
}

html,

.buttons {
  display: table;
  height: 100%;
  width: 100%;
}

.container {
  display: table-cell;
  padding: 1em;
  text-align: center;
  vertical-align: middle;
}

.btnfos {
  color: #fff;
  cursor: pointer;
  display: block;
  font-size: 16px;
  font-weight: 400;
  line-height: 45px;
  max-width: 160px;
  margin: 0 auto 2em;
  position: relative;
  text-transform: uppercase;
  /* vertical-align: middle; */
  width: 100%;
}
@media (min-width: 400px) {
  .btnfos {
    display: inline-block;
    margin-right: 2.5em;
  }
  .btnfos:nth-of-type(even) {
    margin-right: 0;
  }
}
@media (min-width: 600px) {
  .btnfos:nth-of-type(even) {
    margin-right: 2.5em;
  }
  .btnfos:nth-of-type(5) {
    margin-right: 0;
  }
}

.btnfos-5 {
    color: black;
    font-weight: bold;
  border: 3px solid;
  box-shadow: inset 0 0 20px black;
  outline: 1px solid;
  outline-color: rgba(255, 255, 255, 0);
  outline-offset: 0px;
  text-shadow: none;
  -webkit-transition: all 1250ms cubic-bezier(0.19, 1, 0.22, 1);
          transition: all 1250ms cubic-bezier(0.19, 1, 0.22, 1);
  outline-color: black;
  outline-offset: 0px;
}

.btnfos-5:hover {
  border: 1px solid;
  box-shadow: inset 0 0 20px black, 0 0 20px black;
  outline-offset: 15px;
  outline-color: black;
  text-shadow: 1px 1px 2px black;
}

#myInput {
  background-image: url('/css/searchicon.png'); /* Add a search icon to input */
  background-position: 10px 12px; /* Position the search icon */
  background-repeat: no-repeat; /* Do not repeat the icon image */
  width: 500px; /* Full-width */
  border: 3px solid black;
  font-size: 25px;
  padding: 12px 20px 12px 40px; /* Add some padding */
  margin-bottom: 12px; /* Add some space below the input */
}

#myTable {
  border-collapse: collapse; /* Collapse borders */
  width: 100%; /* Full-width */
  border: 1px solid #ddd; /* Add a grey border */
  font-size: 18px; /* Increase font-size */
}

#myTable th, #myTable td {
  text-align: left; /* Left-align text */
  padding: 12px; /* Add padding */
}

#myTable tr {
  /* Add a bottom border to all table rows */
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  /* Add a grey background color to the table header and on hover */
  background-color: #f1f1f1;
}
    </style>

<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
</head>
<body>
<!-- <body style="background-color: rgb(192,192,192);"> -->
<!-- <h1 style="transform:translateY(-30px); padding:20px;background-color: rgb(43, 40, 40); font-size: 40px;text-align: center;color: rgb(240, 235, 235);font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;"><b>ORDER DETAILS/b></h1>
<center>
<input type="text" style="transform: translateY(-15px);" id="myInput" onkeyup="myFunction()" placeholder="Search By Product names..">
</center>
<br> -->
<?php

$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "pharmacy";


$conn = mysqli_connect($dbHost ,$dbUser ,$dbPass ,$dbName);

$username = $_POST['username'];

if(isset($_POST['pres']))
{
    $sql = "SELECT * FROM customer WHERE username='$username'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0)
    {
            while($row=mysqli_fetch_array($result))
            {
                $image_name = $row['prescription'];
                if($image_name)
                {
                      echo "<pre><h1 style='transform:translateY(-30px); padding:20px;background-color: rgb(43, 40, 40); font-size: 25px;text-align: center;color: rgb(240, 235, 235);font-family: Calibri;'>CUSTOMER NAME: ".strtoupper($row['name'])."      CUSTOMER EMAIL: ".$row['email']."</h1></pre>";
                      echo "<center><img src='".$image_name."' style='height:500px;width:500px;'></center>";
                }
                else
                {
                    echo "<h1 style='text-align:center;font-size:25px;'>NO UPLOADS!</h1>";
                }
            }
    }

}
else if(isset($_POST['order']))
{
    $sql = "SELECT * FROM customer WHERE username='$username'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0)
    {
            while($row=mysqli_fetch_array($result))
            {
                $cust_name = $row['name'];
            }
    }


    echo "<pre><h1 style='transform:translateY(-30px); padding:20px;background-color: rgb(43, 40, 40); font-size: 25px;text-align: center;color: rgb(240, 235, 235);font-family: Calibri;'>ORDER DETAILS OF CUSTOMER:  ".strtoupper($cust_name)."</h1></pre>";

    $sql = "SELECT o.order_id,o.shipping_address,o.order_date,o.payment_mode,o.order_amount,c.name FROM order_table o INNER JOIN customer c ON c.username=o.username WHERE c.username='$username'";
    $result = mysqli_query($conn,$sql);
    echo "<table id='myTable' style='font-size:25px;'>";
    echo "<tr class='header' >";
    echo "<th style='font-weight:bold;border-left:3px solid black;border-bottom:3px solid black;border-top:3px solid black;'>ORDER ID</th>";
    echo "<th style='border:3px solid black;'>ORDER DATE</th>";
    echo "<th style='border:3px solid black;'>ORDER AMOUNT</th>";
    echo "<th style='border:3px solid black;'>PAYMENT MODE</th>";
    echo "<th style='border:3px solid black;'>SHIPPING ADDRESS</th>";
    echo "<th style='border:3px solid black;'>PRODUCT DETAILS</th>";
    
    echo "</tr>";

    if(mysqli_num_rows($result)>0)
    {
            while($row=mysqli_fetch_array($result))
            {
                $order_id = $row['order_id'];
                echo "<tr>";
        echo "<td style='text-align:center;border-left:3px solid black;'>".$row['order_id']."</td>";
        echo "<td style='text-align:center;border-left:3px solid black;'>".$row['order_date']."</td>";
        echo "<td style='text-align:center;border-left:3px solid black;'>RS. ".$row['order_amount']."</td>";
        echo "<td style='text-align:center;border-left:3px solid black;'>".strtoupper($row['payment_mode'])."</td>";
        echo "<td style='text-align:center;border-left:3px solid black;border-right:3px solid black;'>".$row['shipping_address']."</td>";
      

        $sql1 = "SELECT o.purchase_count,p.product_name FROM order_details o INNER JOIN product p ON o.product_id=p.product_id WHERE o.order_id=$order_id";
        $result1 = mysqli_query($conn,$sql1);
        if(mysqli_num_rows($result1)>0)
        {
            echo "<td style='text-align:center;border-left:3px solid black;border-right:3px solid black;'>";
            // echo "<th style='border:3px solid black;'>PAYMENT MODE</th>";
            echo "<table style='font-size:17px;'><tr><th style='border-right:3px solid black;border-bottom:3px solid black;'>PRODUCT NAME</th>";
            echo "<th style='border-bottom:3px solid black;'>PURCHASE COUNT</th></tr>";
                while($row1=mysqli_fetch_array($result1))
                {
                    echo "<tr><td style='text-align:center;'>".$row1['product_name']."<hr></td>";
                    echo "<td style='text-align:center;'>".$row1['purchase_count']."<hr></td></tr>";
                }
                echo "</table>";
                echo "</td>";
        }
        
        echo "</tr>";
        echo "<tr>";
        echo "<td>";
        echo "<hr>";
        echo "</td>";
        echo "<td>";
        echo "<hr>";
        echo "</td>";
        echo "<td>";
        echo "<hr>";
        echo "</td>";
        echo "<td>";
        echo "<hr>";
        echo "</td>";
        echo "<td>";
        echo "<hr>";
        echo "</td>";
        echo "<td>";
        echo "<hr>";
        echo "</td>";
        echo "<td>";
        echo "<hr>";
        echo "</td>";
        echo "</tr>";
            }
    }
}
echo "</table>";
echo "</center>";

mysqli_close($conn);


?>

<section class='buttons'>
<div class='container'>
<a class='btnfos btnfos-5' onclick="window.location.href='admin_login.html';">GO BACK</a> 

</div></section>


</body>
</html>
