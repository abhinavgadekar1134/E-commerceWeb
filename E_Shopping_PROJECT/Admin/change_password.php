<?php
include('header.php');
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Change password</title>
</head>
<body>
<!-- -----------------------------------------------  -->
<div class="container" style="padding-top: 3rem;">
    <div class="container text-right">   </div>
    
    <div class="card text-center col-sm-4 mx-auto">
        <div class="card-header">
           Change Password
        </div>
        <div class="card-body">
           <form class="form col-sm-10 mx-auto" method="POST" enctype="multipart/form-data">
               <input class="form-control" type="password" name="old_pass" placeholder="Enter old password" required><br><br>
               <input class="form-control" type="password" name="new_pass" placeholder="Enter new password" required><br><br>
               <input class="form-control" type="password" name="con_pass" placeholder="Confirm password" required><br><br>
               <button  class="btn btn-primary" type="submit" name="submit">Change</button>
           </form>
        </div>
    </div>
</div>
<!-- ------------------------------------------------------------ -->
</body>
</html>
<?php
   if($_SESSION['id'])
 {
    $idd = $_SESSION['id'];
    $pass =$_SESSION['password'];
     $q = 'select * from admin WHERE `id`="$idd"';
    $query = mysqli_query($connect,$q)or die(mysql_error($connect));
    if(isset($_POST['submit']))
    {
       extract($_POST);
       if($_POST['old_pass'] == $pass)
       {
          if($_POST['new_pass']==$_POST['con_pass'])
          {  
          $newpass = $_POST['new_pass'];
          $q = "UPDATE `admin` SET `Password`='$newpass' WHERE $idd";
          $query = mysqli_query($connect,$q);
            echo "<script>";
            echo "window.alert('Password Changed successfully...!');";
            echo 'window.location.href="registrationform.php"';
            echo "</script>";
          }
          else{
            echo "<script>";
            echo "window.alert('Password not matched...!');";
            echo "</script>";
          }
      }
      else
      {
        echo "<script>";
        echo "window.alert('You entered wrong old password..!');";
        echo "</script>";
      }
    }

 }

?> 
<?php 
include ('footer.php');
?>