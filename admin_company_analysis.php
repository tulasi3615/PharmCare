<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin_company_analysis</title>
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
    </style>
</head>
<body style="background-color: rgb(192,192,192);">
<h1 style="transform:translateY(-30px); padding:20px;background-color: rgb(43, 40, 40); font-size: 40px;text-align: center;color: rgb(240, 235, 235);font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;"><b>COMPANY SALES ANALYSIS</b></h1>
<?php

$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "pharmacy";


$conn = mysqli_connect($dbHost ,$dbUser ,$dbPass ,$dbName);

$sql = "SELECT p.product_company,SUM(o.purchase_count) AS total_count FROM product_belongs_to p INNER JOIN order_details o ON o.product_id=p.product_id GROUP BY p.product_company ORDER BY SUM(o.purchase_count) DESC;";
$result = mysqli_query($conn,$sql);
echo "<center>";
echo "<table style='font-size:25px;'>";
echo "<tr >";
echo "<th style='font-weight:bold;border-left:3px solid black;border-bottom:3px solid black;border-top:3px solid black;' colspan='1'>COMPANY NAME</th>";
echo "<th style='border:3px solid black;'>PRODUCT PURCHASE COUNT</th>";
echo "<tr>";

if(mysqli_num_rows($result)>0)
{
    while($row=mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td style='text-align:center;border-left:3px solid black;'>".strtoupper($row['product_company'])."</td>";
        echo "<td style='text-align:center;border-left:3px solid black;border-right:3px solid black;'>".$row['total_count']."</td>";
        echo "<tr>";
        echo "<tr>";
        echo "<td>";
        echo "<hr>";
        echo "</td>";
        echo "<td>";
        echo "<hr>";
        echo "</td>";
        echo "</tr>";
    }
}
else{
    echo "<h1 style='font-size:30px;text-align:center;font-weight:bold'>NO RESULTS!</h1>";
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
