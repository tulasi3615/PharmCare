<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Updation</title>
	<?php
		$conn = mysqli_connect("localhost", "root", "", "pharmacy");
		
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}

		$id = strval($_SESSION["user_name"]);
        $name = $_POST['namee'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $pincode = intval($_POST['pincode']);

		$sql1 = "SELECT * FROM customer where username='$id'";
		$result1 = mysqli_query($conn,$sql1);
		if(mysqli_num_rows($result1)<=0)
		{
            echo '<script type="text/javascript" language="javascript">
            if(confirm("ID DOESNOT EXIST! PLEASE REGISTER!"))
            {
                self.location="signup.html";
            }
            </script> ';
            exit();
		}
		else{
			$sql1 = "UPDATE customer SET name='$name', email='$email', contact='$contact', address='$address', pincode=$pincode WHERE username='$id'";
            if(mysqli_query($conn, $sql1)){

                echo '<script type="text/javascript" language="javascript">
                if(confirm("UPDATION SUCCESSFULL!"))
                {
                    self.location="product.php";
                }
                </script> ';
                
            } else{
                
                echo "ERROR: Hush! Sorry $sql. "
                    . mysqli_error($conn);
            }
		}
		mysqli_close($conn);


        ?>	
</head>

<body>
	<center>
		

		
		
	</center>
</body>

</html>
