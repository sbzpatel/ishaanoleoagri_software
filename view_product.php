<?php include('header.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="view_sellers.php">Products</a></li>
        <li class="active">View all Product's</li>
        <li class="active">Product's Detail</li>
      </ol>
    </section>

    <br><br>

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Product's Detail
            
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
     
     <?php
        $product_id=$_GET['product_id'];
		$view_product_sql="select * from product where id='$product_id'";
		$view_product_query=mysql_query($view_product_sql);
		$view_product_row=mysql_fetch_array($view_product_query);
		
	 ?>
     
     
     

      <div class="row">
        <!-- accepted payments column -->
        
        <!-- /.col -->
        <div class="col-xs-6">
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Product Name</th>
                <td><?php echo $view_product_row['name'];?></td>
              </tr>
              
              <tr>
                <th>Product Size</th>
                <td><?php echo $view_product_row['size'];?></td>
              </tr>
              <!--tr>
                <th>Product Rate</th>
                <td><?php echo $view_product_row['rate'];?></td>
              </tr-->
              <tr>
                <th>Product Image</th>
				<td><a href="images/<?php echo $view_product_row['img_name']; ?>"><img src="images/<?php echo $view_product_row['img_name']; ?>" alt="product image" target="_blank" style="height:150px; width:150px"></a></td>
              </tr>
			  <tr>
                <th>Product Feature</th>
                <td><?php echo $view_product_row['feature'];?></td>
              </tr>
			  <!--tr>
                <th>Product Percentage</th>
                <td><?php echo $view_product_row['percentage'];?></td>
              </tr-->
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
