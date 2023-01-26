<?php
session_start();
include("database.php");
$uid2=$_SESSION['uid2'];
$emp_name=$_SESSION['last_name'];
$temp_sess8=$_SESSION['special_id'];
$table_name11="{$temp_sess8}employ_data";
$table_name12="{$temp_sess8}attendence";

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
    <h2>Update Employ Data</h2>
  <form action="employ_update.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
    <label for="Ename">Employ Name</label>
    <input type="text" class="form-control" id="exampleInputfirstname" name="Ename" required>
  </div>

  <div class="form-group">
    <label for="Ephone">Phone Number</label>
    <input type="text" class="form-control" id="exampleInputphoneno" name="Ephone" required>
  </div>
  <div class="form-group">
    <label for="Eemail">Email Address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Eemail" required>
  </div>
  <div class="form-group">
    <label for="Etype">Employ type</label>
    <input type="text" class="form-control" id="exampleInputlastname" name="Etype" required>
  </div>
  <div class="form-group">
  <label for="Esalary">Monthly Salary</label>
  <input type="number" class="form-control" id="exampleInputEmail1"  name="Esalary" required>
  </div>
  <div class="form-group">
    <label for="Eaddress">Employ Address</label>
    <input type="text" class="form-control" id="exampleInputPassword" name="Eaddress" required>
  </div>
  <div class="form-group">
    <label for="Eimg">Employ Image</label>
    <input type="file" class="form-control-file" id="input1" name="Eimg" required>
  </div>
  <div class="form-group">
    <label for="Egender">Employ Gender</label>
    <select name="Egender" required class="form-control" >
    <option value="Mr">&nbsp;Mr&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
    <option value="Ms">&nbsp;Ms&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
    <option value="Other">&nbsp;Other&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary" name="Esubmit">Update</button>
  </form>
  </div>
</body>
</html>


<?php
if(isset($_POST['Esubmit'])){
  $Ename=$_POST['Ename'];
  $Eemail=$_POST['Eemail'];
  $Ephone=$_POST['Ephone'];
  $Etype=$_POST['Etype'];
  $Esalary=$_POST['Esalary'];
  $Eaddress=$_POST['Eaddress'];

  $name = $_FILES["Eimg"]["name"];
  $target_dir = "img2/{$table_name11}/";
  $target_file = $target_dir . basename($_FILES["Eimg"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $extensions_arr = array("jpg","jpeg","png","gif");

  $Egender=$_POST['Egender'];
  $uid2=$_SESSION['uid2'];
  $sql33="SELECT e_name FROM $table_name11 WHERE e_name='$Ename'";
  $result33=mysqli_query($con,$sql33);
  $s=mysqli_num_rows($result33);
  if($s>0){
    die("<script>Swal.fire({
  icon: 'warning',
  title: 'Oops...',
  text: 'Name Alredy Exist'
})</script>");
  }
  $result_i=mysqli_query($con,"SELECT * FROM $table_name11 WHERE e_img='$name'");
  $row_num=mysqli_num_rows($result_i);
  if($row_num>0){
    die("<script>Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Please Rename Image'
})</script>");
  }

  if(in_array($imageFileType,$extensions_arr)&&($_FILES["Eimg"]["size"]<150000)){
    $sql5=mysqli_query($con,"UPDATE $table_name11 SET  e_name='$Ename', e_email='$Eemail', e_phone='$Ephone', e_type='$Etype',e_salary='$Esalary',e_address='$Eaddress',e_img='$name',e_gender='$Egender' WHERE e_id='$uid2'");
    $sql2="SELECT e_name FROM $table_name11 WHERE e_id='$uid2'";
    $result2=mysqli_query($con,$sql2);
    $row2=mysqli_fetch_assoc($result2);
    $last_name=$row2['e_name'];
    $sql7=mysqli_query($con,"ALTER TABLE `$table_name12` CHANGE `$emp_name`  `$last_name` VARCHAR(255)");
    move_uploaded_file($_FILES['Eimg']['tmp_name'],$target_dir.$name);
    if($sql5&&$sql7){
      echo"<script>Swal.fire({

        icon: 'success',
        title: 'Employ Data Updated',
        showConfirmButton: false,
        timer: 2000
      })</script>
      <script>setTimeout(function() {
      openWindow = window.open('employ.php', '_self');
    }, 2050);</script>";
    }
    else{
      echo"<script>Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'Something Went Wrong'
  })</script>";
    }
  }
  else{
    echo"<script>Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Image Size Is Big'
})</script>";
  }

}

 ?>
