<?php
	include "../../database/ConnectionDAO.php";
	
	class SupplierDAO extends ConnectionDAO{
		
		
		function getUser($userID){
			$qry = "SELECT * FROM `users` WHERE `user_id` = $userID";
			return $this->selectQuery($qry);
		}
		
		function getSupplier($supplierID){
			$qry = "SELECT * FROM `suppliers` WHERE `supplier_id` = $supplierID";
			return $this->selectQuery($qry);
		}
		
		function deleteSupplier($id){
			$this->deleteTable("suppliers", $id);
		}
		
		function getSuppliers($part){
			if($part == ""){
				$clause = "company_name LIKE '%'";
			}else{
				$clause = "company_name LIKE '%$part%'";
			}
			$qry = "SELECT * FROM `suppliers` WHERE $clause";
			return $this->selectQuery($qry);
		}
	
		
		function insertSupplier($company, $contact, $gender, $address, $phone){
			$qry = "INSERT INTO `suppliers` (`company_name`, `contact_person`, `gender`, `address`, `contact_no`) VALUES (?, ?, ?, ?, ?)";
			try{
				$this->openConnection();
				$stmt = $this->dbh->prepare($qry);
				$stmt->bindParam(1,$company);
				$stmt->bindParam(2,$contact);
				$stmt->bindParam(3,$gender);
				$stmt->bindParam(4,$address);
				$stmt->bindParam(5,$phone);
				$stmt->execute();
			}catch(Exception $e){
				$e->getMessage();
			}
			return 1;
		}
		function editSupplier($id, $company, $contact, $gender, $address, $phone){
			$qry = "UPDATE `suppliers` SET `company_name` = ?, `contact_person` = ?, `gender` = ?, `address` = ?, `contact_no` = ? WHERE `suppliers`.`supplier_id` = ?";
			try{
				$this->openConnection();
				$stmt = $this->dbh->prepare($qry);
				$stmt->bindParam(1,$company);
				$stmt->bindParam(2,$contact);
				$stmt->bindParam(3,$gender);
				$stmt->bindParam(4,$address);
				$stmt->bindParam(5,$phone);
				$stmt->bindParam(6,$id);
				$stmt->execute();
			}catch(Exception $e){
				$e->getMessage();
				return 0;
			}
			return 1;
		}
		
	}
?>