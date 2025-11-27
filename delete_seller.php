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
$seller_id=$_GET['seller_id'];
$sql="delete from seller where id=$seller_id;";
$query=mysql_query($sql);
if(!$query)
{
	
    echo "<script>location.href='view_sellers.php';</script>";
}
else
{
	
    echo "<script>location.href='view_sellers.php';</script>";
}

?>