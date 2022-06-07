<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product</title>
    <link href="http://designify.me/code-snippets/animated-buttons/css/btns.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,500,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link href="product_style.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    // $(document).ready(function () {
    //     $("#live_search").keyup(function () {
    //         var query = $(this).val();
    //         if (query != "") {
    //             $.ajax({
    //                 url: 'search.php',
    //                 method: 'POST',
    //                 data: {
    //                     query: query
    //                 },
    //                 success: function (data) {
    //                     $('#search_result').html(data);
    //                     $('#search_result').css('display', 'block');

    //                     $("#live_search").focusout(function () {
    //                         $('#search_result').css('display', 'none');
    //                     });
    //                     $("#live_search").focusin(function () {
    //                         $('#search_result').css('display', 'block');
    //                     });
    //                 }
    //             });
    //         } else {
    //             $('#search_result').css('display', 'none');
    //         }
    //     });
    // });
  
//Getting value from "ajax.php".
function fill(Value) {
    //Assigning value to "search" div in "search.php" file.
    $('#search').val(Value);
    //Hiding "display" div in "search.php" file.
    $('#display').hide();
 }
 $(document).ready(function() {
    //On pressing a key on "Search box" in "search.php" file. This function will be called.
    $("#search").keyup(function() {
        //Assigning search box value to javascript variable named as "name".
        var name = $('#search').val();
        //Validating, if "name" is empty.
        if (name == "") {
            //Assigning empty value to "display" div in "search.php" file.
            $("#display").html("");
        }
        //If name is not empty.
        else {
            //AJAX is called.
            $.ajax({
                //AJAX type is "Post".
                type: "POST",
                //Data will be sent to "ajax.php".
                url: "search.php",
                //Data, that will be sent to "ajax.php".
                data: {
                    //Assigning value of "name" into "search" variable.
                    search: name
                },
                //If result found, this funtion will be called.
                success: function(html) {
                    //Assigning result to "display" div in "search.php" file.
                    $("#display").html(html).show();
                }
            });
        }
    });
 });
</script>
    
