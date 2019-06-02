<?php
     include("../../database/dbconnect.php");
     $id =	$_POST['cancel'];
     mysqli_query($con,"UPDATE `tbl_login` SET status='0' where login_id='$id' AND type='2'");
     mysqli_query($con,"UPDATE `tbl_reg` SET status='0' where login_id='$id'");
     mysqli_query($con,"UPDATE `tbl_blood_bank` SET status='0' where login_id='$id'");


     $Message=urlencode("Blood Bank Approval Cancelled");
     echo "<script>alert('Blood Bank Approval Cancelled');</script>";
     echo "<script>window.location.href='admin_blood_bank_approval.php?Message=$Message'</script>";
?>
