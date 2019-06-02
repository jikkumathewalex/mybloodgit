<?php
include("../database/dbconnect.php");
$message	=	$_POST['txtNotification'];
date_default_timezone_set('asia/kolkata');
$date= date("Y/m/d");
$time= date("h:i:sa");
$sql="select * from tbl_notification where message='$message'";
$res=mysqli_query($con,$sql);
$count=mysqli_num_rows($res);
if($count==0)
{
  mysqli_query($con,"INSERT INTO `tbl_notification`( `date`,`time`,`message`, `status`) VALUES ('$date','$time','$message',1)");
	$Message=urlencode("Notification Added Successfully");
	header("location:admin_new_notification.php?Message=".$Message);
	die;
}
?>
