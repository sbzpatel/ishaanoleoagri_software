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


$html = " ";

    $contract_id_list = $_POST['contract_id'];
	$invoice_date = $_POST['invoice_date'];

	if(isset($_POST['buyer_id'])) {
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
	}
	
	if(isset($_POST['seller_id'])) {
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
	}
	//if()
	//{
	//$sql_buyer_invoice_number=("SELECT COUNT(number) FROM buyer_invoice");
	//$buyer_invoice_number=mysql_query($sql_buyer_invoice_number);
	//}
	//else{
	//$sql_seller_invoice_number=("SELECT COUNT(number) FROM seller_invoice");
	//$seller_invoice_number=mysql_query($sql_seller_invoice_number);
	//}
	
	//$current_seller_invoice_number=$seller_invoice_number+1;
	//$seller_invoice_date=$_POST['invoice_date'];
	//$seller_invoice_company_name=$seller_name;
	
	
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


if(isset($seller_id))
{	
$html.='<div style="height:100px; width:200px;">
<h4 style="margin-bottom:0px;">'.$seller_name.'</h4>
<h5 style="margin-top:0px; margin-bottom:0px">'.$seller_address.'</h5>
<h5 style="margin-top:0px; margin-bottom:0px">'.$seller_city.'</h5>
<h5 style="margin-top:0px; margin-bottom:0px">'.$seller_state.'</h5>
<h5 style="margin-top:0px; margin-bottom:0px">'.$seller_mobile_number.'</h5>
<h5 style="margin-top:0px; margin-bottom:0px">'.$seller_email.'</h5>
</div><br>';
}elseif(isset($buyer_id))
{	
$html.='<div style="height:100px; width:200px;">
<h4 style="margin-bottom:0px;">'.$buyer_name.'</h4>
<h5 style="margin-top:0px; margin-bottom:0px">'.$buyer_address.'</h5>
<h5 style="margin-top:0px; margin-bottom:0px">'.$buyer_city.'</h5>
<h5 style="margin-top:0px; margin-bottom:0px">'.$buyer_state.'</h5>
<h5 style="margin-top:0px; margin-bottom:0px">'.$buyer_mobile_number.'</h5>
<h5 style="margin-top:0px; margin-bottom:0px">'.$buyer_email.'</h5>
</div><br>';
}

$html.='<table width="100%" style="font-family: calibri;" cellpadding="10">
<tr>
<td width="33%" style="border: 0.1mm solid #888888; ">
   <span style="font-size:8pt; color: #000000; font-family: calibri;">Invoice Number :</span> '.$current_invoice_number.'
</td>
<td width="34%" style="border: 0.0mm solid #888888;">
<span style="font-size:8pt; color: #000000; font-family: calibri;">&nbsp;</span> 
</td>
<td width="33%" style="border: 0.1mm solid #888888;">
<span style="font-size:8pt; color: #000000; font-family: calibri;">Invoice Date :</span> '.$invoice_date.'
</td>
</tr></table><br>';

$html.='
<table width="100%" style="font-family: calibri;" cellpadding="10">
<tr>
<th width="10%" style="border: 0.1mm solid #888888; ">
   <span style="font-size:9pt; color: #000000; font-family: calibri;">Sr. No.</span>
</th>
<th width="10%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">Contract No.</span> 
</th>
<th width="10%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">Contract Date</span> 
</th>
<th width="10%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">Contract Total Amount</span> 
</th>
<th width="10%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">PARTICULAR</span> 
</th>
<th width="10%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">COMMODITY</span> 
</th>
<th width="10%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">QTY</span> 
</th>
<th width="10%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">RATE</span> 
</th>
<th width="10%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">B. RATE</span> 
</th>
<th width="10%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">TOTAL AMOUNT</span> 
</th>
</tr>';


