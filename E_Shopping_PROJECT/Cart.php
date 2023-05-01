<?php
include('Admin/include/config.php');
include('header.php')
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Cart page</title> 
</head>
<body>
<!-- ------------------------------------------- Insert Into cart -------------------------------------------- -->
<div class="mycontainer">
    <div class="row">
        <div class="col-lg-12 text-center border rounded bg-light my-5">
            <h1>Shopping Cart</h1>
        </div>
        <div class="col-lg-9 col-sm-12">
            <div class="slide-container">
        <div class="cart-table-container">  
            <table class="table table-hover">
              <thead class="text-center">
                <tr>
                  <th scope="col">Serial no.</th>
                  <th scope="col">Image</th>
                  <th scope="col">Description</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                  <th></th>
                </tr>
              </thead>
              <tbody class="text-center">
                 <?php  
                $total = 0;
                if (isset($_SESSION['cart'])) 
                {
                    foreach ($_SESSION['cart'] as $key => $value)
                    {
                        $sr = $key+1;
                        $total=$total+$value['pro_price'];

                    ?>
                            <tr>
                                <td><?php echo $sr; ?></td>
                                <td><img src="Admin/<?php echo $value['pro_image'];?>" height="100" width="100"></td>
                                <td><?php echo $value['pro_description'];?></td>
                                <td><?php echo $value['pro_price']; ?></td>
                                <td>
                                    <form method='POST'>
                                        <input class='text-center' name='Mod_Quantity' onchange='this.form.submit()' type='number' value='<?php echo $value['Quantity'];?>' min='1' max='10'>
                                        <input type='hidden' name='pro_description' value='<?php echo $value['pro_description']; ?>'>
                                    </form>
                                </td>
                                <td>
                                    <form method='POST'>
                                        <button name='Remove_Item' class='btn btn-outline-danger btn-sm'>REMOVE</button>
                                        <input type='hidden' name='pro_description' value='<?php echo $value['pro_description']; ?>'>
                                    </form>    
                                </td>
                            </tr>
                    

        <?php        }
                }    
                ?> 
             
              </tbody>
            </table> 
        </div>               
        </div>
        </div>
        <div class="col-lg-3 col-sm-12">
            <div class="border bg-light rounded p-4">
                <h4>Subtotal(<?php echo $count ?> items) :</h4>
                <h5 class="text-right"><?php echo $total ;?></h5>
                <br>
                <?php 
                    if(isset($_SESSION['cart'])&&count($_SESSION['cart'])>0)
                    {
                ?>
                    <form action="Purchase.php" method="POST">
                    <input type="hidden" name="count" value="<?php echo $count ?>">
                    <div class="form-group">
                        <label>Full name</label>
                        <input type="text" name="fullname" class="form-control" id="exampleInputPassword1" required>
                    </div>
                    <div class="form-group">
                        <label>Phone no</label>
                        <input type="number" name="phone_no" class="form-control" id="exampleInputPassword1" required>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" id="exampleInputPassword1" required>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" name="paymode" type="radio" value="UPI" name="flexRadioDefault" id="flexRadioDefault1" >
                      <label class="form-check-label" for="flexRadioDefault1">
                        UPI/Netbanking
                      </label>
                    </div>
                    <div class="form-check">  
                      <input class="form-check-input" name="paymode" type="radio" value="COD" name="flexRadioDefault" id="flexRadioDefault1" checked>
                      <label class="form-check-label" for="flexRadioDefault1">
                        cash on delivery
                      </label>  
                    </div>                   
                    <button name="purchase" class="btn btn-primary btn-block" value="purchase">Make purchase</button>
                    </form>
                <?php 
                     } 
                ?>
            </div>
        </div>

    </div>
</div>
<div class="footer-top-first">
            <div class="container py-5">
                
                <div class="row w3l-grids-footer py-sm-4 py-3">
                    <div class="col-md-4 offer-footer">
                        <div class="d-flex align-items-center">
                            <div class="icon-fot">
                                <i class="fas fa-dolly"></i>
                            </div>
                            <div class="text-form-footer ml-3">
                                <h4>Free Shipping</h4>
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
                                <h4>Fast Delivery</h4>
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
                                <h4>Big Choice</h4>
                                <p>of Products</p>
                            </div>
                        </div>
                    </div>
                </div><!-- //footer second section -->
            </div>
</div>
<?php 
include('footer.php');
?>
</body>
</html>

<?php 
if(isset($_POST['Remove_Item']))
{
      foreach ($_SESSION['cart'] as $key=>$value) 
      {
        if($value['pro_description']==$_POST['pro_description'])
        {
          unset($_SESSION['cart'][$key]);
          $_SESSION['cart']=array_values($_SESSION['cart']);
          echo "<script>";
          echo 'alert("Item removed");';
          echo "window.location.href='Cart.php';";
          echo "</script>";
        } 
      }
} 
if (isset($_POST['Mod_Quantity']))
{
      foreach ($_SESSION['cart'] as $key=>$value) 
      {
        if($value['pro_description']==$_POST['pro_description'])
        {
          $_SESSION['cart'][$key]['Quantity']=$_POST['Mod_Quantity'];
          echo "<script>";
          echo "window.location.href='Cart.php';";
          echo "</script>";
        }
      }
} 
?>