<?php
	session_start();
	
	ini_set('max_execution_time', 0);
	
	if(!isset($_SESSION["user_id"])){
		session_destroy();
		header("Location: ../../");
	}
		
	$userID = $_SESSION["user_id"];
	
	include "../../database/productDeliveryDAO.php";	
	$dbs = new SupplierDAO();
	
	$search = $_POST['SEARCH'];
	$product_delivery = $dbs->getProduct_Delivery($search);
	
	foreach($product_delivery as $row){
		if($row == "Empty"){
			echo "<option value = '0'> No product has been delivered already </option>";
			break;
		}
		$id = $row["supplier_id"];
		echo "<option value = '$id'>".$row['company_name'].", ".$row['contact_person']."</option>";
	}
?>