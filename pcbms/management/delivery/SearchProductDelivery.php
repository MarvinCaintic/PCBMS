<?php
	session_start();
	
	ini_set('max_execution_time', 0);
	
	if(!isset($_SESSION["user_id"])){
		session_destroy();
		header("Location: ../../");
	}
		
	$userID = $_SESSION["user_id"];
	
	include "../../database/ProductDeliveryDAO.php";	
	$dbs = new ProductDeliveryDAO();
	
	$search = $_POST['SEARCH'];
	$suppliers = $dbs->getDelivery($search);
	
	foreach($suppliers as $row){
		if($row == "Empty"){
			echo "<option value = '0'> No supplier yet </option>";
			break;
		}
		$id = $row["supplier_id"];
		echo "<option value = '$id'>".$row['company_name'].", ".$row['contact_person']."</option>";
	}
?>