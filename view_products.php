<?php include('header.php'); ?>
 
<div class="content-wrapper">
    <section class="content-header">
		  <h1>
					View all Product's
		  </h1>
		  <ol class="breadcrumb">
				<li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="#">Product</a></li>
				<li class="active">View all product's</li>
		  </ol>
    </section>

    <section class="content">
		<div class="row">
			<div class="col-xs-21">
			    <div class="box">
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Id</th>
									<th>Product Name</th>
									<th>Size</th>
									<!--th>Rate</th-->
									<th>Feature</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$a=1;
									$view_products_sql=mysql_query("Select * from product order by id DESC");
									while ($view_products_row=mysql_fetch_array($view_products_sql))
									{
										$id=$view_products_row['id'];
										$products_name=$view_products_row['name'];
										$product_size=$view_products_row['size'];
										$product_rate=$view_products_row['rate'];
										$product_feature=$view_products_row['feature'];
								?>
								<tr>
									<td><?php echo $a; ?></td>
									<td><?php echo $products_name; ?></td>
									<td><?php echo $product_size; ?></td>
									<!--td><?php echo $product_rate; ?></td-->
									<td><?php echo $product_feature; ?></td>
									<td>
										<div class="btn-group-vertical">
											<a href="view_product.php?product_id=<?php echo $id; ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>
											view</a> &nbsp; 
											
											<a href="edit_product.php?product_id=<?php echo $id; ?>" class="btn btn-primary btn-sm"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
											Edit</a> <br>
											
											<a onclick="del_product('<?php echo $id;?>')" class="btn btn-primary btn-sm"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Delete</a>
										</div>
									</td>
								</tr>
							<?php $a++; } ?>
							</tbody>
					    </table>
					</div>
				</div>
			</div>
		</div>
    </section>
</div>
    
<?php include('footer.php'); ?>

<script>
function del_product(product_id)
   {
	 
	var con=confirm("Are you sure to delete it?");
	if(con==true){
	$('.loader').show();
     $.ajax({
		url : 'delete_product.php', 					//Declaration of file, in which we will send the data
		data:"product_id="+product_id,
				success : function(data){
					window.setTimeout(function(){
					$('#vuew_product'+product_id).fadeOut(1000);
				});
					$('.loader').hide();
				}
				
			});
	}
	else{}
   }
   
</script>
