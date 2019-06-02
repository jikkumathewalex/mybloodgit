<?php
     include("../../database/dbconnect.php");
     if (isset($_GET['Message']))
       {
        echo "<script>alert( '".$_GET['Message']."');</script>";
       }

     $email=$_SESSION['s_email'];
     $password=$_SESSION['s_password'];
     $type=$_SESSION['s_type'];
     $sql="SELECT * FROM tbl_login WHERE email='$email' AND password='$password' AND type='$type'";
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
      <link rel="stylesheet" type="text/css" href="../../../bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="../../../css/myblood.css">
      <script>
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
      var val = document.getElementById('txtMobile').value;

      if (!val.match(/^[6-9]\d{9}$/)) 
      {
        alert('Please Enter Valid Phone Number');
	   document.getElementById('txtMobile').value = "";
        return false;
    }

     return true;
    }

    
     </script>
</head>

<body>
      <nav class="navbar navbar-light bg-light">
          <a class="navbar-brand" href="../../admin_home.php">
            <img src="../../../images/logo.png" width="50" height="50" class="d-inline-block align-top" alt="">
            <h1 class="d-inline">myBlood</h1>
          </a>
          <form class="form-inline" action="../../action.php" method="post">
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
            <a href="../admin_website_details.php" style="color:white"><i class="fas fa-arrow-left"></i></a>
            <form action="../../admin_home.php"><button type="submit" class="btn btn-outline-danger" style="color:white">Home</button></form>
          <form action="../../users/admin_users.php"><button type="submit" class="btn btn-outline-danger" style="color:white">Approval</button></form>
          <form action="../../feedback/admin_feedback.php"><button type="submit" class="btn btn-outline-danger" style="color:white">Feedback</button></form>
      <form action="../../notification/admin_new_notification.php"><button type="submit" class="btn btn-outline-danger" style="color:white">Notification</button></form>
          <div class="float-right">
              <i class="fas fa-phone-square"></i> <?php echo $row['mobile']?>&nbsp
              <i class="fas fa-envelope-square"></i> <?php echo $row['email']?>&nbsp

                <div class="btn-group dropleft">
                <button type="button" id="Logout" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="sr-only">Toggle Dropdown</span>
                </button>

                <div class="dropdown-menu">
                <center>
                <a class="dropdown-item" href="../admin_website_details_location/admin_location.php">Location</a>
                <a class="dropdown-item" href="../admin_website_details_bg/admin_bg.php">Blood Group</a>
                </center>
                <div class="dropdown-divider"></div>
                <center>
                <a class="dropdown-item" href="../../users/admin_users.php">Approval</a>
                <a class="dropdown-item" href="../../feedback/admin_feedback.php">Feedback</a>
                <a class="dropdown-item" href="../../notification/admin_new_notification.php">Notification</a>
               
                  <a class="dropdown-item" style="background-color:#bb0a1e;color:white;border-radius:3px" href="../../logout.php">Logout</a>
                  </center>
                </div>
              </div>

          </div>
    </nav>
    <?php
    }
    ?>
    <div style="color:#bb0a1e" class="card-header" >
        <center><h2>WEBSITE INFO</h2></center>
    </div>
<br>

<?php
 $query="select * from tbl_details";
 $res=mysqli_query($con,$query);
 ?>

 <?php while($row=mysqli_fetch_array($res)){ ?>


      <form class="container" action="admin_add_info_action.php" method="post">
        <div class="card text-left">
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1" style="background-color:#bb0a1e;color:white;width:100px">Email ID</span>
              </div>
              <input type="email" class="form-control" id="txtEmail" name="txtEmail" value="<?php echo $row['email']?>" required onchange="ValidateEmail()" title="Enter Email ID" placeholder="Enter Email ID">&nbsp
          </div>
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1" style="background-color:#bb0a1e;color:white;width:100px">Mobile</span>
              </div>


              <input type="text" class="form-control" id="txtMobile" value="<?php echo $row['mobile']?>" name="txtMobile" required onchange="ValidatePhone()" title="Enter Mobile Number" placeholder="Enter Mobile Number">&nbsp
          </div>
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1" style="background-color:#bb0a1e;color:white;width:100px">About</span>
              </div>
              <textarea class="form-control" rows="4" cols="50" id="txtAbout" name="txtAbout" oninput="this.reportValidity()" required="" title="Enter details about myBlood ..." placeholder="Enter details about myBlood ..."><?php echo $row['about']?></textarea>
          </div>
            <center>   <button type="submit" class="btn btn-primary" style="background:#bb0a1e;border:#bb0a1e">Submit</button></center>
             </form>
<br>
<?php
}
?>

<center>


      <div class="card-footer text-muted" style="background-color:white">
          © Copyright 2019 myBlood. All rights reserved.
      </div>
</center>
<script src="../../../bootstrap/jquery.js"></script>
<script src="../../../bootstrap/popper.js"></script>
<script src="../../../bootstrap/js/bootstrap.min.js"></script>
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