$count = 1;
$net_amount = 0;
foreach($contract_id_list as $contract_id)
{
		$product_sql="select * from contract_product where contract_id='$contract_id'";
	    $product_query=mysql_query($product_sql);
		$total_contract_amount=0;
       while($row_product_query=mysql_fetch_array($product_query))
      {
		     $rows=mysql_num_rows($product_sql);
	         $total_amount = 0;
	         $product_id=$row_product_query['product_id'];
			 $product_quantity=$row_product_query['product_quantity'];
			 $product_rate=$row_product_query['product_rate'];
			
	
											   
	         $sql_product_name="select name,percentage from product where id='$product_id'";
             $query_product_name=mysql_query($sql_product_name);
	         $row_product_name=mysql_fetch_array($query_product_name);
	         $product_name=$row_product_name['name'];
			 $product_percentage=$row_product_name['percentage'];
			 
			 
			 $sql_contract_date="select date,buyer_name,total_amount from contract where id='$contract_id'";
             $query_contract_date=mysql_query($sql_contract_date);
	         $row_contract_date=mysql_fetch_array($query_contract_date);
	         $contract_date=$row_contract_date['date'];
             $contract_buyer_id=$row_contract_date['buyer_name'];
			 $contract_seller_id=$row_contract_date['seller_name'];
			 $contract_total_amount=$row_contract_date['total_amount'];
			 
			 $seller_name_sql="select name from seller where id='$contract_seller_id';";			 
             $seller_name_query=mysql_query($seller_name_sql);
             $seller_name_row=mysql_fetch_array($seller_name_query);			 
             $sellerr_name=$seller_name_row['name'];
			 


             $buyer_name_sql="select name from buyer where id='$contract_buyer_id';";			 
             $buyer_name_query=mysql_query($buyer_name_sql);
             $buyer_name_row=mysql_fetch_array($buyer_name_query);			 
             $buyerr_name=$buyer_name_row['name'];
						
	         $product_rate=$row_product_query['product_rate'];
             $product_size=$row_product_query['product_size'];
             $product_quantity=$row_product_query['product_quantity'];
			 
			 $total_contract_amount+=($product_quantity*$product_rate);
	
	
$html.='
<tr>
<td width="5%" style="border: 0.1mm solid #888888; ">
   <span style="font-size:9pt; color: #000000; font-family: calibri;">'.$count.'</span>  
</td>

<td width="5%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">'.$contract_id.'</span> 
</td>

<td width="10%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">'.$contract_date.'</span>
</td>

<td width="10%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">'.$contract_total_amount.'.00</span>
</td>

<td width="20%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">'.$buyerr_name.'</span> 
</td>

<td width="20%" style="border: 0.1mm solid #888888; ">
   <span style="font-size:9pt; color: #000000; font-family: calibri;">'.$product_name.'</span>  
</td>

<td width="5%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">'.$product_quantity.'</span> 
</td>

<td width="10%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">'.$product_rate.'.00</span>
</td>';

				
			
				


							$html.='
							<td width="10%" style="border: 0.1mm solid #888888;">
							<span style="font-size:9pt; color: #000000; font-family: calibri;">'.$_POST['brokerage'][$contract_id.$product_id].'</span> 
							</td>';
							
				$total_list=$_POST['total'];
				

							
                             $html.='
							<td width="10%" style="border: 0.1mm solid #888888;">
							<span style="font-size:9pt; color: #000000; font-family: calibri;">'.$_POST['total'][$contract_id.$product_id].'</span> 
							</td>';

 $net_amount += $_POST['total'][$contract_id.$product_id];        

$html.='
</tr>';
      $count++;
      }
	  
	  //$contract_ids=implode(' ','$contract_id')

}

$html.='
<tr>
<th colspan="8"></th>
<th width="20%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">Net Amount</span> 
</th>
<td width="20%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">'.$net_amount.'.00</span> 
</td>
</tr>

<tr>
<th colspan="8"></th>
<th width="20%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">Vat Amount (16%)</span> 
</th>
<td width="20%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">'.$net_amount * (16/100).'.00</span> 
</td>
</tr>';
         $vat_amount = $net_amount * (16/100);
		 $gross_total = $net_amount + $vat_amount;
		 
$html.='
<tr>
<th colspan="8"></th>
<th width="20%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">Gross Amount(Rounded Off)</span> 
</th>
<td width="20%" style="border: 0.1mm solid #888888;">
<span style="font-size:9pt; color: #000000; font-family: calibri;">'.round($gross_total).'.00</span> 
</td>
</tr>
</table>
<br><br>
';

echo "<pre>";
print_r($html);
echo "</pre>";
exit;
//$current_seller_invoice_number;
///$seller_invoice_date;
//$seller_invoice_company_name;
//$contract_ids;
//$gross_total=round($gross_total);

$mpdf=new mPDF('c', 'A4-L'); 

$mpdf->WriteHTML($html);
$mpdf->Output();

?>