<?php 

require('libs/library_fnc.php');
session_start();

$username=$_SESSION['username'];
if(isset($_SESSION['username'])=='')
{
header('Location:index.php');
	exit();

}




    $contract_id_list = $_POST['contract_id'];
   // $seller_invoice_date = $_POST['invoice_number'];
	//if(isset($_POST['buyer_id'])) {
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

	
	//if(isset($_POST['seller_id'])) {
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
	//}
	
	
	//$sql_buyer_invoice_number=("SELECT COUNT(number) FROM buyer_invoice");
	//$buyer_invoice_number=mysql_query($sql_buyer_invoice_number);
	
	
	//$sql_seller_invoice_number=("SELECT MAX(number) from seller_invoice");
	
	//$seller_invoice_number=mysql_query($sql_seller_invoice_number);

	//$current_invoice_number = $seller_invoice_number + 1;


        $invoice_date=$_POST['invoice_date'];
		$invoice_company_name=$seller_name;
		$gross_amount=0;
		$payment_status='Not-paid';
		
       
        $mysql_insert_invoice_contract="insert into seller_invoice(`seller_date`,`seller_name`,`gross_amount`,`payment_status`) values('$invoice_date','$invoice_company_name','$gross_amount','$payment_status')";	
		//exit;
        $query_insert_invoice_contract=mysql_query($mysql_insert_invoice_contract);
       
        $current_invoice_number=mysql_insert_id();
	    $current_invoice_number;
	

$count = 1;
$net_amount = 0;
foreach($contract_id_list as $contract_id)
{
		$product_sql="select * from contract_product where contract_id='$contract_id'";
	    $product_query=mysql_query($product_sql);
		$total_contract_amount=0;
		
		
		//$contract_id;
			  $sql_contract_date="select date from contract where id='$contract_id'";
			  $query_contract_date=mysql_query($sql_contract_date);
			  $row_contract_date=mysql_fetch_array($query_contract_date);
		$contract_date=$row_contract_date['date'];
		
		
		
       while($row_product_query=mysql_fetch_array($product_query))
       {
		     //echo $rows=mysql_num_rows($product_sql);
	         $total_amount = 0;
	         $product_id=$row_product_query['product_id'];
			 $product_quantity=$row_product_query['product_quantity'];
			 $product_rate=$row_product_query['product_rate'];
			
	
											   
	         $sql_product_name="select name from product where id='$product_id'";
			 $query_product_name=mysql_query($sql_product_name);
	         $row_product_name=mysql_fetch_array($query_product_name);
	         $product_name=$row_product_name['name'];
			 //$product_percentage=$row_product_name['percentage'];
			 
			 
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
	
	


				
			
				


						
								$total_list=$_POST['total'];
				

							
                             

 $net_amount += $_POST['total'][$contract_id.$product_id];        

$html.='
</tr>';
      $count++;  
	  
	  $broker_rate=$_POST['brokerage'][$contract_id.$product_id];
	  $total_amount=$_POST['total'][$contract_id.$product_id];
	  
	  $mysql_insert_invoice_contract_products="insert into seller_invoice_products(`invoice_number`,`contract_number`,`product_id`,`broker_rate`,`total_amount`) values('$current_invoice_number','$contract_id','$product_id','$broker_rate','$total_amount')";	
   
        $query_insert_invoice_contract = mysql_query($mysql_insert_invoice_contract_products);	
	  
	  
	  
      }	  
	  
}


         $vat_amount = $net_amount * (15/100);
		 $gross_total = $net_amount + $vat_amount;
		 


$gross_amount=round($gross_total);

$update_seller_invoice_gross_amount="update seller_invoice set gross_amount='$gross_amount' where number='$current_invoice_number'";
$updated_seller_invoice=mysql_query($update_seller_invoice_gross_amount);

header("location:view_invoices_seller.php");



?>