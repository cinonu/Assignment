<?php 
include "addinfo.php";
$p = new Database();
if(isset($_POST) && !empty($_POST))
  {
       $name=$_POST['name'];
       $email=$_POST['email'];
       $address=$_POST['address'];
       $no=$_POST['cno'];
       $city=$_POST['city'];
       if(isset($_POST['gender']))
       {
        $gender=$_POST['gender'];
       }
       else
       {
        echo "select one gender";
       }


      
          
     if(isset($_FILES['image']) && $_FILES['image']['name']!=" ")
       {

        $fileInfo = PATHINFO($_FILES["image"]["name"]);
        $file_type = $fileInfo['extension'];
       
        $allowed = array("jpeg", "gif", "png","jpg");
         
         if(!in_array($file_type, $allowed)) 
          
          {
          
          $error_message = 'Only jpg, gif, and png files are allowed.';
          echo $error_message;
          
          }

      $target_dir = "uploads/";
      $target_file = $target_dir.$fileInfo['filename']."_" .time().".".$fileInfo['extension'];
      
      if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
      {

      	
        $image = $fileInfo['filename']."_" .time().".".$fileInfo['extension'];
         $p->createinfo($name,$address,$email,$no,$city,$gender,$image);
      } 
        
     }
          
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add info</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
 
  
  <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
  <script src="jquery/jquery.min.js"></script>
  <script src="bootstrap/bootstrap.min.js"></script>
 
</head>
<body>
<div class="container" style="width: 500px">
  <h2>EMPLOYEE FORM</h2>
  <form id="Example" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label>Name</label>
      <input type="text" class="form-control"  placeholder="Enter name" name="name">
    </div>
    <div class="form-group">
      <label >Email-Id</label>
      <input type="text" class="form-control"  placeholder="Enter Email" name="email">
    </div>
    <div class="form-group">
      <label >Address</label>
      <input type="text" class="form-control"  placeholder="Enter Address" name="address">
    </div>
    <div class="form-group">
      <label >Phone no</label>
      <input type="text" class="form-control"  placeholder="Enter phone no." name="cno" id="phone"> 
    </div>
    <div class="form-group">
      <label >Profile photo</label>
      <input type="file" class="form-control" name="image">
    </div>
    <div class="dropdown">
     <label>Select the City</label>
     <select class="form-control" name="city">
     <option >Ahmedabad</option>
    <option >Surat</option>
<option >VAdodara</option></select>
</div>

 <div class="form-group" style="margin-top: 16px">
<label>GENDER</label><br>

<input style="margin-top: 10px" type="radio" name="gender" value="male">Male
<input style="margin-top: 10px" type="radio" name="gender" value="female">Female
</div>

 <div class="form-group" style="margin-top: 10px">
    <button type="submit"  class="btn btn-default">Submit</button>
    </div>
 </form>
 </div>
  <script src="ajax/jquery-2.1.3.min.js"></script>
  <script src="ajax/jquery.validate.min.js"></script>
  <script src="ajax/additional-methods.js"></script>
  <script src="validate.js"></script>


</div>

</body>
</html>
