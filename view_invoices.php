<?php include('header.php'); ?>
 <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View all Invoice's
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <li class="active">View all Invoices</li>
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
                  <th>Invoice No.</th>
				  <th>Invoice Date</th>
				  <th>Company Name</th>
                  <!--th>Contract Number</th-->
				  <!--th>Contract Date</th-->
                  <th>Total Amount</th>
				  <th>B. Amount</th>
				  <th>Actions</th>
                </tr>
                </thead>
				
				
				<tbody>
				<?php
                 $view_invoices_sql="select * from `invoice` order by number DESC";
				 $view_invoices_query=mysql_query($view_invoices_sql);
				 
				 while ($view_invoices_row=mysql_fetch_array($view_invoices_query))
				 { 
					 $invoice_number=$view_invoices_row['number'];
					 $company_name=$view_invoices_row['company_name'];
					 $contract_number=$view_invoices_row['contract_number'];
					 $contract_date=$view_invoices_row['contract_date'];
					 $total_amount=$view_invoices_row['total_amount'];
					 $broker_amount=$view_invoices_row['b_amount'];
				?>
				<tr>
		          <td>SC-<?php echo $invoice_number; ?></td>
				  <td><?php echo $company_name; ?></td>
				  <td><?php echo $contract_number; ?></td>
				  <td><?php echo $contract_date; ?></td>
				  <td><?php echo $total_amount; ?></td>
				  <td><?php echo $broker_amount; ?></td>
				  <td class="btn-group-vertical">
				     <a href="view_invoice.php?invoice_number=<?php echo $invoice_number; ?>" class="btn btn-primary btn-sm"> <i class="fa fa-eye" aria-hidden="true"></i>
						view</a> &nbsp; 
						<a href="edit_invoice.php?invoice_number=<?php echo $invoice_number; ?>" class="btn btn-primary btn-sm"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
Edit</a>  <br>
						<!--a href="delete_invoice.php?invoice_id=<?php echo $invoice_number; ?>" class="btn btn-primary btn-sm"> <i class="fa fa-trash" aria-hidden="true"></i>
Delete</a-->
				  </td>
				</tr>
		   <?php } ?>
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
  $(function () {
    $("#example1").DataTable();
  });
</script>
