<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
body{
    background-color: rgb(192,192,192);
}
    </style>
</head>
<body>
    <h1 style="transform:translateY(-30px); padding:20px;background-color: rgb(43, 40, 40); font-size: 40px;text-align: center;color: rgb(240, 235, 235);font-family: Calibri;">LIST OF EXPIRED PRODUCTS</h1>
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
        $date = date('y-m-d');
        $date = substr_replace($date,'20',0,0);
        $sql = "SELECT product_id,product_name,product_exd FROM product where product_exd='$date'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result))
        {
            echo "<table id='myTable' style='font-size:25px;'><tr><th style='font-weight:bold;border-left:3px solid black;border-bottom:3px solid black;border-top:3px solid black;text-align:center' >Product Company</th><th style='border:3px solid black;text-align:center;'>Product Name</th><th style='border:3px solid black;text-align:center'>Expiry Date</th></tr>";
            while($row = mysqli_fetch_array($result))
            {
                $pid = $row['product_id'];
                $pname = strtoupper($row['product_name']);
                $exp = $row['product_exd'];
                $sql2 = "SELECT product_company FROM product_belongs_to WHERE product_id=$pid";
                $result1 = mysqli_query($conn,$sql2);
                if(mysqli_num_rows($result1))
                {
                    while($row = mysqli_fetch_array($result1))
                        $comp = strtoupper($row['product_company']);
                    echo "<tr><td style='text-align:center;border-left:3px solid black;'>$comp<hr></td><td style='text-align:center;border-left:3px solid black;'>$pname<hr></td><td style='text-align:center;border-left:3px solid black;border-right:3px solid black;'>$exp<hr></td>";
                }
            }
            echo "</table>";
        }
        else{
            echo "<h1 style='font-size:30px;text-align:center;font-weight:bold'>NO RESULTS!</h1>";

        }
    ?>      
</body>
</html>