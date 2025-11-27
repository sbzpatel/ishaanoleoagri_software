<?php 
require("mpdf/mpdf.php");

require('libs/library_fnc.php');
session_start();

$username=$_SESSION['username'];
if(isset($_SESSION['username'])=='')
{
header('Location:index.php');
	exit();

}



 $contract_id=intval($_GET['contract_id']);
					
					$contract_sql = "select * from contract where id='$contract_id'";
					$contract_query=mysql_query($contract_sql);
					$contract_row=mysql_fetch_array($contract_query);
					
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
					
					$buyer_sql = "select * from buyer where id='$buyer_id'";
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


                    $payment_sql = "select * from payment_mode where id='$payment_mode_id'";
					$payment_query=mysql_query($payment_sql);
					$payment_row=mysql_fetch_array($payment_query);
					
                    $payment_mode=$payment_row['type'];



$html = '
<html>
<head>
<style>
body {font-family:calibri;
	font-size: 9pt;
}
p {	margin: 0pt; }
table.items {
	border: 0.1mm solid #999;
}
td { vertical-align: top; }
.items td {
	border-left: 0.1mm solid #ccc;
	border-right: 0.1mm solid #ccc;
	border-bottom: 0.1mm solid #ccc;
}
table thead td { background-color: #EEEEEE;
	text-align: center;
	border: 0.1mm solid #999;
	
}
.items td.blanktotal {
	background-color: #EEEEEE;
	border: 0.1mm solid #999;
	background-color: #FFFFFF;
	border: 0mm none #000000;
	border-top: 0.1mm solid #999;
	border-right: 0.1mm solid #999;
}
.items td.totals {
	text-align: right;
	border: 0.1mm solid #999;
}
.items td.cost {
	text-align: "." center;
}
</style>
</head>
<body>


<htmlpageheader name="myheader">
<table width="100%" style="border-bottom:1px solid;"><tr>
<td style="color:#0000BB;" width="65%">
	<span style=" font-size: 12pt;">
	<a href="http://">
	<img src="dist/img/logo.png" height="auto" width="200px" style="padding-top:10px;"/>
	</span></a>	
</td>

<td class="pull-right">
<h5><br>Address : 266, G.T.B. NAGAR, <br> JALANDHAR,PUNJAB, INDIA.</h5>
<h5>Office: +91-181-2270409 , +91-181-2440409, <br>+91-181-2440249 , +91-181-2440349</h5>
<h5>Mobile : +91-98728 02422</h5>
<h5> Email : info@shivcomp.com</h5>
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

$html.='<h2 align="center"><u>Invoice</u></h2>';

$html.='<table width="100%" style="font-family: calibri;" cellpadding="10">
<tr>
<td width="33%" style="border: 0.1mm solid #888888; ">
   <span style="font-size:8pt; color: #000000; font-family: calibri;">Invoice Number :</span> '.$contract_id.' 
</td>
<td width="34%" style="border: 0.1mm solid #888888;">
<span style="font-size:8pt; color: #000000; font-family: calibri;">Kind Attention :</span> '.$buyer_contact_person.'
</td>
<td width="33%" style="border: 0.1mm solid #888888;">
<span style="font-size:8pt; color: #000000; font-family: calibri;">Invoice Date :</span> '.$contract_date.'
</td></tr></table><br>';

$html.='
<table width="100%" style="font-family: calibri;" cellpadding="10">
<tr>
<th width="50%" style="border: 0.1mm solid #888888; ">
   <span style="font-size:9pt; color: #000000; font-family: calibri;">Seller&rsquo;s Detail</span>
</th>
<th width="50%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">Buyer&rsquo;s Detail</span> 
</th></tr>

<tr>
<td width="50%" style="border: 0.1mm solid #888888; ">
   <span style="font-size:9pt; color: #000000; font-family: calibri;">Name: </span> '.$seller_name.' 
</td>
<td width="50%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">Name: </span> '.$buyer_name.'
</td></tr>

<tr>
<td width="50%" style="border: 0.1mm solid #888888; ">
   <span style="font-size:9pt; color: #000000; font-family: calibri;">Address: </span> '.$seller_address.' 
</td>
<td width="50%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">Address: </span> '.$buyer_address.'
</td></tr>

<tr>
<td width="50%" style="border: 0.1mm solid #888888; ">
   <span style="font-size:9pt; color: #000000; font-family: calibri;">TIN NO.: </span> '.$seller_vat_number.' 
