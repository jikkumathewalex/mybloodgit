<?php
     include("../../../database/dbconnect.php");
     $id =	$_POST['delete'];
     mysqli_query($con,"UPDATE `tbl_state` SET status='0' where state_id='$id'");

     $Message=urlencode("State Deleted");
     echo "<script>window.location.href='admin_location_state.php?Message=$Message'</script>";
?>
