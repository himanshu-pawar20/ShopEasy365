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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" />


  <style type="text/css">
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
.form-rounded {
border-radius: 0.6rem;
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
<br>
<br>
  <label for="pi">Serch For Id</label>
  <input class="form-rounded" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search names.." title="Type in a name">
  <br>
  <br>
 <div  id="myTable" class="table-responsive">
  <table   class="table table-bordered  table-highligh table-hover">

   <tr>
     <th class="table-dark">Sr No</th>
     <th class="table-dark">Product Name</th>
     <th class="table-dark">Product Id</th>
     <th class="table-dark">Product Price</th>
     <th class="table-dark">Product Stock</th>
     <th class="table-dark">Product Description</th>
     <th class="table-dark">Last Stock Update</th>

   </tr>
 <?php
 $temp_sp1=$_SESSION['special_id'];
 $table_name="{$temp_sp1}product";
 $sql="SELECT * FROM $table_name";
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
</div>
<script type="text/javascript">
$('#myTable tbody tr').click(function() {
    $(this).addClass('active').siblings().removeClass('active');
});
</script>
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
  $target_dir = "img2/{$table_name}/";
  $target_file = $target_dir . basename($_FILES["pimg"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $extensions_arr = array("jpg","jpeg","png","gif");
  $product_price=$_POST['product_price'];
  $pdesc=$_POST['pdesc'];
  $pid2=$_POST['pid2'];
  $sql33="SELECT PID FROM $table_name WHERE PID='$pid2'";
  $result33=mysqli_query($con,$sql33);
  $s=mysqli_num_rows($result33);
  if(!$s>0){
    die("<script>Swal.fire({
  icon: 'warning',
  title: 'Oops...',
  text: 'Please Enter Right Product Id'
})</script>");
  }
  $result_i=mysqli_query($con,"SELECT * FROM $table_name WHERE PPRODUCT_IMG='$name'");
  $row_num=mysqli_num_rows($result_i);
  if($row_num>0){
    die("<script>Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Please Rename Image'
})</script>");
  }

  //Valid file extensions

  if(in_array($imageFileType,$extensions_arr)&&($_FILES["pimg"]["size"]<150000)){
    $res=mysqli_query($con,"UPDATE $table_name SET PPRODUCT_NAME='".$pname."', PPRODUCT_IMG='".$name."', PPRODUCT_PRICE='".$product_price."',PPRODUCT_DESCRIPTION='".$pdesc."' WHERE PID = '" .$pid2. "'");
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
    else{
     setTimeout(function() {
     openWindow = window.open('product_update.php', '_self');
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
  text: 'Image Size Is Big'
})</script>";
  }
}
 ?>
