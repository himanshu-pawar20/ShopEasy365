<?php
session_start();
include("database.php");

if(isset($_POST['resend_otp'])){
	$otp = rand(100000,999999);
	// Send OTP
	$email2=$_SESSION['new_email'];
	//$_SESSION['new_email']=$email2;
	$to =$email2;
	$subject="this is our test email";
	$message="One Time Password for PHP login authentication is:<br/><br/>" . $otp;
	$headers="From: aniketpawar0351@gmail.com";
	$mail_status=mail($to,$subject,$message,$headers);
	if($mail_status == 1) {
		$result1 = mysqli_query($con,"UPDATE 1client_details SET OTP='" . $otp . "',is_expired=0,REGISTOR_DATE='" . date("Y-m-d H:i:s"). "' WHERE EMAIL='" .$email2. "'");

		if(!empty($result1)) {
			$success=1;
		}
	}
}
$success = "";
$error_message = "";
if(isset($_POST["submit_email"])) {
	$result = mysqli_query($con,"SELECT * FROM `1client_details` WHERE EMAIL='" . $_POST["email"] . "'");
	$row=mysqli_fetch_assoc($result);
	$count  = mysqli_num_rows($result);
	if($count>0) {
		// generate OTP
		$otp = rand(100000,999999);
		// Send OTP
		$email2=$_POST["email"];
		$_SESSION['new_email']=$email2;
	// 	$sql1="SELECT * FROM `1client_details` WHERE EMAIL='$email2'";
	//   $result=mysqli_query($con,$sql1);
	//   $r=mysqli_num_rows($result);
	//   if(!$r>0){
	//     die("<script>Swal.fire({
	//   icon: 'error',
	//   title: 'Oops...',
	//   text: 'Email Address Not Registore'
	// })</script>");
	//   }
    $to =$_POST["email"];
    $subject="this is our test email";
    $message="One Time Password for PHP login authentication is:<br/><br/>" . $otp;
    $headers="From: aniketpawar0351@gmail.com";
    $mail_status=mail($to,$subject,$message,$headers);
		if($mail_status == 1) {
			$result1 = mysqli_query($con,"UPDATE 1client_details SET OTP='" . $otp . "',is_expired=0,REGISTOR_DATE='" . date("Y-m-d H:i:s"). "' WHERE EMAIL='" . $_POST["email"] . "'");

			if(!empty($result1)) {
				$success=1;
			}
		}
	}
	else {
		 echo"<script>Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'Email Not Exist'
  })</script>";
	}
}
if(!empty($_POST["submit_otp"])) {
	$result = mysqli_query($con,"SELECT OTP FROM 1client_details WHERE EMAIL='" . $_SESSION['new_email']. "' AND is_expired!=1 AND NOW() <= DATE_ADD(REGISTOR_DATE, INTERVAL 24 HOUR)");
  $row = mysqli_fetch_assoc($result);
	if($_POST["otp"]==$row['OTP']){
		$success = 2;
	} else {
		$success =1;
		$error_message = "<script>Swal.fire({
	icon: 'error',
	title: 'Oops...',
	text: 'OTP INVALID!'
})</script>";
	}
}
?>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Shopeasy365</title>
		<link rel="shortcut icon" href="img/webi1.png"/>
	  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="css/verify.css">
<style>
body{
	background: #E0EAFC;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #CFDEF3, #E0EAFC);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #CFDEF3, #E0EAFC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}
</style>
</head>
<body>
	<?php
		if(!empty($error_message)) {
	?>
	<div><?php echo $error_message; ?></div>
	<?php
		}
	?>

<form name="frmUser" method="post" action="verify_email.php">
	<div class="tblLogin">
		<?php
			if(!empty($success == 1)) {
		?>
		<div class="tableheader">Enter OTP</div>
		<p style="color:#31ab00;">Check your email for the OTP</p>
		<div class="tablerow">
			<input type="text" name="otp" placeholder="One Time Password" class="login-input" >
		</div>
		<div class="tableheader"><input type="submit" name="submit_otp" value="Submit" class="btnSubmit1"></div>
		<div class="tableheader"><input type="submit" name="resend_otp" value="Resend" class="btnSubmit2"></div>
		<?php
			} else if ($success == 2) {
        ?>
    <script>Swal.fire({
  icon: 'success',
  title: 'Email Verify successfully',
  showConfirmButton: false,
  timer: 1800
})</script>

		<script>setTimeout(function() {
    openWindow = window.open('forgot_pass.php', '_self');
}, 2500);</script>

		<?php
			}
			else {
		?>

		<div class="tableheader">Enter Your Registor Email</div>
		<div class="tablerow"><input type="email" name="email" placeholder="Email" class="login-input" required></div>
		<div class="tableheader"><input type="submit" name="submit_email" value="Submit" class="btnSubmit"></div>
		<?php
			}
		?>
	</div>
</form>
</body>
</html>
