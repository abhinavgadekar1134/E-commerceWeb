<?php
include('header.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Create Account</title>
</head>
<body>
<!-- -----------------------------------------------  -->
<div class="container" style="padding-top: 3rem;">
    <div class="container text-right">   </div>
    
    <div class="card text-center col-sm-4 mx-auto">
        <div class="card-header">
           Create account
        </div>
        <div class="card-body">
           <form class="form col-sm-10 mx-auto" method="POST" enctype="multipart/form-data">
               <input class="form-control" type="text" name="admin_name" placeholder="Enter Your name" required><br><br>
               <input class="form-control" type="text" name="admin_lname" placeholder="Enter Your last name" required><br><br>
               <input class="form-control" type="Email" name="admin_email" placeholder="Enter your Email" required><br><br>
               <input class="form-control" type="password" name="admin_pass" placeholder="Enter your Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required><br><br>
               <input class="form-control" type="password" name="con_pass" placeholder="Confirm password" required><br><br>
               <button  class="btn btn-primary" type="submit" name="submit">Create</button>
           </form>
        </div>
    </div>
</div>
<!-- ------------------------------------------------------------ -->
</body>
</html>

<?php
if (isset($_POST['submit']))
{
  extract($_POST);
  $admin_email = $_POST['admin_email'];
  $admin_pass = $_POST['admin_pass'];
  $admin_name  = $_POST['admin_name'];
  $admin_lname = $_POST['admin_lname'];
  $con_pass = $_POST['con_pass'];
  if($admin_pass == $con_pass)
  {
    $q= "INSERT INTO `admin`( `Email`, `Password`, `Name`, `Last_name`) VALUES ('$admin_email','$admin_pass','$admin_name','$admin_lname')"; 
    mysqli_query($connect,$q);
    echo "<script>";
    echo "window.alert('Account has been created..');";
    echo 'window.location.href="dashboard.php";';
    echo "</script>";
  }
  else {
      echo "<script>";
      echo "window.alert('Password not matched')";
      echo "</script>";

    }  
}
?> 
<?php 
include ('footer.php');
?>