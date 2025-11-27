<?php
	session_start();
	require('libs/library_fnc.php');

	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	
	// echo mysql_real_escape_string($_POST['username']);
	// echo "<br>";
	// echo $_POST['username'];
	// exit;
	
	//ob_start(); // Turn on output buffering
	//system('ipconfig /all'); //Execute external program to display output
	//$mycom=ob_get_contents(); // Capture the output into a variable
	//ob_clean(); // Clean (erase) the output buffer
	//$findme = "Physical";
	//$pmac = strpos($mycom, $findme); // Find the position of Physical text
	//$mac_add=substr($mycom,($pmac+36),17); // Get Physical Address
	//echo $username;
	//echo "select * from admin_login where  username='$username' and password='$pass'";


	$result = mysql_query("select * from admin where username = '$username' and password = '$password'");
	$user_sess = mysql_fetch_array($result);
	
	$user_name = $user_sess['username'];
	$user_id = $user_sess['id'];
	$user_status = $user_sess['status'];
	$admin_role = $user_sess['admin_role'];
	
	$row1 = mysql_num_rows($result);

	if($row1 == '1')
	{
		if($user_status == 'Disable')
		{
			 echo "<script>location.href='index.php'</script>";	
		}
		else
		{
			 $_SESSION['username'] = $user_name;
			 $_SESSION['id'] = $user_id;
			 $_SESSION['admin_role'] = $admin_role;
			 session_write_close();
			 header('location:home.php');
		}
	}
	else
	{
		header('location:index.php?mess=error');
	}

?>



