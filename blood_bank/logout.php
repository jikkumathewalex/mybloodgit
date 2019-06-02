<?php
     include("database/dbconnect.php");
     session_destroy();
     header("location:../index.php");
?>
