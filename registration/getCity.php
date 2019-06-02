<?php
include("../database/dbconnect.php");
if (! empty($_POST["district_id"])) {
  $district_id=$_POST["district_id"];

  $query=mysqli_query($con,"SELECT * FROM tbl_city WHERE district_id ='$district_id'");
  echo "<option style='background-color:white;color:black' value disabled selected>Select City</option>";
  while($row=mysqli_fetch_array($query))
  {
    echo "<option style='background-color:white;color:black' value='".$row["city_id"]."'>".$row["city"]."</option>";
  }
}
?>
