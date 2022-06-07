 <!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function pop()
        {
            console.log("hi");
            document.getElementById('live_search').innerHTML="hello";
        }
    </script>
    -->
<?php
   //  $servername = 'localhost';
   //  $username = 'root';
   //  $password = '';
   //  $dbname = "pharmacy";
   //  $connection = mysqli_connect($servername, $username, $password, $dbname);
      
   // //  Check connection
   //  if(!$connection){
   //      die('Database connection error : ' .mysqli_connect_error());
   //  }
   //  if (isset($_POST['query'])) {
   //      $query = "SELECT * FROM customer WHERE username LIKE '{$_POST['query']}%' LIMIT 100";
   //      $result = mysqli_query($connection, $query);
  
   //    if (mysqli_num_rows($result) > 0) {
   //        while ($res = mysqli_fetch_array($result)) {
   //           echo '<t  style="font-size:20px;color:black;position:fixed;cursor: pointer;" onclick="pop()"><b>'.$res['username'].'</b></t>'.'<br>';
   //      } 
   //    } else {
   //      echo "
   //      <div class='alert alert-danger mt-3 text-center' role='alert'>
   //          username not found
   //      </div>
   //      ";
   //    }
   //  }
    
?>

<!-- </head>
<body>
    
</body>
</html> -->




<!-- echo '<t  style="font-size:20px;position:fixed;cursor: pointer;" onclick="pop()"><b>'.$res['username'].'</b></t>'.'<br>'; -->

<?php
    //Including Database configuration file.
    $con = MySQLi_connect(
        "localhost", //Server host name.
        "root", //Database username.
        "", //Database password.
        "pharmacy" //Database name or anything you would like to call it.
     );
     //Check connection
     if (MySQLi_connect_errno()) {
        echo "Failed to connect to MySQL: " . MySQLi_connect_error();
     }
    //Getting value of "search" variable from "script.js".
    if (isset($_POST['search'])) {
    //Search box value assigning to $Name variable.
       $Name = $_POST['search'];
    //Search query.                                                               
       $Query = "SELECT product_name FROM product WHERE product_name LIKE '%$Name%' LIMIT 5";
    //Query execution
       $ExecQuery = MySQLi_query($con, $Query);
    //Creating unordered list to display result.
       echo '
    <ul>
       ';
       //Fetching result from database.
       while ($Result = MySQLi_fetch_array($ExecQuery)) {
           ?>
       <!-- Creating unordered list items.
            Calling javascript function named as "fill" found in "script.js" file.
            By passing fetched result as parameter. -->
       <li style="font-size:20px;color:black;background-color:white;cursor: pointer;" onclick='fill("<?php echo $Result['product_name']; ?>")'>
       <a>
       <!-- Assigning searched result in "Search box" in "search.php" file. -->
           <?php echo $Result['product_name']; ?>
       </li></a>
       <!-- Below php code is just for closing parenthesis. Don't be confused. -->
       <?php
    }}
    mysqli_close($con);
    ?>
    </ul>