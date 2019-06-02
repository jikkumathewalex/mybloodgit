<?php
include("../../../database/dbconnect.php");
$district	=	$_POST['txtDistrict'];
$state = $_POST['ddstate'];
$sql="select * from tbl_district where district='$district'";
$res=mysqli_query($con,$sql);
$count=mysqli_num_rows($res);
if($count==0)
{
  $res=mysqli_query($con,"SELECT * FROM `tbl_state` WHERE `state`='$state'");
  while($row=mysqli_fetch_array($res))
  {
    $stateid=$row['state_id'];
    mysqli_query($con,"INSERT INTO `tbl_district`( `state_id`,`district`, `status`) VALUES ('$stateid','$district',1)");
  }
	$Message=urlencode("District Added Successfully");
	header("location:admin_location_district.php?Message=".$Message);
	die;
}
else {
	$Message=urlencode("District Already Exists");
	header("location:admin_location_district.php?Message=".$Message);
}
?>
