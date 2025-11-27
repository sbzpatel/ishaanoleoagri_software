<?php include('header.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="view_buyers.php">Buyers</a></li>
        <li class="active">View all Buyer's</li>
        <li class="active">Edit Buyer's Detail</li>
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
              <h3 class="box-title">Edit Buyer's Detail</h3>
            </div>
            <!-- /.box-header -->
            <?php
			$buyer_id=$_GET['buyer_id'];
            $edit_sql="select * from buyer where id='$buyer_id'";
			$edit_query=mysql_query($edit_sql);
			$edit_row=mysql_fetch_array($edit_query);
			
			$buyer_name=$edit_row['name'];
			//$buyer_account_number=$row['acc_no'];
	        $buyer_vat_number=$edit_row['vat_number'];
	        $buyer_contact_person=$edit_row['contact_person'];
	        $buyer_email=$edit_row['email'];
			$buyer_mobile_number=$edit_row['mobile_number'];
		    $buyer_city=$edit_row['city'];
	        $buyer_state=$edit_row['state'];
	        $buyer_address=$edit_row['address'];
			$buyer_plant_address=$edit_row['plant_address'];
			$buyer_corres_address=$edit_row['corres_address'];
			$buyer_ware_address=$edit_row['ware_address'];
			?>
            
            
            
            
            <!-- form start -->
            <form role="form" action="buyer_edit.php" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Company Name</label>
                  <input type="text" class="form-control" id="buyer_name" name="buyer_name" placeholder="Enter Buyer Name" value="<?php echo $buyer_name; ?>" required="required">
				  <input type="hidden" class="form-control" id="buyer_id" name="buyer_id" placeholder="Enter Buyer Id" value="<?php echo $buyer_id; ?>" required="required">
                </div>
				
				<!--div class="form-group">
                  <label for="exampleInputEmail1">Account Number</label>
                  <input type="text" class="form-control" id="acc_number" name="acc_number" placeholder="Enter Account Number" required="required">
                </div-->
				
                <div class="form-group">
                  <label for="exampleInputPassword1">GST No.</label>
                  <input type="text" class="form-control" id="vat_number" name="vat_number" placeholder="Enter GST Number" value="<?php echo $buyer_vat_number; ?>" required="required">
                </div>
				
				<div class="form-group">
                  <label for="exampleInputPassword1">Contact Person</label>
                  <input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="Enter Contact Person" value="<?php echo $buyer_contact_person; ?>" required="required">
                </div>
				
				<div class="form-group">
                  <label for="exampleInputPassword1">Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" value="<?php echo $buyer_email; ?>" required="required">
                </div>
                
				<div class="form-group">
                  <label for="exampleInputPassword1">Mobile Number</label>
                  <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Enter Mobile Number" value="<?php echo $buyer_mobile_number; ?>" required="required">
                </div>
				
				<div class="form-group">
                  <label for="exampleInputPassword1">City</label>
                  <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" value="<?php echo $buyer_city; ?>" required="required">
                </div>
				
				<div class="form-group">
                  <label for="exampleInputPassword1">State</label>
                  <input type="text" class="form-control" id="state" name="state" placeholder="Enter State" value="<?php echo $buyer_state; ?>" required="required">
                </div>
				
				<div class="form-group">
					  <label for="exampleInputPassword1">Address</label>
					  <textarea name="address" class="form-control" rows="3" placeholder="Enter Address"><?php echo $buyer_address; ?></textarea>
				</div>
				
				<div class="form-group">
					  <label for="exampleInputPassword1">Plant Address</label>
					  <textarea name="plant_address" class="form-control" rows="3" placeholder="Enter Plant Address"><?php echo $buyer_plant_address; ?></textarea>
				</div>
				
				<div class="form-group">
					  <label for="exampleInputPassword1">Correspondence Address</label>
					  <textarea name="corres_address" class="form-control" rows="3" placeholder="Enter Correspondence Address"><?php echo $buyer_corres_address; ?></textarea>
				</div>
				
				<div class="form-group">
					  <label for="exampleInputPassword1">Warehouse Address</label>
					  <textarea name="ware_address" class="form-control" rows="3" placeholder="Enter Warehouse Address"><?php echo $buyer_ware_address; ?></textarea>
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
