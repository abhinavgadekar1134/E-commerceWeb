<?php 
include('header.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Orders</title>
</head>
<body>
<h2 class="text-center">Orders</h2>	
<div class="container text-center">
  <div class="slide-container">
  <table class="table table-hover table-bordered">
    <thead class="thead-dark">
    <tr>
      <th>Order Id</th>
      <th>Name</th>
      <th>Phone no</th>
      <th>Address</th>
      <th>Pay mode</th>
      <th>Total items</th>
      <th>Date Ordered</th>
      <th>Order Time</th>
      <th>Action</th>
    </tr>
    </thead>
    <?php
        $view = mysqli_query($connect,"select * from order_manager")or die(mysql_error($connect));
        while($row = mysqli_fetch_array($view)){
          extract($row);
          ?>
          <tr>
            <td><?php echo $row['Order_id']; ?></td>
            <td><?php echo $row['Full_name']; ?></td>
            <td><?php echo $row['Phone_no']; ?></td>
            <td><?php echo $row['Address']; ?></td>
            <td><?php echo $row['Pay_mode']; ?></td>
            <td><?php echo $row['Total_items']?></td>
            <td><?php echo $row['Date_Ordered']; ?></td>
            <td><?php echo $row['Time']; ?></td>
          <form method="POST">
          <input type="hidden" name="Order_id" value="<?php echo $row['Order_id']; ?>">
            <td><button class="button btn-light" type="submit" name="delete_order"><i class="fas fa-trash-alt fa-lg" style="color: red; "></i></button></td>

          </form>
          </tr>
    <?php  }
    ?>

  </table>
  </div>
</div>
<div class="container">
  <div class="slide-container">
  <table class="table table-hover table-bordered">
    <thead class="thead-dark">
      <tr>
        <th>Id</th>
        <th>Product name</th>
        <th>Product description</th>
        <th>Product image</th>
        <th>Product price</th>
        <th>Quantity</th>
      </tr>
    </thead>
    </thead>
    <?php
        $view = mysqli_query($connect,"select * from orders")or die(mysql_error($connect));
        while($row = mysqli_fetch_array($view)){
          extract($row);
          ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['Product_name']; ?></td>
            <td><?php echo $row['Product_description']; ?></td>
            <td><?php echo $row['Product_image']; ?></td>
            <td><?php echo $row['Product_price']; ?></td>
            <td><?php echo $row['Quantity']; ?></td>
          </tr>
    <?php  }
    ?>
  </table>
  </div>
</div>
</body>
</html>


<?php 
if (isset($_POST['delete_order'])) 
{
  $Order_id = $_POST['Order_id'];
  $delete = mysqli_query($connect,"DELETE FROM `order_manager` WHERE `Order_id`='$Order_id'");
  $del = mysqli_query($connect,"DELETE FROM `orders` WHERE `id`='$Order_id'");

        if($del && $delete)
        {
          echo "<script>";
          echo "alert('Delete order successfull.......!');";
          echo 'window.location.href= "view_orders.php";';
          echo "</script>";   
        }
        else
        {
            echo "<script>";
            echo "alert('Data error.......!');";
            echo 'window.location.href= "registration_form_view.php";';
            echo "</script>";
        }
 }
?>
<?php 
include('footer.php');
?>