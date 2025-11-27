<?php include('header.php'); ?>

<div class="content-wrapper">
    <section class="content-header">
		  <ol class="breadcrumb">
				<li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="#">Products</a></li>
				<li class="active">New Product</li>
		  </ol>
    </section>
    
    <section class="content">
        <div class="row">
			<div class="col-md-6">
			    <div class="box box-primary">
					<div class="box-header with-border">
					  <h3 class="box-title">Add New Product</h3>
					</div>
       
					<form role="form" action="product_add.php" method="post" enctype="multipart/form-data">
						  <div class="box-body">
								<div class="form-group">
									  <label for="exampleInputEmail1">Product Name</label>
									  <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter Product Name" required="required">
								</div>
							
								<div class="form-group">
									  <label for="exampleInputPassword1">Product Image</label>
									  <input type="file" id="product_image" name="product_image">
								</div>
								
								<div class="form-group">
									  <label for="exampleInputPassword1">Product Size</label>
									  <input type="text" class="form-control" id="product_size" name="product_size" placeholder="Enter Product Size" required="required">
								</div>
								
								<!--div class="form-group">
									  <label for="exampleInputPassword1">Product Rate</label>
									  <input type="number" class="form-control" id="product_rate" name="product_rate" placeholder="Enter Product Rate" required="required">
								</div-->
								
								<div class="form-group">
									  <label for="exampleInputPassword1">Product Feature</label><br>
									  <textarea name="product_feature" class="form-control" rows="3" placeholder="Enter Product Feature"></textarea>
								</div>
								
								<!--div class="form-group">
									  <label for="exampleInputPassword1">Product Percentage</label>
									  <input type="number" class="form-control" id="product_percentage" name="product_percentage" placeholder="Percentage in %" required="required">
								</div-->
							
						  </div>
						  <div class="box-footer">
							   <button type="submit" class="btn btn-primary" name="submit"><i class="fa fa-upload"> SUBMIT</i> </button>
						  </div>
					</form>
                </div>
            </div>
        </div>
</div>

<?php include('footer.php');?>
  
  
 

