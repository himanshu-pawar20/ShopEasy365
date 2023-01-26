<?php
session_start();
include("database.php");
echo $_SESSION['edit1'];
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
    <h2>Update Repaid Amount</h2>
  <form action="borrow_edit.php" method="post">
  <div class="form-group">
    <label for="up_repaid">Enter Repaid Amount</label>
    <input type="number" class="form-control" id="exampleInputphoneno" name="up_repaid" required>
  </div>
  <button type="submit" class="btn btn-primary" name="up_submit">Update Amount</button>
  </form>
  </div>
</body>
</html>


<?php
if(isset($_POST['up_submit'])){
  $new_amount=$_POST['up_repaid'];
  $new_date=date('Y-m-d');
  $up_id1=$_SESSION['edit1'];

  $sql6="SELECT* FROM `borrow` WHERE BID='$up_id1'";
  $result6=mysqli_query($con,$sql6);
  $row6=mysqli_fetch_assoc($result6);
  $rborrowing=$row6['BBORROWING_AMOUNT'];
  $return=$rborrowing-$new_amount;
  $rgain_total=$new_amount+$row6['BGAIN_AMOUNT'];
  $sq=mysqli_query($con,"UPDATE `borrow` SET `BGAIN_AMOUNT`='$rgain_total',`BBORROWING_AMOUNT`='$return',`last_update_date`='$new_date' WHERE BID='$up_id1'");
  if($sq){
    echo"<script>Swal.fire({
  icon: 'success',
  title: 'Amount Updated ',
  showConfirmButton: false,
  timer: 1900
})</script>

		<script>setTimeout(function() {
    openWindow = window.open('borrowing_list.php', '_self');
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
