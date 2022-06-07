<?php

$name = $_POST['search'];
$product_name = str_replace(' ','_',$name);
// echo $product_name;
// header("Location: ".$product_name.".html");

$url = $product_name.".html";
  
  if(file_exists($url))
  {
      header("Location: ".$url);

  }
  else{
    echo '<script type="text/javascript" language="javascript">
    if(confirm("product does not exist!"))
    {
        self.location="product.php";
    }
    </script> ';
  }
// echo file_exists($url);
?>