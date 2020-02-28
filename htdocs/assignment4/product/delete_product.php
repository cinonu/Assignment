<?php 
require_once('product.php'); 
if(!empty($_GET))
{
	if(isset($_GET['product_id']))
	{
		$product = new Product();
    	$product->delete_product($_GET['product_id']);
	}
}

?>