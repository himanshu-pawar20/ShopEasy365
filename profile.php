<?php
session_start();
include("database.php");
$temp_session_id=$_SESSION['special_id'];

$sql="SELECT * FROM `1client_details` WHERE cd_id=$temp_session_id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
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
    <h2>Update Profile</h2>
  <form action="profile.php" method="post">
    <div class="form-group">
    <label for="skname">Full Name</label>
    <input type="text" class="form-control" id="exampleInputfirstname" name="skname" value="<?php echo $row['FULL_NAME'];?>" required>
  </div>

  <div class="form-group">
    <label for="skmobile_no">Phone Number</label>
    <input type="text" class="form-control" id="exampleInputphoneno" name="skmobile_no" value="<?php echo $row['SK_PHONE_NO'];?>" required>
  </div>
  <div class="form-group">
    <label for="skemail">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="skemail" value="<?php echo $row['EMAIL'];?>" required>
  </div>
  <div class="form-group">
  <label for="skaddress">Address</label>
  <input type="text" class="form-control" id="exampleInputEmail1"  name="skaddress"  value="<?php echo $row['SK_ADDRESS'];?>" required>
  </div>
  <div class="form-group">
    <label for="skpincode">Area Pincode</label>
    <input type="text" class="form-control" id="exampleInputPassword" name="skpincode" value="<?php echo $row['SK_PINCODE'];?>" required>
  </div>
  <button type="submit" class="btn btn-primary" name="sk">Update Profile</button>
  </form>
  </div>
</body>
</html>

<?php
if(isset($_POST['sk'])){
  $skname=$_POST['skname'];
  $skmobile_no=$_POST['skmobile_no'];
  $skemail=$_POST['skemail'];
  $skaddress=$_POST['skaddress'];
  $skpincode=$_POST['skpincode'];


  $res=mysqli_query($con,"UPDATE 1client_details SET FULL_NAME='".$skname."', SK_ADDRESS='".$skaddress."',SK_PINCODE='".$skpincode."',EMAIL='".$skemail."',SK_PHONE_NO='".$skmobile_no."' WHERE cd_id =$temp_session_id");
  if($res){
    echo" <script>Swal.fire({

      icon: 'success',
      title: 'Profile Updated',
      showConfirmButton: false,
      timer: 2000
})</script>
<script>setTimeout(function() {
    openWindow = window.open('settings.php', '_self');
}, 2030);</script>";
  }
  else{
    echo" <script>Swal.fire({

      icon: 'error',
      title: 'Something Went Wrong',
      showConfirmButton: false,
      timer: 2000
})</script>";
  }
}
?>
