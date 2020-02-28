<?php

$name="";
$address = "";
$db = mysqli_connect('localhost','root','','db');

if(!empty($_GET))
{

	  
	  $sql = "DELETE FROM people WHERE id=".$_GET['id'];
	  $result  = mysqli_query($db,$sql);
	  // $id = $_GET['del'];
	  header("Location:index.php");

}
?>