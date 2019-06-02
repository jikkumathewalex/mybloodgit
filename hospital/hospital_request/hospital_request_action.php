<?php
     include("../database/dbconnect.php");
     $id =	$_GET['id'];
     mysqli_query($con,"UPDATE `tbl_notification` SET status='1' where notification_id='$id'");
     $Message=urlencode("Request Accepted");
     header("location:blood_bank_request.php?Message=".$Message);
?>
