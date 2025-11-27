<?php include('header.php'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Reports</a></li>
        <li class="active">Contract Report</li>
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
              <h3 class="box-title">Contract Report</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			  <div class="box-body">
                <form method="post">
					<div class="col-md-6">
						<div class="form-group">
						  <label for="exampleInputEmail1">Select Seller</label>
						  <select name="seller" class="form-control">
							 <option value="">Select Seller</option>
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
						  <label for="exampleInputEmail1">Select Buyer</label>
						  <select name="buyer" class="form-control">
							 <option value="">Select Buyer</option>
								 <?php 
								   $sql="select * from buyer";
								   $query=mysql_query($sql);
								   while($row=mysql_fetch_array($query))
								   {
									   $buyer_id=$row['id'];
									   $buyer_name=$row['name']; 
								  ?>
							  <option value="<?php echo $buyer_id; ?>" <?php if(isset($_POST['buyer']) and $_POST['buyer'] !== '' and $_POST['buyer'] == $buyer_id) { echo "selected";}?>><?php echo $buyer_name; ?></option>
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
			   
			   <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Total Normal Contracts:</label>&nbsp;&nbsp;<span id="total_no_of_normal"><?php echo $total_no_of_normal; ?></span>
                    </div>
                </div>
				<div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Total Highseas Contracts:</label>&nbsp;&nbsp;<span id="total_no_of_highseas"><?php echo $total_no_of_highseas; ?></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Total No. of Contracts:&nbsp; </label>&nbsp;&nbsp;<span id="total_no_of_contracts"> <?php echo $total_no_of_contracts; ?></span>
                    </div>
                </div>
				
			   </div>
			   
              <table id="example1" class="table table-bordered table-striped">
                <thead>
					<tr>
						<th>Sr. No.</th>
						<th>Contract Number</th>
						<th>Contract Date</th>
						<th>Seller (Company Name)</th>
						<th>Buyer (Company Name)</th>
						<th>Contract Type</th>
						<th>Start Deliver Date</th>
						<th>Upto Deliver Date</th>
					</tr>
                </thead>
                <tbody>
				<?php
					$a=1;
                    $sql="select * from `contract` WHERE id <> 0";
					
						if(isset($_POST['buyer']) and $_POST['buyer'] !== '') {
							$buyer_id = $_POST['buyer'];
								// $sqll = "select * from buyer where id='$buyer_id'";
								// $queryy = mysql_query($sqll);
								// $row = mysql_fetch_array($queryy);
								// $buyer_name = $row['name'];
								  $sql .=" AND buyer_name=".$buyer_id;
						}
						
						if(isset($_POST['seller']) and $_POST['seller'] !== '') {
							$seller_id = $_POST['seller'];
								// $sqll = "select * from seller where id='$seller_id'";
								// $queryy = mysql_query($sqll);
								// $row = mysql_fetch_array($queryy);
								// $seller_name = $row['name'];
								  $sql .=" AND seller_name=".$seller_id;
						}
						
						if(isset($_POST['start_date']) and $_POST['start_date'] !== '') {
							  $sql .=" AND date >= '".$_POST['start_date']."'";
						}
						
						if(isset($_POST['end_date']) and $_POST['end_date'] !== '') {
							  $sql .=" AND date <= '".$_POST['end_date']."'";
						}
                   
                    $result=mysql_query($sql);

                    if (mysql_num_rows($result) > 0) {
                    while($row=mysql_fetch_array($result))
                    {
                 ?> 
                    <tr>
                        <td><?php echo $a; ?></td>
                        <td>CN-<?php echo $row['id']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td>
							<?php
							
								$seller_id = $row['seller_name'];
									$seller_name_sql = "select * from seller where id='$seller_id'";
									$seller_name_query = mysql_query($seller_name_sql);
									$seller_name_row = mysql_fetch_array($seller_name_query);
									echo $seller_name = $seller_name_row['name'];
							
							?>
						</td>
						<td>
							<?php
							
								$buyer_id = $row['buyer_name'];
									$buyer_name_sql = "select * from buyer where id='$buyer_id'";
									$buyer_name_query = mysql_query($buyer_name_sql);
									$buyer_name_row = mysql_fetch_array($buyer_name_query);
									echo $buyer_name = $buyer_name_row['name'];
							
							?>
						</td>
                        <td>
						<?php echo $row['normal'];
							$total_no_of_normal == 0;
							$total_no_of_highseas == 0;
							if($row['normal'] == 'Normal')
							{
								$total_no_of_normal++;
							}
							if($row['normal'] == 'Highseas')
							{
								$total_no_of_highseas++;
							}
						?>
						</td>
                        <td><?php echo $row['start_deliver_date']; ?></td>
                        <td><?php echo $row['upto_deliver_date']; ?></td>
                    </tr>
					
					
                    <?php
					$a++; 
					
					}
					}
					$total_no_of_contracts = $a-1;
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
  
  $("#total_no_of_contracts").html('<?php echo $total_no_of_contracts;?>');
  $("#total_no_of_normal").html('<?php echo $total_no_of_normal;?>');
  $("#total_no_of_highseas").html('<?php echo $total_no_of_highseas;?>');
  
  </script>

