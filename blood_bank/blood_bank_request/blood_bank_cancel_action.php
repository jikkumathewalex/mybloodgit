<?php
     include("../database/dbconnect.php");
     $id =	$_POST['delete'];
     mysqli_query($con,"UPDATE `tbl_notification` SET status='0' where notification_id='$id'");
     $Message=urlencode("Notification Deleted");
     header("location:blood_bank_request.php?Message=".$Message);
?>












