<?php
     include("../../database/dbconnect.php");
     $id = $_POST['cancel'];
     mysqli_query($con,"UPDATE `tbl_login` SET status='0' where login_id='$id' AND type='3'");
     mysqli_query($con,"UPDATE `tbl_reg` SET status='0' where login_id='$id'");
     mysqli_query($con,"UPDATE `tbl_hospital` SET status='0' where login_id='$id'");

     $Message=urlencode("Hospital Approval Cancelled");
     echo "<script>alert('Hospital Approval Cancelled');</script>";
     echo "<script>window.location.href='admin_hospital_approval.php?Message=$Message'</script>";
?>
