<?php 
require_once('../config.php');
require_once('AdminDAO.php');

	$question = $_POST['question'];
	$key = $_POST['fk'];
	$letter = array(null, 'A', 'B', 'C', 'D'); 
	$exam = AdminDAO::addQuestion($key, $question);
	for($i = 1; $i < 5; $i++){
		$choices = $_POST['choice'.$i];
		$cor = $_POST['correct'.$i];
		$letters = $letter[$i];
		if(!empty($choices) && !empty($letters)){
			$choices = AdminDAO::addChoices($key, $choices, $cor, $letters);
			
		}else{
			echo "<script>alert('Failed');window.location.href='AddQuestion.php'</script>'";
		}
	}
	header('Location: ViewQuestions.php');
 ?>