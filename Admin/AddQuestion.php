<?php 
require_once('../config.php');
require_once('AdminDAO.php');
$max = AdminDAO::questionNumbers();
$key = $max + 1;
 ?>

 <html>
 <head>
 	<title>Examination Web App</title>
	<link type="text" rel="stylesheet" href="../css/bootstrap.css">
  	<link type="text" rel="stylesheet" href="../style.css">
 </head>
<body id = "bgcolor">
 	<div>
 		<?php  include '../header.php';?>
 		<div>
 			<form method = "POST" action = "AddQuestionPro.php">
 				<center><h1>Add Question</h1>
 				<input type = "text" name = "question"><br>
 				<input type = "hidden" value = "<?php  echo $key; ?>" name = "fk"><br>
 				<?php for($i = 1; $i < 5; $i++){ $choices = "choice".$i; $cor = "correct".$i;
 					?> <input type = "text" name = "<?php echo $choices; ?>">
 					<input type = "radio" name = "<?php echo $cor; ?>" value = "0" >
 					<input type = "radio" name = "<?php echo $cor; ?>" value = "1" ><br>
 					<?php
 				} ?>
 				<input type = "submit" value = "Add Question" class = "btn btn-primary" id = "btnAdd">
 			</form>
 			</center>
 		</div>
 </div>
 </body>
 </html>