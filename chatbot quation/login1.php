<?php
include("database.php");
 ?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<link href="css/login.css" type="text/css" rel="stylesheet"/>
</head>
<body>
      <div class="logo">
        <img src="logonew.png">
      </div>
<div id="wrapper">

<div class="form_div">
<p class="form_label">SIGN UP</p>
<form method="post" action="login.php">
 <p><input type="text" class="form_control" placeholder="Enter First Name" id="firstname" name="firstname" ></p>
   <p><input type="text" class="form_control" placeholder="Enter Last Name" id="lastname" name="lastname"></p>
  <p><input type="text" class="form_control" placeholder="Enter parent's Email" id="pemail" name="pemail" ></p>
<p><input type="text" class="form_control"  placeholder="Enter Email" id="email" name="email"></p>
<p><input type="password" class="form_control"  placeholder="**********" id="password" name="password"></p>
<p><input type="submit" name="reg" value="Submit"></p>
</form>
</div>
</div>
</body>
</html>

<?php



if(isset($_REQUEST["reg"])){
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$pemail = $_POST['pemail'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	echo $firstname;
	echo $lastname;
	echo $pemail;
	echo $email;
	echo $password;
}

//DATABASE CONNECTION
#else{
#	$stmt = $conn->prepare("insert into registration(firstname, lastname, pemail, email, password)
	#	values(?,?,?,?,?)");
#	$stmt->bind_param("sssss",$firstname ,$lastname ,$pemail ,$email ,$password);
#	$stmt->excute();
#	echo "Registration succesfully done...";
#	$stmt->close();
#	$conn->close();
#}





?>
