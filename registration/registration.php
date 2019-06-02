<?php
     include("../database/dbconnect.php");
     if (isset($_GET['Message']))
       {
        echo "<script>alert( '".$_GET['Message']."');</script>";
       }
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
      <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="../css/myblood.css">
      <script type="text/javascript">
     function ValidateName() 
     {
      var val = document.getElementById('name').value;

      if (!val.match(/^[A-Za-z][A-Za-z" "]{3,}$/)) 
      {
        alert('Please Enter Valid Name');
        document.getElementById('name').value = "";
        return false;
      }

      return true;
     }

     function ValidateEmail()
     {
          var val = document.getElementById('email').value;

          if (!val.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/))
          {
               alert('Please Enter Valid Email');
               document.getElementById('email').value="";
               return false;
          }

          return true;
     }

     function ValidatePhone() 
     {
      var val = document.getElementById('phone').value;

      if (!val.match(/^[6-9]\d{9}$/)) 
      {
        alert('Please Enter Valid Phone Number');
	   document.getElementById('phone').value = "";
        return false;
    }

     return true;
    }

    function ValidateLPhone()
    {
     var val = document.getElementById('lphone').value;

     if (!val.match(/^[6-9]\d{9}$/)) 
     {
      alert('Please Enter Valid Phone Number');
      document.getElementById('lphone').value = "";
      return false;
     }

      return true;
    }
    
    function ValidatePlace()
    {
     var state=document.getElementById('state-list').value;
      if(state == 0)
      {
       alert("Please Select Your State");
       return false;
      }
     
     var district=document.getElementById('district-list').value;
     if(district == 0)
     {
      alert("Please Select Your District");
      return false;
     }
     
     var city=document.getElementById('city-list').value;
     if(city == 0)
     {
      alert("Please Select your City");
      return false;
     }
    }
    
    
    
    
     </script>
</head>

<body>
      <nav class="navbar navbar-light bg-light">
          <a class="navbar-brand" href="../index.php">
            <img src="../images/logo.png" width="50" height="50" class="d-inline-block align-top" alt="">
            <h1 class="d-inline">myBlood</h1>
          </a>
          <form class="form-inline" action="../login/login_action.php" method="post">
               <div class="form-group">
                   <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Enter Valid Email ID" id="login" name="login" class="form-control" oninput="this.reportValidity()" required="" aria-describedby="emailHelp" placeholder="Enter email">&nbsp
                   <input type="password" id="password" name="password" align="right" required="" class="form-control" oninput="this.reportValidity()" placeholder="Password">&nbsp
               </div>
               <button type="submit" class="btn btn-primary float-right" style="background:#bb0a1e;border:#bb0a1e">Log In</button>
               <ul class="mylist">
                  <li><a href="forgot_password.php"><small id="emailHelp" class="form-text text-muted">Forgot password?</small></a></li>
          </form>
      </nav>
      <?php
       $query="select * from tbl_details";
       $res=mysqli_query($con,$query);
       ?>

       <?php while($row=mysqli_fetch_array($res)){ ?>
      <nav class="navbar" style="background-color:#bb0a1e;color:white">
      <a href="../index.php" style="color:white"><i class="fas fa-arrow-left"></i></a>
Give Blood, Give Life!
          <div class="float-right">
            <i class="fas fa-phone-square"></i> <?php echo $row['mobile']?>&nbsp
            <i class="fas fa-envelope-square"></i> <?php echo $row['email']?>&nbsp

                </div>

          </div>
      </nav>
      <?php
      }
      ?><br><br>

<center>

<div style="color:#bb0a1e" class="card-header" >
          <center><h2>REGISTRATION</h2></center>
      </div><br>
      <form  class="container" action="reg_action.php" method="post" enctype="multipart/form-data">
            <div class="card text-left">
      <div class="input-group mb-3">
          <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1" style="background-color:#bb0a1e;color:white;width:220px">Name</span>
          </div>
          <input type="text" class="form-control" id="name" name="name" oninput="this.reportValidity()" required="" title="Enter Name" placeholder="Enter Name" onchange="ValidateName();">&nbsp
      </div>
      <div class="input-group mb-3">
          <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1" style="background-color:#bb0a1e;color:white;width:220px">Email</span>
          </div>
          <input type="text" class="form-control" id="email" name="email" oninput="this.reportValidity()" required="" title="Enter Email" placeholder="Enter Email" onchange="ValidateEmail();">&nbsp
      </div>
      <div class="input-group mb-3">
          <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1" style="background-color:#bb0a1e;color:white;width:220px">Phone</span>
          </div>
          <input type="text" class="form-control" id="phone" name="phone" oninput="this.reportValidity()" required="" title="Enter Phone" placeholder="Enter Phone" onchange="ValidatePhone();">&nbsp
      </div>
      <div class="input-group mb-3">
          <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1" style="background-color:#bb0a1e;color:white;width:220px">Password</span>
          </div>

          <input type="password" class="form-control" id="rpassword" name="rpassword" oninput="this.reportValidity()" required="" title="Enter Password" placeholder="Enter Password">&nbsp


      </div>
      <div class="input-group mb-3">
          <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1" style="background-color:#bb0a1e;color:white;width:220px">Location</span>
          </div>
