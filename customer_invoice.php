<?php
session_start();
include('database.php');
$temp_sp4=$_SESSION['special_id'];
$table_name="{$temp_sp4}product";
$table_name2="{$temp_sp4}out_products";
if(isset($_GET['add'])){
  $aniket="show tables like '" .$table_name2. "'";
  $rowp=mysqli_query($con,$aniket);
  $rowp1 = mysqli_fetch_assoc($rowp);
  if ($rowp1<=0) {
    mysqli_query($con,"CREATE TABLE $table_name2(out_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,out_product_name VARCHAR(50) NOT NULL,product_id VARCHAR(50) NOT NULL,out_product_quantity VARCHAR(30) NOT NULL,out_product_price VARCHAR(50) NOT NULL,out_product_discount VARCHAR(50) NOT NULL,out_product_discount_value VARCHAR(50) NOT NULL,out_product_tax VARCHAR(50) NOT NULL,out_product_tax_value VARCHAR(50) NOT NULL,out_total VARCHAR(50) NOT NULL,out_product_date VARCHAR(50) NOT NULL)" );
    mysqli_query($con,"INSERT INTO $table_name2(`out_id`, `out_product_name`, `product_id`, `out_product_quantity`, `out_product_price`,`out_product_discount`,`out_product_discount_value`,`out_product_tax`,`out_product_tax_value`,`out_total`,`out_product_date`) VALUES (NULL, 'd', 1, 'd', 'd', 'd','d','d','d','d','d')");
  }
  else{
    mysqli_query($con,"DROP TABLE $table_name2");
    mysqli_query($con,"CREATE TABLE $table_name2(out_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,out_product_name VARCHAR(50) NOT NULL,product_id VARCHAR(50) NOT NULL,out_product_quantity VARCHAR(30) NOT NULL,out_product_price VARCHAR(50) NOT NULL,out_product_discount VARCHAR(50) NOT NULL,out_product_discount_value VARCHAR(50) NOT NULL,out_product_tax VARCHAR(50) NOT NULL,out_product_tax_value VARCHAR(50) NOT NULL,out_total VARCHAR(50) NOT NULL,out_product_date VARCHAR(50) NOT NULL)" );
    mysqli_query($con,"INSERT INTO $table_name2(`out_id`, `out_product_name`, `product_id`, `out_product_quantity`, `out_product_price`,`out_product_discount`,`out_product_discount_value`,`out_product_tax`,`out_product_tax_value`,`out_total`,`out_product_date`) VALUES (NULL, 'd', 1, 'd', 'd', 'd','d','d','d','d','d')");
  }
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
     <h2>Add Products</h2>
   <form action="customer_invoice.php" method="post">
     <div class="form-group">
     <label for="pname">Product Name</label>
     <input type="text" class="form-control" id="exampleInputfirstname" name="pname" required>
   </div>
   <div class="form-group">
   <label for="pid4">Product Id</label>
   <input type="number" class="form-control" id="exampleInputEmail1"  name="pid4" required>
   </div>
   <div class="form-group">
     <label for="quantity">Product Quantity</label>
     <input type="number" class="form-control"  id="input1"  name="quantity" required >
   </div>
   <div class="form-group">
     <label for="product_price">Product Price</label>
     <input type="number" class="form-control" id="exampleInputphoneno" name="product_price" required>
   </div>
   <div class="form-group">
     <label for="discount">Discount(%)</label>
     <input type="number" class="form-control" id="exampleInputEmail1"  name="discount" required>
   </div>
   <div class="form-group">
     <label for="tax">Tax(%)</label>
     <input type="number" class="form-control" id="exampleInputEmail1"  name="tax" required>
   </div>

   <button type="submit" class="btn btn-primary" name="submit_p">Add Product</button>
   </form>

    <form action="customer_invoice.php" method="post">
   <button type="submit" class="btn btn-danger" style="margin-left:150px;margin-top:-55px;" name="invoice">Go For Invoice</button>
 </form>

   </div>
   <div class="dropdown">
   <button type="button" class="btn btn-primary dropdown-toggle"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     Find Product Id
   </button>
     <div class="dropdown-menu">
       <label for="pi">Serch For Id</label>
       <input class="form-rounded" type="text" id="myInput" onkeyup="myFunction()" placeholder="Product name">
       <br>
      <div  id="myTable" class="table-responsive">
          <table   class="table table-bordered  table-highligh table-hover">
        <tr>
          <th  class="table-dark">Sr No</th>
          <th class="table-dark">Product Name</th>
          <th class="table-dark">Product Id</th>
          <th class="table-dark">Product Price</th>
          <th class="table-dark">Product Stock</th>

        </tr>
      <?php
if(isset($_POST['invoice'])){
  header("location: customer_bill_info.php");
      }

      $sql6="SELECT * FROM $table_name";
      $result6=mysqli_query($con,$sql6);
      $row6=mysqli_fetch_assoc($result6);
      $x1=1;
      while ($row6=mysqli_fetch_assoc($result6)) {?>
       <tr>
       <td><?php echo $x1;?></td>

       <td><?php echo $row6['PPRODUCT_NAME'];?></td>
       <td><?php echo $row6['PID'];?></td>
       <td><?php echo $row6['PPRODUCT_PRICE'];?></td>
       <td><?php echo $row6['PSTOCK'];?></td>
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
    });</script>
     </div>
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
   </div>
   <br>
   <div  id="myTable" class="table-responsive">
       <table   class="table table-bordered  table-highligh table-hover">
         <tr>
       <th class="table-dark">Sr No</th>
       <th class="table-dark">Product Name</th>
       <th class="table-dark">Quantity</th>
       <th class="table-dark">Rate</th>
       <th class="table-dark">Discount</th>
       <th class="table-dark">Tax</th>
       <th class="table-dark">Total</th>
       <th class="table-dark">Delete</th>
     </tr>
   <?php

   $sql="SELECT * FROM $table_name2";
   $result=mysqli_query($con,$sql);
   $row=mysqli_fetch_assoc($result);
   $y=1;
   while ($row=mysqli_fetch_assoc($result)) {?>
    <tr>
    <td><?php echo $y;?></td>
    <td><?php echo $row['out_product_name'];?></td>
    <td><?php echo $row['out_product_quantity'];?></td>
    <td><?php echo $row['out_product_price'];?></td>
    <td><?php echo $row['out_product_discount_value'];?></td>
    <td><?php echo $row['out_product_tax_value'];?></td>
    <td><?php echo $row['out_total'];?></td>
    <form method='post' action='customer_invoice.php'>
    <td><button type='submit' name='delete' value="<?php echo $row['out_id'];?>" class="btn btn-primary btn-sm" >Delete</button></td>
    </form>
    </tr>

   <?php
     $y+=1;
   }

   ?>
   </table>
   <hr>

   <?php
   $result8=mysqli_query($con,"SELECT * FROM $table_name2");
   $row8=mysqli_fetch_assoc($result8);
   $total_discount=0;
   $total_tax=0;
   $total_v=0;
   while($row8=mysqli_fetch_assoc($result8)){
   $total_discount1=$row8['out_product_discount_value'];
   $total_tax1=$row8['out_product_tax_value'];
   $total1=$row8['out_total'];
   $total_discount+=$total_discount1;
   $total_tax+=$total_tax1;
   $total_v+=$total1;
   }
   ?>

   <h4>Total Discount:&nbsp;&nbsp;<?php echo $total_discount;?>&nbsp;INR</h4>
   <h4>Total Tax:&nbsp;&nbsp;<?php echo $total_tax;?>&nbsp;INR</h4>
   <h4>Gross Total: &nbsp;&nbsp;<?php echo $total_v;?>&nbsp;INR</h4>
   <hr>
   <?php $grand_total1=$total_v-$total_discount+$total_tax;?>
   <h4>Grand Total:&nbsp;&nbsp; <?php echo $grand_total1;?>&nbsp;INR</h4>

   </body>
   </html>



