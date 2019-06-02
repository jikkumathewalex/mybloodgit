<?php
include("../database/dbconnect.php");

$email=$_POST['email'];
$otp=rand(111111,999999);


$sql="select * from tbl_login where email='$email'";
$res=mysqli_query($con,$sql);
$count=mysqli_num_rows($res);
if($count!=0)
{
 $to = $email;
 $subject = "Forgot Password";
 $txt = "Hello world!".$otp;
 $headers = "From: myblood@gmail.com";

 mail($to,$subject,$txt,$headers);


 $sql0="select * from tbl_otp where email='$email'";
$res0=mysqli_query($con,$sql);
$count0=mysqli_num_rows($res);
if($count0!=0)
{
    mysqli_query($con,"UPDATE `tbl_otp` SET otp='$otp' where email='$email'");

}
else{
    mysqli_query($con,"INSERT INTO `tbl_otp`( `email`,`otp`) VALUES ('$email','$otp')");

}

$_SESSION['email']=$email;
header('location:otp.php');

}
else
{
    $Message=urlencode("Email Does Not Exists");
     echo "<script>alert('Email Does Not Exists');</script>";
     echo "<script>window.location.href='forgot_password.php?Message=$Message'</script>";
}

?>
