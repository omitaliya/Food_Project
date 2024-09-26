<?php



if ($_SESSION['user_type'] != 'admin') {
    
     header('location:../login.php');
}


?>