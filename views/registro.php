<div class="container-fluid">
	<div class="row title-imagen" style="background-image: url('assets/images/registro.png');"></div> 
<!-- 	<div class="row">
		<img src="assets/images/step-1.png" id="temporally" class="img-responsive" alt="registrar nuevo proyecto en construlita">
	</div> -->
	<div class="row">
		<div class="col-sm-8 col-lg-6 col-sm-offset-2 col-lg-offset-3 p-top-50">
			<!-- STEP 1 -->
			<span class="step-1">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<h3 >DATOS DEL PARTICIPANTE</h3>
						<p>Para aquellos participantes que se presenten en parejas o en equipo, deberán inscribir a una persona como representante.</p>		
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<p class="v-middle">Nombre:</p>
					</div>
					<div class="col-sm-6 name">
						<input type="text" name="name" class="form-control input-reg">
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-3 col-sm-offset-1">
						<p class="v-middle">Apellidos:</p>
					</div>
					<div class="col-sm-6 lastname">
						<input type="text" name="lastname" class=" form-control input-reg">
					</div>
				</div>

				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<h3>CORREO ELECTRÓNICO Y CONTRASEÑA</h3>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<p class="v-middle">Correo electrónico:</p>
					</div>
					<div class="col-sm-6 email">
						<input type="text" name="email" class="form-control input-reg">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 col-sm-offset-1">
						<p class="v-middle">Contraseña:</p>
					</div>
					<div class="col-sm-6 pass1">
						<input type="password" name="password1" class="form-control input-reg">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 col-sm-offset-1">
						<p class="v-middle">Confirmar contraseña:</p>
					</div>
					<div class="col-sm-6 pass2">
						<input type="password" name="password2" class="form-control input-reg">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<p><small>Introduce un dirección de correo válido en la que recibirás tu confirmación de registro, en caso de no recibirla por favor revisa tu bandeja de correo no deseado.</small></p>
					</div>
					
				</div>
				

				<div class="row">
					<div class="col-sm-4 col-sm-offset-6 text-center">
						<a href="#" data-action="next" data-validate="first" data-next="step-1-1" class="form-control yellow p-top-9 action">SIGUIENTE</a>
					</div>
				</div>				
			</span>
			<!-- STEP 1.1 -->
			<span class="step-1-1" style="display:none">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<h3>OCUPACIÓN</h3>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<p class="v-middle">Situación laboral:</p>
					</div>
					<div class="col-sm-6 situacion">
						  <input type="radio" name="situacion" value="independiente">&emsp;Diseñador independiente<br>
						  <input type="radio" name="situacion" value="empleado">&emsp;Empleado o colaborador<br>
						  <input type="radio" name="situacion" value="estudiante">&emsp;Estudiante
					</div>
				</div>

				<br>
				<div class="row">
					<div class="col-sm-3 col-sm-offset-1">
						<p class="v-middle">Profesión / Estudios:</p>
					</div>
					<div class="col-sm-6 estudios">
						  <input type="radio" name="estudios" value="Arquitecto">&emsp;Arquitecto<br>
						  <input type="radio" name="estudios" value="Diseñador de Iluminación">&emsp;Diseñador de Iluminación<br>
						  <input type="radio" name="estudios" value="Interiorista">&emsp;Interiorista<br>
						  <input type="radio" name="estudios" value="Ingeniero">&emsp;Ingeniero<br>
						  <input type="radio" name="estudios" value="Paisajista">&emsp;Paisajista<br>
						  <input type="radio" name="estudios" value="Urbanista">&emsp;Urbanista<br>
						  <input type="radio" name="estudios" value="Otro">&emsp;Otro<br>
						  <input type="text" name="otro" class=" form-control input-reg-o" disabled>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-3 col-sm-offset-1">
						<p class="v-middle">Empresa o Institución:</p>
					</div>
					<div class="col-sm-6 business">
						<input type="text" name="business" class="form-control input-reg">
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-3 col-sm-offset-1">
						<p class="v-middle">Integrantes de grupo u otros colaboradores:</p>
					</div>
					<div class="col-sm-6 group">
						<input type="text" name="group" class="form-control input-reg">
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
						<input type="text" name="calle" class="form-control input-reg">
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-3 col-sm-offset-1">
						<p class="v-middle">Colonia:</p>
					</div>
					<div class="col-sm-6 colonia">
						<input type="text" name="colonia" class="form-control input-reg">
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-3 col-sm-offset-1">
						<p class="v-middle">Municipio o delegación:</p>
					</div>
					<div class="col-sm-6 municipio">
						<input type="text" name="municipio" class="form-control input-reg">
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-3 col-sm-offset-1">
						<p class="v-middle">Estado:</p>
					</div>
					<div class="col-sm-6 estado">
						<input type="text" name="estado" class="form-control input-reg">
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-3 col-sm-offset-1">
						<p class="v-middle">País:</p>
					</div>
					<div class="col-sm-6 pais">
						<input type="text" name="pais" class="form-control input-reg">
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-3 col-sm-offset-1">
						<p class="v-middle">Teléfono:</p>
					</div>
					<div class="col-sm-6 telefono">
						<input type="text" name="telefono" class="form-control input-reg">
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
						<a href="#" class="form-control input-reg p-top-25 height-auto"><span class="glyphicon glyphicon-arrow-up"></span></a>
						 <input type="file" id="avatar" name="avatar">
					</div>
				</div>
					<br>
					<br>

				<div class="row">
					<div class="col-sm-4 col-sm-offset-1 text-center">
						<a href="#" data-action="prev" data-next="step-1" class="form-control yellow p-top-9 action">REGRESAR</a>
					</div>
					<div class="col-sm-4 col-sm-offset-1 text-center">
						<button href="#" data-action="second" data-validate="second" class="form-control yellow action p-top-9">
							<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate" style="display:none"></span>
							GUARDAR PERFIL
						</button>
					</div>
				</div>
				<div class="row" >
					<div class="col-lg-10 col-lg-offset-1 text-center">
							<br><p id="upload-img-profile"></p>												
					</div>
				</div>
			</span>
			<!-- STEP 2 -->
