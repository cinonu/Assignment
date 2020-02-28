<?php 
		include '../utilities.php';
    require_once ('product.php'); 
    require_once ('../category/category.php');
    $name = $category_id = $price = "";
    $category = new Category();
    $product = new Product();
    $error_message="";
	  $categories = $category->get_category();//get category list for category dropdown
 
  if(!empty($_POST))
  {
    $name = $_POST['product'];
    $category_id = $_POST['category_id'];
    $price = $_POST['price'];
    $image = "";
    if(isset($_FILES['image']) && $_FILES['image']['name']!="")
    {
      $fileInfo = PATHINFO($_FILES["image"]["name"]);
      $file_type = $fileInfo['extension']; 
      $allowed = array("jpeg", "gif", "png","jpg");
      if(!in_array($file_type, $allowed)) 
      {
        $error_message = 'Only jpg, gif, and png files are allowed.';
        
      }
      $target_dir = "uploads/";
      $target_file = $target_dir.$fileInfo['filename']."_" .time().".".$fileInfo['extension'];
      if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
      {
       $image = $fileInfo['filename']."_" .time().".".$fileInfo['extension'];
      } 
    }
    $product->add_product($name,$price,$category_id,$image);

  }
?>
  
<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
<meta name="description" content="">
<meta name="keywords" content="">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 
<title>Add product</title>


<!-- sweet alert -->
<script src="<?=$base_url?>sweetalert/sweetalert.min.js"></script>

<!-- custom css file -->
<link rel="stylesheet" type="text/css" href="<?=$base_url?>css/custom.css">
<!-- boostrap css and js files -->
<link rel="stylesheet" type="text/css" href="<?=$base_url?>css/bootstrap.min.css">
<link href='<?=$base_url?>css/fonts/satisfy' rel='stylesheet'>

<!-- jQuery library -->
<script src="<?=$base_url?>js/jquery/1.8.2/jquery.min.js"></script>

</head>

<body>
<?php include "../header.php" ?>

<!-- Page Content -->
<div class="container-fluid">
 
  	<div class="row" 
        style="background:transparent url('<?=$base_url?>images/inner_page_banner/who_we_help.jpg') no-repeat center center /cover">
      	<div class="col-lg-12">
        
         <h3 class="text-center p-5 text-white font-weight-bold ">Create product</h3>
       
      	</div>
    </div>
    
    <div class="d-flex justify-content-center">

	    <div class="  p-5 border  m-5 w-75 " style="border:2px solid white;">
	    <?php 
          if(!empty($_GET['message'])) {
            $message = $_GET['message'];
            if($message == "success")
            {
              echo    '<div class="alert alert-success alert-dismissible" runat ="server" id="modalEditError" visible ="false">
  <button class="close" type="button" data-dismiss="alert">×</button>
  <strong>product Created Successfully!</strong> <div id="Div2" runat="server" ></div>
</div>';
            }
            else
            {
             echo    '<div class="alert alert-danger alert-dismissible" runat ="server" id="modalEditError" visible ="false">
  <button class="close" type="button" data-dismiss="alert">×</button>
  <strong>Failed To Create product!</strong> <div id="Div2" runat="server" ></div>
</div>';
            }
          }
?>
		    <form method="post" id="add_product" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return validate();" enctype="multipart/form-data"     >
		     
         <div class="float-right">
            <a href="list_product.php" class="btn btn-success">Manage product</a>
        </div>
        
        <div class="form-group" >
		      <label for="product">Product Name</label>
		      <input type="text" class="form-control col-lg-8" id="product" placeholder="Enter product" name="product" value="<?=$name?>" >
          <span id="product_err" class="text-danger"></span>
        </div>
        <div class="form-group" >
          <label for="product">Product Price</label>
          <input type="text" class="form-control col-lg-8" id="price" placeholder="Enter Price" name="price" value="<?=$price?>">
          
        </div>
        <div class="form-group" >
          <label for="product">Upload Image</label>
          <input type="file" class="form-control col-lg-8" id="image"   name="image">
         <label id="image-error" class="error" for="image"><?=$error_message?></label>
        </div>
        <div class="form-group">
        <label for="product">Select Category</label>
        <select class="form-control col-lg-8" name="category_id" id="category_id">
        <option value="">select</option>
        <?php while ($row = $categories->fetch_assoc()) { ?>
        <option value="<?=$row['category_id']?>"><?=$row['name']?></option>
        <?php } ?>
        </select>
        
        </div>
		    
		    <hr>
		    <button type="submit" class="btn btn-success btn-lg">
		    <span>Submit <img src="<?=$base_url?>images/small_triangle.png" alt="small_triangle"> </span></button>
		    </form>
	    </div>
 	</div> 
</div>
 
<?php include "../footer.php" ?>

<script type="text/javascript" src="<?=$base_url?>js/bootstrap.min.js"></script>
<!-- validation plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.js"></script>

<script type="text/javascript">
 $(document).ready(function () {

    $.validator.addMethod(
      "regex",
      function(value, element, regexp) {
          var check = false;
          var re = new RegExp(regexp);
          return this.optional(element) || re.test(value);
      },""
    );

  // validate signup form on keyup and submit
  $("#add_product").validate({
    rules: 
    {
      product:
      { 
            required:true,
            regex: "^[a-zA-Z_ ]*$",
            normalizer: function( value ) {        
            return $.trim( value );
            }
            
      },
      price:
      {
        required:true,
        regex: '\\d+(\\.\\d{1,2})?',

      },
      category_id:
      {
        required:true,
      }
    },
    messages:
    {
      product:{
      required: "Product name is Required",
      regex: 'Only alphabets allowed'
      },
      price:{
        required:"Product price is Required",
        regex:"Please Enter Correct Amount"
      },
      category_id:{
        required:"Please select Category"
      }
    }
      
  });
});
</script>

</body>
</html>