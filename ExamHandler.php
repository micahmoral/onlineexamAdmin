<?php 
require_once('ExamDAO.php');

class ExamHandler extends ExamDAO{
	public function testgetQuestion($id){
		try{
			$result = parent::getQuestion($id);
			if($result !== false){
				return true;
			}else{
				return false;
			}catch(Exeption $e){
				error_log($e->getMessage());
				return false;
			}
		}
	}

	public function testgetUser($email, $pass){
		try{
			$result = parent::getUser($email, $pass);
			if($result !== false){
				return true;
			}else{
				return false;
			}catch(Exeption $e){
				error_log($e->getMessage());
				return false;
			}
		}
	}

	public function testcreateUser($first_name,$last_name,$email_address,$password){
		try{
			$result = parent::createUser($first_name,$last_name,$email_address,$password);
			return true;
		}else{
			return false;
		}catch(Exeption $e){
			error_log($e->getMessage());
			return false;
		}
	}

	public function testgetAnswer($id){
		try{
			$result = parent::getAnswer($id);
			if($result !== false){
				return true;
			}else{
				return false;
			}catch(Exeption $e){
				error_log($e->getMessage());
				return false;
			}
		}
	}

	public function testcountScore($answer){
		try{
			$result = parent::countScore($id);
			if($result !== false){
				return true;
			}else{
				return false;
			}catch(Exeption $e){
				error_log($e->getMessage());
				return false;
			}
		}
	}

	public function testupdateQuestion($id, $question){
		try{
			$result = parent::updateQuestion($id);
			if($result !== false){
				return true;
			}else{
				return false;
			}catch(Exeption $e){
				error_log($e->getMessage());
				return false;
			}
		}
	}

}
 ?>