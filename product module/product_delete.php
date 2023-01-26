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
<link rel="stylesheet" href="css/table.css">
 <style type="text/css">
   .container{
     margin-top: 5%;
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
    <h2>Delete Products</h2>
  <form action="product_delete.php" method="post">
    <div class="form-group">
    <label for="dname">Product Name</label>
    <input type="text" class="form-control" id="exampleInputfirstname" name="dname" required>
  </div>
  <div class="form-group">
  <label for="d_id">Product Id</label>
  <input type="number" class="form-control" id="exampleInputEmail1"  name="d_id" required>
  </div>
  <button type="submit" class="btn btn-primary" name="submit_d">Delete Product</button>
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
if(isset($_POST['submit_d'])){
  $s1=$_POST['d_id'];
  $sql3=mysqli_query($con,"DELETE FROM `product` WHERE PID='$s1'");
  if($sql3){
    echo" <script>Swal.fire({
    title: 'Product Deleted',
    icon:'success',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText: `Delete More`,
    denyButtonText: `No Thanks`,
  }).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    setTimeout(function() {
    openWindow = window.open('product_delete.php', '_self');
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
 ?>
