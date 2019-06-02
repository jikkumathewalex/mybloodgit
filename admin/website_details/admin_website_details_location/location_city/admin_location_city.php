<?php
     include("../../../database/dbconnect.php");
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
      <link rel="stylesheet" type="text/css" href="../../../../bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="../../../../css/myblood.css">

</head>

<body>
      <nav class="navbar navbar-light bg-light">
          <a class="navbar-brand" href="../../../admin_home.php">
            <img src="../../../../images/logo.png" width="50" height="50" class="d-inline-block align-top" alt="">
            <h1 class="d-inline">myBlood</h1>
          </a>
          <form class="form-inline" action="../../../action.php" method="post">
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
            <a href="../admin_location.php" style="color:white"><i class="fas fa-arrow-left"></i></a>
            <form action="../../../admin_home.php"><button type="submit" class="btn btn-outline-danger" style="color:white">Home</button></form>
          <form action="../../../users/admin_users.php"><button type="submit" class="btn btn-outline-danger" style="color:white">Approval</button></form>
          <form action="../../../feedback/admin_feedback.php"><button type="submit" class="btn btn-outline-danger" style="color:white">Feedback</button></form>
      <form action="../../../notification/admin_new_notification.php"><button type="submit" class="btn btn-outline-danger" style="color:white">Notification</button></form>
          <div class="float-right">
            <i class="fas fa-phone-square"></i> <?php echo $row['mobile']?>&nbsp
            <i class="fas fa-envelope-square"></i> <?php echo $row['email']?>&nbsp

                <div class="btn-group dropleft">
                <button type="button" id="Logout" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="sr-only">Toggle Dropdown</span>
                </button>

                <div class="dropdown-menu">
                <center>
                <a class="dropdown-item" href="../location_state/admin_location_state.php">State</a>
                  <a class="dropdown-item" href="../location_district/admin_location_district.php">District</a>
       </center>
       <div class="dropdown-divider"></div>
       <center>
                  <a class="dropdown-item" href="../../admin_website_details.php">Website Details</a>
       </center>        
                  <div class="dropdown-divider"></div>
                  <center>
                  <a class="dropdown-item" href="../../../users/admin_users.php">Approval</a>
                <a class="dropdown-item" href="../../../feedback/admin_feedback.php">Feedback</a>
                <a class="dropdown-item" href="../../../notification/admin_new_notification.php">Notification</a>
                  <a class="dropdown-item" style="background-color:#bb0a1e;color:white;border-radius:3px" href="../../../logout.php">Logout</a>
                </div>
              </div>

          </div>
    </nav>
    <?php
    }
    ?>
    <div style="color:#bb0a1e" class="card-header" >
        <center><h2>CITY</h2></center>
    </div>
<br>

      <form class="container" action="admin_add_location_city_action.php" method="post">&nbsp

      <div class="input-group mb-3">
          <div class="input-group-prepend">
        <select name="ddstate" id="ddstate" style="background-color:#bb0a1e" title="Select State" class="btn btn-secondary dropdown-toggle" onChange="getDistrict()" required>
            <option style="background-color:white;color:white" value="">Select State</option>
          <?php
               $query=mysqli_query($con,"SELECT * FROM tbl_state WHERE status=1");
             while($row=mysqli_fetch_array($query))
               {
                echo "<option style='background-color:white;color:black' value='".$row['state_id']."'>".$row['state']."</option>";
               }?>
          </select>&nbsp
          <select name="dddistrict" id="district-list" style="background-color:#bb0a1e" title="Select District" class="btn btn-secondary dropdown-toggle" required>
              <option style="background-color:white;color:white" value="">Select District</option>
              <?php
               $query=mysqli_query($con,"SELECT * FROM tbl_district WHERE status=1");
             while($row=mysqli_fetch_array($query))
               {
                echo "<option style='background-color:white;color:black' value='".$row['district_id']."'>".$row['district']."</option>";
               }?>
            </select>&nbsp;
            <span class="input-group-text" id="basic-addon1" style="background-color:#bb0a1e;color:white;width:220px">City</span>
          </div>
<input type="text" class="form-control" id="txtCity" name="txtCity" oninput="this.reportValidity()" required="" aria-describedby="emailHelp" title="Enter City" placeholder="Enter City" required>&nbsp
           </div>
           <button type="submit" class="btn btn-primary float-right" style="background:#bb0a1e;border:#bb0a1e">Submit</button>
                 </form>
<br><br><br><br><br>
<center>
<i class="fas fa-search"></i>&nbsp<input type="text" id="sState" onKeyUp="searchState()" placeholder="Enter State">&nbsp;
<i class="fas fa-search"></i>&nbsp<input type="text" id="sDistrict" onKeyUp="searchDistrict()" placeholder="Enter District">&nbsp;
<i class="fas fa-search"></i>&nbsp<input type="text" id="sCity" onKeyUp="searchCity()" placeholder="Enter City">&nbsp;
</center>
<br>
<script>
function searchState() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("sState");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}


function searchDistrict() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("sDistrict");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

function searchCity() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("sCity");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

</script>
  <table class="container table table-striped" id="myTable">
  <thead class="thead-dark">
  <tr>
  <th scope="col">State</th>
  <th scope="col">District</th>
  <th scope="col">City</th>
  <th scope="col"></th>
  </tr>
  </thead>
  <tbody>
     <?php
          $query=mysqli_query($con,"SELECT ST.*, DIS.*, CIT.*  FROM tbl_state ST,tbl_district DIS, tbl_city CIT WHERE ST.state_id=DIS.state_id AND DIS.district_id=CIT.district_id AND CIT.status=1 ORDER BY ST.state");
          while($row=mysqli_fetch_array($query))
          {
           echo '<tr>
                      <td>'.$row['state'].'</td>
                      <td>'.$row['district'].'</td>
                      <td>'.$row['city'].'</td>
                            <td>';

           $query1=mysqli_query($con,'SELECT * FROM  tbl_city where city_id="'.$row['city_id'].'" AND status=1');
           if(mysqli_num_rows($query1))
           {?>
            <form action="admin_cancel_location_city_action.php" method="post">
              <input type="hidden" name="delete" id="delete" value="<?php echo $row['city_id'] ?>">
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
          © Copyright 2018 myBlood. All rights reserved.
      </div>
</center>

<!-- <script src="../../../../bootstrap/jquery.js"></script> -->
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script src="../../../../bootstrap/popper.js"></script>
<script src="../../../../bootstrap/js/bootstrap.min.js"></script>

<script>
function getDistrict() {
  var val = $('#ddstate').val();
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

}</script>
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
