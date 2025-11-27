<?php include('header.php'); 

	$user_id = $_GET['user_id'];
	$sql = "select * from admin where id='$user_id'";
	$query = mysql_query($sql);
	$row = mysql_fetch_array($query);
	$mobile = $row['mobile'];
	$email = $row['email'];
	$username = $row['username'];
	$password = $row['password'];
	$admin_role = $row['admin_role'];
	//exit;
	$status = $row['status'];
	$user_rights = $row['user_rights'];
	$user_rights_array = explode(",",$user_rights);

?>

<div class="content-wrapper">
    <section class="content-header">
		  <ol class="breadcrumb">
				<li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="#">User's</a></li>
				<li class="active">New User's</li>
		  </ol>
    </section><!--content-header-->
	
    <section class="content">
		<div class="row">
			<div class="col-md-6">
				<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Add New User's</h3>
				</div>

				<form role="form" action="user_edit.php" method="post">
					<div class="box-body">
						
						<div class="form-group">
							<label>Enter User Name</label> 
							<input class="form-control" required type="text" name="userName" id="userName" placeholder="Enter User Name" oninput="checkforavailability1(document.frm.userName.value)" value="<?php echo $username; ?>" />
							<input type="hidden" name="user_id" value="<?php echo $user_id?>" >
							
								<div id="negative"  style="display:none; color:#f19c4f;"> User Name Already Exist.</div>
								<div id="positive" style="display:none;  color:#000;"> User Name Available.</div>
						</div>
						
						<div class="form-group">
							<label>Enter Email</label> 
							<input class="form-control"  required type="email" name="emailId" id="emailId" placeholder="Enter Email Id" oninput="checkforavailability2(document.frm.emailId.value)"; value="<?php echo $email; ?>" />
							
								<div id="negative1"  style="display:none; color:#f19c4f;"> Email Id Already Exist.</div>
								<div id="positive1" style="display:none;  color:#000;"> Email Id Available.</div>
						</div>
						
						<div class="form-group">
							<label>Enter Mobile No.</label> 
							<input type="text" placeholder="Enter Mobile No." id="mobileNo" name="mobileNo" class="form-control" required value="<?php echo $mobile; ?>" >
						</div>
						
						<div class="form-group">
							<label>Enter Password</label> 
							<input type="text" placeholder="Enter Password" id="password" name="password" class="form-control" required value="<?php echo $password; ?>" >
						</div>
						
						<div class="form-group">
							<label>User Rights</label>
							<div>
								<input name="user_rights[]" type="checkbox" value="sellers" <?php if(in_array("sellers",$user_rights_array)){ echo "checked"; }?> <?php if($admin_role == 'super_admin') { echo "disabled"; }?>/> sellers<br>
								
								<input  name="user_rights[]" type="checkbox" value="Buyers" value="sellers" <?php if(in_array("Buyers",$user_rights_array)){ echo "checked"; }?> <?php if($admin_role == 'super_admin') { echo "disabled"; }?>/> Buyers<br>
								
								<input name="user_rights[]" type="checkbox" value="Products" <?php if(in_array("Products",$user_rights_array)){ echo "checked"; }?> <?php if($admin_role == 'super_admin') { echo "disabled"; }?>/> Products<br>
								
								<input  name="user_rights[]" type="checkbox" value="Contracts" <?php if(in_array("Contracts",$user_rights_array)){ echo "checked"; }?> <?php if($admin_role == 'super_admin') { echo "disabled"; }?>/> Contracts<br>
								
								<input  name="user_rights[]" type="checkbox" value="Invoices" <?php if(in_array("Invoices",$user_rights_array)){ echo "checked"; }?> <?php if($admin_role == 'super_admin') { echo "disabled"; }?>/> Invoices<br>
								
								<input  name="user_rights[]" type="checkbox" value="Payments" <?php if(in_array("Payments",$user_rights_array)){ echo "checked"; }?> <?php if($admin_role == 'super_admin') { echo "disabled"; }?>/> Payments<br>
								
								<input  name="user_rights[]" type="checkbox" value="Reports" <?php if(in_array("Reports",$user_rights_array)){ echo "checked"; }?> <?php if($admin_role == 'super_admin') { echo "disabled"; }?>/> Reports<br>
							</div>
						</div>
				    </div>
					<div class="box-footer">
						<button type="submit" class="btn btn-primary" name="submit"><i class="fa fa-upload"> SUBMIT</i> </button>
					</div>
				</form>
			    </div>
			</div>
		</div>
	</section>
</div>

<?php include('footer.php');?>
