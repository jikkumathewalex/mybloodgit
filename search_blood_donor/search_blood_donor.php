<?php
     include("../database/dbconnect.php");
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
      <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="../css/myblood.css">
</head>

<body>
      <nav class="navbar navbar-light bg-light">
          <a class="navbar-brand" href="../index.php">
            <img src="../images/logo.png" width="50" height="50" class="d-inline-block align-top" alt="">
            <h1 class="d-inline">myBlood</h1>
          </a>
          <form class="form-inline" action="../login/login_action.php" method="post">
               <div class="form-group">
                   <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Enter Valid Email ID" id="login" name="login" class="form-control" oninput="this.reportValidity()" required="" aria-describedby="emailHelp" placeholder="Enter email">&nbsp
                   <input type="password" id="password" name="password" align="right" required="" class="form-control" oninput="this.reportValidity()" placeholder="Password">&nbsp
               </div>
               <button type="submit" class="btn btn-primary float-right" style="background:#bb0a1e;border:#bb0a1e">Log In</button>
               <ul class="mylist">
                  <li><a href="../registration/registration.php"><small id="emailHelp" class="form-text text-muted">Create account</small></a></li>
                  <li><a href="../forgot_password.php"><small id="emailHelp" class="form-text text-muted">Forgot password?</small></a></li>
          </form>
      </nav>
      <?php
       $query="select * from tbl_details";
       $res=mysqli_query($con,$query);
       ?>

       <?php while($row=mysqli_fetch_array($res)){ ?>
      <nav class="navbar" style="background-color:#bb0a1e;color:white">
      <a href="../index.php" style="color:white"><i class="fas fa-arrow-left"></i></a>
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

<form action="search_action.php" method="post">
            <div class="card text-center">
                <div style="color:#bb0a1e" class="card-header" >
                    <h2>SEARCH BLOOD DONORS</h2>
                </div>
                
    <br><br>
      
<center>
<i class="fas fa-search"></i>&nbsp<input type="text" id="sBDBG" onKeyUp="searchBDBG()" placeholder="Enter Blood Group">
<i class="fas fa-search"></i>&nbsp<input type="text" id="sBDState" onKeyUp="searchBDState()" placeholder="Enter State">
<i class="fas fa-search"></i>&nbsp<input type="text" id="sBDDistrict" onKeyUp="searchBDDistrict()" placeholder="Enter District">

</center><br>
<script>

function searchBDBG() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("sBDBG");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTableBD");
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

function searchBDState() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("sBDState");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTableBD");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];
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

function searchBDDistrict() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("sBDDistrict");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTableBD");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
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
      <table class="container table table-striped " id="myTableBD">
    <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Mobile</th> 
      <th scope="col">Blood Group</th>
      <th scope="col">District</th>
      <th scope="col">State</th>

      <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
         <?php

           $blood_group=$_POST['ddbgroup'];
           $state=$_POST['ddstate'];
           $district=$_POST['dddistrict'];
           

              $query=mysqli_query($con,"SELECT BD.*, BG.*, REG.*, LOG.*, ST.*, DIS.* FROM tbl_donor as BD, tbl_blood_group as BG, tbl_reg as REG, tbl_login as LOG, tbl_state as ST, tbl_district as DIS WHERE BD.status=1 AND BD.blood_group_id=BG.blood_group_id AND BD.login_id=LOG.login_id AND BD.login_id=REG.login_id AND REG.state_id=ST.state_id AND REG.district_id=DIS.district_id AND BD.blood_group_id='$blood_group' AND REG.state_id='$state' AND REG.district_id='$district'");
              if(!mysqli_num_rows($query))
               echo "<center>Oops, no entries!!!</center>";
              while($row=mysqli_fetch_array($query))
              {
               echo '<tr>
                              <td>'.$row['name'].'</td>
                              <td>'.$row['mobile'].'</td>
                              <td>'.$row['blood_group'].'</td>
                              <td>'.$row['district'].'</td>
                              <td>'.$row['state'].'</td>

                              <td>';

              }
           ?>

    </tbody>
    </table>

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

      function getCity(val) {
      $.ajax({
      type: "POST",
      url: "getCity.php",
      data: {district_id:val},
      success: function(data){
        // document.write(data);
      $("#city-list").html(data);
      },error: function(data){
      alert(data);
      }
      });
      }
      </script>
<!-- <script src="bootstrap/jquery.js"></script> -->
<script src="../bootstrap/popper.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
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
