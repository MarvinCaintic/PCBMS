<?php
	session_start();
	 
	include "../database/UserDao.php";
	
	function password($str){
		return '*'.strtoupper(sha1(pack('H*', sha1($str))));
	}
	
	$username = $_POST["username"];
	$password = $_POST["password"];
	
	$password = password($password);
	$password = substr($password, 0, 20);
	
	$process = new UserDao();
	
	$getResult  = $process->login($username, $password);
	
	foreach($getResult as $row){
		if($row == "Empty"){
			session_destroy();
			header("Location: ../");
		}else{
			$_SESSION["user_id"] = $row['user_id'];
			$_SESSION["username"] = $username;
			$_SESSION["password"] = $password;
			
			if($row['user_type'] == 'POS'){
				header("Location: ../cashier/");
			}else if($row['user_type'] == 'Store manager'){
				header("Location: ../management/");
			}else{
				header("Location: ../");
			}
		}
	}
?>