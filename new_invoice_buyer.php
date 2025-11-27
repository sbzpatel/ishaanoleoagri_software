<?php include('header.php'); ?>

  <div class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Invoices</a></li>
        <li class="active">Create Invoice (Buyer)</li>
      </ol>
    </section>
	
	
    <section class="content"><br><br>
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Invoice (Buyer)</h3>
            </div>
            <form role="form" action="view_contracts_invoice_buyer.php" method="post">
              <div class="box-body">
				
				<div class="form-group">
				<label for="exampleInputEmail1">Buyer Name</label>
                  <select class="form-control" name="buyer_id" id="buyer_id" onchange="show_buyers_contract()">
				  <option value="0" disabled selected>Select Buyer</option>
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
              <div class="box-footer">
                   <button type="submit" class="btn btn-primary" name="submit"><i class="fa fa-upload"> GENERATE INVOICE</i> </button>
              </div>
            </form>
          </div>
            </div>
          </div>
        </div>
    </section>
  </div>
<?php include('footer.php');?> 

<script src="plugins/datepicker/bootstrap-datepicker.js"></script> 

<script>
	$('#invoice_date').datepicker({
		autoclose: true,
		format: "yyyy-mm-dd",
	});
</script>

<script type="text/javascript">
	function show_buyers_contract()
	{
			//var buyer_contracts=document.getElementById('buyer_id').value;
		var buyer_contracts = $('#buyer_id').val();
			//alert(buyer_contracts);
		$.ajax({
		url : 'ajax_buyer.php', 					//Declaration of file, in which we will send the data
		data: "buyer_contracts="+buyer_contracts,
		success : function(data){
			$('#example1').html(data);
			}
		});
	}  
</script>
