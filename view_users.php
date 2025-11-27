<?php include('header.php'); ?>
 
<div class="content-wrapper">
    <section class="content-header">
		  <h1>
					View all User's
		  </h1>
		  <ol class="breadcrumb">
				<li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="#">User's</a></li>
				<li class="active">View all User's</li>
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
									<th>User Name</th>
									<th>User Password</th>
									<th>User Role</th>
									<th>User Rights</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$a=1;
									$view_products_sql=mysql_query("Select * from admin order by id ASC");
									while ($view_products_row=mysql_fetch_array($view_products_sql))
									{
										$id=$view_products_row['id'];
										$mobile=$view_products_row['mobile'];
										$email=$view_products_row['email'];
										$username=$view_products_row['username'];
										$password=$view_products_row['password'];
										$admin_role=$view_products_row['admin_role'];
										$status=$view_products_row['status'];
										$user_rights=$view_products_row['user_rights'];
								?>
								<tr id="view_user<?php echo $id; ?>" class="gradeX">
									<td><?php echo $a; ?></td>
									<td><?php echo $username; ?></td>
									<td><?php echo $password; ?></td>
									<td><?php echo $admin_role; ?></td>
									<td><?php echo $user_rights; ?></td>
									<td>
										<div class="btn-group-vertical">
											<a href="edit_user.php?user_id=<?php echo $id; ?>" class="btn btn-primary btn-sm"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
											Edit</a> <br>
											
											<a onclick="del_user('<?php echo $id;?>')" class="btn btn-primary btn-sm"> <i class="fa fa-recycle" aria-hidden="true"></i>Delete</a>
											
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
function del_user(id)
   {
	 
	var con=confirm("Are you sure to delete it?");
	if(con==true){
	$('.loader').show();
     $.ajax({
		url : 'delete_user.php', 					//Declaration of file, in which we will send the data
		data:"id="+id,
				success : function(data){
					window.setTimeout(function(){
					$('#view_user'+id).fadeOut(1000);
				});
					$('.loader').hide();
				}
				
			});
	}
	else{}
   }
   
</script>