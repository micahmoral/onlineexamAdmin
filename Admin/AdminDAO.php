<?php 

class AdminDAO{
	public static function viewUser($id) {
		global $db;
		$sql = "SELECT * FROM examinee WHERE id = '{$id}'";
		$result = $db->query($sql);
		try{
			if ($result->num_rows > 0){
				$row = $result->fetch_assoc();
				return $row['fname']." ".$row['lname']." ".$row['email']."<br>"."<br>";
			} else {
				return false;
			}
		} catch(Exception $e){
			error_log($e->getMessage());
			return false;
		}
	}
	public static function viewUserInfo($id){
		global $db;
		$sql = "SELECT * FROM `examinee` as a join `examresult` as e on( a.id = e.user_id_fk ) WHERE a.id = '{$id}'";
		$result = $db->query($sql);
		try{
			if ($result) {
				return $row = $result->fetch_assoc();
				
			} else {
				return false;
			}
		} catch(Exception $e){
			error_log($e->getMessage());
			return false;
		}
	}
	public static function updateUser($id, $fname, $lname, $email, $password){
		global $db;
			$sql = "UPDATE `onlineexam`.`examinee` SET  `fname` =  '$fname', `lname` = '$lname', `email` = '$email', `password` = '$password' WHERE  `examinee`.`id` = '{$id}'";
			$result = $db->query($sql);
			if($sql){
				return $result;
			}else{
				return false;
			}
	}
	public static function userNumber() {
		global $db;
		$sql = "SELECT MAX(id) AS id
				FROM examinee	";
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
		$password = sha1($pass);
		$sql = "SELECT * FROM admin where email = '{$email}' AND password = '{$password}'";
		$result = $db->query($sql);
		if($result->num_rows > 0) {
			$question = $result->fetch_assoc();
			return $question;
		}else {
			return false;
		}
	}
	public function deleteUser($id){
		global $db;
		$sql = $db->query("DELETE FROM examinee where `id` = '{$id}'");
		$result = $db->query($sql);
		try{
			if($result){
				return $result;
			}
			else{
				return false;
			}
		} catch(Exception $e){
			error_log($e->getMessage());
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

	public function addQuestion($id, $question){
		global $db;
			$sql = "INSERT INTO `onlineexam`.`questions` (`id`, `question`) VALUES ('$id', '$question')";
			$result = $db->query($sql);	
		try{
			if($sql){
				echo "success";
				return $result;
			}else{
				echo "failed ";
			}	
		} catch(Exception $e){
			error_log($e->getMessage());
			return false;
		}
	}
	public function addChoices($id, $opt, $is_correct, $letter){
		global $db;
			$sql = "INSERT INTO `onlineexam`.`choices` (`id`, `answer`, `letter`, `is_correct`, question_id_fk) 
					VALUES (null, '$opt', '$letter', '$is_correct', '$id')";
			$result = $db->query($sql);	
		try{
			if($result){
				echo "success";
				return $result;
			}else{
				echo "failed ";
			}
		} catch(Exception $e){
			error_log($e->getMessage());
			return false;
		}	
	}

		public function deleteChoices($id){
		global $db;
		$sql = $db->query("DELETE FROM choices where `question_id_fk` = '{$id}'");
		$result = $db->query($sql);
		try{
			if($result){
				return $result;
			}else{
				return false;
			}
		} catch(Exception $e){
			error_log($e->getMessage());
			return false;
		}
	}

	public function deleteQuestion($id){
		global $db;
		$sql = $db->query("DELETE FROM questions where `id` = '{$id}'");
		$result = $db->query($sql);
		try{
			if($result){
				return $result;
			}
			else{
				return false;
			}
		} catch(Exception $e){
			error_log($e->getMessage());
			return false;
		}
	}
}

?>