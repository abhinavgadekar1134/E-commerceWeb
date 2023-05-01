<?php 
include('header.php');
?>

<!----------------------------------------  MOBILE ------------------------------------------->
<?php 
if(isset($_GET['mob_id']))
{
 	$mob_id = $_GET['mob_id'];
 	$view = mysqli_query($connect,"select * from mobiles WHERE `id` = $mob_id")or die(mysql_error($connect));
 	$row = mysqli_fetch_array($view);
 	extract($row);
   	?>
	<div class="container">
  	<br><h3 class="text-center">Update Mobile</h3><br>
 		<table class="table table-hover">
     		<form class="form" method="POST" enctype="multipart/form-data">
      		<tr>
        		<td><label>Mobile Name</label></td>
        		<td><input type="text" name="mo_name" id="mo_name" placeholder="Enter mobile name" value="<?php echo $row['Mobile_name']; ?>" required></td>
      		</tr>
      		<tr>
        		<td><label>Mobile Company</label></td>
        		<td><input type="text" name="mo_comp" id="mo_comp" placeholder="Enter mobile company" value="<?php echo $row['Mobile_company']; ?>" required></td>
      		</tr>
      		<tr>
        		<td><label>Mobile Description</label></td>
        		<td><input name="mo_desc" id="mo_desc" placeholder="Enter text here..." height="200" value="<?php echo $row['Mobile_description']; ?>" required></td>
      		</tr>
      		<tr>
        		<td><label>Price</label></td>
        		<td><input type="text" name="mo_pric" id="mo_pric" placeholder="Enter price of mobile" value="<?php echo $row['Price']; ?>" required></td>
      		</tr>
     	 	<tr>
        		<td><label>Quantity</label></td>
        		<td><input type="number" name="mo_quan" id="mo_quan" placeholder="Enter quantity of mobile" value="<?php echo $row['Quantity']; ?>" required></td>
      		</tr>
      		<tr>
        		<td>Image</td>
        		<td>
        			<img src="<?php echo $row['Images'];?>" width="150px" height="200px">
        			<input type="file" name="file" id="file"></td>
      		</tr>
      		<tr>
        		<td  align="left" colspan="2">
          		<input type="submit" name="updatemob" value="Update" class="btn btn-success"> 
          		<a href="update_pro.php?mob_id=<?php echo $row['id'];?>" class="btn btn-danger">Reset</a></td>
      		</tr>
       		</form>
  		</table>   
	</div> 

	<?php
	if(isset($_POST['updatemob']))
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
      		$q= "UPDATE `mobiles` SET `Mobile_name`='$mo_name',`Mobile_company`='$mo_comp',`Mobile_description`='$mo_desc',`Price`='$mo_pric',`Quantity`='$mo_quan',`Images`='upload/$photo' WHERE id = '$mob_id'";
    		$query = mysqli_query($connect,$q);
        	if($q)
        	{
            	echo "<script>;";
            	echo "window.alert('Mobile data Updated successfully...!');";
            	echo "window.location.href = 'Add_mobile.php'";
            	echo "</script>;";
        	} 
        	else 
        	{
            	echo "<script>;";
            	echo "window.alert('Data error...!');";
            	echo "window.location.href = 'Add_mobile.php'";
            	echo "</script>;";
        	}   
    	}
    	else
    	{
    		echo $q= "UPDATE `mobiles` SET `Mobile_name`='$mo_name',`Mobile_company`='$mo_comp',`Mobile_description`='$mo_desc',`Price`='$mo_pric',`Quantity`='$mo_quan' WHERE id = '$mob_id'";
        	$query = mysqli_query($connect,$q);
    		if($q)
        	{
            	echo "<script>;";
            	echo "window.alert('Mobile data Updated successfully...!');";
            	echo "window.location.href = 'Add_mobile.php'";
            	echo "</script>;";
        	} 
        	else 
        	{
            	echo "<script>;";
            	echo "window.alert('Data error...!');";
            	echo "window.location.href = 'Add_mobile.php'";
            	echo "</script>;";
        	}   
    	}
    }

}
?>
<!---------------------------------------------- !!!...MOBILE...!!! ------------------------------->

