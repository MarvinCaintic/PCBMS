		<?php
			session_start();
			
			ini_set('max_execution_time', 0);
			
			if(!isset($_SESSION["user_id"])){
				session_destroy();
				header("Location: ../../");
			}
				
			$userID = $_SESSION["user_id"];
			
			include "../../database/ProductDAO.php";	
			$dbs = new ProductDAO();
			
			$id = $_POST['DELIVERY_CODE'];
			$supplier = $dbs->getProducts($id);
		?>
		<div class = "col-md-12">
			<div class = "well">
				<div class = "form-group form-groupd-md">
					<div class = "row">
						<label class = "control-label col-md-3"> Suppliers Company Name: </label>
						<div class = "col-md-8">
							<input type = "text" name = "companyName" autocomplete = "off" class = "form-control" value = "" required/>
						</div>			
					</div>
					<div class = "row" style = "margin-top: 10px">
						<label class = "control-label col-md-3"> Delivery Date: </label>
						<div class = "col-md-3">
							<input type = "date" name = "contactPerson" autocomplete = "off" class = "form-control" value = "" required/>
						</div>	
					</div>
					<div class = "row  col-md-9" style = "margin-top: 10px">
						<label class = "control-label col-md-3"> Products Delivered: </label>
						<div class = "form-group form-group-md">
							<select name = "products" id = "product_delivery" value = "" size = "10" style = "width: 350px">
								<?php
									foreach($products as $row){
										if($row == "Empty"){
											echo "<option value = '0'> No products has been delivered yet </option>";
											break;
										}
										
										$id = $row["delivery_code"];
										for($i = 0; $i < 4; $i++){
											echo "<option value ='$product_name'>".$row['delivery_date']." <td>-</td> ".$row['company_name']."</option>";
										}
									}
								?>
							</select>
						</div>
					</div>
				</div>
			</div>
			</div>
		</div>