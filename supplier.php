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
.form-rounded {
border-radius: 0.6rem;
}
</style>
</head>
<body>
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
    <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="admin_home.php">Home</a>
    <a href="add_supplier.php">Add Supplier</a>
    <a href="supplier_transaction.php">Supplier Transaction</a>
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

<br>
<br>
<br>
<br>
<br>
<h1 style="text-align:center;">SUPPLIER LIST</h1>
<br>
<br>

  <label for="pi">Serch</label>
  <input class="form-rounded" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
  <br>

 <div  id="myTable" class="table-responsive">
  <table   class="table table-bordered  table-highligh table-hover">
    <tr>
      <th class="table-dark">Sr No</th>
      <th class="table-dark">Supplier Name</th>
      <th class="table-dark">Party Name</th>
      <th class="table-dark">Bank Name</th>
      <th class="table-dark">Bank Account No</th>
      <th class="table-dark">Bank IFSC</th>
      <th class="table-dark">Supplier Email</th>
      <th class="table-dark">Supplier Phone No</th>
      <th class="table-dark">Supplier Address</th>
      <th class="table-dark" >Products</th>
      <th class="table-dark">Delete</th>
    </tr>
 <?php
$temp_sess=$_SESSION['special_id'];
$table_name7="{$temp_sess}supplier";
 $sql="SELECT * FROM $table_name7";
 $result=mysqli_query($con,$sql);
 $row=mysqli_fetch_assoc($result);
 $x=1;
 while ($row=mysqli_fetch_assoc($result)) {?>
   <tr>
   <td><?php echo $x;?></td>
   <td><?php echo $row['su_name'];?></td>
   <td><?php echo $row['su_party_name'];?></td>
   <td><?php echo $row['bank_name'];?></td>
   <td><?php echo $row['bank_account_no'];?></td>
   <td><?php echo $row['bank_ifsc'];?></td>
   <td><?php echo $row['su_email'];?></td>
   <td><?php echo $row['su_phone'];?></td>
   <td><?php echo $row['su_address'];?></td>
   <td><?php echo $row['su_products'];?></td>

   <form method='post' action='supplier.php'>
   <td><button type='submit' name='delete' value="<?php echo $row['su_id'];?>" class="btn btn-primary btn-sm">Delete</button></td>
   </form>
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


<?php
if(isset($_POST['delete'])){
  $s1=$_POST['delete'];
  $sql3="DELETE FROM $table_name7 WHERE su_id='$s1'";
  if(mysqli_query($con,$sql3)){
    echo "<script>Swal.fire({
  icon: 'success',
  title: 'Entry Deleted',
  showConfirmButton: false,
  timer: 1900
})</script>

   <script>setTimeout(function() {
    openWindow = window.open('supplier.php', '_self');
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
if(isset($_POST['print'])){
  $s1=$_POST['print'];
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
  openWindow = window.open('supplier_print.php','_blank');
}, 2100);</script>";
  echo"<script>setTimeout(function() {
openWindow = window.open('supplier.php','_self');
}, 2200);</script>";

}
 ?>
