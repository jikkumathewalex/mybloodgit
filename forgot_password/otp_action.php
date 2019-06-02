<?php
include("../database/dbconnect.php");

$otp=$_POST['otp'];
$email=$_SESSION['email'];

$sql="select * from tbl_otp where otp='$otp' AND email='$email'";
$res=mysqli_query($con,$sql);
$count=mysqli_num_rows($res);
if($count!=0)
{
    header('location:new_password.php');
}

else

{
    $Message=urlencode("Incorrect OTP");
     echo "<script>alert('Incorrect OTP');</script>";
     echo "<script>window.location.href='otp.php?Message=$Message'</script>";

}