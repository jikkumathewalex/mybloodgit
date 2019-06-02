<?php
     include("../database/dbconnect.php");
     $login_id =     $_SESSION['s_login_id'];
     $name     =     $_POST['txtHosName'];
     $email    =     $_POST['txtEmail'];
     $phone    =     $_POST['txtPhone'];
     $password =     $_POST['txtPassword'];
     $weight   =     $_POST['weight'];
     $iss_hos  =     $_POST['ddhospital'];

     $med_report=$_FILES['hos_med_report']['name'];

     if($med_report!=="")
     {
     $med_report_targetfolder="../../medical_reports/";
     $med_report_targetfolder=$med_report_targetfolder.basename($_FILES['hos_med_report']['name']);
     move_uploaded_file($_FILES['hos_med_report']['tmp_name'], $med_report_targetfolder);
     
     $state   =     $_POST['ddstate'];
     $district=     $_POST['dddistrict'];
     $city    =     $_POST['ddcity'];

     mysqli_query($con,"UPDATE `tbl_login` SET email='$email', mobile='$phone', password='$password' where login_id='$login_id'");
     mysqli_query($con,"UPDATE `tbl_reg` SET name='$name', state_id=$state, district_id=$district, city_id=$city where login_id='$login_id'");
     mysqli_query($con,"UPDATE `tbl_donor` SET weight='$weight', medical_report_issued_hospital='$iss_hos', medical_report='$med_report' where login_id='$login_id'");

     $Message=urlencode("Profile Updated");

     echo "<script>alert('Profile Updated');</script>";
     echo "<script>window.location.href='blood_donor_edit_profile.php?Message=$Message'</script>";
     }
     else
     {
     $state   =     $_POST['ddstate'];
     $district=     $_POST['dddistrict'];
     $city    =     $_POST['ddcity'];
     mysqli_query($con,"UPDATE `tbl_login` SET email='$email', mobile='$phone', password='$password' where login_id='$login_id'");
     mysqli_query($con,"UPDATE `tbl_reg` SET name='$name', state_id=$state, district_id=$district, city_id=$city where login_id='$login_id'");
     mysqli_query($con,"UPDATE `tbl_donor` SET weight='$weight', medical_report_issued_hospital='$iss_hos' where login_id='$login_id'");

     $Message=urlencode("Profile Updated");
     // header("location:blood_bank_edit_profile.php?Message=".$Message);

     echo "<script>alert('Profile Updated');</script>";
     echo "<script>window.location.href='blood_donor_edit_profile.php?Message=$Message'</script>";
     }
?>