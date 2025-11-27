<?php include('header.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="view_sellers.php">Contracts</a></li>
        <li class="active">View All Contracts</li>
        <li class="active">View Contract Detail</li>
      </ol>
    </section>

    <br><br>

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> View Contract Details			
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
     
     <?php
        $contract_id=intval($_GET['contract_id']);
					
			$contract_sql = "select * from contract where id='$contract_id'";
			$contract_query=mysql_query($contract_sql);
			$contract_row=mysql_fetch_array($contract_query);
			
			//$contract_id=$contract_row['id'];
			$contract_date=$contract_row['date'];
			$seller_id=$contract_row['seller_name'];
			$buyer_id=$contract_row['buyer_name'];
			$product_id=$contract_row['product_id'];
			$deliver_place=$contract_row['deliver_place'];
			$start_deliver_date=$contract_row['start_deliver_date'];
			$upto_deliver_date=$contract_row['upto_deliver_date'];
			$payment_mode_id=$contract_row['payment_mode'];
			$other_conditions=$contract_row['other_conditions'];
			$cst_status=$contract_row['cst_status'];
			$excise_status=$contract_row['excise_status'];
			$origin=$contract_row['origin'];
			$packing=$contract_row['packing'];
			$weight_n_quality=$contract_row['weight_n_quality'];
			
			if($cst_status == 'Yes')
			{
				$status_cst = ' +CST';
			}
			else
			{
				$status_cst = '';
			}
			
			if($excise_status == 'Yes')
			{
				$status_excise = ' +Excise';
			}
			else
			{
				$status_excise = '';
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
		
	 ?>
     
     
     

      <div class="row">
        <!-- accepted payments column -->
        
        <!-- /.col -->
        <div class="col-xs-12">
				<div class="table-responsive">
					<table class="table">
					  <tr>
						<th style="width:120px;">Contract Number:</th>
						<td style="width:350px;"><b>CN-<?php echo $contract_id; ?></b></td>
						<th style="width:120px;">Contract Date:</th>
						<td style="width:350px;"><b><?php echo $contract_date; ?></b></td>
					  </tr>
					  
					  <tr>
						<th style="width:120px;">Seller Contact Person: </th>
						<td style="width:350px;"><?php echo $seller_contact_person; ?> </td>
						<th style="width:120px;">Seller Contact Person: </th>
						<td style="width:350px;"><?php echo $buyer_contact_person; ?></td>
					  </tr>
					  <tr>
						<th style="width:120px;">Seller Name: </th>
						<td style="width:350px;"><?php echo $seller_name; ?></td>
						<th style="width:120px;">Buyer Name: </th>
						<td style="width:350px;"><?php echo $buyer_name; ?></td>
					  </tr>
					  <tr>
						<th style="width:120px;">Seller's Address: </th>
						<td style="width:350px;"><?php echo $seller_address; ?></td>
						<th style="width:120px;">Buyer's Address: </th>
						<td style="width:350px;"><?php echo $buyer_address; ?></td>
					  </tr>
					  <tr>
						<th style="width:120px;">Seller's Plant Address: </th>
						<td style="width:350px;"><?php echo $seller_plant_address; ?></td>
						<th style="width:120px;">Buyer's Plant Address: </th>
						<td style="width:350px;"><?php echo $buyer_plant_address; ?></td>
					  </tr>
					  <tr>
						<th style="width:120px;">Seller's Correspondence Address: </th>
						<td style="width:350px;"><?php echo $seller_corres_address; ?></td>
						<th style="width:120px;">Buyer's Correspondence Address: </th>
						<td style="width:350px;"><?php echo $buyer_corres_address; ?></td>
					  </tr>
					  <tr>
						<th style="width:120px;">Seller's Warehouse Address: </th>
						<td style="width:350px;"><?php echo $seller_ware_address; ?></td>
						<th style="width:120px;">Buyer's Warehouse Address: </th>
						<td style="width:350px;"><?php echo $buyer_ware_address; ?></td>
					  </tr>
					  <tr>
						<th style="width:120px;">Seller GST NO.: </th>
						<td style="width:350px;"><?php echo $seller_vat_number; ?></td>
						<th style="width:120px;">Buyer GST NO.: </th>
						<td style="width:350px;"><?php echo $buyer_vat_number; ?></td>
					  </tr>
					  <tr>
						<th style="width:120px;">Seller Email Id: </th>
						<td style="width:350px;"><?php echo $seller_email; ?></td>
						<th style="width:120px;">Buyer Email Id: </th>
						<td style="width:350px;"><?php echo $buyer_email; ?></td>
					  </tr>
					  <tr>
						<th>Seller Bank Name: </th>
						<td><?php echo $seller_bank_name; ?></td>
						<th></th>
						<td></td>
					  </tr>
					  <tr>
						<th>Seller Account Number: </th>
						<td><?php echo $seller_account_number; ?></td>
						<th></th>
						<td></td>
					  </tr>
					  <tr>
						<th>Seller IFSC / RTGS Code: </th>
						<td><?php echo $seller_ifsc_code; ?></td>
						<th></th>
						<td></td>
					  </tr>
					</table>
				</div>
        </div>	
			 
	    <div class="col-xs-12">
		<br><h5><b>Product's Detail </b></h5><br>
			<div class="table-responsive">
				<table class="table table-bordered table-striped">
				<thead>  
					  <th style="text-align:center;">Sr. No.</th>
					  <th style="text-align:center;">Product Name</th>
					  <th style="text-align:center;">Product Rate</th>
					  <th style="text-align:center;">Product Quantity</th>
				</thead> 
				<tbody>
				<?php 
					$a=1;
					$view_contractss_sql=mysql_query("SELECT * FROM `contract_product` where contract_id='$contract_id' ");
					while($contract_number_roww=mysql_fetch_array($view_contractss_sql))
					{
						$product_id=$contract_number_roww['product_id'];
							$sqll = "select * from product where id='$product_id'";
							$queryy = mysql_query($sqll);
							$roww = mysql_fetch_array($queryy);
						$product_name = $roww['name'];	
						$product_rate=$contract_number_roww['product_rate'];
						$product_size=$contract_number_roww['product_size'];
						$product_quantity=$contract_number_roww['product_quantity'];	
				 ?>
					 <tr style="vertical-align:middle;">
						  <td style="text-align:center; vertical-align:middle;"><?php echo $a++; ?></td>
						  <td style="text-align:center; vertical-align:middle;"><?php echo $product_name; ?></td>
						  <td style="text-align:center; vertical-align:middle;"><?php echo $product_rate ?> P<?php echo $product_size; ?></td>
						  <td style="text-align:center; vertical-align:middle;"><?php echo $product_quantity; ?> <?php echo $product_size; ?></td>	
					 </tr>
				<?php  } ?>
    			</tbody>
				</table>
				
			</div>
			
			<div class="col-xs-12">
				<div class="table-responsive">
					<table class="table">
								  <tr>
									<th>Deliver Place:</th>
									<td><?php echo $deliver_place; ?></td>
								  </tr>
								  
								  <tr>
									<th>Delivery Period:</th>
									<td>From <?php echo $start_deliver_date; ?> to <?php echo $upto_deliver_date; ?> </td>
								  </tr>
								  <tr>
									<th>Payment Mode: </th>
									<td><?php echo $payment_mode; ?></td>
								  </tr>
								  <tr>
									<th>Origin: </th>
									<td><?php echo $origin; ?></td>
								  </tr>
								  <tr>
									<th>Packing: </th>
									<td><?php echo $packing; ?></td>
								  </tr>
								  <tr>
									<th>Weightment & Quality: </th>
									<td><?php echo $weight_n_quality; ?></td>
								  </tr>
					</table>
				</div>
        </div>	
	    </div>
         
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
	  
	  
	  
	  <div class="box-footer">
                   <a class="btn btn-danger" href="view_contract.php?contract_id=<?php echo $contract_id; ?>"> Download Contract</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  
				   <a class="btn btn-danger" href="sent_contract.php?contract_id=<?php echo $contract_id; ?>">Send Mail</a>
       </div>
      
    </section>

    <!-- /.content -->
    <div class="clearfix"></div>
  </div>

<?php include('footer.php'); ?>
