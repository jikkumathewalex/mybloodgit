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
document.getElementById("acc_date").setAttribute("max", today);
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
          <a class="navbar-brand" href="../hospital_home.php">
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
      <a href="../hospital_home.php" style="color:white"><i class="fas fa-arrow-left"></i></a>
      <form action="../hospital_home.php"><button type="submit" class="btn btn-outline-danger" style="color:white">Home</button></form>
          <form action="../hospital_stock/hospital_stock.php"><button type="submit" class="btn btn-outline-danger" style="color:white">Hospital Stock</button></form>
          <form action="../hospital_request/hospital_request.php"><button type="submit" class="btn btn-outline-danger" style="color:white">Notificaton</button></form>
          <form action="../feedback/hospital_feedback.php"><button type="submit" class="btn btn-outline-danger" style="color:white">Feedback</button></form>

          <div class="float-right">
            <i class="fas fa-phone-square"></i> <?php echo $row['mobile']?>&nbsp
            <i class="fas fa-envelope-square"></i> <?php echo $row['email']?>&nbsp

                <div class="btn-group dropleft">
                <button type="button" id="Logout" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="sr-only">Toggle Dropdown</span>
                </button>

                <div class="dropdown-menu">
                <center>
              <a class="dropdown-item" href="../hospital_stock/hospital_stock.php">Hospital Stock</a>
              <a class="dropdown-item" href="../hospital_request/hospital_request.php">Notificaton</a>
              <a class="dropdown-item" href="../feedback/hospital_feedback.php">Feedback</a>
              </center>
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
       $query="select * from tbl_reg R, tbl_login L, tbl_state S, tbl_district D, tbl_city C, tbl_hospital H, tbl_accreditation A where R.login_id='$login_id' AND L.login_id='$login_id' AND R.state_id=S.state_id AND R.district_id=D.district_id AND R.city_id=C.city_id AND H.login_id='$login_id'";
       $res=mysqli_query($con,$query);
       if (!$res) {
        printf("Error: %s\n", mysqli_error($con));
        exit();
    }
       $row=mysqli_fetch_array($res);
       
      ?>

      <form class="container" action="hosp_edit_profile_action.php" method="post" enctype="multipart/form-data">

<div class="card text-left">
<div class="input-group mb-3">
<div class="input-group-prepend">
  <span class="input-group-text" id="basic-addon1" style="background-color:#bb0a1e;color:white;width:210px">Name</span>
</div>
<input type="text" class="form-control" id="txtBBName" name="txtBBName" onchange='ValidateName();' required="" value="<?php echo $row['name'] ?>">&nbsp
</div>
<div class="input-group mb-3">
<div class="input-group-prepend">
  <span class="input-group-text" id="basic-addon1" style="background-color:#bb0a1e;color:white;width:210px">Email</span>
</div>
<input type="text" class="form-control" id="txtEmail" name="txtEmail" onchange='ValidateEmail();' required="" value="<?php echo $row['email'] ?>">&nbsp
</div>
<div class="input-group mb-3">
<div class="input-group-prepend">
  <span class="input-group-text" id="basic-addon1" style="background-color:#bb0a1e;color:white;width:210px">Phone</span>
</div>
<input type="text" class="form-control" id="txtPhone" name="txtPhone" onchange='ValidatePhone();' required="" value="<?php echo $row['mobile'] ?>">&nbsp
</div>
<div class="input-group mb-3">
<div class="input-group-prepend">
  <span class="input-group-text" id="basic-addon1" style="background-color:#bb0a1e;color:white;width:210px">Password</span>
</div>
<input type="password" class="form-control" id="txtPassword" name="txtPassword" required="" value="<?php echo $row['password'] ?>">&nbsp
</div>
<div class="input-group mb-3">
<div class="input-group-prepend">
  <span class="input-group-text" id="basic-addon1" style="background-color:#bb0a1e;color:white;width:210px">Hospital Latitude</span>
</div>
<input type="text" class="form-control" id="txtLat" name="txtLat" required="" value="<?php echo $row['hos_latitude'] ?>">&nbsp
</div>
<div class="input-group mb-3">
<div class="input-group-prepend">
  <span class="input-group-text" id="basic-addon1" style="background-color:#bb0a1e;color:white;width:210px">Hospital Longitude</span>
