<?php
session_start();
include('database.php');
$temp_sp5=$_SESSION['special_id'];
$table_name="{$temp_sp5}product";
$table_name2="{$temp_sp5}out_products";
$table_name3="{$temp_sp5}customer_bill_info";
$table_name4="{$temp_sp5}out_products_data";
$result9=mysqli_query($con,"SELECT * FROM $table_name2");
$row9=mysqli_fetch_assoc($result9);


$total_discount=0;
$total_tax=0;
$total=0;
while($row9=mysqli_fetch_assoc($result9)){
  $total_discount1=$row9['out_product_discount_value'];
  $total_tax1=$row9['out_product_tax_value'];
  $total1=$row9['out_total'];
  $total_discount+=$total_discount1;
  $total_tax+=$total_tax1;
  $total+=$total1;
}
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
     <h2>Registration Form</h2>
   <form action="customer_bill_info.php" method="post">
     <div class="form-group">
     <label for="cname">Customer Name</label>
     <input type="text" class="form-control" id="exampleInputfirstname" name="cname" required>
   </div>
   <div class="form-group">
     <label for="cmobile_no">Customer Mobile no</label>
     <input type="text" class="form-control" id="exampleInputphoneno" name="cmobile_no" required>
   </div>
   <div class="form-group">
     <label for="caddress">Customer Address</label>
     <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="caddress" required>
   </div>

   <button type="submit" class="btn btn-primary" name="print">Print Invoice</button>
   </form>
   <form action="customer_bill_info.php" method="post">
  <button type="submit" class="btn btn-danger" style="margin-left:150px;margin-top:-55px;" name="reentry">Add More Product</button>
 </form>
   </div>
 </body>
 </html>


<?php
if(isset($_POST['reentry'])){
  header("location: customer_invoice.php");
}
if(isset($_POST['print'])){

  $cname=$_POST['cname'];
  $cmobile_no=$_POST['cmobile_no'];
  $caddress=$_POST['caddress'];
  $total_discount;
  $total_tax;
  $total;
  $grand_total=$total+$total_tax-$total_discount;
  $cdate=date('Y-m-d');
  $customer_bill=mysqli_query($con,"INSERT INTO $table_name3(`c_id`, `customer_name`, `customer_mobile_no`, `customer_address`,`ctotal_discount`,`ctotal_tax`,`ctotal`,`grand_total`,`cdate`) VALUES (NULL, '$cname', '$cmobile_no', '$caddress', '$total_discount','$total_tax','$total','$grand_total','$cdate')");
  $result8=mysqli_query($con,"SELECT * FROM $table_name2");
  $row8=mysqli_fetch_assoc($result8);
  while($row8=mysqli_fetch_assoc($result8)){
    $h1=$row8['out_product_name'];
    $h2=$row8['product_id'];
    $h3=$row8['out_product_quantity'];
    $h4=$row8['out_product_price'];
    $h5=$row8['out_product_discount'];
    $h6=$row8['out_product_discount_value'];
    $h7=$row8['out_product_tax'];
    $h8=$row8['out_product_tax_value'];
    $h9=$row8['out_total'];
    $hdate=$row8['out_product_date'];
    mysqli_query($con,"INSERT INTO $table_name4(`out_id`, `out_product_name`, `product_id`, `out_product_quantity`, `out_product_price`,`out_product_discount`,`out_product_discount_value`,`out_product_tax`,`out_product_tax_value`,`out_total`,`out_product_date`) VALUES (NULL, '$h1', '$h2', '$h3', '$h4', '$h5','$h6','$h7','$h8','$h9','$hdate')");
  }
  if($customer_bill){
    echo"<script>let timerInterval
    Swal.fire({
      title: 'Generating PDF',
      html: 'I will open in <b></b> milliseconds.',
      timer: 2000,
      timerProgressBar: true,
      didOpen: () => {
        Swal.showLoading()
        timerInterval = setInterval(() => {
          const content = Swal.getContent()
          if (content) {
            const b = content.querySelector('b')
            if (b) {
              b.textContent = Swal.getTimerLeft()
            }
          }
        }, 100)
      },
      willClose: () => {
        clearInterval(timerInterval)
      }
    }).then((result) => {
      if (result.dismiss === Swal.DismissReason.timer) {
        console.log('I was closed by the timer')
      }
    }) </script>";
    echo"<script>setTimeout(function() {
    openWindow = window.open('invoice_pdf.php','_blank');
  }, 2100);</script>";
  echo"<script>setTimeout(function() {
  openWindow = window.open('create_bill.php','_self');
}, 2200);</script>";

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
