<?php include('header.php'); ?>
 <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View all Invoice's (Seller)
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Invoices </li>
        <li class="active">View all Invoices (Seller)</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-21">
          <!-- /.box -->

          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Invoice No.</th>
				  <th>Invoice Date</th>
				  <th>Company Name</th>
                  <th>Contract Number's</th>
				  <!--th>Contract Date</th-->
                  <th>Net Amount</th>
				  <th>Payment Status</th>
				  <th>Actions</th>
                </tr>
                </thead>
				
				
				<tbody>
				<?php
				 $a=1;
                 $view_invoices_sql="select * from `seller_invoice` order by number DESC";
				 $view_invoices_query=mysql_query($view_invoices_sql);
				 
				 while ($view_invoices_row=mysql_fetch_array($view_invoices_query))
				 { 
					
					 $invoice_number=$view_invoices_row['number'];
					 $invoice_date=$view_invoices_row['seller_date'];
					 $company_name=$view_invoices_row['seller_name'];
					 
					 $gross_amount=$view_invoices_row['gross_amount'];
					 $payment_status=$view_invoices_row['payment_status'];
				?>
				<tr>
		          <td><?php echo $a; ?></td>
		          <td>SC-<?php echo $invoice_number; ?></td>
				  <td><?php echo $invoice_date; ?></td>
				  <td><?php echo $company_name; ?></td>
				  <td>
				  CN-
				  <?php 
				  $mysql_contract_numbers="select distinct contract_number from `seller_invoice_products` WHERE invoice_number='$invoice_number'";
				  //exit;
				  $contract_numbers_query=mysql_query($mysql_contract_numbers);
				  while($contract_number=mysql_fetch_array($contract_numbers_query))
				  {
					  $contract_number=$contract_number['contract_number'];
					  echo $contract_number."\n";
				  }
				  ?>
				  </td>
				  <td><?php echo $gross_amount; ?>.00</td>
				  <td><?php echo $payment_status; ?></td>
				
				 
				  <td>
					<div class="btn-group-vertical">
						<a href="view_seller_invoice.php?invoice_number=<?php echo $invoice_number; ?>" class="btn btn-primary btn-sm"> <i class="fa fa-eye" aria-hidden="true"></i>
						view</a> &nbsp; 
						<a href="edit_seller_invoice.php?invoice_number=<?php echo $invoice_number; ?>" class="btn btn-primary btn-sm"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
						Edit</a>  <br>
						<!--a href="delete_invoice.php?invoice_id=<?php echo $invoice_number; ?>" class="btn btn-primary btn-sm"> <i class="fa fa-trash" aria-hidden="true"></i>
						Delete</a-->
					</div>	
				  </td>
				</tr>
		   <?php 
		   $a++;
		   } ?>
				</tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  
  
 <?php include('footer.php'); ?>
 <!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- page script -->
<script>
	$(function(){
		$("#example1").DataTable();
	});
</script>
