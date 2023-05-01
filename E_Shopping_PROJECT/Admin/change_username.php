<?php
include('header.php');
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Change Username</title>
</head>
<body>
<!-- -----------------------------------------------  -->
<div class="container" style="padding-top: 3rem;">
    <div class="container text-right">   </div>
    
    <div class="card text-center col-sm-4 mx-auto">
        <div class="card-header">
           Change Username
        </div>
        <div class="card-body">
           <form class="form col-sm-10 mx-auto" method="POST" enctype="multipart/form-data">
               <input class="form-control" type="password" name="passs" placeholder="Enter password" required><br><br>
               <input class="form-control" type="email" name="new_name" placeholder="Enter New username" ><br><br>
               <button  class="btn btn-primary" type="submit" name="submit">Submit</button>
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
    $user =$_SESSION['email'];
    $_SESSION['password'];
     $q = 'select * from admin WHERE `id`="$idd"';
    $query = mysqli_query($connect,$q)or die(mysql_error($connect));
    if(isset($_POST['submit']))
    {
       extract($_POST);
       if($_POST['passs'] == $pass)
       {
          $newname = $_POST['new_name'];
          $q = "UPDATE `admin` SET `Email`='$newname' WHERE $idd";
          $query = mysqli_query($connect,$q);
            echo "<script>";
            echo "window.alert('Username Changed successfully...!');";
            echo 'window.location.href="registrationform.php"';
            echo "</script>";
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