<?php 
require_once('AdminDAO.php');

class AdminHandler extends AdminDAO{
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

}
?>