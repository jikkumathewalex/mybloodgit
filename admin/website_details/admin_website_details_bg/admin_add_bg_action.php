<?php
include("../../../database/dbconnect.php");
$bg	=	$_POST['txtBG'];
$sql="select * from tbl_blood_group where blood_group='$bg'";
$res=mysqli_query($con,$sql);
$count=mysqli_num_rows($res);
if($count==0)
{
  mysqli_query($con,"INSERT INTO `tbl_blood_group`( `blood_group`, `status`) VALUES ('$bg',1)");
	$Message=urlencode("Blood Group Added Successfully");
	header("location:admin_bg.php?Message=".$Message);
	die;
}
else {
	$Message=urlencode("Blood Group Already Exists");
	header("location:admin_bg.php?Message=".$Message);
}
?>
