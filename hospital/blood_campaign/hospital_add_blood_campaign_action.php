<?php
include("../database/dbconnect.php");
$login_id=$_SESSION['s_login_id'];
$camp_name=$_POST['txtCampName'];
$venue=$_POST['txtCampVenue'];
$description=$_POST['txtCampDescription'];
$date=$_POST['txtCampDate'];
$time=$_POST['txtCampTime'];



$sql="select * from tbl_blood_camp where date='$date'";
$res=mysqli_query($con,$sql);
$count=mysqli_num_rows($res);
if($count==0)
{
  mysqli_query($con,"INSERT INTO `tbl_blood_camp`( `login_id`,`camp_name`,`venue`,`description`,`date`,`time`,`status`) VALUES ('$login_id','$camp_name','$venue','$description','$date','$time',1)");
	$Message=urlencode("Blood Campaign Added Successfully");
	header("location:hospital_blood_campaign.php?Message=".$Message);
	die;
}
// else {
// 	$Message=urlencode("Notification Already Exists");
// 	header("location:admin_notification.php?Message=".$Message);
// }
?>