<!-- 			<span id="hide" class="step-2">
				<div class="row">
					<div class="col-sm-8 col-sm-offset-2">
						<h3 >Datos del proyecto</h3>
						<p>Introduce la información del proyecto que deseas registrar. Si quieres mas de un proyecto debes terminar el registro actual para iniciar uno nuevo.</p>		
					</div>
						<div class="col-sm-8 col-sm-offset-2">
							<h3>Categoría</h3>
						</div>
						<div class="col-sm-5 situacion">
							<p class="text-right">PROYECTOS REALIZADOS</p>
						</div>
						<div class="col-sm-5 prorealizados">
							  <input type="radio" name="prorealizados" value="edificacion">&emsp;EDIFICACIÓN<br>
							  <input type="radio" name="prorealizados" value="hospitalidad">&emsp;SERVICIOS Y HOSPITALIDAD<br>
							  <input type="radio" name="prorealizados" value="comercial">&emsp;COMERCIAL
							  <input type="radio" name="prorealizados" value="exterior">&emsp;EXTERIOR
							  <input type="radio" name="prorealizados" value="conceptos">&emsp;CONCEPTOS
						</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-8 col-sm-offset-2">
						<p>Las categorías anteriores se utilizan para organizar los proyectos elegibles y ayudar a los jueces en la revisión de los mismos. En caso
						de ser necesario, los organizadores se reservan el derecho de cambiar los proyectos de la categoría en que fueron inscritos</p>		
					</div>
				</div>
				<br>
				<div class="row">
				<div class="col-sm-3 col-sm-offset-2">
					<p class="v-middle">Nombre del proyecto:</p>
				</div>
				<div class="col-sm-5 nomproyecto">
					<input type="text" name="nomproyecto" class="form-control input-reg">
				</div>
			  </div>
			
			<div class="row">
				<div class="col-sm-3 col-sm-offset-2">
					<p class="v-middle">Uso del inmueble:</p>
				</div>
				<div class="col-sm-5 usoinmueble">
					<input type="text" name="usoinmueble" class="form-control input-reg">
				</div>
			</div>
			<div class="row">
			  <div class="col-sm-3 col-sm-offset-2">
			  <p class="v-middle">Tipo de obra:</p>
		     </div>
		     <div class="col-sm-5 tipobra">
			   <input type="radio" name="tipobra" value="independiente">&emsp;Pública<br>
			   <input type="radio" name="tipobra" value="empleado">&emsp;Privada
		    </div>
			</div>
			<div class="row">
				<div class="col-sm-3 col-sm-offset-2">
					<p class="v-middle">Finalización de la obra:</p>
				</div>
				<div class="col-sm-5 finalobra">
					<input type="text" name="finalobra" class="form-control input-reg">
				</div>
			  </div>
			  <div class="row">
				<div class="col-sm-3 col-sm-offset-2">
					<p class="v-middle">Diseñador de iluminación:</p>
				</div>
				<div class="col-sm-5 disenadorilumi">
					<input type="text" name="disenadorilumi" class="form-control input-reg">
				</div>
			  </div>
			  <div class="row">
				<div class="col-sm-3 col-sm-offset-2">
					<p class="v-middle">Dirección del proyecto:</p>
				</div>
				<div class="col-sm-5 dirproyecto">
					<input type="text" name="dirproyecto" class="form-control input-reg">
				</div>
			  </div>
			  <div class="row">
				<div class="col-sm-3 col-sm-offset-2">
					<p class="v-middle">Colaboradores:</p>
				</div>
				<div class="col-sm-5 colaboradores">
					<input type="text" name="colaboradores" class="form-control input-reg">
				</div>
			  </div>
			  <div class="row">
				<div class="col-sm-3 col-sm-offset-2">
					<p class="v-middle">Proyecto Arq. por:</p>
				</div>
				<div class="col-sm-5 proyectoarq">
					<input type="text" name="proyectoarq" class="form-control input-reg">
				</div>
			  </div>
			  <div class="row">
				<div class="col-sm-3 col-sm-offset-2">
					<p class="v-middle">Fotografo:</p>
				</div>
				<div class="col-sm-5 fotografo">
					<input type="text" name="fotografo" class="form-control input-reg">
				</div>
			  </div>
			  <div class="row">
				<div class="col-sm-8 col-sm-offset-2">
					<h3>Imagénes del proyecto:</h3>
					<p>A continuación podrás subir las imagenes de tu proyecto. Recuerda que hay un limite maximo de
					<br><br>
					6 archivos y que estos no deben pesar más de 6MB. Para mas información sobre los formatos,
					<br><br>
					resolución y tipo de fotografías consulta las bases.
					</p>
				</div>
				<div class="col-sm-8 col-sm-offset-2 text-center fileP file msg-imagen">
					<a href="#" class="form-control input-reg p-top-25 height-auto"><span class="glyphicon glyphicon-arrow-up"></span></a>
					 <input type="file" id="avatarP" name="avatarP">
				</div>
			</div>
			<div class="row p-top-25">
				<div class="col-sm-8 col-sm-offset-2 text-center">
					<div class="previewP">
						
					</div>
				</div>		
			</div>
				<div class="row">
					<div class="col-sm-4 col-sm-offset-6 text-center">
						<a href="#" data-now="step-3" class="form-control yellow save p-top-9">GUARDAR PROYECTO</a>
					</div>
				</div>
				<br>
				<br>				
			</span> -->
		</div>
	</div>
</div>