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
$buyer_id=$_GET['buyer_id'];
$sql="delete from buyer where id=$buyer_id;";
$query=mysql_query($sql);
if(!$query)
{
	
    echo "<script>location.href='view_buyers.php';</script>";
}
else
{
	
    echo "<script>location.href='view_buyers.php';</script>";
}

?>