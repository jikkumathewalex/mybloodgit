<?php
     include("../../database/dbconnect.php");
     $id =	$_POST['cancel'];
     mysqli_query($con,"UPDATE `tbl_login` SET status='0' where login_id='$id' AND type='1'");
     mysqli_query($con,"UPDATE `tbl_reg` SET status='0' where login_id='$id'");
     mysqli_query($con,"UPDATE `tbl_donor` SET status='0' where login_id='$id'");


     $Message=urlencode("Blood Donor Approval Cancelled");
     echo "<script>alert('Blood Donor Approval Cancelled');</script>";
     echo "<script>window.location.href='admin_blood_donor_approval.php?Message=$Message'</script>";
?>
