<?php
	if(!empty($_POST))
	{
		require_once ('product.php'); 
	    $product = new Product();
	 	$product->delete_product_multiple($_POST['product_id']);
	}
	else
	{
		header("Location: list_product.php?message=failed");
	}
	
?>