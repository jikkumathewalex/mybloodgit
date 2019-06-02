<?php
include("../../../database/dbconnect.php");
$city	=	$_POST['txtCity'];
$district = $_POST['dddistrict'];

$sql="select * from tbl_city where city='$city'";
$res=mysqli_query($con,$sql);
$count=mysqli_num_rows($res);
if($count==0)
{
  mysqli_query($con,"INSERT INTO `tbl_city`( `district_id`,`city`, `status`) VALUES ('$district','$city',1)");
	$Message=urlencode("City Added Successfully");
	header("location:admin_location_city.php?Message=".$Message);
	die;
}
else {
	$Message=urlencode("City Already Exists");
	header("location:admin_location_city.php?Message=".$Message);
}
?>
