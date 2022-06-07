<?php
    session_start();
?>
<?php

$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "pharmacy";


$conn = mysqli_connect($dbHost ,$dbUser ,$dbPass ,$dbName);
$username = $_SESSION["user_name"];
if($conn){
    $targetDir = "/opt/lampp/htdocs/pharmacy_database/uploads/";
    $fileName = basename($_FILES["file"]["name"]);
    // echo $fileName;
    $targetFilePath = $targetDir.$fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    // echo $fileType;
        $allowTypes = array('jpg','png','jpeg');
        if(in_array($fileType, $allowTypes)){
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                $sql= "UPDATE customer SET prescription='$fileName' WHERE username='$username'";
                if(mysqli_query($conn,$sql)){
                    echo '<script type="text/javascript" language="javascript">
                    if(confirm("FILE UPLOADED SUCCESSFULY!!"))
                    {
                        self.location="product.php";
                    }
                    </script> ';
                    }
                    else{
                        echo "SQL error";
                    }
            }
            else{
                echo '<script type="text/javascript" language="javascript">
                    if(confirm("There was an error uploading file!!"))
                    {
                        self.location="product.php";
                    }
                    </script> ';
            }
        }
        else{
            echo '<script type="text/javascript" language="javascript">
            if(confirm("The File extension is not accepted!!"))
            {
                self.location="product.php";
            }
            </script> ';
        }
}
mysqli_close($conn);
?>