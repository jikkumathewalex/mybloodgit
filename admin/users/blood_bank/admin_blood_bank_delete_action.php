<?php
     include("../../database/dbconnect.php");
     $id =	$_POST['delete'];
     mysqli_query($con,"UPDATE `tbl_login` SET status='2' where login_id='$id'");
     mysqli_query($con,"UPDATE `tbl_reg` SET status='2' where login_id='$id'");
     mysqli_query($con,"UPDATE `tbl_blood_bank` SET status='2' where login_id='$id'");


     $Message=urlencode("Blood Bank Deleted");
     echo "<script>alert('Blood Bank Deleted');</script>";
     echo "<script>window.location.href='admin_blood_bank_approval.php?Message=$Message'</script>";
?>