</head>
<body>
    <div style="transform: translateY(-90px);">
    <h1 style="padding:20px;background-color: rgb(43, 40, 40); font-size: 40px;text-align: center;color: rgb(240, 235, 235);font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;"><b>WELCOME TO PHARM CARE!</b></h1>
    <div class="header" style="transform:translateY(-10px);">
        <a href="main.html" class="logo">
            <img class="logo1" src="logo.jpg" alt="Girl in a jacket"/> </a><br><t style="font-size: 28px;color:white;font-family:bold;transform:translateY(-20px);">Hello <?php echo strtoupper($_SESSION["cust_name"]); ?>,</t>
        <div class="header-right">
            
              
        </div>
      </div>
      
      <div class="dropdown" style="transform:translate(20px,-10px);">
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

    <div class="searchbox" style="overflow: hidden;">  
      <form action="find.php" method="post">    
      <input type="text" name="search" id="search" autocomplete="off" placeholder=" Search....">  
      <button type="submit">Search</button> 
      <div id="display"></div>   
      </form>  
  </div>

        <input type="image" class="cartlogo" src="cart_logo.jpg" onclick="func()" style="transform: translate(500px,-82px);" width="70px" height="70px" alt="submit"/>
       
       

        <div style="position: absolute;">
        <h1 style="color: black;font-size: 30px;text-align: center;transform: translate(0px,-63px);"><b>ORDER BY CATEGORY</b></h1>
        <div class="grid-container">
          <div class="item1" style="background-image: url(ayurveda.jpeg);"><button class="bg-text"><t onclick="window.location.href='ayurveda_page.php';" >AYURVEDA</t></button></div>
          <div class="item1" style="background-image: url(health.jpg);"><div class="bg-text">HEALTH-CARE</div></div>
          <div class="item1" style="background-image: url(baby-care.jpg);"><div class="bg-text">BABY-CARE</div></div>  
          <div class="item1" style="background-image: url(immunity.jpg);"><div class="bg-text">IMMUNITY</div></div>
          <div class="item1" style="background-image: url(personal-care.jpg);"><div class="e-bg-text">PERSONAL-CARE</div></div>
          <div class="item1" style="background-image: url(women-care.jpg);"><div class="bg-text">WOMEN-CARE</div></div>
        </div>
      
        <div >
          <form action="upload.php" method="post" enctype="multipart/form-data">  
          <center>
          <div class="presint" style="background-color: rgb(127,255,212);border-top:3px solid grey;border-bottom:3px solid grey;padding:25px;width:100%;height:300px;">
              <label style="font-size: 25px;color:black;"><strong>Having Health Issues??<br>Uplaod Prescription here <br></strong></label><br>
              <label class="custom-file-upload" style="font-size: 25px;"><img src="prescription.jpg" alt="" id="image" style="width: 65px;height:65px;border:2px solid rgb(32,178,170);">
              <br><input type="file" id="myFile" name="file" style="transform: translate(55px,10px);font-size:20px;">
              <input type="submit" value="UPLOAD" id="butsub" style="background-color: black;color:rgb(32,178,170);border-radius: 12px;width:200px;height:50px;transform:translateY(15px);">
              </label>
          </div>
         </center>
        </form>
        </div><br><br><br><br>

        <div class="header" style="color: white;padding: 5px;font-size: 30px;"><div style="transform: translateX(45%);"><b>AYURVEDA</b></div></div>

        <div class="col-xs-12 col-md-6" >
          <!-- First product box start here-->
          <div class="prod-info-main prod-wrap clearfix" style="border: 2px solid rgb(53, 52, 52);">
            <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12">
                  <div class="product-image"> 
                    <img src="immune_aid.jpg" class="img-responsive"> 
                    <span class="tag2 hot">
                      HOT
                    </span> 
                  </div>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12">
                <div class="product-deatil">
                    <form action="buy_now.php" method="post">
                      <input type="hidden" name="product_name" value="immune aid"/>
                    <h5 class="name">
                      <b >
                        IMMUNE AID
                      </b><br>
                      <t name="su ayu">
                        <span>Su Ayu</span>
                      </t>                            
        
                    </h5>
                    <p class="price-container">
                      <span name="cost">Rs.250</span>
                    </p>
                    <span class="tag1"></span> 
                </div>
               
                <div class="description">
                  <p>A Short product description here </p>
                </div>
                <div class="product-info smart-form">
                  <div class="row">
                    <div class="col-md-12"> 
                        <select name="quantity">
                            <option value="1">1</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                          </select>
                      <input type="submit" class="btn btn-danger" value="Buy Now">
                    </form>
                                    <a href="javascript:void(0);" class="btn btn-info">More info</a>
                    </div>
                    <div class="col-md-12">
                      <div class="rating">Rating:
                        <label for="stars-rating-5"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-4"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-3"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-2"><i class="fa fa-star text-warning"></i></label>
                        <label for="stars-rating-1"><i class="fa fa-star text-warning"></i></label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end product -->
        </div>

        <div class="col-xs-12 col-md-6">
          <!-- SEcond product box start here-->
          <div class="prod-info-main prod-wrap clearfix" style="border: 2px solid rgb(53, 52, 52);">
            <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12">
                  <div class="product-image"> 
                    <img src="immune_aid_syrup.jpg" class="img-responsive"> 
                    <span class="tag2 hot">
                      HOT
                    </span> 
                  </div>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12">
                <div class="product-deatil">
                    <form action="buy_now.php" method="post">
                <input type="hidden" name="product_name" value="immune aid syrup"/>

                    <h5 class="name">
                      <b name="immune aid syrup">
                        IMMUNE AID SYRUP
                      </b><br>
                      <t name="gilloy">
                        <span>GILLOY</span>
                      </t>                            
        
                    </h5>
                    <p class="price-container">
                      <span name="cost">RS.199</span>
                    </p>
                    <span class="tag1"></span> 
                </div>
                <div class="description">
                  <p>A Short product description here </p>
                </div>
                <div class="product-info smart-form">
                  <div class="row">
                    <div class="col-md-12"> 
                        <select name="quantity" id="cars">
                            <option value="1">1</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                          </select>
                      <input type="submit" class="btn btn-danger" value="Buy Now">
                    </form>
                                    <a href="javascript:void(0);" class="btn btn-info">More info</a>
                    </div>
                    <div class="col-md-12">
                      <div class="rating">Rating:
                        <label for="stars-rating-5"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-4"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-3"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-2"><i class="fa fa-star text-warning"></i></label>
                        <label for="stars-rating-1"><i class="fa fa-star text-warning"></i></label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end product -->
        </div>

        <div class="col-xs-12 col-md-6">
          <!-- First product box start here-->
          <div class="prod-info-main prod-wrap clearfix" style="border: 2px solid rgb(53, 52, 52);">
            <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12">
                  <div class="product-image"> 
                    <img src="goduchi.jpg" class="img-responsive"> 
                    <span class="tag2 hot">
                      HOT
                    </span> 
                  </div>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12">
                <div class="product-deatil">
                    <form action="buy_now.php" method="post">
                <input type="hidden" name="product_name" value="goduchi"/>

                        <h5 class="name">
                          <b name="goduchi">
                            GODUCHI
                          </b><br>
                          <t name="zandu">
                            <span>ZANDU</span>
                          </t>                            
            
                        </h5>
                        <p class="price-container">
                          <span name="cost">RS.450</span>
                        </p>
                        <span class="tag1"></span> 
                    </div>
                    <div class="description">
                      <p>A Short product description here </p>
                    </div>
                    <div class="product-info smart-form">
                      <div class="row">
                        <div class="col-md-12"> 
                            <select name="quantity" id="cars">
                                <option value="1">1</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                
                              </select>
                          <input type="submit" class="btn btn-danger" value="Buy Now">
                        </form>
                                    <a href="javascript:void(0);" class="btn btn-info">More info</a>
                    </div>
                    <div class="col-md-12">
                      <div class="rating">Rating:
                        <label for="stars-rating-5"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-4"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-3"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-2"><i class="fa fa-star text-warning"></i></label>
                        <label for="stars-rating-1"><i class="fa fa-star text-warning"></i></label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end product -->
        </div>

        <div class="col-xs-12 col-md-6">
          <!-- First product box start here-->
          <div class="prod-info-main prod-wrap clearfix" style="border: 2px solid rgb(53, 52, 52);">
            <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12">
                  <div class="product-image"> 
                    <img src="immunity_booster_capsules.jpg" class="img-responsive"> 
                    <span class="tag2 hot">
                      HOT
                    </span> 
                  </div>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12">
                <div class="product-deatil">
                    <form action="buy_now.php" method="post">
                <input type="hidden" name="product_name" value="immunity booster capsules"/>

                        <h5 class="name">
                          <b name="immunity booster capsules">
                            IMMUNITY BOOSTER CAPSULES
                          </b><br>
                          <t name="herbalvilla">
                            <span>HERBALVILLA</span>
                          </t>                            
            
                        </h5>
                        <p class="price-container">
                          <span name="cost">RS.599</span>
                        </p>
                        <span class="tag1"></span> 
                    </div>
                    <div class="description">
                      <p>A Short product description here </p>
                    </div>
                    <div class="product-info smart-form">
                      <div class="row">
                        <div class="col-md-12"> 
                            <select name="quantity" id="cars">
                                <option value="1">1</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                
                              </select>
                          <input type="submit" class="btn btn-danger" value="Buy Now">
                        </form>
                                    <a href="javascript:void(0);" class="btn btn-info">More info</a>
                    </div>
                    <div class="col-md-12">
                      <div class="rating">Rating:
                        <label for="stars-rating-5"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-4"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-3"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-2"><i class="fa fa-star text-warning"></i></label>
                        <label for="stars-rating-1"><i class="fa fa-star text-warning"></i></label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end product -->
        </div>

  
  
        <div style="width: 300px;transform: translateX(550px);"> <a href="#" class="btn btn-sm animated-button victoria-one"><t style="color: black;">View More>>></t></a> </div>
        <br>
        <div class="header" style="color: white;padding: 5px;font-size: 30px;"><div style="transform: translateX(45%);"><b>BABY-CARE</b></div></div>
        <div class="col-xs-12 col-md-6">
          <!-- First product box start here-->
          <div class="prod-info-main prod-wrap clearfix">
            <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12">
                  <div class="product-image"> 
                    <img src="baby1.jpg" class="img-responsive"> 
                    <span class="tag2 hot">
                      HOT
                    </span> 
                  </div>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12">
                <div class="product-deatil">
                    <h5 class="name">
                      <a href="#">
                        Product Code/Name here
                      </a>
                      <a href="#">
                        <span>Product Category</span>
                      </a>                            
        
                    </h5>
                    <p class="price-container">
                      <span>Rs.250</span>
                    </p>
                    <span class="tag1"></span> 
                </div>
                <div class="description">
                  <p>A Short product description here </p>
                </div>
                <div class="product-info smart-form">
                  <div class="row">
                    <div class="col-md-12"> 
                      <a href="javascript:void(0);" class="btn btn-danger">Add to cart</a>
                                    <a href="javascript:void(0);" class="btn btn-info">More info</a>
                    </div>
                    <div class="col-md-12">
                      <div class="rating">Rating:
                        <label for="stars-rating-5"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-4"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-3"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-2"><i class="fa fa-star text-warning"></i></label>
                        <label for="stars-rating-1"><i class="fa fa-star text-warning"></i></label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end product -->
        </div>

        <div class="col-xs-12 col-md-6">
          <!-- SEcond product box start here-->
          <div class="prod-info-main prod-wrap clearfix">
            <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12">
                  <div class="product-image"> 
                    <img src="baby2.jpg" class="img-responsive"> 
                    <span class="tag2 hot">
                      HOT
                    </span> 
                  </div>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12">
                <div class="product-deatil">
                    <h5 class="name">
                      <a href="#">
                        Product Code/Name here
                      </a>
                      <a href="#">
                        <span>Product Category</span>
                      </a>                            
        
                    </h5>
                    <p class="price-container">
                      <span>RS.199</span>
                    </p>
                    <span class="tag1"></span> 
                </div>
                <div class="description">
                  <p>A Short product description here </p>
                </div>
                <div class="product-info smart-form">
                  <div class="row">
                    <div class="col-md-12"> 
                      <a href="javascript:void(0);" class="btn btn-danger">Add to cart</a>
                                    <a href="javascript:void(0);" class="btn btn-info">More info</a>
                    </div>
                    <div class="col-md-12">
                      <div class="rating">Rating:
                        <label for="stars-rating-5"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-4"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-3"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-2"><i class="fa fa-star text-warning"></i></label>
                        <label for="stars-rating-1"><i class="fa fa-star text-warning"></i></label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end product -->
        </div>

        <div class="col-xs-12 col-md-6">
          <!-- First product box start here-->
          <div class="prod-info-main prod-wrap clearfix">
            <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12">
                  <div class="product-image"> 
                    <img src="baby3.jpg" class="img-responsive"> 
                    <span class="tag2 hot">
                      HOT
                    </span> 
                  </div>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12">
                <div class="product-deatil">
                    <h5 class="name">
                      <a href="#">
                        Product Code/Name here
                      </a>
                      <a href="#">
                        <span>Product Category</span>
                      </a>                            
        
                    </h5>
                    <p class="price-container">
                      <span>Rs.450</span>
                    </p>
                    <span class="tag1"></span> 
                </div>
                <div class="description">
                  <p>A Short product description here </p>
                </div>
                <div class="product-info smart-form">
                  <div class="row">
                    <div class="col-md-12"> 
                      <a href="javascript:void(0);" class="btn btn-danger">Add to cart</a>
                                    <a href="javascript:void(0);" class="btn btn-info">More info</a>
                    </div>
                    <div class="col-md-12">
                      <div class="rating">Rating:
                        <label for="stars-rating-5"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-4"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-3"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-2"><i class="fa fa-star text-warning"></i></label>
                        <label for="stars-rating-1"><i class="fa fa-star text-warning"></i></label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end product -->
        </div>

        <div class="col-xs-12 col-md-6">
          <!-- First product box start here-->
          <div class="prod-info-main prod-wrap clearfix">
            <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12">
                  <div class="product-image"> 
                    <img src="baby4.jpg" class="img-responsive"> 
                    <span class="tag2 hot">
                      HOT
                    </span> 
                  </div>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12">
                <div class="product-deatil">
                    <h5 class="name">
                      <a href="#">
                        Product Code/Name here
                      </a>
                      <a href="#">
                        <span>Product Category</span>
                      </a>                            
        
                    </h5>
                    <p class="price-container">
                      <span>Rs.599</span>
                    </p>
                    <span class="tag1"></span> 
                </div>
                <div class="description">
                  <p>A Short product description here </p>
                </div>
                <div class="product-info smart-form">
                  <div class="row">
                    <div class="col-md-12"> 
                      <a href="javascript:void(0);" class="btn btn-danger">Add to cart</a>
                                    <a href="javascript:void(0);" class="btn btn-info">More info</a>
                    </div>
                    <div class="col-md-12">
                      <div class="rating">Rating:
                        <label for="stars-rating-5"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-4"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-3"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-2"><i class="fa fa-star text-warning"></i></label>
                        <label for="stars-rating-1"><i class="fa fa-star text-warning"></i></label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end product -->
        </div>

        <div style="width: 300px;transform: translateX(550px);"> <a href="#" class="btn btn-sm animated-button victoria-one"><t style="color: black;">View More>>></t></a> </div>
        <br>
        <div class="header" style="color: white;padding: 5px;font-size: 30px;"><div style="transform: translateX(45%);"><b>HEALTH-CARE</b></div></div>

        <div class="col-xs-12 col-md-6">
          <!-- First product box start here-->
          <div class="prod-info-main prod-wrap clearfix">
            <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12">
                  <div class="product-image"> 
                    <img src="health1.jpg" class="img-responsive"> 
                    <span class="tag2 hot">
                      HOT
                    </span> 
                  </div>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12">
                <div class="product-deatil">
                    <h5 class="name">
                      <a href="#">
                        Product Code/Name here
                      </a>
                      <a href="#">
                        <span>Product Category</span>
                      </a>                            
        
                    </h5>
                    <p class="price-container">
                      <span>Rs.250</span>
                    </p>
                    <span class="tag1"></span> 
                </div>
                <div class="description">
                  <p>A Short product description here </p>
                </div>
                <div class="product-info smart-form">
                  <div class="row">
                    <div class="col-md-12"> 
                      <a href="javascript:void(0);" class="btn btn-danger">Add to cart</a>
                                    <a href="javascript:void(0);" class="btn btn-info">More info</a>
                    </div>
                    <div class="col-md-12">
                      <div class="rating">Rating:
                        <label for="stars-rating-5"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-4"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-3"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-2"><i class="fa fa-star text-warning"></i></label>
                        <label for="stars-rating-1"><i class="fa fa-star text-warning"></i></label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end product -->
        </div>

        <div class="col-xs-12 col-md-6">
          <!-- SEcond product box start here-->
          <div class="prod-info-main prod-wrap clearfix">
            <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12">
                  <div class="product-image"> 
                    <img src="health2.jpg" class="img-responsive"> 
                    <span class="tag2 hot">
                      HOT
                    </span> 
                  </div>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12">
                <div class="product-deatil">
                    <h5 class="name">
                      <a href="#">
                        Product Code/Name here
                      </a>
                      <a href="#">
                        <span>Product Category</span>
                      </a>                            
        
                    </h5>
                    <p class="price-container">
                      <span>RS.199</span>
                    </p>
                    <span class="tag1"></span> 
                </div>
                <div class="description">
                  <p>A Short product description here </p>
                </div>
                <div class="product-info smart-form">
                  <div class="row">
                    <div class="col-md-12"> 
                      <a href="javascript:void(0);" class="btn btn-danger">Add to cart</a>
                                    <a href="javascript:void(0);" class="btn btn-info">More info</a>
                    </div>
                    <div class="col-md-12">
                      <div class="rating">Rating:
                        <label for="stars-rating-5"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-4"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-3"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-2"><i class="fa fa-star text-warning"></i></label>
                        <label for="stars-rating-1"><i class="fa fa-star text-warning"></i></label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end product -->
        </div>

        <div class="col-xs-12 col-md-6">
          <!-- First product box start here-->
          <div class="prod-info-main prod-wrap clearfix">
            <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12">
                  <div class="product-image"> 
                    <img src="health3.jpg" class="img-responsive"> 
                    <span class="tag2 hot">
                      HOT
                    </span> 
                  </div>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12">
                <div class="product-deatil">
                    <h5 class="name">
                      <a href="#">
                        Product Code/Name here
                      </a>
                      <a href="#">
                        <span>Product Category</span>
                      </a>                            
        
                    </h5>
                    <p class="price-container">
                      <span>Rs.450</span>
                    </p>
                    <span class="tag1"></span> 
                </div>
                <div class="description">
                  <p>A Short product description here </p>
                </div>
                <div class="product-info smart-form">
                  <div class="row">
                    <div class="col-md-12"> 
                      <a href="javascript:void(0);" class="btn btn-danger">Add to cart</a>
                                    <a href="javascript:void(0);" class="btn btn-info">More info</a>
                    </div>
                    <div class="col-md-12">
                      <div class="rating">Rating:
                        <label for="stars-rating-5"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-4"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-3"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-2"><i class="fa fa-star text-warning"></i></label>
                        <label for="stars-rating-1"><i class="fa fa-star text-warning"></i></label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end product -->
        </div>

        <div class="col-xs-12 col-md-6">
          <!-- First product box start here-->
          <div class="prod-info-main prod-wrap clearfix">
            <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12">
                  <div class="product-image"> 
                    <img src="health4.jpg" class="img-responsive"> 
                    <span class="tag2 hot">
                      HOT
                    </span> 
                  </div>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12">
                <div class="product-deatil">
                    <h5 class="name">
                      <a href="#">
                        Product Code/Name here
                      </a>
                      <a href="#">
                        <span>Product Category</span>
                      </a>                            
        
                    </h5>
                    <p class="price-container">
                      <span>Rs.599</span>
                    </p>
                    <span class="tag1"></span> 
                </div>
                <div class="description">
                  <p>A Short product description here </p>
                </div>
                <div class="product-info smart-form">
                  <div class="row">
                    <div class="col-md-12"> 
                      <a href="javascript:void(0);" class="btn btn-danger">Add to cart</a>
                                    <a href="javascript:void(0);" class="btn btn-info">More info</a>
                    </div>
                    <div class="col-md-12">
                      <div class="rating">Rating:
                        <label for="stars-rating-5"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-4"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-3"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-2"><i class="fa fa-star text-warning"></i></label>
                        <label for="stars-rating-1"><i class="fa fa-star text-warning"></i></label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end product -->
        </div>
        <div style="width: 300px;transform: translateX(550px);"> <a href="#" class="btn btn-sm animated-button victoria-one"><t style="color: black;">View More>>></t></a> </div>
        <br>
        <div class="header" style="color: white;padding: 5px;font-size: 30px;"><div style="transform: translateX(45%);"><b>IMMUNITY</b></div></div>

        <div class="col-xs-12 col-md-6">
          <!-- First product box start here-->
          <div class="prod-info-main prod-wrap clearfix">
            <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12">
                  <div class="product-image"> 
                    <img src="immunity1.jpg" class="img-responsive"> 
                    <span class="tag2 hot">
                      HOT
                    </span> 
                  </div>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12">
                <div class="product-deatil">
                    <h5 class="name">
                      <a href="#">
                        Product Code/Name here
                      </a>
                      <a href="#">
                        <span>Product Category</span>
                      </a>                            
        
                    </h5>
                    <p class="price-container">
                      <span>Rs.250</span>
                    </p>
                    <span class="tag1"></span> 
                </div>
                <div class="description">
                  <p>A Short product description here </p>
                </div>
                <div class="product-info smart-form">
                  <div class="row">
                    <div class="col-md-12"> 
                      <a href="javascript:void(0);" class="btn btn-danger">Add to cart</a>
                                    <a href="javascript:void(0);" class="btn btn-info">More info</a>
                    </div>
                    <div class="col-md-12">
                      <div class="rating">Rating:
                        <label for="stars-rating-5"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-4"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-3"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-2"><i class="fa fa-star text-warning"></i></label>
                        <label for="stars-rating-1"><i class="fa fa-star text-warning"></i></label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end product -->
        </div>

        <div class="col-xs-12 col-md-6">
          <!-- SEcond product box start here-->
          <div class="prod-info-main prod-wrap clearfix">
            <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12">
                  <div class="product-image"> 
                    <img src="immunity2.jpg" class="img-responsive"> 
                    <span class="tag2 hot">
                      HOT
                    </span> 
                  </div>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12">
                <div class="product-deatil">
                    <h5 class="name">
                      <a href="#">
                        Product Code/Name here
                      </a>
                      <a href="#">
                        <span>Product Category</span>
                      </a>                            
        
                    </h5>
                    <p class="price-container">
                      <span>RS.199</span>
                    </p>
                    <span class="tag1"></span> 
                </div>
                <div class="description">
                  <p>A Short product description here </p>
                </div>
                <div class="product-info smart-form">
                  <div class="row">
                    <div class="col-md-12"> 
                      <a href="javascript:void(0);" class="btn btn-danger">Add to cart</a>
                                    <a href="javascript:void(0);" class="btn btn-info">More info</a>
                    </div>
                    <div class="col-md-12">
                      <div class="rating">Rating:
                        <label for="stars-rating-5"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-4"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-3"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-2"><i class="fa fa-star text-warning"></i></label>
                        <label for="stars-rating-1"><i class="fa fa-star text-warning"></i></label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end product -->
        </div>

        <div class="col-xs-12 col-md-6">
          <!-- First product box start here-->
          <div class="prod-info-main prod-wrap clearfix">
            <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12">
                  <div class="product-image"> 
                    <img src="immunity3.jpg" class="img-responsive"> 
                    <span class="tag2 hot">
                      HOT
                    </span> 
                  </div>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12">
                <div class="product-deatil">
                    <h5 class="name">
                      <a href="#">
                        Product Code/Name here
                      </a>
                      <a href="#">
                        <span>Product Category</span>
                      </a>                            
        
                    </h5>
                    <p class="price-container">
                      <span>Rs.450</span>
                    </p>
                    <span class="tag1"></span> 
                </div>
                <div class="description">
                  <p>A Short product description here </p>
                </div>
                <div class="product-info smart-form">
                  <div class="row">
                    <div class="col-md-12"> 
                      <a href="javascript:void(0);" class="btn btn-danger">Add to cart</a>
                                    <a href="javascript:void(0);" class="btn btn-info">More info</a>
                    </div>
                    <div class="col-md-12">
                      <div class="rating">Rating:
                        <label for="stars-rating-5"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-4"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-3"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-2"><i class="fa fa-star text-warning"></i></label>
                        <label for="stars-rating-1"><i class="fa fa-star text-warning"></i></label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end product -->
        </div>

        <div class="col-xs-12 col-md-6">
          <!-- First product box start here-->
          <div class="prod-info-main prod-wrap clearfix">
            <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12">
                  <div class="product-image"> 
                    <img src="immunity4.jpg" class="img-responsive"> 
                    <span class="tag2 hot">
                      HOT
                    </span> 
                  </div>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12">
                <div class="product-deatil">
                    <h5 class="name">
                      <a href="#">
                        Product Code/Name here
                      </a>
                      <a href="#">
                        <span>Product Category</span>
                      </a>                            
        
                    </h5>
                    <p class="price-container">
                      <span>Rs.599</span>
                    </p>
                    <span class="tag1"></span> 
                </div>
                <div class="description">
                  <p>A Short product description here </p>
                </div>
                <div class="product-info smart-form">
                  <div class="row">
                    <div class="col-md-12"> 
                      <a href="javascript:void(0);" class="btn btn-danger">Add to cart</a>
                                    <a href="javascript:void(0);" class="btn btn-info">More info</a>
                    </div>
                    <div class="col-md-12">
                      <div class="rating">Rating:
                        <label for="stars-rating-5"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-4"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-3"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-2"><i class="fa fa-star text-warning"></i></label>
                        <label for="stars-rating-1"><i class="fa fa-star text-warning"></i></label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end product -->
        </div>
        <div style="width: 300px;transform: translateX(550px);"> <a href="#" class="btn btn-sm animated-button victoria-one"><t style="color: black;">View More>>></t></a> </div>
        <br>
        <div class="header" style="color: white;padding: 5px;font-size: 30px;"><div style="transform: translateX(45%);"><b>PERSONAL-CARE</b></div></div>

        <div class="col-xs-12 col-md-6">
          <!-- First product box start here-->
          <div class="prod-info-main prod-wrap clearfix">
            <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12">
                  <div class="product-image"> 
                    <img src="per1.jpg" class="img-responsive"> 
                    <span class="tag2 hot">
                      HOT
                    </span> 
                  </div>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12">
                <div class="product-deatil">
                    <h5 class="name">
                      <a href="#">
                        Product Code/Name here
                      </a>
                      <a href="#">
                        <span>Product Category</span>
                      </a>                            
        
                    </h5>
                    <p class="price-container">
                      <span>Rs.250</span>
                    </p>
                    <span class="tag1"></span> 
                </div>
                <div class="description">
                  <p>A Short product description here </p>
                </div>
                <div class="product-info smart-form">
                  <div class="row">
                    <div class="col-md-12"> 
                      <a href="javascript:void(0);" class="btn btn-danger">Add to cart</a>
                                    <a href="javascript:void(0);" class="btn btn-info">More info</a>
                    </div>
                    <div class="col-md-12">
                      <div class="rating">Rating:
                        <label for="stars-rating-5"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-4"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-3"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-2"><i class="fa fa-star text-warning"></i></label>
                        <label for="stars-rating-1"><i class="fa fa-star text-warning"></i></label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end product -->
        </div>

        <div class="col-xs-12 col-md-6">
          <!-- SEcond product box start here-->
          <div class="prod-info-main prod-wrap clearfix">
            <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12">
                  <div class="product-image"> 
                    <img src="per2.jpg" class="img-responsive"> 
                    <span class="tag2 hot">
                      HOT
                    </span> 
                  </div>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12">
                <div class="product-deatil">
                    <h5 class="name">
                      <a href="#">
                        Product Code/Name here
                      </a>
                      <a href="#">
                        <span>Product Category</span>
                      </a>                            
        
                    </h5>
                    <p class="price-container">
                      <span>RS.199</span>
                    </p>
                    <span class="tag1"></span> 
                </div>
                <div class="description">
                  <p>A Short product description here </p>
                </div>
                <div class="product-info smart-form">
                  <div class="row">
                    <div class="col-md-12"> 
                      <a href="javascript:void(0);" class="btn btn-danger">Add to cart</a>
                                    <a href="javascript:void(0);" class="btn btn-info">More info</a>
                    </div>
                    <div class="col-md-12">
                      <div class="rating">Rating:
                        <label for="stars-rating-5"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-4"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-3"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-2"><i class="fa fa-star text-warning"></i></label>
                        <label for="stars-rating-1"><i class="fa fa-star text-warning"></i></label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end product -->
        </div>

        <div class="col-xs-12 col-md-6">
          <!-- First product box start here-->
          <div class="prod-info-main prod-wrap clearfix">
            <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12">
                  <div class="product-image"> 
                    <img src="per3.jpg" class="img-responsive"> 
                    <span class="tag2 hot">
                      HOT
                    </span> 
                  </div>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12">
                <div class="product-deatil">
                    <h5 class="name">
                      <a href="#">
                        Product Code/Name here
                      </a>
                      <a href="#">
                        <span>Product Category</span>
                      </a>                            
        
                    </h5>
                    <p class="price-container">
                      <span>Rs.450</span>
                    </p>
                    <span class="tag1"></span> 
                </div>
                <div class="description">
                  <p>A Short product description here </p>
                </div>
                <div class="product-info smart-form">
                  <div class="row">
                    <div class="col-md-12"> 
                      <a href="javascript:void(0);" class="btn btn-danger">Add to cart</a>
                                    <a href="javascript:void(0);" class="btn btn-info">More info</a>
                    </div>
                    <div class="col-md-12">
                      <div class="rating">Rating:
                        <label for="stars-rating-5"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-4"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-3"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-2"><i class="fa fa-star text-warning"></i></label>
                        <label for="stars-rating-1"><i class="fa fa-star text-warning"></i></label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end product -->
        </div>

        <div class="col-xs-12 col-md-6">
          <!-- First product box start here-->
          <div class="prod-info-main prod-wrap clearfix">
            <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12">
                  <div class="product-image"> 
                    <img src="per4.jpg" class="img-responsive"> 
                    <span class="tag2 hot">
                      HOT
                    </span> 
                  </div>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12">
                <div class="product-deatil">
                    <h5 class="name">
                      <a href="#">
                        Product Code/Name here
                      </a>
                      <a href="#">
                        <span>Product Category</span>
                      </a>                            
        
                    </h5>
                    <p class="price-container">
                      <span>Rs.599</span>
                    </p>
                    <span class="tag1"></span> 
                </div>
                <div class="description">
                  <p>A Short product description here </p>
                </div>
                <div class="product-info smart-form">
                  <div class="row">
                    <div class="col-md-12"> 
                      <a href="javascript:void(0);" class="btn btn-danger">Add to cart</a>
                                    <a href="javascript:void(0);" class="btn btn-info">More info</a>
                    </div>
                    <div class="col-md-12">
                      <div class="rating">Rating:
                        <label for="stars-rating-5"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-4"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-3"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-2"><i class="fa fa-star text-warning"></i></label>
                        <label for="stars-rating-1"><i class="fa fa-star text-warning"></i></label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end product -->
        </div>
        <div style="width: 300px;transform: translateX(550px);"> <a href="#" class="btn btn-sm animated-button victoria-one"><t style="color: black;">View More>>></t></a> </div>
        <br>
        <div class="header" style="color: white;padding: 5px;font-size: 30px;"><div style="transform: translateX(45%);"><b>WOMEN-CARE</b></div></div>

        <div class="col-xs-12 col-md-6">
          <!-- First product box start here-->
          <div class="prod-info-main prod-wrap clearfix">
            <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12">
                  <div class="product-image"> 
                    <img src="wom1.jpg" class="img-responsive"> 
                    <span class="tag2 hot">
                      HOT
                    </span> 
                  </div>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12">
                <div class="product-deatil">
                    <h5 class="name">
                      <a href="#">
                        Product Code/Name here
                      </a>
                      <a href="#">
                        <span>Product Category</span>
                      </a>                            
        
                    </h5>
                    <p class="price-container">
                      <span>Rs.250</span>
                    </p>
                    <span class="tag1"></span> 
                </div>
                <div class="description">
                  <p>A Short product description here </p>
                </div>
                <div class="product-info smart-form">
                  <div class="row">
                    <div class="col-md-12"> 
                      <a href="javascript:void(0);" class="btn btn-danger">Add to cart</a>
                                    <a href="javascript:void(0);" class="btn btn-info">More info</a>
                    </div>
                    <div class="col-md-12">
                      <div class="rating">Rating:
                        <label for="stars-rating-5"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-4"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-3"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-2"><i class="fa fa-star text-warning"></i></label>
                        <label for="stars-rating-1"><i class="fa fa-star text-warning"></i></label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end product -->
        </div>

        <div class="col-xs-12 col-md-6">
          <!-- SEcond product box start here-->
          <div class="prod-info-main prod-wrap clearfix">
            <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12">
                  <div class="product-image"> 
                    <img src="wom2.jpg" class="img-responsive"> 
                    <span class="tag2 hot">
                      HOT
                    </span> 
                  </div>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12">
                <div class="product-deatil">
                    <h5 class="name">
                      <a href="#">
                        Product Code/Name here
                      </a>
                      <a href="#">
                        <span>Product Category</span>
                      </a>                            
        
                    </h5>
                    <p class="price-container">
                      <span>RS.199</span>
                    </p>
                    <span class="tag1"></span> 
                </div>
                <div class="description">
                  <p>A Short product description here </p>
                </div>
                <div class="product-info smart-form">
                  <div class="row">
                    <div class="col-md-12"> 
                      <a href="javascript:void(0);" class="btn btn-danger">Add to cart</a>
                                    <a href="javascript:void(0);" class="btn btn-info">More info</a>
                    </div>
                    <div class="col-md-12">
                      <div class="rating">Rating:
                        <label for="stars-rating-5"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-4"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-3"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-2"><i class="fa fa-star text-warning"></i></label>
                        <label for="stars-rating-1"><i class="fa fa-star text-warning"></i></label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end product -->
        </div>

        <div class="col-xs-12 col-md-6">
          <!-- First product box start here-->
          <div class="prod-info-main prod-wrap clearfix">
            <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12">
                  <div class="product-image"> 
                    <img src="wom3.jpg" class="img-responsive"> 
                    <span class="tag2 hot">
                      HOT
                    </span> 
                  </div>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12">
                <div class="product-deatil">
                    <h5 class="name">
                      <a href="#">
                        Product Code/Name here
                      </a>
                      <a href="#">
                        <span>Product Category</span>
                      </a>                            
        
                    </h5>
                    <p class="price-container">
                      <span>Rs.450</span>
                    </p>
                    <span class="tag1"></span> 
                </div>
                <div class="description">
                  <p>A Short product description here </p>
                </div>
                <div class="product-info smart-form">
                  <div class="row">
                    <div class="col-md-12"> 
                      <a href="javascript:void(0);" class="btn btn-danger">Add to cart</a>
                                    <a href="javascript:void(0);" class="btn btn-info">More info</a>
                    </div>
                    <div class="col-md-12">
                      <div class="rating">Rating:
                        <label for="stars-rating-5"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-4"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-3"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-2"><i class="fa fa-star text-warning"></i></label>
                        <label for="stars-rating-1"><i class="fa fa-star text-warning"></i></label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end product -->
        </div>

        <div class="col-xs-12 col-md-6">
          <!-- First product box start here-->
          <div class="prod-info-main prod-wrap clearfix">
            <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12">
                  <div class="product-image"> 
                    <img src="wom4.jpg" class="img-responsive"> 
                    <span class="tag2 hot">
                      HOT
                    </span> 
                  </div>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12">
                <div class="product-deatil">
                    <h5 class="name">
                      <a href="#">
                        Product Code/Name here
                      </a>
                      <a href="#">
                        <span>Product Category</span>
                      </a>                            
        
                    </h5>
                    <p class="price-container">
                      <span>Rs.599</span>
                    </p>
                    <span class="tag1"></span> 
                </div>
                <div class="description">
                  <p>A Short product description here </p>
                </div>
                <div class="product-info smart-form">
                  <div class="row">
                    <div class="col-md-12"> 
                      <a href="javascript:void(0);" class="btn btn-danger">Add to cart</a>
                                    <a href="javascript:void(0);" class="btn btn-info">More info</a>
                    </div>
                    <div class="col-md-12">
                      <div class="rating">Rating:
                        <label for="stars-rating-5"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-4"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-3"><i class="fa fa-star text-danger"></i></label>
                        <label for="stars-rating-2"><i class="fa fa-star text-warning"></i></label>
                        <label for="stars-rating-1"><i class="fa fa-star text-warning"></i></label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end product -->
        </div>

</div>
</div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- <?php
        $cook = strval($_COOKIE['uid']);
    ?> -->

</body>
</html>