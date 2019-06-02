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
document.getElementById("sd").setAttribute("max", today);
     }


      function ValidateBGroup() 
     {
      var val = document.getElementById('txtBStock').value;

      if (!val.match(/^(A|B|AB|O)[+-]$/)) 
      {
        alert('Please Enter Valid Blood Group');
	   document.getElementById('txtBStock').value = "";
        return false;
    }

     return true;
    }
    </script>
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
          <a href="blood_availability.php" style="color:white"><i class="fas fa-arrow-left"></i></a>
          <form action="../blooddonorHome.php"><button type="submit" class="btn btn-outline-danger" style="color:white">Home</button></form>
          <form action="../notification/notification.php"><button type="submit" class="btn btn-outline-danger" style="color:white">Notification</button></form>
      <form action="../blood_campaign/blood_bank_blood_campaign.php"><button type="submit" class="btn btn-outline-danger" style="color:white">Blood Campaign</button></form>
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
              <a class="dropdown-item"  href="blood_donor.php">Blood Donor</a>
       </center>
       <div class="dropdown-divider"></div>
<center>
                  <a class="dropdown-item"  href="../hospital/hospital.php">Hospital</a>
                  <a class="dropdown-item"  href="../feedback/feedback.php">Feedback</a>
                  <a class="dropdown-item"  href="../blood_bank/blood_bank.php">Blood Bank</a>
                  <a class="dropdown-item"  href="../notification/notification.php">Notification</a>
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
          <center><h2>BLOOD BANK STOCK</h2></center>
          
    </div>
          <br><br>
      
<center>
<i class="fas fa-search"></i>&nbsp<input type="text" id="sBBBG" onKeyUp="searchBBBG()" placeholder="Enter Blood Group">
<i class="fas fa-search"></i>&nbsp<input type="text" id="sBBState" onKeyUp="searchBBState()" placeholder="Enter State">
<i class="fas fa-search"></i>&nbsp<input type="text" id="sBBDistrict" onKeyUp="searchBBDistrict()" placeholder="Enter District">
</center><br>
<script>

function searchBBBG() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("sBBBG");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTableBB");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[5];
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

function searchBBState() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("sBBState");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTableBB");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[7];
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

function searchBBDistrict() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("sBBDistrict");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTableBB");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[6];
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
      <table class="container table table-striped " id="myTableBB">
    <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Mobile</th>
      <th scope="col">Packet ID</th>
      <th scope="col">Stock Date</th>
      <th scope="col">Stock Time</th>
      <th scope="col">Available Blood Group</th>
      <th scope="col">District</th>
      <th scope="col">State</th>
    </tr>
    </thead>
    <tbody>
         <?php
              $query=mysqli_query($con,"SELECT BS.*, BG.*, REG.*, LOG.*, ST.*, DIS.* FROM tbl_bbank_stock as BS, tbl_blood_group as BG, tbl_reg as REG, tbl_login as LOG, tbl_state as ST, tbl_district as DIS WHERE BS.status=1 AND BS.available_blood_group=BG.blood_group_id AND BS.login_id=LOG.login_id AND BS.login_id=REG.login_id AND REG.state_id=ST.state_id AND REG.district_id=DIS.district_id ");
              if(!mysqli_num_rows($query))
               echo "<center>Oops, no entries!!!</center>";
              while($row=mysqli_fetch_array($query))
              {
               echo '<tr>                              
               
                              <td>'.$row['name'].'</td>
                              <td>'.$row['mobile'].'</td>
                              <td>'.$row['packetid'].'</td>
                              <td>'.$row['stock_date'].'</td>
                              <td>'.$row['stock_time'].'</td>
                              <td>'.$row['blood_group'].'</td>
                              <td>'.$row['district'].'</td>
                              <td>'.$row['state'].'</td>

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