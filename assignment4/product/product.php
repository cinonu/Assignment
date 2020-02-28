<?php
include '../utilities.php';
require_once ('../database.php');

class Product {

  public $conn; 

  function __construct() {    
      // Create database connection
    $db = new Database();
    $this->conn = $db->db_connect();
 
  }   

  
  function add_product($product_name,$price,$category_id,$image)
  {
    // echo $product_name."<br>";
     
      $sql = "insert into product(name,image,price,category_id) values('".$product_name."','".$image."',".$price.",".$category_id.");";
    
     // echo "$sql";exit;

  	if($this->conn->query($sql) === TRUE)
  	{
  		header("Location: add_product.php?message=success");
  	}
  	else
  	{
  		header("Location: add_product.php?message=failed");
  	}
    
  }

  function delete_product($product_id)
  {
  	$sql = "delete from product where product_id =".$product_id.";";
    $this->delete_image_by_product($product_id);
  	if($this->conn->query($sql) === TRUE)
  	{
  		header("Location: list_product.php?message=success");
  	}
  	else
  	{
  		header("Location: list_product.php?message=failed");
  	}
  }

  function update_product($product_id,$name,$category_id,$price,$image)
  {
    
    if($image == "")
    {
      $sql = "update  product set name ='".$name."',category_id=".$category_id.",price = ".$price." where product_id=".$product_id.";";
    }
    else
    {
      $sql = "update  product set name ='".$name."',category_id=".$category_id.",price = ".$price.",image ='".$image."'   where product_id=".$product_id.";";
    }
    
    if($this->conn->query($sql))
    {
      header("Location: update_product.php?message=success&product_id=$product_id");
    }
    else
    {
      header("Location: update_product.php?message=failed&product_id=$product_id");
    }
     
  }
  function get_product()
  {
    $sql = "select * from product";
    return $this->conn->query($sql);

  }
  function get_product_by_id($product_id)
  {
    $sql = "select * from product where product_id=".$product_id;
    return $this->conn->query($sql);

  }
  function get_name($product_id)
  {
    $sql = "select * from product where product_id=".$product_id;
    $result =  $this->conn->query($sql);

    if(!empty($result) && $result->num_rows > 0)
    {
    return $result->fetch_assoc()['name'];
    }
    else
    {
    return 'N/A';
    }
    
  }
  function delete_image_by_product($product_id)
  {
    $product =  $this->get_product_by_id($product_id)->fetch_assoc()['image'];
    unlink('uploads/'.$product);
  }
  function get_product_paginated($offset,$limit)
  {
    $sql = "select * from product limit $offset,$limit";
    return $this->conn->query($sql);

  }

  function delete_product_multiple($ids)
  {
    $sql = "delete from product where product_id in(".implode(',', $ids).");";
    // echo $sql;exit;
    if($this->conn->query($sql) === TRUE)
    {
      header("Location: list_product.php?message=success");
    }
    else
    {
      header("Location: list_product.php?message=failed");
    }
  }

 
}
?>

 