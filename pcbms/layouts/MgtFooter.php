	</body>
	
	<div class = "container">
		<hr>
			<span class = "text-muted">
				Copyright &copy; <?php echo date("Y")?>.Marvin B. Caintic. All rights reserved.</span></br></br>
			</span>
		</hr>
	</div>

	<script type="text/javascript" src="../js/jquery-1.9.1.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<script type="text/javascript" src="../js/bootstrap-datepicker.js"></script>	

	<script>
		$('body').on('focus', ".Datepicker", function(){
			$(this).datepicker ();
		});
	</script>
</html>