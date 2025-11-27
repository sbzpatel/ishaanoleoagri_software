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
    $buyer_id=$_POST['buyer_id'];
?>

<?php

			$buyer_name=$_POST['buyer_name'];
			$buyer_vat_number=$_POST['vat_number'];
			$buyer_contact_person=$_POST['contact_person'];
			$buyer_email=$_POST['email'];
			$buyer_mobile_number=$_POST['mobile_number'];
			$buyer_city=$_POST['city'];
			$buyer_state=$_POST['state'];
			$buyer_address=$_POST['address'];
			$buyer_plant_address=$_POST['plant_address'];
			$buyer_corres_address=$_POST['corres_address'];
			$buyer_ware_address=$_POST['ware_address'];

	$sql="update buyer set name='$buyer_name',vat_number='$buyer_vat_number',contact_person='$buyer_contact_person',email='$buyer_email',mobile_number='$buyer_mobile_number',city='$buyer_city',state='$buyer_state',address='$buyer_address',plant_address='$buyer_plant_address',corres_address='$buyer_corres_address',ware_address='$buyer_ware_address' where id='$buyer_id'";

	$query=mysql_query($sql);

	if(!$query)
	{
	   
	   echo "<script>location.href='edit_buyer.php';</script>";
	}
	else
	{
	   
	   echo "<script>location.href='view_buyers.php';</script>";
	}
		 
?>