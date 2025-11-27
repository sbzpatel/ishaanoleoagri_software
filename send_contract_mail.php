<?php
//session_start();
require('libs/library_fnc.php');
//$to = "shahbaz@katalystcorp.in";

require 'phpmailer/PHPMailerAutoload.php';


		$contract_id = $_GET['contract_id'];
		echo $view_contract_sql="select * from contract where id='$contract_id'";
		
		$view_contract_query=mysql_query($view_contract_sql);
		$view_contract_row=mysql_fetch_assoc($view_contract_query);
		
		$contract_date = $view_contract_row['date'];
		
		$contract_seller_id = $view_contract_row['seller_name'];
			$sql = "select * from seller where id='$contract_seller_id'";
			//exit;
			$query=mysql_query($sql);
			$row=mysql_fetch_assoc($query);
			
				$seller_name=$row['name'];
				$seller_bank_name=$row['bank_name'];
				$seller_acc_no=$row['acc_no'];
				$seller_ifsc_code=$row['ifsc_code'];
				$seller_vat_number=$row['vat_number'];
				$seller_contact_person=$row['contact_person'];
				$seller_email=$row['email'];
				$seller_mobile_=$row['mobile_number'];
				$seller_city=$row['city'];	 	 	 	 	 	 	 	 
				$seller_state=$row['state'];	 	 	 	 	 	 	 	 
				$seller_address=$row['address'];	 	 	 	 	 	 	 	 
			
		$contract_buyer_id = $view_contract_row['buyer_name'];
			$sql1 = "select * from buyer where id='$contract_buyer_id'";
			$query1=mysql_query($sql1);
			$row1=mysql_fetch_assoc($query1);
				
				$buyer_name=$row1['name'];
				$buyer_vat_number=$row1['vat_number'];
				$buyer_contact_person=$row1['contact_person'];
				$buyer_email=$row1['email'];
				$buyer_mobile_number=$row1['mobile_number'];
				$buyer_city=$row1['city'];
				$buyer_state=$row1['state'];
				$buyer_address=$row1['address'];
			
	 	 	 	 	 	 	 	 	 
			
		$contract_delivery_place = $view_contract_row['delivery place'];
		$contract_start_deliver_date = $view_contract_row['start_deliver_date'];
		$contract_upto_deliver_date = $view_contract_row['upto_deliver_date'];
		$contract_payment_mode_id = $view_contract_row['payment_mode'];
			$sql3 = "select type from payment_mode where id='$contract_payment_mode_id'";
			$query3=mysql_query($sql3);
			$row3=mysql_fetch_assoc($query3);
			
				$contract_payment_mode=$row3['type'];
		
		$contract_other_conditions = $view_contract_row['other_conditions'];
		$contract_cst_status = $view_contract_row['cst_status'];
		$contract_excise_status = $view_contract_row['excise_status'];	
			
			$server = $_SERVER['HTTP_HOST'];

			$host = @preg_replace('www.','',$server);
			
			$to = 'shahbaz@katalystcorp.in';
			$from = 'shahbaz@katalystcorp.in';
			
			
		$subject= "Pfad Contract ".$seller_name." / ".$buyer_name." of dt. ".$contract_date;
					
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

// More headers
$headers .= 'From: <'.$to.'>' . "\r\n";

$mail = new PHPMailer;

 $mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = '103.21.58.15';    
  // $mail->Host = 'bh-in-1.webhostbox.net';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'thinkresult@katalystcorp.in';                 // SMTP username
	$mail->Password = '123456';                           // SMTP password
	$mail->SMTPSecure = 'ssl';   
						 // Enable TLS encryption, `ssl` also accepted
	$mail->Port = '465';                                    // TCP port to connect to
   /* if mail is not sending */
	/*$mail->Port = 25;    
	$mail->SMTPSecure = false;  */
   /* end */
	$mail->setFrom($from);
	$mail->addAddress($to, $invoice_buyer_name);     // Add a recipient
	$mail->addReplyTo($from, $invoice_buyer_name);

	$mail->isHTML(true);  
	
	
	$mail->Subject = $subject;
	$mail->Body    = $message."<br><br><br>";
	$mail->Body    .= "<h3><b>Contract Details</b></h3><br>";
	$mail->Body    .= "Contract Number : CN-" .$contract_id."<br>";
	$mail->Body    .= "Contract Date : " .$contract_date."<br>";
	$mail->Body    .= "Seller Name : " .$seller_name."<br>";
	$mail->Body    .= "Buyer Name : " .$buyer_name."<br>";
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	
	$file_to_attach = 'PATH_OF_YOUR_FILE_HERE';

	$email->AddAttachment( $file_to_attach , 'NameOfFile.pdf' );



if(!$mail->send()) 
{
	echo 'Message could not be sent.';
	echo 'Mailer Error: ';
   // echo "<pre>";
	 // print_r($mail->ErrorInfo);
   //echo "</pre>";
	
} else 
{
	echo 'Message has been sent';
}
//imap_mail($to,$subject,$message,$headers);

header('Location:view_contracts.php');


?> 