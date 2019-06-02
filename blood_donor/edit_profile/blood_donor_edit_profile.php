<?php
     include("../database/dbconnect.php");
     $login_id=$_SESSION['s_login_id'];
     $email=$_SESSION['s_email'];
     $mobile=$_SESSION['s_mobile'];
     $password=$_SESSION['s_password'];
     $type=$_SESSION['s_type'];
     $sql="SELECT * FROM tbl_login WHERE email='$email' OR mobile='$mobile' AND password='$password' AND type='$type'";
     $result=mysqli_query($con,$sql);
     $rowcount=mysqli_num_rows($result);
     if($rowcount !=0)
       {
?>

<!DOCTYPE html>
<html>
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>myBlood</title>
      <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet'>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/solid.css" integrity="sha384-osqezT+30O6N/vsMqwW8Ch6wKlMofqueuia2H7fePy42uC05rm1G+BUPSd2iBSJL" crossorigin="anonymous">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/fontawesome.css" integrity="sha384-BzCy2fixOYd0HObpx3GMefNqdbA7Qjcc91RgYeDjrHTIEXqiF00jKvgQG0+zY/7I" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="../../css/myblood.css">
      <script src="../../js/jquery.js"></script>
      <script>
        function ValidateDate()
     { 
      //  var val = document.getElementById('age').value;
       
      //  if ( !( val > 18 && val<100 ) )
      //  {
      //   alert("The age must be a number between 18 and 100");
      //   document.getElementById('age').value = "";
      //   return false;
      //  }

      //  return true;

      var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 

today = yyyy+'-'+mm+'-'+dd;
document.getElementById("last_don_date").setAttribute("max", today);
document.getElementById("medical_report_date").setAttribute("max", today);

     }

      function ValidateName() 
     {
      var val = document.getElementById('txtBBName').value;

      if (!val.match(/^[A-Za-z][A-Za-z" "]{3,}$/)) 
      {
        alert('Please Enter Valid Name');
        document.getElementById('txtBBName').value = "";
        return false;
      }

      return true;
     }

     function ValidateEmail()
     {
          var val = document.getElementById('txtEmail').value;

          if (!val.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/))
          {
               alert('Please Enter Valid Email');
               document.getElementById('txtEmail').value="";
               return false;
          }

          return true;
     }

     function ValidatePhone() 
     {
      var val = document.getElementById('txtPhone').value;

      if (!val.match(/^[6-9]\d{9}$/)) 
      {
        alert('Please Enter Valid Phone Number');
	   document.getElementById('txtPhone').value = "";
        return false;
    }

     return true;
    }
     </script>      
</head>

<body>
<nav class="navbar navbar-light bg-light">
          <a class="navbar-brand" href="../blooddonorHome.php">
            <img src="../../images/logo.png" width="50" height="50" class="d-inline-block align-top" alt="">
            <h1 class="d-inline">myBlood</h1>
          </a>
          <form class="form-inline" action="../action.php" method="post">
               <div class="form-group">
               <?php
                $query0="select * from tbl_reg where login_id=$login_id";
                $res0=mysqli_query($con,$query0);
               ?>

       <?php while($row0=mysqli_fetch_array($res0)){ ?>
                   <label style="color:#bb0a1e"><i class="fas fa-user"></i>&nbspWelcome&nbsp<?php echo $row0['name']?></label>
               </div>
          </form>
      </nav>
      <?php
       }
       ?>
      <?php
       $query="select * from tbl_details";
       $res=mysqli_query($con,$query);
       ?>

       <?php while($row=mysqli_fetch_array($res)){ ?>
      <nav class="navbar" style="background-color:#bb0a1e;color:white">
      <a href="../blooddonorHome.php" style="color:white"><i class="fas fa-arrow-left"></i></a>
          <div class="float-right">
            <i class="fas fa-phone-square"></i> <?php echo $row['mobile']?>&nbsp
            <i class="fas fa-envelope-square"></i> <?php echo $row['email']?>&nbsp

                <div class="btn-group dropleft">
                <button type="button" id="Logout" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="sr-only">Toggle Dropdown</span>
                </button>

                <div class="dropdown-menu">
                                  <div class="dropdown-divider"></div>
                  <center>
                      <a class="dropdown-item" style="background-color:#bb0a1e;color:white;border-radius:3px" href="../logout.php">Logout</a>
                  </center>
                </div>
              </div>

          </div>
      </nav>
      <?php
      }
      ?>

