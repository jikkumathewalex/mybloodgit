<?php
     include("../../database/dbconnect.php");
     $id =	$_POST['delete'];
     mysqli_query($con,"UPDATE `tbl_login` SET status='2' where login_id='$id'");
     mysqli_query($con,"UPDATE `tbl_reg` SET status='2' where login_id='$id'");
     mysqli_query($con,"UPDATE `tbl_donor` SET status='2' where login_id='$id'");


     $Message=urlencode("Blood Donor Deleted");
     echo "<script>alert('Blood Donor Deleted');</script>";
     echo "<script>window.location.href='admin_blood_donor_approval.php?Message=$Message'</script>";
?>
