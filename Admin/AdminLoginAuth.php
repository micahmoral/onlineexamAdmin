<?php 
session_start();
require_once('../config.php');
require_once('AdminDAO.php');

if(!empty($_POST['email']) && (!empty($_POST['password']))){
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$result = AdminDAO::getUser($email, $pass);
	if($result){
		$_SESSION['name'] = $_POST['email'];
		echo "<script>alert('Login Succesfully!!');window.location.href='MainPage.php'</script>'";
	
	}else{
		header('Location: AdminLogin.php');
	}
}else{
	header('Location: AdminLogin.php');
}

 ?>