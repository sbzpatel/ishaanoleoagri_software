<?php 
require('libs/library_fnc.php');
session_start();

$username=$_SESSION['username'];
if(isset($_SESSION['username'])=='')
{
header('Location:index.php');
	exit();

}
							
		   $subadmin_name=$_POST['name'];
		   $subadmin_mobile=$_POST['mobile'];
		   $subadmin_email=$_POST['email'];
		   $subadmin_city=$_POST['city'];
		   $subadmin_state=$_POST['state'];
		   $subadmin_address=$_POST['address'];
		   $subadmin_username=$_POST['username'];
		   $subadmin_password=$_POST['password'];
		   $subadmin_status=$_POST['status'];
		   $subadmin_role="Sub-admin";
		   
		   $insert_subadmin_sql="INSERT INTO `admin` (`name`, `mobile`,`email`,`city`,`state`,`address`,`username`,`password`,`status`,`role`) VALUES ('$subadmin_name', '$subadmin_mobile', '$subadmin_email', '$subadmin_city','$subadmin_state','$subadmin_address','$subadmin_username','$subadmin_password','$subadmin_status','$subadmin_role')";
		  
		  
		   $insert_subadmin_query=mysql_query($insert_subadmin_sql);
		  
		   header('Location:subadmin_list.php');
?>