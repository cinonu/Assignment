<?php 
include "server.php"; 
 
?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD: CReate, Update, Delete PHP MySQL</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<table class="table">
	<thead>
		<th >name</th>
		<th >Address</th>
		<th colspan="2">Action</th>
        
	</thead>
	<tbody>
	<?php while ($row = mysqli_fetch_array($results)) { ?>
	<tr>
		<td><?php echo $row['name'];?></td>
		<td><?php echo $row['address'];?></td>
		<td>
			<a href="edit.php?id=<?=$row['id'];?>" class="edit_btn" >Edit</a>


		</td>
		<td>
			<a href="delete.php?id=<?=$row['id'];?>" class="del_btn">delete</a>
			
		</td>
		</tr>
  <?php } ?>
	</tbody>
</table>
	<form method="post">
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="name" value="<?php echo $name?>">
		</div>
		<div class="input-group">
			<label>Address</label>
			<input type="text" name="address" value="<?php echo $address?>">
		</div>
		<div class="input-group">
		
			<button class="btn" type="submit"  name="save" >Save</button>
		
		  
		 
		</div>
	</form>
</body>
</html>