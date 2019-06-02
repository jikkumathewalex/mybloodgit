<?php
     include("../../database/dbconnect.php");
    $email=$_SESSION['s_email'];
    $mobile=$_SESSION['s_mobile'];
    $password=$_SESSION['s_password'];
    $type=$_SESSION['s_type'];
    $sql="SELECT * FROM tbl_login WHERE email='$email' OR mobile='$mobile' AND password='$password' AND type='$type'";
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
      <link rel="stylesheet" type="text/css" href="../../../bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="../../../css/myblood.css">
      <script>
        function ValidateName() 
     {
      var val = document.getElementById('name').value;

      if (!val.match(/^[A-Za-z][A-Za-z" "]{3,}$/)) 
      {
        alert('Please Enter Valid Blood Bank Name');
        document.getElementById('name').value = "";
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
          <a href="../admin_users.php" style="color:white"><i class="fas fa-arrow-left"></i></a>
          <form action="../../admin_home.php"><button type="submit" class="btn btn-outline-danger" style="color:white">Home</button></form>
          <form action="../../feedback/admin_feedback.php"><button type="submit" class="btn btn-outline-danger" style="color:white">Feedback</button></form>
      <form action="../../notification/admin_new_notification.php"><button type="submit" class="btn btn-outline-danger" style="color:white">Notification</button></form>
      <form action="../../website_details/admin_website_details.php"><button type="submit" class="btn btn-outline-danger" style="color:white">Website Details</button></form>
          <div class="float-right">
            <i class="fas fa-phone-square"></i> <?php echo $row['mobile']?>&nbsp
            <i class="fas fa-envelope-square"></i> <?php echo $row['email']?>&nbsp
              <div class="btn-group dropleft">
              <button type="button" id="Logout" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropdown</span>
              </button>

              <div class="dropdown-menu">
                <center>
                <a class="dropdown-item" href="../blood_donor/admin_blood_donor_approval.php">Blood Donor</a>
                <a class="dropdown-item" href="../hospital/admin_hospital_approval.php">Hospital</a>
                                </center>

                <div class="dropdown-divider"></div>
                <center>
                <a class="dropdown-item" href="../../feedback/admin_feedback.php">Feedback</a>
                <a class="dropdown-item" href="../../notification/admin_new_notification.php">Notification</a>
                <a class="dropdown-item" href="../../website_details/admin_website_details.php">Website Details</a>
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
          <center><h2>BLOOD BANK</h2></center>
      </div>
      <br>
      <center>
        <i class="fas fa-search"></i>&nbsp<input type="text" id="sName" onKeyUp="searchName()" placeholder="Enter Name" onchange='ValidateName();'>&nbsp;
        <i class="fas fa-search"></i>&nbsp<input type="text" id="sEmail" onKeyUp="searchEmail()" placeholder="Enter Email" onchange='ValidateEmail();'>&nbsp;
        <i class="fas fa-search"></i>&nbsp<input type="text" id="sPhone" onKeyUp="searchPhone()" placeholder="Enter Phone" onchange='ValidatePhone();'>&nbsp;
        <i class="fas fa-search"></i>&nbsp<input type="text" id="sDistrict" onKeyUp="searchDistrict()" placeholder="Enter District" onchange='ValidateCity();'>&nbsp;

    </center><br>
      <script>
  function searchName() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("sName");
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

function searchEmail() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("sEmail");
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

function searchPhone() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("sPhone");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
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

function searchDistrict() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("sDistrict");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
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
</script>
			<table class="container table table-striped" id="myTable">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Registration Date</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">District</th>
      <th scope="col">Accreditation Date</th>
      <th scope="col">Accreditation</th>
      <th scope="col">Accreditation Certificate</th>
      <th scope="col">Approval</th>
      <th scope="col"></th>

    </tr>
  </thead>
  <tbody>
		     <?php
              $query=mysqli_query($con,"SELECT REG.*,LOG.*, BB.*, DIS.*, ACC.* FROM tbl_reg as REG, tbl_login as LOG, tbl_blood_bank as BB, tbl_district as DIS, tbl_accreditation as ACC WHERE LOG.login_id=REG.login_id AND BB.reg_id=REG.reg_id AND REG.district_id=DIS.district_id AND BB.status!=2 ORDER BY REG.reg_date DESC");
              if(!mysqli_num_rows($query))
               echo "<center>Oops, no entries !!!</center>";
              while($row=mysqli_fetch_array($query))
              {
               echo '<tr>
                              <td>'.$row['reg_date'].'</td>
		                          <td>'.$row['name'].'</td>
                              <td>'.$row['email'].'</td>
                              <td>'.$row['mobile'].'</td>
                              <td>'.$row['district'].'</td>
                              <td>'.$row['accreditation_date'].'</td>
                              <td>'.$row['accreditation'].'</td>
		                          <td><a href="../../../bb_acc_certificates/'.$row['accreditation_certificate'].'" target="_blank">'.$row['accreditation_certificate'].'</a></td>
		                          <td>';

		           $query1=mysqli_query($con,'SELECT * FROM  tbl_login where login_id="'.$row['login_id'].'" AND status=1');
               if(mysqli_num_rows($query1))
               {?>
                <form action="admin_blood_bank_cancel_approval_action.php" method="post">
                  <input type="hidden" name="cancel" id="cancel" value="<?php echo $row['login_id'] ?>">
                  <input type="submit" class="btn btn-primary" style="background:#bb0a1e;border:#bb0a1e"  value="Cancel Approval">
                </form>
                <?php
                }               
                else
                {?>
                  <form action="admin_blood_bank_approval_action.php" method="post">
                  <input type="hidden" name="approved" id="approved" value="<?php echo $row['login_id'] ?>">
                  <input type="submit"  class="btn btn-primary" style="background:#bb0a1e;border:#bb0a1e" value="Approve">
                </form><br>
                 <?php }
               ?>
               </td>
               <td>
               <form action="admin_blood_bank_delete_action.php" method="post">
                  <input type="hidden" name="delete" id="delete" value="<?php echo $row['login_id'] ?>">
                  <input type="submit" class="btn btn-primary" style="background:#bb0a1e;border:#bb0a1e"  value="Delete">
                </form>
                </td>
                          <?php
                           }
                          ?>
		      

  </tbody>
 </table>




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
