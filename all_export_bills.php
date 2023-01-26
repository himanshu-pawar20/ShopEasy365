<?php
 //export.php
 session_start();
 include("database.php");
 $output = '';
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
      margin-top: 5%;
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
 <?php
   $backup_type=$_SESSION['backup_type'];
   // $date1=$_SESSION['s_date'];
   // $date2=$_SESSION['e_date'];
   $date=date('Y-m-d');
   $filename ="".$date."".$backup_type.".xls"; // File Name
   $id=$_SESSION['special_id'];
   //echo$id;
   $table_name="{$id}{$backup_type}";
   //echo $date1;
   //echo $date2;
   //echo $date3;
   echo "yeah";
   $sql33="SELECT * FROM $table_name";
   $result=mysqli_query($con,$sql33);
  if(mysqli_num_rows($result) > 0)
  {
    $output .= '
     <table class="table" bordered="1">
                      <tr>
                           <th>Sr No</th>
                           <th>Customer Name</th>
                           <th>Customer Mobile</th>
                           <th>Customer Address</th>
                           <th>Total Discount</th>
                           <th>Total Tax</th>
                           <th>Total Amount</th>
                           <th>Grand Total</th>
                            <th>Date</th>
                      </tr>
    ';
    $i=1;
    while($row = mysqli_fetch_array($result))
    {
     $output .= '
      <tr>
                           <td>'.$i.'</td>
                           <td>'.$row["customer_name"].'</td>
                           <td>'.$row["customer_mobile_no"].'</td>
                           <td>'.$row["customer_address"].'</td>
                           <td>'.$row["ctotal_discount"].'</td>
                           <td>'.$row["ctotal_tax"].'</td>
                           <td>'.$row["ctotal"].'</td>
                           <td>'.$row["grand_total"].'</td>
                           <td>'.$row["cdate"].'</td>
                      </tr>
     ';
     $i++;
   }
   $output .= '</table>';
   header('Content-Type: application/xls');
   header("Content-Disposition: attachment; filename=$filename.xls");

   echo $output;
  }
  else {
    header('Content-Type: application/xls');
    header("Content-Disposition: attachment; filename=$filename.xls");
  }

 ?>
 </body>
 </html>
