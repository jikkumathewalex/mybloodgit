<?php
     include("../database/dbconnect.php");
     
     $id =	$_POST['delete'];

     mysqli_query($con,"UPDATE `tbl_hos_stock` SET status='0' where hos_stock_id='$id'");
     $Message=urlencode("Hospital Stock Deleted");
     header("location:hospital_stock.php?Message=".$Message);
?>
