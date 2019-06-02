<?php 

include("../../database/dbconnect.php");

 $dob=$_POST['dob'];
 $bgroup=$_POST['bgroup'];
 $weight=$_POST['weight'];
 $mreport_issued_hospital=$_POST['ddhospital'];
 $last_don_date=$_POST['last_don_date'];
 $medical_report_date=$_POST['medical_report_date'];

$mreport=$_FILES['mreport']['name'];
$mreport_targetfolder="../../medical_reports/";
$mreport_targetfolder=$mreport_targetfolder.basename($_FILES['mreport']['name']);
move_uploaded_file($_FILES['mreport']['tmp_name'], $mreport_targetfolder);

$login_id=$_SESSION['login_id'];

$sql="select * from tbl_login where login_id='$login_id'";
$res=mysqli_query($con,$sql);
$count=mysqli_num_rows($res);

if($count!=0)
{
    mysqli_query($con,"UPDATE `tbl_donor` SET `dob`='$dob' WHERE login_id='$login_id'");
    mysqli_query($con,"UPDATE `tbl_donor` SET `blood_group_id`='$bgroup' WHERE login_id='$login_id'");
    mysqli_query($con,"UPDATE `tbl_donor` SET `weight`='$weight' WHERE login_id='$login_id'");
    mysqli_query($con,"UPDATE `tbl_donor` SET `last_donate_date`='$last_don_date' WHERE login_id='$login_id'");
    mysqli_query($con,"UPDATE `tbl_donor` SET `med_report_date`='$medical_report_date' WHERE login_id='$login_id'");
    mysqli_query($con,"UPDATE `tbl_donor` SET `medical_report_issued_hospital`='$mreport_issued_hospital' WHERE login_id='$login_id'");
    mysqli_query($con,"UPDATE `tbl_donor` SET `medical_report`='$mreport' WHERE login_id='$login_id'");
    mysqli_query($con,"UPDATE `tbl_donor` SET `status`=0 WHERE login_id='$login_id'");


    echo "<script>alert('Registration Succesfull, Please wait for the verification ... ');</script>";
    echo "<script>window.location.href ='../../index.php';</script>";
}

