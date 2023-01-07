<?php
	session_start();
	
	ini_set('max_execution_time', 0);
	
	if(!isset($_SESSION["user_id"])){
		session_destroy();
		header("Location: ../../");
	}
		
	$userID = $_SESSION["user_id"];
	
	include "../../database/SupplierDAO.php";
	date_default_timezone_set('UTC');
	date_default_timezone_set("Asia/Manila");
	
	$dbs = new SupplierDAO();
	
	$users = $dbs->getUser($userID);
	foreach($users as $usersRow){
		if($usersRow == "Empty"){
			session_destroy();
			header("Location: ../../");
		}
		$s = " ";
		if(isset($usersRow['prefix'])){
			$user = $usersRow['first_name'].$s.$usersRow['middle_name'].$s.$usersRow['last_name'].$s.$usersRow['prefix'];
		}else{
			$user = $usersRow['first_name'].$s.$usersRow['middle_name'].$s.$usersRow['last_name'];
		}
		$utype = $usersRow['user_type'];
	}
	$suppliers = $dbs->getSuppliers("");
	
	include "../../layouts/MgtSubHeader.php";
?>
<div class = "container">
	<div class = "row">
		<div class = "col-md-12" align = "center">
			<p style = "font-size:60px; text-align:center"> Product Data Management</p>
		</div>
	</div>
	<form id = "myForm" action = "" method = "POST" class = "form-horizontal">
		<div class = "row">
			<div class = "col-md-4">
				<div class = "row">
					<div class = "form-group form-group-md">
						<div class = "col-md-2">
							<button class = "btn btn-success" id = "addSupplier">
								<i class = "fa fa-plus-circle"></i> NEW
							</button>
						</div>
						<div class = "col-md-8">
							<input type = "text" name = "search" id = "psrchID" placeholder = "Type a few letters of the company name" class = "form-control input-md" value = "">
						</div>
					</div>
				</div>
				<div class = "row">
					<div class = "form-group form-group-md">
						<select name = "products" id = "products" value = "" size = "15" style = "width: 350px">
							<?php
								foreach($suppliers as $row){
									if($row == "Empty"){
										echo "<option value = '0'> No products yet </option>";
										break;
									}
									$id = $row["supplier_id"];
									echo "<option value = '$id'>".$row['product_name']." - ".$row['quantity']."</option>";
								}
							?>
						</select>
					</div>
				</div>
			</div>
			<div class = "col-md-8" id = "updateForm">
			</div>
		</div>
	</form>
</div>
	


<?php	include "../../layouts/MgtSubFooter.php";	?>
