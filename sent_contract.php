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

		$contract_id=intval($_GET['contract_id']);
					
					$contract_sql = "select * from contract where id='$contract_id'";
					$contract_query=mysql_query($contract_sql);
					$contract_row=mysql_fetch_array($contract_query);
					
					//$contract_id=$contract_row['id'];
					$normal=$contract_row['normal'];
					$currency=$contract_row['currency'];
					$contract_date=$contract_row['date'];
					$seller_id=$contract_row['seller_name'];
				    $buyer_id=$contract_row['buyer_name'];
					$product_id=$contract_row['product_id'];
					$tolerance=$contract_row['tolerance'];
					$specification=$contract_row['specification'];
					$fcl=$contract_row['fcl'];
					$deliver_place=$contract_row['deliver_place'];
		            $start_deliver_date=$contract_row['start_deliver_date'];
					$upto_deliver_date=$contract_row['upto_deliver_date'];
					$payment_mode_id=$contract_row['payment_mode'];
					$other_conditions=$contract_row['other_conditions'];
					$cst_status=$contract_row['cst_status'];
					$excise_status=$contract_row['excise_status'];
					$gst_status=$contract_row['gst_status'];
					$igst_status=$contract_row['igst_status'];
					$exmail_status=$contract_row['exmail_status'];
					$origin=$contract_row['origin'];
					$packing=$contract_row['packing'];
					$weight_n_quality=$contract_row['weight_n_quality'];
					
					if($cst_status == 'Yes')
					{
						$status_cst = ' + CST';
					}
					else
					{
						$status_cst = '';
					}
					
					if($excise_status == 'Yes')
					{
						$status_excise = ' + Excise';
					}
					else
					{
						$status_excise = '';
					}
					
					if($gst_status == 'Yes')
					{
						$status_gst = ' + GST';
					}
					else
					{
						$status_gst = '';
					}
					
					if($igst_status == 'Yes')
					{
						$status_igst = ' + IGST';
					}
					else
					{
						$status_igst = '';
					}
					
					if($exmail_status == 'Yes')
					{
						$status_exmail = ' + Ex-Mail';
					}
					else
					{
						$status_exmail = '';
					}
					
					
					$seller_sql = "select * from seller where id='$seller_id'";
					$seller_query=mysql_query($seller_sql);
					$seller_row=mysql_fetch_array($seller_query);
					
					$seller_name=$seller_row['name'];
				    $seller_bank_name=$seller_row['bank_name'];
					$seller_account_number=$seller_row['acc_no'];
					$seller_ifsc_code=$seller_row['ifsc_code'];
					$seller_vat_number=$seller_row['vat_number'];
		            $seller_contact_person=$seller_row['contact_person'];
					
					$seller_email=$seller_row['email'];
					$seller_email1=explode(",",$seller_email);
					
					$seller_mobile_number=$seller_row['mobile_number'];
					$seller_city=$seller_row['city'];
					$seller_state=$seller_row['state'];
					$seller_address=$seller_row['address'];
					$seller_plant_address=$seller_row['plant_address'];
					$seller_corres_address=$seller_row['corres_address'];
					$seller_ware_address=$seller_row['ware_address'];
					
					$buyer_sql = "select * from buyer where id='$buyer_id'";
					$buyer_query=mysql_query($buyer_sql);
					$buyer_row=mysql_fetch_array($buyer_query);
					
					$buyer_name=$buyer_row['name'];
					$buyer_vat_number=$buyer_row['vat_number'];
		            $buyer_contact_person=$buyer_row['contact_person'];
					
					$buyer_email=$buyer_row['email'];
					$buyer_email1=explode(",",$buyer_email);
					
					$buyer_mobile_number=$buyer_row['mobile_number'];
					$buyer_city=$buyer_row['city'];
					$buyer_state=$buyer_row['state'];
					$buyer_address=$buyer_row['address'];
					$buyer_plant_address=$buyer_row['plant_address'];
					$buyer_corres_address=$buyer_row['corres_address'];
					$buyer_ware_address=$buyer_row['ware_address'];


                    $payment_sql = "select * from payment_mode where id='$payment_mode_id'";
					$payment_query=mysql_query($payment_sql);
					$payment_row=mysql_fetch_array($payment_query);
					
                    $payment_mode=$payment_row['type'];
					
					
					$product_sql="select * from contract_product where contract_id='$contract_id'";
					$product_query=mysql_query($product_sql);
					while($row_product_query=mysql_fetch_array($product_query))
					{
						$total_amount = 0;
						$product_id=$row_product_query['product_id'];
						
																   
						$sql_product_name="select * from product where id='$product_id'";
						$query_product_name=mysql_query($sql_product_name);
						$row_product_name=mysql_fetch_array($query_product_name);
						$product_name=$row_product_name['name']; 
						$feature=$row_product_name['feature']; 
																	 
						$product_rate=$row_product_query['product_rate'];
						$product_size=$row_product_query['product_size'];
						$product_quantity=$row_product_query['product_quantity'];
						



		$html = '
		<html>
		<head>
		<link rel="stylesheet" href="style.css" media="all" />
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
		<h4 style="text-align:center;">Truly Passionate to Serve Oleochemicals & Agri Commodities Globally with a Difference</h4>


		<table width="100%"><tr>
		<td style="background-color:white; " width="50%">
			<span style=" font-size: 12pt;">
			<img src="dist/img/logo.png" height="auto" width="220px" style="padding-top:10px;"/>
			</span>
		</td>

		<td class="pull-right" >
		<h5>Address : 266, G.T.B. Nagar, Jalandhar - 144003, Punjab, India.</h5>
		<h5>Office Tel: +91-181-2270409, 2440409</h5>
		<h5>Resi: +91-181-2461709 <br>Mobile : +91-98728 02422, 98763-63902
		<br>Email : enquiry@ishaanoleoagri.com<br>Website : www.ishaanoleoagri.com<br>Skype : ishaanoleo</h5>
		</td>



		</tr></table>
		</htmlpageheader>


		<htmlpagefooter name="myfooter">
		<div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
		ISHAAN OLEO & AGRI RESOURCES IS A SUBSIDIARY OF SHIV & COMPANY, ESTD. 1980<br>Page {PAGENO} of {nb}
		</div>
		</htmlpagefooter>

		<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
		<sethtmlpagefooter name="myfooter" value="on" />

		<br><br><br><br><br><br><br>';
		if ($normal == 'Normal')
		{
		$html.='<h2 align="center"><u>CONTRACT CONFIRMATION</u></h2>';
		} else
		{
		$html.='<h2 align="center"><u>HIGHSEAS CONTRACT</u></h2>';
		}
		$html.='<table width="100%" class="table table-bordered" style="font-family: calibri;" cellpadding="10">
		<tr>
		<td width="25%" style="border: 0.1mm solid #888888; ">
		   <span style="font-size:8pt; color: #000000; font-family: calibri;">Contract Number : CN-'.$contract_id.' </span>
		</td>
		<td width="50%" style="border: 0.1mm solid #888888;">
		<span style="font-size:8pt; color: #000000; font-family: calibri;">Kind Attention : '.$seller_contact_person.' & '.$buyer_contact_person.'</span>
		</td>
		<td width="25%" style="border: 0.1mm solid #888888;">
		<span style="font-size:8pt; color: #000000; font-family: calibri;">Contract Date : '.$contract_date.'</span>
		</td></tr></table>';

		$html.='
		<table width="100%" style="font-family: calibri;" cellpadding="10">
		<tr>
		<th width="50%" style="border: 0.1mm solid #888888; ">
		   <span style="font-size:8pt; color: #000000; font-family: calibri;">SELLER</span>
		</th>
		<th width="50%" style="border: 0.1mm solid #888888;">
		<span style="font-size:8pt; color: #000000; font-family: calibri;">BUYER</span> 
		</th></tr>

		<tr>
		<td width="50%" style="border: 0.1mm solid #888888; ">
		   <span style="font-size:8pt; color: #000000; font-family: calibri;">NAME: '.$seller_name.'  </span>
		</td>
		<td width="50%" style="border: 0.1mm solid #888888;">
		<span style="font-size:8pt; color: #000000; font-family: calibri;">NAME:  '.$buyer_name.'</span>
		</td></tr>

		<tr>
		<td width="50%" style="border: 0.1mm solid #888888; ">
		   <span style="font-size:8pt; color: #000000; font-family: calibri;">ADDRESS:  '.$seller_address.' </span>
		</td>
		<td width="50%" style="border: 0.1mm solid #888888;">
			<span style="font-size:8pt; color: #000000; font-family: calibri;">ADDRESS:  '.$buyer_address.'</span>
		</td>
		</tr>
		
		
		<tr>';
		if($seller_plant_address != ''){
		$html.='<td width="50%" style="border: 0.1mm solid #888888; ">
		   <span style="font-size:8pt; color: #000000; font-family: calibri;">PLANT ADDRESS:  '.$seller_plant_address.' </span>
		</td>';
		}
		if($buyer_plant_address != ''){
		$html.='<td width="50%" style="border: 0.1mm solid #888888;">
			<span style="font-size:8pt; color: #000000; font-family: calibri;">PLANT ADDRESS:  '.$buyer_plant_address.'</span>
		</td></tr>';
		}
		$html.='<tr>';
		if($seller_corres_address != ''){
		$html.='<td width="50%" style="border: 0.1mm solid #888888; ">
		   <span style="font-size:8pt; color: #000000; font-family: calibri;">CORRESPONDENCE ADDRESS:  '.$seller_corres_address.' </span>
		</td>';
		}
		if($buyer_corres_address != ''){
		$html.='<td width="50%" style="border: 0.1mm solid #888888;">
		<span style="font-size:8pt; color: #000000; font-family: calibri;">CORRESPONDENCE ADDRESS:  '.$buyer_corres_address.'</span>
		</td>';
		}
		$html.='</tr>
		<tr>';
		if($seller_ware_address != ''){
		$html.='<td width="50%" style="border: 0.1mm solid #888888; ">
		   <span style="font-size:8pt; color: #000000; font-family: calibri;">WAREHOUSE ADDRESS:  '.$seller_ware_address.' </span>
		</td>';
		}
		if($buyer_ware_address != ''){
		$html.='<td width="50%" style="border: 0.1mm solid #888888;">
		<span style="font-size:8pt; color: #000000; font-family: calibri;">WAREHOUSE ADDRESS:  '.$buyer_ware_address.'</span>
		</td>';
		}
		$html.='</tr>

		<tr>';
		
		$html.='<td width="50%" style="border: 0.1mm solid #888888; ">
		   <span style="font-size:8pt; color: #000000; font-family: calibri;">GST NO.:  '.$seller_vat_number.' </span>
		</td>
		<td width="50%" style="border: 0.1mm solid #888888;">
		<span style="font-size:8pt; color: #000000; font-family: calibri;">GST NO.:  '.$buyer_vat_number.' </span>
		</td></tr>

		<tr>
		<td width="50%" style="border: 0.1mm solid #888888; ">
		   <span style="font-size:8pt; color: #000000; font-family: calibri;">EMAIL ID:  '.$seller_email.' </span>
		</td>
		<td width="50%" style="border: 0.1mm solid #888888;">
		<span style="font-size:8pt; color: #000000; font-family: calibri;">EMAIL ID:  '.$buyer_email.' </span>
		</td></tr>

		<tr>
		<td width="50%" style="border: 0.1mm solid #888888; ">
		   <span style="font-size:8pt; color: #000000; font-family: calibri;">BANK NAME:  '.$seller_bank_name.' </span>
		</td>
		</tr>

		<tr>
		<td width="50%" style="border: 0.1mm solid #888888; ">
		   <span style="font-size:8pt; color: #000000; font-family: calibri;">ACCOUNT NO:  '.$seller_account_number.' </span>
		</td>
		</tr>

		<tr>
		<td width="50%" style="border: 0.1mm solid #888888; ">
		   <span style="font-size:8pt; color: #000000; font-family: calibri;">IFSC / RTGS CODE:  '.$seller_ifsc_code.' </span>
		</td>
		</tr>
		</table>
		';

		$html.='
		<h3>Product Details</h3>
		<table width="100%" style="font-family: calibri;" cellpadding="10">
		<tr>
		<th width="10%" style="border: 0.1mm solid #888888; ">
		   <span style="font-size:8pt; color: #000000; font-family: calibri;">SR NO</span>
		</th>
		<th width="20%" style="border: 0.1mm solid #888888;">
		<span style="font-size:8pt; color: #000000; font-family: calibri;">PRODUCT NAME</span>
		</th>
		<th width="20%" style="border: 0.1mm solid #888888;">
		<span style="font-size:8pt; color: #000000; font-family: calibri;">RATE</span>
		</th>
		<th width="10%" style="border: 0.1mm solid #888888;">
		<span style="font-size:8pt; color: #000000; font-family: calibri;">QUANTITY</span>
		</th>


		</tr>
		';

		$filename = "Contract No. ".$contract_id." ".$seller_name." / ".$buyer_name.".pdf";
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
		   <span style="font-size:8pt; color: #000000; font-family: calibri;">'.$count.'</span>  
		</td>
		<td width="20%" style="border: 0.1mm solid #888888;">
		<span style="font-size:8pt; color: #000000; font-family: calibri;">'.$product_name.'</span> 
		</td>
		<td width="10%" style="border: 0.1mm solid #888888;">
		<span style="font-size:8pt; color: #000000; font-family: calibri;">'.$currency.' '.$product_rate.' P'.$product_size.' '.$status_cst.' '.$status_excise.' '.$status_gst.' '.$status_igst.' '.$status_exmail.'</span> 
		</td>
		<td width="40%" style="border: 0.1mm solid #888888;">
		<span style="font-size:8pt; color: #000000; font-family: calibri;">'.$fcl.'('.$product_quantity.' '.$product_size.' '.$tolerance.')</span> 
		</td>';

		$total_amount = $product_quantity * $product_rate;
		$net_amount += $total_amount;
		$vat_amount = $net_amount * 16/100 ;
		$gross_amount = $net_amount + $vat_amount;

		$html.='
		</tr>';
		$count++;
		}

		$html.='
		</table>
		<br>
		';

		$html.='<table width="100%" style="font-family: calibri;" cellpadding="10">
		<tr>
			<td width="100%" style="border: 0.1mm solid #888888; ">
			  <span style="font-size:8pt; color: #000000; font-family: calibri;">PLACE OF DELIVERY - '.$deliver_place.' </span>
			</td>
		</tr>
		<tr>
			<td width="100%" style="border: 0.1mm solid #888888; ">
			  <span style="font-size:8pt; color: #000000; font-family: calibri;">ORIGIN - '.$origin.' </span>
			</td>
		</tr>
		<tr>
			<td width="100%" style="border: 0.1mm solid #888888; ">
			  <span style="font-size:8pt; color: #000000; font-family: calibri;">PACKING - '.$packing.' </span>
			</td>
		</tr>
		<tr>
			<td width="100%" style="border: 0.1mm solid #888888; ">
			  <span style="font-size:8pt; color: #000000; font-family: calibri;">WEIGHTMENT & QUALITY - '.$weight_n_quality.' </span>
			</td>
		</tr>
		<tr>
			<td width="100%" style="border: 0.1mm solid #888888; ">
			  <span style="font-size:8pt; color: #000000; font-family: calibri;">PRODUCT SPECIFICATION  - '.$specification.' </span>
			</td>
		</tr>';
		if ($normal == 'Normal')
		{
		$html.='<tr>
				<td width="100%" style="border: 0.1mm solid #888888;">
				<span style="font-size:8pt; color: #000000; font-family: calibri;">SHIPMENT PERIOD - '.$start_deliver_date.' to '.$upto_deliver_date.'</span>
				</td>
				</tr>';
		} else
		{
		$html.='<tr>
				<td width="100%" style="border: 0.1mm solid #888888;">
				<span style="font-size:8pt; color: #000000; font-family: calibri;">SHIPMENT PERIOD - <b>'.$start_deliver_date.'</b> to <b>'.$upto_deliver_date.'</b></span>
				</td>
				</tr>';	
		}

		$html.='
		<tr>
		<td width="100%" style="border: 0.1mm solid #888888;">
		<span style="font-size:8pt; color: #000000; font-family: calibri;">PAYMENT TERMS -  '.$payment_mode.'</span>
		</td></tr>
		<tr>
		<td width="100%" style="border: 0.1mm solid #888888;">
		<span style="font-size:8pt; color: #000000; font-family: calibri;"><u>OTHER CONDITIONS</u> -  <div style="padding-left:500px;">'.$other_conditions.'</div> </span>
		</td>
		</tr>
		</table>
		';
		$html.='
		</tr>';
		$count++;
		}

		$html.='
		</table>

		';

		$filename = "Contract No.:".$contract_id." ".$seller_name."-".$buyer_name.".pdf";

		$mpdf=new mPDF('utf-8', 'A4');

		$mpdf->WriteHTML($html);
		//$mpdf->Output('sss1.pdf','I');

		$content = $mpdf->Output($filename, 'S'); // Saving pdf to attach to email 


		for($i=0; $i<count($seller_email1); $i++){

		// Email settings
		$mailto = $seller_email1[$i];
		$from_name = "Shiv & Company";
		$from_mail = 'enquiry@ishaanoleoagri.com';
		$replyto = 'enquiry@ishaanoleoagri.com';
		$uid = md5(uniqid(time())); 


		//$uid = md5(uniqid(time()));
		$subject= $product_name." Contract ".$seller_name." / ".$buyer_name." of dated - ".$contract_date;

		$message = '<h3><b>Contract Details</b></h3><br>';
		$message.="<b>Contract Number :</b> CN-" .$contract_id."<br>";
		$message.="<b>Seller Name :</b> " .$seller_name."<br>";
		$message.="<b>Buyer Name:</b> " .$buyer_name."<br>";
		$message.="Detailed Information is in below Attatchment.";

		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

		// More headers
		$headers .= 'From: <'.$mailto.'>' . "\r\n";

		$mail = new PHPMailer;

		 $mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'sg2plcpnl0225.prod.sin2.secureserver.net';    
		  // $mail->Host = 'bh-in-1.webhostbox.net';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;  //if mail not sent than set $mail->SMTPAuth = false; 
			//$mail->SMTPDEBUG = true;
			// Enable SMTP authentication
			$mail->Username = 'enquiry@ishaanoleoagri.com';                 // SMTP username
			$mail->Password = 'enquiry@123';                           // SMTP password
		   $mail->SMTPSecure = 'ssl'; 
			/*$mail->SMTPSecure = false;*/
								 // Enable TLS encryption, `ssl` also accepted
			$mail->Port = '465';                                  // TCP port to connect to
		   /* if mail is not sending */
			/*$mail->Port = 25;    
			$mail->SMTPSecure = false;  */
		   /* end */
			$mail->setFrom($from_mail);
				//$recipients = $seller_name.",".$buyer_name;
			$mail->addAddress($mailto);     // Add a recipient
			$mail->addReplyTo($replyto);

		   /* $mail->isHTML(true); */                                // Set email format to HTML

			$mail->Subject = $subject;
			$mail->Body    = $message;
			//$mail->AddAttachment($_SERVER['DOCUMENT_ROOT'].'/pdf/test.pdf', $name = 'test',  $encoding = 'base64', $type = 'application/pdf');
			$mail->AddStringAttachment($content, $filename);
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		$mail->send();
		/* end email */
		}


		/* buyer email */
		for($i=0; $i<count($buyer_email1); $i++){

		// Email settings
		$mailto = $buyer_email1[$i];
		$from_name = "Shiv & Company";
		$from_mail = 'enquiry@ishaanoleoagri.com';
		$replyto = 'enquiry@ishaanoleoagri.com';
		$uid = md5(uniqid(time())); 


		//$uid = md5(uniqid(time()));
		$subject= $product_name." Contract ".$buyer_name." / ".$seller_name." of dated - ".$contract_date;

		$message = '<h3><b>Contract Details</b></h3><br>';
		$message.="<b>Contract Number :</b> CN-" .$contract_id."<br>";
		$message.="<b>Seller Name :</b> " .$seller_name."<br>";
		$message.="<b>Buyer Name:</b> " .$buyer_name."<br>";
		$message.="Detailed Information is in below Attatchment.";

		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

		// More headers
		$headers .= 'From: <'.$mailto.'>' . "\r\n";

		$mail = new PHPMailer;

		 $mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'sg2plcpnl0225.prod.sin2.secureserver.net';    
		  // $mail->Host = 'bh-in-1.webhostbox.net';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;  //if mail not sent than set $mail->SMTPAuth = false; 
			//$mail->SMTPDEBUG = true;
			// Enable SMTP authentication
			$mail->Username = 'enquiry@ishaanoleoagri.com';                 // SMTP username
			$mail->Password = 'enquiry@123';                           // SMTP password
		   $mail->SMTPSecure = 'ssl'; 
			/*$mail->SMTPSecure = false;*/
								 // Enable TLS encryption, `ssl` also accepted
			$mail->Port = '465';                                    // TCP port to connect to
		   /* if mail is not sending */
			/*$mail->Port = 25;    
			$mail->SMTPSecure = false;  */
		   /* end */
			$mail->setFrom($from_mail);
				//$recipients = $seller_name.",".$buyer_name;
			$mail->addAddress($mailto);     // Add a recipient
			$mail->addReplyTo($replyto);

		   /* $mail->isHTML(true); */                                // Set email format to HTML

			$mail->Subject = $subject;
			$mail->Body    = $message;
			//$mail->AddAttachment($_SERVER['DOCUMENT_ROOT'].'/pdf/test.pdf', $name = 'test',  $encoding = 'base64', $type = 'application/pdf');
			$mail->AddStringAttachment($content, $filename);
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		$mail->send();

		/* end email */
		}
		/* buyer end email */



		$mpdf->Output($filename,'I'); // For Download
		//exit;
		//header("location:view_contract_details.php?contract_id=".$contract_id);
		//echo "<script>windows.location='view_contract_details.php?contract_id=".$contract_id."</script>";

?>

