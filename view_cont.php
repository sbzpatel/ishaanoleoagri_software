<?php 




                    $contract_id=intval($_GET['contract_id']);
					
					$contract_sql = "select * from contract where id='$contract_id'";
					$contract_query=mysql_query($contract_sql);
					$contract_row=mysql_fetch_array($contract_query);
					
					//$contract_id=$contract_row['id'];
					$contract_date=$contract_row['date'];
					$seller_id=$contract_row['seller_name'];
				    $buyer_id=$contract_row['buyer_name'];
					$product_id=$contract_row['product_id'];
					$deliver_place=$contract_row['deliver_place'];
		            $start_deliver_date=$contract_row['start_deliver_date'];
					$upto_deliver_date=$contract_row['upto_deliver_date'];
					$payment_mode_id=$contract_row['payment_mode'];
					
					
					$seller_sql = "select * from seller where id='$seller_id'";
					$seller_query=mysql_query($seller_sql);
					$seller_row=mysql_fetch_array($seller_query);
					
					$seller_name=$seller_row['name'];
				    $seller_bank_name=$seller_row['bank_name'];
					$seller_account_number=$seller_row['acc_no'];
					$seller_vat_number=$seller_row['vat_number'];
		            $seller_contact_person=$seller_row['contact_person'];
					$seller_email=$seller_row['email'];
					$seller_mobile_number=$seller_row['mobile_number'];
					$seller_city=$seller_row['city'];
					$seller_state=$seller_row['state'];
					$seller_address=$seller_row['address'];
					
					$buyer_sql = "select * from buyer where id='$seller_id'";
					$buyer_query=mysql_query($buyer_sql);
					$buyer_row=mysql_fetch_array($buyer_query);
					
					$buyer_name=$buyer_row['name'];
					$buyer_vat_number=$buyer_row['vat_number'];
		            $buyer_contact_person=$buyer_row['contact_person'];
					$buyer_email=$buyer_row['email'];
					$buyer_mobile_number=$buyer_row['mobile_number'];
					$buyer_city=$buyer_row['city'];
					$buyer_state=$buyer_row['state'];
					$buyer_address=$buyer_row['address'];



require("mpdf/mpdf.php");

require('libs/library_fnc.php');
session_start();

$username=$_SESSION['username'];
if(isset($_SESSION['username'])=='')
{
header('Location:index.php');
	exit();

}





$pdf=new MPDF();
$pdf->Addpage();
$pdf->SetFont('Verdana','B',19);
$pdf->Cell(0,9,'CONTRACT',1,10,"C");

$pdf->Cell(0,4,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(85,35,'Shiv & Company',1,0,"C");

$pdf->Cell(10,0,'',0,0);
$pdf->SetFont('Arial','B',10);

$pdf->Cell(85,35,'Address',1,5,"C");

$pdf->Cell(20,5,'',0,1);

$pdf->SetFont('Caps Reign','B',7);
$pdf->Cell(90,10,'Kind Attention -',1,0,"C");

$pdf->SetFont('Caps Reign','B',7);
$pdf->Cell(90,10,'Date -',1,1,"C");

$pdf->Cell(0,7,'',0,1,"C");

$pdf->SetFont('Caps Reign','B',9);
$pdf->Cell(90,10,'Seller Details',1,0,"C");
$pdf->Cell(90,10,'Buyer Details',1,1,"C");


$pdf->SetFont('Caps Reign','B',7);
$pdf->Cell(90,8,'Seller Name'.$seller_name,1,0,"L");
$pdf->Cell(90,8,'Buyer Name'.$buyer_name,1,1,"L");

$pdf->Cell(90,8,'Seller Address',1,0,"L");
$pdf->Cell(90,8,'Buyer Address',1,1,"L");

$pdf->Cell(90,8,'Seller VAT TIN NO.',1,0,"L");
$pdf->Cell(90,8,'Buyer VAT TIN NO.',1,1,"L");

$pdf->Cell(90,8,'Seller Email-Id',1,0,"L");
$pdf->Cell(90,8,'Buyer Email-Id',1,1,"L");

$pdf->Cell(90,8,'Seller Bank Name',1,1,"L");

$pdf->Cell(90,8,'Seller Account Number',1,1,"L");

$pdf->Cell(0,7,'',0,1,"C");

$pdf->SetFont('Arial','B',8);
$pdf->Cell(60,8,'Place Of Delivery',1,1,"L");
$pdf->Cell(60,8,'Time Of Delivery',1,1,"L");
$pdf->Cell(60,8,'Payment Mode',1,1,"L");


$pdf->Cell(120,20,'',0,0,"C");

$pdf->SetFont('Arial','B',10);
$pdf->Cell(60,20,'Shiv & Company',1,1,"C");

$pdf->output();
?>