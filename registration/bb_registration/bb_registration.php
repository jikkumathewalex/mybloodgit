<?php
     include("../../database/dbconnect.php");
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
      <link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="../../css/myblood.css">
      <script type="text/javascript">


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


    function ValidateAge()
     { 
       var val = document.getElementById('age').value;
       
       if ( !( val > 18 && val<100 ) )
       {
        alert("The age must be a number between 18 and 100");
        document.getElementById('age').value = "";
        return false;
       }

       return true;
     }

     function ValidateBGroup() 
     {
      var val = document.getElementById('bgroup').value;

      if (!val.match(/^(A|B|AB|O)[+-]$/)) 
      {
        alert('Please Enter Valid Blood Group');
	   document.getElementById('bgroup').value = "";
        return false;
    }

     return true;
    }

    function ValidateWeight()
     { 
       var val = document.getElementById('weight').value;
       if ( !( val >= 50) )
       {
        alert("Blood Donors should weigh atleast 50 Kg.");
        document.getElementById('weight').value = "";
        return false;
       }

       return true;
     }
     </script>
</head>

<body>
      <nav class="navbar navbar-light bg-light">
          <a class="navbar-brand" href="../../index.php">
            <img src="../../images/logo.png" width="50" height="50" class="d-inline-block align-top" alt="">
            <h1 class="d-inline">myBlood</h1>
          </a>
          <form class="form-inline" action="../../login/login_action.php" method="post">
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
          <center><h2>BLOOD BANK REGISTRATION</h2></center>
      </div><br>
      



                                                    <form class="container" action="bb_registration_action.php" method="post" enctype="multipart/form-data">
                                                    
                                                    <div class="input-group mb-3">
          <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1" style="background-color:#bb0a1e;color:white;width:250px">Blood Bank Latitude</span>
          </div>
          <input type="text" class="form-control" id="latitude" name="latitude" pattern="-?\d{1,3}\.\d+" oninput="this.reportValidity()" title="Enter Blood Bank Latitude" placeholder="Enter Blood Bank Latitude" required>&nbsp
      </div>

      <div class="input-group mb-3">
      <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1" style="background-color:#bb0a1e;color:white;width:250px">Blood Bank Longitude</span>
          </div>
          <input type="text" class="form-control" id="longitude" name="longitude" pattern="-?\d{1,3}\.\d+" oninput="this.reportValidity()" title="Enter Blood Bank Longitude" placeholder="Enter Blood Bank Longitude" required>&nbsp
      </div>
                               
      <div class="input-group mb-3">
      <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1" style="background-color:#bb0a1e;color:white;width:250px">Accreditation Date</span>
          </div>
          <input type="date" class="form-control" id="acc_date" name="acc_date" onclick="ValidateDate();" required>
    </div>

                                                    <div class="input-group mb-3">
                                                    
      <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1" style="background-color:#bb0a1e;color:white;width:250px">Upload Accreditation Certificate</span>
          </div>
          <select name="ddbbacc" id="ddbbacc" title="Select Accreditation Organization" class="form-control" required>
                                                     <option style="background-color:white" value="">Select Accreditation Organization</option>
                                                  
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
                                                    <input type="file" class="form-control" name="bb_acc_certificate" id="bb_acc_certificate" accept="application/pdf" placeholder="Accreditation Certificate" required>      </div>
                                                      <center><button type="submit" class="btn btn-primary " style="background:#bb0a1e;border:#bb0a1e">Sign Up</button></center>

                                                      </form>

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

      <script src="../../js/jquery.js"></script>
     <script src="../../js/bootstrap.min.js"></script>
     <script src="../../js/jquery.stellar.min.js"></script>
     <script src="../../js/jquery.magnific-popup.min.js"></script>
     <script src="../../js/smoothscroll.js"></script>
     <script src="../../js/custom.js"></script>
<!-- <script src="../bootstrap/jquery.js"></script> -->
<script src="../../bootstrap/popper.js"></script>
<script src="../../bootstrap/js/bootstrap.min.js"></script>
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
