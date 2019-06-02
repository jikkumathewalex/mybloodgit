<?php
     include("../../../database/dbconnect.php");
     $id =	$_POST['delete'];
     mysqli_query($con,"UPDATE `tbl_district` SET status='0' where district_id='$id'");

     $Message=urlencode("District Deleted");
     echo "<script>window.location.href='admin_location_district.php?Message=$Message'</script>";
?>
