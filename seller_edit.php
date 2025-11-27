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
    $seller_id=$_POST['seller_id'];
?>

<?php
			$seller_name=$_POST['seller_name'];
			$seller_bank_name=$_POST['bank_name'];
			$seller_account_number=$_POST['acc_number'];
			$seller_ifsc_code=$_POST['ifsc_code'];
			$seller_vat_number=$_POST['vat_number'];
			$seller_contact_person=$_POST['contact_person'];
			$seller_email=$_POST['email'];
			$seller_mobile_number=$_POST['mobile_number'];
			$seller_city=$_POST['city'];
			$seller_state=$_POST['state'];
			$seller_address=$_POST['address'];
			$seller_plant_address=$_POST['plant_address'];
			$seller_corres_address=$_POST['corres_address'];
			$seller_ware_address=$_POST['ware_address'];

	$sql="update seller set name='$seller_name', bank_name='$seller_bank_name', acc_no='$seller_account_number', ifsc_code='$seller_ifsc_code',vat_number='$seller_vat_number',contact_person='$seller_contact_person',email='$seller_email',mobile_number='$seller_mobile_number',city='$seller_city',state='$seller_state',address='$seller_address',plant_address='$seller_plant_address',corres_address='$seller_corres_address',ware_address='$seller_ware_address' where id='$seller_id'";
	//exit;
	$query=mysql_query($sql);

	if(!$query)
	{
	   echo "<script>location.href='edit_seller.php';</script>";
	}
	else
	{
	   echo "<script>location.href='view_sellers.php';</script>";
	}
		 
?>