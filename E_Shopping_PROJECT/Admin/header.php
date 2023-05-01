<?php
session_start();
include('include/config.php');
include('log_out.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<body onload="loadstopfn()">
<div id="mainloadingdiv">
    <div class="main-loading-center_div">
      <div class="rotation"></div>
      <h1 class="loading-h1">loading</h1>
    </div>
</div>
<!-------------------------------------- Navbar ---------------------------------------------->
<nav class="navbar sticky-top navbar-expand-lg navbar-light border-bottom border-dark" style="background-color:white">
      <img src="photo/logo/web_logo.png" style="height:50px;" class="rounded-circle">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
       <li class="nav-item active">
          <a class="nav-link" href="dashboard.php"><span class="hover-change">Dashboard</span><span class="sr-only">(current)</span></a>
       </li>
       <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="hover-change">Add Product</span></a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="Add_mobile.php">Mobile</a>
            <a class="dropdown-item" href="Add_laptop.php">Laptop</a>
        </div>
       </li>
       <li class="nav-item">
          <a class="nav-link" href="view_orders.php"><span class="hover-change">View Orders</span></a>
       </li>
       <li class="nav-item">
          <a class="nav-link" href="view_all_admins.php"><span class="hover-change">View All Admins</span></a>
       </li>
    </ul>
    <ul class="navbar-nav " style="margin-right: 80px;">
      <div class="dropdown">
          <li><button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Settings
              </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="change_password.php">Change Password</a>
              <a class="dropdown-item" href="change_username.php">Change Username</a>
              <a class="dropdown-item" href="create_account.php">Create Account</a>
              <form class="form" method="POST" enctype="multipart/form-data">
                <button type="submit" name="log_out" class="btn btn-danger dropdown-item bg-danger">Log out</button>
              </form>
          </div></li>
      </div>
    </ul>
  </div>
</nav>
<!--------------------------------------!!... Navbar ...!!  ---------------------------------------------->
<div class="container text-center">
    <h6 class="colour_animation">Hello <?php  echo $_SESSION['name'];?> ....! </h6>
</div>
<script type="text/javascript">
function loadstopfn(){
    document.getElementById("mainloadingdiv").style.display = "none";
}
  
</script>
</body>
</html>

