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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" />

  <style type="text/css">
		.container{
			margin-top: 1%;
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
    <h2>Registration Form</h2>
  <form action="register_page.php" method="post">
    <div class="form-group">
    <label for="full_name">Full Name</label>
    <input type="text" class="form-control" id="exampleInputfirstname" name="full_name" required>
  </div>
  <div class="form-group">
    <label for="shop_name">Shop Name</label>
    <input type="text" class="form-control" id="exampleInputlastname" name="shop_name" required>
  </div>
  <div class="form-group">
    <label for="phone_no">Phone Number</label>
    <input type="text" class="form-control" id="exampleInputphoneno" name="phone_no" required>
  </div>
  <div class="form-group">
    <label for="email">Email Address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
  </div>
  <div class="form-group">
    <label for="rpass">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword" name="rpass" required>
  </div>
  <div class="form-group">
    <label for="repeat_pass">Confirm Password</label>
    <input type="password" class="form-control" id="exampleInputPassword" name="repeat_pass" required>
  </div>
  <button type="submit" class="btn btn-primary" name="rsub">Sign up</button>
  </form>
  </div>
</body>
</html>
<?php

if(isset($_REQUEST['rsub'])){
  $full_name=$_REQUEST['full_name'];
  $shop_name=$_REQUEST['shop_name'];
  $email=$_REQUEST['email'];
  $phone_no=$_REQUEST['phone_no'];
  $rpass=$_REQUEST['rpass'];
  $repeat_pass=$_REQUEST['repeat_pass'];
  $rdate=date('Y-m-d');
  $sql1="SELECT * FROM `1client_details` WHERE EMAIL='$email'";
  $result=mysqli_query($con,$sql1);
  $r=mysqli_num_rows($result);
  //$r1=array_count_values($r);
  //echo $r1;
  if($r>0){
    echo "<script>Swal.fire({
      icon: 'alert',
      title: 'Oops...',
      text: 'Email Alredy Exist',
      confirmButtonText: 'Ok'
      }).then((result) => {
      if (result.isConfirmed) {
        setTimeout(function() {
        openWindow = window.open('register_page.php', '_self');
      }, 100);
      }
      })</script>";
  }
  else if($rpass!=$repeat_pass){
    echo "<script>Swal.fire({
        icon: 'alert',
        title: 'Oops...',
        text: 'Password Not Match',
        confirmButtonText: 'Ok'
        }).then((result) => {
        if (result.isConfirmed) {
          setTimeout(function() {
          openWindow = window.open('register_page.php', '_self');
        }, 100);
        }
        })</script>";
  }
  else{
    $otp = rand(100000,999999);
    $to =$email;
    $subject="this is test email";
    $message="One Time Password for PHP login authentication is:<br/><br/>" . $otp;
    $headers="From: aniket.pawar19@vit.edu";
    $mail_status=mail($to,$subject,$message,$headers);

    if($mail_status==1)
    {
        $invoice_logo="demo.jpg";
        $sql=mysqli_query($con,"INSERT INTO `1client_details` (`cd_id`, `FULL_NAME`,`SHOP_NAME`,`SHOP_TYPE`,`INVOICE_LOGO`,`SK_ADDRESS`,`SHOP_ADDRESS`,`SK_PINCODE`,`AREA_PIN`, `EMAIL`,`SK_PHONE_NO`, `PHONE_NO`, `RUSERNAME`, `RPASSWORD`, `REPEAT_PASSWORD`,`OTP`,`is_expired`, `REGISTOR_DATE`) VALUES (NULL, '$full_name','$shop_name','0','$invoice_logo','0','0','0','0','$email','0','$phone_no','$email','$rpass','$repeat_pass',$otp,0,'$rdate')");

        $result5=mysqli_query($con,"SELECT * FROM `1client_details` WHERE EMAIL='$email'");
        $row=mysqli_fetch_assoc($result5);
        $special=$row['cd_id'];
        $_SESSION['special_id']=$special;
        $_SESSION['email_id']=$email;
        $sql2=mysqli_query($con,"INSERT INTO `1admin` (`id`,`USERNAME`, `PASSWORD`,`user_email`,`VERIFY_STATUS`,`special_id`,`sub_enddate`) VALUES (NULL, '$email', '$rpass','$email','0','$special','0')");
        if($sql){
          echo "<script>Swal.fire({
            icon: 'success',
            title: 'Register successfully',
            showConfirmButton: false,
            timer: 2050
            })</script>";
          echo"<script>setTimeout(function() {
            openWindow = window.open('verify_email1.php', '_self');
            }, 2300);</script>";
        }
        else{
          echo"<script>Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Connection Failed',
            confirmButtonText: 'Ok'
            }).then((result) => {
              if (result.isConfirmed) {
                setTimeout(function() {
                openWindow = window.open('register_page.php', '_self');
            }, 100);
              }
            })</script>";
        }

    }
    else
    {
      echo"<script>Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Email Not Valid',
        confirmButtonText: 'Ok'
        })</script>";

    }


  }
}
 ?>
