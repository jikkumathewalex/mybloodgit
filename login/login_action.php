<img src="">
<?php
include("../database/dbconnect.php");

$login=$_POST['login'];
$password=$_POST['password'];


$result=mysqli_query($con,"select * from tbl_login where email='$login' or mobile='$login'");
$res=mysqli_num_rows($result);
if($res!=0)
{
	while($row=mysqli_fetch_array($result))
	{
		$dblogin_id=$row['login_id'];
		$dbemail=$row['email'];
		$dbmobile=$row['mobile'];
		$dbpassword=$row['password'];
		$dbtype=$row['type'];
		$dbstatus=$row['status'];
		if($password==$dbpassword && $dbtype=='0')
		{
			$_SESSION['s_login_id']=$dblogin_id;
				$_SESSION['s_email']=$dbemail;
				$_SESSION['s_mobile']=$dbmobile;
			$_SESSION['s_password']=$dbpassword;
		    $_SESSION['s_type']=0;
				$_SESSION['s_status']=1;
			header("location:../admin/admin_home.php");
		}
		else if($password==$dbpassword && $dbtype=='1' && $dbstatus=='1')
		{
			$_SESSION['s_login_id']=$dblogin_id;
				$_SESSION['s_email']=$dbemail;
				$_SESSION['s_mobile']=$dbmobile;
			$_SESSION['s_password']=$dbpassword;
		    $_SESSION['s_type']=1;
				$_SESSION['s_status']=1;
		    header("location: ../blood_donor/blooddonorHome.php");
		}
		else if($password==$dbpassword && $dbtype=='2' && $dbstatus=='1')
		{
			$_SESSION['s_login_id']=$dblogin_id;
				$_SESSION['s_email']=$dbemail;
				$_SESSION['s_mobile']=$dbmobile;
			$_SESSION['s_password']=$dbpassword;
		    $_SESSION['s_type']=2;
				$_SESSION['s_status']=1;

				$login_id=$_SESSION['s_login_id'];
				$sql0="select BB.*, LOG.* from tbl_blood_bank BB, tbl_login LOG WHERE DATE_ADD(`accreditation_date`, INTERVAL 300 DAY)=CURRENT_DATE AND BB.login_id='$login_id' AND BB.login_id=LOG.login_id AND BB.status=1";
        $res0=mysqli_query($con,$sql0);
				$count0=mysqli_num_rows($res0);
				$row0=mysqli_fetch_array($sql0);
				if($count0!=0)
				{
					$to = $row0['email'];
          $subject = "Update Accreditation Certificate";
          $txt = "Please update your accreditation certificate, only 65 days remaining !!! Otherwise registration will cancelled.";
          $headers = "From: myblood@gmail.com";

          mail($to,$subject,$txt,$headers);
				}

				header("location: ../blood_bank/bbank_home.php");

		}
		else if($password==$dbpassword && $dbtype=='3' && $dbstatus=='1')
		{
			$_SESSION['s_login_id']=$dblogin_id;
				$_SESSION['s_email']=$dbemail;
				$_SESSION['s_mobile']=$dbmobile;
			$_SESSION['s_password']=$dbpassword;
		    $_SESSION['s_type']=3;
				$_SESSION['s_status']=1;

				$login_id=$_SESSION['s_login_id'];
				$sql1="select HOS.*, LOG.* from tbl_hospital HOS, tbl_login LOG WHERE DATE_ADD(`accreditation_date`, INTERVAL 300 DAY)=CURRENT_DATE AND HOS.login_id='$login_id' AND HOS.login_id=LOG.login_id AND HOS.status=1";
        $res1=mysqli_query($con,$sql1);
				$count1=mysqli_num_rows($res1);
				$row1=mysqli_fetch_array($sql1);
				if($count1!=0)
				{
					$to = $row1['email'];
          $subject = "Update Accreditation Certificate";
          $txt = "Please update your accreditation certificate, only 65 days remaining !!! Otherwise registration will cancelled.";
          $headers = "From: myblood@gmail.com";

          mail($to,$subject,$txt,$headers);
				}

		    header("location: ../hospital/hospital_home.php");
		}
		else if($password==$dbpassword && $dbtype=='1' && $dbstatus=='0')
		{
		echo '<script>alert("Registration Cancelled, Please Contact Administrator");</script>
		<meta http-equiv="refresh" content="0;URL=http://localhost/myblood/index.php" /> ';
		}
		else if($password==$dbpassword && $dbtype=='1' && $dbstatus=='2')
		{
		echo '<script>alert("Not Approved, Please Wait .....");</script>
		<meta http-equiv="refresh" content="0;URL=http://localhost/myblood/index.php" /> ';
		}
		else if($password==$dbpassword && $dbtype=='2' && $dbstatus=='0')
		{
		echo '<script>alert("Registration Cancelled, Please Contact Administrator");</script>
		<meta http-equiv="refresh" content="0;URL=http://localhost/myblood/index.php" /> ';
		}
		else if($password==$dbpassword && $dbtype=='2' && $dbstatus=='2')
		{
		echo '<script>alert("Not Approved, Please Wait .....");</script>
		<meta http-equiv="refresh" content="0;URL=http://localhost/myblood/index.php" /> ';
		}
		else if($password==$dbpassword && $dbtype=='3' && $dbstatus=='0')
		{
		echo '<script>alert("Registration Cancelled, Please Contact Administrator");</script>
		<meta http-equiv="refresh" content="0;URL=http://localhost/myblood/index.php" /> ';
		}
		else if($password==$dbpassword && $dbtype=='3' && $dbstatus=='2')
		{
		echo '<script>alert("Not Approved, Please Contact Administrator");</script>
		<meta http-equiv="refresh" content="0;URL=http://localhost/myblood/index.php" /> ';
		}
		else
		{
			  echo '<script>alert("Wrong Password, Please Login Again");</script>
				<meta http-equiv="refresh" content="0;URL=http://localhost/myblood/index.php" /> ';
		    // header("location: index.php?error=Wrong Password!!!");
		}
	}
}
else
{
	echo '<script>alert("Username does not exist, Please Login Again Or Create An Account");</script>
	<meta http-equiv="refresh" content="0;URL=http://localhost/myblood/index.php" /> ';
	// header("location: index.php?error=Username not found!!!");
}
?>
