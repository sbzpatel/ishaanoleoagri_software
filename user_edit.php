<?php 
require('libs/library_fnc.php');
session_start();

$username=$_SESSION['username'];
if(isset($_SESSION['username'])=='')
{
header('Location:index.php');
	exit();

}


?>
<?php
    $user_id=$_POST['user_id'];
	//exit;
?>

<?php

			$userName=$_POST['userName'];
			$emailId=$_POST['emailId'];
			$mobileNo=$_POST['mobileNo'];
			$password=$_POST['password'];
			$user_rights=$_POST['user_rights'];
			//print_r($user_rights);
			if($user_id == '1')
			{
				$user_rights_string = 'sellers,Buyers,Products,Contracts,Invoices,Payments,Reports';
			}
			else
			{
				$user_rights_string = implode(",",$user_rights);
			}
			//exit;
$sql="update admin set mobile='$mobileNo',email='$emailId',username='$userName',password='$password',user_rights='$user_rights_string' where id='$user_id'";

$query=mysql_query($sql);

if(!$query)
{
   
   echo "<script>location.href='edit_user.php';</script>";
}
else
{
   
   echo "<script>location.href='view_users.php';</script>";
}
		 
?>