<?php
   if(isset($_POST['log_out']))
   { 
            session_destroy();
            echo "<script>;";
            echo "window.alert('Log out successfully...!');";
            echo 'window.location.href="index.php"';
            echo "</script>;";
    }

?> 