<div style="color:#bb0a1e" class="card-header" >
          <center><h2>EDIT PROFILE</h2></center>
      </div><br>

      <?php
      // $query="select * from tbl_reg as R, tbl_login as L, tbl_state as S, tbl_district as D, tbl_city as C, tbl_blood_bank as B, tbl_accreditation as A where R.login_id=l.login_id AND R.state_id=S.state_id AND R.district_id=D.district_id AND R.city_id=C.city_id and B.login_id='3' AND L.login_id='3'";
       $query="select * from tbl_reg R, tbl_login L, tbl_state S, tbl_district D, tbl_city C, tbl_donor DR, tbl_accreditation A, tbl_blood_group BG where R.login_id='$login_id' AND L.login_id='$login_id' AND R.state_id=S.state_id AND R.district_id=D.district_id AND R.city_id=C.city_id AND DR.login_id='$login_id' AND DR.blood_group_id=BG.blood_group_id";
       $res=mysqli_query($con,$query);
       if (!$res) {
        printf("Error: %s\n", mysqli_error($con));
        exit();
    }
       $row=mysqli_fetch_array($res);
       
      ?>

      <form class="container" action="blood_donor_edit_profile_action.php" method="post" enctype="multipart/form-data">

<div class="card text-left">
<div class="input-group mb-3">
<div class="input-group-prepend">
  <span class="input-group-text" id="basic-addon1" style="background-color:#bb0a1e;color:white;width:240px">Name</span>
</div>
<input type="text" class="form-control" id="txtHosName" name="txtHosName" onchange='ValidateName();' required="" value="<?php echo $row['name'] ?>">&nbsp
</div>
<div class="input-group mb-3">
<div class="input-group-prepend">
  <span class="input-group-text" id="basic-addon1" style="background-color:#bb0a1e;color:white;width:240px">Email</span>
</div>
<input type="text" class="form-control" id="txtEmail" name="txtEmail" onchange='ValidateEmail();' required="" value="<?php echo $row['email'] ?>">&nbsp
</div>
<div class="input-group mb-3">
<div class="input-group-prepend">
  <span class="input-group-text" id="basic-addon1" style="background-color:#bb0a1e;color:white;width:240px">Phone</span>
</div>
<input type="text" class="form-control" id="txtPhone" name="txtPhone" onchange='ValidatePhone();' required="" value="<?php echo $row['mobile'] ?>">&nbsp
</div>
<div class="input-group mb-3">
<div class="input-group-prepend">
  <span class="input-group-text" id="basic-addon1" style="background-color:#bb0a1e;color:white;width:240px">Password</span>
</div>
<input type="password" class="form-control" id="txtPassword" name="txtPassword" required="" value="<?php echo $row['password'] ?>">&nbsp
</div>
<div class="input-group mb-3">
<div class="input-group-prepend">
  <span class="input-group-text" id="basic-addon1" style="background-color:#bb0a1e;color:white;width:240px">Date Of Birth</span>
</div>
<input type="date" disabled class="form-control" id="dob" name="dob" required="" value="<?php echo $row['dob'] ?>">&nbsp
</div>
<div class="input-group mb-3">
<div class="input-group-prepend">
  <span class="input-group-text" id="basic-addon1" style="background-color:#bb0a1e;color:white;width:240px">Blood Group</span>
</div>
<input type="text" disabled class="form-control" id="bg" name="bg" required="" value="<?php echo $row['blood_group'] ?>">&nbsp
</div>
<div class="input-group mb-3">
<div class="input-group-prepend">
  <span class="input-group-text" id="basic-addon1" style="background-color:#bb0a1e;color:white;width:240px">Weight (in Kg)</span>
</div>
<input type="text" class="form-control" id="weight" name="weight" required="" value="<?php echo $row['weight'] ?>">&nbsp
</div>
<div class="input-group mb-3">
<div class="input-group-prepend">
  <span class="input-group-text" id="basic-addon1" style="background-color:#bb0a1e;color:white;width:240px">Last Donation Date</span>
</div>
<input type="date" class="form-control" id="last_don_date" name="last_don_date" required="" onclick="ValidateDate();" value="<?php echo $row['last_donate_date'] ?>">&nbsp
</div>
<div class="input-group mb-3">
<div class="input-group-prepend">
  <span class="input-group-text" id="basic-addon1" style="background-color:#bb0a1e;color:white;width:240px">Medical Report Date</span>
</div>
<input type="date" class="form-control" id="medical_report_date" name="medical_report_date" required="" onclick="ValidateDate();" value="<?php echo $row['med_report_date'] ?>">&nbsp
</div>
<div class="input-group mb-3">
      <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1" style="background-color:#bb0a1e;color:white;width:240px">Medical Report Issued Hospital</span>
          </div>
          <select name="ddhospital" id="hospital-list" title="Select Issued Hospital" class="form-control" required>
                                                     <option style="background-color:white;color:white" value="<?php echo $row['medical_report_issued_hospital'] ?>"><?php echo $row['medical_report_issued_hospital'] ?></option>
                                                     
                                                     <?php
                                                  
                                                      $queryh=mysqli_query($con,"SELECT * FROM tbl_hospital as h, tbl_reg as REG, tbl_state as ST, tbl_district as DIS, tbl_city as CIT where h.reg_id=REG.reg_id AND REG.state_id=ST.state_id AND REG.district_id=DIS.district_id AND REG.city_id=CIT.city_id");
                                                  
                                                      while($rowh=mysqli_fetch_array($queryh))
                                                      {
                                                           $hospital_id=$rowh['hospital_id'];
                                                           $name=$rowh['name'];
                                                           $city=$rowh['city'];
                                                           $district=$rowh['district'];
                                                           $state=$rowh['state'];
                                                           ?>
                                                           <option value="<?php echo $name.", ".$city ?>"><?php echo $name.", ".$city.", ".$district.", ".$state ?></option>
                                                       
                                                       
                                                      <?php } ?>
                                                    </select>
