<?php
include("../database/dbconnect.php");

$new_c_pass=$_POST['new_c_pass'];
$email=$_SESSION['email'];

mysqli_query($con,"UPDATE `tbl_login` SET `password`='$new_c_pass' where `email`='$email'");

$Message=urlencode("Password Changed Successfully");
echo "<script>alert('Password Changed Successfully');</script>";
echo "<script>window.location.href='../index.php?Message=$Message'</script>";
?>
