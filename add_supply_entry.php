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
 <style>
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
     <h2>Add Supply Entry</h2>
   <form action="add_supply_entry.php" method="post">
     <div class="form-group">
     <label for="suname">supplier Name</label>
     <input type="text" class="form-control" id="exampleInputfirstname" name="suname" required>
   </div>
   <div class="form-group">
     <label for="suphone">Supplier Phone No</label>
     <input type="text" class="form-control" id="exampleInputphoneno" name="suphone" required>
   </div>
   <div class="form-group">
   <label for="suparty">Party/Compony Name</label>
   <input type="text" class="form-control" id="exampleInputfirstname" name="suparty" required>
 </div>
 <div class="form-group">
 <label for="suproduct_name">Product Name</label>
 <input type="text" class="form-control" id="exampleInputfirstname" name="suproduct_name" required>
 </div>
 <div class="form-group">
 <label for="suproduct_quantity">Product Quantity</label>
 <input type="number" class="form-control" id="exampleInputfirstname" name="suproduct_quantity" required>
 </div>
   <div class="form-group">
   <label for="sutotal_bill">Total Amount</label>
   <input type="number" class="form-control" id="exampleInputEmail1"  name="sutotal_bill" required>
   </div>
   <div class="form-group">
     <label for="supaid">Paid Amount</label>
     <input type="number" class="form-control"  id="exampleInputEmail1"  name="supaid" required >
   </div>

   <div class="form-group">
     <label for="sudate">Date</label>
     <input type="date" class="form-control" id="exampleInputphoneno" name="sudate" required>
   </div>
   <button type="submit" class="btn btn-primary" name="submit">Add Entry</button>
   </form>
   </div>
 </body>
 </html>

 <?php
 $temp_sess3=$_SESSION['special_id'];
 $table_name8="{$temp_sess3}supply_entry";
 $table_name9="{$temp_sess3}supply_history";

 if(isset($_POST['submit'])){
   $suname=$_REQUEST['suname'];
   $suphone=$_REQUEST['suphone'];
   $suparty=$_REQUEST['suparty'];
   $suproduct_name=$_REQUEST['suproduct_name'];
   $suproduct_quantity=$_REQUEST['suproduct_quantity'];
   $sutotal_bill=$_REQUEST['sutotal_bill'];
   $supaid=$_REQUEST['supaid'];
   $suremain=$sutotal_bill-$supaid;
   $sudate2=$_REQUEST['sudate'];
   $sudate=date('Y-m-d');

   $res1=mysqli_query($con,"INSERT INTO $table_name8 (`supply_id`, `supplier_name`, `supplier_phone`, `party_name`, `products_name`, `product_quantity`, `total_bill_amount`, `paid_amount`, `repaid_amount`,`entry_date`,`entry_update_date`) VALUES (NULL, '$suname', '$suphone', '$suparty', '$suproduct_name', '$suproduct_quantity', '$sutotal_bill','$supaid','$suremain','$sudate2','$sudate')");
   $res=mysqli_query($con,"INSERT INTO $table_name9 (`h_id`, `hsupplier_name`, `hparty_name`, `hproducts_name`, `hproduct_quantity`, `htotal_bill_amount`, `hpaid_bill_amount`, `hrepaid_amount`,`hentry_date`,`hentry_update_date`) VALUES (NULL, '$suname', '$suparty', '$suproduct_name', '$suproduct_quantity', '$sutotal_bill','$supaid','$suremain','$sudate2','$sudate')");
   if($res1){
      echo"<script>Swal.fire({
      title: 'Entry Added',
      icon:'success',
      showDenyButton: true,
      showCancelButton: false,
      confirmButtonText: `Add More`,
      denyButtonText: `No Thanks`,
    }).then((result) => {
    if (result.isConfirmed) {
      setTimeout(function() {
      openWindow = window.open('add_supply_entry.php', '_self');
    }, 300);
    } else if (result.isDenied) {
      setTimeout(function() {
      openWindow = window.open('supplier_transaction.php', '_self');
      }, 300);
    }else {
      setTimeout(function() {
      openWindow = window.open('add_supply_entry.php', '_self');
      }, 300);
    }
    })</script>";
   }
   else{
     echo "<script>Swal.fire({
   icon: 'error',
   title: 'Oops...',
   text: 'Something Went Wrong'
 })</script>";
   }
 }
 ?>
