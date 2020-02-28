<?php

$name="";
$address = "";
$db = mysqli_connect('localhost','root','','db');
if(!empty($_GET))
{
	  
	  $sql = "select * from people where id=".$_GET['id'];
	  $result  = mysqli_query($db,$sql);
	  $result = mysqli_fetch_assoc($result);
	  $name = $result['name'];
	  $address = $result['address'];

}
if(!empty($_POST))
{

	  
	  $sql = "update people set name='".$_POST['name']."',address = '".$_POST['address']."'  where id=".$_POST['id'];
	  $result  = mysqli_query($db,$sql);
	  header("Location:index.php");

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>update people</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<h1 style="text-align: center;">Update page</h1>
<form method="post">
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="name" value="<?php echo $name?>">
		</div>
		<div class="input-group">
			<label>Address</label>
			<input type="text" name="address" value="<?php echo $address?>">
			<input type="hidden" name="id" value="<?=$_GET['id']?>">
		</div>
		<div class="input-group">
		
			<button class="btn" type="submit"  name="save" >Save</button>
		
		  <button class="btn" type="submit"  name="update" >update</button>
		 
		</div>
	</form>

</body>
</html>