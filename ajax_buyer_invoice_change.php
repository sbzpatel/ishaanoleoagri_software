<?php
require('libs/library_fnc.php'); 
	$invoice_status = $_GET['invoice_status'];
	$invoice_number = $_GET['invoice_number'];

		$sql="update buyer_invoice set payment_status='$invoice_status' where number='$invoice_number'";
		$query=mysql_query($sql	);
?>