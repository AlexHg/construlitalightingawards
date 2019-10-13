<div class="container-fluid">
	<div class="row title-section">
		<div class="row title-imagen" style="background-image: url('assets/images/inicio-sesion.png');"></div> 
	</div>
	<?php

		if(isset($_SESSION['alerta'])){
	?>
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1 p-top-50">
				<div class="alert alert-success">
				  <strong><?php echo $_SESSION['alerta']["status"]; ?></strong> <?php echo $_SESSION['alerta']["message"]; ?>
				</div>
			</div>
		</div>
	<?php
		unset($_SESSION['alerta']);
		}

	?>

	<div class="row">
		<div class="col-sm-10 col-sm-offset-1 p-top-50">
			<div class="row">
				<div class="col-sm-6">
					<div class="row">
						<div class="col-sm-11 height-305 yellow">
							<div class="row  p-top-25">
								<div class="col-sm-10 col-sm-offset-1 text-center">
									<h3>REGISTRO DE PARTICIPANTES</h3>
									<br>
									<p>Para participar en Construlita Lighting Awards todos los concursantes deben registrarse a través de esta plataforma.</p>
									<a href="registro"><button class="btn btn-default text-uppercase shadow">Registrarme</button></a>
								</div>
							</div>	
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="row">
						<div class="col-sm-11 col-sm-offset-1 height-305 gray f-white">
							<div class="row p-top-25">
								<div class="col-sm-10 col-sm-offset-1 text-center">
									<h3>ACCESO</h3>
									<div class="row">
										<div class="col-sm-10 col-sm-offset-1">
											<form action="login" class="text-left" method="POST">
												<div class="form-group">
													<label>Correo electrónico:</label>
													<input type="email" name="username" class="form-control" required>
												</div>
												<div class="form-group">
													<label>Contraseña:</label>
													<input type="password" name="password" class="form-control" pattern=".{8,}" title="Mínimo 8 caracteres" required>
												</div>
												<div class="form-group">
													<a href="recuperar-password" class="f-white">Recuperar contraseña</a>
												</div>
												<div class="row">
													<div class="col-sm-5 col-sm-offset-7 text-right">
														<button class="btn btn-default text-uppercase shadow">Entrar</button>	
													</div>
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
	</div>
</div>