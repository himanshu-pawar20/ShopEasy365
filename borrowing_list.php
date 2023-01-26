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
<br>
<br>
 <h2 style="text-align:center;">CUSTOMER LIST</h2>

 <input class="form-rounded" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
 <br>
 <br>
<div  id="myTable" class="table-responsive">
 <table   class="table table-bordered  table-highligh table-hover">

   <tr >
     <th class="table-dark">Sr No</th>
     <th class="table-dark">Name</th>
     <th class="table-dark">Date</th>
     <th class="table-dark">Products</th>
     <th class="table-dark">Total Bill</th>
     <th class="table-dark">Paid Amount</th>
     <th class="table-dark">Reasone</th>
     <th class="table-dark">Borrowing Amount</th>
      <th class="table-dark">Last Updated</th>
     <th class="table-dark">Edit</th>
     <th class="table-dark">Delete</th>
     <th class="table-dark">Whatsapp</th>
   </tr>
<?php
$temp_sess6=$_SESSION['special_id'];
$table_name10="{$temp_sess6}borrow";

$sql="SELECT * FROM $table_name10";
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
  <form method='post' action='borrowing_list.php'>
  <td><button type='submit' name='edit' value="<?php echo $row['BID'];?>"class="btn btn-primary btn-sm">Edit</button></td>
  <td><button type='submit' name='delete' value="<?php echo $row['BID'];?>" class="btn btn-primary btn-sm">Delete</button></td>
  <td><button type='submit' name='send' value="<?php echo $row['BID'];?>" class="btn btn-primary btn-sm">Send</button></td>
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
if(isset($_POST['send'])){
  $send_id=$_POST['send'];
  /*
 This example works only for those users which are using Cloud Service and do not want to run
 client application on their end.

 You just need to Start the Cloud Service from the Dashboard and Scan QR Code.
 When WhatsApp gets ready, then you can start sending messages.
 */
 $sql="SELECT * FROM $table_name10 where BID=$send_id";
 $result=mysqli_query($con,$sql);
 $row=mysqli_fetch_assoc($result);
 $customer_name=$row['BCUSTOMER_NAME'];
 $due_amount=$row['BBORROWING_AMOUNT'];
 $due_date=$row['last_update_date'];
 $phone_no=$row['bmobile_no'];
 include('WhatsappAPI.php'); // include given API file


 $wp = new WhatsappAPI("2983", "ad989eb7a5ff9b6cc44350db3ff7b834a9867d86"); // create an object of the WhatsappAPI class with your user id and api key

 $number = '+91'.$phone_no.''; // NOTE: Phone Number should be with country code
 $message = 'Hey, '.$customer_name.'! We’re here to remind you that a payment for '.$due_amount.'RS is awaiting payment since '.$due_date.'.'; // You can use WhatsApp Code to compose text messages like *bold*, ~Strikethrough~, ```Monospace```
 $media_url = 'http://www.africau.edu/images/default/sample.pdf'; // Direct global accessible URL of the file, image, docs etc.
 // Max file size should be 10MB otherwise you may get error.
 $group_name = 'My Test Group 😋';
 $caption = 'Its my Caption'; // For media files


 // Send Text Message to number
 $status = $wp->sendText($number, $message);

 // Send PDF, Documents, File, Images etc  Message to number
 // $status = $wp->sendFromURL($number, $media_url, $caption);
 //
 // // Send Text message in Group
 // $status = $wp->sendTextInGroup($group_name, $message);
 //
 // // Send Media message in Group
 // $status = $wp->sendFromURLInGroup($group_name, $media_url, $caption);

 // $status = json_decode($status);
 //
 // if($status->status == 'error'){
 //       echo $status->response;
 // }elseif($status->status == 'success'){
 //       echo 'Success';
 //       echo $status->response;
 // }else{
 //     print_r($status);
 // }


}
if(isset($_POST['delete'])){
  $s1=$_POST['delete'];
  $sql3="DELETE FROM $table_name10 WHERE BID='$s1'";
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
