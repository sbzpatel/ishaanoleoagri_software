<?php include('header.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="view_sellers.php">Invoices</a></li>
        <li class="active">View All Invoices</li>
        <li class="active">View Invoice Details (Buyer)</li>
      </ol>
    </section>

    <br><br>

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> View Invoice Details (Buyer)
			
			
            
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
     
     <?php
        $invoice_number=$_GET['invoice_number'];
		$view_invoice_sql="select * from buyer_invoice where number='$invoice_number'";
		//exit;
		$view_invoice_query=mysql_query($view_invoice_sql);
		$view_invoice_row=mysql_fetch_array($view_invoice_query);
		
	 ?>
     
     
     

      <div class="row">
        <!-- accepted payments column -->
        
        <!-- /.col -->
        <div class="col-xs-5">
				<div class="table-responsive">
					<table class="table">
								  <tr>
											<th style="width:50%">Invoice Number</th>
											<td><b>SC-<?php echo $view_invoice_row['number'];?></b></td>
								  </tr>
								  
								  <tr>
											<th>Invoice Date</th>
											<td><?php echo $view_invoice_row['date'];?></td>
								  </tr>
								  <tr>
											<th>Buyer Name</th>
											<td><?php echo $view_invoice_row['buyer_name'];?></td>
								  </tr>
								  <tr>
											<th>Net Amount</th>
											<td><?php echo $view_invoice_row['gross_amount'];?>.00</td>
								  </tr>
								  <tr>
											<th>Payment Status</th>
											<td><?php echo $view_invoice_row['payment_status'];?></td>
								  </tr>
					</table>
				</div>
        </div>	
			 
	    <div class="col-xs-12">
		<br><h5><b>Contract's Detail -</b></h5><br>
			<div class="table-responsive">
				<table class="table table-bordered table-striped">
				<thead>  
					  <th style="text-align:center;" width="9%">Contract No.</th>
					  <th style="text-align:center;" width="9%">Contract Date</th>
					  <th style="text-align:center;" width="15%">Seller Name</th>
					  <th style="text-align:center;" width="15%">Buyer Name</th>
					  <th>
							  <table border="1px" width="100%">
								  <th width="30%" style="text-align:center;">Product Name</th>
								  <th width="15%" style="text-align:center;">Size</th>
								  <th width="15%" style="text-align:center;">Rate</th>
								  <th width="15%" style="text-align:center;">Qty</th>
								  <th width="12%" style="text-align:center;">B. Rate</th>
								  <th width="13%" style="text-align:center;">Total Amount</th>
							  </table>
					  </th>
				</thead> 
				<tbody>
				<?php $view_contracts_sql=mysql_query("SELECT distinct contract_number FROM `buyer_invoice_products` where invoice_number='$invoice_number'"); 
						   while($view_contract_row=mysql_fetch_array($view_contracts_sql))
						   {
				?>
					 <tr style="vertical-align:middle;">
					 <?php 
						        $contract_number=$view_contract_row['contract_number'];
							  
								$view_contractss_sql=mysql_query("SELECT * FROM `contract` where id='$contract_number'");
                              	while($contract_number_roww=mysql_fetch_array($view_contractss_sql))
								{
									$contract_date=$contract_number_roww['date'];
									$contract_seller_id=$contract_number_roww['seller_name'];
									$contract_buyer_id=$contract_number_roww['buyer_name'];
									
									$seller_name_sql=mysql_query("SELECT * FROM `seller` where id='$contract_seller_id'");
									$seller_name_row=mysql_fetch_array($seller_name_sql);
									$seller_name=$seller_name_row['name'];
									
									$buyer_name_sql=mysql_query("SELECT * FROM `buyer` where id='$contract_buyer_id'");
									$buyer_name_row=mysql_fetch_array($buyer_name_sql);
									$buyer_name=$buyer_name_row['name'];
								}
								
					 ?>
						  <td style="text-align:center; vertical-align:middle;"><b>CN-<?php echo $contract_number; ?></b></td>
						  <td style="text-align:center; vertical-align:middle;"><?php echo $contract_date; ?></td>
						  <td style="text-align:center; vertical-align:middle;"><?php echo $seller_name; ?></td>
						  <td style="text-align:center; vertical-align:middle;"><?php echo $buyer_name; ?></td>
						  <td>
						  <table border="1px" width="100%">
						    <?php $view_product_sql=mysql_query("SELECT * FROM `buyer_invoice_products` where contract_number='$contract_number' AND invoice_number='$invoice_number'");
                              	while($product_number_roww=mysql_fetch_array($view_product_sql))
								{
									$product_id=$product_number_roww['product_id'];
									$product_name_query=mysql_query("select * from product where id='$product_id'");
									$product_name_row=mysql_fetch_array($product_name_query);
									$product_name=$product_name_row['name'];
									$broker_rate=$product_number_roww['broker_rate'];
									$total_amount=$product_number_roww['total_amount'];
									
									$product_info_query=mysql_query("select * from `contract_product` where contract_id='$contract_number' AND product_id='$product_id'");
						            while($product_info=mysql_fetch_array($product_info_query))
									{
										$product_size=$product_info['product_size'];
										$product_rate=$product_info['product_rate'];
										$product_quantity=$product_info['product_quantity'];
										
									}
							?>
							<tr style="text-align:center; vertical-align:middle;">
							      <td width="30%" ><?php echo $product_name; ?></td>
							      <td width="15%" ><?php echo $product_size; ?></td>
								  <td width="15%" ><?php echo $product_rate; ?></td>
								  <td width="15%" ><?php echo $product_quantity; ?></td>
								  <td width="12%" ><?php echo $broker_rate; ?></td>
								  <td width="13%" ><?php echo $total_amount; ?></td>
							</tr>
						  <?php  
								} 
						  ?>
						  </table>
						  </td>	
					 </tr>
				<?php  } ?>
    			</tbody>
				</table>
				
			</div>
	    </div>
         
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      
	  <div class="box-footer">
				   <a class="btn btn-danger fa fa-upload" href="buyer_invoice_vieww.php?invoice_number=<?php echo $invoice_number; ?>"> DOWNLOAD PROVISIONAL INVOICE</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				   <a class="btn btn-danger fa fa-upload" href="buyer_invoice_vieww1.php?invoice_number=<?php echo $invoice_number; ?>"> DOWNLOAD FINAL INVOICE</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   <a class="btn btn-danger fa fa-upload" href="buyer_invoice_view.php?invoice_number=<?php echo $invoice_number; ?>"> SEND PROVISIONAL INVOICE</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				   <a class="btn btn-danger fa fa-upload" href="buyer_invoice_view1.php?invoice_number=<?php echo $invoice_number; ?>"> SEND FINAL INVOICE</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   <!--a class="btn btn-danger fa fa-send" href="buyer_invoice_send.php?invoice_number=<?php echo $invoice_number; ?>"> SEND MAIL</a-->
       </div>
	  
    </section>

    <!-- /.content -->
    <div class="clearfix"></div>
  </div>

<?php include('footer.php'); ?>
