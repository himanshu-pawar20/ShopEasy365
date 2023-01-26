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
 <style type="text/css">
   .container{
     margin-top: 7%;
     width: 450px;
     border: ridge 1.5px white;
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
    <h2>Update Products Stock</h2>
  <form action="stock_update.php" method="post">
  <div class="form-group">
    <label for="up_stock">Enter Stock Number</label>
    <input type="number" class="form-control" id="exampleInputphoneno" name="up_stock" required>
  </div>
  <button type="submit" class="btn btn-primary" name="up_submit">Update Stock</button>
  </form>
  </div>
</body>
</html>


<?php
if(isset($_POST['up_submit'])){
  $new_up_stock=$_POST['up_stock'];
  $new_date=date('Y-m-d');
  $up_id1=$_SESSION['pid2'];
  $p_result=mysqli_query($con,"SELECT * FROM `product` WHERE PID = '" .$up_id1. "'");
  $u_row=mysqli_fetch_assoc($p_result);
  $last_stock=$u_row['PSTOCK'];
  $comlete_stock=$new_up_stock+$last_stock;
  $new_up=mysqli_query($con,"UPDATE product SET PSTOCK = '".$comlete_stock."',PLAST_STOCK_UPDATE='".$new_date."' WHERE PID = '" .$up_id1. "'");

  if($new_up){
    echo"<script>Swal.fire({
  icon: 'success',
  title: 'Stock Updated successfully',
  showConfirmButton: false,
  timer: 1900
})</script>

		<script>setTimeout(function() {
    openWindow = window.open('products.php', '_self');
}, 2000);</script>";

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
