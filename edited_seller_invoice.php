<?php

	require('libs/library_fnc.php');
	session_start();

	$username=$_SESSION['username'];
	if(isset($_SESSION['username'])=='')
	{
		header('Location:index.php');
		exit();
	}

$invoice_number = $_POST['invoice_number'];
$contract_id_list = $_POST['contract_id'];
$product_id_list = $_POST['product_id'];
	  
	  
	foreach($contract_id_list as $contract_id)
	{
		foreach($product_id_list as $product_id)
		{
			$invoice_number;
			$contract_id;
			$product_id;
			$product_rate = $_POST['product_rate'][$contract_id.$product_id];
			$brokerage=$_POST['brokerage'][$contract_id.$product_id];
			$product_quantity=$_POST['product_quantity'][$contract_id.$product_id];
			$total_amount=$_POST['total_amount'][$contract_id.$product_id];
			
			$gross_amount += $total_amount;
			
			$mysql_update_invoice_contract_products="update contract_product set product_quantity='$product_quantity' where contract_id='$contract_id' AND product_id='$product_id'";

			$query_update_invoice_contract = mysql_query($mysql_update_invoice_contract_products);
			
			
			
			$mysql_update_invoice_contract_products1="update seller_invoice_products set total_amount='$total_amount' where contract_number='$contract_id' AND product_id='$product_id' AND invoice_number ='$invoice_number'";
			
			$query_update_invoice_contract1 = mysql_query($mysql_update_invoice_contract_products1);
		
		}
	}
	
	$gross_amount;
	$vat_amount = $gross_amount*(15/100);
	$net_amount = $gross_amount + $vat_amount;
	
	$update_seller_invoice_gross_amount="update seller_invoice set gross_amount='$net_amount' where number='$invoice_number'";
	$updated_seller_invoice=mysql_query($update_seller_invoice_gross_amount);

	header("location:view_seller_invoice.php?invoice_number=".$invoice_number);
	  
?>	  