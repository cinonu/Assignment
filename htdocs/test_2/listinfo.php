<?php
include "addinfo.php";
$r = new Database();
$res = $r->readinfo();
?>
<!DOCTYPE html>
<html>
<head>
	<title>list info</title>
</head>
<link rel="stylesheet" href="fontawesome/css/all.css">
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> 
<script src="sweetalert/sweetalert.min.js"></script>        

<body>
<div>
<div style="margin-left: 1136px;
    margin-top: 36px">
<a href="test.php" style="margin-top: "  class="btn btn-success p-2 m-2 float-right" name="categorys">Add info</a> </div>

<div class="container" style="margin-top: 64px">  

   
                <div class="table-responsive">  
                <table id="table" class="table table-striped table-bordered">  
                    <thead>  
                      <th><input id="all" type="checkbox" name=""></th>
                      <th> Name</th>
                      <th>Address</th>
                      <th>Email</th>
                      <th>Contact no.</th>
                      <th> city</th>
					  <th> gender</th>
                      <th >image</th>
                      <th>action</th>
                    </thead>
                      <tbody>
                         
                        <?php while ($row = mysqli_fetch_assoc($res)) {  ?>
                        
                  
                        <tr> 
                            <td><input style="padding: 10px "   type="checkbox" name="num[]" value="<?=$row['ID']?>"></td>

                          <td><?php echo $row['name'];?></td>
                          <td><?php echo $row['address'];?></td>
                           <td><?php echo $row['email'];?></td>
                            <td><?php echo $row['cno'];?></td>
                             <td><?php echo $row['city'];?></td>
                              <td><?php echo $row['gender'];?></td>
                          <td><img src="uploads/<?php echo $row['image'];?>" style="width:100px;height: 100px"></td>
                                             
                          <td>
                            <a  href="updateinfo.php?id=<?=$row['id'];?>" class="btn btn-info btn-lg"><span class="fa fa-edit  "></span></a>
                              
                            <a style="background-color: red" id="butt" href="deleteinfo.php?id=<?=$row['id'];?>" class="btn btn-info btn-lg" onclick="return show_warning(this)"><span class="fa fa-trash"></span> </a>  
                          </td>
                        </tr>
                     <?php } ?>
                      </tbody>
                     </table>  
           
                  </div>  
                </div> 
           
          </div>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           
           <script src="datatables/js/jquery.dataTables.min.js"></script>  
           <script src="https:/datatables/css/jquery.dataTables.min.css"></script>            
           
          
<script>  
 $(document).ready(function()
 {  
      $('#table').dataTable();  

 });  
 </script>   
 <script>  
function show_warning(ev){
var link = $(ev).attr("href");

swal({
title: "Are you sure?",
text: "Once deleted, you will not be able to recover this!",
icon: "warning",
buttons: true,
dangerMode: true,
})
.then((willDelete) => {
if (willDelete) {
swal("Poof! Your user has been deleted!", {
buttons: false,
timer: 1000,
});

setTimeout(function(){location.href=link} , 1000);


} else {
swal("Your user is safe!", {
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