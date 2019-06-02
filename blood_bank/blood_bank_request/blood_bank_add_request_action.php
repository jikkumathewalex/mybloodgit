<?php

include("../database/dbconnect.php");

$login_id=$_SESSION['s_login_id'];
$message	=	$_POST['txtbrequest'];
date_default_timezone_set('asia/kolkata');
$date= date("Y/m/d");
$time= date("h:i:sa");
$sql="select * from tbl_notification where message='$message'";
$res=mysqli_query($con,$sql);
$count=mysqli_num_rows($res);
if($count==0)
{
  mysqli_query($con,"INSERT INTO `tbl_notification`( `login_id`,`date`,`time`,`message`, `status`) VALUES ('$login_id','$date','$time','$message',1)");
	$Message=urlencode("Notification Added Successfully");
	header("location:blood_bank_request.php?Message=".$Message);
	die;
}
?>
