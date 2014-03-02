<?php 
require_once('AdminDAO.php');
require_once('../config.php');
$max = AdminDAO::questionNumbers();
// echo $max + 1;
 ?>
<html>
<head>
	<title>Emamination Web App</title>
	<link type="text" rel="stylesheet" href="../css/bootstrap.css">
  	<link type="text" rel="stylesheet" href="../style.css">
</head>
<body id = "bgcolor">
	<?php  include '../header.php';?>

	<div><a href = "AddQuestion.php"><button class = "btn btn-primary" id = "btn5">Add Question</button></a></div>
	<div><?php for($i = 1; $i <= $max + 1; $i++){
		$j = 0;
		$choices= AdminDAO::getAnswer($i);
		$question = AdminDAO::getQuestion($i);
		if($choices == false || $question == false){
			continue;
		}else{
		?>
		<table border = "2" id = "table">
			<tr>
				<td>
				<?php
				echo $question."<br>";
				?>
				</td>
				<td>
					<a href="EditQuestion.php?id=<?php echo $i; ?>"><button class = "btn btn-primary" id = "btn3">Edit</button></a>
					<a href = "DeleteQuestion.php?id=<?php echo $i; ?>" onclick = "return confirm('Are you sure you want to delete this question?')"><button class = "btn btn-danger" id = "btn4">Delete</button></a>
				</td>
			</tr>
			<tr>
				<td>
				<?php
				foreach($choices as $id => $choices){ $j++;
					echo $choices."<br>";
				} ?>
				</td>
				<td>
				</td>
			</tr>
		</table>
	<?php } } ?>


</div>
</div>
</body>
</html>