<!---------------------------------------------------- LAPTOP  ------------------------------------>
<?php 
 
if(isset($_GET['lap_id']))
{
 	$lap_id = $_GET['lap_id'];
 	$view = mysqli_query($connect,"select * from laptops WHERE `id` = $lap_id")or die(mysql_error($connect));
 	$row = mysqli_fetch_array($view);
 	extract($row);
    ?>
	<div class="container">
  		<br><h3 class="text-center">Update Laptop</h3><br>
  		<table class="table table-hover">
     		<form class="form" method="POST" enctype="multipart/form-data">
     		<tr>
        		<td><label>Laptop Name</label></td>
        		<td><input type="text" name="lap_name" id="mo_name" placeholder="Enter laptop name" value="<?php echo $row['Laptop_name']; ?>" required></td>
      		</tr>
      		<tr>
        		<td><label>Laptop Company</label></td>
        		<td><input type="text" name="lap_comp" id="mo_comp" placeholder="Enter laptop company" value="<?php echo $row['Laptop_company']; ?>" required></td>
      		</tr>
      		<tr>
        		<td><label>Laptop Description</label></td>
        		<td><input name="lap_desc" id="lap_desc" placeholder="Enter text here..." value="<?php echo $row['Laptop_description']; ?>" required></td>
      		</tr>
      		<tr>
        		<td><label>Price</label></td>
        		<td><input type="text" name="lap_pric" id="mo_pric" placeholder="Enter price of laptop" value="<?php echo $row['Price']; ?>" required></td>
      		</tr>
      		<tr>
        		<td><label>Quantity</label></td>
        		<td><input type="number" name="lap_quan" id="mo_quan" placeholder="Enter quantity of laptop" value="<?php echo $row['Quantity']; ?>" required></td>
      		</tr>
      		<tr>
        		<td>Image</td>
        		<td>
        			<img src="<?php echo $row['Images'];?>" width="150px" height="200px">
        			<input type="file" name="file" id="file" ></td>
      		</tr>
      		<tr>
        		<td  align="left" colspan="2">
          		<input type="submit" name="updatelap" value="Update" class="btn btn-success"> 
          		<a href="update_pro.php?lap_id=<?php echo $row['id'];?>" class="btn btn-danger">Reset</a></td>
      		</tr>
       		</form>
  		</table>   
	</div>

	<?php
  	if(isset($_POST['updatelap']))
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
      		$q= "UPDATE `laptops` SET `Laptop_name`='$lap_name',`Laptop_company`='$lap_comp',`Laptop_description`='$lap_desc',`Price`='$lap_pric',`Quantity`='$lap_quan',`Images`='upload/$photo' WHERE id = '$lap_id'";
    		$query = mysqli_query($connect,$q);
        	if($q)
        	{
            	echo "<script>;";
            	echo "window.alert('Laptop data Updated successfully...!');";
            	echo "window.location.href = 'Add_laptop.php'";
            	echo "</script>;";
        	} 
        	else 
        	{
            	echo "<script>;";
            	echo "window.alert('Data error...!');";
            	echo "window.location.href = 'Add_laptop.php'";
            	echo "</script>;";
        	}   
    	}
    	else
    	{
    		echo $q= "UPDATE `laptops` SET `Laptop_name`='$lap_name',`Laptop_company`='$lap_comp',`Laptop_description`='$lap_desc',`Price`='$lap_pric',`Quantity`='$lap_quan' WHERE id = '$lap_id'";
        	$query = mysqli_query($connect,$q);
    		if($q)
        	{
            	echo "<script>;";
            	echo "window.alert('Laptop data Updated successfully...!');";
            	echo "window.location.href = 'Add_laptop.php'";
            	echo "</script>;";
        	} 
        	else 
        	{
            	echo "<script>;";
            	echo "window.alert('Data error...!');";
            	echo "window.location.href = 'Add_laptop.php'";
            	echo "</script>;";
        	}   
    	}
   
  	}
}
?>
<!-- --------------------------!!!... LAPTOP...!!! ----------------------------------- -->