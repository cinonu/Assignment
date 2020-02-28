<?php 
require_once('category.php'); 
if(!empty($_GET))
{
	if(isset($_GET['category_id']))
	{
		$category = new Category();
    	$category->delete_category($_GET['category_id']);
	}
}

?>