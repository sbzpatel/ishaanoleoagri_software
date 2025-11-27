<?php 
	require('libs/library_fnc.php');
	session_start();

	$username = $_SESSION['username'];
	if(isset($_SESSION['username']) == '')
	{
		header('Location:index.php');
		exit();

	}
			
		$product_name=$_POST['product_name'];
		
		$product_size=$_POST['product_size'];
		
		//$product_rate=$_POST['product_rate'];
		
		//$product_percentage=$_POST['product_percentage'];
		
		
	  
		$product_image = $_FILES['product_image'];
		$folder="images/";
		$product_image_name=$product_image['name'];//original filename
		$tmp_file_path=$product_image['tmp_name'];//buffer file path
		$new_product_image_name=time().$product_image_name;
		$final_file_path=$folder.$new_product_image_name;
		move_uploaded_file($tmp_file_path,$final_file_path);
		
		
		
		$product_feature=$_POST['product_feature'];
	   
		$insert_product_sql="INSERT INTO `product` (`name`, `size`,`img_name`,`feature`) VALUES ('$product_name', '$product_size', '$new_product_image_name', '$product_feature')";
	   //exit;
	   
		$insert_product_query=mysql_query($insert_product_sql);
	  
		header('Location:view_products.php');
?>