<?php include('header.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Invoice</a></li>
        <li class="active">New Invoice</li>
      </ol>
    </section>
	
	
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Invoice</h3>
            </div>
            <!-- /.box-header -->
            
            
            
            
            
            <!-- form start -->
            <form role="form" action="view_contracts_invoice.php" method="post">
              <div class="box-body">
                <div class="form-group">
				<label for="exampleInputEmail1">Buyer Name</label>
                  <select class="form-control" name="buyer_id">
				  <option disabled selected>Select Buyer</option>
				<?php 
				$company_names_sql="SELECT * from buyer";
				$result=mysql_query($company_names_sql);
				
				while($mysql_fetch = mysql_fetch_assoc($result))
				{
				$buyer_id = $mysql_fetch['id'];
				$buyer_name = $mysql_fetch['name'];
				?>
				  <option value="<?php echo $buyer_id; ?>"><?php echo $buyer_name;?></option>
				  <?php } ?>
				  </select>
                </div>
				
				 <div class="form-group">
				<label for="exampleInputEmail1">Seller Name</label>
                  <select class="form-control" name="seller_id">
				  <option disabled selected>Select Seller</option>
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
				<input type="text" class="form-control" id="invoice_date" name="invoice_date" placeholder="YYYY-MM-DD" required readonly>
                </div>
				
				
				<div class="form-group">
                  <label for="exampleInputEmail1">Brokerage Percent (%)</label>
                  <input type="text" class="form-control" id="broker_percentage" name="broker_percentage" placeholder="Enter In %" required="required">
                </div>
				
                <div class="form-group">
                  <label for="exampleInputPassword1">Contracts</label>
                    <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Select</th>
                  <th>Contract No.</th>
				  <th>Contract Date</th>
                  <th>Seller Name</th>
				  <th>Buyer Name</th>
				  <td><table border="1px" width="100%"><tr><th width="30%" style="text-align:center;">Product Name</th>
				  <th width="15%" style="text-align:center;">Size</th>
				  <th width="15%" style="text-align:center;">Rate</th>
				  <th width="15%" style="text-align:center;">Qty</th><
				  <th width="15%" style="text-align:center;">Brokerage</th>
				  <th width="10%" style="text-align:center;">Total</th></td></tr></table>
				  <!--th>Actions</th-->
                
                </thead>
                <tbody>
				<?php 
				$a=1;
				$view_contracts_sql=mysql_query("SELECT * FROM `contract` order by id DESC");
				while($view_contracts_row=mysql_fetch_array($view_contracts_sql))
				{
					$contract_id=$view_contracts_row['id'];
					$contract_date=$view_contracts_row['date'];
					$seller_id=$view_contracts_row['seller_name'];
					$buyer_id=$view_contracts_row['buyer_name'];
					$deliver_place=$view_contracts_row['deliver_place'];
					$start_deliver_date=$view_contracts_row['start_deliver_date'];
					$upto_deliver_date=$view_contracts_row['upto_deliver_date'];
					$payment_mode=$view_contracts_row['payment_mode'];

				?>
                <tr>
					<td><input type="checkbox" class="i-check" value="<?php echo $contract_id; ?>" name="contract_id[]"/>
					<input type="hidden" name="buyer_id[]" value="<?php echo $buyer_id; ?>">
					</td>
					<td>CN-<?php echo $contract_id; ?></td>
					<td><?php echo $contract_date; ?></td>
					<td>
					             <?php 
                                    $seller_name_sql=mysql_query("select * from seller where id='$seller_id'");
                                    $seller_name_row=mysql_fetch_array($seller_name_sql);
									$seller_name=$seller_name_row['name'];
                                    echo $seller_name;
								 ?>
					</td>
                    <td>
								<?php 
                                    $buyer_name_sql=mysql_query("select * from buyer where id='$buyer_id'");
                                    $buyer_name_row=mysql_fetch_array($buyer_name_sql);
									$buyer_name=$buyer_name_row['name'];
                                    echo $buyer_name;
								 ?>
					</td>
				
					<td>
					<table border="1" width="100%">
					
						<?php $sql_contract_product="select * from contract_product where contract_id ='$contract_id'";
					$query_contract_product=mysql_query($sql_contract_product);
					
					
					
					?>	
					
					
					<?php while($row_contract_product=mysql_fetch_array($query_contract_product))
					{
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
                               $product_rate=$row_contract_product['product_rate']; ?>
<tr><td width="30%" style="text-align:center;"><?php echo $product_name; ?></td>

<td width="15%" style="text-align:center;"><?php echo $product_size; ?></td>

<td width="15%" style="text-align:center;"><?php echo $product_rate; ?></td>

<td width="15%" style="text-align:center;"><?php echo $product_quantity; ?></td>
<td width="15%" style="text-align:center;"><input type="text" class="form-control" name="brokerage" width="10px;" /></td>
<td width="10%" style="text-align:center;">10</td>
					
					
					</tr>
					
					<?php } ?>
				
					</table>
					</td>
					<!--td class="btn-group-vertical">
						<a href="view_single_contract_invoice.php?contract_id=<?php echo $contract_id; ?>" class="btn btn-primary btn-sm" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i>
						view &nbsp;</a>
					</td-->
                </tr>
                <?php $a++; } ?>
                </tbody>
              </table>
                </div>
				
				
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                   <button type="submit" class="btn btn-primary" name="submit"><i class="fa fa-upload"> GENERATE INVOICE</i> </button>
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
 
 

<script src="plugins/datepicker/bootstrap-datepicker.js"></script> 
  <script>
      $('#invoice_date').datepicker({
       autoclose: true,
       format: "yyyy-mm-dd",
     });
  </script>
  
   <?php include('footer.php');?>
