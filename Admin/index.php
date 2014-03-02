<?php
	session_start();
?>
<html>
<head>
	<title>Emamination Web App</title>
	<link type="text" rel="stylesheet" href="../css/bootstrap.css">
  	<link type="text" rel="stylesheet" href="../style.css">
 </head>
<body id = "bgcolor">
	<?php  include '../header.php';?>
					<center>
						<h1><font color = "black" face = "Century Gothic">Admin Log in</h1></font>
						<form method = "POST" action = "AdminLoginAuth.php">
						<input type = "text" name = "email" style ="margin-left:10px;height:30px;" placeholder = "Email"><br><br>
						<input type = "password" name = "password" style ="margin-left:10px;height:30px;" placeholder = "Password"><br>
						<input type = "submit" class = "btn btn-primary" name = "submit" id = "button3" value = "Log in">
						</form>
					</center>
			</div>
		</div>
	</div>
</body>
</html>