<?php
session_start();
require_once('ExamDAO.php');
require_once('config.php');
$answer = $_POST['option'];


if($answer == ""){
	header('Location: question.php');
}
else{
	$score = ExamDAO::countScore($answer);
	$_SESSION['answers'] .= "-".$_POST['option'];
	$_SESSION['next']++;
	header('Location: question.php');
}

?>