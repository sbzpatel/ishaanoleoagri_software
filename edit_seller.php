<?php include('header.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="view_sellers.php">Sellers</a></li>
        <li class="active">View all Sellers's</li>
        <li class="active">Edit Seller's Detail</li>
      </ol>
    </section>
    
    

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Seller's Detail</h3>
            </div>
            <!-- /.box-header -->
            <?php
			$seller_id=$_GET['seller_id'];
            $edit_sql="select * from seller where id='$seller_id'";
			$edit_query=mysql_query($edit_sql);
			$edit_row=mysql_fetch_array($edit_query);
			
			$seller_name=$edit_row['name'];
			$seller_bank_name=$edit_row['bank_name'];
			$seller_account_number=$edit_row['acc_no'];
	        $seller_vat_number=$edit_row['vat_number'];
	        $seller_contact_person=$edit_row['contact_person'];
	        $seller_email=$edit_row['email'];
			$seller_mobile_number=$edit_row['mobile_number'];
		    $seller_city=$edit_row['city'];
	        $seller_state=$edit_row['state'];
			$seller_address=$edit_row['address'];
			$seller_plant_address=$edit_row['plant_address'];
			$seller_corres_address=$edit_row['corres_address'];
			$seller_ware_address=$edit_row['ware_address'];
			$seller_ifsc_code=$edit_row['ifsc_code'];
			?>
            
            
            
            
            <!-- form start -->
            <form role="form" action="seller_edit.php" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Company Name</label>
                  <input type="text" class="form-control" id="seller_name" name="seller_name" placeholder="Enter Seller Name" value="<?php echo $seller_name; ?>" required="required">
				  
				  <input type="hidden" class="form-control" id="seller_id" name="seller_id" placeholder="Enter Seller Id" value="<?php echo $seller_id; ?>" required="required">
                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">Bank Name</label>
                  <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="Enter Bank Name" value="<?php echo $seller_bank_name; ?>" required="required">
                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">Account Number</label>
                  <input type="text" class="form-control" id="acc_number" name="acc_number" placeholder="Enter Account Number" value="<?php echo $seller_account_number; ?>" required="required">
                </div>
				
				<div class="form-group">
					  <label for="exampleInputEmail1">IFSC Code</label>
					  <input type="text" class="form-control" id="ifsc_code" name="ifsc_code" placeholder="Enter IFSC Code" required="required" value="<?php echo $seller_ifsc_code; ?>">
				</div>
				
                <div class="form-group">
                  <label for="exampleInputPassword1">VAT TIN No.</label>
                  <input type="text" class="form-control" id="vat_number" name="vat_number" placeholder="Enter Vat Number" value="<?php echo $seller_vat_number; ?>" required="required">
                </div>
				
				<div class="form-group">
                  <label for="exampleInputPassword1">Contact Person</label>
                  <input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="Enter Contact Person" value="<?php echo $seller_contact_person; ?>" required="required">
                </div>
				
				<div class="form-group">
                  <label for="exampleInputPassword1">Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" value="<?php echo $seller_email; ?>" required="required">
                </div>
                
				<div class="form-group">
                  <label for="exampleInputPassword1">Mobile Number</label>
                  <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Enter Mobile Number" value="<?php echo $seller_mobile_number; ?>" required="required">
                </div>
				
				<div class="form-group">
                  <label for="exampleInputPassword1">City</label>
                  <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" value="<?php echo $seller_city; ?>" required="required">
                </div>
				
				<div class="form-group">
                  <label for="exampleInputPassword1">State</label>
                  <input type="text" class="form-control" id="state" name="state" placeholder="Enter State" value="<?php echo $seller_state; ?>" required="required">
                </div>
				
				<div class="form-group">
					  <label for="exampleInputPassword1">Address</label>
					  <textarea name="address" class="form-control" rows="3" placeholder="Enter Address"><?php echo $seller_address; ?></textarea>
				</div>
				
				<div class="form-group">
					  <label for="exampleInputPassword1">Plant Address</label>
					  <textarea name="plant_address" class="form-control" rows="3" placeholder="Enter Plant Address"><?php echo $seller_plant_address; ?></textarea>
				</div>
				
				<div class="form-group">
					  <label for="exampleInputPassword1">Correspondence Address</label>
					  <textarea name="corres_address" class="form-control" rows="3" placeholder="Enter Correspondence Address"><?php echo $seller_corres_address; ?></textarea>
				</div>
				
				<div class="form-group">
					  <label for="exampleInputPassword1">Warehouse Address</label>
					  <textarea name="ware_address" class="form-control" rows="3" placeholder="Enter Warehouse Address"><?php echo $seller_ware_address; ?></textarea>
				</div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                   <button type="submit" class="btn btn-primary" name="submit"><i class="fa fa-upload"> SUBMIT</i> </button>
              </div>
            </form>
          </div>
          <!-- /.box -->

          <!-- Form Element sizes -->
          
          <!-- /.box -->

          

          <!-- Input addon -->
          
              <!-- /input-group -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
          <!-- Horizontal Form -->
          
          <!-- /.box -->
          <!-- general form elements disabled -->
                </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include('footer.php');?>
