<?php include('header.php'); ?>

<div class="content-wrapper">
    <section class="content-header">
		  <h1>
			    View all Seller's
		  </h1>
		  <ol class="breadcrumb">
				<li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="#">Sellers</a></li>
				<li class="active">View all Seller's</li>
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
										<th>Company Name</th>
										<th>GST No.</th>
										<th>Contact Person</th>
										<th>Email</th>
										<th>Mobile Number</th>
										<th>Address</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
								<?php 
									$a=1;
									$view_sellers_sql=mysql_query("Select * from seller order by id DESC");
									while ($view_sellers_row=mysql_fetch_array($view_sellers_sql))
									{
										
										$id=$view_sellers_row['id'];
										$sellers_name=$view_sellers_row['name'];
										$sellers_bank_name=$view_sellers_row['bank_name'];
										$sellers_acc_number=$view_sellers_row['acc_no'];
										$sellers_vat_number=$view_sellers_row['vat_number'];
										$sellers_contact_person=$view_sellers_row['contact_person'];
										$sellers_email=$view_sellers_row['email'];
										$sellers_mobile_number=$view_sellers_row['mobile_number'];
										$sellers_address=$view_sellers_row['address'];
										$sellers_plant_address=$view_sellers_row['plant_address'];
										$sellers_corres_address=$view_sellers_row['corres_address'];
										$sellers_ware_address=$view_sellers_row['ware_address'];
								?>
									<tr>
										<td><?php echo $a; ?></td>
										<td><?php echo $sellers_name; ?></td>
										<td><?php echo $sellers_vat_number; ?></td>
										<td><?php echo $sellers_contact_person; ?></td>
										<td><?php echo $sellers_email; ?></td>
										<td><?php echo $sellers_mobile_number; ?></td>
										<td><?php echo $sellers_address; ?></td>
										<td class="btn-group-vertical">
											<a href="view_seller.php?seller_id=<?php echo $id; ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>
											view</a> &nbsp; 
											
											<a href="edit_seller.php?seller_id=<?php echo $id; ?>" class="btn btn-primary btn-sm"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					                        Edit</a>  <br>
											
											<a href="delete_seller.php?seller_id=<?php echo $id; ?>" class="btn btn-primary btn-sm"> <i class="fa fa-trash" aria-hidden="true"></i>
					                        Delete</a>
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


