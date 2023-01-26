<?php
session_start();
$_SESSION['special_id'];
$Date = date('Y-m-d');
if(isset($_REQUEST['subs1'])){
  $_SESSION['sub_amount']=$_POST['subs1'];
  $_SESSION['date']=date('Y-m-d', strtotime($Date. ' + 30 days'));
  echo "<script>window.open('payment.php','_self')</script>";
}
if(isset($_REQUEST['subs2'])){
  $_SESSION['sub_amount']=$_POST['subs2'];
  $_SESSION['date']=date('Y-m-d', strtotime($Date. ' + 180 days'));
  echo "<script>window.open('payment.php','_self')</script>";
}
if(isset($_REQUEST['subs3'])){
  $_SESSION['sub_amount']=$_POST['subs3'];
  $_SESSION['date']=date('Y-m-d', strtotime($Date. ' + 365 days'));
  echo "<script>window.open('payment.php','_self')</script>";
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shopeasy365</title>
    <link rel="shortcut icon" href="img/webi1.png"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" >
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="css/pricing.css">
<style>
body{
	background: #E0EAFC;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #CFDEF3, #E0EAFC);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #CFDEF3, #E0EAFC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}
</style>

</head>
<body>

<h1 style="text-align:center">Pricing Table</h1>
<section>
  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-sm-4">
          <div class="card text-center">
            <div class="title">
              <i class="fa fa-paper-plane" aria-hidden="true"></i>
              <h2>Basic</h2>
            </div>
            <div class="price">
              <h4><sup>INR</sup>40/M</h4>
            </div>
            <div class="option">
              <ul>
              <li> <i class="fa fa-check" aria-hidden="true"></i> 2GB Space </li>
              <li> <i class="fa fa-check" aria-hidden="true"></i>Faster Browsing</li>
              <li> <i class="fa fa-check" aria-hidden="true"></i>24x7 Support</li>
              <li> <i class="fa fa-times" aria-hidden="true"></i> Daily Backup</li>
              </ul>
            </div>
            <form action="sub_details.php" method="post">
            <button type="submit"  name="subs1" value="25">Buy Now</button>
          </form>
          </div>
        </div>
        <!-- END Col one -->
        <div class="col-sm-4">
          <div class="card text-center">
            <div class="title">
              <i class="fa fa-plane" aria-hidden="true"></i>
              <h2>Standard</h2>
            </div>
            <div class="price">
              <h4><sup>INR</sup>200/6M</h4>
            </div>
            <div class="option">
              <ul>
              <li> <i class="fa fa-check" aria-hidden="true"></i> 10 GB Space </li>
              <li> <i class="fa fa-check" aria-hidden="true"></i>Faster Browsing</li>
              <li> <i class="fa fa-check" aria-hidden="true"></i>24x7 Support</li>
              <li> <i class="fa fa-times" aria-hidden="true"></i> Daily Backup </li>
              </ul>
            </div>
            <form action="sub_details.php" method="post">
            <button  type="submit"  name="subs2" value="120">Buy Now</button>
            </form>
          </div>
        </div>
        <!-- END Col two -->
        <div class="col-sm-4">
          <div class="card text-center">
            <div class="title">
              <i class="fa fa-rocket" aria-hidden="true"></i>
              <h2>Premium</h2>
            </div>
            <div class="price">
              <h4><sup>INR</sup>365/Y</h4>
            </div>
            <div class="option">
              <ul>
              <li> <i class="fa fa-check" aria-hidden="true"></i> Unlimited GB Space </li>
              <li> <i class="fa fa-check" aria-hidden="true"></i>Faster Browsing </li>
              <li> <i class="fa fa-check" aria-hidden="true"></i>24x7 Support </li>
              <li> <i class="fa fa-check" aria-hidden="true"></i> Daily Backup </li>
              </ul>
            </div>
            <form action="sub_details.php" method="post">
            <button type="submit"  name="subs3" value="200">Buy Now</button>
            </form>
          </div>
        </div>
        <!-- END Col three -->
      </div>
    </div>
  </div>
</section>
</body>
</html>
