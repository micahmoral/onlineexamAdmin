<?php 
require_once('../../config.php');
require_once('../AdminDAO.php');

$id = $_GET['id'];
$view = AdminDAO::viewUserInfo($id);

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
 		<form method = "POST" action = "UpdateUser.php">
 		<center><h1>Edit User</h1>
 		<input type = "hidden" value = "<?= $id ?>" name = "id">
 		<input type = "text" name = "fname" value = "<?php echo $view['fname']; ?>"><br>
 		<input type = "text" name = "lname" value = "<?= $view['lname'] ?>"><br>
 		<input type = "email" name = "email" value = "<?= $view['email'] ?>"><br>
 		<input type = "password" name = "pass" value = "<?= $view['password'] ?>"><br>
 		<input type = "submit" value = "Update"class = "btn btn-primary" id = "btn6">
 		</form>
 		</center>
 	</div>
 </div>
 </body>
 </html>