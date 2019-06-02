<?php
     include("../../database/dbconnect.php");
    
     $id =	$_POST['approved'];
     
     mysqli_query($con,"UPDATE `tbl_login` SET status='1' where login_id='$id' AND type='1'");
     mysqli_query($con,"UPDATE `tbl_reg` SET status='1' where login_id='$id'");
     mysqli_query($con,"UPDATE `tbl_donor` SET status='1' where login_id='$id'");

     $Message=urlencode("Blood Donor Approval Accepted");
     echo "<script>alert('Blood Donor Approval Accepted');</script>";
     echo "<script>window.location.href='admin_blood_donor_approval.php?Message=$Message'</script>";
?>

