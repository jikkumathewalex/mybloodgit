<?php
     include("database/dbconnect.php");
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
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/solid.css" integrity="sha384-osqezT+30O6N/vsMqwW8Ch6wKlMofqueuia2H7fePy42uC05rm1G+BUPSd2iBSJL" crossorigin="anonymous">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/fontawesome.css" integrity="sha384-BzCy2fixOYd0HObpx3GMefNqdbA7Qjcc91RgYeDjrHTIEXqiF00jKvgQG0+zY/7I" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="../css/myblood.css">
      

      <!-- <style>
       /* Set the size of the div element that contains the map */
      #map {
        height: 20rem;  /* The height is 400 pixels */
        width: 10rem;  /* The width is the width of the web page */
       }
    </style> -->
</head>

<body>
      <nav class="navbar navbar-light bg-light">
          <a class="navbar-brand" href="bbank_home.php">
            <img src="../images/logo.png" width="50" height="50" class="d-inline-block align-top" alt="">
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
          Give Blood, Give Life!
          <div class="float-right">
            <i class="fas fa-phone-square"></i> <?php echo $row['mobile']?>&nbsp
            <i class="fas fa-envelope-square"></i> <?php echo $row['email']?>&nbsp

                <div class="btn-group dropleft">
                <button type="button" id="Logout" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="sr-only">Toggle Dropdown</span>
                </button>

                <div class="dropdown-menu">
                <center>
                  <a class="dropdown-item" href="edit_profile/blood_bank_edit_profile.php">Edit Profile</a>
                </center>
                  <div class="dropdown-divider"></div>
                  <center>
                  <a class="dropdown-item" style="background-color:#bb0a1e;color:white;border-radius:3px" href="logout.php">Logout</a>
                  </center>
                </div>
              </div>

          </div>
      </nav>
      <?php
      }
      ?><br><br>

<center>


<?php
       $query0="select * from tbl_bbank_stock where login_id='$login_id' AND status=1";
       $res0=mysqli_query($con,$query0);
       $row0=mysqli_num_rows($res0);

       $query1="select * from tbl_notification where login_id!='$login_id' AND status=1";
       $res1=mysqli_query($con,$query1);
       $row1=mysqli_num_rows($res1);

       $query2="select * from tbl_blood_camp where login_id='$login_id' AND status=1";
       $res2=mysqli_query($con,$query2);
       $row2=mysqli_num_rows($res2);

?>

<form style="margin:10px">
  <ul class="mylist">
  <li style="margin:5px"><a href="blood_bank_stock/blood_bank_stock.php"><button type="button" class="btn btn-outline-danger" style="border-radius:40px;width:11rem;height:10rem">BLOOD BANK STOCK <br><span class="w3-badge w3-red"><?php echo $row0; ?> </span></button></a>
</li>
  <li><a href="blood_bank_request/blood_bank_request.php"><button type="button" class="btn btn-outline-danger" style="border-radius:40px;width:10rem;height:10rem">NOTIFICATION  <br><span class="w3-badge w3-red"><?php echo $row1; ?> </span></button></a>&nbsp
  <a href="blood_campaign/blood_bank_blood_campaign.php"><button type="button" class="btn btn-outline-danger" style="border-radius:40px;width:10rem;height:10rem">BLOOD CAMPAIGN  <br><span class="w3-badge w3-red"><?php echo $row2; ?> </span></button></a></li>
</li>
<li style="margin:5px"><a href="feedback/bb_feedback.php"><button type="button" class="btn btn-outline-danger" style="border-radius:40px;width:11rem;height:10rem">FEEDBACK</button></a>
    </li>



</form>


<!-- 
<div class="col-lg-4 col-md-6 col-xs-12" style="    height: 350px;">

<div id="map" style="height: 100%;"></div>
<script>
function initMap() {
    var myLatLng = {
        lat: <echo the latitude from db here>,
        lng: <echo the longitude from db here>,
    };

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 18,
        center: myLatLng,
    });

    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
    });

}
</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVtoU6ioC5PVtX8DeQD7ZWpy8AJvvmO9E&callback=initMap">
</script>
</div> -->
<?php
       $querym="select * from tbl_blood_bank where login_id='$login_id' AND status=1";
       $resm=mysqli_query($con,$querym);
       $rowm=mysqli_fetch_array($resm);
       $latitude=$rowm['bb_latitude'];
       $longitude=$rowm['bb_longitude'];

?>
<!-- <iframe 
  width="300" 
  height="170" 
  frameborder="0" 
  scrolling="no" 
  marginheight="0" 
  marginwidth="0" 
  src="https://maps.google.com/maps?q='9.5283756','76.8200842'&hl=es;z=14&amp;output=embed"
 >
 </iframe>
 <br />
 <small>
   <a 
    href="https://maps.google.com/maps?q='9.5283756','76.8200842'&hl=es;z=14&amp;output=embed" 
    style="color:#0000FF;text-align:left" 
    target="_blank"
   >
     See map bigger
   </a>
 </small> -->
 



</center>
<br><br>
<!-- <div id="map"></div>
 <script>
// Initialize and add the map
function initMap() {
  // The location of Uluru
  var loc = {lat: <?php echo $latitude; ?>, lng: <?php echo $longitude; ?>};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 4, center: loc});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: loc, map: map});
}
    </script> -->
<center>


      <div class="card-footer text-muted" style="background-color:white">
          © Copyright 2019 myBlood. All rights reserved.
      </div>

</center>
<!-- <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVtoU6ioC5PVtX8DeQD7ZWpy8AJvvmO9E&callback=initMap">
    </script> -->
<script src="../bootstrap/jquery.js"></script>
<script src="../bootstrap/popper.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>

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
