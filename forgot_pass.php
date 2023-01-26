<?php
session_start();
include("database.php");
$email=$_SESSION['new_email'];
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shopeasy365</title>
    <link rel="shortcut icon" href="img/webi1.png"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" />
<style type="text/css">
   .container{
     margin-top: 3%;
     width: 350px;
     border: ridge 1.4px white;
     padding: 20px;
   }
   body{
     background: #E0EAFC;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #CFDEF3, #E0EAFC);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #CFDEF3, #E0EAFC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

   }
 </style>
</head>
<body>
  <div class="container">
    <h2>Update Account Password </h2>
  <form action="forgot_pass.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
    <label for="up_pass">Enter New Password</label>
    <input type="password" class="form-control" id="exampleInputfirstname" name="up_pass" required>
  </div>
  <div class="form-group">
  <label for="rup_pass">Confirm Password</label>
  <input type="password" class="form-control" id="exampleInputfirstname" name="rup_pass" required>
</div>
  <button type="submit" class="btn btn-primary" name="up_pass2">Update Password</button>
  </form>
  </div>
</body>
</html>
<?php

if(isset($_POST['up_pass2'])){
  $new_pass=$_POST['up_pass'];
  $rnew_pass=$_POST['rup_pass'];
  if($new_pass!=$rnew_pass){
    die("<script>Swal.fire({
  icon: 'warning',
  title: 'Oops...',
  text: 'Password Not Match'
})</script>");
  }
  else{
    $res1=mysqli_query($con,"UPDATE 1client_details SET RPASSWORD='$new_pass',REPEAT_PASSWORD='$new_pass' WHERE EMAIL='$email'");
    $res=mysqli_query($con,"UPDATE 1admin set PASSWORD='$new_pass' where user_email='$email'");
    if($res1&&$res){
      echo"  <script>Swal.fire({
      icon: 'success',
      title: 'Password Updated',
      showConfirmButton: false,
      timer: 2400
    })</script>

        <script>setTimeout(function() {
        openWindow = window.open('index.php', '_self');
    }, 2500);</script>";
    }
    else{
      echo"<script>Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'Something Went Wrong'
  })</script>";
    }
  }
}
?>
