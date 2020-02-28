<?php

require_once ('../database.php');

class Category {

  public $conn; 

  function __construct() {    
      // Create database connection
    $db = new Database();
    $this->conn = $db->db_connect();
 
  }   

  
  function add_category($category_name,$parent_id = NULL)
  {
    // echo $category_name."<br>";
    if($parent_id != "" )
    {
      $sql = "insert into category(name,parent_id) values('".$category_name."',".$parent_id.");";
    }
    else
    {
      $sql = "insert into category(name) values('".$category_name."');";
    }
     // echo "$sql";exit;

  	if($this->conn->query($sql) === TRUE)
  	{
  		header("Location: add_category.php?message=success");
  	}
  	else
  	{
  		header("Location: add_category.php?message=failed");
  	}
    
  }

  function delete_category($category_id)
  {
  	$sql = "delete from category where category_id =".$category_id.";";
  	if($this->conn->query($sql) === TRUE)
  	{
  		header("Location: list_categories.php?message=success");
  	}
  	else
  	{
  		header("Location: list_categories.php?message=failed");
  	}
  }

  function update_category($category_id,$name,$parent_id = NULL)
  {
    if($parent_id != "" )
    {
     $sql = "update  category set name ='".$name."',parent_id=".$parent_id." where category_id=".$category_id.";";
    }
    else
    {
       $sql = "update  category set name ='".$name."' where category_id=".$category_id.";";
    }
    

    if($this->conn->query($sql))
    {
      header("Location: update_category.php?message=success&category_id=$category_id");
    }
    else
    {
      header("Location: update_category.php?message=failed&category_id=$category_id");
    }
     
  }
  function get_category()
  {
    $sql = "select * from category";
    return $this->conn->query($sql);

  }
  function get_category_by_id($category_id)
  {
    $sql = "select * from category where category_id=".$category_id;
    return $this->conn->query($sql);

  }
  function get_name($category_id)
  {
    $sql = "select * from category where category_id=".$category_id;
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
  function get_category_paginated($offset,$limit)
  {
    $sql = "select * from category limit $offset,$limit";
    return $this->conn->query($sql);
  }
 
  function delete_category_multiple($ids)
  {
    $sql = "delete from category where category_id in(".implode(',', $ids).");";
    // echo $sql;exit;
    if($this->conn->query($sql) === TRUE)
    {
      header("Location: list_categories.php?message=success");
    }
    else
    {
      header("Location: list_categories.php?message=failed");
    }
  }
}
?>

 