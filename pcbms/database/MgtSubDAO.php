<?php
	include "../../database/ConnectionDAO.php";
	
	class MgtDAO extends ConnectionDAO{
		function selectQuery($qry){
			try{
				$this->openConnection();
				$stmt = $this->dbh->prepare($qry);
				$stmt->execute();
				
				$ctr = 0;
				while($res = $stmt->fetch(PDO::FETCH_ASSOC)){
					$arrRows[$ctr] = $res;
					$ctr++;
				}
				
				if($ctr < 1){
					return array(0 => "Empty");
				}else{
					return $arrRows;
				}
			}catch(Exception $e){
				$e->getMessage();
				return array(0=>"Empty");
			}
		}
		
		function getUser($userID){
			$qry = "SELECT * FROM `users` WHERE `user_id` = $userID";
			return $this->selectQuery($qry);
		}
	}
?>