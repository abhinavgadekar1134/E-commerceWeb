<?php
include('header.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add laptos</title>
</head>
<body>
<!-- -------------------------------------------------------------------------------------------------- -->
<div class="container">
  <br><h3 class="text-center">Laptop Registration</h3><br>
  <div class="container-form">
  <table class="table table-hover">
     <form class="form" method="POST" enctype="multipart/form-data">
      <tr>
        <td><label>Laptop Name</label></td>
        <td><input type="text" name="lap_name" id="mo_name" placeholder="Enter laptop name" required></td>
      </tr>
      <tr>
        <td><label>Laptop Company</label></td>
        <td><input type="text" name="lap_comp" id="mo_comp" placeholder="Enter laptop company" required></td>
      </tr>
      <tr>
        <td><label>Laptop Description</label></td>
        <td><textarea name="lap_desc" id="lap_desc" placeholder="Enter text here..." required></textarea></td>
      </tr>
      <tr>
        <td><label>Price</label></td>
        <td><input type="number" name="lap_pric" min="4000" id="mo_pric" placeholder="Enter price of laptop" required></td>
      </tr>
      <tr>
        <td><label>Quantity</label></td>
        <td><input type="number" name="lap_quan" id="mo_quan" placeholder="Enter quantity of laptop" required></td>
      </tr>
      <tr>
        <td>Image</td>
        <td><input type="file" name="file" id="file" required></td>
      </tr>
      <tr>
        <td  align="left" colspan="2">
          <input type="submit" name="submit" value="Add" class="btn btn-success"> 
          <a href="Add_laptop.php" class="btn btn-danger">Reset</a></td>
      </tr>
       </form>
  </table>  
  </div> 
</div>
<hr style="border-top: 2px solid black; width: 90%;">
<!-- -------------------------------------------------------------------------------------------------- -->
<?php
  if(isset($_POST['submit']))
  {
    extract($_POST);
    $lap_name = $_POST['lap_name'];
    $lap_comp = $_POST['lap_comp'];
    $lap_desc = $_POST['lap_desc'];
    $lap_pric = $_POST['lap_pric'];
    $lap_quan = $_POST['lap_quan'];
    $files = $_FILES['file'];    

    $pname = $_FILES['file']['name'];
    $type = $_FILES['file']['type'];
    $size = $_FILES['file']['size'];
    $temp = $_FILES['file']['tmp_name'];
    if ($pname) 
    {
      $upload = 'upload/';
      $imgext =strtolower(pathinfo($pname,PATHINFO_EXTENSION));
      $valid_ext = array('jpg','png','jpeg');
      $photo = rand(100,1000).".".$imgext;
      move_uploaded_file($temp,$upload.$photo);
      $q = "INSERT INTO `laptops`(`Laptop_name`,`Laptop_company`,`Laptop_description`,`Price`,`Quantity`,`Images`) VALUES ('$lap_name','$lap_comp','$lap_desc','$lap_pric','$lap_quan','upload/$photo')";
        $query = mysqli_query($connect,$q);
        if($q)
        {
            echo "<script>;";
            echo "window.alert('Laptop data inserted successfully...!');";
            echo "</script>;";
        } 
        else 
        {
            echo "<script>;";
            echo "window.alert('Data error...!');";
            echo "</script>;";
        }   
    }  
   
  }
?>
<!-- -------------------------------------------------------------------------------------------------- -->
<div class="container">
  <h3 class="text-center">Added Mobiles</h3>
  <div class="slide-container">
  <table class="table table-hover">
    <tr>
      <th>Sr.No</th>
      <th>Laptop Name</th>
      <th>Laptop Company</th>
      <th>Laptop Description</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>Image</th>
      <th>Action</th>
    </tr>
  <?php
    $view = mysqli_query($connect,"select * from laptops ORDER BY id DESC")or die(mysql_error($connect));
    while ($row = mysqli_fetch_array($view)) {
      extract($row);
          ?>
      <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['Laptop_name']; ?></td>
        <td><?php echo $row['Laptop_company']; ?></td>
        <td><?php echo $row['Laptop_description']; ?></td>
        <td><?php echo $row['Price']; ?></td>
        <td><?php echo $row['Quantity']; ?></td>
        <td><img src="<?php echo $row['Images'];?>" width="100px" height="200px"></td>
        <td>
              <a href="update_pro.php?lap_id=<?php echo $row['id'];?>"><i class="far fa-edit fa-sm"></i></a>
              <a href="delete_pro.php?lap_id=<?php echo $row['id'];?>"><i class="fas fa-trash-alt fa-sm" style="color: red;"></i></a>
        </td>
      </tr>        
  <?php } ?>
  </table>
  </div>
</div>
<!-- -------------------------------------------------------------------------------------------------- -->
</body>
</html>
<?php 
include('footer.php');
?>