</div>
<input type="text" class="form-control" id="txtLong" name="txtLong" required="" value="<?php echo $row['hos_longitude'] ?>">&nbsp
</div>

<div class="input-group mb-3">
<div class="input-group-prepend">
  <span class="input-group-text" id="basic-addon1" style="background-color:#bb0a1e;color:white;width:210px">Accreditation Date</span>
</div>
<input type="date" class="form-control" id="acc_date" name="acc_date" required="" value="<?php echo $row['accreditation_date'] ?>" onclick="ValidateDate();">&nbsp
</div>


<div class="input-group mb-3">
<div class="input-group-prepend">
  <span class="input-group-text" id="basic-addon1" style="background-color:#bb0a1e;color:white;width:210px">Accreditation</span>
</div>
<select name="ddacc" id="ddacc" title="Select Accreditation" class="form-control">
                                                     <option style="background-color:white;color:white" value="<?php echo $row['accreditation_id'] ?>"><?php echo $row['accreditation'] ?></option>
                                                     <?php
                                                      $query=mysqli_query($con,"SELECT * FROM tbl_accreditation WHERE status=1");
                                                      while($row_state=mysqli_fetch_array($query))
                                                      {
                                                       echo "<option style='background-color:white;color:black' value='".$row_state['accreditation_id']."'>".$row_state['accreditation']."</option>";
                                                      }?>
</select></div>

<div class="input-group mb-3">
<div class="input-group-prepend">
  <span class="input-group-text" id="basic-addon1" style="background-color:#bb0a1e;color:white;width:210px"><a style="color:white" href="../../hos_acc_certificates/<?php echo $row['accreditation_certificate'] ?>" target="_blank">Accreditation Certificate</a>&nbsp<i class="fas fa-link"></i>
</span>
</div>
<input type="file" class="form-control" name="hos_acc_certificate" id="hos_acc_certificate" accept="application/pdf" placeholder="Accreditation Certificate">
</div>

<div class="input-group mb-3">
<div class="input-group-prepend">
 <span class="input-group-text" id="basic-addon1" style="background-color:#bb0a1e;color:white;width:210px">State</span>
</div>
<select name="ddstate" id="state-list" title="Select State" class="form-control" onchange="getDistrict(this.value);">
                                                     <option style="background-color:white;color:white" value="<?php echo $row['state_id'] ?>"><?php echo $row['state'] ?></option>
                                                     <?php
                                                      $query=mysqli_query($con,"SELECT * FROM tbl_state WHERE status=1");
                                                      while($row_state=mysqli_fetch_array($query))
                                                      {
                                                       echo "<option style='background-color:white;color:black' value='".$row_state['state_id']."'>".$row_state['state']."</option>";
                                                      }?>
</select>
</div>



<div class="input-group mb-3">
<div class="input-group-prepend">
  <span class="input-group-text" id="basic-addon1" style="background-color:#bb0a1e;color:white;width:210px">District</span>
</div>

<select name="dddistrict" id="district-list" title="Select District" class="form-control" onchange="getCity(this.value);">
                                                     <option  value="<?php echo $row['district_id'] ?>"><?php echo $row['district'] ?></option>
                                                     <?php
                                                      $query=mysqli_query($con,"SELECT * FROM tbl_district WHERE status=1");
                                                      while($row_district=mysqli_fetch_array($query))
                                                      {
                                                       echo "<option style='background-color:white;color:black' value='".$row_district['district_id']."'>".$row_district['district']."</option>";
                                                      }?> 
</select> 
</div> 

<div class="input-group mb-3">
<div class="input-group-prepend">
  <span class="input-group-text" id="basic-addon1" style="background-color:#bb0a1e;color:white;width:210px">City</span>
</div>
<select name="ddcity" id="city-list" title="Select City" class="form-control">
                                                     <option style="background-color:white;color:white" value="<?php echo $row['city_id'] ?>"><?php echo $row['city'] ?></option>
                                                     <?php
                                                      $query=mysqli_query($con,"SELECT * FROM tbl_city WHERE status=1");
                                                      while($row=mysqli_fetch_array($query))
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