<?php 

include("../../database/dbconnect.php");

$latitude=$_POST['latitude'];
$longitude=$_POST['longitude'];
$hos_acc_id=$_POST['ddhosacc'];

$hos_acc_cert=$_FILES['hos_acc_certificate']['name'];
$hos_acc_cert_targetfolder="../../hos_acc_certificates/";
$hos_acc_cert_targetfolder=$hos_acc_cert_targetfolder.basename($_FILES['hos_acc_certificate']['name']);
move_uploaded_file($_FILES['hos_acc_certificate']['tmp_name'], $hos_acc_cert_targetfolder);

$login_id=$_SESSION['login_id'];

$sql="select * from tbl_login where login_id='$login_id'";
$res=mysqli_query($con,$sql);
$count=mysqli_num_rows($res);

if($count!=0)
{
    mysqli_query($con,"UPDATE `tbl_hospital` SET `hos_latitude`='$latitude' WHERE login_id='$login_id'");
    mysqli_query($con,"UPDATE `tbl_hospital` SET `hos_longitude`='$longitude' WHERE login_id='$login_id'");
    mysqli_query($con,"UPDATE `tbl_hospital` SET `accreditation_id`='$hos_acc_id' WHERE login_id='$login_id'");
    mysqli_query($con,"UPDATE `tbl_hospital` SET `accreditation_certificate`='$hos_acc_cert' WHERE login_id='$login_id'");
    mysqli_query($con,"UPDATE `tbl_hospital` SET `status`=0 WHERE login_id='$login_id'");


    echo "<script>alert('Registration Succesfull, Please wait for the verification ... ');</script>";
    echo "<script>window.location.href ='../../index.php';</script>";


}

?>

