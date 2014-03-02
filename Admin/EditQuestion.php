<?php
require_once('AdminDAO.php');
require_once('../config.php');

$id = $_GET['id'];
$choices= AdminDAO::getAnswer($id);
$question = AdminDAO::getQuestion($id);
$i = 1;
 ?>

 <html>
 <head>
 	<title>Examination Web App</title>
	<link type="text" rel="stylesheet" href="../css/bootstrap.css">
  	<link type="text" rel="stylesheet" href="../style.css">
 </head>
<body id = "bgcolor">
 		<?php  include '../header.php';?>
 		<form method = "POST" action = "UpdateQuestion.php">
 		<center><h1>Edit Question</h1>
 		<input type = "text" value = "<?php echo $question; ?>" name = "ques"><br>
 		<input type = "hidden" value = "<?php echo $id; ?>" name = "id">
 		<?php
 			foreach ($choices as $id => $choices){  $i++; $cor = "is_correct".$i; $opt = "opt".$i; ?>
 			<input type = "text" value = "<?php echo $choices; ?>" name = "<?php echo $opt; ?>">
 			<input type = "radio" name = "<?php echo $cor; ?>" value = "0">
 			<input type = "radio" name = "<?php echo $cor; ?>" value = "1"><br>
 			<?php } ?>
 			<input type = "submit" name = "button" value = "Update" class = "btn btn-primary" id = "btn6">
 		</form>
 		</center>
 	</div>
 </body>
 </html>