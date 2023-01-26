<?php
session_start();
$s_temp=$_SESSION['special_id'];
//mkdir("img/{$s_temp}test");
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
    <a href="monthly_backup.php">Backup Monthly</a>
    <a href="datewise_backup.php">Backup Datewise</a>
    <a href="all_backup.php">Backup All Data</a>
  </div>
  <script>
  function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
  }

  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }
  </script>
</body>
</html>
