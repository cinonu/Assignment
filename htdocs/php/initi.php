<?php

$db = mysqli_connect("localhost","root","","naruto");
// Check connection
if(!$db) 
{
    die("Connection failed: " . mysqli_connect_error());
}
    echo "Connected successfully";
if(!empty($_POST))
 	{
    	$name =$_POST['name'];
		$address=$_POST['address'];
		$query="INSERT INTO mytable(name,country) VALUES('$name','$address')";

		mysqli_query($db,$query);
		header('location:basaisehi.php');
	}
?>
