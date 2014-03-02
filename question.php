<?php
session_start();
require_once('ExamDAO.php');
require_once('config.php');
$choices= ExamDAO::getAnswer($_SESSION['next']);
$question = ExamDAO::getQuestion($_SESSION['next']);
$max = ExamDAO::questionNumbers();
if(isset($_SESSION['name'])== ""){
	header('Location: login.php');
}else{
	echo "Sign in as : ".$_SESSION['name'];
}


?>
<html>
	<head>
		<title>Examination Web App</title>
		<link type="text" rel="stylesheet" href="css/bootstrap.css">
  		<link type="text" rel="stylesheet" href="style.css"></head>
</head>
	<body id = "bgcolor">
			<?php  include 'header.php';?>
						<center><h1><font color = "black" face = "Century Gothic">Question</h1></font>
				<?php	
				if($_SESSION['next'] > $max){
					header('Location: result.php');
				}

				else{ ?>
	
							<div><?php echo $question; $_SESSION['q'] .= "-".$question;?></div><br>
							<form method = "POST" action = "next.php">
							<?php foreach($choices as $id => $choices): ?>
								<input type = "radio" value = "<?= $choices ?>" name = "option"><?php echo $choices; ?><br>
							<?php  endforeach ?>
								<button id =  "nextbtn" class = "btn btn-primary" id = "nextbtn">NEXT</button>
							</form>
				<?php } ?>
						
					</center>		
				
					</div>
				</div>
			</div>
	</body>
</html>