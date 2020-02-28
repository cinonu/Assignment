<?php
 include "addinfo.php";
 $id = $_GET['id'];
 $del= new Database(); 
 $res = $del->deleteinfo($id);
 
 
 if($res)
 {
 	header('location:listinfo.php');
 }
 else
 {
 	echo "Failed to Delete Record";
 }

?>