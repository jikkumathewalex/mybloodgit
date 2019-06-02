<?php
include("../../../database/dbconnect.php");
$state	=	$_POST['txtState'];
$sql="select * from tbl_state where state='$state'";
$res=mysqli_query($con,$sql);
$count=mysqli_num_rows($res);
if($count==0)
{
  mysqli_query($con,"INSERT INTO `tbl_state`( `state`, `status`) VALUES ('$state',1)");
	$Message=urlencode("State Added Successfully");
	header("location:admin_location_state.php?Message=".$Message);
	die;
}
else {
	$Message=urlencode("State Already Exists");
	header("location:admin_location_state.php?Message=".$Message);
}
?>