<?php
if(isset($_POST['submit_p'])){
  $pname=$_POST['pname'];
  $pid4=$_POST['pid4'];
  $quantity=$_POST['quantity'];
  $product_price=$_POST['product_price'];
  $total=$quantity*$product_price;
  $discount=$_POST['discount'];
  $discount_value=($total*$discount)/100;
  $tax=$_POST['tax'];
  $tax_value=($total*$tax)/100;
  $sql3="SELECT * FROM $table_name WHERE PID='".$pid4."'";
  $result3=mysqli_query($con,$sql3);
  $row3=mysqli_num_rows($result3);
  if(!$row3>0){
    die("<script>Swal.fire({
  icon: 'warning',
  title: 'Oops...',
  text: 'Please Enter Right Product Id'
})</script>");
  }

  $pdate=date('Y-m-d');
  $out_product=mysqli_query($con,"INSERT INTO $table_name2(`out_id`, `out_product_name`, `product_id`, `out_product_quantity`, `out_product_price`,`out_product_discount`,`out_product_discount_value`,`out_product_tax`,`out_product_tax_value`,`out_total`,`out_product_date`) VALUES (NULL, '$pname', '$pid4', '$quantity', '$product_price', '$discount','$discount_value','$tax','$tax_value','$total','$pdate')");
  if($out_product){
    $sql13="SELECT * FROM $table_name WHERE PID='".$pid4."'";
    $result13=mysqli_query($con,$sql13);
    $row13=mysqli_fetch_assoc($result13);
    $exist_stock=$row13['PSTOCK'];
    $all_stock=$exist_stock-$quantity;
    mysqli_query($con,"UPDATE $table_name SET PSTOCK='$all_stock' WHERE PID='$pid4'");
    echo"<script>Swal.fire({
  icon: 'success',
  title: 'Entry Added',
  showConfirmButton: false,
  timer: 1600
})</script>

   <script>setTimeout(function() {
    openWindow = window.open('customer_invoice.php', '_self');
}, 1650);</script>";

  }
  else{
    echo"<script>Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Something Went Wrong'
})</script>";
  }

}
if(isset($_POST['delete'])){
  $s1=$_POST['delete'];
  $sql14="SELECT * FROM $table_name2 WHERE out_id='".$s1."'";
  $result14=mysqli_query($con,$sql14);
  $row14=mysqli_fetch_assoc($result14);
  $pid6=$row14['product_id'];
  $new_stockup1=$row14['out_product_quantity'];

  $sql15="SELECT * FROM $table_name WHERE PID='".$pid6."'";
  $result15=mysqli_query($con,$sql15);
  $row15=mysqli_fetch_assoc($result15);
  $exist_stock1=$row15['PSTOCK'];
  $all_stock1=$exist_stock1+$new_stockup1;
  mysqli_query($con,"UPDATE $table_name SET PSTOCK='$all_stock1' WHERE PID='$pid6'");
  $res=mysqli_query($con,"DELETE FROM $table_name2 WHERE out_id='$s1'");

  if($res){
    echo"<script>Swal.fire({
  icon: 'success',
  title: 'Entry Deleted',
  showConfirmButton: false,
  timer: 1600
})</script>

   <script>setTimeout(function() {
    openWindow = window.open('customer_invoice.php', '_self');
}, 1620);</script>";
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
