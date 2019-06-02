<?php
include("../database/dbconnect.php");
if (! empty($_POST["state_id"])) {
  $state_id=$_POST["state_id"];

  $query=mysqli_query($con,"SELECT * FROM tbl_district WHERE state_id ='$state_id'");
  echo "<option style='background-color:white;color:black' value disabled selected>Select District</option>";
  while($row=mysqli_fetch_array($query))
  {
    echo "<option style='background-color:white;color:black' value='".$row["district_id"]."'>".$row["district"]."</option>";
  }
}

?>
