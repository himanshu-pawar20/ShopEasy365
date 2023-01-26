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
 $temp_sess8=$_SESSION['special_id'];
 $table_name11="{$temp_sess8}employ_data";
 $table_name12="{$temp_sess8}attendence";
   $date3=date('Y-m-d');
   $filename ="".$date3."allattendanceReport.xls"; // File Name
   //echo $date1;
   //echo $date2;
   //echo $date3;
    $output .= '
     <table class="table" bordered="1">
     <tr>
     <th class="table-dark">Sr No</th>
     <th class="table-dark">Date</th>';
     $sql1="SELECT * FROM $table_name11";
     $result1=mysqli_query($con,$sql1);
     $row1=mysqli_fetch_assoc($result1);
     while ($row1=mysqli_fetch_assoc($result1)) {
        $output .= '<th class="table-dark">'.$row1['e_name'].'</th>';
     }


      $output .= '</tr>';

     $sql="SELECT * FROM $table_name12";
     $result=mysqli_query($con,$sql);
     $row=mysqli_fetch_assoc($result);
     $x1=1;
     while ($row=mysqli_fetch_assoc($result)) {
       $temp_id=$row['a_id'];
        $output .= '<tr>
       <td>'.$x1.'</td>
       <td>'.$row['a_date'].'</td>';
       $sql2="SELECT * FROM $table_name11";
       $result2=mysqli_query($con,$sql2);
       $row2=mysqli_fetch_assoc($result2);
       while ($row2=mysqli_fetch_assoc($result2)) {
         $temp_name=$row2['e_name'];
         $Ename = str_replace(' ', '_', $temp_name);
         $sql3="SELECT $Ename FROM `$table_name12` WHERE a_id='$temp_id'";
         $result3=mysqli_query($con,$sql3);
         $row3=mysqli_fetch_assoc($result3);
         if($row3[$Ename]=="")$output .= '<td >NA</td>';
         else $output .= '<td >'.$row3[$Ename].'</td>';
       }
         $output .= '</tr>';
       $x1+=1;
     }
   $output .= '</table>';
   header('Content-Type: application/xls');
   header("Content-Disposition: attachment; filename=$filename.xls");
   echo $output;

 ?>
 </body>
 </html>
