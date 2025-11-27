<?php 
		require('libs/library_fnc.php');
		session_start();

		$username=$_SESSION['username'];
		$userid=$_SESSION['id'];
		$user_role = $_SESSION['admin_role'];
		//exit;
		if(isset($_SESSION['username'])=='')
		{
			header('Location:index.php');
			exit();
		}

		$request_url = str_replace($_SERVER['QUERY_STRING'],'',$_SERVER['REQUEST_URI']);
		$_SERVER['QUERY_STRING'];
		$full_url = $_SERVER['PHP_SELF'];
		//echo "<br>";
		$page_name = substr($full_url,6);
// if($request_url == '/kdc/doctor.php' and $userrole !== 'admin') {              //all doctor view page
	// header('Location:home.php');
	// exit();
// }

// if($request_url == '/kdc/add-doctor.php' and $userrole !== 'admin') {          //add doctor page
	// header('Location:home.php');
	// exit();
// }

// if($request_url == '/kdc/doctor_view.php' and $userrole !== 'admin') {          //doctor view page
	// header('Location:home.php');
	// exit();
// }

// if($request_url == '/kdc/edit_doctor.php' and $userrole !== 'admin') {           //edit doctor page
	// header('Location:home.php');
	// exit();
// }

// if($request_url == '/kdc/delete_doctor.php' and $userrole !== 'admin') {         //delete doctor page
	// header('Location:home.php');
	// exit();
// }






// if($request_url == '/kdc/product.php' and $userrole !== 'admin') {              //all product view page
	// header('Location:home.php');
	// exit();
// }

// if($request_url == '/kdc/add-product.php' and $userrole !== 'admin') {           //add products page
	// header('Location:home.php');
	// exit();
// }

// if($request_url == '/kdc/product_view.php' and $userrole !== 'admin') {          //product view page
	// header('Location:home.php');
	// exit();
// }

// if($request_url == '/kdc/edit_product.php' and $userrole !== 'admin') {           //edit product page
	// header('Location:home.php');
	// exit();
// }

// if($request_url == '/kdc/delete_product.php' and $userrole !== 'admin') {         //delete product page
	// header('Location:home.php');
	// exit();
// }




// if($request_url == '/kdc/agent.php' and $userrole !== 'admin') {               //all agents view page
	// header('Location:home.php');
	// exit();
// }	

// if($request_url == '/kdc/add-agent.php' and $userrole !== 'admin') {            //add agentspage
	// header('Location:home.php');
	// exit();
// }

// if($request_url == '/kdc/agent_view.php' and $userrole !== 'admin') {            //agent view page
	// header('Location:home.php');
	// exit();
// }

// if($request_url == '/kdc/edit_agent.php' and $userrole !== 'admin') {             //edit agent page
	// header('Location:home.php');
	// exit();
// }

// if($request_url == '/kdc/delete_agent.php' and $userrole !== 'admin') {            //delete agent page
	// header('Location:home.php');
	// exit();
// }

// if($request_url == '/kdc/report_order.php' and $userrole !== 'admin') {            //report order
	// header('Location:home.php');
	// exit();
// }

// if($request_url == '/kdc/report_product.php' and $userrole !== 'admin') {            //report product
	// header('Location:home.php');
	// exit();
// }

?>

<!DOCTYPE html>
<html>
		<head>
		  <meta charset="utf-8">
		  <meta http-equiv="X-UA-Compatible" content="IE=edge">
		  <style>
				  #trash {
				  color:#ffffff;
				  
				  }
				  #trash:hover {
				   color:#ff0000;
				  }
				  
				  .hiddenField
				  {
					  display: none;
				  }
		  </style>
		  <title>Ishaan Oleo & Agri Resources</title>
		  <!-- Tell the browser to be responsive to screen width -->
		  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		  <!-- Bootstrap 3.3.6 -->
		  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		  <!-- Font Awesome -->
		  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
		  <!-- Ionicons -->
		  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
		   <!-- fullCalendar 2.2.5-->
		  <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.min.css">
		  <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.print.css" media="print">
		  <!-- Theme style -->
		  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
		  <!-- AdminLTE Skins. Choose a skin from the css/skins
			   folder instead of downloading all of them to reduce the load. -->
		  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
		  
		  <link rel="stylesheet" href="plugins/datepicker/bootstrap-datepicker.min.js">
		  <!-- Date Picker -->
		  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
		  <!-- bootstrap wysihtml5 - text editor -->
		  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
		 
		  <!-- iCheck for checkboxes and radio inputs -->
		  <link rel="stylesheet" href="plugins/iCheck/all.css">
		  
		  <!-- Select2 -->
		  <link rel="stylesheet" href="plugins/select2/select2.min.css">
		  <!-- Bootstrap time Picker -->
		  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
		  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
		</head>
