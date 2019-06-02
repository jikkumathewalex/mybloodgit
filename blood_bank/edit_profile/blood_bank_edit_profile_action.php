<?php
     include("../database/dbconnect.php");
     $login_id=$_SESSION['s_login_id'];
     $name    =     $_POST['txtBBName'];
     $email   =     $_POST['txtEmail'];
     $phone   =     $_POST['txtPhone'];
     $password=     $_POST['txtPassword'];
     $accreditation=$_POST['ddacc'];
     $acc_date=$_POST['acc_date'];
     $latitude=$_POST['txtlat'];
     $longitude=$_POST['txtlong'];

     $bb_acc_cert=$_FILES['bb_acc_certificate']['name'];
     if($bb_acc_cert!=="")
     {
     $bb_acc_cert_targetfolder="../../bb_acc_certificates/";
     $bb_acc_cert_targetfolder=$bb_acc_cert_targetfolder.basename($_FILES['bb_acc_certificate']['name']);
     move_uploaded_file($_FILES['bb_acc_certificate']['tmp_name'], $bb_acc_cert_targetfolder);
     
     $state   =     $_POST['ddstate'];
     $district=     $_POST['dddistrict'];
     $city    =     $_POST['ddcity'];
     $latitude=     $_POST['txtlat'];
     $longitude=     $_POST['txtlong'];

     mysqli_query($con,"UPDATE `tbl_login` SET email='$email', mobile='$phone', password='$password' where login_id='$login_id'");
     mysqli_query($con,"UPDATE `tbl_reg` SET name='$name', state_id=$state, district_id=$district, city_id=$city where login_id='$login_id'");
     mysqli_query($con,"UPDATE `tbl_blood_bank` SET bb_latitude='$latitude',bb_longitude='$longitude',accreditation_date='$acc_date',accreditation_id='$accreditation', accreditation_certificate='$bb_acc_cert', bb_latitude='$latitude', bb_longitude='$longitude' where login_id='$login_id'");

     $Message=urlencode("Profile Updated");
     // header("location:blood_bank_edit_profile.php?Message=".$Message);

     echo "<script>alert('Profile Updated');</script>";
     echo "<script>window.location.href='blood_bank_edit_profile.php?Message=$Message'</script>";
     }
     else
     {
          $bb_acc_cert_targetfolder="../../bb_acc_certificates/";
          $bb_acc_cert_targetfolder=$bb_acc_cert_targetfolder.basename($_FILES['bb_acc_certificate']['name']);
          move_uploaded_file($_FILES['bb_acc_certificate']['tmp_name'], $bb_acc_cert_targetfolder);
          
          $state   =     $_POST['ddstate'];
          $district=     $_POST['dddistrict'];
          $city    =     $_POST['ddcity'];
          $latitude=     $_POST['txtlat'];
          $longitude=     $_POST['txtlong'];
     
          mysqli_query($con,"UPDATE `tbl_login` SET email='$email', mobile='$phone', password='$password' where login_id='$login_id'");
          mysqli_query($con,"UPDATE `tbl_reg` SET name='$name', state_id=$state, district_id=$district, city_id=$city where login_id='$login_id'");
          mysqli_query($con,"UPDATE `tbl_blood_bank` SET bb_latitude='$latitude',bb_longitude='$longitude',accreditation_date='$acc_date',accreditation_id='$accreditation', bb_latitude='$latitude', bb_longitude='$longitude' where login_id='$login_id'");
     
          $Message=urlencode("Profile Updated");
          // header("location:blood_bank_edit_profile.php?Message=".$Message);
     
          echo "<script>alert('Profile Updated');</script>";
          echo "<script>window.location.href='blood_bank_edit_profile.php?Message=$Message'</script>";
     }
?>