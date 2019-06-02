<?php
     include("database/dbconnect.php");
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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/solid.css" integrity="sha384-osqezT+30O6N/vsMqwW8Ch6wKlMofqueuia2H7fePy42uC05rm1G+BUPSd2iBSJL" crossorigin="anonymous">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/fontawesome.css" integrity="sha384-BzCy2fixOYd0HObpx3GMefNqdbA7Qjcc91RgYeDjrHTIEXqiF00jKvgQG0+zY/7I" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/myblood.css">
</head>

<body>
      <nav class="navbar navbar-light bg-light">
          <a class="navbar-brand" href="index.php">
            <img src="images/logo.png" width="50" height="50" class="d-inline-block align-top" alt="">
            <h1 class="d-inline">myBlood</h1>
          </a>
          <form class="form-inline" action="login/login_action.php" method="post">
               <div class="form-group">
                   <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Enter Valid Email ID" id="login" name="login" class="form-control" oninput="this.reportValidity()" required="" aria-describedby="emailHelp" placeholder="Enter email">&nbsp
                   <input type="password" id="password" name="password" align="right" required="" class="form-control" oninput="this.reportValidity()" placeholder="Password">&nbsp
               </div>
               <button type="submit" class="btn btn-primary float-right" style="background:#bb0a1e;border:#bb0a1e">Log In</button>
               <ul class="mylist">
                  <li><a href="registration/registration.php"><small id="emailHelp" class="form-text text-muted">Create account</small></a></li>
                  <li><a href="forgot_password/forgot_password.php"><small id="emailHelp" class="form-text text-muted">Forgot password?</small></a></li>
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

<form action="search_blood_donor/search_blood_donor.php" method="post">
            <div class="card text-center">
                <div style="color:#bb0a1e" class="card-header" >
                    <h2>SEARCH BLOOD DONORS</h2>
                </div>
                <div style="border: 3px solid #bb0a1e" class="card-body">
                        <!-- <div class="dropdown">
                        <button style="background-color:#bb0a1e" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Select Blood Group
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <?php
                               $query=mysqli_query($con,"SELECT * FROM tbl_blood_group WHERE status=1");
                             while($row=mysqli_fetch_array($query))
                               {
                                echo '<a class="dropdown-item">'.$row['blood_group'].'</a>';
                              }?>
                        </div>
                    </div> -->


                    <select name="ddbgroup" id="ddbgroup" style="background-color:#ffffff;color:#bb0a1e;width:15rem" title="Select Blood Group" class="btn btn-secondary dropdown-toggle" required>
                        <option style="background-color:white" value="">Select Blood Group</option>
                      <?php
                           $query=mysqli_query($con,"SELECT * FROM tbl_blood_group WHERE status=1");
                         while($row=mysqli_fetch_array($query))
                           {
                            echo "<option style='background-color:white;color:black' value='".$row['blood_group_id']."'>".$row['blood_group']."</option>";
                           }?>
                      </select><br>
                    <br>
                    <!-- <div class="float-right caption">
                        <label>#givebloodgivelife</label>
                    </div> -->
                              <select name="ddstate" id="ddstate" style="background-color:#ffffff;color:#bb0a1e;width:15rem" title="Select State" class="btn btn-secondary dropdown-toggle" onChange="getDistrict(this.value);" required="">
                        <option style="background-color:white;color:white" value="">Select State</option>
                      <?php
                           $query=mysqli_query($con,"SELECT * FROM tbl_state WHERE status=1");
                         while($row=mysqli_fetch_array($query))
                           {
                            echo "<option style='background-color:white;color:black' value='".$row['state_id']."'>".$row['state']."</option>";
                           }?>
                      </select><br><br>
                    <select name="dddistrict" id="district-list" style="background-color:#ffffff;color:#bb0a1e;width:15rem" title="Select District" class="btn btn-secondary dropdown-toggle" required>
                        <option style="background-color:white" value="">Select District</option>
                        <!-- <?php
                             $query=mysqli_query($con,"SELECT * FROM tbl_district WHERE status=1");
                           while($row=mysqli_fetch_array($query))
                             {
                              echo "<option style='background-color:white;color:black' value='".$row['district_id']."'>".$row['district']."</option>";
                             }?> -->
                    </select><br><br>

                                       <input class="btn btn-primary" name="search" type="submit" value="Search" style="background:#bb0a1e;border:#bb0a1e;width:15rem">
                            </form>
                            </div><br>
                            
                            </div>

</center>
<br><br>







<center>


      <div class="card-footer text-muted" style="background-color:white">
          © Copyright 2019 myBlood. All rights reserved.
      </div>

</center>
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

           </script>
<!-- <script src="bootstrap/jquery.js"></script> -->
<script src="bootstrap/popper.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
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
