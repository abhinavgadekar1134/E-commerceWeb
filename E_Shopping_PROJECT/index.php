<?php
include('Admin/include/config.php');
include('header.php');
?>
<!DOCTYPE html>
<html>
<head>
	 <title>Login page</title> 
</head>
<body id="scroll-hide" onload="loadstopfn()">
<div id="mainloadingdiv">
    <div class="main-loading-center_div">
      <div class="rotation"></div>
      <h1 class="loading-h1">loading</h1>
    </div>
</div>
<!---------------------------------------------- Carousal--------------------------------------------->
<div class="Carousal__main">
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active" data-interval="1500">
            <img class="d-block w-100" src="Images/Bann1.jpg" alt="First slide">
        </div>
        <div class="carousel-item" data-interval="2000">
            <img class="d-block w-100" src="Images/Bann2.jpg" alt="Second slide">
        </div>
        <div class="carousel-item" data-interval="3000">
            <img class="d-block w-100" src="Images/Bann3.jpg" alt="Third slide">
        </div>
        <div class="carousel-item" data-interval="2000">
            <img class="d-block w-100" src="Images/Bann4.jpg" alt="Third slide">
        </div>
    </div>
    <a style="margin-left: -5px;" class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a style="margin-right: -5px;" class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
</div>
<!------------------------------------- !!....Carousal.....!! -------------------------------------------------->
<!-- ---------------------------------------- MOBILES ------------------------------------------------------- -->
<div class="container--mobiles" id="Mobile_DOWN"> 
<div class="container" style="background-color:#f5fffe;">
    <div class="product--heading">
        <div class="hr--product1"></div>
        <div class="hr--product"></div>
        <div class="he--product">
            <h2> Mobiles :</h2>
        </div>  
    </div>
    <div class="row">
    <?php 
        $view = mysqli_query($connect,"select * from mobiles ORDER BY id DESC")or die(mysql_error($connect));
        $nn = 1;
        while ($row = mysqli_fetch_array($view))
        {
          extract($row);
          ?>
          <div class="col-lg-3 col-sm-6 text-center">
              <form method="POST">
                  <div class="product--main">
                      <img src="Admin/<?php echo $row['Images'] ?>"  class="pro__image">
                      <div class="index--mob--container"><?php echo $row['Mobile_description'] ?></div>
                      <div class="pro_sta_pri">
                          <p>&#11088;&#11088;&#11088;&#11088;</p><p>₹<?php echo $row['Price'] ?></p>
                      </div>
                      <button href="#" type="submit" name="Add_to_cart" class="button btn-success">Add to cart</button>
                      <input type="hidden" name="pro_id" value='<?php echo $row['id'];?>'>
                      <input type="hidden" name="pro_name" value='<?php echo $row['Mobile_name'] ?>'>
                      <input type="hidden" name="pro_image" value='<?php echo $row['Images'];?>'>
                      <input type="hidden" name="pro_description" value='<?php echo $row['Mobile_description'];?>'>
                      <input type="hidden" name="pro_price" value='<?php echo $row['Price'];?>'>
                  </div>
              </form>
          </div>
          <?php 
              if($nn % 4 == 0)
              {
                  ?>
                  </div>
                  <div class="row">
                  <?php    
              }
              $nn++;
        }
    ?>
</div>
</div>
</div>
<!-- -------------------------------------!!...MOBILES....!! ------------------------------------------------ -->
<div class="join-im py-sm-5 py-4" style="margin-top: 100px;">
        <div class="container py-xl-4 py-lg-2 container-adv">
            <div class="row">
                <div class="col-lg-6">
                    <a >
                        <div class="join-agile text-left p-4">
                            <div class="row">
                                <div class="col-sm-7 offer-name">
                                    <h6>New Collections, New Trendy</h6>
                                    <h4 class="mb-3">Smart Watches</h4>
                                    <p>Sale up to 25% off all in store</p>
                                </div>
                                <div class="col-sm-5 offerimg-w3l">
                                    <img src="assests/CSS/off1.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 mt-lg-0 mt-4">
                    <a onclick="mobiles()">
                        <div class="join-agile text-left p-4">
                            <div class="row ">
                                <div class="col-sm-7 offer-name">
                                    <h6>Top Brands, lowest Prices</h6>
                                    <h4 class="mb-3">Smart Phones</h4>
                                    <p>Free shipping order over ₹5000</p>
                                </div>
                                <div class="col-sm-5 offerimg-w3l">
                                    <img src="assests/CSS/566.jpg" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
