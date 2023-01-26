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
   <link rel="stylesheet" href="css/menus.css">
    <style type="text/css">

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
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
    <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="supplier_transaction.php">Home</a>
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


  <h2 style="text-align:center;">ALL SUPPLIER TRANSACTION</h2>

  <br>
  <br>
  <br>
    <input class="form-rounded" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
    <br>
   <div  id="myTable" class="table-responsive">
    <table   class="table table-bordered  table-highligh table-hover">

    <tr>
      <th class="table-dark">Sr No</th>
      <th class="table-dark">Supplier Name</th>
      <th class="table-dark">Party Name</th>
      <th class="table-dark">Product Name</th>
      <th class="table-dark">Product Quantity</th>
      <th class="table-dark">Total Amount</th>
      <th class="table-dark">Paid Amount</th>

      <th class="table-dark">Repaid Amount</th>
      <th class="table-dark" >Entry Date</th>
      <th class="table-dark" >Entry Update Date</th>
    </tr>
 <?php
 $temp_sess5=$_SESSION['special_id'];
 $table_name8="{$temp_sess5}supply_entry";
 $table_name9="{$temp_sess5}supply_history";

 $sql="SELECT * FROM $table_name9";
 $result=mysqli_query($con,$sql);
 $row=mysqli_fetch_assoc($result);
 $x=1;
 while ($row=mysqli_fetch_assoc($result)) {?>
   <tr>
   <td><?php echo $x;?></td>
   <td><?php echo $row['hsupplier_name'];?></td>
   <td><?php echo $row['hparty_name'];?></td>
   <td><?php echo $row['hproducts_name'];?></td>
   <td><?php echo $row['hproduct_quantity'];?></td>
   <td><?php echo $row['htotal_bill_amount'];?></td>
   <td><?php echo $row['hpaid_bill_amount'];?></td>
   <td><?php echo $row['hrepaid_amount'];?></td>
   <td><?php echo $row['hentry_date'];?></td>
    <td><?php echo $row['hentry_update_date'];?></td>
   </tr>
 <?php
    $x+=1;
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
