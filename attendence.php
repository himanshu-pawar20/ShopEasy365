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
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="css/menus.css">
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
  .form-rounded {
 border-radius: 0.6rem;
 }
 </style>
 </head>
 <body>

   <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
   <div id="mySidenav" class="sidenav">
   <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
   <a href="employ.php">Home</a>
   <a href="update_a_r.php">Update Report</a>
   <a href="datewise_r.php">Datewise Report</a>
   <a href="last_d_attendence.php">Last Day Report</a>
   <a href="total_a_report.php">Attendence Report</a>
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
   <h2 style="text-align:center;">ATTENDENCE</h2>
<br>
<br>
   <div  id="myTable" class="table-responsive">
    <table   class="table table-bordered  table-highligh table-hover">

     <tr>
       <th class="table-dark">Sr No</th>
       <th class="table-dark">Employ Name</th>
       <th class="table-dark">Attendence Status</th>
       <th class="table-dark">Attendence Status</th>
        <th class="table-dark">Submit</th>

     </tr>
   <?php
   $temp_sess8=$_SESSION['special_id'];
   $table_name11="{$temp_sess8}employ_data";
   $table_name12="{$temp_sess8}attendence";

   $sql="SELECT * FROM $table_name11";
   $result=mysqli_query($con,$sql);
   $row=mysqli_fetch_assoc($result);
   $x1=1;
   while ($row=mysqli_fetch_assoc($result)) {
     $ename1=$row['e_name'];?>

     <tr>
    <td><?php echo $x1;?></td>

    <td><?php echo $row['e_name'];?></td>

    <form action="attendence.php" method="post">

<td><input type="radio" name="s" value="P" required><label>Present</label><br></td>
<td><input type="radio" name="s" value="A" required><label>Absent</label><br></td>
  <td><button type='submit' name='submit_a' value="<?php echo $row['e_name'];?>" class="btn btn-primary btn-sm">Submit Attendence</button></td>
  </form>


     </tr>

      <?php
      $x1+=1;

   }
   ?>
   </table>
</div>
 </body>
</html>

<?php
if(isset($_POST['submit_a'])){
  $em_name=$_POST['submit_a'];
  $a_status=$_POST['s'];
  $today_date=date('Y-m-d');

  $sql10="SELECT * FROM $table_name12 WHERE a_date='$today_date'";
  $result10=mysqli_query($con,$sql10);
  $r=mysqli_num_rows($result10);
  if($r>0){
    $sql12="SELECT a_id FROM $table_name12 WHERE a_date='$today_date'";
    $result12=mysqli_query($con,$sql12);
    $row12=mysqli_fetch_assoc($result12);
    $a_id=$row12['a_id'];
    $Ename = str_replace(' ', '_', $em_name);
    $res1=mysqli_query($con,"UPDATE $table_name12 SET  `$Ename`='$a_status' WHERE a_id='$a_id'");
    if($res1){
      echo"<script>Swal.fire({

        icon: 'success',
        title: 'Attendence Marked',
        showConfirmButton: false,
        timer: 1200
  })</script>";
      echo"<script>setTimeout(function() {
      openWindow = window.open('attendence.php', '_self');
  }, 1225);</script>";
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
    $res2=mysqli_query($con,"INSERT INTO $table_name12(a_id,a_date,$em_name) VALUES(NULL,'$today_date','$a_status')");
    if($res2){
      echo"<script>Swal.fire({

        icon: 'success',
        title: 'Attendence Marked',
        showConfirmButton: false,
        timer: 1200
  })</script>";
      echo"<script>setTimeout(function() {
      openWindow = window.open('attendence.php', '_self');
  }, 1225);</script>";

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
