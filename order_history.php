<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="http://designify.me/code-snippets/animated-buttons/css/btns.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,500,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link href="product_style.css" rel="stylesheet">

</head>

<body>
<div style="transform: translateY(-60px);">
    <!-- <h1 style="padding:20px;background-color: rgb(43, 40, 40); font-size: 40px;text-align: center;color: rgb(240, 235, 235);font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;"><b>WELCOME TO PHARM CARE!</b></h1> -->
    <div class="header" style="transform:translateY(-10px);">
        <a href="main.html" class="logo">
        <img class="logo1" src="logo.jpg" alt="Girl in a jacket"/> </a><br><t style="font-size: 28px;color:white;font-family:bold;transform:translateY(-20px);">Hello <?php echo strtoupper($_SESSION["cust_name"]); ?>,</t>
        <div class="header-right">
            
            
              
        </div>
      </div>
      
      <div class="dropdown" style="transform:translate(450px,-10px);">
        <button onclick="myFunction()" class="dropbtn"></button>
        <div id="myDropdown" class="dropdown-content">
          <!-- <form action="update.php" method="POST">
            <input type="submit" name="n" value="EDIT PROFILE">
        </form> -->
          <a href="update.php" onclick=""><t style="color: black;">EDIT PROFILE</t></a>
          <a href="order_history.php">ORDER HISTORY</a>
          <a href="main.html">HOME</a>
          <a href="signup.html">LOGOUT</a>
        </div>
      </div>

      <!-- <div class="searchbox" >  
        <form action="find.php" method="post">    
        <input type="text" name="live_search" id="live_search" autocomplete="off" placeholder=" Search....">  
        <button type="submit">Search</button> 
        <div id="search_result"></div>   
        </form>  
    </div> -->

   
        <input type="image" class="cartlogo" src="cart_logo.jpg" onclick="func()" style="transform: translate(950px,-82px);" width="70px" height="70px" alt="submit"/>
        <script>
        function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }
  
  // Close the dropdown menu if the user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  } 

  

  function pop() {
      let text;
      let person = prompt("CONFIRM YOUR USERNAME:");
      if(person== null || person=="")
      {
        text=alert("Cancelled");
      }
      else {
        window.location.href="update.php";
        document.cookie = "uid="+person;
      }
      }

  function func()
  {
    console.log("hello");
  }
  
    </script>
</body>
</html>
<?php
        $conn = mysqli_connect("localhost", "root", "", "pharmacy");
		
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}

        $username = $_SESSION["user_name"];
        $sql = "SELECT * FROM order_table WHERE username='$username'";
        $result = mysqli_query($conn,$sql);
        echo "<h1 style='font-weight:bold;color: white;text-align:center;padding: 5px;font-size: 30px;background-color: rgb(53, 52, 52);transform:translateY(-142px);'>ORDER HISTORY</h1>;";
        if(mysqli_num_rows($result)>0)
        {
            echo "<table style='width:100%;transform:translateY(-135px);'>";
            echo "<tr>";
            echo "<th></th>";
            echo "<th></th>";
            echo "<th></th>";
            echo "</tr>";
            echo "<tr>";  
            
            while($row = mysqli_fetch_array($result))
            {
               
                $order_id = $row['order_id'];
                $order_date = $row['order_date'];
                $sql1 = "SELECT * from order_details WHERE order_id=$order_id";
                $result1 = mysqli_query($conn,$sql1);
                if(mysqli_num_rows($result1)>0)
                {
                    while($row1 = mysqli_fetch_array($result1))
                    {
                        $product_id = $row1['product_id'];
                        $purchase_count = $row1['purchase_count'];
                        $sql3 = "SELECT * FROM product where product_id=$product_id";
                        $result3 = mysqli_query($conn,$sql3);
                        if(mysqli_num_rows($result3)>0)
                        {
                            while($row3 = mysqli_fetch_array($result3))
                            {
                                $product_name = $row3['product_name'];
                                $sql4 = "SELECT * FROM product_belongs_to WHERE product_id=$product_id";
                                $result4 = mysqli_query($conn,$sql4);
                                if(mysqli_num_rows($result4))
                                {
                                    while($row4 = mysqli_fetch_array($result4))
                                    {
                                        $product_company = $row4['product_company'];
                                    }
                                }
                            }

                        }
                    } 
                }
                $pro_name = str_replace(' ','_',$product_name);
                $pro_name = $pro_name.'.jpg';
                echo "<td  style='width:100px; border:2px solid black;'>";
                echo "<img style=' height:100px;width:100px;' src='$pro_name' alt='$pro_name'>";
                echo "</td>";
                echo "<td>";
                echo "<t style='font-weight:bold;color:rgb(252, 103, 49);'>ORDER NO: </t>"."3at6r1n50".$order_id."<br>";
                echo "<t style='font-weight:bold;color:rgb(252, 103, 49);'>PRODUCT NAME: </t>".strtoupper($product_name)."<br>";
                echo "<t style='font-weight:bold;color:rgb(252, 103, 49);'>PRODUCT COMPANY: </t>".strtoupper($product_company)."<br>";
                echo "<t style='font-weight:bold;color:rgb(252, 103, 49);'>ORDER QUANTITY: </t>".$purchase_count."<br>";
                echo "</td>";
                echo "<td>";
                echo "<input type=submit value='BUY AGAIN' style='width:150px;height:40px;font-size:20px;background:linear-gradient(120deg, #f6d365 0%, #fda085 100%);border:2px solid rgb(252, 103, 49);' >";
                echo "</td>";

                echo "</tr>";
               
                
                // echo "<table style='width:100%;'>";
                echo "<tr style='background-color:rgb(192,192,192);'>";
                echo "<td></td>";
                echo "<td style='font-size:13px;'>";
                echo "<t>ORDER DATE: </t>".$order_date."<br>";
                echo "</td>";
                echo "<td></td>";
                echo "</tr>";
                // echo "</table>";

                // echo "</table>";
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
                echo "</tr>";
                // echo "</table>";
              
            }
            echo "</table>";
            
        }
    mysqli_close($conn);

    ?>