<?php 
	require('libs/library_fnc.php');
	session_start();

	$username=$_SESSION['username'];
	if(isset($_SESSION['username'])=='')
	{
		header('Location:index.php');
		exit();

	}       
           
		$contract_date = $_POST['contract_date'];				
		$normal = $_POST['normal'];
		$currency = $_POST['currency'];
		$seller_name = $_POST['seller'];
		$buyer_name = $_POST['buyer'];
		$product_id = $_POST['product'];
		$tolerance = $_POST['tolerance'];

		$specification = $_POST['specification'];
		$fcl = $_POST['fcl'];

		$origin = $_POST['origin'];
		$packing = $_POST['packing'];
		$weight_n_quality = $_POST['weight_n_quality'];
		$exmail_status = $_POST['ex-mail'];

		$delivery_place = $_POST['delivery_place'];
		$start_deliver_date = $_POST['start_deliver_date'];
		$upto_deliver_date = $_POST['upto_deliver_date'];
		// echo $payment_mode = $_POST['payment_mode'];
		// echo $other_payment_mode = $_POST['other_payment_mode'];

		if(is_numeric($_POST['payment_mode']) && $_POST['payment_mode'] != 3)
		{
		   $payment_mode = $_POST['payment_mode'];   
		}
		else
		{
		   $other_payment_mode = $_POST['other_payment_mode'];	
		   
		   
		   $sqll = "select * from payment_mode";
		   $queryy = mysql_query($sqll);
		   while($row = mysql_fetch_array($queryy))
		   {
			   //echo "other-".$other_payment_mode;
			   //echo "<br>";
			  // echo "type".$row['type'];
			   // echo "<br>";
			   if($other_payment_mode != $row['type'])
			   {
				   
				   $flag = 1;
			   }
			   
		   }
		   if($flag == 1)
		   {
			   $sqlll = "insert into payment_mode set type='$other_payment_mode'";
			   $queryyy = mysql_query($sqlll);
			   $payment_mode = mysql_insert_id(); 
		   }
		}

		$other_conditions = $_POST['other_conditions'];
		$total_amount = 0;
		$contract_status = '';
		$cst_status = $_POST['cst'];
		$excise_status = $_POST['excise'];
		$gst_status = $_POST['gst'];
		$igst_status = $_POST['igst'];


		$insert_contract_sql = "INSERT INTO `contract` (`date`, `normal`, `currency`, `seller_name`, `buyer_name`, `tolerance`, `specification`, `fcl`, `deliver_place`, `start_deliver_date`, `upto_deliver_date`, `payment_mode`, `total_amount`, `other_conditions`, `cst_status`, `excise_status`, `gst_status`, `igst_status`, `origin`, `packing`, `weight_n_quality`, `exmail_status`) VALUES('$contract_date', '$normal', '$currency', '$seller_name', '$buyer_name', '$tolerance', '$specification', '$fcl', '$delivery_place', '$start_deliver_date', '$upto_deliver_date', '$payment_mode', '$total_amount', '$other_conditions', '$cst_status', '$excise_status','$gst_status', '$igst_status', '$origin', '$packing', '$weight_n_quality', '$exmail_status')";


		$insert_contract_query = mysql_query($insert_contract_sql);

		$contract_id = mysql_insert_id();


		$product_list = $_POST['product'];
		$quantity_list = $_POST['product_quantity'];
		$rate_list = $_POST['product_rate'];

		// echo "<pre>";
		// print_r($product_list);
		// echo "</pre>";
		// echo "<pre>";
		// print_r($quantity_list);
		// echo "</pre>";
		// echo "<pre>";
		// print_r($rate_list);
		// echo "</pre>";
		

		$amount = 0;
		$broker_amount = 0;

		foreach($product_list as $product)
		{
			$product_id = $product;
			$product_quantity = $quantity_list[$product];
			$product_rate = $rate_list[$product];


			$product_rate_sql = "select size from product where id='$product'";
			$product_rate_query = mysql_query($product_rate_sql);
			$product_rate_row = mysql_fetch_array($product_rate_query);

			$product_size = $product_rate_row['size'];
			$product_percentage = $product_rate_row['percentage'];

			$amount = ($product_rate * $product_quantity);
			$broker_amount = ($product_percentage * ($amount / 100));
			$total_amount = ($total_amount + $amount);
			$total_broker_amount = ($total_broker_amount + $broker_amount);


			$sqll = "insert into contract_product(`contract_id`, `seller_id`, `buyer_id`, `product_id`, `product_quantity`, `product_size`, `product_rate`) values('$contract_id', '$seller_name', '$buyer_name', '$product_id', '$product_quantity', '$product_size', '$product_rate')";

			$queryy = mysql_query($sqll);
		}
		//exit;
		$update_contract_sql = "update contract set total_amount='$total_amount' where id='$contract_id'";
		$update_contract_query = mysql_query($update_contract_sql);

		//for buyer-name;

		$buyer_name_sql = "select name from buyer where id='$buyer_name'";
		$buyer_name_query = mysql_query($buyer_name_sql);
		$buyer_name_row = mysql_fetch_array($buyer_name_query);
		$buyer_nam = $buyer_name_row['name'];

		//$sql_invoices="insert into invoice(`company_name`,`contract_number`,`contract_date`,`total_amount`,`b_amount`) values('$buyer_nam','$contract_id','$contract_date','$total_amount','$total_broker_amount')";
		//exit;
		//$query_invoices=mysql_query($sql_invoices);

		header('Location:view_contracts.php');
?>