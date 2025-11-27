<?php include('header.php'); 
	$invoice_number = $_GET['invoice_number'];
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Invoices</a></li>
        <li class="active">Edit Invoice (Seller)</li>
      </ol>
    </section>
	
	
    <!-- Main content -->
    <section class="content"><br><br>
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Invoice (Seller)</h3>
            </div>
            <!-- /.box-header -->
            
            
            
            
            
            <!-- form start -->
            <form role="form" action="edited_seller_invoice.php" method="post">
              <div class="box-body">
			  
				<div class="form-group">
				<label for="exampleInputEmail1">Seller Name</label>
                  <select class="form-control" name="seller_id" id="seller_id" onchange="show_sellers_contract()">
					<?php 	$invoice_seller_names_sql="SELECT * from seller_invoice where number='$invoice_number'";
							$result=mysql_query($invoice_seller_names_sql);
							$mysql_fetch = mysql_fetch_assoc($result);
							
							$invoice_seller_number = $mysql_fetch['number'];
							$invoice_seller_name = $mysql_fetch['seller_name'];
							$invoice_seller_date = $mysql_fetch['seller_date'];
					?>
				  <option value="<?php echo $invoice_seller_number;?>" disabled selected><?php echo $invoice_seller_name; ?></option>
				  
				  
				<?php 
				$company_names_sql="SELECT * from seller";
				$result=mysql_query($company_names_sql);
				
				while($mysql_fetch = mysql_fetch_assoc($result))
				{
				$seller_id = $mysql_fetch['id'];
				$seller_name = $mysql_fetch['name'];
				?>
				  <option value="<?php echo $seller_id; ?>"><?php echo $seller_name;?></option>
				  <?php } ?>
				  </select>
                </div>
				
				<div class="form-group">
				<label for="exampleInputEmail1">Invoice Date</label>
				<input type="text" class="form-control" id="invoice_date" name="invoice_date" placeholder="YYYY-MM-DD" value="<?php echo $invoice_seller_date; ?>" required readonly>
                </div>
				
				<!--div class="form-group">
                  <label for="exampleInputEmail1">Brokerage Percent (%)</label>
                  <input type="text" class="form-control" id="broker_percentage" name="broker_percentage" placeholder="Enter In %" required="required">
                </div-->
				
                <div class="form-group">
                <label for="exampleInputPassword1">Related Contracts</label>
                <table class="table table-bordered table-striped">
					<thead>  
					  <th style="text-align:center;">Contract No.</th>
					  <th style="text-align:center;">Contract Date</th>
					  <th style="text-align:center;">Seller Name</th>
					  <th style="text-align:center;">Buyer Name</th>
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
					<?php $view_contracts_sql=mysql_query("SELECT distinct contract_number FROM `seller_invoice_products` where invoice_number='$invoice_number'"); 
					
							   while($view_contract_row=mysql_fetch_array($view_contracts_sql))
							   {
								   $contract_number=$view_contract_row['contract_number'];
					?>
								<input type="hidden" name="contract_id[]" value="<?php echo $contract_number; ?>">
						 <tr>
						 <?php 
									
								  
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
							  <td style="text-align:center; vertical-align:middle;"><?php echo $contract_number; ?></td>
							  <td style="text-align:center; vertical-align:middle;"><?php echo $contract_date; ?></td>
							  <td style="text-align:center; vertical-align:middle;"><?php echo $seller_name; ?></td>
							  <td style="text-align:center; vertical-align:middle;"><?php echo $buyer_name; ?></td>
							  <td>
								  <table border="1px" width="100%">
									<?php $view_product_sql=mysql_query("SELECT * FROM `seller_invoice_products` where contract_number='$contract_number' AND invoice_number='$invoice_number'");
										while($product_number_roww=mysql_fetch_array($view_product_sql))
										{
											$product_id=$product_number_roww['product_id'];
									?>
										<input type="hidden" name="product_id[]" value="<?php echo $product_id; ?>">
									<?php
											$product_name_query=mysql_query("select * from product where id='$product_id'");
											$product_name_row=mysql_fetch_array($product_name_query);
											$product_name=$product_name_row['name'];
											$broker_rate=$product_number_roww['broker_rate'];
											$total_amount=$product_number_roww['total_amount'];
											
											$product_info_query=mysql_query("select * from `contract_product` where contract_id='$contract_number' AND product_id='$product_id'");
											while($product_info=mysql_fetch_array($product_info_query))
											{
												$id=$product_info['id'];
												$product_size=$product_info['product_size'];
												$product_rate=$product_info['product_rate'];
												$product_quantity=$product_info['product_quantity'];
												
											}
									?>
											<tr style="text-align:center;">
												  <td width="30%" ><?php echo $product_name; ?></td>
												  <td width="15%" ><?php echo $product_size; ?></td>
												  <td width="15%" ><?php echo $product_rate; ?></td>
												  
												  <td width="15%" ><input type="text" name="product_quantity[<?php echo $contract_number; ?><?php echo $product_id; ?>]" value="<?php echo $product_quantity; ?>" id="product_quantity<?php echo $id; ?>" style="width:60px;" onkeyup="cal_total_amount(<?php echo $broker_rate; ?>,<?php echo $id; ?>)" ></td>
												  
												  
												  <input type="hidden" name="invoice_number" value="<?php echo $invoice_number; ?>">
												  
												  
												  <td width="12%" style="text-align:center;"><input type="text" readonly name="brokerage[<?php echo $contract_number; ?><?php echo $product_id; ?>]" value="<?php echo $broker_rate; ?>" id="brokerage_rate<?php echo $id; ?>" style="width:50px;" onkeyup="cal_total_amount(<?php echo $product_quantity; ?>,<?php echo $id; ?>)" ></td>
												  
												  <td width="13%" ><input type="text" readonly name="total_amount[<?php echo $contract_number; ?><?php echo $product_id; ?>]" style="width:50px;" id="total_amount<?php echo $id; ?>" value="<?php echo $total_amount; ?>" onkeyup="cal_broker_amount(<?php echo $product_quantity; ?>,<?php echo $id; ?>)"></td>
												  
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
              <!-- /.box-body -->
			  
											  
											  

              <div class="box-footer">
                   <button type="submit" class="btn btn-primary" name="submit"><i class="fa fa-upload"> EDIT INVOICE</i> </button>
              </div>
            </form>
          </div>
          
          

          
              <!-- /input-group -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
        <!-- right column -->
        
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
<?php include('footer.php');?> 

<script src="plugins/datepicker/bootstrap-datepicker.js"></script> 
  <script>
      $('#invoice_date').datepicker({
       autoclose: true,
       format: "yyyy-mm-dd",
     });
  </script>
  <script>
  
  $(document).ready(function(){
	  //alert("hio");
	 show_sellers_contract(); 
  });
  
  </script>


<script type="text/javascript">
	
	function cal_total_amount(count,id)
	{

		var product_quantity = $('#product_quantity'+id).val();
		//alert(brokerage_rate);
		var brokerage_rate = $('#brokerage_rate'+id).val();
		//alert(product_quantity);
		
		var total_amt = 0;
		
		total_amt = parseInt(product_quantity) * parseInt(brokerage_rate);
		
		$('#total_amount'+id).val(total_amt);
		
	}
    function cal_total_amount(count,id)
	{

		var brokerage_rate = $('#brokerage_rate'+id).val();
		//alert(brokerage_rate);
		var product_quantity = $('#product_quantity'+id).val();
		//alert(product_quantity);
		
		var total_amt = 0;
		
		total_amt = parseInt(brokerage_rate) * parseInt(product_quantity);
		
		$('#total_amount'+id).val(total_amt);
		
	}
	function cal_broker_amount(count,id)
	{
		var total_amount = $('#total_amount'+id).val();
		//alert(brokerage_rate);
		var product_quantity = $('#product_quantity'+id).val();
		
		//alert(qty);
		var total_amt = 0;
		
		brokerage_rate = parseInt(total_amount) / parseInt(product_quantity) ;
		
		$('#brokerage_rate'+id).val(brokerage_rate);
	}
</script>
