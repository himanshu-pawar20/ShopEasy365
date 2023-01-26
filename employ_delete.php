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
.form-rounded {
border-radius: 0.6rem;
}
</style>
</head>
<body>
  <div class="container">
    <h2>Delete Employ</h2>
  <form action="employ_delete.php" method="post">
    <div class="form-group">
    <label for="dname">Employ Name</label>
    <input type="text" class="form-control" id="exampleInputfirstname" name="dname" required>
  </div>
  <div class="form-group">
  <label for="d_id">Employ Id</label>
  <input type="number" class="form-control" id="exampleInputEmail1"  name="d_id" required>
  </div>
  <button type="submit" class="btn btn-primary" name="submit_d">Delete Employee</button>
  </form>
  </div>
<br>
<br>
  <label for="pi">Serch For Id</label>
  <input class="form-rounded" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
  <br>
  <br>
 <div  id="myTable" class="table-responsive">
  <table   class="table table-bordered  table-highligh table-hover">

   <tr>
     <th class="table-dark">Sr No</th>
     <th class="table-dark">Employ Name</th>
     <th class="table-dark">Employ Id</th>
   </tr>
 <?php
 $temp_sess8=$_SESSION['special_id'];
 $table_name11="{$temp_sess8}employ_data";
 $table_name12="{$temp_sess8}attendence";

 $sql="SELECT * FROM $table_name11";
 $result=mysqli_query($con,$sql);
 $row=mysqli_fetch_assoc($result);
 $x1=1;
 while ($row=mysqli_fetch_assoc($result)) {?>
  <tr>
  <td><?php echo $x1;?></td>

  <td><?php echo $row['e_name'];?></td>
  <td><?php echo $row['e_id'];?></td>
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
<script>
function myFunction() {
 var input, filter, table, tr, td, i, txtValue;
 input = document.getElementById("myInput");
 filter = input.value.toUpperCase();
 table = document.getElementById("myTable");
 tr = table.getElementsByTagName("tr");
 for (i = 0; i < tr.length; i++) {
   td = tr[i].getElementsByTagName("td")[1];
   if (td) {
     txtValue = td.textContent || td.innerText;
     if (txtValue.toUpperCase().indexOf(filter) > -1) {
       tr[i].style.display = "";
     } else {
       tr[i].style.display = "none";
     }
   }
 }
}
</script>
</body>
</html>



<?php
if(isset($_POST['submit_d'])){
  $s1=$_POST['d_id'];

  $sql33="SELECT e_id FROM  `$table_name11` WHERE e_id='$s1'";
  $result33=mysqli_query($con,$sql33);
  $s=mysqli_num_rows($result33);
  if(!$s>0){
    die("<script>Swal.fire({
  icon: 'warning',
  title: 'Oops...',
  text: 'Please Enter Right Employ Id'
})</script>");
  }
  $sql41="SELECT e_name FROM  `$table_name11` WHERE e_id='$s1'";
  $result41=mysqli_query($con,$sql41);
  $row41=mysqli_fetch_assoc($result41);
  $drop_c=$row41['e_name'];
  $sql45=mysqli_query($con,"ALTER TABLE `$table_name12` DROP `$drop_c` ");
  $sql3=mysqli_query($con,"DELETE FROM  `$table_name11` WHERE e_id='$s1'");
  if($sql3 && $sql45){
    echo" <script>Swal.fire({
    title: 'Employ Deleted',
    icon:'success',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText: `Delete More`,
    denyButtonText: `No Thanks`,
  }).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    setTimeout(function() {
    openWindow = window.open('employ_delete.php', '_self');
  }, 300);
  } else if (result.isDenied) {
    setTimeout(function() {
    openWindow = window.open('employ.php', '_self');
    }, 300);
  }
  else{
   setTimeout(function() {
   openWindow = window.open('employ_delete.php', '_self');
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
