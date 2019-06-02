<?php
include("../database/dbconnect.php");
$login_id   =   $_SESSION['s_login_id'];
$feedback	  =  	$_POST['txtFeedback'];
date_default_timezone_set('asia/kolkata');
$date= date("Y/m/d");
$time= date("h:i:sa");
$sql="select * from tbl_feedback where feedback='$feedback'";
$res=mysqli_query($con,$sql);
$count=mysqli_num_rows($res);
if($count==0)
{
  mysqli_query($con,"INSERT INTO `tbl_feedback`(`login_id`, `date`,`time`,`feedback`, `status`) VALUES ('$login_id','$date','$time','$feedback',1)");
	$Message=urlencode("Feedback Given Successfully");
	header("location:hospital_feedback.php?Message=".$Message);
	die;
}
?>
