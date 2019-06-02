<?php
     include("../../database/dbconnect.php");
     $id = $_POST['delete'];
     mysqli_query($con,"UPDATE `tbl_feedback` SET status='0' where feedback_id='$id'");

     $Message=urlencode("Feedback Deleted");
     echo "<script>alert('Feedback Deleted');</script>";
     echo "<script>window.location.href='admin_feedback.php?Message=$Message'</script>";
?>

