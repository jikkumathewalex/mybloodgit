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
</head>

<body>
<nav class="navbar navbar-light bg-light">
          <a class="navbar-brand" href="../bbank_home.php">
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
          <a href="../bbank_home.php" style="color:white"><i class="fas fa-arrow-left"></i></a>

          <form action="../bbank_home.php"><button type="submit" class="btn btn-outline-danger" style="color:white">Home</button></form>
          <form action="../blood_bank_stock/blood_bank_stock.php"><button type="submit" class="btn btn-outline-danger" style="color:white">Blood Bank Stock</button></form>
          <form action="../blood_campaign/blood_bank_blood_campaign.php"><button type="submit" class="btn btn-outline-danger" style="color:white">Blood Campaign</button></form>
      <form action="../feedback/bb_feedback.php"><button type="submit" class="btn btn-outline-danger" style="color:white">Feedback</button></form>

          <div class="float-right">
            <i class="fas fa-phone-square"></i> <?php echo $row['mobile']?>&nbsp
            <i class="fas fa-envelope-square"></i> <?php echo $row['email']?>&nbsp
              <div class="btn-group dropleft">
              <button type="button" id="Logout" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropdown</span>
              </button>

              <div class="dropdown-menu">
              <center>
              <a class="dropdown-item" href="../blood_campaign/blood_bank_blood_campaign.php">Blood Campaign</a>
              <a class="dropdown-item" href="../blood_bank_stock/blood_bank_stock.php">Blood Bank Stock</a>
              <a class="dropdown-item" href="../feedback/bb_feedback.php">Feedback</a>

              </center>

                <div class="dropdown-divider"></div>
                <center>
                <a class="dropdown-item" href="../edit_profile/blood_bank_edit_profile.php">Edit Profile</a>
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
          <center><h2>NOTIFICATION</h2></center>
      </div>
      <br>
      <form class="container form-outline" action="blood_bank_add_request_action.php" method="post">
           <div class="form-group">
               &nbsp<textarea class="form-control" rows="4" cols="50" id="txtbrequest" name="txtbrequest" oninput="this.reportValidity()" required="" title="Enter Notification" placeholder="Enter notification here ..."></textarea>
           </div>&nbsp
           <button type="submit" class="btn btn-primary float-right" style="background:#bb0a1e;border:#bb0a1e">Submit</button>
         </form><br><br>

      <table class="container table table-striped ">
    <thead class="thead-dark">
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Message</th>
      <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
         <?php
              $query=mysqli_query($con,"SELECT N.*,LOG.*,REG.* FROM tbl_notification as N, tbl_login as LOG, tbl_reg as REG WHERE N.status=1 AND N.login_id=LOG.login_id AND N.login_id=REG.login_id ORDER BY N.date DESC");
              if(!mysqli_num_rows($query))
               echo "<center>Oops, no entries !!!</center>";
              while($row=mysqli_fetch_array($query))
              {
               echo '<tr>
                              <td>'.$row['date'].'</td>
                              <td>'.$row['time'].'</td>
                              <td>'.$row['name'].'</td>
                              <td>'.$row['email'].'</td>
                              <td>'.$row['mobile'].'</td>
                              <td>'.$row['message'].'</td>
                                <td>';


               $query1=mysqli_query($con,'SELECT * FROM  tbl_notification where notification_id="'.$row['notification_id'].'" AND status=1');
               if($row['email']==$_SESSION['s_email'])
               {?> 
                <form action="blood_bank_cancel_action.php" method="post">
                  <input type="hidden" name="delete" id="delete" value="<?php echo $row['notification_id'] ?>">
                  <input type="submit" class="btn btn-primary" style="background:#bb0a1e;border:#bb0a1e" value="Delete">
                </form>
                <?php
                }
              }
           ?>

    </tbody>
    </table>


      <center>


            <div class="card-footer text-muted" style="background-color:white">
                © Copyright 2019 myBlood. All rights reserved.
            </div>
      </center>
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
