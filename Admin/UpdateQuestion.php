<?php 
require_once('AdminDAO.php');
require_once('../config.php');
$letters = array(null, 'A', 'B', 'C', 'D');
$ques = $_POST['ques'];
$id = $_POST['id'];
$question = AdminDAO::updateQuestion($id, $ques);

for($i = 1; $i < 5; $i++){
	$letter = $letters[$i];
	$is_correct = $_POST['is_correct'.$i];
	$opt = $_POST['opt'.$i];
	if(!empty($opt)){
		$choices = AdminDAO::updateChoices($id, $is_correct, $letter, $opt);
		header('Location: ViewQuestions.php');
	}
}
	
 ?>