<?php
include('database.php');

if(isset($_POST['reset'])){
  $new_pass=$_POST['r_pass'];
  $new_ans=$_POST['r_ans'];
  mysqli_query($con,"INSERT INTO chatbot(`id`, `queries`, `replies`) VALUES (NULL, '$new_pass', '$new_ans')");
  header("location: insert.php");
}

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
 <head>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Shop Name</title>
 <link rel="stylesheet" href="menus.css">
 </head>
 <body>
   <form action="insert.php" method="post">
     <label for="r_pass">Enter New quation here</label>
     <input type="text" name="r_pass" required ><br><br>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="r_ans">Enter  answer here</label>
     <input type="text" name="r_ans" required ><br><br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <button type="submit" name="reset">Insert data</button>
   </form>

</body>
</html>
