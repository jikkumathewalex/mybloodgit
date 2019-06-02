<?php
     include("../database/dbconnect.php");
     
     $id =	$_POST['delete'];

     mysqli_query($con,"UPDATE `tbl_bbank_stock` SET status='0' where bbank_stock_id='$id'");
     $Message=urlencode("Blood Stock Deleted");
     header("location:blood_bank_stock.php?Message=".$Message);
?>
