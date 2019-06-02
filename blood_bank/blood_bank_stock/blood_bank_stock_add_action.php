<?php
include("../database/dbconnect.php");

$login_id=$_SESSION['s_login_id'];

$pid=$_POST['pi'];
$available_bg=$_POST['bgroup'];
$sdate=$_POST['sd'];
$stime=$_POST['st'];

date_default_timezone_set('asia/kolkata');
$date= date("Y/m/d");
$time= date("h:i:sa");
$sql="select * from tbl_bbank_stock where available_blood_group='$available_bg' AND stock_date='$sdate' AND packetid='$pid'";
$res=mysqli_query($con,$sql);
$count=mysqli_num_rows($res);
if($count==0)
{
  mysqli_query($con,"INSERT INTO `tbl_bbank_stock`(`login_id`,`packetid`,`stock_date`,`stock_time`,`upload_date`,`upload_time`,`available_blood_group`, `status`) VALUES ($login_id,'$pid','$sdate','$stime','$date','$time','$available_bg',1)");
	$Message=urlencode("Blood Stock Added Successfully");
	header("location:blood_bank_stock.php?Message=".$Message);
	die;
}
else
{
	$Message=urlencode("Blood Stock Already Exists");
	header("location:blood_bank_stock.php?Message=".$Message);
}
?>