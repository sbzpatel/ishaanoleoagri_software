<?php 
require('libs/library_fnc.php');
session_start();

  $username=$_SESSION['username'];
if(isset($_SESSION['username'])=='')
{
header('Location:index.php');
	exit();

}

 $todo=$_POST['todo'];
 $agent_name=$_POST['agent_name'];
 $status=$_POST['status'];
mysql_query("insert into todo_list (`task`,`time`,`status`,`agent_name`) VALUES('$todo',NOW(),'unblock','$agent_name')" );
header('location:home.php');
?>