<?php

require('libs/library_fnc.php');
session_start();

  $username=$_SESSION['username'];
  $userid=$_SESSION['id'];
  $userrole=$_SESSION['role'];
  
if(isset($_SESSION['username'])=='')
{
header('Location:index.php');
	exit();

}

$todo_id=$_GET['id'];
$sql="select * from todo_list where id = '$todo_id'";
$query=mysql_query($sql);
$row=mysql_fetch_array($query);
$status=$row['status'];

if($status=='unblock')
{
	$sql="update todo_list set status='block' where id='$todo_id'";
    $query=mysql_query($sql);
	
	header("location:home.php");
	
} else if($status=='block')
{
	$sql="update todo_list set status='unblock' where id='$todo_id'";
    $query=mysql_query($sql);
	
	header("location:home.php");
}
else{
header("location:home.php");
}
?>