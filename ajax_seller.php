<?php 
	require('libs/library_fnc.php');
	session_start();

	$username=$_SESSION['username'];
	if(isset($_SESSION['username'])=='')
	{
		header('Location:index.php');
		exit();
	}

$html = "";
$seller_contracts = $_GET['seller_contracts'];

	$html .='<thead>
		<tr>
		  <th>Select</th>
		  <th>Contract No.</th>
		  <th>Contract Date</th>
		  <th>Seller Name</th>
		  <th>Buyer Name</th>
		  <td><table border="1px" width="100%"><tr><th width="30%" style="text-align:center;">Product Name</th>
		  <th width="15%" style="text-align:center;">Size</th>
		  <th width="15%" style="text-align:center;">Rate</th>
		  <th width="15%" style="text-align:center;">Qty</th>
		  <th width="12%" style="text-align:center;">B. Rate</th>
		  <th width="13%" style="text-align:center;">Total Amount</th>
		  </td></tr></table>
		</thead>';
		
$html .='<tbody>';
			
			$a=1;
			if($seller_contracts == '0')
			{	
				$view_contracts_sql=mysql_query("select * from contract WHERE id NOT IN (select DISTINCT contract_number from seller_invoice_products) order by id DESC");
			}
			else	
			{
			$view_contracts_sql=mysql_query("select * from contract WHERE id NOT IN (select DISTINCT contract_number from seller_invoice_products) and seller_name='$seller_contracts' order by id DESC");	
			}
			while($view_contracts_row = mysql_fetch_array($view_contracts_sql))
			{
				$contract_id=$view_contracts_row['id'];
				$contract_date=$view_contracts_row['date'];
				$seller_id=$view_contracts_row['seller_name'];
				$buyer_id=$view_contracts_row['buyer_name'];
				$deliver_place=$view_contracts_row['deliver_place'];
				$start_deliver_date=$view_contracts_row['start_deliver_date'];
				$upto_deliver_date=$view_contracts_row['upto_deliver_date'];
				$payment_mode=$view_contracts_row['payment_mode'];

		
	$html .='<tr>
				<td><input type="checkbox" class="i-check" value="'.$contract_id.'" name="contract_id[]"/>
				</td>
				<td>CN-'.$contract_id.'</td>
				<td>'.$contract_date.'</td>';
		
					
						$seller_name_sql=mysql_query("select * from seller where id='$seller_id'");
						$seller_name_row=mysql_fetch_array($seller_name_sql);
						$seller_name=$seller_name_row['name'];
				$html .='<td>'.$seller_name.'</td>';
				
					
						$buyer_name_sql=mysql_query("select * from buyer where id='$buyer_id'");
						$buyer_name_row=mysql_fetch_array($buyer_name_sql);
						$buyer_name=$buyer_name_row['name'];
				$html .='<td>'.$buyer_name.'</td>';
			
				$html .='<td>';
				$html .='<table border="1" width="100%">';
					
					$sql_contract_product="select * from contract_product where contract_id ='$contract_id'";
					$query_contract_product=mysql_query($sql_contract_product);
					
			
					
					while($row_contract_product=mysql_fetch_array($query_contract_product))
					{
						
						$id=$row_contract_product['id'];
						$product_id=$row_contract_product['product_id'];
						$sql="select * from product where id = '$product_id'";
						$query=mysql_query($sql);
						$row=mysql_fetch_array($query);
						$product_id=$row['id'];
						$product_name=$row['name']; 
						$quantity=$row['quantity'];  
						$rate=$row['rate'];
						$size=$row['size'];

						$product_quantity=$row_contract_product['product_quantity'];	
						$product_size=$row_contract_product['product_size'];
						$product_rate=$row_contract_product['product_rate'];
						
						
					$html .='<tr><td width="30%" style="text-align:center;">'.$product_name.'</td>';
					$html .='<td width="15%" style="text-align:center;">'.$product_size.'</td>';
					$html .='<td width="15%" style="text-align:center;">'.$product_rate.'</td>';
					$html .='<td width="15%" style="text-align:center;">'.$product_quantity.'</td>';
					
									
					
					$html .='<td width="12%" style="text-align:center;">
					<input type="hidden" class="form-control" name="qty" id="qty'.$id.'" width="10px;" value="'.$product_quantity.'"/>
					
					<input type="text" class="form-control" name="brokerage['.$contract_id.$product_id.']" id="brokerage_rate'.$id.'" width="10px;" onkeyup="cal_total_amount('.$product_quantity.','.$id.')"/></td>
                    <td width="13%" style="text-align:center;">
					
					<input type="text" class="form-control" name="total['.$contract_id.$product_id.']" id="total_amount'.$id.'" width="10px;" onkeyup="cal_broker_amount('.$product_quantity.','.$id.')" /></td>
					';
					
					$html .='</tr>';
				 }
				$html .='</table>';
				$html .='</td>';
	$html .='</tr>';
			$a++; } 
$html .='</tbody>';
		
//echo $view_contracts_sql;
echo $html;
?>
<script>
    function cal_total_amount(count,id)
	{
		var brokerage_rate = $('#brokerage_rate'+id).val();
		//alert(brokerage_rate);
		var qty = $('#qty'+id).val();
		
		//alert(qty);
		var total_amt = 0;
		
		total_amt = parseInt(brokerage_rate) * parseInt(qty) ;
		
		$('#total_amount'+id).val(total_amt);
		
	}
	function cal_broker_amount(count,id)
	{
		var total_amount = $('#total_amount'+id).val();
		//alert(brokerage_rate);
		var qty = $('#qty'+id).val();
		
		//alert(qty);
		var total_amt = 0;
		
		brokerage_rate = parseInt(total_amount) / parseInt(qty);
		
		$('#brokerage_rate'+id).val(brokerage_rate);
	}
</script>
