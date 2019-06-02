<?php
     include("../database/dbconnect.php");
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
          <a class="navbar-brand" href="../admin_home.php">
            <img src="../../images/logo.png" width="50" height="50" class="d-inline-block align-top" alt="">
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
          <a href="../admin_home.php" style="color:white"><i class="fas fa-arrow-left"></i></a>
          <form action="../admin_home.php"><button type="submit" class="btn btn-outline-danger" style="color:white">Home</button></form>
          <form action="../users/admin_users.php"><button type="submit" class="btn btn-outline-danger" style="color:white">Approval</button></form>
      <form action="../notification/admin_new_notification.php"><button type="submit" class="btn btn-outline-danger" style="color:white">Notification</button></form>
      <form action="../website_details/admin_website_details.php"><button type="submit" class="btn btn-outline-danger" style="color:white">Website Details</button></form>
          <div class="float-right">
            <i class="fas fa-phone-square"></i> <?php echo $row['mobile']?>&nbsp
            <i class="fas fa-envelope-square"></i> <?php echo $row['email']?>&nbsp
              <div class="btn-group dropleft">
              <button type="button" id="Logout" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropdown</span>
              </button>

              <div class="dropdown-menu">
                <center>
                <a class="dropdown-item" href="../users/admin_users.php">Approval</a>
        
                <a class="dropdown-item" href="../notification/admin_new_notification.php">Notification</a>
            
                <a class="dropdown-item" href="../website_details/admin_website_details.php">Website Details</a>
                </center>
                <div class="dropdown-divider"></div>
                <center>
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
          <center><h2>FEEDBACK</h2></center>
      </div>
			<table class="container table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col">Feedback</th>
      <th scope="col"></th>

    </tr>
  </thead>
  <tbody>
		     <?php
              $query=mysqli_query($con,"SELECT REG.*,LOG.*,FB.* FROM tbl_login LOG, tbl_reg REG, tbl_feedback FB WHERE LOG.login_id=FB.login_id AND REG.login_id=FB.login_id AND FB.status=1 ORDER BY FB.date desc");
              if(!mysqli_num_rows($query))
               echo "<center>Oops, no entries !!!</center>";
              while($row=mysqli_fetch_array($query))
              {
               echo '<tr>
		                          <td>'.$row['name'].'</td>
		                          <td>'.$row['email'].'</td>
                              <td>'.$row['mobile'].'</td>
                              <td>'.$row['date'].'</td>
                              <td>'.$row['time'].'</td>
                              <td>'.$row['feedback'].'</td>
		                          <td>';
               
		           $query1=mysqli_query($con,'SELECT * FROM  tbl_login where status=1');
               if(mysqli_num_rows($query1))
               {?>
                <form action="admin_feedback_action.php" method="post">
                  
                  <input type="hidden" name="delete" id="delete" value="<?php echo $row['feedback_id'] ?>">
                  <input type="submit" class="btn btn-primary" style="background:#bb0a1e;border:#bb0a1e"  value="Delete">
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
