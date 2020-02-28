<!DOCTYPE html>
<html>
<head>
	<title>heeeeeyyyy</title>
</head>
<body>
<?php 
$servername = "localhost";
$username = "roots";
$password = "";
$dbname ="DEMO";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
echo "<pre>";
print_r($conn);
echo "this is my error: ".$conn->connect_error;
// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

?>
</body>
</html>