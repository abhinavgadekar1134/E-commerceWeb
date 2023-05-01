<?php 
include('Admin/include/config.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
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
    <!-- User defines -->
        <link rel="stylesheet" type="text/css" href="assests/CSS/style.css">
        <script src="assests/Javascript/myscript.js"></script>
</head>
<body>
  <!--------------------------------------- Navbar ----------------------------------------------------->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img src="Images/Logo/web_logo.png" width="60" height="60" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="container">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav--margin nav-item active" >
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav--margin nav-item dropdown" >
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Products
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <table>
              <tr>
                <td><a class="dropdown-item" href="#">Bets Sellers</a></td>
                <td><a class="dropdown-item" href="#">Fashion</a></td>
              </tr>
              <tr>
                <td><a class="dropdown-item" href="#">Electronics</a></td>
                <td><a class="dropdown-item" href="#">Computers</a></td>
              </tr>
              <tr>
                <td><a class="dropdown-item" href="#">New releases</a></td>
                <td><a class="dropdown-item" href="#">Today`s Deals</a></td>
              </tr>
              <tr>
                <td><a class="dropdown-item" href="#">Home & Kitchen</a></td>
                <td><a class="dropdown-item" href="#">Books</a></td>
              </tr>
              <tr>
                <td><a class="dropdown-item" href="#">Toys</a></td>
                <td><a class="dropdown-item" href="#">Sports</a></td>
              </tr>
              <tr>
                <td><a class="dropdown-item" href="#">Grocerry</a></td>
                <td><a class="dropdown-item" href="#">Health</a></td>
              </tr>
              <tr>
                <td><a class="dropdown-item" href="#">Kids</a></td>
                <td><a class="dropdown-item" href="#">kitchen</a></td>
              </tr>
              <tr>
                <td><a class="dropdown-item" href="#">Grocerry</a></td>
                <td><a class="dropdown-item" href="#">Health</a></td>
              </tr>
          </table>
        </div>
      </li>
      <li class="nav--margin nav-item" >
          <a class="nav-link" onclick="mobiles()">Mobiles</a>
      </li>
      <li class="nav--margin nav-item" >
          <a class="nav-link" onclick="laptops()">Laptops</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
  </div>
</nav>
<!-------------------------------- !!...Navbar...!! -------------------------------------------------->
<?php  
$count = 0;
if (isset($_SESSION['cart'])) {
	$count = count($_SESSION['cart']);
}
?>
</body>
</html>
