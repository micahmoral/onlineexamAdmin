<?php 
session_start();
require_once('config.php');
require_once('ExamDAO.php');
$_SESSION['next'] = 1;
$_SESSION['score'] = 0;
$_SESSION['answer'] = null;
$_SESSION['q'] = null;
$email = $_POST['email'];
$_SESSION['id'] = ExamDAO::getId($email);
if(!empty($_POST['email']) && (!empty($_POST['password']))){
	$email = $_POST['email'];
	$pass = sha1($_POST['password']);
	$result = ExamDAO::getUser($email, $pass);
	
		$_SESSION['name'] = $email;
		echo "<script>alert('Login Succesfully!!');window.location.href='question.php'</script>'";

}else{
	header('Location: login.php');
}

 ?>