<?php 
require_once('AdminDAO.php');
require_once('../config.php');

$id = $_REQUEST['id'];
if(!empty($id)){
	$del = AdminDAO::deleteQuestion($id);
	$choices = AdminDAO::deleteChoices($id);
	header('Location: ViewQuestions.php');
}
 ?>