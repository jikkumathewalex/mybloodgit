<?php
     include("../../database/dbconnect.php");
     $id =	$_POST['delete'];
     mysqli_query($con,"UPDATE `tbl_notification` SET status='0' where notification_id='$id' ");
 
     $Message=urlencode("Notification Deleted");
     // echo "<script>alert('Notification Deleted');</script>";
     echo "<script>window.location.href='admin_new_notification.php?Message=$Message'</script>";
?>
