<?php
include('include/config.php');

if(isset($_GET['admin_id']))
{
  $idd = $_GET['admin_id'];
      if($idd != '1')
      {
        $delete = mysqli_query($connect,"DELETE FROM `admin` WHERE `id`='$idd'");
        if($delete)
        {
      	   echo "<script>";
      	   echo "alert('Delete Admin successfull.......!');";
      	   echo "</script>";
              $q1 = "SET @num := 0;";
            $re1 = mysqli_query($connect,$q1);
              $q2 = "UPDATE admin SET id = @num := (@num+1);";
            $re2 = mysqli_query($connect,$q2);
              $q3 = "ALTER TABLE admin AUTO_INCREMENT = 1;"; 
            $re3 = mysqli_query($connect,$q3);
        
            echo "<script>";
            echo 'window.location.href= "view_all_admins.php";';
            echo "</script>";   
        }
        else
        {
        	  echo "<script>";
          	echo "alert('Data error.......!');";
          	echo 'window.location.href= "registration_form_view.php";';
          	echo "</script>";
        }
      }
      else{
            echo "<script>";
            echo 'window.location.href= "view_all_admins.php";';
            echo "</script>";
        }
}
?>