</div>                                                    

<div class="input-group mb-3">
<div class="input-group-prepend">
  <span class="input-group-text" id="basic-addon1" style="background-color:#bb0a1e;color:white;width:240px"><a style="color:white" href="../../medical_reports/<?php echo $row['medical_report'] ?>" target="_blank">Medical Report</a>&nbsp<i class="fas fa-link"></i>
</span>
</div>
<input type="file" class="form-control" name="hos_med_report" id="hos_med_report" accept="application/pdf" value="" placeholder="Medical Report">
</div>

<div class="input-group mb-3">
<div class="input-group-prepend">
 <span class="input-group-text" id="basic-addon1" style="background-color:#bb0a1e;color:white;width:240px">State</span>
</div>
<select name="ddstate" id="state-list" title="Select State" class="form-control" onchange="getDistrict(this.value);">
                                                     <option style="background-color:white;color:white" value="<?php echo $row['state_id'] ?>"><?php echo $row['state'] ?></option>
                                                     <?php
                                                      $querys=mysqli_query($con,"SELECT * FROM tbl_state WHERE status=1");
                                                      while($row_state=mysqli_fetch_array($querys))
                                                      {
                                                       echo "<option style='background-color:white;color:black' value='".$row_state['state_id']."'>".$row_state['state']."</option>";
                                                      }?>
</select>
</div>

<div class="input-group mb-3">
<div class="input-group-prepend">
  <span class="input-group-text" id="basic-addon1" style="background-color:#bb0a1e;color:white;width:240px">District</span>
</div>

<select name="dddistrict" id="district-list" title="Select District" class="form-control" onchange="getCity(this.value);">
                                                     <option  value="<?php echo $row['district_id'] ?>"><?php echo $row['district'] ?></option>
                                                     <?php
                                                      $queryd=mysqli_query($con,"SELECT * FROM tbl_district WHERE status=1");
                                                      while($row_district=mysqli_fetch_array($queryd))
                                                      {
                                                       echo "<option style='background-color:white;color:black' value='".$row_district['district_id']."'>".$row_district['district']."</option>";
                                                      }?> 
</select> 
</div> 

<div class="input-group mb-3">
<div class="input-group-prepend">
  <span class="input-group-text" id="basic-addon1" style="background-color:#bb0a1e;color:white;width:240px">City</span>
</div>
<select name="ddcity" id="city-list" title="Select City" class="form-control">
                                                     <option style="background-color:white;color:white" value="<?php echo $row['city_id'] ?>"><?php echo $row['city'] ?></option>
                                                     <?php
                                                      $queryc=mysqli_query($con,"SELECT * FROM tbl_city WHERE status=1");
                                                      while($row=mysqli_fetch_array($queryc))
                                                      {
                                                       echo "<option style='background-color:white;color:black' value='".$row['city_id']."'>".$row['city']."</option>";
                                                      }?>
                                                    </select></div>
       

       

     <center><button type="submit" class="btn btn-primary" style="background:#bb0a1e;border:#bb0a1e">Update</button></center>

           </form>
<br>
<center>
      <div class="card-footer text-muted" style="background-color:white">
          © Copyright 2019 myBlood. All rights reserved.
      </div>

</center>
<script src="../../bootstrap/popper.js"></script>
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<script>
      function getDistrict(val) {
       //alert(val);
      $.ajax({
      type: "POST",
      url: "getDistrict.php",
      data: {state_id:val},
      success: function(data){
        //alert(data);
        // document.write(data);
       $("#district-list").html(data);
      },error: function(data){
      alert(data);
      }
      });
      }
      function getCity(val) {
      $.ajax({
      type: "POST",
      url: "getCity.php",
      data: {district_id:val},
      success: function(data){
        // document.write(data);
      $("#city-list").html(data);
      },error: function(data){
      alert(data);
      }
      });
      }
</script>
</body>
</html>
<?php
}
else
{
     echo '<script>alert("Session is out, Please Login Again");</script>
     <meta http-equiv="refresh" content="0;URL=http://localhost/myblood/index.php" /> ';

}
?>