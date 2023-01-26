<?php
session_start();
include("database.php");
require('fpdf182/fpdf.php');
$temp_sp6=$_SESSION['special_id'];
$table_name="{$temp_sp6}product";
$table_name2="{$temp_sp6}out_products";
$table_name3="{$temp_sp6}customer_bill_info";
$table_name4="{$temp_sp6}out_products_data";
$date=date('Y-m-d');
$pdf = new FPDF('p','mm','A4');

$pdf->SetFont('Arial','B','17');
$pdf->AddPage();
$result90=mysqli_query($con,"SELECT * FROM 1client_details WHERE cd_id='$temp_sp6'");
$row90=mysqli_fetch_assoc($result90);
$temp_logo=$row90['INVOICE_LOGO'];
$pdf->Image("img2/logos/{$temp_logo}",156,11,50);
$pdf->Line(6,10,123,10);

$t_shop_name=$row90['SHOP_NAME'];
$t_shop_address=$row90['SHOP_ADDRESS'];
$t_shop_pincode=$row90['AREA_PIN'];
$t_shop_mobile=$row90['PHONE_NO'];
$pdf->Text(6,18,$t_shop_name);
$pdf->SetFont('Arial','I','11');
$pdf->Text(6,24,$t_shop_address);
$pdf->Text(6,30,'Pincode:'.$t_shop_pincode);
$pdf->Text(43,30,'Mobile No:'.$t_shop_mobile);

$result6=mysqli_query($con,"SELECT * FROM $table_name3 WHERE c_id=(SELECT MAX(c_id) FROM $table_name3)");

$row6=mysqli_fetch_assoc($result6);

$invoice_no=date('H:i:s');
$customer_name=$row6['customer_name'];
$customer_mobile_no=$row6['customer_mobile_no'];
$ctotal_discount=$row6['ctotal_discount'];
$ctotal_tax=$row6['ctotal_tax'];
$ctotal=$row6['ctotal'];
$grand_total=$row6['grand_total'];

$pdf->Line(6,32,123,32);
$pdf->Text(6,37,'Invoice No:'.$invoice_no);
$pdf->Text(6,43,'Customer Name:'.$customer_name);
$pdf->Text(6,49,'Contact No:'.$customer_mobile_no);
$pdf->Text(6,55,'Date:'.$date);

$pdf->Line(6,70,204,70);
$pdf->SetFont('Arial','','13');
$pdf->Text(6,66,'Sr.No');
$pdf->Text(21,66,'Product Name');
$pdf->Text(73,66,'Quantity');
$pdf->Text(98,66,'Rate');
$pdf->Text(127,66,'Discount');
$pdf->Text(154,66,'Tax');
$pdf->Text(181,66,'Total');

$pdf->Line(6,59,204,59);

$pdf->Line(19,60,18,234);
$pdf->Line(70,60,70,234);
$pdf->Line(95,60,95,234);
$pdf->Line(124,60,124,234);
$pdf->Line(151,60,151,234);
$pdf->Line(178,60,178,234);


$pdf->Line(6,235,204,235);
$pdf->Text(6,242,'Total Discount:');
$pdf->Text(6,249,'Tax:');
$pdf->Text(6,256,'Gross Total:');
$pdf->Text(160,242,'-'.$ctotal_discount.'  INR');
$pdf->Text(160,249,'+'.$ctotal_tax.'  INR');
$pdf->Text(160,256,$ctotal.'  INR');


$pdf->Line(6,259,204,259);

$pdf->Text(6,265,'Grand Total:');
$pdf->Text(160,265,$grand_total.'  INR');
//complete
$result9=mysqli_query($con,"SELECT * FROM $table_name2");
$row9=mysqli_fetch_assoc($result9);
$x=76;
$k=1;
while ($row9=mysqli_fetch_assoc($result9)){
  $oid=$row9['out_id'];
  $oproduct_name=$row9['out_product_name'];
  $oquantity=$row9['out_product_quantity'];
  $orate=$row9['out_product_price'];
  $odiscount=$row9['out_product_discount_value'];
  $otax=$row9['out_product_tax_value'];
  $ototal=$row9['out_total'];
  $pdf->SetFont('Arial','I','11');
  $pdf->Text(11,$x,$k);
  $pdf->Text(21,$x,$oproduct_name);
  $pdf->Text(72,$x,$oquantity);
  $pdf->Text(97,$x,$orate);
  $pdf->Text(126,$x,$odiscount);
  $pdf->Text(153,$x,$otax);
  $pdf->Text(180,$x,$ototal);
  $x+=6;
  $k+=1;
}
$pdf->Output();

?>