<body class="hold-transition skin-blue sidebar-mini" style="color:black;">
<div class="wrapper">

    <header class="main-header">
    <!-- Logo -->
		<a href="index.php" class="logo">
			  <!-- mini logo for sidebar mini 50x50 pixels -->
			  <span class="logo-mini"><img src="dist/img/logo-half.png"/></span>
			  <!-- logo for regular state and mobile devices -->
			  <span class="logo-lg"><img src="dist/img/logo.png" width="200px" height="auto"/></span>
		</a>
    <!-- Header Navbar: style can be found in header.less -->
		<nav class="navbar navbar-static-top">
		  <!-- Sidebar toggle button-->
			  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
			  </a>

			  <div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
					  <!-- User Account: style can be found in dropdown.less -->
						  <li class="dropdown user user-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<?php if($userrole=='admin')
								{
								   $file_route='admin.png';
								}
								else
								{
								   $file_route='agent.png';
								}
								?>
									  <img src="dist/img/<?php echo $file_route ?>" class="user-image" alt="User Image">
									  <span class="hidden-xs"><?php echo $username; ?></span>
								</a>
								<ul class="dropdown-menu">
								  <!-- User image -->
									  <!--li class="user-header">
											<img src="dist/img/<?php echo $file_route ?>" class="img-circle" alt="User Image">
											<p>
											  <?php 
											  $sqql="select name from admin where id='$userid'";
											  $qquery = mysql_query($sqql);
											  $result = mysql_fetch_array($qquery);
											  $name=$result['name'];
											  echo $name;  
																						
											  ?>
											</p>
									  </li>
								  <!-- Menu Footer-->
								</ul>
						  </li>
					  <!-- Control Sidebar Toggle Button -->

					</ul>
			  </div>
		</nav>
	</header>
	
	<aside class="main-sidebar">
		<section class="sidebar">
			  <form action="#" method="get" class="sidebar-form">
				
			  </form>
		 
			  <ul class="sidebar-menu">
					<li class="treeview">
						  <a href="home.php">
							<i class="fa fa-dashboard"></i> <span>Dashboard</span>
						  </a>
					</li>
					
					<?php if($user_role == 'super_admin') { ?>
				
				
				
				<li class="treeview">
					  <a href="#">
							<i class="fa fa-users"></i> <span>Sellers</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
					  </a>
					  <ul class="treeview-menu">
							<li class="active"><a href="new_seller.php"><i class="fa fa-user-plus"></i>New Seller</a></li>
							<li><a href="view_sellers.php"><i class="fa fa-eye"></i> View All Sellers</a></li>
					  </ul>
				</li>
				
				<li class="treeview">
					  <a href="">
							<i class="fa fa-users"></i> <span>Buyers</span>
							<span class="pull-right-container">
							  <i class="fa fa-angle-left pull-right"></i>
							</span>
					  </a>
					  <ul class="treeview-menu">
							<li class="active"><a href="new_buyer.php"><i class="fa fa-user-plus"></i>New Buyer</a></li>
							<li><a href="view_buyers.php"><i class="fa fa-eye"></i> View All Buyers</a></li>
					  </ul>
				</li>
				
				<li class="treeview">
					  <a href="#">
							<i class="fa fa-cubes"></i> <span>Products</span>
							<span class="pull-right-container">
							  <i class="fa fa-angle-left pull-right"></i>
							</span>
					  </a>
					  <ul class="treeview-menu">
							<li class="active"><a href="new_product.php"><i class="fa fa-plus"></i>New Product</a></li>
							<li><a href="view_products.php"><i class="fa fa-eye"></i> View All Products</a></li>
					  </ul>
				</li>
			   
				<li class="treeview">
					  <a href="#">
							<i class="fa fa-briefcase"></i> <span>Contracts</span>
							<span class="pull-right-container">
							  <i class="fa fa-angle-left pull-right"></i>
							</span>
					  </a>
					  <ul class="treeview-menu">
							<li class="active"><a href="new_contract.php"><i class="fa fa-plus"></i>New Contract</a></li>
							<li><a href="view_contracts.php"><i class="fa fa-eye"></i> View All Contracts</a></li>
					  </ul>
				</li>
				
				
				<li class="treeview">
					  <a href="#">
							<i class="fa fa-file-text"></i> <span>Invoices</span>
							<span class="pull-right-container">
							  <i class="fa fa-angle-left pull-right"></i>
							</span>
					  </a>
					  <ul class="treeview-menu">
							<li class="active"><a href="new_invoice_seller.php"><i class="fa fa-plus-square"></i>Create Invoice (Seller)</a></li>
							<li><a href="view_invoices_seller.php"><i class="fa fa-eye"></i> View All Invoices (Seller)</a></li>

							<li class="active"><a href="new_invoice_buyer.php"><i class="fa fa-plus-square"></i>Create Invoice (Buyer)</a></li>
							<li><a href="view_invoices_buyer.php"><i class="fa fa-eye"></i> View All Invoices (Buyer)</a></li>
					  </ul>
				</li>
				
				<li class="treeview">
					  <a href="#">
							<i class="fa fa-money"></i> <span>Payments</span>
							<span class="pull-right-container">
							  <i class="fa fa-angle-left pull-right"></i>
							</span>
					  </a>
					  <ul class="treeview-menu">
							<li class="active"><a href="payment_status_sellers.php"><i class="fa fa-line-chart"></i>Seller's Payment</a></li>
							<li><a href="payment_status_buyers.php"><i class="fa fa-line-chart"></i> Buyer's Payment</a></li>
					  </ul>
				</li>
			
			
				<li class="treeview">
					  <a href="#">
							<i class="fa fa-pie-chart"></i> <span>Reports</span>
							<span class="pull-right-container">
							  <i class="fa fa-angle-left pull-right"></i>
							</span>
					  </a>
					  <ul class="treeview-menu">
							<li class="active"><a href="sellers_invoice_report.php"><i class="fa fa-line-chart"></i>Seller's Invoice Report</a></li>
							<li><a href="buyers_invoice_report.php"><i class="fa fa-line-chart"></i> Buyer's Invoice Report</a></li>
							<li><a href="contracts_report.php"><i class="fa fa-line-chart"></i> Contract's Report</a></li>
					  </ul>
				</li>
				
				<li class="treeview">
					  <a href="#">
						<i class="fa fa-user"></i><span>User's</span>
						<span class="pull-right-container">
						  <i class="fa fa-angle-left pull-right"></i>
						</span>
					  </a>
					  <ul class="treeview-menu">
							<li class="active"><a href="users.php"><i class="fa fa-line-chart"></i>Add User</a></li>
							<li><a href="view_users.php"><i class="fa fa-line-chart"></i> View User's</a></li>
					  </ul>
				</li>
				
				<?php } else { 
				//echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
					$sql ="select user_rights from admin where admin_role='$user_role'";
					//exit;
					$query = mysql_query($sql);
					$data = mysql_fetch_assoc($query);
					$user_rights = explode(',',$data['user_rights']);
				?>
				<?php if(in_array('sellers',$user_rights)){ ?>
				<li class="treeview">
					  <a href="#">
							<i class="fa fa-users"></i> <span>Sellers</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
					  </a>
					  <ul class="treeview-menu">
							<li class="active"><a href="new_seller.php"><i class="fa fa-user-plus"></i>New Seller</a></li>
							<li><a href="view_sellers.php"><i class="fa fa-eye"></i> View All Sellers</a></li>
					  </ul>
				</li>
				<?php } ?>
				
				<?php if(in_array('Buyers',$user_rights)){ ?>
				<li class="treeview">
					  <a href="">
							<i class="fa fa-users"></i> <span>Buyers</span>
							<span class="pull-right-container">
							  <i class="fa fa-angle-left pull-right"></i>
							</span>
					  </a>
					  <ul class="treeview-menu">
							<li class="active"><a href="new_buyer.php"><i class="fa fa-user-plus"></i>New Buyer</a></li>
							<li><a href="view_buyers.php"><i class="fa fa-eye"></i> View All Buyers</a></li>
					  </ul>
				</li>
				<?php } ?>
				
				<?php if(in_array('Products',$user_rights)){ ?>
				<li class="treeview">
					  <a href="#">
							<i class="fa fa-cubes"></i> <span>Products</span>
							<span class="pull-right-container">
							  <i class="fa fa-angle-left pull-right"></i>
							</span>
					  </a>
					  <ul class="treeview-menu">
							<li class="active"><a href="new_product.php"><i class="fa fa-plus"></i>New Product</a></li>
							<li><a href="view_products.php"><i class="fa fa-eye"></i> View All Products</a></li>
					  </ul>
				</li>
				<?php } ?>
				
				<?php if(in_array('Contracts',$user_rights)){ ?>
				<li class="treeview">
					  <a href="#">
							<i class="fa fa-briefcase"></i> <span>Contracts</span>
							<span class="pull-right-container">
							  <i class="fa fa-angle-left pull-right"></i>
							</span>
					  </a>
					  <ul class="treeview-menu">
							<li class="active"><a href="new_contract.php"><i class="fa fa-plus"></i>New Contract</a></li>
							<li><a href="view_contracts.php"><i class="fa fa-eye"></i> View All Contracts</a></li>
					  </ul>
				</li>
				<?php } ?>
				
				<?php if(in_array('Invoices',$user_rights)){ ?>
				<li class="treeview">
					  <a href="#">
							<i class="fa fa-file-text"></i> <span>Invoices</span>
							<span class="pull-right-container">
							  <i class="fa fa-angle-left pull-right"></i>
							</span>
					  </a>
					  <ul class="treeview-menu">
							<li class="active"><a href="new_invoice_seller.php"><i class="fa fa-plus-square"></i>Create Invoice (Seller)</a></li>
							<li><a href="view_invoices_seller.php"><i class="fa fa-eye"></i> View All Invoices (Seller)</a></li>

							<li class="active"><a href="new_invoice_buyer.php"><i class="fa fa-plus-square"></i>Create Invoice (Buyer)</a></li>
							<li><a href="view_invoices_buyer.php"><i class="fa fa-eye"></i> View All Invoices (Buyer)</a></li>
					  </ul>
				</li>
				<?php } ?>
				
				<?php if(in_array('Payments',$user_rights)){ ?>
				<li class="treeview">
					  <a href="#">
							<i class="fa fa-money"></i> <span>Payments</span>
							<span class="pull-right-container">
							  <i class="fa fa-angle-left pull-right"></i>
							</span>
					  </a>
					  <ul class="treeview-menu">
							<li class="active"><a href="payment_status_sellers.php"><i class="fa fa-line-chart"></i>Seller's Payment</a></li>
							<li><a href="payment_status_buyers.php"><i class="fa fa-line-chart"></i> Buyer's Payment</a></li>
					  </ul>
				</li>
				<?php } ?>
				
				<?php if(in_array('Reports',$user_rights)){ ?>
				<li class="treeview">
					  <a href="#">
							<i class="fa fa-pie-chart"></i> <span>Reports</span>
							<span class="pull-right-container">
							  <i class="fa fa-angle-left pull-right"></i>
							</span>
					  </a>
					  <ul class="treeview-menu">
							<li class="active"><a href="sellers_invoice_report.php"><i class="fa fa-line-chart"></i>Seller's Invoice Report</a></li>
							<li><a href="buyers_invoice_report.php"><i class="fa fa-line-chart"></i> Buyer's Invoice Report</a></li>
							<li><a href="contracts_report.php"><i class="fa fa-line-chart"></i> Contract's Report</a></li>
					  </ul>
				</li>
				
				
				<?php } }?>
				
					<li class="treeview">
						  <a href="logout.php">
							<i class="fa fa-power-off"></i><span>Sign Out</span>
						  </a>
					</li>
			  </ul>
		</section>
	</aside>