<?php include('header.php'); ?>

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
		<ol class="breadcrumb">
			<li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Contracts</a></li>
			<li class="active">New Contract</li>
		</ol>
    </section>

    <section class="content">
        <div class="row">
			<div class="col-md-8">
				<div class="box box-primary">
					<div class="box-header with-border">
					  <h3 class="box-title">Add New Contract</h3>
					</div>
      
					<form role="form" action="contract_add.php" method="post">
						<div class="box-body">
							<div class="form-group">
								<label for="exampleInputPassword1">Date of Contract</label><br>
								<input type="text" class="form-control" id="contract_date" name="contract_date" placeholder="YYYY-MM-DD" required readonly>
							</div>
							
							<div class="form-group">
								<label for="exampleInputPassword1">Select one</label>
								<div class="radio">
									<label><input type="radio" name="normal" checked value="Normal">Normal</label>
								</div>
								<div class="radio">
									<label><input type="radio" name="normal" value="Highseas">Highseas</label>
								</div>  
							</div>
							
							<div class="form-group">
								<label for="exampleInputPassword1">Select Currency</label>
								<select name="currency" class="form-control">
									<option disabled selected>Select Currency</option>
									<option value="INR">INR</option>
									<option value="USD" selected>USD</option>
								</select>
							</div>
							
							
							<div class="form-group">
								<label for="exampleInputPassword1">Select Seller</label>
								<select name="seller" class="form-control">
									<option>Select Seller</option>
									 <?php 
									   $sql="select id,name from seller order by name ASC";
									   $query=mysql_query($sql);
									   while($row=mysql_fetch_array($query))
									   {
										   $seller_id=$row['id'];
										   $seller_name=$row['name']; 
									  ?>
									<option value="<?php echo $seller_id;?>"><?php echo $seller_name; ?></option>
									  <?php 
									   } 
									  ?>	
								</select>
							</div>
					
							<div class="form-group">
								<label for="exampleInputPassword1">Select Buyer</label>
								<select name="buyer" class="form-control">
									<option>Select Buyer</option>
									 <?php 
									   $sql="select id,name from buyer order by name ASC";
									   $query=mysql_query($sql);
									   while($row=mysql_fetch_array($query))
									   {
										   $buyer_id=$row['id'];
										   $buyer_name=$row['name']; 
									  ?>
									<option value="<?php echo $buyer_id;?>"><?php echo $buyer_name; ?></option>
									  <?php 
									   } 
									  ?>	
								</select>
							</div>
					
							<div class="form-group">
								<label for="exampleInputPassword1">Select Products</label>
								<table class="table table-bordered table-striped">
									<thead>
										<tr>
										<th class="col-sm-1 text-center">Sr. No.</th>
										<th class="col-sm-4 text-center">PRODUCT</th>
										<th class="col-sm-2 text-center">ENTER QUANTITY</th>
										<th class="col-sm-1 text-center">SIZE</th>
										<th class="col-sm-2 text-center">RATE &nbsp;(<span class="fa fa-rupee"></span>)</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										   $sql="select * from product order by name asc;";
										   $query=mysql_query($sql);
										   $count = 1;
										   while($row=mysql_fetch_array($query))
										   {
											   $product_id=$row['id'];
											   $product_name=$row['name']; 
											   $quantity=$row['quantity'];  
											   $rate=$row['rate'];
											   $size=$row['size'];
										?>
										<tr>
											<td>
												<?php echo $count;?>
											</td>
											<td>
												<span class="beautiful" style="text-align:left;">
													<input type="checkbox" name="product[]" value="<?php echo $product_id; ?>"> &nbsp;<?php echo $product_name; ?>
												</span>
											</td>
											<td>
												<span class="" style="text-align:left;">
													<input type="text" class="form-control" name="product_quantity[<?php echo $product_id; ?>]" placeholder="Quantity">	
												</span>
											</td>
											<td>
												<span style="text-align:left;">
													 <?php echo $size; ?>
												</span>
											</td>
											<td>
												<span style="text-align:left;">
													 <input type="text" class="form-control" name="product_rate[<?php echo $product_id; ?>]" placeholder="Rate">	
												</span>
											</td>
										</tr>
										<?php
											$count++;
										  }
										?>
									</tbody>
								</table>
							</div>
							
							<div class="form-group">
								<label for="exampleInputPassword1">Enter Tolerance Value</label>
								<input type="text" class="form-control" id="tolerance" name="tolerance" placeholder="Enter Tolerance Value" >
							</div>
							
							<div class="form-group">
								<label for="exampleInputPassword1">Commodity Specification</label>
								<input type="text" class="form-control" id="specification" name="specification" placeholder="Enter Specification" >
							</div>
							
							<div class="form-group">
								<label for="exampleInputPassword1">FCL</label>
								<input type="text" class="form-control" id="fcl" name="fcl" placeholder="Enter FCL Value" >
							</div>
							
							<div class="form-group">
								<label for="exampleInputPassword1">Enter Delivery Place</label>
								<input type="text" class="form-control" id="deliver_place" name="delivery_place" placeholder="Enter Delivery Place" >
							</div>
					
							<div class="form-group">
								<label for="exampleInputPassword1">Select Shipment Period</label><br>
								<input type="text" class="form-control" id="start_deliver_date" name="start_deliver_date" placeholder="YYYY-MM-DD" required style="width:326px; float:left; margin-right:39px;" readonly>
								<input type="text" class="form-control" id="upto_deliver_date" name="upto_deliver_date" placeholder="YYYY-MM-DD" style="width:328px;" required readonly>
							</div>
					
							<div class="form-group">
								<label for="exampleInputPassword1">Select Payment Terms</label>
								<select name="payment_mode" class="form-control" id="myselect">
									<option>Select Payment Terms</option>
									 <?php 
									   $sql="select id,type from payment_mode";
									   $query=mysql_query($sql);
									   while($row=mysql_fetch_array($query))
									   {
										   $payment_mode_id=$row['id'];
										   $payment_mode_type=$row['type']; 
									  ?>
									<option value="<?php echo $payment_mode_id;?>"><?php echo $payment_mode_type; ?></option>
									  <?php 
									   } 
									  ?>	
								</select>
							</div>
							
							<div class="form-group hiddenField" id="textboxx">
								<input type="text" name="other_payment_mode" class="form-control" placeholder="Enter Status Mode" />
							</div>
							
							<div class="form-group">
								<label for="exampleInputPassword1">For CST</label>
								<div class="radio">
									<label><input type="radio" name="cst" value="Yes">Yes</label>
								</div>
								<div class="radio">
									<label><input type="radio" name="cst" value="No">No</label>
								</div>
							</div>
							
							<div class="form-group">
								<label for="exampleInputPassword1">For Excise</label>
								<div class="radio">
									<label><input type="radio" name="excise" value="Yes">Yes</label>
								</div>
								<div class="radio">
									<label><input type="radio" name="excise" value="No">No</label>
								</div>							  
							</div>
							
							<div class="form-group">
								<label for="exampleInputPassword1">For GST</label>
								<div class="radio">
									<label><input type="radio" name="gst" value="Yes">Yes</label>
								</div>
								<div class="radio">
									<label><input type="radio" name="gst" value="No">No</label>
								</div>							  
							</div>
							
							<div class="form-group">
								<label for="exampleInputPassword1">For IGST</label>
								<div class="radio">
									<label><input type="radio" name="igst" value="Yes">Yes</label>
								</div>
								<div class="radio">
									<label><input type="radio" name="igst" value="No">No</label>
								</div>							  
							</div>
							
							<div class="form-group">
								<label for="exampleInputPassword1">For Ex-Mail</label>
								<div class="radio">
									<label><input type="radio" name="ex-mail" value="Yes">Yes</label>
								</div>
								<div class="radio">
									<label><input type="radio" name="ex-mail" value="No">No</label>
								</div>							  
							</div>
							
							<div class="form-group">
								<label for="exampleInputPassword1">Enter Origin</label>
								<input type="text" class="form-control" id="origin" name="origin" placeholder="Enter Origin" >
							</div>
							
							<div class="form-group">
								<label for="exampleInputPassword1">Enter Packing</label>
								<input type="text" class="form-control" id="packing" name="packing" placeholder="Enter Packing" >
							</div>
							
							<div class="form-group">
								<label for="exampleInputPassword1">Enter Weightment & Quality</label>
								<input type="text" class="form-control" id="weight_n_quality" name="weight_n_quality" placeholder="Enter Weightment & Quanlity" >
							</div>
							
							<div class="form-group">
								<label for="exampleInputPassword1">Other Conditions</label>
								<textarea class="form-control ckeditor" id="other_conditions" name="other_conditions" placeholder="Enter Your Conditions Here...."></textarea>
							</div>
						</div>
						
						<div class="box-footer">
						   <button type="submit" class="btn btn-primary"><i class="fa fa-upload"> SUBMIT</i> </button>
						</div>
					</form>
				</div>
            </div>
        </div>
    </section>
</div>

<?php include('footer.php');?>