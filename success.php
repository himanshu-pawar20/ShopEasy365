<?php
session_start();
include("database.php");

?>


<!DOCTYPE html>
<html>
    <head>
      <meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    		<title>Shopeasy365</title>
    		<link rel="shortcut icon" href="img/webi1.png"/>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" >
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    	  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    	  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>
    </head>
    <body>

    </body>
</html>

<?php
$name5=$_SESSION['name1'];
$purpose5=$_SESSION['purpose1'];
$email5=$_SESSION['email1'];
$mobile_no5=$_SESSION['mobile_no1'];
$amount5=$_SESSION['amount1'];
$special_id5=$_SESSION['special_id'];
$end_date=$_SESSION['date'];
$date1=date('Y-m-d');


$result7=mysqli_query($con,"SELECT * FROM `1subscription_details` WHERE sub_special_id='$special_id5'");
$ra=mysqli_num_rows($result7);
if($ra>0){
  $result8 = mysqli_query($con,"UPDATE 1subscription_details SET sub_status = 1,sub_startdate='".$date1."' WHERE sub_special_id = '" . $_SESSION['special_id']. "'");
}
else{
  $query1=mysqli_query($con,"INSERT INTO `1subscription_details` (`sub_id`,`sub_name`, `sub_email`,`sub_purpose`,`sub_amount`,`sub_special_id`,`sub_status`,`sub_mobile_no`,`sub_startdate`) VALUES (NULL, '$name5', '$email5','$purpose5','$amount5','$special_id5','1','$mobile_no5','$date1')");
}
$result6 = mysqli_query($con,"UPDATE 1admin SET subscription_status = 1,sub_enddate='".$end_date."' WHERE special_id = '" . $_SESSION['special_id']. "'");
if($result6){
  echo"<script>Swal.fire({

    icon: 'success',
    title: 'Subscription Activated',
    showConfirmButton: false,
    timer: 2300
  })</script>
  <script>setTimeout(function() {
  openWindow = window.open('index.php', '_self');
}, 2400);</script>";
}
else{
  echo"<script>Swal.fire({
icon: 'error',
title: 'Oops...',
text: 'Somthing Went Wrong'
})</script>";
}
?>