<!-- ---------------------------------------- LAPTOPS -------------------------------------------------------- -->
<div class="container--mobiles" id="Laptop_DOWN"> 
<div class="container" style="background-color:#f5fffe;">
    <div class="product--heading">
        <div class="hr--product1"></div>
        <div class="hr--product"></div>
        <div class="he--product">
            <h2> Laptops :</h2>
        </div>  
    </div>
    <div class="row">
    <?php 
        $view = mysqli_query($connect,"select * from laptops ORDER BY id DESC")or die(mysql_error($connect));
        $nn = 1;
        while ($row = mysqli_fetch_array($view)) 
        {
            extract($row);
            ?>
            <div class="col-lg-3 col-sm-6 text-center">
                <form method="POST">
                    <div class="product--main">
                        <img src="Admin/<?php echo $row['Images'] ?>"  class="pro__image">
                        <div class="index--lap--container"><?php echo $row['Laptop_description'] ?></div>
                        <div class="pro_sta_pri">
                            <p>&#11088;&#11088;&#11088;&#11088;</p><p>₹<?php echo $row['Price'] ?></p>
                        </div>
                        <button href="#" type="submit" name="Add_to_cart" class="button btn-success">Add to cart</button>
                        <input type="hidden" name="pro_id" value='<?php echo $row['id'];?>'>
                        <input type="hidden" name="pro_name" value='<?php echo $row['Laptop_name'] ?>'>
                        <input type="hidden" name="pro_image" value='<?php echo $row['Images'];?>'>
                        <input type="hidden" name="pro_description"size="256" value='<?php echo $row['Laptop_description'];?>'>
                        <input type="hidden" name="pro_price" value='<?php echo $row['Price'];?>'>
                    </div>
                </form>
            </div>
            <?php 
                if($nn % 4 == 0)
                {
                    ?>
                    </div>
                    <div class="row">
                    <?php    
                        }
                        $nn++;
                }
                    ?>
    </div>
</div>
</div>
<!-- -------------------------------------!!...LAPTOPS....!! ------------------------------------------------ -->
<div style="padding-top: 60px;">
<hr style="width: 50%; border-top: 3px solid gray;">
<h1 class="text-center">Our Top Brands</h1>
  <marquee width="100%" direction="right" height="200px" behavior="scroll" scrollamount="25">
      <img src="Images/companies/apple.png" height="100px" width="300px" style="padding-left: 50px;padding-right:50px ;">
      <img src="Images/companies/mi.png" height="200px" width="300px" style="padding-left: 50px;padding-right:50px ;">
      <img src="Images/companies/realmi.png" height="100px" width="300px" style="padding-left: 50px;padding-right:50px ;">
      <img src="Images/companies/samsung.png" height="100px" width="300px" style="padding-left: 50px;padding-right:50px ;">
      <img src="Images/companies/oppo.png" height="100px" width="300px" style="padding-left: 50px;padding-right:50px ;">
      <img src="Images/companies/dell.png" height="100px" width="300px" style="padding-left: 50px;padding-right:50px ;">
      <img src="Images/companies/hp.png" height="100px" width="300px" style="padding-left: 50px;padding-right:50px ;">
      <img src="Images/companies/lenovo.png" height="100px" width="300px" style="padding-left: 50px;padding-right:50px ;">
  </marquee>
</div>
<!-- -------------------------------------------------------------------------------------------------------- -->

