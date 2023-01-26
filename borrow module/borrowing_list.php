<?php
session_start();
include('database.php');

 if(isset($_POST['edit'])){
   $edit_id=$_POST['edit'];
   $_SESSION['edit1']=$edit_id;
   header("location: borrow_edit.php");
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
<link rel="stylesheet" href="css/table.css">
<link rel="stylesheet" href="css/menus.css">
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
     <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
     <div id="mySidenav" class="sidenav">
     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
     <a href="admin_home.php">Home</a>
     <a href="add_borrow.php">Add Borrow</a>
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

 <h2 style="text-align:center;">My Customers</h2>

 <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

 <table id="myTable">
   <tr class="header">
     <th >Sr No</th>
     <th>Name</th>
     <th>Date</th>
     <th>Products</th>
     <th>Total Bill</th>
     <th>Paid Amount</th>
     <th>Reasone</th>
     <th>Borrowing Amount</th>
      <th>Last Updated</th>
     <th>Edit</th>
     <th>Delete</th>
   </tr>
<?php

$sql="SELECT * FROM `borrow`";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$x=1;
while ($row=mysqli_fetch_assoc($result)) {?>
  <tr>
  <td><?php echo $x;?></td>
  <td><?php echo $row['BCUSTOMER_NAME'];?></td>
  <td><?php echo $row['BDATE'];?></td>
  <td><?php echo $row['BPRODUCTS'];?></td>
  <td><?php echo $row['BTOTALBILL_AMOUNT'];?></td>
  <td><?php echo $row['BGAIN_AMOUNT'];?></td>
  <td><?php echo $row['BBORROWING_REASON'];?></td>
  <td><?php echo $row['BBORROWING_AMOUNT'];?></td>
  <td><?php echo $row['last_update_date'];?></td>
  <form method='post' action='Borrowing_list.php'>
  <td><button type='submit' name='edit' value="<?php echo $row['BID'];?>" style="background:#0275d8;color:white">Edit</button></td>
  <td><button type='submit' name='delete' value="<?php echo $row['BID'];?>" style="background:#0275d8;color:white">Delete</button></td>
  </form>
  </tr>
<?php
   $x+=1;
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
if(isset($_POST['delete'])){
  $s1=$_POST['delete'];
  $sql3="DELETE FROM `borrow` WHERE BID='$s1'";
  if(mysqli_query($con,$sql3)){
    echo"<script>Swal.fire({
  icon: 'success',
  title: 'Entry Deleted',
  showConfirmButton: false,
  timer: 1900
})</script>

   <script>setTimeout(function() {
    openWindow = window.open('borrowing_list.php', '_self');
}, 2000);</script>";
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
