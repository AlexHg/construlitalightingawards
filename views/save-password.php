<div class="container-fluid">
	<div class="row title-section" id="edicion2017">
		<div class="col-lg-12 text-center text-uppercase title-big titles f-gray p-top-15">
			<div class="row">
				<div class="col-sm-3 col-md-4 hidden-xs"><img src="assets/images/yellow.jpg" alt="consulta las bases" class="img-responsive"></div>
				<div class="col-sm-6 col-md-4">Cambio de contraseña</div>
				<div class="col-sm-3 col-md-4 hidden-xs"><img src="assets/images/yellow.jpg" alt="consulta las bases" class="img-responsive"></div>
			</div>
			
		</div>
	</div>
	<?php

	if( $auth != false && $auth != "" ){

	?>
		<div class="row m-top-bottom-20" style="color:white">
			<div class="col-sm-4 col-sm-offset-4 gray">
				<div class="row p-top-25">
					<div class="col-sm-10 col-sm-offset-1 text-center">
						<h3>Ingresa tu nueva contraseña</h3>
						<div class="row">
							<div class="col-sm-10 col-sm-offset-1">
								<form action="save-new-password" class="text-left" name="savenew" method="POST">
									<div class="form-group">
										<label>Contraseña:</label>
										<input type="hidden" name="id" value="<?php echo $auth[0]; ?>" required class="form-control" required>
										<input type="hidden" name="email" value="<?php echo $auth[1]; ?>" required class="form-control" required>
										<input type="password" name="pass1" class="form-control" required>
									</div>
									<div class="form-group">
										<label>Repite tu contraseña:</label>
										<input type="password" name="pass2" class="form-control" required>
									</div>
									<div class="form-group">
										<button class="btn btn-default text-uppercase shadow" onClick="return compara();">Enviar</button>	
									</div>
								
									
								</form>	
							</div>
						</div>
						
					</div>
				</div>	
			</div>
		</div>
		<script>
		function compara(e){
			if(document.savenew.pass1.value != "" && document.savenew.pass2.value != "" && document.savenew.pass1.value.length > 7 && document.savenew.pass2.value.length > 7 ){
				if( document.savenew.pass1.value == document.savenew.pass2.value ){
					return true;
				}else{
					alert("Introduce password idénticas");
					return false;	
				}
			}else{
				alert("Introduce un password mínimo de 8 carácteres");
				return false;
			}
		}
		</script>
	<?php
	}else{
	?>
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">

				<div class="jumbotron">
				  <h3>
				  	 <strong>
				  	Tu token no es válido o ha expirado, intenta recuperando tu contraseña nuevamente y asegurate de usar tu cambio de contraseña una vez que abras el enlace que te enviamos.
				  	 </strong>
				  </h3>
				</div>

			</div>
		</div>
	<?php
	}

	?>
</div>