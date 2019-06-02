<?php 

include("../database/dbconnect.php");

$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$password=$_POST['rpassword'];
$state=$_POST['ddstate'];
$district=$_POST['dddistrict'];
$city=$_POST['ddcity'];
$usertype=$_POST['usertype'];
date_default_timezone_set('asia/kolkata');
$date= date("Y/m/d");
$time= date("h:i:sa");
// $age=$_POST['age'];
// $bgroup=$_POST['bgroup'];
// $weight=$_POST['weight'];
// $mreport_issued_hospital=$_POST['ddhospital'];
// $bb_acc_id=$_POST['ddbbacc'];
// $hos_acc_id=$_POST['ddhosacc'];

// $hos_acc_cert=$_FILES['hos_acc_certificate']['name'];
// $hos_acc_cert_targetfolder="../hos_acc_certificates/";
// $hos_acc_cert_targetfolder=$hos_acc_cert_targetfolder.basename($_FILES['hos_acc_certificate']['name']);
// move_uploaded_file($_FILES['hos_acc_certificate']['tmp_name'], $hos_acc_cert_targetfolder);

// $bb_acc_cert=$_FILES['bb_acc_certificate']['name'];
// $bb_acc_cert_targetfolder="../bb_acc_certificates/";
// $bb_acc_cert_targetfolder=$bb_acc_cert_targetfolder.basename($_FILES['bb_acc_certificate']['name']);
// move_uploaded_file($_FILES['bb_acc_certificate']['tmp_name'], $bb_acc_cert_targetfolder);

// $mreport=$_FILES['mreport']['name'];
// $mreport_targetfolder="../medical_reports/";
// $mreport_targetfolder=$mreport_targetfolder.basename($_FILES['mreport']['name']);
// move_uploaded_file($_FILES['mreport']['tmp_name'], $mreport_targetfolder);


$sql="select * from tbl_login where mobile='$phone' OR email='$email'";
$res=mysqli_query($con,$sql);
$count=mysqli_num_rows($res);
if($count==0)
{
    mysqli_query($con,"INSERT INTO `tbl_login`(`email`,`mobile`,`password`,`type`,`status`) VALUES ('$email','$phone','$password',$usertype,0)");
    $login_id = $con->insert_id;
    $_SESSION['login_id']=$login_id;

    mysqli_query($con,"INSERT INTO `tbl_reg`(`login_id`,`reg_date`,`reg_time`,`name`,`state_id`,`district_id`,`city_id`,`status`) VALUES ($login_id,'$date','$time','$name',$state,$district,$city,0)");
    $reg_id = $con->insert_id;
    if ($usertype==1)
    {
        mysqli_query($con,"INSERT INTO `tbl_donor`(`reg_id`,`login_id`,`dob`,`blood_group_id`,`weight`,`last_donate_date`,`med_report_date`,`medical_report_issued_hospital`,`medical_report`,`status`) VALUES ('$reg_id','$login_id','0','0','0','0','0','0','0','2')");
        echo "<script>window.location.href ='donor_registration/donor_registration.php';</script>";
        // mysqli_query($con,"INSERT INTO `tbl_donor`(`reg_id`,`login_id`,`age`,`blood_group`,`weight`,`medical_report_issued_hospital`,`medical_report`,`status`) VALUES ($reg_id,$login_id,$age,'$bgroup','$weight','$mreport_issued_hospital','$mreport',0)");
    }
    else if($usertype==2){
        mysqli_query($con,"INSERT INTO `tbl_blood_bank`(`reg_id`,`login_id`,`bb_longitude`,`bb_latitude`,`accreditation_date`,`accreditation_id`,`accreditation_certificate`,`status`) VALUES ($reg_id,$login_id,'0','0','0','0','0','2')");
        echo "<script>window.location.href ='bb_registration/bb_registration.php';</script>";
    }
    else
    {
        mysqli_query($con,"INSERT INTO `tbl_hospital`(`reg_id`,`login_id`,`hos_longitude`,`hos_latitude`,`accreditation_id`,`accreditation_certificate`,`status`) VALUES ($reg_id,$login_id,'0','0','0','0','2')");
        echo "<script>window.location.href ='hospital_registration/hospital_registration.php';</script>";
    }
    echo "<script>alert('Registration Succesfull, Please wait for the verification ... ');</script>";
    echo "<script>window.location.href ='../index.php';</script>";
    
}
else{
    echo "<script>alert('User Already Exists');</script>";
    echo "<script>window.location.href ='registration.php';</script>";
}