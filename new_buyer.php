<?php include('header.php'); ?>

<div class="content-wrapper">
    <section class="content-header">
		  <ol class="breadcrumb">
				<li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="#">Buyers</a></li>
				<li class="active">New Buyer</li>
		  </ol>
    </section>
    
    <section class="content">
		<div class="row">
			<div class="col-md-6">
			  <!-- general form elements -->
			  <div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Add New Buyer</h3>
					</div>
					
					<form role="form" action="buyer_add.php" method="post">
						  <div class="box-body">
								<div class="form-group">
									  <label for="exampleInputEmail1">Company Name</label>
									  <input type="text" class="form-control" id="buyer_name" name="buyer_name" placeholder="Enter Buyer Name" required="required">
								</div>
							
								<!--div class="form-group">
									  <label for="exampleInputEmail1">Account Number</label>
									  <input type="text" class="form-control" id="acc_number" name="acc_number" placeholder="Enter Account Number" required="required">
								</div-->
							
								<div class="form-group">
									  <label for="exampleInputPassword1">GST No.</label>
									  <input type="text" class="form-control" id="vat_number" name="vat_number" placeholder="Enter GST Number" required="required">
								</div>
							
								<div class="form-group">
									  <label for="exampleInputPassword1">Contact Person</label>
									  <input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="Enter Contact Person" required="required">
								</div>
								
								<div class="form-group">
									  <label for="exampleInputPassword1">Email</label>
									  <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required="required" multiple> <span style="color:red; font-size:12px;">Please Enter Multiple Emails seperated by comma.</span>
								</div>
							
								<div class="form-group">
									  <label for="exampleInputPassword1">Mobile Number</label>
									  <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Enter Mobile Number" required="required">
								</div>
								
								<div class="form-group">
									  <label for="exampleInputPassword1">City</label>
									  <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" required="required">
								</div>
							
								<div class="form-group">
									  <label for="exampleInputPassword1">State</label>
									  <input type="text" class="form-control" id="state" name="state" placeholder="Enter State" required="required">
								</div>
								
								<div class="form-group">
									  <label for="exampleInputPassword1">Address</label>
									  <textarea name="address" class="form-control" rows="3" placeholder="Enter Address"></textarea>
								</div>
								
								<div class="form-group">
									  <label for="exampleInputPassword1">Plant Address</label>
									  <textarea name="plant_address" class="form-control" rows="3" placeholder="Enter Plant Address"></textarea>
								</div>
							
								<div class="form-group">
									  <label for="exampleInputPassword1">Correspondence Address</label>
									  <textarea name="corres_address" class="form-control" rows="3" placeholder="Enter Correspondence Address"></textarea>
								</div>
								
								<div class="form-group">
									  <label for="exampleInputPassword1">Warehouse Address</label>
									  <textarea name="ware_address" class="form-control" rows="3" placeholder="Enter Warehouse Address"></textarea>
								</div>
						  </div>
						  <div class="box-footer">
								<button type="submit" class="btn btn-primary" name="submit"><i class="fa fa-upload"> SUBMIT</i> </button>
						  </div>
					</form>
			  </div>
			</div>
        </div>
	</section>
</div>

  <?php include('footer.php');?>
