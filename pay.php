
<?php
session_start();
$_SESSION['name1']=$_POST['name'];
$_SESSION['purpose1']=$_POST['purpose'];
$_SESSION['email1']=$_POST['email'];
$_SESSION['mobile_no1']=$_POST['mobile_no'];
$_SESSION['amount1']=$_POST['amount'];
require('./instamojo.php');
const API_KEY ="test_10f7204326f96da0ac735ae0fbc";
const AUTH_TOKEN = "test_2329b49d69847041ed1d5d8c5c5";


if(isset($_POST['purpose']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['amount']))
{
    $api = new Instamojo\Instamojo(API_KEY, AUTH_TOKEN,'https://test.instamojo.com/api/1.1/');

    try {
        $response = $api->paymentRequestCreate(array(
            "purpose" => $_POST['purpose'],
            "buyer_name" => $_POST['name'],
            "amount" => $_POST['amount'],
            "send_email" => false,
            "email" => $_POST['email'],
            "redirect_url" => "http://localhost/success.php"
            ));
            echo $response;
        header('Location:'. $response['longurl']);
    }
    catch (Exception $e) {
        print('Error: ' . $e->getMessage());
    }
}
?>
