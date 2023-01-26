<?php
session_start();
include('database.php');
$temp_sess8=$_SESSION['special_id'];
$table_name11="{$temp_sess8}employ_data";
$table_name12="{$temp_sess8}attendence";
if(isset($_POST['update_e'])){
  $_SESSION['uid2']=$_POST['update_e'];
  $uid2=$_SESSION['uid2'];
  $sql3="SELECT e_name FROM $table_name11 WHERE e_id='$uid2'";
  $result3=mysqli_query($con,$sql3);
  $row3=mysqli_fetch_assoc($result3);
  $_SESSION['last_name']=$row3['e_name'];
  header('location: employ_update.php');
}
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shopeasy365</title>
    <link rel="shortcut icon" href="img/webi1.png"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/product.css">
</head>
<body>
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
    <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="admin_home.php">Home</a>
    <a href="add_employ.php">Add Employ</a>
      <a href="employ_delete.php">Delete Employ</a>
    <a href="attendence.php">Attendence</a>
    <a href="#">Help</a>
  </div>
  <script>
  function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
  }

  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }
  </script>
<?php

$sql = "select * from $table_name11";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
echo"<div class='main'>";
echo "<h1>Employ Details </h1><br><br>";
echo"<ul class='cards'>";
while ($row = mysqli_fetch_array($result)) {
  $eid=$row['e_id'];
  $egender=$row['e_gender'];
  $ename=$row['e_name'];
  $image = $row['e_img'];
  $image_src = "img2/{$table_name11}/".$image;
  $eemail=$row['e_email'];
  $ephone=$row['e_phone'];
  $esalary=$row['e_salary'];
  ?>
    <li class='cards_item'>
      <div class='card'>
        <div class='card_image'><img class='i1'src='<?php echo $image_src;?>'></div>
        <div class='card_content'>
          <h2 class='card_title'><?php echo $eid;?></h2>
          <h2 class='card_title'><?php echo $egender;?>&nbsp;<?php echo $ename;?></h2>
          <h2 class='card_title'>Email-<?php echo $eemail;?></h2>
          <h2 class='card_title'>Phone No- <?php echo $ephone;?> </h2>
          <h2 class='card_title'>Salary- <?php echo $esalary;?>&nbsp;INR </h2><br>

          <form action="employ.php" method="post">
          <button class='btn card_btn' value="<?php echo $eid;?>" name='update_e'>UPDATE DATA</button>
       </form>
      </div>
      </div>
    </li>
    <?php
}
?>
</ul>
</div>
</body>
</html>
