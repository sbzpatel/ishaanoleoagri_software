<?php 
		require('libs/library_fnc.php');
		session_start();

		$username=$_SESSION['username'];
		if(isset($_SESSION['username'])=='')
		{
			header('Location:index.php');
			exit();
		}
		
		
		if(isset($_POST['submitseller']))	
		{
		   $seller_name=$_POST['seller_name'];
		   
		   $seller_bank_name=$_POST['bank_name'];
		   
		   $seller_acc_number=$_POST['acc_number'];
		   
		   $ifsc_code=$_POST['ifsc_code'];
		   
		   $seller_vat_number=$_POST['vat_number'];
		   
		   $seller_contact_person=$_POST['contact_person'];
		   
		   $seller_email=$_POST['email'];
		   
		   $seller_mobile_number=$_POST['mobile_number'];
		   
		   $seller_city=$_POST['city'];
		   
		   $seller_state=$_POST['state'];
		   
		   $seller_address			=	$_POST['address'];
		   
		   $seller_plant_address	=	$_POST['plant_address'];
		   
		   $seller_corres_address	=	$_POST['corres_address'];
		   
		   $seller_ware_address	    =	$_POST['ware_address'];
		   
		   
		   $insert_seller_sql="INSERT INTO `seller` (`name`,`bank_name`,`acc_no`,`ifsc_code`, `vat_number`,`contact_person`,`email`,`mobile_number`,`city`,`state`,`address`,`plant_address`,`corres_address`,`ware_address`) VALUES ('$seller_name','$seller_bank_name','$seller_acc_number', '$ifsc_code', '$seller_vat_number', '$seller_contact_person','$seller_email','$seller_mobile_number','$seller_city','$seller_state','$seller_address','$seller_plant_address','$seller_corres_address','$seller_ware_address')";
		   
			//exit;
		   $insert_seller_query=mysql_query($insert_seller_sql);
		}
		  
		   header('Location:view_sellers.php');
?>