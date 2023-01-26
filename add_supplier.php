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
     <h2>Add Supplier</h2>
   <form action="add_supplier.php" method="post">
     <div class="form-group">
     <label for="sname2">supplier Name</label>
     <input type="text" class="form-control" id="exampleInputfirstname" name="sname2" required>
   </div>

   <div class="form-group">
   <label for="sparty">Party/Compony Name</label>
   <input type="text" class="form-control" id="exampleInputfirstname" name="sparty" required>
 </div>
 <div class="form-group">
 <label for="bank_name">Bank Name</label>
 <input type="text" class="form-control" id="exampleInputfirstname" name="bank_name" required>
 </div>
 <div class="form-group">
 <label for="bank_account_no">Bank Account Number</label>
 <input type="text" class="form-control" id="exampleInputfirstname" name="bank_account_no" required>
 </div>
   <div class="form-group">
   <label for="bank_ifsc">Bank IFSC</label>
   <input type="text" class="form-control" id="exampleInputEmail1"  name="bank_ifsc" required>
   </div>
   <div class="form-group">
     <label for="semail">Supplier Email</label>
     <input type="email" class="form-control"  id="exampleInputEmail1"  name="semail" required >
   </div>
   <div class="form-group">
     <label for="sphone">Supplier Phone No</label>
     <input type="text" class="form-control" id="exampleInputphoneno" name="sphone" required>
   </div>
   <div class="form-group">
     <label for="saddress">Supplier Address</label>
     <input type="text" class="form-control" id="exampleInputphoneno" name="saddress" required>
   </div>
   <div class="form-group">
     <label for="sproduct">Supplier Products</label>
     <input type="text" class="form-control" id="exampleInputphoneno" name="sproduct" required>
   </div>
   <button type="submit" class="btn btn-primary" name="submit_p">Add Supplier</button>
   </form>
   </div>
 </body>
 </html>




 <?php

 $temp_sess1=$_SESSION['special_id'];
 $table_name7="{$temp_sess1}supplier";
 if(isset($_POST['submit_p'])){
   $sname1=$_POST['sname2'];
   $sparty=$_REQUEST['sparty'];
   $bank_name=$_REQUEST['bank_name'];
   $bank_account_no=$_REQUEST['bank_account_no'];
   $bank_ifsc=$_REQUEST['bank_ifsc'];
   $semail=$_REQUEST['semail'];
   $sphone=$_REQUEST['sphone'];
   $saddress=$_REQUEST['saddress'];
   $sproduct=$_REQUEST['sproduct'];
   $sql=mysqli_query($con,"INSERT INTO $table_name7 (`su_id`, `su_name`, `su_party_name`, `bank_name`, `bank_account_no`, `bank_ifsc`, `su_email`, `su_phone`, `su_address`, `su_products`) VALUES (NULL, '$sname1', '$sparty','$bank_name','$bank_account_no','$bank_ifsc','$semail', '$sphone', '$saddress', '$sproduct')");
   if($sql){
      echo"<script>Swal.fire({
      title: 'Supplier Added',
      icon:'success',
      showDenyButton: true,
      showCancelButton: false,
      confirmButtonText: `Add More`,
      denyButtonText: `No Thanks`,
    }).then((result) => {
    if (result.isConfirmed) {
      setTimeout(function() {
      openWindow = window.open('add_supplier.php', '_self');
    }, 300);
    } else if (result.isDenied) {
      setTimeout(function() {
      openWindow = window.open('supplier.php', '_self');
      }, 300);
    }else {
      setTimeout(function() {
      openWindow = window.open('add_supplier.php', '_self');
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
