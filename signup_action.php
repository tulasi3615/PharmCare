<?php
// Start the session
session_start();
?>
<?php

// if(isset($_POST['signup'])) {
//  require 'database.php';

// $username = $POST['username'];
// $name = $POST['namee'];
// $email = $POST['email'];
// $contact = $POST['contact'];
// $address = $POST['address'];
// $pincode = $POST['pincode'];
// $password = $POST['password'];
// $con_password = $POST['con_password'];

// if($password!=$con_password)
// {
//   exit();
// }
// else{
//   $sql = "SELECT username FROM customer where username = ?";
//   $stmt = mysqli_stmt_init($conn);
//   if(!mysqli_stmt_prepare($stmt,$sql)) {
//     header("Location: ./signup.php?error=sqlerror");
//     exit();
//   }
//   else{
//     mysqli_stmt_bind_param($stmt,"s",$username);
//     mysqli_stmt_execute($stmt);
//     mysqli_stmt_store_result($stmt);
//     $rowCount = mysqli_stmt_num_rows($stmt);

//     if($rowCoutn > 0){
//       header("Location: ./signup.php?error=usernametaken");
//       exit();
//     }
//     else{
//       $sql = "INSERT INTO users (username,name,email,contact,address,pincode,password) VALUES ($username,$name,$email,$contact,$address,$pincode,$password)";
//       $stmt = mysqli_stmt_init($conn);
//       if(!mysqli_stmt_prepare($stmt, $sql)) {
//         header("Location: ./signup.php?error=sqlerror");
//         exit();
//       }
//       else{
//         mysqli_stmt_bind_param($stmt,"ss",$username);
//         mysqli_stmt_execute($stmt);
//         mysqli_stmt_store_result($stmt);
//       }
//     }
//   }
// }


// }

$conn = mysqli_connect("localhost", "root", "", "pharmacy");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		// Taking all 5 values from the form data(input)
		
		
    $username = $_POST['username'];
	$_SESSION["user_name"] = $username;
    $name = $_POST['namee'];
	$_SESSION["cust_name"] = $name;
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $pincode = intval($_POST['pincode']);
    $password = $_POST['password'];
    $con_password = $_POST['con_password'];
		
		// Performing insert query execution
		// here our table name is college
		if($password!=$con_password)
		{
			echo '<script type="text/javascript" language="javascript">
            if(confirm("Passwords do not match!"))
            {
                self.location="signup.html";
            }
            </script> ';
			exit();
		}
		else
		{
			$sql1 = "SELECT * FROM customer where username='$username'";
			$result = mysqli_query($conn,$sql1);
			// echo $result;
			if(mysqli_num_rows($result))
			{
				echo '<script type="text/javascript" language="javascript">
				if(confirm("Username already exists"))
				{
					self.location="signup.html"; 
				}
				</script> ';
				exit();
			}

			else{

				$pass = password_hash($password,PASSWORD_DEFAULT);
				$sql = "INSERT INTO customer (username,name,email,contact,address,pincode,password,prescription) VALUES ('$username',
				'$name','$email','$contact','$address',$pincode,'$pass','not yet uploaded')";
			
				if(mysqli_query($conn, $sql)){
					echo '<script type="text/javascript" language="javascript">
					if(confirm("Successfully signed in!"))
					{
						self.location="product.php";
					}
					</script> ';
				} else{
					echo "ERROR: Hush! Sorry $sql. "
						. mysqli_error($conn);
				}
			
			}
			
			// Close connection
		}
		
		mysqli_close($conn);

?>
