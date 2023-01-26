<?php
session_start();
include('database.php');
if(isset($_POST['update_p'])){
  $_SESSION['pid2']=$_POST['update_p'];
  header("location: stock_update.php");
}
?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Shopeasy365</title>
      <link rel="shortcut icon" href="img/webi1.png"/>
<link rel="stylesheet" href="css/product.css">

</head>
<body>
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
    <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="admin_home.php">Home</a>
    <a href="add_product.php">Add Product</a>
    <a href="product_update.php">Update Product</a>
    <a href="product_delete.php">Delete Product</a>
    <a href="#">Contact</a>
  </div>
  <script>
  function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
  }

  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }
  </script>
<?php

$sql = "select * from product";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
echo"<div class='main'>";
echo "<h1>Shop Name Products </h1><br><br>";
echo"<ul class='cards'>";
while ($row = mysqli_fetch_array($result)) {
  $pid=$row['PID'];
  $product_name=$row['PPRODUCT_NAME'];
  $image = $row['PPRODUCT_IMG'];
  $image_src = "img/".$image;
  $product_price=$row['PPRODUCT_PRICE'];
  $product_description=$row['PPRODUCT_DESCRIPTION'];
  $stock_update=$row['PLAST_STOCK_UPDATE'];
  $stock=$row['PSTOCK'];?>
    <li class='cards_item'>
      <div class='card'>
        <div class='card_image'><img class='i1'src='<?php echo $image_src;?>'></div>
        <div class='card_content'>
          <h2 class='card_title'><?php echo $pid;?></h2>
          <h2 class='INRR'>INR <?php echo $product_price;?></h2>
          <h2 class='card_title'><?php echo $product_name;?></h2>
          <h2 class='card_title'>In Stock: <?php echo $stock;?></h2>
          <h2 class='card_title'>last Updated: <?php echo $stock_update;?> </h2>
          <p class='card_text'><?php echo $product_description;?></p>
          <form method="post" action="products.php">
          <button class='btn card_btn'  value="<?php echo $pid;?>" name="update_p">UPDATE STOCK</button>
        </form>
      </div>
      </div>
    </li>
    <?php
}
?>
</ul>
</div>


</body>
</html>
