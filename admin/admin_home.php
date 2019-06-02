<?php
     include("../database/dbconnect.php");
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
</head>

<body>
      <nav class="navbar navbar-light bg-light">
          <a class="navbar-brand" href="admin_home.php">
            <img src="../images/logo.png" width="50" height="50" class="d-inline-block align-top" alt="">
            <h1 class="d-inline">myBlood</h1>
          </a>
          <form class="form-inline" action="../action.php" method="post">
               <div class="form-group">
                   <label style="color:#bb0a1e"><i class="fas fa-user"></i>&nbspWelcome Administrator</label>
               </div>
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

                <div class="btn-group dropleft">
                <button type="button" id="Logout" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="sr-only">Toggle Dropdown</span>
                </button>

                <div class="dropdown-menu">
                  <center>
                  <a class="dropdown-item" href="users/blood_donor/admin_blood_donor_approval.php">Blood Donor</a>
                  <a class="dropdown-item" href="users/blood_bank/admin_blood_bank_approval.php">Blood Bank</a>
                  <a class="dropdown-item" href="users/hospital/admin_hospital_approval.php">Hospital</a>
                  </center>
                  <div class="dropdown-divider"></div>
                  <center>
                  <a class="dropdown-item" href="feedback/admin_feedback.php">Feedback</a>
                  </center>
                  <div class="dropdown-divider"></div>
                  <center>
                  <a class="dropdown-item" href="notification/admin_new_notification.php">Notification</a>
                  </center>
                  <div class="dropdown-divider"></div>
                  <center>
                  <a class="dropdown-item" href="website_details/admin_website_details_info/admin_info.php">Website Info</a>
                  <a class="dropdown-item" href="website_details/admin_website_details_location/admin_location.php">Location</a>
                  <a class="dropdown-item" href="website_details/admin_website_details_bg/admin_bg.php">Blood Group</a>
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
       $query0="select * from tbl_donor where status=0";
       $res0=mysqli_query($con,$query0);
       $row0=mysqli_num_rows($res0);
       $query00="select * from tbl_blood_bank where status=0";
       $res00=mysqli_query($con,$query00);
       $row00=mysqli_num_rows($res00);
       $query000="select * from tbl_hospital where status=0";
       $res000=mysqli_query($con,$query000);
       $row000=mysqli_num_rows($res000);

       $query1="select * from tbl_feedback where status=1";
       $res1=mysqli_query($con,$query1);
       $row1=mysqli_num_rows($res1);

       $query2="select * from tbl_notification where status=1";
       $res2=mysqli_query($con,$query2);
       $row2=mysqli_num_rows($res2);
       ?>

<form style="margin:10px">
  <ul class="mylist"><p><li style="margin:5px"><a href="users/admin_users.php"><button type="button" class="btn btn-outline-danger" style="border-radius:40px;width:10rem;height:10rem">APPROVAL  <span class="w3-badge w3-red"><?php echo $row0+$row00+$row000; ?> </span></button></a></p>
</li>
  <li><a href="feedback/admin_feedback.php"><button type="button" class="btn btn-outline-danger" style="border-radius:40px;width:10rem;height:10rem">FEEDBACK  <span class="w3-badge w3-red"><?php echo $row1; ?> </span></button></a>&nbsp
  <a href="notification/admin_new_notification.php"><button type="button" class="btn btn-outline-danger" style="border-radius:40px;width:10rem;height:10rem">NOTIFICATION  <span class="w3-badge w3-red"><?php echo $row2; ?> </span></button></a></li>
  <li style="margin:5px"><a href="website_details/admin_website_details.php"><button type="button" class="btn btn-outline-danger" style="border-radius:40px;width:10rem;height:10rem">WEBSITE DETAILS</button></a>
</li>

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
