<?php include('header.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Invoices</a></li>
        <li class="active">Create Invoice (Seller)</li>
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
              <h3 class="box-title">Add New Invoice (Seller)</h3>
            </div>
            
            <form role="form" action="view_contracts_invoice_seller.php" method="post">
              <div class="box-body">
			  
				<div class="form-group">
				<label for="exampleInputEmail1">Seller Name</label>
                  <select class="form-control" name="seller_id" id="seller_id" onchange="show_sellers_contract()">
				  <option value="0" disabled selected>Select Name</option>
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
				
				
				<!--div class="form-group">
                  <label for="exampleInputEmail1">Brokerage Percent (%)</label>
                  <input type="text" class="form-control" id="broker_percentage" name="broker_percentage" placeholder="Enter In %" required="required">
                </div-->
				
                <div class="form-group">
                    <label for="exampleInputPassword1">Related Contracts</label>
					<table id="example1" class="table table-bordered table-striped">	
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
 
<?php include('footer.php');?> 

<script src="plugins/datepicker/bootstrap-datepicker.js"></script> 
<script>
	$('#invoice_date').datepicker({
		autoclose: true,
		format: "yyyy-mm-dd",
	});
</script>
  


<script type="text/javascript">
	function show_sellers_contract()
	{
			//var seller_contracts=document.getElementById('seller_id').value;
		var seller_contracts = $('#seller_id').val();
			//alert(seller_contracts);
		$.ajax({
		url : 'ajax_seller.php', 					//Declaration of file, in which we will send the data
		data: "seller_contracts="+seller_contracts,
		success : function(data){
				$('#example1').html(data);
			}	
		});
	}  
</script>
