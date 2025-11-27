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
$product_id=$_GET['product_id'];
$sql="delete from product where id=$product_id;";
$query=mysql_query($sql);
if(!$query)
{
	
    echo "<script>location.href='view_products.php';</script>";
}
else
{
	
    echo "<script>location.href='view_products.php';</script>";
}

?>