<?php
     include("../database/dbconnect.php");
     $id =	$_GET['id'];
     mysqli_query($con,"UPDATE `tbl_blood_camp` SET status='0' where blood_camp_id='$id'");
     $Message=urlencode("Blood Campaign Cancelled");
     header("location:hospital_blood_campaign.php?Message=".$Message);
?>
