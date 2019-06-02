<?php
     include("../../../database/dbconnect.php");
     $id =	$_POST['delete'];
     mysqli_query($con,"UPDATE `tbl_city` SET status='0' where city_id='$id'");
     $Message=urlencode("City Deleted Successfully");
     header("location:admin_location_city.php?Message=".$Message);
?>
