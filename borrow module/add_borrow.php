<?php
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
      margin-top: 1%;
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
     <h2>Add Customer Borrow</h2>
   <form action="add_borrow.php" method="post">
     <div class="form-group">
     <label for="bname">Customer Name</label>
     <input type="text" class="form-control" id="exampleInputfirstname" name="bname" required>
   </div>
   <div class="form-group">
   <label for="bproduct_data">Products</label>
   <input type="text" class="form-control" id="exampleInputEmail1"  name="bproduct_data" required>
   </div>
   <div class="form-group">
     <label for="btotal_bill">Total Amount</label>
     <input type="number" class="form-control" id="exampleInputphoneno" name="btotal_bill" required>
   </div>
   <div class="form-group">
     <label for="bgain">Paid Amount</label>
     <input type="number" class="form-control" id="exampleInputEmail1"  name="bgain" required>
   </div>
   <div class="form-group">
   <label for="breason">Borrow Reasone</label>
   <input type="text" class="form-control" id="exampleInputEmail1"  name="breason" required>
   </div>
   <div class="form-group">
     <label for="bphone_no">Mobile No</label>
     <input type="number" class="form-control" id="exampleInputphoneno" name="bphone_no" required>
   </div>
   <div class="form-group">
   <label for="bdate">Date</label>
   <input type="datetime-local" class="form-control" id="exampleInputEmail1"  name="bdate" required>
   </div>
   <button type="submit" class="btn btn-primary" name="submit_p">Add Borrow</button>
   </form>
   </div>

 <?php

 if(isset($_POST['submit_p'])){
   $bname=$_REQUEST['bname'];
   $bdate=$_REQUEST['bdate'];
   $date=date('Y-m-d');
   $bmobile_no=$_POST['bphone_no'];
   $bproduct_data=$_REQUEST['bproduct_data'];
   $btotal_bill=$_REQUEST['btotal_bill'];
   $bgain=$_REQUEST['bgain'];
   $breason=$_REQUEST['breason'];
   $btotal=$btotal_bill-$bgain;
   $sql=mysqli_query($con,"INSERT INTO `borrow` (`BID`, `BCUSTOMER_NAME`, `BDATE`, `BPRODUCTS`, `BTOTALBILL_AMOUNT`, `BGAIN_AMOUNT`, `BBORROWING_REASON`,`bmobile_no`, `BBORROWING_AMOUNT`, `last_update_date`) VALUES (NULL, '$bname', '$bdate', '$bproduct_data', '$btotal_bill', '$bgain', '$breason','$bmobile_no','$btotal','$date')");
   if($sql){
     echo"  <script>Swal.fire({
     title: 'Amount Added',
     icon:'success',
     showDenyButton: true,
     showCancelButton: false,
     confirmButtonText: `Add More`,
     denyButtonText: `No Thanks`,
   }).then((result) => {
   if (result.isConfirmed) {
     setTimeout(function() {
     openWindow = window.open('add_borrow.php', '_self');
   }, 300);
   } else if (result.isDenied) {
     setTimeout(function() {
     openWindow = window.open('borrowing_list.php', '_self');
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
