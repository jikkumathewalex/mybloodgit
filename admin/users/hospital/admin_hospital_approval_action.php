<?php
     include("../../database/dbconnect.php");
     $id = $_POST['approved'];
     mysqli_query($con,"UPDATE `tbl_login` SET status='1' where login_id='$id' AND type='3'");
     mysqli_query($con,"UPDATE `tbl_reg` SET status='1' where login_id='$id'");
     mysqli_query($con,"UPDATE `tbl_hospital` SET status='1' where login_id='$id'");

     $Message=urlencode("Hospital Approval Accepted");
     echo "<script>alert('Hospital Approval Accepted');</script>";
     echo "<script>window.location.href='admin_hospital_approval.php?Message=$Message'</script>";
?>

