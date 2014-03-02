<?php
session_start();
require_once('config.php');
require_once('ExamDAO.php');

	$name = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$password = sha1($_POST['password']);
	$confirm = $_POST['cpassword'];

	$insert = ExamDAO::createUser($name, $lname, $email, $password);
		if ($insert) {
		echo "<script type = 'text/javascript'>alert('You are now registered!!');window.location.href='login.php'</script>";
		}else{
			echo "error";
		}

?>