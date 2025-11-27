<?php include('header.php'); ?>

<div class="content-wrapper">
    <section class="content-header">
		  <h1>
			View all Buyer's
		  </h1>
		  <ol class="breadcrumb">
				<li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="#">Buyers</a></li>
				<li class="active">View all Buyers</li>
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
									$view_buyers_sql=mysql_query("Select * from buyer order by id DESC");
									while ($view_buyers_row=mysql_fetch_array($view_buyers_sql))
									{
										
										$id=$view_buyers_row['id'];
										$buyers_name=$view_buyers_row['name'];
										$buyers_vat_number=$view_buyers_row['vat_number'];
										$buyers_contact_person=$view_buyers_row['contact_person'];
										$buyers_email=$view_buyers_row['email'];
										$buyers_mobile_number=$view_buyers_row['mobile_number'];
										$buyers_address=$view_buyers_row['address'];
										$buyers_plant_address=$view_buyers_row['plant_address'];
										$buyers_corres_address=$view_buyers_row['corres_address'];
										$buyers_ware_address=$view_buyers_row['ware_address'];
								?>
								<tr>
									<td><?php echo $a; ?></td>
									<td><?php echo $buyers_name; ?></td>
									<td><?php echo $buyers_vat_number; ?></td>
									<td><?php echo $buyers_contact_person; ?></td>
									<td><?php echo $buyers_email; ?></td>
									<td><?php echo $buyers_mobile_number; ?></td>
									<td><?php echo $buyers_address; ?></td>
									<td class="btn-group-vertical">
										<a href="view_buyer.php?buyer_id=<?php echo $id; ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>
										view</a> &nbsp; 
										
										<a href="edit_buyer.php?buyer_id=<?php echo $id; ?>" class="btn btn-primary btn-sm"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
				                        Edit</a>  <br>
										
										<a href="delete_buyer.php?buyer_id=<?php echo $id; ?>" class="btn btn-primary btn-sm"> <i class="fa fa-trash" aria-hidden="true"></i>
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
 
