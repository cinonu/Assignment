<?php
$db = mysqli_connect('localhost','root','','db');
// init values
$name="";
$address="";
$id = 0;
$update=false;
 
//insert the data
if(!empty($_POST))
{
	$name =$_POST['name'];
	 $address=$_POST['address'];
	$query="INSERT INTO people(name,address) VALUES('$name','$address')";

	mysqli_query($db,$query);
	 header('location:index.php');
}
//to edit the result

//to display the result
 $results =mysqli_query($db,"SELECT * FROM people");


?>

