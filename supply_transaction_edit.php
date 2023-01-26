<?php
session_start();
include("database.php");
$_SESSION['edit3'];
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
     margin-top: 7%;
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
    <h2>Update Repaid Amount</h2>
  <form action="supply_transaction_edit.php" method="post">
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
$temp_sess4=$_SESSION['special_id'];
$table_name8="{$temp_sess4}supply_entry";
$table_name9="{$temp_sess4}supply_history";


if(isset($_POST['up_submit'])){
  $new_amount=$_POST['up_repaid'];
  $new_date=date('Y-m-d');
  $up_id1=$_SESSION['edit3'];

  $sql6="SELECT* FROM $table_name8 WHERE supply_id='$up_id1'";
  $result6=mysqli_query($con,$sql6);
  $row6=mysqli_fetch_assoc($result6);
  $rborrowing=$row6['repaid_amount'];
  $return=$rborrowing-$new_amount;
  $rgain_total=$new_amount+$row6['paid_amount'];
  $a1=$row6['supplier_name'];
  $a2=$row6['party_name'];
  $a3=$row6['products_name'];
  $a4=$row6['product_quantity'];
  $a5=$row6['total_bill_amount'];
  $a6=$row6['entry_date'];
  $sq=mysqli_query($con,"UPDATE $table_name8 SET `paid_amount`='$rgain_total',`repaid_amount`='$return',`entry_update_date`='$new_date' WHERE supply_id='$up_id1'");
  mysqli_query($con,"INSERT INTO $table_name9 (`h_id`, `hsupplier_name`, `hparty_name`, `hproducts_name`, `hproduct_quantity`, `htotal_bill_amount`, `hpaid_bill_amount`, `hrepaid_amount`,`hentry_date`,`hentry_update_date`) VALUES (NULL, '$a1', '$a2', '$a3', '$a4', '$a5','$rgain_total','$return','$a6','$new_date')");
  if($sq){
    echo"<script>Swal.fire({
  icon: 'success',
  title: 'Amount Updated ',
  showConfirmButton: false,
  timer: 1920
})</script>

		<script>setTimeout(function() {
    openWindow = window.open('supplier_transaction.php', '_self');
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
