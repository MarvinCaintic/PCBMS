<?php
	session_start();
	
	ini_set('max_execution_time', 0);
	
	if(!isset($_SESSION["user_id"])){
		session_destroy();
		header("Location: ../../");
	}
	
	$userID = $_SESSION["user_id"];
	
	include "../../database/MgtSubDAO.php";
	date_default_timezone_set('UTC');
	date_default_timezone_set("Asia/Manila");
	
	$dbs = new MgtDAO();
	
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
	include "../../layouts/MgtSubHeader.php";
?>
<div class = "container">
	<div class = "row">
		<div class = "col-md-12" align = "center">
			<p style = "font-size:60px; text-align:center"> Store Management</p>
		</div>
	</div>
</div>
<?php	include "../../layouts/MgtSubFooter.php";	?>
