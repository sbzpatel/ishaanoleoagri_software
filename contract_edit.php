<?php 
	require('libs/library_fnc.php');
	session_start();

	$username = $_SESSION['username'];
	if(isset($_SESSION['username']) == '')
	{
		header('Location:index.php');
		exit();
	}

    $contract_id = $_POST['contract_id'];
      
            
	$product_list = $_POST['product_id'];
	$quantity_list = $_POST['quantity'];
	$rate_list = $_POST['rate'];
	$contract_date = $_POST['contract_date'];

	
	$seller_id = $_POST['seller'];
	$buyer_id = $_POST['buyer'];
	$deliver_place = $_POST['deliver_place'];
	$start_deliver_date = $_POST['start_deliver_date'];
	$upto_deliver_date = $_POST['upto_deliver_date'];
	$payment_mode = $_POST['payment_mode'];
	$other_conditions = $_POST['other_conditions'];
	$cst_status = $_POST['cst'];
	$excise_status = $_POST['excise'];
	$gst_status = $_POST['gst'];
	$igst_status = $_POST['igst'];
	$normal = $_POST['normal'];
	$tolerance = $_POST['tolerance'];
	$specification = $_POST['specification'];
	$fcl = $_POST['fcl'];
	$origin = $_POST['origin'];
	$packing = $_POST['packing'];
	$weight_n_quality = $_POST['weight_n_quality'];
	$exmail_status = $_POST['ex-mail'];
			
			
			
	$sql = "update contract set date='$contract_date', seller_name='$seller_id', buyer_name='$buyer_id', deliver_place='$deliver_place', start_deliver_date='$start_deliver_date', upto_deliver_date='$upto_deliver_date', payment_mode='$payment_mode', other_conditions='$other_conditions', cst_status='$cst_status', normal='$normal', tolerance='$tolerance', specification='$specification', fcl='$fcl', excise_status='$excise_status', gst_status='$gst_status', igst_status='$igst_status', origin='$origin', packing='$packing', weight_n_quality='$weight_n_quality', exmail_status='$exmail_status' where id='$contract_id'";

	$query = mysql_query($sql);

	foreach($product_list as $product)
	{
		$product_id = $product;
		$product_quantity = $quantity_list[$product];
		$product_rate = $rate_list[$product];

		$sqll = "update contract_product set product_quantity='$product_quantity', product_rate='$product_rate' where product_id='$product' AND contract_id='$contract_id'";

		$queryy = mysql_query($sqll);
	 
		$product_rate_sql = "select size from product where id='$product'";
		$product_rate_query = mysql_query($product_rate_sql);
		$product_rate_row = mysql_fetch_array($product_rate_query);	
		
		$product_size = $product_rate_row['size'];
		$product_percentage = '';
		$amount = ($product_rate * $product_quantity);
		$total_amount = ($total_amount + $amount);
		
		$update_contract_sql = "update contract set total_amount='$total_amount' where id='$contract_id'";
		$update_contract_query = mysql_query($update_contract_sql);
	}
	if(!$queryy)
	{
	   echo "<script>location.href='edit_contract.php';</script>";
	}
	else
	{
	   echo "<script>location.href='view_contracts.php';</script>";
	}
		 
?>







