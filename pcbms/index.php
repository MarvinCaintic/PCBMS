	<?php include "layouts/header.php";?>
	
		<div class = "main-page">
			<div class = "container-fluid">
				<div class = "row" style = "margin-top: 75px">
					<div class = "col-md-9 col-md-offset-1" style = "text-align:center">
						<img src = "images/vsu-logo.png" width = 150 height = 128 sytle = "margin-left:30px; margin-top:30px;"/>
						<h1 style = "font-size:55px; margin-top:80px; Color:#ffffff">Office of the Vice President for Research, Extension and Innovation<br/>
						<div style = "background-color:#fdfdfd; width:1300px; height:2px; margin:0; auto;"></div><br/>
						<span style = "font-size:35px; color:#fffff">Pasalubong Center Business Management Web Application</span>
					</div>
					<div class = "col-md-2" style = "margin-top: 90px;">
						<div class = "well">
							<h3>LOGIN</h3>
							<hr/>
							<form action = "controller/UserLogin.php" method = "POST">
								<div class = "input-group" style = "margin-bottom:10px;">
									<span class = "input-group-addon">
										<i class = "glyphicon glyphicon-user"></i>
									</span>
									<input name = "username" type = "text" placeholder = "User Name" autocomplete = "off" class = "form-control" required/>
								</div>
								<div class = "input-group" style = "margin-bottom:10px;">
									<span class = "input-group-addon">
										<i class = "glyphicon glyphicon-lock"></i>
									</span>
									<input name = "password" type = "password"  placeholder = "Password"  class = "form-control" required/>
								</div>
								<button class = "btn btn-primary">
									<span class = "glyphicon glyphicon-log-in"></span> Login
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

	<?php include "layouts/footer.php";?>