<div class="col-xs-12">
      <select name="ddstate" id="state-list" title="Select State" style="width:17rem;display:inline-block" class="form-control col-xs-4" onchange="getDistrict(this.value);">
                                                     <option style="background-color:white;color:white" value="0">Select State</option>
                                                     <?php
                                                      $query=mysqli_query($con,"SELECT * FROM tbl_state WHERE status=1");
                                                      while($row=mysqli_fetch_array($query))
                                                      {
                                                       echo "<option style='background-color:white;color:black' value='".$row['state_id']."'>".$row['state']."</option>";
                                                      }?>
                                                    </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <select name="dddistrict" id="district-list" title="Select District" style="width:17rem;display:inline-block" class="form-control col-xs-4" onchange="getCity(this.value);">
                                                     <option style="background-color:white" value="0">Select District</option>
                                                     
                                                    </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <select name="ddcity" id="city-list" title="Select City" style="width:17rem;display:inline-block" class="form-control col-xs-4">
                                                     <option style="background-color:white" value="0">Select City</option>
                                                     
       </select>
                                          
</div>
                                                    </div>
<div class="input-group mb-3">
          <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1" style="background-color:#bb0a1e;color:white;width:220px">User Type</span>
          </div>
&nbsp;&nbsp;
          <input type="radio" name="usertype" value="1" required><label class="form-control">Blood Donor</label>&nbsp&nbsp
          <input type="radio" name="usertype" value="2" required><label class="form-control">Blood Bank</label>&nbsp&nbsp
          <input type="radio" name="usertype" value="3" required><label class="form-control">Hospital</label>

      </div>
      <center><button type="submit" class="btn btn-primary" style="background:#bb0a1e;border:#bb0a1e">Next</button></center>

</form>
<br>
                                           <div id="bbank" style="display:none">
                                                    <div class="input-group mb-3">
      <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1" style="background-color:#bb0a1e;color:white;width:220px">Upload Accreditation Certificate</span>
          </div>
          <select name="ddbbacc" id="ddbbacc" title="Select Accreditation Organization" class="form-control" >
                                                     <option style="background-color:white" value="0">Select Accreditation Organization</option>
                                                  
                                                     <?php
                                                  
                                                      $query=mysqli_query($con,"SELECT * FROM tbl_accreditation as AC where AC.status=1");
                                                       
                                                      while($row=mysqli_fetch_array($query))
                                                      {
                                                           $accreditation_id=$row['accreditation_id'];
                                                           $accreditation=$row['accreditation'];
                                                           ?>
                                                           <option value="<?php echo $accreditation_id ?>"><?php echo $accreditation ?></option>
                                                       
                                                     <?php } ?>

                                                    </select>
                                                    <input type="file" class="form-control" name="bb_acc_certificate" id="bb_acc_certificate" accept="application/pdf" placeholder="Accreditation Certificate" >      </div>
                                                      <center><button type="submit" class="btn btn-primary " style="background:#bb0a1e;border:#bb0a1e">Sign Up</button></center>

                                                      </div>

                                                      <div id="hospital" style="display:none">
                                                    <div class="input-group mb-3">
      <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1" style="background-color:#bb0a1e;color:white;width:220px">Upload Accreditation Certificate</span>
          </div>
          <select name="ddhosacc" id="ddhosacc" title="Select Accreditation Organization" class="form-control" >
                                                     <option style="background-color:white" value="0">Select Accreditation Organization</option>

                                                     <?php
                                                      
                                                      $query=mysqli_query($con,"SELECT * FROM tbl_accreditation as AC where AC.status=1");
                                                  
                                                      while($row=mysqli_fetch_array($query))
                                                      {
                                                           $accreditation_id=$row['accreditation_id'];
                                                           $accreditation=$row['accreditation'];
                                                           ?>
                                                           <option value="<?php echo $accreditation_id ?>"><?php echo $accreditation ?></option>
                                                       
                                                     <?php } ?>

                                                    </select>
                                                    <input type="file" class="form-control" name="hos_acc_certificate" id="hos_acc_certificate" accept="application/pdf" placeholder="Accreditation Certificate" >
                                                    
                                                      </div>
                                                      <center><button type="submit" class="btn btn-primary " style="background:#bb0a1e;border:#bb0a1e">Sign Up</button></center>

                                                      </div>
                                                    <!-- <input type="submit" class="form-control" name="submit" value="Sign Up"> -->
                                                  </form>
                                              </div>
                                             
                                        
                 

                       </form>
      <br><br>
</center>
<br><br>







<center>


      <div class="card-footer text-muted" style="background-color:white">
          © Copyright 2019 myBlood. All rights reserved.
      </div>

</center>
  <!-- SCRIPTS -->
 <script>
      function getDistrict(val) {
      $.ajax({
      type: "POST",
      url: "getDistrict.php",
      data: {state_id:val},
      success: function(data){
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

      <script src="../js/jquery.js"></script>
     <script src="../js/bootstrap.min.js"></script>
     <script src="../js/jquery.stellar.min.js"></script>
     <script src="../js/jquery.magnific-popup.min.js"></script>
     <script src="../js/smoothscroll.js"></script>
     <script src="../js/custom.js"></script>
<!-- <script src="../bootstrap/jquery.js"></script> -->
<script src="../bootstrap/popper.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<?php
// }
// else
// {
//      echo '<script>alert("Session is out, Please Login Again");</script>
//      <meta http-equiv="refresh" content="0;URL=http://localhost/myblood/index.php" /> ';

// }
?>
