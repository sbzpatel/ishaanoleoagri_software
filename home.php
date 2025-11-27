<?php 
	session_start();
	include_once('header.php') ;

	$username = $_SESSION['username'];
	if(isset($_SESSION['username']) == '')
	{
		header('Location:index.php');
		exit();
	}
?>

<div class="content-wrapper">
    <section class="content-header">
		<h1>Dashboard</h1>
		<ol class="breadcrumb">
			<li><a href="home.php"><i class="fa fa-dashboard"></i>Home</a></li>
			<li class="active">Dashboard</li>
		</ol>
    </section>
	
	<br>

    <section class="content">
        <div class="row" style="margin-left:10px;">
			<section class="col-lg-12 connectedSortable">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="info-box">
							<span class="info-box-icon bg-blue"><i class="ion ion-ios-plus-outline"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Total Seller's</span>
								<span class="info-box-number">
								<?php 
									$sql="select count(id) from seller";
									$query=mysql_query($sql);
									$row=mysql_fetch_array($query);
									echo $row['count(id)'];
								?>
								</span>
							</div>
						</div>
					</div>
					
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="info-box">
							<span class="info-box-icon bg-orange"><i class="ion ion-ios-plus-outline"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Total Buyer's</span>
								<span class="info-box-number">
								<?php 
									$sql = "select count(id) from buyer";
									$query = mysql_query($sql);
									$row = mysql_fetch_array($query);
									echo $row['count(id)'];
								?>
								</span>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="info-box">
							<span class="info-box-icon bg-orange"><i class="ion ion-ios-plus-outline"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Total Product's</span>
								<span class="info-box-number">
								<?php 
									$sql = "select count(id) from product";
									$query = mysql_query($sql);
									$row = mysql_fetch_array($query);
									echo $row['count(id)'];
								?>
							</span>
							</div>
						</div>
					</div>
					
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="info-box">
							<span class="info-box-icon bg-blue"><i class="ion ion-ios-plus-outline"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Total Contract's</span>
								<span class="info-box-number">
								  <?php 
									$sql = "select count(id) from contract";
									$query = mysql_query($sql);
									$row = mysql_fetch_array($query);
									echo $row['count(id)'];
								  ?>
								</span>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="info-box">
							<span class="info-box-icon bg-red"><i class="fa fa-user-plus"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Total Seller Invoice's</span>
								<span class="info-box-number">
								<?php 
									$sql = "select count(number) from seller_invoice";
									$query = mysql_query($sql);
									$row = mysql_fetch_array($query);
									echo $row['count(number)'];
								?>
								</span>
							</div>
						</div>
					</div>
					
					<div class="col-md-6 col-sm-6 col-xs-12">
						  <div class="info-box">
								<span class="info-box-icon bg-yellow"><i class="ion-ios-cloud-upload"></i></span>
								<div class="info-box-content">
									  <span class="info-box-text">Total Paid Invoice's (seller)</span>
									  <span class="info-box-number">
									  <?php $sql11="SELECT * FROM seller_invoice WHERE payment_status='Paid'";
											$query11 = mysql_query($sql11);
											echo $seller_paid_invoices = mysql_num_rows($query11);
											
											?>
									  </span>
								</div>
						  </div>
					</div>
				</div>
					
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						  <div class="info-box">
								<span class="info-box-icon bg-green"><i class="ion ion-ios-plus-outline"></i></span>
								<div class="info-box-content">
									  <span class="info-box-text">Total Buyer Invoice's</span>
									  <span class="info-box-number">
										  <?php $sql="select count(number) from buyer_invoice";
											 $query=mysql_query($sql);
											 $row=mysql_fetch_array($query);
											 echo $row['count(number)'];
										  ?>
									  </span>
								</div>
						  </div>
					</div>
					
					<div class="col-md-6 col-sm-6 col-xs-12">
						  <div class="info-box">
								<span class="info-box-icon bg-green"><i class="ion-ios-cloud-upload"></i></span>
								<div class="info-box-content">
									  <span class="info-box-text">Total Paid Invoice's (Buyer)</span>
									  <span class="info-box-number">
									  <?php $sql11="SELECT * FROM buyer_invoice WHERE payment_status='Paid'";
											$query11 = mysql_query($sql11);
											echo $seller_paid_invoices = mysql_num_rows($query11);
											
											?>
									  </span>
								</div>
						  </div>
					</div>
				</div>
				  
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						  <div class="info-box">
								<span class="info-box-icon bg-orange"><i class="ion ion-ios-bell-outline"></i></span>
								<div class="info-box-content">
									  <span class="info-box-text">Total Invoice's</span>
									  <span class="info-box-number">
											<?php $sql="SELECT  (SELECT COUNT(*) FROM buyer_invoice) + (SELECT COUNT(*) FROM seller_invoice) FROM dual;";
											 $query=mysql_query($sql);
											 $row=mysql_fetch_array($query);
											 echo $row['(SELECT COUNT(*) FROM buyer_invoice) + (SELECT COUNT(*) FROM seller_invoice)'];
											?>
									  </span>
								</div>
						  </div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						  <div class="info-box">
								<span class="info-box-icon bg-yellow"><i class="ion-ios-cloud-upload"></i></span>
								<div class="info-box-content">
									  <span class="info-box-text">Total Paid Invoice's</span>
									  <span class="info-box-number">
									  <?php $sql11="SELECT * FROM seller_invoice WHERE payment_status='Paid'";
											$query11 = mysql_query($sql11);
											$seller_paid_invoices = mysql_num_rows($query11);
											
											
											$sql1="SELECT * FROM buyer_invoice WHERE payment_status='Paid'";
											$query1=mysql_query($sql1);
											$buyer_paid_invoices = mysql_num_rows($query1);
											$buyer_paid_invoices = mysql_num_rows($query1);
											
											echo $total_paid_invoices = $seller_paid_invoices + $buyer_paid_invoices;
											
											?>
									  </span>
								</div>
						  </div>
					</div>
				</div>

				  
				<div class="row">
					<section class="col-lg-12 connectedSortable">
						  <div class="box box-primary">
								<div class="box-header">
									  <span class="ion ion-clipboard"></span>
									  <h3 class="box-title">To Do List</h3>
								</div><!-- /.box-header -->
								<div class="box-body">
									  <ul class="todo-list">
										<?php 
											$sql="select * from todo_list where DATE(time) = CURDATE() order by time desc";
											$result=mysql_query($sql);
											while($rows=mysql_fetch_array($result))
											{	
												$todo=$rows['task'];
												$date=$rows['time'];
												$todo_id=$rows['id'];
												$agenttt_id=$rows['agent_name'];
												$status=$rows['status'];
											?>
											<?php if($status=='block') { ?> <li style="background-color: lightgreen;"> <?php } else { ?>
											<li style="background-color:lightgrey"> <?php } ?>
												<span class="handle">
												</span>
												<input type="checkbox" <?php if($status=='block') { ?> checked <?php } else { ?> unchecked <?php  } ?> class="done_checkbox" value="<?php echo $todo_id;?>" />
										  
										  
												<span class="text"><?php echo $todo;?></span>&nbsp;&nbsp;&nbsp;
												<span style="color:#ffffff;margin-left:18px;"><?php echo $date;?></span>
												<div class="tools">
													<a href="delete_todo.php" id="trash" onClick="del_doto('<?php echo $todo_id;?>')" class="todo-remove"><i id="change" class="fa fa-trash-o 3x"></i></a>
												</div>
											</li>
										<?php } ?>
									  </ul>
								</div>
							<!-- /.box-body -->
							
							<div class="box-footer clearfix no-border">
								<form role="form" class="form-inline" action="insert_todo.php" method="post" enctype="multipart/form-data">       
									<div class="form-group todo-entry">
										<input type="text" placeholder="Enter your ToDo Item"  required class="form-control" name="todo" style="width:100%"><br><br>
									</div>
									<input type="submit" class="btn btn-primary pull-right" name="submit" value="Add item">
								</form>						
							</div>
							
						  </div>
					</section>  
				</div>
			</section>
		<!-- /.content -->
	    </div>
    </section> 
</div>
 
 <?php include('footer.php'); ?>

 <script type="text/javascript">

   function del_doto(todo_id)
   {
	  
	$('.loader').show();
     $.ajax({
		url : 'delete_todo.php', 					//Declaration of file, in which we will send the data
		data:"todo_id="+todo_id,
				success : function(data){
					window.setTimeout(function(){
					//$('#main_cat'+main_cat).fadeOut(1000);
				});
					$('.loader').hide();
				}
				
			});
	
   }
		   $(".done_checkbox").change(function(){
			var id = $(this).val();
			var redirect = "change_status.php?id="+id;
			window.location = redirect;
			});
   </script>