<div class="footer-top-first">
            <div class="container py-5">
                <!-- footer first section -->
                <h2 class="footer-top-head-w3l font-weight-bold mb-3">Electronics :</h2>
                <p class="footer-main mb-4">
                    If you're considering a new laptop, looking for a powerful new car stereo or shopping for a new
                    HDTV, we make it easy to
                    find exactly what you need at a price you can afford. We offer Every Day Low Prices on TVs, laptops,
                    cell phones, tablets
                    and iPads, video games, desktop computers, cameras and camcorders, audio, video and more.</p>
                <!-- //footer first section -->
                <!-- footer second section -->
                
                <div class="row w3l-grids-footer py-sm-4 py-3">
                    <div class="col-md-4 offer-footer">
                        <div class="d-flex align-items-center">
                            <div class="icon-fot">
                                <i class="fas fa-dolly"></i>
                            </div>
                            <div class="text-form-footer ml-3">
                                <h5>Free Shipping</h5>
                                <p>on orders over ₹5000</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 offer-footer my-md-0 my-4">
                        <div class="d-flex align-items-center">
                            <div class="icon-fot">
                                <i class="fas fa-shipping-fast"></i>
                            </div>
                            <div class="text-form-footer ml-3">
                                <h5>Fast Delivery</h5>
                                <p>World Wide</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 offer-footer">
                        <div class="d-flex align-items-center">
                            <div class="icon-fot">
                                <i class="far fa-thumbs-up"></i>
                            </div>
                            <div class="text-form-footer ml-3">
                                <h5>Big Choice</h5>
                                <p>of Products</p>
                            </div>
                        </div>
                    </div>
                </div><!-- //footer second section -->
            </div>
</div>
<!-- --------------------------------------- Intro ------------------------------------------------------------ -->
<div class="what-we-container">
    <div class="row">
        <div class="col-lg-6 col-12">
            <p class="font-size-14 font-rale text-white-50"><h5 class="p__orange">WHAT WE DO?</h5>Our Shop gives you a chance to quickly and easily find the device you want and have it delivered to your home in no time, regardless of your location, as long as it is in one of the countries of the EU.</p>
        </div>
        <div class="col-lg-6 col-12">
            <p class="font-size-14 font-rale text-white-50"><h5 class="p__orange">WHY DO CUSTOMERS LOVE US?</h5>We have been in the business for quite a while now, and it that time we have not only managed to make close relationships with numerous suppliers all over the world, but also to recognize what people need. This means that we are always able to offer all the latest phones, great prices, reliable service, fast delivery and premium customer support.</p> 
        </div>
    </div>
</div>
<!---------------------------------------  !!....Intro.....!! ----------------------------------------------------------->
<?php 
    include('footer.php');
?>
<a href="Cart.php" class="cart--icon" style=""><i class="fas fa-cart-arrow-down fa-3x"></i></a>
</body>
</html>

<?php 

    if(isset($_POST['Add_to_cart']))
    {
      if (isset($_SESSION['cart'])) 
      {
        $myitems = array_column($_SESSION['cart'],'pro_description');
        if(in_array($_POST['pro_description'],$myitems))
        {
          echo "<script>";
          echo "window.alert('Item Already Added');";
          echo "</script>";
        }
        else
        {
          $count = count($_SESSION['cart']);
          $_SESSION['cart'][$count]=array('pro_id'=>$_POST['pro_id'],'pro_name'=>$_POST['pro_name'],'pro_image'=>$_POST['pro_image'],'pro_description'=>$_POST['pro_description'],'pro_price'=>$_POST['pro_price'],'Quantity'=>1);
          echo "<script>";
          echo "window.alert('Item Added To Cart');";
          echo "</script>";
        } 
      }
      else
      {
        $_SESSION['cart'][0]=array('pro_id'=>$_POST['pro_id'],'pro_name'=>$_POST['pro_name'],'pro_image'=>$_POST['pro_image'],'pro_description'=>$_POST['pro_description'],'pro_price'=>$_POST['pro_price'],'Quantity'=>1);
        echo "<script>";
        echo "window.alert('Item Added To Cart');";
        echo "</script>";
      }
    }
?>
