<?php 
require_once('../../config.php');
require_once('../AdminDAO.php');

	$id = $_POST['id'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$password = $_POST['pass'];
	if(!empty($id) && !empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
		$user = AdminDAO::updateUser($id, $fname, $lname, $email, $password);
		header('Location: ViewUsers.php');
	}else{
		echo 'Failed';
	}
 ?>