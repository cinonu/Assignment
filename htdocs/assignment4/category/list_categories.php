<?php 
		include '../utilities.php';
		require_once ('category.php'); 
    $category = new Category();
    // $list_cat =  $category->get_category();
?>
<?php 
   $total_records =  $category->get_category()->num_rows;
   $total_pages = ceil($total_records / 10);

  if (isset($_GET['page']) && $_GET['page']!="") 
  {
      $page_no = $_GET['page'];
  } 
  else 
  {
    $page_no = 1;
  }
  $prev = $page_no-1;
  $next = $page_no+1;
 
  $total_records_per_page = 10;
  $offset = ($page_no-1) * $total_records_per_page;
  $previous_page = $page_no - 1;
  $next_page = $page_no + 1;
  $list_cat =  $category->get_category_paginated($offset,$total_records_per_page);
?>
<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
<meta name="description" content="">
<meta name="keywords" content="">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 
<title>Manage Category</title>

<!-- sweet alert -->

<script src="<?=$base_url?>sweetalert/sweetalert.min.js"></script>

<!-- font awesom for fa icon -->

<link rel="stylesheet" href="<?=$base_url?>fontawesome/css/all.min.css">

<!-- custom css file -->
 
<link rel="stylesheet" type="text/css" href="<?=$base_url?>css/custom.css">
<!-- boostrap css and js files -->
<link rel="stylesheet" type="text/css" href="<?=$base_url?>css/bootstrap.min.css">
<link href='<?=$base_url?>css/fonts/satisfy' rel='stylesheet'>

 
<!-- jQuery library -->
<script src="<?=$base_url?>js/jquery/1.8.2/jquery.min.js"></script>
<!-- <link rel="stylesheet" type="text/css" href="datatables/css/jquery.dataTables.min.css"> -->

<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
 -->
</head>

<body>
<?php include "../header.php" ?>

<!-- Page Content -->
<div class="container-fluid">
 
  	<div class="row" 
        style="background:transparent url('<?=$base_url?>images/inner_page_banner/who_we_help.jpg') no-repeat center center /cover">
      	<div class="col-lg-12">
        
         <h3 class="text-center p-5 text-white font-weight-bold ">Manage Category</h3>
       
      	</div>
    </div>

          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12  p-3">
                <div class="card  m-3 ">
                <form action="delete_multiple_category.php" method="post" id="delete_multiple_category" >
                  <div class="card-header">
                   <div class="float-right">

                      <a href="add_category.php" class="btn btn-success">Add Category</a>
                      <button type="submit"  class="btn btn-success"  onclick="return confirm_swal();">Delete</button>

                  </div>
                  <div>
                  <h2 class="">Categories</h2>
                  </div>
                    <?php 
                      if(!empty($_GET['message'])) {
                        $message = $_GET['message'];
                        if($message == "success")
                        {
                          echo    '<div class="alert alert-success alert-dismissible" runat ="server" id="modalEditError" visible ="false">
                        <button class="close" type="button" data-dismiss="alert">×</button>
                        <strong>Category Deleted Successfully!</strong> <div id="Div2" runat="server" ></div>
                      </div>';
                                  }
                                  else
                                  {
                                   echo    '<div class="alert alert-danger alert-dismissible" runat ="server" id="modalEditError" visible ="false">
                        <button class="close" type="button" data-dismiss="alert">×</button>
                        <strong>Failed To Delete Category!</strong> <div id="Div2" runat="server" ></div>
                      </div>';
                                  }
                                }
                      ?>
                    
                  </div>
                  <div class="card-body table-responsive">
                    
                    <table id="category_table" class="table table-striped table-bordered ">
                    <thead>
                    <tr>
                    <th>&nbsp;&nbsp;&nbsp;</th>
                    <th>Category Name</th>
                    <th>Parent Category</th>
                    <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php while ($row = $list_cat->fetch_assoc()) { ?>
                     <tr>
                      <td><input type="checkbox" class="form-control form-control-sm" name="category_id[]" value="<?=$row['category_id']?>"></td>
                      <td><?=$row['name']?></td>
                      <td><?=$category->get_name($row['parent_id']);?></td>
                      <td> <a href="update_category.php?category_id=<?=$row['category_id']?>" class="btn btn-primary a-btn-slide-text">
                      <span><i class="fa fa-edit"></i></span>            
                    </a>
                    <a  onclick=" return show_warning(this)" href="delete_category.php?category_id=<?=$row['category_id']?>" class="btn btn-danger a-btn-slide-text">
                      <span><strong><i class="fa fa-trash"></i></strong></span></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                    </table>
                  </div>
                  <div class="card-footer">
                  <nav aria-label="...">
                  <ul class="pagination">
                    <li class="page-item <?=($page_no==1)?'disabled':''?>">
                      <a class="page-link" href="?page=<?=$prev?>" tabindex="-1">Previous</a>
                    </li>
                    <?php 
                    for($i=1;$i<=$total_pages;$i++)
                    {
                    ?>
                    <li class="page-item <?=($page_no==$i)?'active':''?>"><a class="page-link" href="?page=<?=$i?>"><?=$i?></a></li>
                    <?php } ?>
                    <li class="page-item <?=($page_no==$total_pages)?'disabled':''?>">
                      <a class="page-link " href="?page=<?=$next?>">Next</a>
                    </li>
                  </ul>
                  </nav>
                  </div>
                  </form>
                </div>
              </div>

            </div>
</div>
 
<?php include "../footer.php" ?>
<script type="text/javascript" src="<?=$base_url?>js/bootstrap.min.js"></script>
 
<script type="text/javascript">
 function show_warning(ev){
  var link =  $(ev).attr("href");
  
 swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    swal("Poof! Your Category has been deleted!", {
  buttons: false,
  timer: 1000,
});
    
  setTimeout(function(){location.href=link} , 1000);   
 
    
  } else {
    swal("Your Category is safe!", {
  buttons: false,
  timer: 1000,
});
  }
});
return false;
     
}        
</script>
<script type="text/javascript">
  function confirm_swal()
  {
     
      swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        swal("Poof! Your Records have been deleted!", {
      buttons: false,
      timer: 1000,
    });
        
      setTimeout(function(){$('#delete_multiple_category').submit();} , 1000);   
     
        
      } else {
        swal("Your Records are safe!", {
      buttons: false,
      timer: 1000,
    });
      }
    });
    return false;
  }
</script>
</body>

</html>