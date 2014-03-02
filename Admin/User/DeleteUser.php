<?php 
require_once('../AdminDAO.php');
require_once('../../config.php');

$id = $_REQUEST['id'];
if(!empty($id)){
	$user = AdminDAO::deleteUser($id);
	// $del = AdminDAO::deleteQuestion($id);
	// $choices = AdminDAO::deleteChoices($id);
	header('Location: ViewUsers.php');
}
 ?>