<?php
session_start();
require_once('ExamDAO.php');
require_once('config.php');
// if(isset($_SESSION['name'])== ""){
// 	header('Location: login.php');
// }else{
// 	echo "Sign in as: ".$_SESSION['name'];
// }

$answers = explode("-", $_SESSION['answers']);
?>	
<html>
<head>
	<title>Examination Web App</title>
	<link type="text" rel="stylesheet" href="css/bootstrap.css">
  	<link type="text" rel="stylesheet" href="style.css"></head>
</head>
	<body id = "bgcolor">
		<?php  include 'header.php';?>
		<div>

			<div id = "loginname"><?php if(isset($_SESSION['name'])== ""){
							header('Location: login.php');
						}else{
							echo "Sign in as: ".$_SESSION['name'];
						} ?><br>
						<a href="logout.php"><button>Logout</button></a>
			</div>
		
			
				<center><h1><font color = "black" face = "Century Gothic">Results :)</h1></font></center>
				<div style = "color:white;">
					<div id = "score">
						<?php echo "Your total score is : ".$_SESSION['score']; ?>
					</div>
					<?php for($i = 1; $i < 11; $i++){
							echo $i."). ".ExamDAO::getQuestion($i)."<br>";
							echo $answers[$i]."<br>";
					 } 

					 ?>
				</div>		
				
			
			<div>
				<?php 
					$email = $_SESSION['name'];
					$id = ExamDAO::getId($email);
					$a = $_SESSION['answers']."<br>";
					
					$q = $_SESSION['q']."<br>";
					$s = $_SESSION['score']."<br>";
					ExamDAO::examresult($s, $q, $a, $id);
				 ?>
			</div>
		</div>
		
	</body>
</html>	