<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php

$conn = mysqli_connect("localhost", "root", "", "pharmacy");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		// Taking all 5 values from the form data(input)


    $username = $_POST['usernamee'];
	$_SESSION["user_name"] = $username;
    $password = $_POST['passwordd'];
	$sql = "SELECT name from customer where username='$username'";
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0)
	{
		while($row=mysqli_fetch_array($result))
		{
			$_SESSION["cust_name"]=$row['name'];
		}
	}
	
		
	
			$sql1 = "SELECT * FROM customer where username='$username'";
			$result = mysqli_query($conn,$sql1);
			// echo mysqli_num_rows($result);
			if(mysqli_num_rows($result))
			{
				$sql = "SELECT password FROM customer where username='$username'";
                $result = mysqli_query($conn,$sql);
				$row = mysqli_fetch_array($result);
                // $pass = password_hash($password,PASSWORD_DEFAULT);
                if(password_verify($password, $row['password']))
                {
                    echo '<script type="text/javascript" language="javascript">
                    if(confirm("Successfully Signed-in!"))
                    {
                        self.location="product.php";
                    }
                    </script> ';
                }
                else{
                    echo '<script type="text/javascript" language="javascript">
                    if(confirm("Incorrect credentials!"))
                    {
                        self.location="signup.html";
                    }
                    </script> ';
                    exit();
                }
			}

			else{

				echo '<script type="text/javascript" language="javascript">
				if(confirm("Username does not exist!Please Sign-Up"))
				{
					self.location="signup.html";
				}
				</script> ';
				exit();
			}
			
			// Close connection
		
		
		mysqli_close($conn);

?>
	<script>
		

	</script>
</head>
<body>
	
</body>
</html>
