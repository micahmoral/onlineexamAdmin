<?php

class ExamDAO {

	public function getId($email){
		global $db;
		$sql = "SELECT * FROM examinee WHERE email = '{$email}'";
		$result = $db->query($sql);
		try{
			if($result){
				while($row = $result->fetch_assoc()){
					return $row['id'];
				}
			
			}else {
				return false;
			}	
		} catch(Exception $e){
			error_log($e->getMessage());
			return false;
		}
	}

	public static function examresult($s, $q, $a, $id) {
			global $db;
		$query = "INSERT INTO examresult (`id`, `question`, `answer`, `score`, `user_id_fk`) 
			VALUES (null, '$q', '$a', '$s', $id)";
		$result = $db->query($query);
		return $result;
	}

	public static function questionNumbers() {
		global $db;
		$sql = "SELECT MAX(id) AS id
				FROM questions";
		$result = $db->query($sql);
		try{
			if ($result) {
				$row = $result->fetch_assoc();
				return $row['id'];
			} else {
				return false;
			}
		} catch(Exception $e){
			error_log($e->getMessage());
			return false;
		}
	}

	public static function getUser($email, $pass){
		global $db;
		$sql = "SELECT * FROM examinee where email = '{$email}' AND password = '{$pass}'";
		$result = $db->query($sql);
		if($result->num_rows > 0) {
			$question = $result->fetch_assoc();
			return $question;
		}else {
			return false;
		}
	}
	public static function createUser(
		$first_name,
		$last_name,
		$email_address,
		$password) {
			global $db;
		$query = "INSERT INTO examinee (fname, lname, email, password) 
			VALUES ('$first_name', '$last_name', '$email_address', '$password')";
		$result = $db->query($query);
		return $result;
	}
	public static function countScore($answer){
		global $db;
			$sql = "SELECT * FROM choices where answer = '{$answer}' and is_correct = '1' ";
			$result = $db->query($sql);
			if ($result->num_rows > 0) {
				session_start();
				$_SESSION['score']++;
			}else{
				return false;
			}
	}
	public static function updateQuestion($id, $question){
		global $db;
			$sql = "UPDATE `onlineexam`.`questions` SET  `question` =  '$question' WHERE  `questions`.`id` = '{$id}'";
			$result = $db->query($sql);
			if($sql){
				return $result;
			}else{
				return false;
			}
	}
	public static function getAnswer($id){
		global $db;
			$sql = "SELECT  * FROM choices WHERE question_id_fk = '{$id}'";
			$result = $db->query($sql);
			if ($result->num_rows > 0) {
			$ans = array();
			for ($i = 0; $i < $result->num_rows; $i++) {
				$row = $result->fetch_assoc();
				$ans[$row['id']] = $row['answer'];
			}
			$result->free();
			return $ans;
		} else {
			return false;
		}
	}
	public static function getQuestion($id){
		global $db;
		if($id <= 10){
			$sql = "SELECT distinct question FROM questions WHERE id = '{$id}'";
			$result = $db->query($sql);
			if($result){
			while($row = $result->fetch_assoc()){
				return $row['question'];
			}
			
		}else {
			return false;
		}
		}
		
	}
	public static function updateChoices($id, $is_correct, $letter, $choices ){
		global $db;
			$sql = "UPDATE choices SET is_correct = '{$is_correct}', answer = '{$choices}' WHERE letter = '{$letter}' AND question_id_fk = '{$id}'";
			$result = $db->query($sql);
			if($sql){
				return $result;
			}else{
				return false;
			}
	}
	
}

?>