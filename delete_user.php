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
$user_id=$_GET['id'];
$sql="delete from admin where id=$user_id AND admin_role='admin'";
$query=mysql_query($sql);
if(!$query)
{
	
    echo "<script>location.href='view_users.php';</script>";
}
else
{
	
    echo "<script>location.href='view_users.php';</script>";
}

?>