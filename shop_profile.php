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
    <h2>Update Shop Profile</h2>
  <form action="shop_profile.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
    <label for="s_name">Shop Name</label>
    <input type="text" class="form-control" id="exampleInputfirstname" name="s_name" value="<?php echo $row['SHOP_NAME'];?>"required>
  </div>
  <div class="form-group">
    <label for="s_img">Invoice Logo</label>
    <input type="file" class="form-control-file"  id="input1"  name="s_img" value="<?php echo $row['INVOICE_LOGO'];?>" required>
  </div>
  <div class="form-group">
    <label for="s_mobile no">Shop Mobile No</label>
    <input type="number" class="form-control" id="exampleInputphoneno" name="s_mobile no" value="<?php echo $row['PHONE_NO'];?>" required>
  </div>
  <div class="form-group">
    <label for="shop_type">Shop Type</label>
    <input type="text" class="form-control" id="exampleInputEmail1"  name="shop_type" value="<?php echo $row['SHOP_TYPE'];?>" required>
  </div>
  <div class="form-group">
  <label for="s_address">Shop Address</label>
  <input type="text" class="form-control" id="exampleInputEmail1"  name="s_address" value="<?php echo $row['SHOP_ADDRESS'];?>" required>
  </div>
  <div class="form-group">
    <label for="s_pincode">Shop Area Pincode</label>
    <input type="number" class="form-control" id="exampleInputPassword" name="s_pincode" value="<?php echo $row['AREA_PIN'];?>" required>
  </div>
  <button type="submit" class="btn btn-primary" name="shop_p">Update Profile</button>
  </form>
  </div>
</body>
</html>
<?php

if(isset($_POST['shop_p'])){
  $s_name=$_POST['s_name'];
  $s_mobile_no=$_POST['s_mobile_no'];
  $shop_type=$_POST['shop_type'];
  $s_address=$_POST['s_address'];
  $s_pincode=$_POST['s_pincode'];

  $s_img = $_FILES["s_img"]["name"];
  $target_dir = "img2/logos/";
  $target_file = $target_dir . basename($_FILES["s_img"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $extensions_arr = array("jpg","jpeg","png","gif");
  $result_i=mysqli_query($con,"SELECT * FROM 1client_details WHERE INVOICE_LOGO='$s_img'");
  $row_num=mysqli_num_rows($result_i);
  if($row_num>0){
    die("<script>Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Please Rename Image'
})</script>");
  }

  if(in_array($imageFileType,$extensions_arr)&&($_FILES["s_img"]["size"]<150000)){
    $res1=mysqli_query($con,"UPDATE 1client_details SET SHOP_NAME='".$s_name."', SHOP_TYPE='".$shop_type."', INVOICE_LOGO='".$s_img."', SHOP_ADDRESS='".$s_address."',AREA_PIN='".$s_pincode."',PHONE_NO='".$s_mobile_no."' WHERE cd_id = $temp_session_id");
    move_uploaded_file($_FILES['s_img']['tmp_name'],$target_dir.$s_img);
    if($res1){
      echo" <script>Swal.fire({

        icon: 'success',
        title: 'Shop Profile Updated',
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
  })</script>
  <script>setTimeout(function() {
      openWindow = window.open('shop_profile.php', '_self');
  }, 2030);</script>";
    }
  }
  else{
    echo"<script>Swal.fire({
  icon: 'warning',
  title: 'Oops...',
  text: 'Image Size Is Big Or change Image Type'
})</script>";
  }
}
 ?>
