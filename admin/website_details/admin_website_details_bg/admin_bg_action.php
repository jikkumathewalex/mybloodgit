<?php
     include("../../../database/dbconnect.php");
     $id =	$_POST['delete'];
     mysqli_query($con,"UPDATE `tbl_blood_group` SET status='0' where blood_group_id='$id'");

     $Message=urlencode("Blood Group Deleted");
     echo "<script>window.location.href='admin_bg.php?Message=$Message'</script>";
?>
