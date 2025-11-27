<?php 
require('libs/library_fnc.php');
session_start();

  $username=$_SESSION['username'];
if(isset($_SESSION['username'])=='')
{
header('Location:index.php');
	exit();

}

 $todo_id=$_GET['todo_id'];
mysql_query("delete from todo_list where id='$todo_id'");
echo "<script>location.href='home.php'</script>";
?>