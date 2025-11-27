<?php 
require("mpdf/mpdf.php");
require 'phpmailer/PHPMailerAutoload.php';

require('libs/library_fnc.php');
session_start();

$username=$_SESSION['username'];
if(isset($_SESSION['username'])=='')
{
header('Location:index.php');
	exit();

}


$html = " ";

      $invoice_number=$_GET['invoice_number'];
	  
	  $sql_buyer_invoice_number=("SELECT * from buyer_invoice where number='$invoice_number'");
	  $buyer_invoice=mysql_query($sql_buyer_invoice_number);
	  $row_buyer_invoice = mysql_fetch_array($buyer_invoice);
	  $invoice_date=$row_buyer_invoice['date'];
	  $invoice_company_name=$row_buyer_invoice['buyer_name'];
	  
      $sql_seller_company=("SELECT * from buyer where name='$invoice_company_name'");
	  $seller_company=mysql_query($sql_seller_company);
	  $row_seller_company = mysql_fetch_array($seller_company);

		$company_address=$row_seller_company['address'];
		$company_city=$row_seller_company['city'];
		$company_state=$row_seller_company['state'];
		$company_mobile_number=$row_seller_company['mobile_number'];
		$company_email=$row_seller_company['email'];
		

		$buyer_id=$_POST['buyer_id'];
		$buyer_name_sql="select * from buyer where id='$buyer_id'";
		$buyer_name_query=mysql_query($buyer_name_sql);
		$buyer_name_row=mysql_fetch_array($buyer_name_query);
		$buyer_name=$buyer_name_row['name'];
		$buyer_address=$buyer_name_row['address'];
		$buyer_city=$buyer_name_row['city'];
		$buyer_state=$buyer_name_row['state'];
		$buyer_mobile_number=$buyer_name_row['mobile_number'];
		$buyer_email=$buyer_name_row['email'];

	

			$seller_id = $_POST['seller_id'];
			$seller_name_sql="select * from seller where id='$seller_id'";
			$seller_name_query=mysql_query($seller_name_sql);
			$seller_name_row=mysql_fetch_array($seller_name_query);
			$seller_name=$seller_name_row['name'];
			$seller_address=$seller_name_row['address'];
			$seller_city=$seller_name_row['city'];
			$seller_state=$seller_name_row['state'];
			$seller_mobile_number=$seller_name_row['mobile_number'];
			$seller_email=$seller_name_row['email'];
			
			$sql_currency=mysql_query("SELECT buyer_invoice_products.contract_number,contract.currency,contract.id from buyer_invoice_products inner join contract on buyer_invoice_products.contract_number = contract.id"); 
			$result = mysql_fetch_assoc($sql_currency);
			$currency = $result['currency'];


	
	
	$html = '
<html>
<head>
<link rel="stylesheet" href="style.css" media="all" />
</head>
<body>


<htmlpageheader name="myheader">
<table width="100%" style="border-bottom:1px solid;"><tr>
<td style="color:#0000BB; background-color:white;" width="75%">
	<span style=" font-size: 12pt;">
	<img src="dist/img/logo.png" height="auto" width="200px" style="padding-top:10px;"/>
	</span>
</td>

<td class="pull-right" >
<h5>Address : 266, G.T.B. NAGAR, <br> JALANDHAR,PUNJAB, INDIA.</h5>
<h5>Office: +91-181-2270409, 2440409</h5>
<h5>Mobile : +91-98728 02422, 98763-63902</h5>
<h5>Email : enquiry@shivcomp.com</h5>
<h5>Website : www.shivcomp.com</h5>
</td>

</tr></table>
</htmlpageheader>


<htmlpagefooter name="myfooter">
<div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
Page {PAGENO} of {nb}
</div>
</htmlpagefooter>

<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
<sethtmlpagefooter name="myfooter" value="on" />

<br><br><br><br>';

$html.='<h2 align="center"><u>Provisional Invoice</u></h2>';


	
$html.='<table width="100%" style="font-family: calibri;" cellpadding="10">
<tr>
<td width="33%" style="background-color:white; ">
	<h4 style="margin-bottom:0px;">'.$invoice_company_name.'</h4>
	<h5 style="margin-top:0px; margin-bottom:0px">'.$company_address.'</h5>
	<h5 style="margin-top:0px; margin-bottom:0px">'.$company_city.'</h5>
	<h5 style="margin-top:0px; margin-bottom:0px">'.$company_state.'</h5>
	<h5 style="margin-top:0px; margin-bottom:0px">'.$company_mobile_number.'</h5>
	<h5 style="margin-top:0px; margin-bottom:0px">'.$company_email.'</h5>
</td>
<td width="34%" style="border: 0.0mm solid #888888; background-color:white;">
<span style="font-size:8pt; color: #000000; font-family: calibri;">&nbsp;</span> 

<td width="33%" style="background-color:white;">
	<span style="font-size:10pt; color: #000000; font-family: calibri;"><strong>Invoice Number :</strong> SC-'.$invoice_number.'</span><br>
	<span style="font-size:10pt; color: #000000; font-family: calibri;"><strong>Invoice Date :</strong> '.$invoice_date.'</span>
</td>
</tr></table><br>';

$html.='
<table width="100%" style="font-family: calibri;" cellpadding="10">
<tr>
<th width="10%" style="border: 0.1mm solid #888888; ">
   <span style="font-size:9pt; color: #000000; font-family: calibri;">Sr. No.</span>
