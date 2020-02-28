<?php 

		include '../utilities.php';
		require_once ('category.php'); 
    $category = new Category();
    $cat_name = "";
		if(!empty($_GET))
		{
			if (isset($_GET['category_id'])) {
			
				  $categories = $category->get_category_by_id($_GET['category_id'])->fetch_assoc();
          $cat_name =  $categories['name'];
          $category_id =  $categories['category_id'];
          $parent_id = $categories['parent_id'];
          // echo "string";exit;
			}
      if(isset($_GET['category']))
      {
        if (isset($_GET['parent_id'])) 
        {
          $category->update_category($_GET['category_id'] , $_GET['category'],$_GET['parent_id']);
        }
        else
        {
          $category->update_category($_GET['category_id'] , $_GET['category']);
        }
      }
      
		}

?>

<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
<meta name="description" content="">
<meta name="keywords" content="">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 
<title>Update Category</title>

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
        
         <h3 class="text-center p-5 text-white font-weight-bold ">Update Category</h3>
       
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
		    <form id="update_category" method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
		    <div class="form-group name_fileds">
        <div class="float-right">
            <a href="list_categories.php" class="btn btn-success">Manage Category</a>
        </div>
        <div class="form-group">
		      <label for="category">Category Name</label>
		      <input type="text" class="form-control col-lg-8" id="category" value="<?=$cat_name?>" placeholder="Enter category" name="category">
          <span class="text-danger" id="category_err"></span>
          <input type="hidden" name="category_id" value="<?=$category_id?>">
        </div>
        <div class="form-group">
        <label for="category">Parent Category</label>
        <select class="form-control col-lg-8" name="parent_id">
        <option value="">select</option>
        <?php
        $categories = $category->get_category();
        while ($row = $categories->fetch_assoc()) {
        if($row['category_id'] == $parent_id) { ?>

        <option value="<?=$row['category_id']?>" selected><?=$row['name']?></option>
        <?php }else{ ?>
        <option value="<?=$row['category_id']?>"><?=$row['name']?></option>
         <?php } ?>
        <?php } ?>
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