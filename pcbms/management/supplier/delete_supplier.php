<?php
	session_start();
	
	ini_set('max_execution_time', 0);
	
	if(!isset($_SESSION["user_id"])){
		session_destroy();
		header("Location: ../../");
	}
	
	
	include "../../database/SupplierDAO.php";
	$dbs = new SupplierDAO();
	
	if(!isset($_POST['ID'])){
		return;
	}
	$id = $_POST['ID'];
	$dbs->deleteSupplier($id);
	
	$suppliers = $dbs->getSuppliers("");
	
	foreach($suppliers as $row){
		if($row == "Empty"){
			echo "<option value = '0'> No supplier yet </option>";
			break;
		}
		$id = $row["supplier_id"];
		echo "<option value = '$id'>".$row['company_name'].", ".$row['contact_person']."</option>";
	}
?>