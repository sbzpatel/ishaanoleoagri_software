<?php include('header.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="view_buyers.php">Products</a></li>
        <li class="active">View all Product's</li>
        <li class="active">Edit Product's Detail</li>
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
              <h3 class="box-title">Edit Product's Detail</h3>
            </div>
            <!-- /.box-header -->
            <?php
			$product_id=$_GET['product_id'];
            $edit_sql="select * from product where id='$product_id'";
			$edit_query=mysql_query($edit_sql);
			$edit_row=mysql_fetch_array($edit_query);
			
			$product_name=$edit_row['name'];
			$product_image=$edit_row['img_name'];
	        $product_size=$edit_row['size'];
	        $product_rate=$edit_row['rate'];
	        $product_feature=$edit_row['feature'];
			$product_percentage=$edit_row['percentage'];
			?>
            
            
            
            
            <!-- form start -->
            <form role="form" action="product_edit.php" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Product Name</label>
                  <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter Product Name" value="<?php echo $product_name; ?>" required="required">
				  <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                </div>
				
				<div class="form-group">
				<label class="">Product Image </label><br>
					<input type="hidden" name="modify"  value="0" id="modify" />
					<img src="images/<?php echo $product_image; ?>" width="80" height="80" />
					<span id="hide_img" style="display:none;">	
						<label for="exampleInputFile2" class="control-label"></label>
						<div class="">
						<input type="file" id="exampleInputFile2" name="product_image"> 
						<a onclick="close_img()" class="finish btn btn-info btn-extend" > Cancel</a>	
						</div>
					</span>
					<br>
					<span  id="show_img">										
					
					<div class="">										
						<input  class="form-control" name="product_image_name" type="hidden" value="<?php echo $product_image; ?>" />
						<a onclick="open_img()" class="finish btn btn-info btn-extend" > Edit</a>
					</div>
					</span>
				</div>
				
                <div class="form-group">
                  <label for="exampleInputPassword1">Product Size</label>
                  <input type="text" class="form-control" id="product_size" name="product_size" placeholder="Enter Product Size" value="<?php echo $product_size; ?>" required="required">
                </div>
				
				<!--div class="form-group">
                  <label for="exampleInputPassword1">Product Rate</label>
                  <input type="number" class="form-control" id="product_rate" name="product_rate" placeholder="Enter Product Rate" value="<?php echo $product_rate; ?>" required="required">
                </div-->
				
				
				
				<div class="form-group">
                  <label for="exampleInputPassword1">Product Feature</label><br>
                  <textarea name="product_feature" class="form-control" cols="75" rows="4" placeholder="Enter Product Feature"
				  ><?php echo $product_feature; ?></textarea>
                </div>
				
				<!--div class="form-group">
                  <label for="exampleInputPassword1">Product Percentage</label><br>
                  <input type="number" class="form-control" id="product_percentage" name="product_percentage" placeholder="Percentage in %" value="<?php echo $product_percentage; ?>" required="required">
                </div-->
                
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
  
  <script type="text/javascript">
  function open_img()
{
	$('#show_img').css('display','none');
	$('#hide_img').css('display','');
	document.getElementById('modify').value=1;
	
}

function close_img()
{
	$('#show_img').css('display','');
	$('#hide_img').css('display','none');
	document.getElementById('modify').value=0;
	
}

   </script>
