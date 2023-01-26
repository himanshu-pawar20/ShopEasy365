<?php
session_start();
include("database.php");
$temp_id=$_SESSION['special_id'];
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
    <h2>Update Account Username </h2>
  <form action="reset_username.php" method="post">
    <div class="form-group">
    <label for="up_user">Enter New Username</label>
    <input type="password" class="form-control" id="exampleInputfirstname" name="up_user" required>
  </div>
  <button type="submit" class="btn btn-primary" name="up_user2">Update Username</button>
  </form>
  </div>
</body>
</html>
<?php

if(isset($_POST['up_user2'])){
  $new_user=$_POST['up_user'];
  $res1=mysqli_query($con,"UPDATE 1client_details SET RUSERNAME='$new_user' WHERE cd_id=$temp_id");
  $res=mysqli_query($con,"UPDATE 1admin set USERNAME='$new_user' where special_id=$temp_id ");
  if($res&&$res1){
    echo"  <script>Swal.fire({
      icon: 'success',
      title: 'Username Updated',
      showConfirmButton: false,
      timer: 2400
    })</script>

        <script>setTimeout(function() {
        openWindow = window.open('settings.php', '_self');
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
 ?>
