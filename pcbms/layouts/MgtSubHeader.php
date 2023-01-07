<!DOCTYPE html>

<html>
	<head> 
		<meta http-equiv = "Content-Type" content = "text/html; charset=utf-8">
		
		<title>Store Management Web Module</title>
		<link rel = "stylesheet" href = "../../css/bootstrap.css"/>
		<link rel = "stylesheet" href = "../../css/font-awesome.min.css"/>
		<link rel = "stylesheet" href = "../../css/bootstrap-customize.css"/>
		<link rel = "stylesheet" href = "../../css/datepicker3.css"/>	
	</head>
	
	<body>
		<nav class = "navbar navbar-default navbar-fixed-top">
			<div class = "container">
				<div class = "navbar-header">
					<a href = "../index.php" class = "navbar-brand" data-toggle = "tooltip" data-placement = "right" title = "Store Management">Store Management</a>
				</div>
				<div class = "collapse navbar-collapse" id = "navbarToggle">
					<ul class = "nav navbar-nav navbar-right">
						<li>
							<a href = "../index.php">
								<i class = "fa fa-home fa-navsize"></i> HOME
							</a>
						</li>
						<li class = "dropdown">
							<a href = "#" class = "dropdown-toggle" data-toggle = "dropdown">
								<span class = "fa fa-pencil-square-o"></span> Order Products<b class = "caret"></b>
							</a>
							<ul class = "dropdown-menu">
								<li>
									<a href = "../purchase/index.php">
										<i class = "fa fa-file-text-o"></i> Purchase Order Products
									</a>
								</li>
								<li class = "divider"></li>
								<li>
									<a href = "../barcode/index.php">
										<i class = "fa fa-file-bookmark-o"></i> Barcode Products
									</a>
								</li>
								<li class = "divider"></li>
								<li>
									<a href = "../expired/index.php">
										<i class = "fa fa-file-bookmark-o"></i> Dispose Expired Products
									</a>
								</li>
							</ul>
						</li>
						<li class = "dropdown">
							<a href = "#" class = "dropdown-toggle" data-toggle = "dropdown">
								<span class = "fa fa-pencil-square-o"></span> Receive Products<b class = "caret"></b>
							</a>
							<ul class = "dropdown-menu">
								<li>
									<a href = "../	supplier/index.php">
										<i class = "fa fa-file-text-o"></i> Suppliers Update
									</a>
								</li>
								<li class = "divider"></li>
								<li>
									<a href = "../quotation/index.php">
										<i class = "fa fa-stack-exchange"></i> Product Quotations
									</a>
								</li>
								<li class = "divider"></li>
								<li>
									<a href = "../delivery/index.php">
										<i class = "fa fa-bookmark-o"></i> Product Delivery
									</a>
								</li>
							</ul>
						</li>
						<li>
							<a href = "../../controller/userLogout.php">
								<span class = "fa fa-sign-out"></span> Logout
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		
		<div class = "row" style = "margin-top: -15px; background-color:#062a66; padding:5px; color:white;">
			<div class = "col-md-6" align = "left">
				<?php
					echo $user;
				?>
			</div>
			<div class = "col-md-6" align = "right">
				<?php
					echo date('jS \of F Y h:i:s A');
				?>
			</div> 	
		</div>
	</body>
</html>