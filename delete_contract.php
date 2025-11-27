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
$contract_id=$_GET['contract_id'];
$sql="delete from contract where id=$contract_id;";
$query=mysql_query($sql);
if(!$query)
{
	
    echo "<script>location.href='view_contracts.php';</script>";
}
else
{
	
    echo "<script>location.href='view_contracts.php';</script>";
}

?>