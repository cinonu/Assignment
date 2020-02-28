<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(!mysqli_select_db($conn,'harsh'))
{
	echo "not selected";
}

if(!empty($_POST))
{
	$name = $_POST['name'];
$country = $_POST['address'];

$sql = "INSERT INTO people(name,country) VALUES ('$name','$country')";

if(!mysqli_query($conn,$sql))
{
	echo "not inserted";
}
else
{
	echo "inserted";
}
}

 


?>
