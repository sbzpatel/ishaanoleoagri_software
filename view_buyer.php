<?php include('header.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="view_sellers.php">Buyers</a></li>
        <li class="active">View all Buyer's</li>
        <li class="active">Buyer's Detail</li>
      </ol>
    </section>

    <br><br>

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Buyer's Detail
            
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
     
     <?php
        $buyer_id=$_GET['buyer_id'];
		$view_buyer_sql="select * from buyer where id='$buyer_id'";
		$view_buyer_query=mysql_query($view_buyer_sql);
		$view_buyer_row=mysql_fetch_array($view_buyer_query);
		
	 ?>
     
     
     

      <div class="row">
        <!-- accepted payments column -->
        
        <!-- /.col -->
        <div class="col-xs-6">
          

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Buyer Name</th>
                <td><?php echo $view_buyer_row['name'];?></td>
              </tr>
              <tr>
                <th>GST Number</th>
                <td><?php echo $view_buyer_row['vat_number'];?></td>
              </tr>
              <tr>
                <th>Contact Person</th>
                <td><?php echo $view_buyer_row['contact_person'];?></td>
              </tr>
			  <tr>
                <th>Email Id</th>
                <td><?php echo $view_buyer_row['email'];?></td>
              </tr>
			  <tr>
                <th>Mobile Number</th>
                <td><?php echo $view_buyer_row['mobile_number'];?></td>
              </tr>
			  <tr>
                <th>City</th>
                <td><?php echo $view_buyer_row['city'];?></td>
              </tr>
			  <tr>
                <th>State</th>
                <td><?php echo $view_buyer_row['state'];?></td>
              </tr>
			  <tr>
                <th>Address</th>
                <td><?php echo $view_buyer_row['address'];?></td>
              </tr>
			  <tr>
                <th>Plant Address</th>
                <td><?php echo $view_buyer_row['plant_address'];?></td>
              </tr>
			  <tr>
                <th>Correspondence Address</th>
                <td><?php echo $view_buyer_row['corres_address'];?></td>
              </tr>
			  <tr>
                <th>Warehouse Address</th>
                <td><?php echo $view_buyer_row['ware_address'];?></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      
    </section>

    <!-- /.content -->
    <div class="clearfix"></div>
  </div>

<?php include('footer.php'); ?>
