<?php
	if(!empty($_POST))
	{
		require_once ('category.php'); 
	    $category = new Category();
	 	$category->delete_category_multiple($_POST['category_id']);
	}
	else
	{
		header("Location: list_categories.php?message=failed");
	}
	
?>