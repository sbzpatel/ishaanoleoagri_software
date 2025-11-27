<?php
//session_start();
require('libs/library_fnc.php');
//$to = "shahbaz@katalystcorp.in";

require 'phpmailer/PHPMailerAutoload.php';


		$invoice_number = $_GET['invoice_number'];

		$view_invoice_sql="select * from buyer_invoice where number='$invoice_number'";
		$view_invoice_query=mysql_query($view_invoice_sql);
		$view_invoice_row=mysql_fetch_assoc($view_invoice_query);
		
		$invoice_date = $view_invoice_row['date'];
		$invoice_buyer_name = $view_invoice_row['buyer_name'];
		$invoice_gross_amount = $view_invoice_row['gross_amount'];
		$invoice_payment_status = $view_invoice_row['payment_status'];
		
			$sqll = "select email from buyer where name='$invoice_buyer_name'";
			$queryy = mysql_query($sqll);
			$row = mysql_fetch_array($queryy);
			
				$buyer_email = $row['email'];
			
				
	
	$server = $_SERVER['HTTP_HOST'];

	$host = @preg_replace('www.','',$server);
	
	$to = 'shahbaz@katalystcorp.in';
	$from = 'shahbaz@katalystcorp.in';

$subject= "Mail From Shiv & Company For ".$invoice_seller_name;



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

	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = $subject;
	$mail->Body    = $message."<br><br><br>";
	$mail->Body    .= "<h3><b>Invoice Details</b></h3><br>";
	$mail->Body    .= "Invoice Number : SC-" .$invoice_number."<br>";
	$mail->Body    .= "Invoice Date : " .$invoice_date."<br>";
	$mail->Body    .= "Company Name : " .$invoice_buyer_name."<br>";
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	

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

header('Location:view_buyer_invoice.php?invoice_number='.$invoice_number.'');


?> 