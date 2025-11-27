<?php include('header.php'); ?>


<div class="content-wrapper">
    <section class="content-header">
		  <h1>
				View all Contract's
		  </h1>
		  <ol class="breadcrumb">
				<li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="#">Contract</a></li>
				<li class="active">View all Contracts</li>
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
									  <th>No.</th>
									  <th>Contract No.</th>
									  <th>Contract Date</th>
									  <th>Seller Name</th>
									  <th>Buyer Name</th>
									  <th>Delivery Place</th>
									  <th>Start Delivery Date</th>
									  <th>Upto Delivery Date</th>
									  <th>Payment Mode</th>
									  <th>Actions</th>
								</tr>
							</thead>
							<tbody>
							<?php 
							$a=1;
							$view_contracts_sql=mysql_query("SELECT * from contract order by id DESC");
								while($view_contracts_row=mysql_fetch_array($view_contracts_sql))
								{
									$contract_id=$view_contracts_row['id'];
									$contract_date=$view_contracts_row['date'];
									$seller_id=$view_contracts_row['seller_name'];
									$buyer_id=$view_contracts_row['buyer_name'];
									$deliver_place=$view_contracts_row['deliver_place'];
									$start_deliver_date=$view_contracts_row['start_deliver_date'];
									$upto_deliver_date=$view_contracts_row['upto_deliver_date'];
									$payment_mode=$view_contracts_row['payment_mode'];
								?>
							<tr>
								<td><?php echo $a; ?></td>
								<td>CN-<?php echo $contract_id; ?></td>
								<td><?php echo $contract_date; ?></td>
								<td>
											 <?php 
												$seller_name_sql=mysql_query("select * from seller where id='$seller_id'");
												$seller_name_row=mysql_fetch_array($seller_name_sql);
												$seller_name=$seller_name_row['name'];
												echo $seller_name;
											 ?>
								</td>
								<td>
											<?php 
												$buyer_name_sql=mysql_query("select * from buyer where id='$buyer_id'");
												$buyer_name_row=mysql_fetch_array($buyer_name_sql);
												$buyer_name=$buyer_name_row['name'];
												echo $buyer_name;
											 ?>
								</td>
								<td><?php echo $deliver_place; ?></td>
								<td><?php echo $start_deliver_date; ?></td>
								<td><?php echo $upto_deliver_date; ?></td>
								<td> 
												<?php 
												$payment_mode_sql=mysql_query("select * from payment_mode where id='$payment_mode'");
												$payment_mode_row=mysql_fetch_array($payment_mode_sql);
												$payment_status_name=$payment_mode_row['type'];
												echo $payment_status_name;
											 ?>
												
								
								</td>
								<td class="btn-group-vertical">
									<a href="view_contract_details.php?contract_id=<?php echo $contract_id; ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>
									view</a> &nbsp; 
									
									<a href="edit_contract.php?contract_id=<?php echo $contract_id; ?>" class="btn btn-primary btn-sm"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
									Edit</a>  <br>
									<?php if($user_role == 'super_admin') { ?>
									<a onclick="del_contract('<?php echo $contract_id;?>')" class="btn btn-primary btn-sm"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Delete</a>
								<?php } ?>
								</td>

							</tr>
							<?php $a++; } ?>
							</tbody>
						</table>
					</div><!--box-body-->
				</div><!--box-->
			</div><!--col-xs-21-->
		</div><!--row-->
    </section><!--content-->
</div>
  
<?php include('footer.php'); ?>

<script>
function del_contract(contract_id)
   {
	 
	var con=confirm("Are you sure to delete it?");
	if(con==true){
	$('.loader').show();
     $.ajax({
		url : 'delete_contract.php', 					//Declaration of file, in which we will send the data
		data:"contract_id="+contract_id,
				success : function(data){
					window.setTimeout(function(){
					$('#view_contract'+contract_id).fadeOut(1000);
				});
					$('.loader').hide();
				}
				
			});
	}
	else{}
   }
   
</script>
 