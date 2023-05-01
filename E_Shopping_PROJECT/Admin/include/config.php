<?php
$connect = mysqli_connect("localhost","root","","my_shopee") or die(mysqli_error($connect));
if($connect)
{
	// echo "Database has been connected successfully..!!";
}
else
{
	echo "Error";
}
?>