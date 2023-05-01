<?php 
include('include/config.php');
?>

<!----------------------------------------  MOBILE ------------------------------------------->
<?php 
if(isset($_GET['mob_id']))
{
  		$idd = $_GET['mob_id'];
      
        $delete = mysqli_query($connect,"DELETE FROM `mobiles` WHERE `id`='$idd'");
        if ($delete)
        {	
      	   echo "<script>";
      	   echo "alert('Delete Mobiles successfull.......!');";
      	   echo "</script>";
              $q1 = "SET @num := 0;";
            $re1 = mysqli_query($connect,$q1);
              $q2 = "UPDATE mobiles SET id = @num := (@num+1);";
            $re2 = mysqli_query($connect,$q2);
              $q3 = "ALTER TABLE mobiles AUTO_INCREMENT = 1;"; 
            $re3 = mysqli_query($connect,$q3);
            echo "<script>";
            echo 'window.location.href= "Add_mobile.php";';
            echo "</script>";   
        }         
  		else
  		{
      		echo "<script>";
      		echo "alert('Data error.......!');";
      		echo 'window.location.href= "Add_mobile.php";';
      		echo "</script>";
   		}
}   		
?>
<!---------------------------------------------- !!!...MOBILE...!!! ------------------------------->
<!---------------------------------------------------- LAPTOP  ------------------------------------>
<?php 
if(isset($_GET['lap_id']))
{
  	  	$idd = $_GET['lap_id'];
       	$delete = mysqli_query($connect,"DELETE FROM `laptops` WHERE `id`='$idd'");
        if ($delete)
        {	
      	   echo "<script>";
      	   echo "alert('Delete Laptop successfull.......!');";
      	   echo "</script>";
              $q1 = "SET @num := 0;";
            $re1 = mysqli_query($connect,$q1);
              $q2 = "UPDATE laptops SET id = @num := (@num+1);";
            $re2 = mysqli_query($connect,$q2);
              $q3 = "ALTER TABLE laptops AUTO_INCREMENT = 1;"; 
            $re3 = mysqli_query($connect,$q3);
            echo "<script>";
            echo 'window.location.href= "Add_laptop.php";';
            echo "</script>";   
        }         
  		else
  		{
      		echo "<script>";
      		echo "alert('Data error.......!');";
      		echo 'window.location.href= "Add_laptop.php";';
      		echo "</script>";
   		}
}   		
?>

<!-- --------------------------!!!... LAPTOP...!!! ----------------------------------- -->
