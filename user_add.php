<?php 
		require('libs/library_fnc.php');
		session_start();

		$username = $_SESSION['username'];
		$userid = $_SESSION['id'];
		$user_role = $_SESSION['admin_role'];
		  
		if(isset($_SESSION['username'])=='')
		{
			header('Location:index.php');
			exit();
		}
		

		$user_name = $_POST['userName'];
		$email_id = $_POST['emailId'];
		$mobile_no = $_POST['mobileNo'];
		$password = $_POST['password'];
		$user_rights = $_POST['user_rights'];
		
		$cnt = count($user_rights);
		for($i=0;$i<$cnt;$i++)
		{
			$user_right_string .= $user_rights[$i].",";
		}
		$user_rightss = rtrim($user_right_string,',');
		
		$user_role = 'admin';
		$status = 'Active';
		
		$sql = "insert into admin(mobile,email,username,password,admin_role,status,user_rights) values('$mobile_no','$email_id','$user_name','$password','$user_role','$status','$user_rightss');";
		//exit;
		mysql_query($sql);
		
		header("location:view_users.php");
		
		
?>