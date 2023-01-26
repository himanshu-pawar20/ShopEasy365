<?php
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
 	<style type="text/css">
 		.container{
 			margin-top: 3%;
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
     <h2>Add Products</h2>
   <form action="add_product.php" method="post" enctype="multipart/form-data">
     <div class="form-group">
     <label for="pname">Product Name</label>
     <input type="text" class="form-control" id="exampleInputfirstname" name="pname" required>
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
   <div class="form-group">
   <label for="pquantity">Product Quantity</label>
   <input type="number" class="form-control" id="exampleInputEmail1"  name="pquantity" required>
   </div>
   <div class="form-group">
     <label for="pdate">Date</label>
     <input type="date" class="form-control" id="exampleInputPassword" name="pdate" required>
   </div>

   <button type="submit" class="btn btn-primary" name="padd">Add Product</button>
   </form>
   </div>
 </body>
 </html>
<?php
if(isset($_POST['padd'])){
  $pname=$_POST['pname'];

  $name = $_FILES["pimg"]["name"];
  $target_dir = "img/";
  $target_file = $target_dir . basename($_FILES["pimg"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $extensions_arr = array("jpg","jpeg","png","gif");
  $product_price=$_POST['product_price'];
  $pdesc=$_POST['pdesc'];
  $pdate=$_POST['pdate'];
  $pquantity=$_POST['pquantity'];


  //Valid file extensions
  //
  if(in_array($imageFileType,$extensions_arr)&&($_FILES["pimg"]["size"]<150000)){
    $res=mysqli_query($con,"INSERT INTO product (`PID`, `PPRODUCT_NAME`, `PPRODUCT_IMG`, `PPRODUCT_PRICE`,`PPRODUCT_DESCRIPTION`,`PLAST_STOCK_UPDATE`,`PSTOCK`) VALUES (NULL, '$pname', '$name', '$product_price', '$pdesc','$pdate','$pquantity')");
    move_uploaded_file($_FILES['pimg']['tmp_name'],$target_dir.$name);
    if($res){
      echo"  <script>Swal.fire({
      title: 'Product  Saved',
      icon:'success',
      showDenyButton: true,
      showCancelButton: false,
      confirmButtonText: `Add More`,
      denyButtonText: `No Thanks`,
    }).then((result) => {
    if (result.isConfirmed) {
      setTimeout(function() {
      openWindow = window.open('add_product.php', '_self');
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
