<?php
include('header.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Admins</title>
</head>
<body>
<!-- -------------------------------------------------------------------------------------------------- -->
<div class="container">
  <div class="slide-container">
  <table class="table table-hover table-bordered">
    <thead class="thead-dark">
    <tr>
      <th>Sr.No</th>
      <th>Name</th>
      <th>Last Name</th>
      <th>Email ID</th>
      <th>Action</th>
    </tr>
    </thead>
    <?php
        $view = mysqli_query($connect,"select * from admin")or die(mysql_error($connect));
        while($row = mysqli_fetch_array($view)){
          extract($row);
          ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['Name']; ?></td>
            <td><?php echo $row['Last_name']; ?></td>
            <td><?php echo $row['Email']; ?></td>
            <td><a href="delete_admin.php?admin_id=<?php echo $row['id'];?>"><i class="fas fa-trash-alt fa-sm" style="color: red;"></i></a></td>
          </tr>
    <?php  }
    ?>

  </table>
  </div>
</div>

<!-- -------------------------------------------------------------------------------------------------- -->


</body>
</html>
<?php 
include ('footer.php');
?>
