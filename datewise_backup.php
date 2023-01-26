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
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
  <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="backup.php">Home</a>
  <a href="#">None</a>
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
    <h2>Backup Data</h2>
    <form action="datewise_backup.php" method="post">
      <div class="form-group">
      <label for="s_date">Select Start Date</label>
      <input type="date" class="form-control" id="exampleInputdate" name="s_date" required>
    </div>
    <div class="form-group">
    <label for="e_date">Select End Date</label>
    <input type="date" class="form-control" id="exampleInputdate"  name="e_date" required>
    </div>
    <div class="form-group">
         <label  for="backup_type">Select Choice</label>
           <select name="backup_type" class="form-control">
             <option value="borrow">Customer Borrow</option>
             <option value="customer_bill_info">Customer Bills</option>
             <option value="supply_entry">Supplier Transaction</option>
           </select>
       </div>
  <button type="submit" class="btn btn-primary" name="export">Download File</button>
  </form>
  </div>

</body>
</html>
<?php
  if(isset($_POST["export"]))
  {
    $_SESSION['backup_type']=$_POST['backup_type'];
    $_SESSION['s_date']=$_POST['s_date'];
    $_SESSION['e_date']=$_POST['e_date'];
    if($_POST['backup_type']=='borrow')header('Location: http://localhost/datewise_export_borrow.php');
    if($_POST['backup_type']=='customer_bill_info')header('Location: http://localhost/datewise_export_bills.php');
    if($_POST['backup_type']=='supply_entry')header('Location: http://localhost/datewise_export_transaction.php');
    echo "  <script>Swal.fire({
      title: 'File Downloaded',
      icon:'success',
      showDenyButton: true,
      showCancelButton: false,
      confirmButtonText: `Download More`,
      denyButtonText: `No Thanks`,
      }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
      setTimeout(function() {
      openWindow = window.open('monthly_backup.php', '_self');
      }, 300);
      } else if (result.isDenied) {
      setTimeout(function() {
      openWindow = window.open('backup.php', '_self');
      }, 300);
      }
      else{
      setTimeout(function() {
      openWindow = window.open('product_delete.php', '_self');
      }, 300);
      }
    })</script>";
  }
 ?>
