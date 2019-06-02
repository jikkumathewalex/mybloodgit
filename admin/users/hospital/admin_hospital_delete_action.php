<?php
     include("../../database/dbconnect.php");
     $id =	$_POST['delete'];
     mysqli_query($con,"UPDATE `tbl_login` SET status='2' where login_id='$id'");
     mysqli_query($con,"UPDATE `tbl_reg` SET status='2' where login_id='$id'");
     mysqli_query($con,"UPDATE `tbl_hospital` SET status='2' where login_id='$id'");


     $Message=urlencode("Hospital Deleted");
     echo "<script>alert('Hospital Deleted');</script>";
     echo "<script>window.location.href='admin_hospital_approval.php?Message=$Message'</script>";
?>
