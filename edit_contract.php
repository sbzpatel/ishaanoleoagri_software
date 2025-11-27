<?php include('header.php'); ?>

<div class="content-wrapper">
	<section class="content-header">
		<ol class="breadcrumb">
			<li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="product.php">Contract</a></li>
			<li class="active">View all Contract's</li>
			<li class="active">Edit Contract's Detail</li>
		</ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-8">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Edit Contract's Detail</h3>
					</div>
							<?php
							$contract_id=$_GET['contract_id'];
							$sql_contract="select * from contract where id=$contract_id";
							$query_contract=mysql_query($sql_contract);
							$row_contract=mysql_fetch_array($query_contract);

							$contract_date=$row_contract['date'];
							$seller_namme=$row_contract['seller_name'];
							$buyer_namme=$row_contract['buyer_name'];
							$contract_catagory=$row_contract['normal'];
							$product_id=$row_contract['product_id'];
							$deliver_place=$row_contract['deliver_place'];
							$start_deliver_date=$row_contract['start_deliver_date'];
							$upto_deliver_date=$row_contract['upto_deliver_date'];
							$payment_status_idd=$row_contract['payment_mode'];
							$other_conditions=$row_contract['other_conditions'];
							$tolerance=$row_contract['tolerance'];
							$specification=$row_contract['specification'];
							$fcl=$row_contract['fcl'];
							$cst_status=$row_contract['cst_status'];
							$excise_status=$row_contract['excise_status'];
							$gst_status=$row_contract['gst_status'];
							$igst_status=$row_contract['igst_status'];
							$exmail_status=$row_contract['exmail_status'];
							$origin=$row_contract['origin'];
							$packing=$row_contract['packing'];
							$weight_n_quality=$row_contract['weight_n_quality'];



							$sql_contract_product="select * from contract_product where contract_id='$contract_id'";
							$query_contract_product=mysql_query($sql_contract_product);
							while($row_contract_product=mysql_fetch_array($query_contract_product))
							{

							$pproduct_id[]=$row_contract_product['product_id'];
							$pproduct_quantity[$row_contract_product['product_id']]=$row_contract_product['product_quantity'];

							}
							//echo "<pre>";
							//print_r($pproduct_id);
							//print_r($pproduct_quantity);
							//echo "</pre>";
							//exit;
							?>
					<form role="form" action="contract_edit.php" method="post" enctype="multipart/form-data">
						<div class="box-body">
							<div class="form-group">
								<label for="exampleInputPassword1">Date of Contract</label><br>
								<input type="text" class="form-control" id="contract_date" name="contract_date" placeholder="YYYY-MM-DD" required readonly value="<?php echo $contract_date; ?>">
							</div>

							<div class="form-group">
								<label for="exampleInputPassword1">Select one</label>
								<div class="radio">
									<label><input type="radio" name="normal" value="Normal" <?php if($contract_catagory == 'Normal'){ echo 'checked'; }?>>Normal</label>
								</div>
								<div class="radio">
									<label><input type="radio" name="normal" value="Highseas" <?php if($contract_catagory == 'Highseas'){ echo 'checked'; }?>>Highseas</label>
								</div>
							</div>

							<div class="form-group">
								<label for="exampleInputEmail1">Select Seller</label>
								<select name="seller" class="form-control">
									<?php
										$sql="select * from seller;";
										$query=mysql_query($sql);
										while($row=mysql_fetch_array($query))
										{
											$seller_id=$row['id'];
											$seller_name=$row['name'];
									?>
										<option value="<?php echo $seller_id; ?>" <?php if($seller_id==$seller_namme){ echo 'selected'; } ?> ><?php echo $seller_name; ?></option>
									<?php 
										} 
									?>
								</select>
								<input type="hidden" class="form-control" id="contract_id" name="contract_id" value="<?php echo $contract_id;?>" required>
							</div>

							<div class="form-group">
								<label for="exampleInputEmail1">Select Buyer</label>
								<select name="buyer" class="form-control">
									 <?php
										$sql="select * from buyer;";
										$query=mysql_query($sql);
										while($row=mysql_fetch_array($query))
										{
											$buyer_id=$row['id'];
											$buyer_name=$row['name'];
									  ?>
										<option value="<?php echo $buyer_id; ?>" <?php if($buyer_id==$buyer_namme){ echo 'selected'; } ?> ><?php echo $buyer_name; ?></option>
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
										$sql="select * from contract_product where contract_id='$contract_id'";
										$query=mysql_query($sql);
										$count = 1;
										while($row=mysql_fetch_array($query))
										{
										   $product_id=$row['product_id'];
										   
										   $sql_product_name="select name from product where id='$product_id'";
										   $query_product_name=mysql_query($sql_product_name);
										   $row_product_name=mysql_fetch_array($query_product_name);
										   $product_name=$row_product_name['name']; 
										   
										   $product_quantity=$row['product_quantity'];  
										   $product_rate=$row['product_rate'];
										   $product_size=$row['product_size'];
										?>
										<tr>
											<td>
												<?php echo $count; ?>
											</td>
											<td>
												<span class="beautiful" style="text-align:left;">
													 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $product_name; ?>
												</span>
											</td>
											<td>
												<span class="" style="text-align:left;">
													<input type="text" class="form-control" name="quantity[<?php echo $product_id;?>]" value="<?php echo $product_quantity;?>" placeholder="Quantity">												
													<input type="hidden" name="product_id[]" value="<?php echo $product_id;?>">
												</span>
											</td>
											<td>
												<span style="text-align:left;">
													 <?php echo $product_size; ?>
												</span>
											</td>
											<td>
												<span style="text-align:left;">
													 <input type="text" class="form-control" name="rate[<?php echo $product_id;?>]" value="<?php echo $product_rate;?>" placeholder="Rate">
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
								<input type="text" class="form-control" id="tolerance" name="tolerance" placeholder="Enter Tolerance Value" value="<?php echo $tolerance; ?>" >
							</div>

							<div class="form-group">
								<label for="exampleInputPassword1">Enter Specification</label>
								<input type="text" class="form-control" id="specification" name="specification" placeholder="Enter specification Value" value="<?php echo $specification; ?>" >
							</div>

							<div class="form-group">
								<label for="exampleInputPassword1">Enter FCL Value</label>
								<input type="text" class="form-control" id="fcl" name="fcl" placeholder="Enter FCL Value" value="<?php echo $fcl; ?>" >
							</div>				

							<div class="form-group">
								<?php $countt=$count-1; ?>
								<input type="hidden" name="count" value="<?php echo $countt;?>" >
								<label for="exampleInputPassword1">Delivery Place</label>
								<input type="text" class="form-control" id="deliver_place" name="deliver_place" placeholder="Enter Delivery Place" value="<?php echo $deliver_place;?>">
							</div>

							<div class="form-group">
								<label for="exampleInputPassword1">Select Delivery Period&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label><br>
								<input type="text" class="form-control" id="start_deliver_date" name="start_deliver_date" placeholder="YYYY-MM-DD" required style="width:326px; float:left; margin-right:39px;" readonly value="<?php echo $start_deliver_date;?>">
								<input type="text" class="form-control" id="upto_deliver_date" name="upto_deliver_date" placeholder="YYYY-MM-DD" style="width:328px;" required readonly value="<?php echo $upto_deliver_date;?>">
							</div>

							<div class="form-group">
								<label for="exampleInputEmail1">Select Payment Mode</label>
								<select name="payment_mode" class="form-control">
									<?php
										$sql="select * from payment_mode;";
										$query=mysql_query($sql);
										while($row=mysql_fetch_array($query))
										{
											$payment_status_id=$row['id'];
											$payment_status_type=$row['type'];
									?>
										<option value="<?php echo $payment_status_id; ?>" <?php if($payment_status_id==$payment_status_idd){ echo 'selected'; } ?> ><?php echo $payment_status_type; ?></option>

									<?php 
										} 
									?>
								</select>
							</div>

							<div class="form-group">
								<label for="exampleInputPassword1">Other Conditions</label>
								<textarea class="form-control ckeditor" id="other_conditions" name="other_conditions" placeholder="Enter Your Conditions Here...."><?php echo $other_conditions; ?></textarea>
							</div>

							<div class="form-group">
								<label for="exampleInputPassword1">For CST</label>
								<div class="radio">
									<label><input type="radio" name="cst" value="Yes" <?php if($cst_status == 'Yes'){ echo checked; }?> >Yes</label>
								</div>
								<div class="radio">
									<label><input type="radio" name="cst" value="No" <?php if($cst_status == 'No'){ echo checked; }?> >No</label>
								</div>
							</div>

							<div class="form-group">
								<label for="exampleInputPassword1">For Excise</label>
								<div class="radio">
									<label><input type="radio" name="excise" value="Yes" <?php if($excise_status == 'Yes'){ echo checked; }?> >Yes</label>
								</div>
								<div class="radio">
									<label><input type="radio" name="excise" value="No" <?php if($excise_status == 'No'){ echo checked; }?> >No</label>
								</div>							  
							</div>

							<div class="form-group">
								<label for="exampleInputPassword1">For GST</label>
								<div class="radio">
									<label><input type="radio" name="gst" value="Yes" <?php if($gst_status == 'Yes'){ echo checked; }?> >Yes</label>
								</div>
								<div class="radio">
									<label><input type="radio" name="gst" value="No" <?php if($gst_status == 'No'){ echo checked; }?> >No</label>
								</div>
							</div>

							<div class="form-group">
								<label for="exampleInputPassword1">For IGST</label>
								<div class="radio">
									<label><input type="radio" name="igst" value="Yes" <?php if($igst_status == 'Yes'){ echo checked; }?> >Yes</label>
								</div>
								<div class="radio">
									<label><input type="radio" name="igst" value="No" <?php if($igst_status == 'No'){ echo checked; }?> >No</label>
								</div>
							</div>
							
							<div class="form-group">
								<label for="exampleInputPassword1">For Ex-Mail</label>
								<div class="radio">
									<label><input type="radio" name="ex-mail" value="Yes" <?php if($exmail_status == 'Yes'){ echo checked; }?> >Yes</label>
								</div>
								<div class="radio">
									<label><input type="radio" name="ex-mail" value="No" <?php if($exmail_status == 'No'){ echo checked; }?> >No</label>
								</div>
							</div>

							<div class="form-group">
								<label for="exampleInputPassword1">Enter Origin</label>
								<input type="text" class="form-control" id="origin" name="origin" placeholder="Enter Origin" value="<?php echo $origin; ?>">
							</div>

							<div class="form-group">
								<label for="exampleInputPassword1">Enter Packing</label>
								<input type="text" class="form-control" id="packing" name="packing" placeholder="Enter Packing" value="<?php echo $packing; ?>" >
							</div>

							<div class="form-group">
								<label for="exampleInputPassword1">Enter Weightment & Quality</label>
								<input type="text" class="form-control" id="weight_n_quality" name="weight_n_quality" placeholder="Enter Weightment & Quanlity" value="<?php echo $weight_n_quality; ?>" >
							</div>
						</div>
						<div class="box-footer">
						<input type="submit" class="btn btn-primary" name="submit" value="SUBMIT">
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-6">
		</div>
	</section>
</div>

<?php include('footer.php');?>
  
<script type="text/javascript">
	function open_img()
	{
		$('#show_img').css('display','none');
		$('#hide_img').css('display','');
		document.getElementById('modify').value=1;
	}

	function close_img()
	{
		$('#show_img').css('display','');
		$('#hide_img').css('display','none');
		document.getElementById('modify').value=0;
	}

</script>

<script src="plugins/datepicker/bootstrap-datepicker.js"></script>

<script>
	$('#start_deliver_date').datepicker({
	autoclose: true,
	format: "yyyy-mm-dd",
	});
</script>

<script>
	$('#upto_deliver_date').datepicker({
	autoclose: true,
	format: "yyyy-mm-dd",
	});
</script>
