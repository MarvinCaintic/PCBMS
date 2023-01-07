
		<div class = "col-md-12">
			<div class = "well">
				<div class = "form-group form-groupd-md">
					<div class = "row">
						<label class = "control-label col-md-2"> Company Name: </label>
						<div class = "col-md-8">
							<input type = "text" name = "companyName" id = "companyName" autocomplete = "off" class = "form-control" value = "" required/>
						</div>			
					</div>
					<div class = "row" style = "margin-top: 10px">
						<label class = "control-label col-md-2"> Contact Person: </label>
						<div class = "col-md-8">
							<input type = "text" name = "contactPerson" id = "contactPerson" autocomplete = "off" class = "form-control" value = "" required/>
						</div>	
					</div>
					<div class = "row" style = "margin-top: 10px">
						<label class = "control-label col-md-2"> Gender: </label>
						<div class = "col-md-8">
							<select	name = "gender" id = "gender" size = "1">
								<option selected> Male</option>
								<option> Female</option>
								<option> LGBTQ</option>
							</select>
						</div>	
					</div>
					<div class = "row" style = "margin-top: 10px">
						<label class = "control-label col-md-2"> Address: </label>
						<div class = "col-md-8">
							<input type = "text" name = "address" id = "address" autocomplete = "off" class = "form-control" value = "" required/>
						</div>	
					</div>
					<div class = "row" style = "margin-top: 10px">
						<label class = "control-label col-md-2"> Phone </label>
						<div class = "col-md-8">
							<input type = "text" name = "phone" id = "phone" autocomplete = "off" class = "form-control" value = "" required/>
						</div>	
					</div>
					<div class = "row" style = "margin-top: 10px">
						<div class = "col-md-6" style = "text-align: center">
							<button class = "btn btn-success" id = "editSupplier">
								<i class = "fa fa-save"></i> Save
							</button>
						</div>
						<div class = "col-md-6" style = "text-align: center">
							<button class = "btn btn-success" id = "deleteSupplier">
								<i class = "fa fa-arrows-alt"></i> Delete
							</button>
						</div>
					</div>
				</div>
			</div>
			</div>
		</div>
		<?php
			session_start();
			
			ini_set('max_execution_time', 0);
			
			if(!isset($_SESSION["user_id"])){
				session_destroy();
				header("Location: ../../");
			}
				
			$userID = $_SESSION["user_id"];
			
			include "../../database/SupplierDAO.php";	
			$dbs = new SupplierDAO();
			
			$id = $_POST['SUPPLIERID'];
			$supplier = $dbs->getSupplier($id);
			
			foreach($supplier as $row){
				if($row == "Empty")
					break;				
				$cn = $row["company_name"];
				$cp = $row["contact_person"];
				$gen = $row["gender"];
				$add = $row["address"];
				$con = $row["contact_no"];
			}
		?>
		<script type = "text/javascript">
			var id = "<?php echo"$id"?>";
			var cn = "<?php echo"$cn"?>";
			var cp = "<?php echo"$cp"?>";
			var gen = "<?php echo"$gen"?>";
			var add = "<?php echo"$add"?>";
			var con = "<?php echo"$con"?>";
			document.getElementById("companyName").value = cn;
			document.getElementById("contactPerson").value = cp;
			document.getElementById("gender").value = gen;
			document.getElementById("address").value = add;
			document.getElementById("phone").value = con;
		</script>'