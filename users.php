<?php include('header.php'); ?>

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

				<form role="form" action="user_add.php" method="post">
					<div class="box-body">
						
						<div class="form-group">
							<label>Enter User Name</label> 
							<input class="form-control" required type="text" name="userName" id="userName" placeholder="Enter User Name" oninput="checkforavailability1(document.frm.userName.value)" />
							
								<div id="negative"  style="display:none; color:#f19c4f;"> User Name Already Exist.</div>
								<div id="positive" style="display:none;  color:#000;"> User Name Available.</div>
						</div>
						
						<div class="form-group">
							<label>Enter Email</label> 
							<input class="form-control"  required type="email" name="emailId" id="emailId" placeholder="Enter Email Id" oninput="checkforavailability2(document.frm.emailId.value)"; />
							
								<div id="negative1"  style="display:none; color:#f19c4f;"> Email Id Already Exist.</div>
								<div id="positive1" style="display:none;  color:#000;"> Email Id Available.</div>
						</div>
						
						<div class="form-group">
							<label>Enter Mobile No.</label> 
							<input type="text" placeholder="Enter Mobile No." id="mobileNo" name="mobileNo" class="form-control" required>
						</div>
						
						<div class="form-group">
							<label>Enter Password</label> 
							<input type="text" placeholder="Enter Password" id="password" name="password" class="form-control" required>
						</div>
						
						<div class="form-group">
							<label>User Rights</label>
							<div>
								<input name="user_rights[]" type="checkbox" value="sellers"/> sellers<br>
								<input  name="user_rights[]" type="checkbox" value="Buyers"/> Buyers<br>
								<input name="user_rights[]" type="checkbox" value="Products"/> Products<br>
								<input  name="user_rights[]" type="checkbox" value="Contracts"/> Contracts<br>
								<input  name="user_rights[]" type="checkbox" value="Invoices"/> Invoices<br>
								<input  name="user_rights[]" type="checkbox" value="Payments"/> Payments<br>
								<input  name="user_rights[]" type="checkbox" value="Reports"/> Reports<br>
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
