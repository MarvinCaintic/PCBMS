	</body>
	
	<div class = "container">
		<hr>
			<span class = "text-muted">
				Copyright &copy; <?php echo date("Y")?>.Marvin B. Caintic. All rights reserved.</span></br></br>
			</span>
		</hr>
	</div>

	<script type="text/javascript" src="../../js/jquery-1.9.1.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.js"></script>
	<script type="text/javascript" src="../../js/bootstrap-datepicker.js"></script>	
	
	<script>
		$('body').on('focus', ".Datepicker", function(){
			$(this).datepicker ();
		});
		
										/* Function for supplier */
		//Respond to the addSupplier button
		$('body').on('click', '#addSupplier', function(e){
			e.preventDefault();
			$.post("add_supplier.php", {TMP:1},
				function(data){
					if(data.length > 0){
						$("#updateForm").html(data);
					}
				});
		});
		
		//Respond to table click
		$('body').on('click', '#suppliers', function(e){
			e.preventDefault();
			var value = document.getElementById('suppliers').value;
			$.post("edit_supplier.php", {SUPPLIERID:value},
				function(data){
					if(value > 0){
						$("#updateForm").html(data);
					}
				});
		});
		
		//Respond to the search textfield
		$('body').on('keyup', '#srchID', function(e){
			e.preventDefault();
			var search = $("input[name=search]").val();
			$.post("SearchSupplier.php", {
				SEARCH:search
				}, function(data){
					if(data.length > 0){
						$("#suppliers").html(data);
					}
				});
		});
		
		//Respond to the saveEditedSupplier button
		$('body').on('click', '#editSupplier', function(e){
			e.preventDefault();
			var action = "save edited";
			var id = document.getElementById('suppliers').value;
			var company = $("input[name=companyName]").val();
			var contact = $("input[name=contactPerson]").val();
			var gender = $("select[name=gender]").val();
			var address = $("input[name=address]").val();
			var phone = $("input[name=phone]").val();
			$.post("save_supplier.php", {
				ACTION:action,
				ID:id,
				COMPANY:company,
				CONTACT:contact,
				GENDER:gender,
				ADDRESS:address,
				PHONE:phone},
				function(data){
					if(data.length > 0){
						$("#suppliers").html(data);
						$("#updateForm").html("<p>Successfully Edited</p>");
					}
				});
		});
		
		//Respond to the delete Supplier button
		$('body').on('click', '#deleteSupplier', function(e){
			e.preventDefault();
			var id = document.getElementById('suppliers').value;
			$.post("delete_supplier.php", {
				ID:id},
				function(data){
					if(data.length > 0){
						$("#suppliers").html(data);
						$("#updateForm").html("<p>Successfully Deleted</p>");
					}
				});
		});
		
		
		//Respond to the saveSupplier button
		$('body').on('click', '#saveSupplier', function(e){
			e.preventDefault();
			var action = "save only";
			var company = $("input[name=companyName]").val();
			var contact = $("input[name=contactPerson]").val();
			var gender = $("select[name=gender]").val();
			var address = $("input[name=address]").val();
			var phone = $("input[name=phone]").val();
			$.post("save_supplier.php", {
				ACTION:action,
				COMPANY:company,
				CONTACT:contact,
				GENDER:gender,
				ADDRESS:address,
				PHONE:phone},
				function(data){
					if(data.length > 0){
						$("#suppliers").html(data);
						$("#updateForm").html("<p>Successfully Added</p>");
					}
				});
		});
		
		
		
		
		
												/* Function for supplier */
		//Respond to the search textfield
		$('body').on('keyup', '#psrchID', function(e){
			e.preventDefault();
			var search = $("input[name=search]").val();
			$.post("SearchProductDelivery.php", {
				SEARCH:search
				}, function(data){
					if(data.length > 0){
						$("#products").html(data);
					}
				});
		});
		
		//Respond to the add delivery button
		$('body').on('click', '#addProductDelivery', function(e){
			e.preventDefault();
			$.post("add_productDelivery.php", {TMP:1},
				function(data){
					if(data.length > 0){
						$("#updateForm").html(data);
					}
				});
		});
		
		//Respond to table click
		$('body').on('click', '#suppliers', function(e){
			e.preventDefault();
			var value = document.getElementById('suppliers').value;
			$.post("edit_supplier.php", {SUPPLIERID:value},
				function(data){
					if(value > 0){
						$("#updateForm").html(data);
					}
				});
		});
		
		
		//Respond to the saveDelivery button
		$('body').on('click', '#editSupplier', function(e){
			e.preventDefault();
			var action = "save edited";
			var id = document.getElementById('suppliers').value;
			var company = $("input[name=companyName]").val();
			var contact = $("input[name=contactPerson]").val();
			var gender = $("select[name=gender]").val();
			var address = $("input[name=address]").val();
			var phone = $("input[name=phone]").val();
			$.post("save_supplier.php", {
				ACTION:action,
				ID:id,
				COMPANY:company,
				CONTACT:contact,
				GENDER:gender,
				ADDRESS:address,
				PHONE:phone},
				function(data){
					if(data.length > 0){
						$("#suppliers").html(data);
						$("#updateForm").html("<p>Successfully Edited</p>");
					}
				});
		});
		
		//Respond to the delete delivery button
		$('body').on('click', '#deleteSupplier', function(e){
			e.preventDefault();
			var id = document.getElementById('suppliers').value;
			$.post("delete_supplier.php", {
				ID:id},
				function(data){
					if(data.length > 0){
						$("#suppliers").html(data);
						$("#updateForm").html("<p>Successfully Deleted</p>");
					}
				});
		});
		
		
		//Respond to the saveDelivery button
		$('body').on('click', '#saveSupplier', function(e){
			e.preventDefault();
			var action = "save only";
			var company = $("input[name=companyName]").val();
			var contact = $("input[name=contactPerson]").val();
			var gender = $("select[name=gender]").val();
			var address = $("input[name=address]").val();
			var phone = $("input[name=phone]").val();
			$.post("save_supplier.php", {
				ACTION:action,
				COMPANY:company,
				CONTACT:contact,
				GENDER:gender,
				ADDRESS:address,
				PHONE:phone},
				function(data){
					if(data.length > 0){
						$("#suppliers").html(data);
						$("#updateForm").html("<p>Successfully Added</p>");
					}
				});
		});
	</script>
</html> 