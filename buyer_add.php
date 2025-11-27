<?php 
	require('libs/library_fnc.php');
	session_start();

	$username=$_SESSION['username'];
	if(isset($_SESSION['username'])=='')
	{
		header('Location:index.php');
		exit();
	}
							
		   $buyer_name=$_POST['buyer_name'];
		   
		   $buyer_vat_number=$_POST['vat_number'];
		   
		   $buyer_contact_person=$_POST['contact_person'];
		   
		   $buyer_email=$_POST['email'];
		   
		   $buyer_mobile_number=$_POST['mobile_number'];
		   
		   $buyer_city=$_POST['city'];
		   
		   $buyer_state=$_POST['state'];
		   
		   $buyer_address=$_POST['address'];
		   
		   $buyer_plant_address=$_POST['plant_address'];
		   
		   $buyer_corres_address=$_POST['corres_address'];
		   
		   $buyer_ware_address=$_POST['ware_address'];
		   
		   
		   $insert_buyer_sql="INSERT INTO `buyer` (`name`, `vat_number`,`contact_person`,`email`,`mobile_number`,`city`,`state`,`address`,`plant_address`,`corres_address`,`ware_address`) VALUES ('$buyer_name', '$buyer_vat_number', '$buyer_contact_person', '$buyer_email','$buyer_mobile_number','$buyer_city','$buyer_state','$buyer_address','$buyer_plant_address','$buyer_corres_address','$buyer_ware_address')";
		  
		   $insert_buyer_query=mysql_query($insert_buyer_sql);
		  
		   header('Location:view_buyers.php');
?>