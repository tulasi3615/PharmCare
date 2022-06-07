<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: thistle;
        }
        .internal{
            background-color: coral;
            color: black;
            height: auto;
            width: 700px;
            transform: translateY(-10px);
            padding: 20px;
            border: 4px solid chocolate;
            box-shadow: 25px 15px 20px 0 grey;
        }
.button-73 {
  appearance: none;
  background-color: #FFFFFF;
  border-radius: 40em;
  border-style: none;
  box-shadow: #ADCFFF 0 -12px 6px inset;
  box-sizing: border-box;
  color: #000000;
  cursor: pointer;
  display: inline-block;
  font-family: -apple-system,sans-serif;
  font-size: 1.2rem;
  font-weight: 700;
  letter-spacing: -.24px;
  margin: 0;
  outline: none;
  padding: 1rem 1.3rem;
  quotes: auto;
  text-align: center;
  text-decoration: none;
  transition: all .15s;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-73:hover {
  background-color: greenyellow;
  box-shadow: #FF6314 0 -6px 8px inset;
  transform: scale(1.125);
}

.button-73:active {
  transform: scale(1.025);
}

@media (min-width: 768px) {
  .button-73 {
    font-size: 1.5rem;
    padding: .75rem 2rem;
  }
}
.in{
    height: 50px;
    width: 300px;
    font-size: 23px;
}
h1{
    background-color: black;
    font-size: 50px;
    font-weight: bolder;
    color: white;
    padding: 10px;
    transform: translateY(-33px);
}
    </style>
</head>
<body>
    <center><h1>ADD A NEW PRODUCT</h1></center>
    <div class="main">
        <center>
        <div class="internal">
            <form action="new_product.php" method="post" style="font-size: 28px;text-align: left; font-weight: bold;">
                <br>
                <br>
                Product Name:&emsp;<input type="text" name='pname' placeholder="Product Name" class='in'><br><br>
                Product Cost:&emsp;<input type="text" name='pcost' placeholder="Product Cost" class='in'><br><br>
                Product Count:&emsp;<input type="text" name='pcount' placeholder='Product Count' class='in'><br><br>
                Manufacture Date:&emsp;<input type="date" name='pmfd' placeholder="Manufacture date" class='in'><br><br>
                Expiry Date:&emsp;<input type="date" name="pexp" placeholder="Expiry date" class='in'><br><br>
                Product Company:&emsp;<input type="text" name="company" placeholder="Product Company" class='in'><br><br>
                Product Category:&emsp;<input type="text" name="category" placeholder="Product Category" class='in'><br><br>
                <center><input type="submit" name="addp" value="ADD PRODUCT" class="button-73"></center><br><br>
            </form>
        </div>
    </center>
    </div>
</body>
</html>