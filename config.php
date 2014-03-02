<?php 
	$config = array(
		'host' => 'localhost',
		'username' => 'root',
		'password' => '',
		'database' => 'onlineexam'
	);

	$db = new mysqli(
		$config['host'],
		$config['username'],
		$config['password'],
		$config['database']
	);

	mysql_connect(
		$config['host'],
		$config['username'],
		$config['password']
		);
	mysql_select_db(
		$config['database']
		);

	if(mysqli_connect_errno()) {
		echo 'Error';
		exit;
	}
 ?>