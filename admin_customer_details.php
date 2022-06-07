<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin_customer_details</title>
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

function pres() {
  window.location.href="pres.php";
}
function order() {
  window.location.href="order.php";
}
</script>
</head>
<body style="background-color: rgb(192,192,192);">
<h1 style="transform:translateY(-30px); text-indent: -15em;padding:20px;background-color: rgb(43, 40, 40); font-size: 40px;text-align: center;color: rgb(240, 235, 235);font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;"><t style="text-indent: 70%;">CUSTOMER DETAILS</t></h1>
<center>
<input type="text" style="transform: translate(-300px,-15px);" id="myInput" onkeyup="myFunction()" placeholder="Search By Customer names..">
</center>
<br>
<?php

$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "pharmacy";


$conn = mysqli_connect($dbHost ,$dbUser ,$dbPass ,$dbName);


$sql = "SELECT c.username,c.name,c.email,c.contact,c.address,c.pincode FROM customer c";
$result = mysqli_query($conn,$sql);
echo "<center>";
echo "<table id='myTable' style='font-size:25px;'>";
echo "<tr class='header' >";
echo "<th style='font-weight:bold;border-left:3px solid black;border-bottom:3px solid black;border-top:3px solid black;' colspan='1'>CUSTOMER NAME</th>";
echo "<th style='border:3px solid black;'>EMAIL</th>";
echo "<th style='border:3px solid black;'>CONTACT</th>";
echo "<th style='border:3px solid black;'>ADDRESS</th>";
echo "<th style='border:3px solid black;'>PINCODE</th>";
echo "<th style='border:3px solid black;'>PRESCRIPTION</th>";
echo "<th style='border:3px solid black;'>ORDER DETAILS</th>";

echo "<tr>";

if(mysqli_num_rows($result)>0)
{
    while($row=mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<form action='admin_action.php' method='post'>";
        echo "<input type='hidden' name='username' value='".$row['username']."'>";
        echo "<td style='text-align:center;border-left:3px solid black;'>".strtoupper($row['name'])."</td>";
        echo "<td style='text-align:center;border-left:3px solid black;'>".$row['email']."</td>";
        echo "<td style='text-align:center;border-left:3px solid black;'>".$row['contact']."</td>";
        echo "<td style='text-align:center;border-left:3px solid black;'>".strtoupper($row['address'])."</td>";
        echo "<td style='text-align:center;border-left:3px solid black;'>".$row['pincode']."</td>";  
        echo "<td style='text-align:center;border-left:3px solid black;'><input type='submit' value='CLICK TO VIEW PRESCRIPTION' name='pres' style='height:40px;width:370px;font-size:25px;border-radius:12px;color:white;background-color:black;cursor:pointer;' onclick='pres()'></td>"; 
        echo "<td style='text-align:center;border-left:3px solid black;border-right:3px solid black;'><input type='submit' value='CLICK TO VIEW ORDER DETAILS' name='order' style='height:40px;width:370px;font-size:25px;border-radius:12px;color:white;background-color:black;cursor:pointer;' onclick='pres()'></td>"; 
       echo "</form>";
        echo "<tr>";
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
else{
    echo "<h1 style='font-size:30px;text-align:center;font-weight:bold'>NO RESULTS!</h1>";
}

echo "</table>";
echo "</center>";

mysqli_close($conn);


?>

<section class='buttons'>
<div class='container' style="transform: translateX(-300px);">
<a class='btnfos btnfos-5' onclick="window.location.href='admin_login.html';">GO BACK</a> 

</div></section>


</body>
</html>
