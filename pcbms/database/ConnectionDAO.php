<?php
	class ConnectionDAO{
		protected $username = "root";
		protected $password = "";
		protected $host = "localhost";
		protected $db_name = "pcbms_db";
		protected $dbh = null;
		
		public function openConnection(){
			try{
				$this->dbh = new PDO("mysql:host=". $this->host .";dbname=". $this->db_name, $this->username,$this->password);
			}catch(Exception $e){
				$e->getMessage();
			}
		}
		public function closeConnection(){
			try{
				$this->dbh = null;
			}catch(Exception $e){
				$e->getMessage();
			}
		}
		public function selectQuery($qry){
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
		public function deleteTable($table, $id){
			$qry = "";
			$sqry = "DELETE FROM `suppliers` WHERE `supplier_id` = ?";
			if($table == "suppliers")
				$qry = "DELETE FROM `suppliers` WHERE `supplier_id` = ?";
			else if($table == "users")
				$qry = "DELETE FROM `users` WHERE `user_id` = ?";
			
			try{
				$this->openConnection();
				$stmt = $this->dbh->prepare($qry);
				$stmt->bindParam(1,$id);
				$stmt->execute();	
			}catch(Exception $e){
				$e->getMessage();
			}
		}
		public function deleteTable_2($table, $higher_tableId_name, $id){
			if($table == "product_delivery"){
				$qry = "SELECT * FROM ? WHERE ? = ?";
				$product_delivery = $this->selectQuery($qry);
				foreach($product_delivery as $row){
					$this->deleteTable_2("products", "dh_code", $row["delivery_code"]);
				}
			}
			try{
				$this->openConnection();
				$qry = "DELETE * FROM ? WHERE ? = ?";
				$stmt = $this->prepare($qry);
				$stmt->bindParam(1,$table);
				$stmt->bindParam(2,$higher_tableId_name);
				$stmt->bindParam(3,$id);
				$stmt->execute();	
			}catch(Exception $e){
				$e->getMessage();
			}
		}
		
	}
?>