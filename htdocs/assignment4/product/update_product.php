<?php 

		include '../utilities.php';
		require_once ('../category/category.php'); 
    require_once ('product.php'); 
    $category = new Category();
    $categories = $category->get_category();
    $product = new Product();
    $cat_name = "";
		if(!empty($_GET))
		{
			if (isset($_GET['product_id'])) {
			
				  $products = $product->get_product_by_id($_GET['product_id'])->fetch_assoc();
          $product_id = $_GET['product_id'];
          $name =  $products['name'];
          $price =  $products['price'];
          $image = $products['image'];
          $category_id = $products['category_id'];
			}
    }

  if(!empty($_POST))
  {
    $name = $_POST['product'];
    $category_id = $_POST['category_id'];
    $price = $_POST['price'];
    $image = "";
    $product_id = $_POST['product_id'];
    // print_r($_FILES);exit;
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
    // echo $image;exit;
    $product->update_product($product_id,$name,$category_id,$price,$image);

  }


?>


<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
<meta name="description" content="">
<meta name="keywords" content="">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 
<title>Update Product</title>

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
        
         <h3 class="text-center p-5 text-white font-weight-bold ">Update Product</h3>
       
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
  <strong>Category Updated Successfully!</strong> <div id="Div2" runat="server" ></div>
</div>';
            }
            else
            {
             echo    '<div class="alert alert-danger alert-dismissible" runat ="server" id="modalEditError" visible ="false">
  <button class="close" type="button" data-dismiss="alert">×</button>
  <strong>Failed To Update Category!</strong> <div id="Div2" runat="server" ></div>
</div>';
            }
          }
?>
		    <form id="update_category" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" >
		    <div class="form-group name_fileds">
        <div class="float-right">
            <a href="list_product.php" class="btn btn-success">Manage Products</a>
        </div>
         <div class="form-group" >
          <label for="product">Product Name</label>
          <input type="text" class="form-control col-lg-8" id="product" placeholder="Enter product" name="product" value="<?=$name?>" >
          <input type="hidden" name="product_id" value="<?=$product_id?>">
          <span id="product_err" class="text-danger"></span>
        </div>
        <div class="form-group" >
          <label for="product">Product Price</label>
          <input type="text" class="form-control col-lg-8" id="price" placeholder="Enter Price" name="price" value="<?=$price?>">
          
        </div>
        <div class="form-group justify-content-center" >
          
         
          
          
        <label for="product">Upload Image:</label> 
        <?php if($image != "") { ?>
        <img src="uploads/<?=$image?>" class="img-thumbnail d-block " height="100px" width="100px" />
        <?php } ?>
        <input type="file" class="form-control inline col-lg-8" id="image"   name="image"> 
         
         
        </div>
               
        <div class="form-group">
        <label for="product">Select Category</label>
        <select class="form-control col-lg-8" name="category_id" id="category_id">
        <option value="">select</option>
        <?php while ($row = $categories->fetch_assoc()) { 
          if($row['category_id'] == $category_id)
          {
        ?>
            <option value="<?=$row['category_id']?>" selected><?=$row['name']?></option>
        <?php  } else { ?>
        <option value="<?=$row['category_id']?>"><?=$row['name']?></option>

        <?php } } ?>
        </select>
        
        </div>

		    </div>
       

		    <hr>
		    <button type="submit" class="btn btn-success btn-lg">
		    <span>Update <img src="<?=$base_url?>images/small_triangle.png" alt="small_triangle"> </span></button>
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
  $("#update_category").validate({
    rules: 
    {
      category:
      { 
            required:true,
            regex: "^[a-zA-Z_ ]*$",
            normalizer: function( value ) {        
            return $.trim( value );
            }
            
      },
    },
    messages:
    {
      category:{
      required: "Category Required",
      regex: 'Only alphabets allowed'
      },
    }
      
  });
});
</script>

</body>
</html>