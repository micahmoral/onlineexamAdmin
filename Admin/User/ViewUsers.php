<?php 
require_once('../../config.php');
require_once('../AdminDAO.php');


$max  = AdminDAO::userNumber();

 ?>
 <html>
 <head>
 	<title>Examination Web App</title>
	<link type="text" rel="stylesheet" href="../../css/bootstrap.css">
  	<link type="text" rel="stylesheet" href="../../style.css">
 </head>
<body id = "bgcolor">
	<?php  include '../../header.php';?>
 	<div>
 		<div>
 			<table border = '1'>
 				<?php for($i = 1; $i <= $max; $i++){   
 					$user = AdminDAO::viewUser($i);
 					if($user === false){

 					}else{
 				 ?>
 				<tr>
 					
 					<td> <a href="viewall.php?id= <?php echo $i; ?>"><?php echo $user; ?></a></td>
 					<td><a href = "EditUser.php?id= <? echo $i; ?>" class = "btn btn-primary" id = "btnEdit">Edit</a></td>
 					<td><a href = "DeleteUser.php?id=<?php echo $i; ?>" onclick = "return confirm('Are you sure you want to delete this user?')" class = "btn btn-danger" id = "btnDel">Delete</a></td>
 				</tr>
 				 <?php } } ?>
 			</table>
 			
 		</div>
 	</div>
 </body>
 </html>