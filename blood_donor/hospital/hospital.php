<?php
     include("../database/dbconnect.php");
     if (isset($_GET['Message']))
       {
        echo "<script>alert( '".$_GET['Message']."');</script>";
       }
       
       $login_id=$_SESSION['s_login_id'];

    $email=$_SESSION['s_email'];
    $password=$_SESSION['s_password'];
    $type=$_SESSION['s_type'];
    $sql="SELECT * FROM tbl_login WHERE email='$email' AND password='$password' AND type='$type'";
    $result=mysqli_query($con,$sql);
    $rowcount=mysqli_num_rows($result);
    if($rowcount !=0 )
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

      <style>
  #map{
width:100%;
height:30rem;
}
</style>

<script>
function initMap() {
var map = new google.maps.Map(document.getElementById('map'), {
zoom: 3.8,
center: {lat: 28.627, lng: 77.206}
});

<?php
$querym=mysqli_query($con,"SELECT HOS.*, REG.* FROM tbl_hospital HOS, tbl_reg REG where HOS.status=1 AND HOS.reg_id=REG.reg_id");
$beaches = "[";
while($rowm=mysqli_fetch_array($querym))
{

    $name = $rowm['name'];
    $latitude=$rowm['hos_latitude'];
    $longitude=$rowm['hos_longitude'];
  
    $beaches .= "['$name', $latitude, $longitude],";
}
$beaches .= "]";
?>

var beaches = <?php echo($beaches) ?>;
// console.log(beaches);
// var beaches = [
// ['Bondi Beach', -33.890542, 151.274856],
// ['Coogee Beach', -33.923036, 151.259052],
// ['Cronulla Beach', -34.028249, 151.157507],
// ["Muthoot", 9.528651, 76.822251]
// // ['Manly Beach', -33.80010128657071, 151.28747820854187],
// // ['Maroubra Beach', -33.950198, 151.259302]
// ];

// var beaches = [ ["Poyanil", 28.630787, 77.223216],["Muthoot", 9.528651, 76.822251]];

for (var i = 0; i < beaches.length; i++) {
var beach = beaches[i];
var marker = new google.maps.Marker({
position: {lat: beach[1], lng: beach[2]},
map: map,
title: beach[0]
});
}


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
          <form action="../blooddonorHome.php"><button type="submit" class="btn btn-outline-danger" style="color:white">Home</button></form>
          <form action="../notification/notification.php"><button type="submit" class="btn btn-outline-danger" style="color:white">Notification</button></form>
      <form action="../blood_availability/blood_availability.php"><button type="submit" class="btn btn-outline-danger" style="color:white">Blood Availability</button></form>
      <form action="../blood_campaign/blood_bank_blood_campaign.php"><button type="submit" class="btn btn-outline-danger" style="color:white">Blood Campaign</button></form>
      <form action="../feedback/feedback.php"><button type="submit" class="btn btn-outline-danger" style="color:white">Feedback</button></form>
      <form action="../blood_bank/blood_bank.php"><button type="submit" class="btn btn-outline-danger" style="color:white">Blood Bank</button></form>
          <div class="float-right">
            <i class="fas fa-phone-square"></i> <?php echo $row['mobile']?>&nbsp
            <i class="fas fa-envelope-square"></i> <?php echo $row['email']?>&nbsp
              <div class="btn-group dropleft">
              <button type="button" id="Logout" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropdown</span>
              </button>

              <div class="dropdown-menu">
              <center>
              <a class="dropdown-item" href="../feedback/feedback.php">Feedback</a>
              <a class="dropdown-item" href="../blood_bank/blood_bank.php">Blood Bank</a>
              <a class="dropdown-item" href="../notification/notification.php">Notification</a>
              <a class="dropdown-item" href="../blood_campaign/blood_bank_blood_campaign.php">Blood Campaign</a>
              <a class="dropdown-item" href="../blood_availability/blood_availability.php">Blood Availability</a>


              </center>

                <div class="dropdown-divider"></div>
                <center>
                <a class="dropdown-item" href="../edit_profile/blood_donor_edit_profile.php">Edit Profile</a>
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
          <center><h2>HOSPITAL</h2></center>
      </div>
      <br>
 
      <div id="map"></div>


      <br>


      <center>
            <div class="card-footer text-muted" style="background-color:white">
                © Copyright 2019 myBlood. All rights reserved.
            </div>
      </center>

      <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVtoU6ioC5PVtX8DeQD7ZWpy8AJvvmO9E&callback=initMap"></script>
      <script src="../../bootstrap/jquery.js"></script>
      <script src="../../bootstrap/popper.js"></script>
      <script src="../../bootstrap/js/bootstrap.min.js"></script>

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
