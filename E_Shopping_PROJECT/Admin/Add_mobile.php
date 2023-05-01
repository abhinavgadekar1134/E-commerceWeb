<?php
include('header.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Add mobiles</title>
</head>
<body>
<!-- -------------------------------------------------------------------------------------------------- -->
<div class="container">
  <div class="container">
  <br><h3 class="text-center">Mobile Registration</h3><br>
  <div class="container-form">
  <table class="table table-hover">
     <form class="form" method="POST" enctype="multipart/form-data">
      <tr>
        <td><label>Mobile Name</label></td>
        <td><input type="text" name="mo_name" id="mo_name" placeholder="Enter mobile name" required></td>
      </tr>
      <tr>
        <td><label>Mobile Company</label></td>
        <td><input type="text" name="mo_comp" id="mo_comp" placeholder="Enter mobile company" required></td>
      </tr>
      <tr>
        <td><label>Mobile Description</label></td>
        <td><textarea name="mo_desc" id="mo_desc" placeholder="Enter text here..." required></textarea></td>
      </tr>
      <tr>
        <td><label>Price</label></td>
        <td><input type="text" name="mo_pric" id="mo_pric" placeholder="Enter price of mobile" required></td>
      </tr>
      <tr>
        <td><label>Quantity</label></td>
        <td><input type="number" name="mo_quan" id="mo_quan" placeholder="Enter quantity of mobile" required></td>
      </tr>
      <tr>
        <td>Image</td>
        <td><input type="file" name="file" id="file" required></td>
      </tr>
      <tr>
        <td  align="left" colspan="2">
          <input type="submit" name="submit" value="Add" class="btn btn-success"> 
          <a href="Add_mobile.php" class="btn btn-danger">Reset</a></td>
      </tr>
       </form>
  </table> 
  </div>  
  </div>
</div>
<hr style="border-top: 2px solid black; width: 90%;">
<!-- -------------------------------------------------------------------------------------------------- -->
<?php
  if(isset($_POST['submit']))
  {
    extract($_POST);
    $mo_name = $_POST['mo_name'];
    $mo_comp = $_POST['mo_comp'];
    $mo_desc = $_POST['mo_desc'];
    $mo_pric = $_POST['mo_pric'];
    $mo_quan = $_POST['mo_quan'];
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
      $q = "INSERT INTO `mobiles`(`Mobile_name`,`Mobile_company`,`Mobile_description`,`Price`,`Quantity`,`Images`) VALUES ('$mo_name','$mo_comp','$mo_desc','$mo_pric','$mo_quan','upload/$photo')";
        $query = mysqli_query($connect,$q);
        if($q)
        {
            echo "<script>;";
            echo "window.alert('Mobile data inserted successfully...!');";
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
      <th>Mobile Name</th>
      <th>Mobile Company</th>
      <th>Mobile Description</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>Image</th>
      <th>Action</th>
    </tr>
  <?php
    $view = mysqli_query($connect,"select * from mobiles ORDER BY id DESC")or die(mysql_error($connect));
    while ($row = mysqli_fetch_array($view)) {
      extract($row);
          ?>
      <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['Mobile_name']; ?></td>
        <td><?php echo $row['Mobile_company']; ?></td>
        <td><?php echo $row['Mobile_description']; ?></td>
        <td><?php echo $row['Price']; ?></td>
        <td><?php echo $row['Quantity']; ?></td>
        <td><img src="<?php echo $row['Images'];?>" width="100px" height="200px"></td>
        <td>
              <a href="update_pro.php?mob_id=<?php echo $row['id'];?>"><i class="far fa-edit fa-sm"></i></a>
              <a href="delete_pro.php?mob_id=<?php echo $row['id'];?>"><i class="fas fa-trash-alt fa-sm" style="color: red;"></i></a>
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