</td>
<td width="50%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">TIN NO.: </span> '.$buyer_vat_number.'
</td></tr>

<tr>
<td width="50%" style="border: 0.1mm solid #888888; ">
   <span style="font-size:9pt; color: #000000; font-family: calibri;">Email Id: </span> '.$seller_email.' 
</td>
<td width="50%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">Email Id: </span> '.$buyer_email.'
</td></tr>

<tr>
<td width="50%" style="border: 0.1mm solid #888888; ">
   <span style="font-size:9pt; color: #000000; font-family: calibri;">Bank Name: </span> '.$seller_bank_name.' 
</td>
</tr>

<tr>
<td width="50%" style="border: 0.1mm solid #888888; ">
   <span style="font-size:9pt; color: #000000; font-family: calibri;">Account Number: </span> '.$seller_account_number.' 
</td>
</tr>
</table><br><br>
';

$html.='
<h3>Commodity Detail&rsquo;s</h3>
<table width="100%" style="font-family: calibri;" cellpadding="10">
<tr>
<th width="10%" style="border: 0.1mm solid #888888; ">
   <span style="font-size:9pt; color: #000000; font-family: calibri;">Sr. No.</span>
</th>
<th width="20%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">Product Name</span>
</th>
<th width="20%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">Size</span>
</th>
<th width="20%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">Rate</span>
</th>
<th width="10%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">Quantity</span>
</th>
<th width="20%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">Total Amount</span>
</th>
</tr>
';

$count = 1;
$net_amount = 0;
		$product_sql="select * from contract_product where contract_id='$contract_id'";
	    $product_query=mysql_query($product_sql);
while($row_product_query=mysql_fetch_array($product_query))
{
	$total_amount = 0;
	$product_id=$row_product_query['product_id'];
	
											   
	$sql_product_name="select name from product where id='$product_id'";
    $query_product_name=mysql_query($sql_product_name);
	$row_product_name=mysql_fetch_array($query_product_name);
	$product_name=$row_product_name['name']; 
											     
	$product_rate=$row_product_query['product_rate'];
    $product_size=$row_product_query['product_size'];
    $product_quantity=$row_product_query['product_quantity'];
	
	
$html.='
<tr>
<td width="10%" style="border: 0.1mm solid #888888; ">
   <span style="font-size:9pt; color: #000000; font-family: calibri;">'.$count.'</span>  
</td>
<td width="20%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">'.$product_name.'</span> 
</td>
<td width="10%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">'.$product_size.'</span>
</td>
<td width="10%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">'.$product_rate.'</span> 
</td>
<td width="10%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">'.$product_quantity.'</span> 
</td>';

$total_amount = $product_quantity * $product_rate;
$net_amount += $total_amount;
$vat_amount = $net_amount * 16/100 ;
$gross_amount = $net_amount + $vat_amount;

$html.='<td width="20%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">'.$total_amount.'</span> 
</td>
</tr>';
$count++;
}

$html.='
<tr>
<th colspan="4"></th>
<th width="20%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">Net Amount</span> 
</th>
<td width="20%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">'.$net_amount.'</span> 
</td>
</tr>

<tr>
<th colspan="4"></th>
<th width="20%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">Vat Amount (16%)</span> 
</th>
<td width="20%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">'.$vat_amount.'</span> 
</td>
</tr>

<tr>
<th colspan="4"></th>
<th width="20%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">Gross Amount</span> 
</th>
<td width="20%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">'.$gross_amount.'</span> 
</td>
</tr>
</table>
<br><br>
';

$html.='<table width="100%" style="font-family: calibri;" cellpadding="10">
<tr>
<td width="100%" style="border: 0.1mm solid #888888; ">
   <span style="font-size:9pt; color: #000000; font-family: calibri;">Place Of Delivery -</span> '.$deliver_place.' 
</td>
</tr>
<tr>
<td width="100%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">Time Of Delivery - </span> '.$start_deliver_date.' - '.$upto_deliver_date.'
</td>
</tr>
<tr>
<td width="100%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">Payment Mode - </span> '.$payment_mode.'
</td></tr></table>
<br><br>
<br><br>
<p style="text-align:right;">____________________<br>Signature</p>
';


$mpdf=new mPDF('c', 'A4'); 

$mpdf->WriteHTML($html);
$mpdf->Output();

?>