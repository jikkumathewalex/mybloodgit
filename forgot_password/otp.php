<?php
include("../database/dbconnect.php");

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
</head>

<body>
<nav class="navbar navbar-light bg-light">
          <a class="navbar-brand" href="../index.php">
            <img src="../images/logo.png" width="50" height="50" class="d-inline-block align-top" alt="">
            <h1 class="d-inline">myBlood</h1>
          </a>
       
      </nav>
    
      <?php
       $query="select * from tbl_details";
       $res=mysqli_query($con,$query);
       ?>

       <?php while($row=mysqli_fetch_array($res)){ ?>
      <nav class="navbar" style="background-color:#bb0a1e;color:white">
      <a href="../index.php" style="color:white"><i class="fas fa-arrow-left"></i></a>
          <div class="float-right">
            <i class="fas fa-phone-square"></i> <?php echo $row['mobile']?>&nbsp
            <i class="fas fa-envelope-square"></i> <?php echo $row['email']?>&nbsp

                         </div>
      </nav>
      <?php
      }
      ?><br><br>

<div style="color:#bb0a1e" class="card-header" >
          <center><h2>FORGOT PASSWORD</h2></center>
      </div><br>
      <form  class="container" action="otp_action.php" method="post">

            <div class="card text-left">
      <div class="input-group mb-3">
          <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1" style="background-color:#bb0a1e;color:white;width:220px">Email ID</span>
          </div>
          <input class="form-control" type="text" id="otp" name="otp" placeholder="Enter OTP" required>
      </div>
       <center><button type="submit" id="submit" name="submit" class="btn btn-primary " style="background:#bb0a1e;border:#bb0a1e">Submit</button></center>

      </form>
</center>
<br><br>
<center>


      <div class="card-footer text-muted" style="background-color:white">
          © Copyright 2019 myBlood. All rights reserved.
      </div>

</center>
<script src="../bootstrap/jquery.js"></script>
<script src="../bootstrap/popper.js"></script>
<script src="../#bb0a1ebootstrap/js/bootstrap.min.js"></script>
</body>
</html>
