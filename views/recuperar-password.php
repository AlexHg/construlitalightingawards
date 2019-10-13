<div class="container-fluid">
	<div class="row title-section" id="edicion2017">
		<div class="col-lg-12 text-center text-uppercase title-big titles f-gray p-top-15">
			<div class="row">
				<div class="col-sm-3 col-md-4 hidden-xs"><img src="assets/images/yellow.jpg" alt="consulta las bases" class="img-responsive"></div>
				<div class="col-sm-6 col-md-4">recuperar contraseña</div>
				<div class="col-sm-3 col-md-4 hidden-xs"><img src="assets/images/yellow.jpg" alt="consulta las bases" class="img-responsive"></div>
			</div>
			
		</div>
	</div>
	<?php

		if(isset($_SESSION['alerta']['type'])){
	?>
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">

				<div class="jumbotron">
				  <h3>
				  	 <strong><?php echo $_SESSION['alerta']["status"]; ?></strong> <?php echo $_SESSION['alerta']["message"]; ?>
				  </h3>
				</div>

			</div>
		</div>
	<?php
		
		}

	?>

	<?php

		if(isset($_SESSION['alerta']) && !$_SESSION['alerta']['type']){
	?>
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<div class="alert alert-success">
				  <strong><?php echo $_SESSION['alerta']["status"]; ?></strong> <?php echo $_SESSION['alerta']["message"]; ?>
				</div>
			</div>
		</div>
	<?php
		
		}
	unset($_SESSION['alerta']);
	?>

	<div class="row">
		<div class="col-sm-10 col-sm-offset-1 p-top-50">
			
		
					<div class="row" style="color:white;">
						<div class="col-sm-11 col-sm-offset-1 gray">
							<div class="row p-top-25">
								<div class="col-sm-10 col-sm-offset-1 text-center">
									<h3>Introduce tu cuenta de correo</h3>
									<div class="row">
										<div class="col-sm-10 col-sm-offset-1">
											<form action="recovery" class="text-left" method="POST">
												<div class="form-group">
													<label>Correo electrónico:</label>
													<input type="email" name="email" class="form-control" required>
												</div>
												
												<div class="form-group">
													<button class="btn btn-default text-uppercase shadow">Enviar</button>	
												</div>
											
												
											</form>	
										</div>
									</div>
									
								</div>
							</div>	
						</div>
					</div>
			
			
		</div>
	</div>
</div>