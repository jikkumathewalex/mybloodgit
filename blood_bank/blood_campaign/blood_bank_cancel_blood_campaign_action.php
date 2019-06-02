<?php
     include("../database/dbconnect.php");
     $id =	$_POST['delete'];
     mysqli_query($con,"UPDATE `tbl_blood_camp` SET status='0' where blood_camp_id='$id'");
     $Message=urlencode("Blood Campaign Deleted");
     header("location:blood_bank_blood_campaign.php?Message=".$Message);
?>
