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
document.getElementById("txtCampDate").setAttribute("min", today);
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
      <form action="../hospital/hospital.php"><button type="submit" class="btn btn-outline-danger" style="color:white">Hospital</button></form>
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
                <a class="dropdown-item" href="../hospital/hospital.php">Hospital</a>
                <a class="dropdown-item" href="../feedback/feedback.php">Feedback</a>
                <a class="dropdown-item" href="../blood_bank/blood_bank.php">Blood Bank</a>
                <a class="dropdown-item" href="../notification/notification.php">Notification</a>
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
          <center><h2>BLOOD CAMPAIGN</h2></center>
      </div><br>
      
        <table class="container table table-striped">
        <thead class="thead-dark">
        <tr>
        <th scope="col">Blood Campaign Name</th>
        <th scope="col">Venue</th>
        <th scope="col">Description</th>
        <th scope="col">Date</th>
        <th scope="col">Time</th>
        </tr>
        </thead>
        <tbody>
           <?php
                $query=mysqli_query($con,"SELECT * FROM tbl_blood_camp where status=1");
                if(!mysqli_num_rows($query))
               echo "<center>Oops, no entries!!!</center>";
                while($row=mysqli_fetch_array($query))
                {
                 echo '<tr>
                                <td>'.$row['camp_name'].'</td>
                                <td>'.$row['venue'].'</td>
                                <td>'.$row['description'].'</td>
                                <td>'.$row['date'].'</td>
                                <td>'.$row['time'].'</td>
                                ';
         
                }
             ?>

        </tbody>
        </table>

</div>

      <center>


            <div class="card-footer text-muted" style="background-color:white">
                © Copyright 2019 myBlood. All rights reserved.
            </div>
      </center>


      <script src="../../bootstrap/jquery.js"></script>
      <script src="../../bootstrap/popper.js"></script>
      <script src="../../bootstrap/js/bootstrap.min.js"></script>
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script>

$("input.Date").datepicker({
    minDate: 0,
    showAnim: 'drop'

});
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