</th>
<th width="10%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">Contract Date</span> 
</th>
<th width="10%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">Contract No.</span> 
</th>
<th width="10%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">Qty</span> 
</th>
<th width="10%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">Pass Qty</span> 
</th>
<th width="10%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">Commodity</span> 
</th>
<th width="10%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">Particulars</span> 
</th>
<th width="10%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">Rate ('.$currency.')</span> 
</th>
<th width="10%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">Brokerage Rate</span> 
</th>
<th width="10%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">Amount ('.$currency.')</span> 
</th>
</tr>';

$count = 1;		

				$view_contracts_sql=mysql_query("SELECT * FROM `buyer_invoice_products` where invoice_number='$invoice_number'"); 
						   while($view_contract_row=mysql_fetch_array($view_contracts_sql))
						   {
				
					$html.='<tr>';
				 
						     $contract_number=$view_contract_row['contract_number'];
							 $product_id=$view_contract_row['product_id'];
							  
								$view_contractss_sql=mysql_query("SELECT * FROM `contract` where id='$contract_number'");
                              	while($contract_number_roww=mysql_fetch_array($view_contractss_sql))
								{
									$contract_date=$contract_number_roww['date'];
									$contract_seller_id=$contract_number_roww['seller_name'];
									$contract_buyer_id=$contract_number_roww['buyer_name'];
									$contract_total_amount=$contract_number_roww['total_amount'];
									
									$seller_name_sql=mysql_query("SELECT * FROM `seller` where id='$contract_seller_id'");
									$seller_name_row=mysql_fetch_array($seller_name_sql);
									$seller_name=$seller_name_row['name'];
									
									$buyer_name_sql=mysql_query("SELECT * FROM `buyer` where id='$contract_buyer_id'");
									$buyer_name_row=mysql_fetch_array($buyer_name_sql);
									$buyer_name=$buyer_name_row['name'];
								}
								
				          $html.='<td style="text-align:center; border: 0.1mm solid #888888; ">'.$count.'</td>';
						  $html.='<td style="text-align:center; border: 0.1mm solid #888888; ">'.$contract_date.'</td>';
						  $html.='<td style="text-align:center; border: 0.1mm solid #888888; "> CN-'.$contract_number.'</td>';
						 
						$sql="SELECT * FROM `contract_product` where contract_id='$contract_number' AND product_id='$product_id'";
						//exit;
						 $product_name_sql=mysql_query("SELECT * FROM `contract_product` where contract_id='$contract_number' AND product_id='$product_id'");
								
								$product_name_row=mysql_fetch_array($product_name_sql);
									$product_id=$product_name_row['product_id'];
									
									$product_name_sqll=mysql_query("SELECT * FROM `product` where id='$product_id'");
									
									$product_name_roww=mysql_fetch_array($product_name_sqll);
									
									$product_name=$product_name_roww['name'];
									
									$product_qty=$product_name_row['product_quantity'];
									$product_rate=$product_name_row['product_rate'];
									$product_size=$product_name_row['product_size'];
									
									
									 $product_broker_rate=$view_contract_row['broker_rate'];
									 $total_amount=$view_contract_row['total_amount'];
									
						  
						  $html.='<td style="text-align:center; border: 0.1mm solid #888888; ">'.$product_qty.' '.$product_size.'</td>';
						  $html.='<td style="text-align:center; border: 0.1mm solid #888888; "></td>';
						  $html.='<td style="text-align:center; border: 0.1mm solid #888888; ">'.$product_name.'</td>';
						  $html.='<td style="text-align:center; border: 0.1mm solid #888888; ">'.$seller_name.'</td>';
						  $html.='<td style="text-align:center; border: 0.1mm solid #888888; ">'.$product_rate.'.00</td>';
						  $html.='<td style="text-align:center; border: 0.1mm solid #888888; ">'.$product_broker_rate.'.00</td>';
						  $html.='<td style="text-align:center; border: 0.1mm solid #888888; ">'.$total_amount.'.00</td>';
						  
								   $net_amount+=$total_amount;
								
								   $count++;
						  
						  $html.='</td>	
									</tr>';
			           }
						        

$html.='
</tr>';
     
	 
$html.='
<tr>
<th colspan="8"></th>
<th width="20%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">Gross Amount</span> 
</th>
<td width="20%" style="border: 0.1mm solid #888888;">
<center><span style="font-size:9pt; color: #000000; font-family: calibri;text-align:center;">'.$net_amount.'.00</span> </center>
</td>
</tr>

<tr>
<th colspan="8"></th>
<th width="20%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">Service Tax (15%)</span> 
</th>
<td width="20%" style="border: 0.1mm solid #888888;">
<center><span style="font-size:9pt; color: #000000; font-family: calibri;text-align:center;">'.round($net_amount * (15/100)).'.00</span> </center>
</td>
</tr>';
         $vat_amount = $net_amount * (15/100);
		 $gross_total = $net_amount + $vat_amount;
		 
$html.='
<tr>
<th colspan="8"></th>
<th width="20%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">Net Amount(Round Off)</span> 
</th>
<td width="20%" style="border: 0.1mm solid #888888;">
<center><span style="font-size:9pt; color: #000000; font-family: calibri;text-align:center;">'.$gross_total.'.00</span></center> 
</td>
</tr>
</table>
<br><br>
';

//$gross_amount=round($gross_total);

// $update_seller_invoice_gross_amount="update seller_invoice set gross_amount='$gross_amount' where number='$invoice_number'";
// $updated_seller_invoice=mysql_query($update_seller_invoice_gross_amount);

$filename = $invoice_company_name."(Provisional).pdf";
 
$mpdf=new mPDF('c', 'A4-L');
	
$mpdf->WriteHTML($html);

$mpdf->Output($filename,'I');


?>