<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
	.change-orient{
		cursor: pointer;
	}
</style>
<div class="container-fluid">
	<div class="row title-imagen" style="background-image: url('assets/images/datos.png');"></div> 
	<!--<div class="row">
		<img src="assets/images/step-1.png" id="temporally" class="img-responsive" alt="registrar nuevo proyecto en construlita">
	</div> -->
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3 p-top-50">
		<div class="row">
			<div class="col-lg-6" style="padding-bottom:20px;">
				<a href="account-profile" ><img src="assets/images/regresar.png"></a>
			</div>	
		</div>
			<form action="update" method="POST" id="update" enctype="multipart/form-data">
				<span class="before-1">
					<div class="row">
						<div class="col-sm-10 col-sm-offset-1">
							<p>Para aquellos participantes que se presenten en parejas o en equipo, deberán inscribir a una persona como representante.</p>		
						</div>
						<div class="col-sm-3 col-sm-offset-1">
							<p class="v-middle">Nombre:</p>
						</div>
						<div class="col-sm-6 name">
							<input type="text" name="name" class="form-control input-reg" value="<?php echo $user['name']; ?>">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm-3 col-sm-offset-1">
							<p class="v-middle">Apellidos:</p>
						</div>
						<div class="col-sm-6 lastname">
							<input type="text" name="lastname" class=" form-control input-reg" value="<?php echo $user['lastname']; ?>">
						</div>
					</div>

				</span>
				<span class="before-2">
					<div class="row">
						<div class="col-sm-10 col-sm-offset-1">
							<h3>OCUPACIÓN</h3>
						</div>
						<div class="col-sm-3 col-sm-offset-1">
							<p class="v-middle">Situación laboral:</p>
						</div>
						<div class="col-sm-6 situacion">
							  <input type="radio" <?php echo $user['labor_situation']=="independiente"?'checked':''; ?> name="situacion" value="independiente">&emsp;Diseñador independiente<br>
							  <input type="radio" <?php echo $user['labor_situation']=="empleado"?'checked':''; ?> name="situacion" value="empleado">&emsp;Empleado o colaborador<br>
							  <input type="radio" <?php echo $user['labor_situation']=="estudiante"?'checked':''; ?> name="situacion" value="estudiante">&emsp;Estudiante
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm-3 col-sm-offset-1">
							<p class="v-middle">Profesión / Estudios:</p>
						</div>
						<div class="col-sm-6 estudios">
							<input type="radio" <?php echo $user['profession']=="Arquitecto"?'checked':''; ?> name="estudios" value="Arquitecto">&emsp;Arquitecto<br>
							<input type="radio" <?php echo $user['profession']=="Diseñador de Iluminación"?'checked':''; ?> name="estudios" value="Diseñador de Iluminación">&emsp;Diseñador de Iluminación<br>
							<input type="radio" <?php echo $user['profession']=="Interiorista"?'checked':''; ?> name="estudios" value="Interiorista">&emsp;Interiorista<br>
							<input type="radio" <?php echo $user['profession']=="Ingeniero"?'checked':''; ?> name="estudios" value="Ingeniero">&emsp;Ingeniero<br>
							<input type="radio" <?php echo $user['profession']=="Paisajista"?'checked':''; ?> name="estudios" value="Paisajista">&emsp;Paisajista<br>
							<input type="radio" <?php echo $user['profession']=="Urbanista"?'checked':''; ?> name="estudios" value="Urbanista">&emsp;Urbanista<br>
							<input type="radio" <?php echo $user['profession']=="Otro"?'checked':''; ?> name="estudios" value="Otro">&emsp;Otro<br>
							<input type="text" value="<?php echo ($user['profession'] != "Arquitecto" && $user['profession'] != "Diseñador de Iluminación" && $user['profession'] != "Interiorista" && $user['profession'] != "Ingeniero" && $user['profession'] != "Paisajista" && $user['profession'] != "Urbanista" )?$user['profession']:''; ?>"" name="otro" class=" form-control input-reg-o" disabled>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm-3 col-sm-offset-1">
							<p class="v-middle">Empresa o Institución:</p>
						</div>
						<div class="col-sm-6 business">
							<input type="text" name="business" class="form-control input-reg" value="<?php echo $user['business']; ?>">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm-3 col-sm-offset-1">
							<p class="v-middle">Integrantes de grupo u otros colaboradores:</p>
						</div>
						<div class="col-sm-6 group">
							<input type="text" name="group" class="form-control input-reg" value="<?php echo $user['members']; ?>">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm-10 col-sm-offset-1">
							<h3>INFORMACIÓN DE CONTACTO</h3>
						</div>
						<div class="col-sm-3 col-sm-offset-1">
							<p class="v-middle">Calle y número.</p>
						</div>
						<div class="col-sm-6 calle">
							<input type="text" name="calle" class="form-control input-reg" value="<?php echo $user['street_number']; ?>">
						</div>
					</div>
					
					<div class="row">
						<div class="col-sm-3 col-sm-offset-1">
							<p class="v-middle">Colonia:</p>
						</div>
						<div class="col-sm-6 colonia">
							<input type="text" name="colonia" class="form-control input-reg" value="<?php echo $user['colonia']; ?>">
						</div>
					</div>
					
					<div class="row">
						<div class="col-sm-3 col-sm-offset-1">
							<p class="v-middle">Municipio o delegación:</p>
						</div>
						<div class="col-sm-6 municipio">
							<input type="text" name="municipio" class="form-control input-reg" value="<?php echo $user['municipio']; ?>">
						</div>
					</div>
					
					<div class="row">
						<div class="col-sm-3 col-sm-offset-1">
							<p class="v-middle">Estado:</p>
						</div>
						<div class="col-sm-6 estado">
							<input type="text" name="estado" class="form-control input-reg" value="<?php echo $user['estado']; ?>">
						</div>
					</div>
					
					<div class="row">
						<div class="col-sm-3 col-sm-offset-1">
							<p class="v-middle">País:</p>
						</div>
						<div class="col-sm-6 pais">
							<input type="text" name="pais" class="form-control input-reg" value="<?php echo $user['country']; ?>">
						</div>
					</div>
					
					<div class="row">
						<div class="col-sm-3 col-sm-offset-1">
							<p class="v-middle">Teléfono:</p>
						</div>
						<div class="col-sm-6 telefono">
							<input type="text" name="telefono" class="form-control input-reg" value="<?php echo $user['phone']; ?>">
						</div>
					</div>

					<br><br>
					<div class="row">
						<div class="col-sm-9 col-sm-offset-1">
							<h3>FOTOGRAFÍA DE PERFIL</h3>
							<p>A continuación, podrás subir tu fotografía personal o grupal. Recuerda que
								solo puedes subir archivos en formato .JPG o .PNG. Te recomendamos que
								tus archivos no pesen más de 10 MB. Para más información sobre los
								formatos, resolución y tipo de fotografías, consulta las  <a href="terminos-y-condiciones">BASES.</a></p>
						</div>
						<div class="col-sm-9 col-sm-offset-1 text-center file msg-imagen">
							<!--<a href="#" class="form-control input-reg p-top-25 height-auto"><span class="glyphicon glyphicon-arrow-up"></span></a>
							<input type="file" id="avatar" name="avatar"> -->
						</div>
					</div>
					<br>
				</span>
				<input type="hidden" name="img-profile-user" value="<?php echo $user['path_image']; ?>">
			</form>
			<div class="row">
				<div class="col-sm-9 col-sm-offset-1">
					<form action="upload-img-ajax" class="dropzone" id="profile">
					  <div class="fallback">
					    <input name="file" type="file" multiple />
					  </div>
					</form>
				</div>
			</div>

	        <div class="row">
	            <div class="col-sm-9 col-sm-offset-1">
	                <table class="table table-bordered table-hover" id="added-articles">
	                    <thead>
	                        <tr>
	                            <td>PREVIEW</td>
	                            <td>NOMBRE DE ARCHIVO</td>
	                            <td>ACCIÓN</td>
	                            <td>ROTAR</td>
	                        </tr>
	                    </thead>
	                    <tbody class="tbody-profile">
	                    	<?php 
	                    	if( $user['path_image'] != "" ){
	                    	$imagen = $user['path_image'];
	                    	$random = rand(0,70);
	                    	$replace = str_replace("public/img-profiles/","",$imagen);
	                    	?>
	                    	<tr>
	                    		<td><img src="<?php echo $imagen; ?>?hash=<?php echo $random; ?>" width="100px"></td>
	                    		<td><?php echo $replace; ?></td>
	                    		<td onclick="deleteImagenTemp(10)"><a>Eliminar</a></td>
	                    		<td class="text-center">
	                    			<i class="fa change-orient fa-undo" data-orientation="left" aria-hidden="true"></i> 
	                    			<i class="fa change-orient fa-repeat" data-orientation="right" aria-hidden="true"></i>
	                    		</td>
	                    	</tr>
	                    	<?php
	                    	}
	                    	?>
	                    </tbody>
	                </table>
	            </div>
	        </div>
			<div class="row" >
				<div class="col-lg-10 col-lg-offset-1 text-center">
						<br><p id="upload-img-profile"></p>												
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1 text-center">
					<button type="submit" class="form-control yellow p-top-9 save-inside">
						<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate" style="display:none"></span>
						GUARDAR PERFIL
					</button>
				</div>
			</div>
		</div>
	</div>
</div>