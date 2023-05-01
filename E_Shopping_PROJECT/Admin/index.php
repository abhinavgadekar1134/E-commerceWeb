<?php
session_start();
include('include/config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login page</title> 
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Font awesome -->
    <script src="https://kit.fontawesome.com/006b0b0b8d.js" crossorigin="anonymous"></script> 
    <link rel="stylesheet" type="text/css" href="assests/css/style.css">  
</head>
<body class="bodyyy">
<div >
<!---------------------------- Card -------------------->
<div class="container margin-top">
  <div class="card text-center bg-rgba col-sm-6 mx-auto border-0 ">
    
    <div class="card-body col-sm-12 mx-auto">
        <div class="col-sm-12 bk-image">
           <h3 style="color:#10ff08; padding-top: 13%;">Sign in to <span style="color:white;">admin</span></h3>       
        </div>
        <div class="card-contant">
        <form class="form-horizontal" method="post">
          <div class="form-group">
              <div class="col-sm-12" style="display:inline-flex">
                  <i class="fas fa-user icon-margin"></i>
                  <input type="email" class="form-control" id="inputEmail3" placeholder="Enter your email" name="email"><br><br>
              </div>
          </div>
          <div class="form-group">
              <div class="col-sm-12" style="display:inline-flex">
                  <i class="fas fa-key icon-margin"></i>
                  <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password"><br><br>
              </div>
          </div>
          <div class="form-group float_submit_btn">
              <div class="col-sm-12">
                  <button type="submit" name="login" class="btn btn-primary">Log in</button>
              </div>
          </div>
        </form>
        </div>
    </div> 
  </div>  
</div>
<!-- ------------------------------------------------ -->
</div>
</body>
</html>

<?php
 if(isset($_POST['login']))
 {
  extract($_POST);
  $email=mysqli_real_escape_string($connect,$_POST['email']);
  $password=mysqli_real_escape_string($connect,$_POST['password']);
  $log=mysqli_query($connect,"select * from admin where Email='$email' and Password='$password'") or die (mysqli_error($connect)); 

  if(mysqli_num_rows($log)>0)
  {
      // extract($_POST);
      $fetch=mysqli_fetch_array($log);
      $_SESSION['id']=$fetch['id'];
      $_SESSION['email']=$fetch['Email'];
      $_SESSION['password']=$fetch['Password'];
      $_SESSION['name']= $fetch['Name'];

      echo "<script>";
      echo 'window.location.href="dashboard.php";';
      echo "</script>";
  }else
  {
      echo "<script>";
      echo "alert('login Failed');";
      echo "</script>";
  }


 }
?> 