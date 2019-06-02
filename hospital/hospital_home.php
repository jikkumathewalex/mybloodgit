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
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/solid.css" integrity="sha384-osqezT+30O6N/vsMqwW8Ch6wKlMofqueuia2H7fePy42uC05rm1G+BUPSd2iBSJL" crossorigin="anonymous">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/fontawesome.css" integrity="sha384-BzCy2fixOYd0HObpx3GMefNqdbA7Qjcc91RgYeDjrHTIEXqiF00jKvgQG0+zY/7I" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="../css/myblood.css">
</head>

<body>
<nav class="navbar navbar-light bg-light">
          <a class="navbar-brand" href="hospital_home.php">
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
                  <a class="dropdown-item" href="edit_profile/hosp_edit_profile.php">Edit Profile
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
       $query0="select * from tbl_hos_stock where login_id='$login_id' AND status=1";
       $res0=mysqli_query($con,$query0);
       $row0=mysqli_num_rows($res0);

       $query1="select * from tbl_notification where login_id!='$login_id' AND status=1";
       $res1=mysqli_query($con,$query1);
       $row1=mysqli_num_rows($res1);
?>

<form style="margin:10px">
  <ul class="mylist">
  <li style="margin:5px"><a href="hospital_stock/hospital_stock.php"><button type="button" class="btn btn-outline-danger" style="border-radius:40px;width:10rem;height:10rem">HOSPITAL STOCK  <br><span class="w3-badge w3-red"><?php echo $row0; ?> </span></button></a>
</li>
  <li><a href="hospital_request/hospital_request.php"><button type="button" class="btn btn-outline-danger" style="border-radius:40px;width:10rem;height:10rem">NOTIFICATION  <br><span class="w3-badge w3-red"><?php echo $row1; ?> </span></button></a>&nbsp
  <a href="feedback/hospital_feedback.php"><button type="button" class="btn btn-outline-danger" style="border-radius:40px;width:10rem;height:10rem">FEEDBACK</button></a></li>
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
