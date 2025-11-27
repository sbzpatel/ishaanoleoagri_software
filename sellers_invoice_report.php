<?php include('header.php'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Reports</a></li>
        <li class="active">Invoice Report (Seller)</li>
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
              <h3 class="box-title">Invoice Report (Seller)</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			  <div class="box-body">
                <form method="post" action="">
					<div class="col-md-12">
						<div class="form-group">
						  <label for="exampleInputEmail1">Select Seller</label>
						  <select name="seller" class="form-control">
							 <option value="0" selected>Select Seller</option>
								 <?php 
								   $sql="select * from seller";
								   $query=mysql_query($sql);
								   while($row=mysql_fetch_array($query))
								   {
									   $seller_id=$row['id'];
									   $seller_name=$row['name']; 
								  ?>
							  <option value="<?php echo $seller_id; ?>" <?php if(isset($_POST['seller']) and $_POST['seller'] !== '' and $_POST['seller'] == $seller_id) { echo "selected";}?>><?php echo $seller_name; ?></option>
							   <?php } ?>
						   </select>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
						  <label for="exampleInputPassword1">Select Start Date</label>
						  <input type="text" class="form-control" id="start_date" name="start_date" placeholder="YYYY-MM-DD" value="<?php if(isset($_POST['start_date']) and $_POST['start_date'] !== '') { echo $_POST['start_date'];}?>" readonly>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						  <label for="exampleInputPassword1">Select End Date</label>
						  <input type="text" class="form-control" id="end_date" name="end_date" placeholder="YYYY-MM-DD" value="<?php if(isset($_POST['end_date']) and $_POST['end_date'] !== '') { echo $_POST['end_date'];}?>" readonly>
						</div>
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary" name="submit" value="SUBMIT">
					</div>
               </form>
			   <div class="col-md-12">
					<div class="col-md-8">
						<div class="form-group">
						  <label for="exampleInputPassword1">Total No. of Invoices:&nbsp; </label>&nbsp;&nbsp;<span id="total_number_of_invoices"></span>
						</div>
					</div>
					<div class="col-md-4">
						<!--div class="form-group">
						  <label for="exampleInputPassword1">Total Product Sold:</label>&nbsp;&nbsp;<span id="total_no_of_products"></span>
						</div-->
					</div>
					<div class="col-md-4">
						<div class="form-group">
						  <label for="exampleInputPassword1">Total Amount:&nbsp; <span class="fa fa-rupee"></span></label>&nbsp;&nbsp;<span id="total_amount"> <?php echo $total_amount; ?></span>
						</div>
					</div>
			   </div>
               
              <table id="example1" class="table table-bordered table-striped">
                <thead>
					<tr>
						<th>Sr. No.</th>
						<th>Invoice Number</th>
						<th>Invoice Date</th>
						<th>Seller Name</th>
						<th>Payment Status</th>
						<th>Net Amount &nbsp;(<span class="fa fa-rupee"></span>)</th>
					</tr>
                </thead>
                <tbody>
				<?php
					$a=1;
                    $sql="select * from `seller_invoice` WHERE number <> 0";
					
						if(isset($_POST['seller']) and $_POST['seller'] !== '') {
							$seller_id = $_POST['seller'];
								$sqll = "select * from seller where id='$seller_id'";
								$queryy = mysql_query($sqll);
								$row = mysql_fetch_array($queryy);
								$seller_name = $row['name'];
								  $sql .=" AND seller_name='$seller_name'";
						}
						if(isset($_POST['start_date']) and $_POST['start_date'] !== '') {
							  $sql .=" AND seller_date >= '".$_POST['start_date']."'";
						}
						if(isset($_POST['end_date']) and $_POST['end_date'] !== '') {
							  $sql .=" AND seller_date <= '".$_POST['end_date']."'";
						}
                   
                    $result=mysql_query($sql);

                    if (mysql_num_rows($result) > 0) {
                    while($row=mysql_fetch_array($result))
                    {
                 ?> 
                    <tr>
                        <td><?php echo $a; ?></td>
                        <td>SC-<?php echo $row['number']; ?></td>
                        <td><?php echo $row['seller_date']; ?></td>
                        <td><?php echo $row['seller_name']; ?></td>
                        <td><?php echo $row['payment_status']; ?></td>
						<td><?php echo number_format($row['gross_amount'],2,".",","); ?></td>
                    </tr>
					
					
                    <?php

						$total_amount += $row['gross_amount'];
					$a++; 
					}
					}
					$total_number_of_invoices = $a-1;
					?>
                </tbody>
              </table>
            </div>
              <!-- /.box-body -->

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
<?php include('footer.php'); ?>

<script src="plugins/datepicker/bootstrap-datepicker.js"></script> 
  <script>
      $('#start_date').datepicker({
       autoclose: true,
       format: "yyyy-mm-dd",
     });
  </script>
  <script>
      $('#end_date').datepicker({
       autoclose: true,
       format: "yyyy-mm-dd",
     });
  </script>
  <script>
  
  $(document).ready(function(){
	  //alert("hio");
	 show_sellers_contract(); 
  });
  
  
  $(function () {
    $("#example1").DataTable();
  });
  
  $("#total_amount").html('<?php echo number_format($total_amount,2,".",",");?>');
  $("#total_number_of_invoices").html('<?php echo $total_number_of_invoices?>');
  
  </script>

