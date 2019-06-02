<?php 

include("../../database/dbconnect.php");

$acc_date=$_POST['acc_date'];
$latitude=$_POST['latitude'];
$longitude=$_POST['longitude'];
$bb_acc_id=$_POST['ddbbacc'];


$bb_acc_cert=$_FILES['bb_acc_certificate']['name'];
$bb_acc_cert_targetfolder="../../bb_acc_certificates/";
$bb_acc_cert_targetfolder=$bb_acc_cert_targetfolder.basename($_FILES['bb_acc_certificate']['name']);
move_uploaded_file($_FILES['bb_acc_certificate']['tmp_name'], $bb_acc_cert_targetfolder);

$login_id=$_SESSION['login_id'];

$sql="select * from tbl_login where login_id='$login_id'";
$res=mysqli_query($con,$sql);
$count=mysqli_num_rows($res);

if($count!=0)
{
    mysqli_query($con,"UPDATE `tbl_blood_bank` SET `accreditation_date`='$acc_date' WHERE login_id='$login_id'");
    mysqli_query($con,"UPDATE `tbl_blood_bank` SET `bb_latitude`='$latitude' WHERE login_id='$login_id'");
    mysqli_query($con,"UPDATE `tbl_blood_bank` SET `bb_longitude`='$longitude' WHERE login_id='$login_id'");
    mysqli_query($con,"UPDATE `tbl_blood_bank` SET `accreditation_id`='$bb_acc_id' WHERE login_id='$login_id'");
    mysqli_query($con,"UPDATE `tbl_blood_bank` SET `accreditation_certificate`='$bb_acc_cert' WHERE login_id='$login_id'");
    mysqli_query($con,"UPDATE `tbl_blood_bank` SET `status`=0 WHERE login_id='$login_id'");


    echo "<script>alert('Registration Succesfull, Please wait for the verification ... ');</script>";
    echo "<script>window.location.href ='../../index.php';</script>";


}

