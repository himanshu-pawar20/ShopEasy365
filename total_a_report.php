<?php
session_start();
include("database.php");
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
 <link rel="stylesheet" href="css/menus.css">
 <style type="text/css">
   body{
     background: #E0EAFC;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #CFDEF3, #E0EAFC);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #CFDEF3, #E0EAFC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}
</style>
</head>
<body>

    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
    <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="attendence.php">Home</a>
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
  <br>
  <br>
  <br>
     <h2 style="text-align:center;">ATTENDENCE REPORT</h2>
  <br>
  <br>
  <div  id="myTable" class="table-responsive">
  <table   class="table table-bordered  table-highligh table-hover">
  <tr>
  <th class="table-dark">Sr No</th>
  <th class="table-dark">Date</th><?php
  $sql1="SELECT * FROM $table_name11";
  $result1=mysqli_query($con,$sql1);
  $row1=mysqli_fetch_assoc($result1);
  while ($row1=mysqli_fetch_assoc($result1)) {?>
    <th class="table-dark"><?php echo $row1['e_name'];?> </th>
  <?php
  }
  ?>

  </tr>
  <?php

  $sql="SELECT * FROM $table_name12";
  $result=mysqli_query($con,$sql);
  $row=mysqli_fetch_assoc($result);
  $x1=1;
  while ($row=mysqli_fetch_assoc($result)) {
    $temp_id=$row['a_id'];?>
    <tr>
    <td><?php echo $x1;?></td>
    <td><?php echo $row['a_date'];?></td><?php
    $sql2="SELECT * FROM $table_name11";
    $result2=mysqli_query($con,$sql2);
    $row2=mysqli_fetch_assoc($result2);
    while ($row2=mysqli_fetch_assoc($result2)) {
      $temp_name=$row2['e_name'];
      $Ename = str_replace(' ', '_', $temp_name);
      $sql3="SELECT $Ename FROM `$table_name12` WHERE a_id='$temp_id'";
      $result3=mysqli_query($con,$sql3);
      $row3=mysqli_fetch_assoc($result3);?>
      <td ><?php if($row3[$Ename]=="")echo "NA";else echo $row3[$Ename];?></td>
      <?php
    }
    ?>
    </tr>
    <?php
    $x1+=1;
  }
  ?>
  </table>
 </div>
 <script type="text/javascript">
 $('#myTable tbody tr').click(function() {
    $(this).addClass('active').siblings().removeClass('active');
 });
 </script>
 <form action="total_a_report.php" method="post">
 <button style="margin-left:45%;margin-top:3.6%" type="submit" class="btn btn-primary" name="gen_c">Download All Attendance</button>
 </form>
 <?php
 if(isset($_POST['gen_c']))
 {
   header('Location: http://localhost/all_attendance_report.php');
 }
?>
</body>
</html>
