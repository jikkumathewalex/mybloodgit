<?php
     include("../database/dbconnect.php");
     $login_id=$_SESSION['s_login_id'];
     $name    =     $_POST['txtBBName'];
     $email   =     $_POST['txtEmail'];
     $phone   =     $_POST['txtPhone'];
     $password=     $_POST['txtPassword'];
     $accreditation=$_POST['ddacc'];
     $accreditation_date=$_POST['acc_date'];
     $hos_latitude=$_POST['txtLat'];
     $hos_longitude=$_POST['txtLong'];

     $hos_acc_cert=$_FILES['hos_acc_certificate']['name'];
     if($hos_acc_cert!=="")
     {
     $hos_acc_cert_targetfolder="../../hos_acc_certificates/";
     $hos_acc_cert_targetfolder=$hos_acc_cert_targetfolder.basename($_FILES['hos_acc_certificate']['name']);
     move_uploaded_file($_FILES['hos_acc_certificate']['tmp_name'], $hos_acc_cert_targetfolder);
     
     $state   =     $_POST['ddstate'];
     $district=     $_POST['dddistrict'];
     $city    =     $_POST['ddcity'];

     mysqli_query($con,"UPDATE `tbl_login` SET email='$email', mobile='$phone', password='$password' where login_id='$login_id'");
     mysqli_query($con,"UPDATE `tbl_reg` SET name='$name', state_id=$state, district_id=$district, city_id=$city where login_id='$login_id'");
     mysqli_query($con,"UPDATE `tbl_hospital` SET hos_latitude='$hos_latitude', hos_longitude='$hos_longitude', accreditation_date='$accreditation_date', accreditation_id='$accreditation', accreditation_certificate='$hos_acc_cert' where login_id='$login_id'");

     $Message=urlencode("Profile Updated");
     // header("location:hosp_edit_profile.php?Message=".$Message);

     echo "<script>alert('Profile Updated');</script>";
     echo "<script>window.location.href='hosp_edit_profile.php?Message=$Message'</script>";
     }
     else
     {
          $hos_acc_cert_targetfolder="../../hos_acc_certificates/";
          $hos_acc_cert_targetfolder=$hos_acc_cert_targetfolder.basename($_FILES['hos_acc_certificate']['name']);
          move_uploaded_file($_FILES['hos_acc_certificate']['tmp_name'], $hos_acc_cert_targetfolder);
          
          $state   =     $_POST['ddstate'];
          $district=     $_POST['dddistrict'];
          $city    =     $_POST['ddcity'];
     
          mysqli_query($con,"UPDATE `tbl_login` SET email='$email', mobile='$phone', password='$password' where login_id='$login_id'");
          mysqli_query($con,"UPDATE `tbl_reg` SET name='$name', state_id=$state, district_id=$district, city_id=$city where login_id='$login_id'");
          mysqli_query($con,"UPDATE `tbl_hospital` SET hos_latitude='$hos_latitude', hos_longitude='$hos_longitude', accreditation_date='$accreditation_date', accreditation_id='$accreditation' where login_id='$login_id'");
     
          $Message=urlencode("Profile Updated");
          // header("location:hosp_edit_profile.php?Message=".$Message);
     
          echo "<script>alert('Profile Updated');</script>";
          echo "<script>window.location.href='hosp_edit_profile.php?Message=$Message'</script>";
     }
?>