<?php
session_start();
include('database.php');
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
<link rel="stylesheet" href="css/table.css">
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
     <h2>Update Products</h2>
   <form action="product_update.php" method="post" enctype="multipart/form-data">
     <div class="form-group">
     <label for="pname">Product Name</label>
     <input type="text" class="form-control" id="exampleInputfirstname" name="pname" required>
   </div>
   <div class="form-group">
   <label for="pid2">Product Id</label>
   <input type="number" class="form-control" id="exampleInputEmail1"  name="pid2" required>
   </div>
   <div class="form-group">
     <label for="pimg">Product Image</label>
     <input type="file" class="form-control-file"  id="input1"  name="pimg" required >
   </div>
   <div class="form-group">
     <label for="product_price">Product Price</label>
     <input type="number" class="form-control" id="exampleInputphoneno" name="product_price" required>
   </div>
   <div class="form-group">
     <label for="pdesc">Product Description</label>
     <input type="text" class="form-control" id="exampleInputEmail1"  name="pdesc" required>
   </div>

   <button type="submit" class="btn btn-primary" name="submit_p">Update Product</button>
   </form>
   </div>

  <label for="pi" style="margin-left:1205px">Serch For Id</label>
 <input type="text" name="pi" id="myInput" onkeyup="myFunction()" placeholder="Search names.." title="Type in a name">

 <table id="myTable">
   <tr class="header">
     <th >Sr No</th>
     <th>Product Name</th>
     <th>Product Id</th>
     <th>Product Price</th>
     <th>Product Stock</th>
     <th>Product Description</th>
     <th >Last Stock Update</th>

   </tr>
 <?php

 $sql="SELECT * FROM `product`";
 $result=mysqli_query($con,$sql);
 $row=mysqli_fetch_assoc($result);
 $x1=1;
 while ($row=mysqli_fetch_assoc($result)) {?>
  <tr>
  <td><?php echo $x1;?></td>

  <td><?php echo $row['PPRODUCT_NAME'];?></td>
  <td><?php echo $row['PID'];?></td>
  <td><?php echo $row['PPRODUCT_PRICE'];?></td>
  <td><?php echo $row['PSTOCK'];?></td>
  <td><?php echo $row['PPRODUCT_DESCRIPTION'];?></td>
  <td><?php echo $row['PLAST_STOCK_UPDATE'];?></td>
  </tr>
 <?php
  $x1+=1;
 }
 ?>
 </table>
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
if(isset($_POST['submit_p'])){
  $pname=$_POST['pname'];
  $pid2=$_POST['pid2'];
  $name = $_FILES["pimg"]["name"];
  $target_dir = "img/";
  $target_file = $target_dir . basename($_FILES["pimg"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $extensions_arr = array("jpg","jpeg","png","gif");
  $product_price=$_POST['product_price'];
  $pdesc=$_POST['pdesc'];
  $pid2=$_POST['pid2'];


  //Valid file extensions
  //
  if(in_array($imageFileType,$extensions_arr)&&($_FILES["pimg"]["size"]<150000)){
    $res=mysqli_query($con,"UPDATE product SET PPRODUCT_NAME='".$pname."', PPRODUCT_IMG='".$name."', PPRODUCT_PRICE='".$product_price."',PPRODUCT_DESCRIPTION='".$pdesc."' WHERE PID = '" .$pid2. "'");
    move_uploaded_file($_FILES['pimg']['tmp_name'],$target_dir.$name);
    if($res){
      echo"  <script>Swal.fire({
      title: 'Product Updated',
      icon:'success',
      showDenyButton: true,
      showCancelButton: false,
      confirmButtonText: `Update More`,
      denyButtonText: `No Thanks`,
    }).then((result) => {
    if (result.isConfirmed) {
      setTimeout(function() {
      openWindow = window.open('product_update.php', '_self');
    }, 300);
    } else if (result.isDenied) {
      setTimeout(function() {
      openWindow = window.open('products.php', '_self');
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
  else{
    echo"<script>Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Image Size Is Big Or Rename Image'
})</script>";
  }
}
 ?>
