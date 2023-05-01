<?php 
session_start();
include('Admin/include/config.php');
if($_SERVER['REQUEST_METHOD']=="POST")
{
	if(isset($_POST['purchase']))
	{
		$time = date("h:i a");
		$q1 = "INSERT INTO `order_manager`(`Full_name`, `Phone_no`, `Address`, `Pay_mode`,`Total_items`,`Time`) VALUES ('$_POST[fullname]','$_POST[phone_no]','$_POST[address]','$_POST[paymode]','$_POST[count]','$time');";
		if(mysqli_query($connect,$q1))
		{
			$orderid = mysqli_insert_id($connect);
			foreach($_SESSION['cart']as $key => $value)
			{
			 	$pro_name = $value['pro_name'];
			 	$pro_description = $value['pro_description'];
			 	$pro_image = $value['pro_image'];
			 	$pro_price = $value['pro_price'];
			 	$Quantity = $value['Quantity'];
			    $q2 = "INSERT INTO `orders`(`id`,`Product_name`,`Product_description`,`Product_image`,`Product_price`,`Quantity`) VALUES ('$orderid','$pro_name','$pro_description','$pro_image','$pro_price','$Quantity')";
			   	if(mysqli_query($connect,$q2))
			   	{
			   		echo "<script>";
					// echo "alert('Success');";
	        		echo "</script>";
			   	}
			   	else
			   	{
			   		echo "<script>";
					echo "alert('unnsuccess');";
	        		echo "</script>";
			   	}
			}
			unset($_SESSION['cart']);
			echo "<script>";
			echo "alert('Your order will placed very soon...!!');";
	        echo "window.location.href='index.php';";
	        echo "</script>";
		}
		else
		{
			echo "<script>";
			echo "alert('SQL ERROR');";
	        echo "window.alert('Server error');";
	        echo "</script>";
		}
	}
}
?>	