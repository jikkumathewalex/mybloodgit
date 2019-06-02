<?php
include("../../database/dbconnect.php");
$email_id	=	$_POST['txtEmail'];
$mobile_no	=	$_POST['txtMobile'];
$about	=	$_POST['txtAbout'];
$sql="select * from tbl_details";
$res=mysqli_query($con,$sql);
$count=mysqli_num_rows($res);
if($count!=0)
{
  mysqli_query($con,"UPDATE tbl_details SET tbl_details.email='$email_id',tbl_details.mobile='$mobile_no',tbl_details.about='$about',tbl_details.status=1");
	$Message=urlencode("Details Updated Successfully");
  header("location:admin_info.php?Message=".$Message);
	die;
}
?>
