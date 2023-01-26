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
   .container{
     margin-top: 5%;
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
  <div class="container">
    <h2>Update Report</h2>
  <form action="update_a_r.php" method="post">
    <div class="form-group">
    <label for="s1_date">Select Date</label>
    <input type="date" class="form-control" id="exampleInputfirstname" name="s1_date" required>
  </div>
  <div class="form-group">
  <label for="e1_name">Employ Name</label>
  <select name="e1_name" required class="form-control" >
    <?php

    $sql1="SELECT * FROM $table_name11";
    $result1=mysqli_query($con,$sql1);
    $row1=mysqli_fetch_assoc($result1);
    while ($row1=mysqli_fetch_assoc($result1)) {?>
        <option value="<?php echo $row1['e_name'];?>">&nbsp;<?php echo $row1['e_name'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
    <?php
    }
    ?>

  </select>
  </div>
  <div class="form-group">
    <label for="a_status">Attemdence Status</label>
    <select name="a_status" required class="form-control" >
    <option value="P">&nbsp;Present&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
    <option value="A">&nbsp;Absent&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary" name="submit_u">Update</button>
  </form>
  </div>

</body>
</html>
<br>
<br>
<?php
if(isset($_POST['submit_u'])){
  $s1_date=$_POST['s1_date'];
  $e1_name=$_POST['e1_name'];
    $Ename = str_replace(' ', '_', $e1_name);
  $a_status=$_POST['a_status'];
  $res=mysqli_query($con,"UPDATE $table_name12 SET `$Ename`='$a_status' WHERE a_date='$s1_date'");
  if($res){
    echo"  <script>Swal.fire({
    title: 'Attendence Updated',
    icon:'success',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText: `Update More`,
    denyButtonText: `No Thanks`,
  }).then((result) => {
  if (result.isConfirmed) {
    setTimeout(function() {
    openWindow = window.open('update_a_r.php', '_self');
  }, 300);
  } else if (result.isDenied) {
    setTimeout(function() {
    openWindow = window.open('attendence.php', '_self');
    }, 300);
  }
  else{
   setTimeout(function() {
   openWindow = window.open('update_a_r.php', '_self');
   }, 300);
 }
  })</script>";
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
