<?php
session_start();
$_SESSION['special_id'];
$subs=$_SESSION['sub_amount'];
 ?>
 <!DOCTYPE html>
 <html>
 <head>
   <meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 		<title>Shopeasy365</title>
 		<link rel="shortcut icon" href="img/webi1.png"/>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" >
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
 	  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
 		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
 	  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>
 	<style type="text/css">
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
 	</style>
 </head>
  <body>
    <div class="container">
      <h2>Payment Inquairy Form</h2>
    <form action="pay.php" method="post">
      <div class="form-group">
      <label for="full_name">Full Name</label>
      <input type="text" class="form-control" id="exampleInputfirstname" name="name" required>
    </div>
    <div class="form-group">
      <input type="hidden" class="form-control" value="Shop easy subscription" id="exampleInputlastname" name="purpose">
    </div>

    <div class="form-group">
      <label for="email">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
    </div>

    <div class="form-group">
      <label for="mobile_no">Phone Number</label>
      <input type="text" class="form-control" id="exampleInputphoneno" name="mobile_no" required>
    </div>
    <div class="form-group">
    <input type="hidden" class="form-control" id="exampleInputEmail1"  value="<?php echo $subs;?>"  name="amount">
    </div>
    <button type="submit" class="btn btn-primary" name="rsub">Pay Now</button>
    </form>
    </div>

  </body>
</html>
