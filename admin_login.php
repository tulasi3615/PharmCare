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

    $mail = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `admin` WHERE email='$mail' AND password='$password'";
    // echo $sql;
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result))
    {
        echo '<script type="text/javascript" language="javascript">
                if(confirm("Logged In Successfully!!"))
                {
                    self.location="admin_start.html";
                }
                </script> ';
    }
    else{
        echo '<script type="text/javascript" language="javascript">
                if(confirm("Email or Username incorrect!!"))
                {
                    self.location="admin_login.html";
                }
                </script> ';
    }

?>