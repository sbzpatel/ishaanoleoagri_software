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
    $product_id=$_POST['product_id'];
?>

<?php

        $sql="select * from product where id='$product_id'";
		$query=mysql_query($sql);
		$row=mysql_fetch_array($query);




			$product_name=$_POST['product_name'];
			
			
		  if(isset($_FILES['product_image']['name']) & $_FILES['product_image']['name']!=='')
		  {
			$product_image = $_FILES['product_image'];
			$folder="images/";
			$product_image_name=$product_image['name'];//original file name
			$tmp_file_path=$product_image['tmp_name'];//buffer file path
			$new_product_image_name=time().$product_image_name;
			$final_file_path=$folder.$new_product_image_name;
			move_uploaded_file($tmp_file_path,$final_file_path);
		  }
		  else
		  {
              $new_product_image_name=$row['img_name'];
		  }
			
			$product_size=$_POST['product_size'];
			//$product_rate=$_POST['product_rate'];
			$product_feature=$_POST['product_feature'];
			//$product_percentage=$_POST['product_percentage'];
			
			
			
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";
//echo "<pre>";
//print_r($new_product_image_name);
//echo "</pre>";
$sql="update product set name='$product_name',img_name='$new_product_image_name',size='$product_size',feature='$product_feature' where id='$product_id'";
$query=mysql_query($sql);

	

if(!$query)
{

   echo "<script>location.href='edit_product.php';</script>";
}
else
{
   $sqll = "update contract_product set product_size='$product_size' where product_id='$product_id'";
   $queryy = mysql_query($sqll);
   echo "<script>location.href='view_products.php';</script>";
}
		 
?>