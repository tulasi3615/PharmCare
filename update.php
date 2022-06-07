<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE DETAILS</title>
    <link rel="stylesheet" href="update_style.css">
    <?php
        $conn = mysqli_connect("localhost", "root", "", "pharmacy");
		
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}

    $id = strval($_SESSION["user_name"]);
		$sql1 = "SELECT name,email,contact,address,pincode FROM customer where username='$id'";
		$result1 = mysqli_query($conn,$sql1);
		if(mysqli_num_rows($result1)<=0)
		{
            echo '<script type="text/javascript" language="javascript">
            if(confirm("USERNAME DOESNOT EXIST! PLEASE REGISTER!"))
            {
                self.location="signup.html";
            }
            </script> ';
            exit();
		}
		else{
            while($row = mysqli_fetch_array($result1))
            {
                $namee = $row['name'];
                $emaill = $row['email'];
                $contactt = $row['contact'];
                $address = $row['address'];
                $pincodee = $row['pincode'];
            }
		}
        mysqli_close($conn);
    ?>
    <script>
        function pop() {
    let text;
    let person=parse_str(<?php echo $id;?>);
    if(person== null || person=="")
    {
      text=alert("Cancelled");
    }
    else {
      window.location.href="updation.php";
      document.cookie = "uid="+person;
    }
  }
    </script>
</head>
<body>
    <div class="container" style="transform : translateY(-220px);box-shadow:20px 20px 20px grey;">
    <div class="title"><div style="transform: translateX(100px);color: white;"><b>UPDATE PERSONAL DETAILS</b></div></div>
    <div class="content">
      <form action="updation.php" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Name</span>
            <input type="text" name="namee" value="<?php echo $namee;?>" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" name="email" value="<?php echo $emaill;?>" required>
          </div>
          <div class="input-box">
            <span class="details">Contact</span>
            <input type="text" name="contact" value="<?php echo $contactt;?>" required>
          </div>
          <div class="input-box">
            <span class="details">Address</span>
            <input type="text"  name="address" value="<?php echo $address;?>" required>
          </div>
          <div class="input-box">
            <span class="details">Pincode</span>
            <input type="text"  name="pincode" value="<?php echo $pincodee;?>" required>
        </div>
        <div class="button">
          <input type="submit" name="register" value="    UPDATE>>  ">
        </div>
      </form>
    </div>
  </div>
</body>
</html>