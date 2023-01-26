<?php
session_start();
include('database.php');

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="keywords" content="Shop,shop,Shopeasy365,shopeasy365 web,shopeasy365,shopeasy365 website,shop easy website,Shop Management Software,Shop Management Software website, smart shop software, smart shop software web,Cheap smart shop software website, shop billing software,cheap shop billing software, shop software, the smart shop software website, shop software free , software for shop, cold store software, wine shop software, grocery shop software">
    <meta name="description" content="India’s most preferred  Shop Billing Software can ease your billing process with its advanced and must have features. It is capable enough to manage your Inventory">
    <meta name="Classification" content="Computer software,shopeasy365,shopeasy365 web, Shop Management Software,shop management website.smart shop software web application">
    <meta name="author" content="Ap">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Shopeasy365</title>
        <link rel="shortcut icon" href="img/webi1.png"/>
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
     <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" />
     <!-- <link rel="stylesheet" href="css/index.css"> -->
     <style>
       .swal-wide{
         width:300px !important;
         height:300px !important;

       }
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
       input.largerCheckbox {
          width: 18px;
          height: 17px;
      }
       </style>
  </head>

<?php
if(isset($_REQUEST["reg"])){
  header('Location: http://localhost/register_page.php');
  exit;
}
if(isset($_COOKIE['userid']))
{
  $user=$_COOKIE['userid'];
  $sql="SELECT * FROM `1admin` WHERE id='$user'";
  $result = mysqli_query($con,$sql);
  $ro = mysqli_num_rows($result);
  $row = mysqli_fetch_assoc($result);
  $user_id=$row['id'];
  $_SESSION['special_id']=$row['special_id'];
  $sql2="SELECT * FROM `1admin` WHERE id='$user_id'";
  $result2=mysqli_query($con,$sql2);
  $r2=mysqli_fetch_assoc($result2);
  $verify_stat=$r2['VERIFY_STATUS'];
  $sub_stat=$r2['subscription_status'];
  $sed=$r2['sub_enddate'];
  $date2=date('Y-m-d');
  $remind=date('Y-m-d', strtotime($sed. ' - 2 days'));
  $s_id=$_SESSION['special_id'];
  if($verify_stat<=0){
    die("<script>Swal.fire({
      title: 'Please Verify Email',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Verify Email'
      }).then((result) => {
      if (result.isConfirmed) {
        setTimeout(function() {
        openWindow = window.open('verify_email2.php', '_self');
        }, 300);
      }
    })</script>");
  }
  if($sub_stat<=0){
    die("<script>Swal.fire({
      title: 'Please Puchase Subscription',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Buy Now'
      }).then((result) => {
      if (result.isConfirmed) {
        setTimeout(function() {
        openWindow = window.open('sub_details.php', '_self');
        }, 300);
      }
    })</script>");
  }
  if($date2>$sed){
    $result6 = mysqli_query($con,"UPDATE 1admin SET subscription_status = 0 WHERE special_id = '" . $_SESSION['special_id']. "'");
    die("<script>Swal.fire({
      title: 'Your Subscription End',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Buy Now'
      }).then((result) => {
      if (result.isConfirmed) {
        setTimeout(function() {
        openWindow = window.open('sub_details.php', '_self');
        }, 300);
      }
    })</script>");
  }
  if($verify_stat>0 && $sub_stat>0){
      if($date2>=$remind){
        echo"<script>Swal.fire({
          icon: 'alert',
          title: 'Oops...',
          text: 'Your Subscription End In 2 Days',
        })</script>";
      }
      echo"<script>setTimeout(function() {
              openWindow = window.open('admin_home.php', '_self');
          }, 700);</script>";

    }
}
else {?>

    <body>
      <div class="container">
        <h2 align="center">Login</h2>
      <form action="index.php" method="post">
        <div class="form-group">
          <label for="user">Username</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="user" required="">
      </div>

      <div class="form-group">
        <label for="pass">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword" name="pass" required="">
      </div>
      <div class="form-group">
     <input type="checkbox" class="form-check-input" id="exampleCheck1" name="check" value="1">
     <label for="exampleCheck1" class="mar">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Remember Me</label>
   </div><br>
      <button type="submit" class="btn btn-primary" name="sub">Login</button>
  </form>
  <form action="index.php" method="post">
 <button type="submit" class="btn btn-primary" style="margin-left:180px;margin-top:-55px;" name="reg">Sign Up</button>
 </form>
      </div>

  <?php
  if(isset($_REQUEST["sub"])){
    $pas=$_REQUEST['pass'];
    $user=$_REQUEST['user'];
    $sql="SELECT * FROM `1admin` WHERE user_email='$user'";
    $result = mysqli_query($con,$sql);
    $ro = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    if($row>0){
      if($pas==$row['PASSWORD']){
        if(isset($_REQUEST['check']))setcookie("userid",$row['id'],time()+60*2);
        $user_id=$row['id'];
        $_SESSION['special_id']=$row['special_id'];
        $sql2="SELECT * FROM `1admin` WHERE id='$user_id'";
        $result2=mysqli_query($con,$sql2);
        $r2=mysqli_fetch_assoc($result2);
        $verify_stat=$r2['VERIFY_STATUS'];
        $sub_stat=$r2['subscription_status'];
        $sed=$r2['sub_enddate'];
        $date2=date('Y-m-d');
        $remind=date('Y-m-d', strtotime($sed. ' - 2 days'));
        $s_id=$_SESSION['special_id'];
        if($verify_stat<=0){
          die("<script>Swal.fire({
            title: 'Please Verify Email',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Verify Email'
            }).then((result) => {
            if (result.isConfirmed) {
              setTimeout(function() {
              openWindow = window.open('verify_email2.php', '_self');
              }, 300);
            }
          })</script>");
        }
        if($sub_stat<=0){
          die("<script>Swal.fire({
            title: 'Please Puchase Subscription',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Buy Now'
            }).then((result) => {
            if (result.isConfirmed) {
              setTimeout(function() {
              openWindow = window.open('sub_details.php', '_self');
              }, 300);
            }
          })</script>");
        }
        if($date2>$sed){
          $result6 = mysqli_query($con,"UPDATE 1admin SET subscription_status = 0 WHERE special_id = '" . $_SESSION['special_id']. "'");
          die("<script>Swal.fire({
            title: 'Your Subscription End',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Buy Now'
            }).then((result) => {
            if (result.isConfirmed) {
              setTimeout(function() {
              openWindow = window.open('sub_details.php', '_self');
              }, 300);
            }
          })</script>");
        }
        if($verify_stat>0 && $sub_stat>0){
            if($date2>=$remind){
              echo"<script>Swal.fire({
                icon: 'alert',
                title: 'Oops...',
                text: 'Your Subscription End In 2 Days',
              })</script>";
            }
            $t_product="{$s_id}product";
            $t_out_products_data="{$s_id}out_products_data";
            $t_customer_bill_info="{$s_id}customer_bill_info";
            $t_supplier="{$s_id}supplier";
            $t_supply_entry="{$s_id}supply_entry";
            $t_supply_history="{$s_id}supply_history";
            $t_borrow="{$s_id}borrow";
            $t_employ_data="{$s_id}employ_data";
            $t_attendence="{$s_id}attendence";
            $aniket="show tables like '" . $t_product. "'";
            $rowp=mysqli_query($con,$aniket);
            $rowp1 = mysqli_fetch_assoc($rowp);
            if ($rowp1<=0) {
              $c=mysqli_query($con,"CREATE TABLE $t_product(PID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,PPRODUCT_NAME VARCHAR(300) NOT NULL,PPRODUCT_IMG VARCHAR(300) NOT NULL,PPRODUCT_PRICE VARCHAR(70) NOT NULL ,PPRODUCT_DESCRIPTION VARCHAR(300) NOT NULL,PLAST_STOCK_UPDATE VARCHAR(70) NOT NULL,PSTOCK VARCHAR(70) NOT NULL)" );
              $c2=mysqli_query($con,"INSERT INTO $t_product (`PID`, `PPRODUCT_NAME`, `PPRODUCT_IMG`, `PPRODUCT_PRICE`,`PPRODUCT_DESCRIPTION`,`PLAST_STOCK_UPDATE`,`PSTOCK`) VALUES (NULL, 1, 1, 1, 1,1,1)");
              mkdir("img2/{$t_product}");
              $c3=mysqli_query($con,"CREATE TABLE $t_out_products_data(out_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,out_product_name VARCHAR(30) NOT NULL,product_id VARCHAR(30) NOT NULL,out_product_quantity VARCHAR(70) NOT NULL ,out_product_price VARCHAR(70) NOT NULL,out_product_discount VARCHAR(70) NOT NULL,out_product_discount_value VARCHAR(70) NOT NULL ,out_product_tax VARCHAR(70) NOT NULL ,out_product_tax_value VARCHAR(70) NOT NULL ,out_total VARCHAR(70) NOT NULL ,out_product_date VARCHAR(70) NOT NULL)" );
              $c4=mysqli_query($con,"INSERT INTO $t_out_products_data(`out_id`, `out_product_name`, `product_id`, `out_product_quantity`, `out_product_price`,`out_product_discount`,`out_product_discount_value`,`out_product_tax`,`out_product_tax_value`,`out_total`,`out_product_date`) VALUES (NULL, 0, 0, 0,0,0,0,0,0,0,0)");
              $c5=mysqli_query($con,"CREATE TABLE $t_customer_bill_info(c_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,customer_name VARCHAR(300) NOT NULL,customer_mobile_no VARCHAR(300) NOT NULL,customer_address VARCHAR(70) NOT NULL ,ctotal_discount VARCHAR(70) NOT NULL,ctotal_tax VARCHAR(70) NOT NULL,ctotal VARCHAR(70) NOT NULL ,grand_total VARCHAR(70) NOT NULL ,cdate VARCHAR(70) NOT NULL )" );
              $c6=mysqli_query($con,"INSERT INTO $t_customer_bill_info(`c_id`, `customer_name`, `customer_mobile_no`, `customer_address`,`ctotal_discount`,`ctotal_tax`,`ctotal`,`grand_total`,`cdate`) VALUES (NULL, 0, 0, 0, 0,0,0,0,0)");
              $c7=mysqli_query($con,"CREATE TABLE $t_supplier(su_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,su_name VARCHAR(300) NOT NULL,su_party_name VARCHAR(300) NOT NULL,bank_name VARCHAR(70) NOT NULL ,bank_account_no VARCHAR(70) NOT NULL,bank_ifsc VARCHAR(70) NOT NULL,su_email VARCHAR(70) NOT NULL ,su_phone VARCHAR(70) NOT NULL ,su_address VARCHAR(70) NOT NULL,su_products VARCHAR(70) NOT NULL )" );
              $c8=mysqli_query($con,"INSERT INTO $t_supplier (`su_id`, `su_name`, `su_party_name`, `bank_name`, `bank_account_no`, `bank_ifsc`, `su_email`, `su_phone`, `su_address`, `su_products`) VALUES (NULL, 0, 0,0,0,0,0, 0, 0,0)");
              $c9=mysqli_query($con,"CREATE TABLE $t_supply_entry(supply_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,supplier_name VARCHAR(300) NOT NULL,supplier_phone VARCHAR(300) NOT NULL,party_name VARCHAR(70) NOT NULL ,products_name VARCHAR(70) NOT NULL,product_quantity VARCHAR(70) NOT NULL,total_bill_amount VARCHAR(70) NOT NULL ,paid_amount VARCHAR(70) NOT NULL ,repaid_amount VARCHAR(70) NOT NULL,entry_date VARCHAR(70) NOT NULL ,entry_update_date VARCHAR(70) NOT NULL )" );
              $c10=mysqli_query($con,"INSERT INTO $t_supply_entry (`supply_id`, `supplier_name`, `supplier_phone`, `party_name`, `products_name`, `product_quantity`, `total_bill_amount`, `paid_amount`, `repaid_amount`,`entry_date`,`entry_update_date`) VALUES (NULL, 0, 0, 0, 0, 0, 0,0,0,0,0)");
              $c11=mysqli_query($con,"CREATE TABLE $t_supply_history(h_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,hsupplier_name VARCHAR(300) NOT NULL,hparty_name VARCHAR(300) NOT NULL,hproducts_name VARCHAR(70) NOT NULL ,hproduct_quantity VARCHAR(70) NOT NULL,htotal_bill_amount VARCHAR(70) NOT NULL ,hpaid_bill_amount VARCHAR(70) NOT NULL ,hrepaid_amount VARCHAR(70) NOT NULL,hentry_date VARCHAR(70) NOT NULL ,hentry_update_date VARCHAR(70) NOT NULL )" );
              $c12=mysqli_query($con,"INSERT INTO $t_supply_history (`h_id`, `hsupplier_name`, `hparty_name`, `hproducts_name`, `hproduct_quantity`, `htotal_bill_amount`, `hpaid_bill_amount`, `hrepaid_amount`,`hentry_date`,`hentry_update_date`) VALUES (NULL, 0, 0, 0, 0, 0,0,0,0,0)");
              $c13=mysqli_query($con,"CREATE TABLE $t_borrow(BID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,BCUSTOMER_NAME VARCHAR(300) NOT NULL,BDATE VARCHAR(300) NOT NULL,BPRODUCTS VARCHAR(70) NOT NULL ,BTOTALBILL_AMOUNT VARCHAR(70) NOT NULL,BGAIN_AMOUNT VARCHAR(70) NOT NULL ,BBORROWING_REASON VARCHAR(70) NOT NULL ,bmobile_no VARCHAR(70) NOT NULL,BBORROWING_AMOUNT VARCHAR(70) NOT NULL ,last_update_date VARCHAR(70) NOT NULL )" );
              $c14=mysqli_query($con,"INSERT INTO  $t_borrow (`BID`, `BCUSTOMER_NAME`, `BDATE`, `BPRODUCTS`, `BTOTALBILL_AMOUNT`, `BGAIN_AMOUNT`, `BBORROWING_REASON`,`bmobile_no`, `BBORROWING_AMOUNT`, `last_update_date`) VALUES (NULL, 0, 0, 0, 0, 0, 0,0,0,0)");
              $c15=mysqli_query($con,"CREATE TABLE $t_employ_data(e_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,e_name VARCHAR(300) NOT NULL,e_email VARCHAR(300) NOT NULL,e_phone VARCHAR(70) NOT NULL ,e_type VARCHAR(70) NOT NULL,e_salary VARCHAR(70) NOT NULL ,e_address VARCHAR(70) NOT NULL ,e_img VARCHAR(70) NOT NULL,e_gender VARCHAR(70) NOT NULL ,e_date VARCHAR(70) NOT NULL )" );
              $c16=mysqli_query($con,"INSERT INTO  $t_employ_data(`e_id`, `e_name`, `e_email`, `e_phone`,`e_type`,`e_salary`,`e_address`,`e_img`,`e_gender`,`e_date`) VALUES (NULL, 0, 0, 0, 0,0,0,0,0,0)");
              $c17=mysqli_query($con,"CREATE TABLE $t_attendence(a_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,a_date VARCHAR(300) NOT NULL)" );
              $date_for=date('Y-m-d');
              $c18=mysqli_query($con,"INSERT INTO $t_attendence(a_id,a_date) VALUES(NULL,'$date_for')");
              mkdir("img2/{$t_employ_data}");
              mkdir("img2/{$t_attendence}");
            }
            echo"<script>setTimeout(function() {
                    openWindow = window.open('admin_home.php', '_self');
                }, 700);</script>";

          }
          else {
            echo "<script>Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Invalid Username',
              confirmButtonText: 'Ok'
              }).then((result) => {
                if (result.isConfirmed) {
                  setTimeout(function() {
                  openWindow = window.open('index.php', '_self');
              }, 100);
                }
              })</script>";
          }
      }
      else{?>
        <script>Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Invalid Password',
          footer: '<a href="verify_email.php">Forgot Password</a>',
          confirmButtonText: 'Ok'
          }).then((result) => {
            if (result.isConfirmed) {
              setTimeout(function() {
              openWindow = window.open('index.php', '_self');
          }, 100);
            }
          })</script>";<?php
      }
    }
    else{
      echo "<script>Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Invalid Username',
          confirmButtonText: 'Ok'
          }).then((result) => {
            if (result.isConfirmed) {
              setTimeout(function() {
              openWindow = window.open('index.php', '_self');
          }, 100);
            }
          })</script>";
  //header('Location: http://localhost/index.php');
    }
  }
}

?>
 </body>
 </html>
