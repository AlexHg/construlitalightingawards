
<div class="container-fluid">
	<div class="row yellow p-top-bottom-25 m-top-bottom-20">
		<div class="col-lg-12 text-uppercase text-center f-black">
			<h2>registro</h2>
		</div>
	</div>
	<div class="row">
		<img src="assets/images/step-2.png" class="img-responsive" alt="registrar nuevo proyecto en construlita">
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

		if( ($category[0]["Total"]+$category[1]["Total"]+$category[2]["Total"]+$category[3]["Total"]+$category[4]["Total"]) <= 9  ){
	?>
	<div class="row" id="in">
		<div class="col-lg-6 col-lg-offset-3 p-top-50">
			<form id="new-project" method="POST" action="upload">
				<div class="row">
					<div class="col-sm-8 col-sm-offset-2">
						<h3 >Datos del proyecto</h3>
						<p>Introduce la información del proyecto que deseas registrar. Si quieres mas de un proyecto debes terminar el registro actual para iniciar uno nuevo.</p>		
					</div>
						<div class="col-sm-8 col-sm-offset-2">
							<h4>Categoría</h4>
						</div>
						<div class="col-sm-3 col-sm-offset-2 situacion">
							
						</div>
						<div class="col-sm-5 prorealizados">
							<p class="text-left">PROYECTOS REALIZADOS</p>
							<?php if($category[0]["Total"]<= 1){ ?>
								<div class="row">
									<div class="col-sm-1">
										<input type="radio" name="prorealizados" value="1" required>
									</div>
									<div class="col-sm-11">
										EDIFICACIÓN:iluminación arquitectónica realizada para espacios de trabajo,
										centros de salud, hospitales, escuelas, universidades y otros espacios de usos
										múltiples y generales.
									</div>
								</div>
							<?php } ?>
							<?php if($category[1]["Total"]<= 1){ ?>
								<div class="row">
									<div class="col-sm-1">
										<input type="radio" name="prorealizados" value="2">
									</div>
									<div class="col-sm-11">
										SERVICIOS Y HOSPITALIDAD: iluminación de proyectos enfocados en servicios tales como hoteles, restaurantes, cafeterías, centros culturales y de entretenimiento, bibliotecas, entre otros. 
									</div>
								</div>
							<?php } ?>
							<?php if($category[2]["Total"]<= 1){ ?>
								<div class="row">
									<div class="col-sm-1">
										<input type="radio" name="prorealizados" value="3">
									</div>
									<div class="col-sm-11">
										COMERCIAL: diseño de iluminación interior para espacios comerciales tales como tiendas departamentales, boutiques, agencias vehiculares, tiendas minoristas y complejos comerciales. 
									</div>
								</div>
							<?php } ?>
							<?php if($category[3]["Total"]<= 1){ ?>
								<div class="row">
									<div class="col-sm-1">
										<input type="radio" name="prorealizados" value="4">
									</div>
									<div class="col-sm-11">
										EXTERIOR: proyectos de iluminación exterior desarrollados para espacios públicos, plazas, parques, monumentos, fachadas, puentes e instalaciones deportivas. 
									</div>
								</div>
							<?php } ?>
							<br>
							<p class="text-left">PROYECTOS NO REALIZADOS</p>
							<?php if($category[4]["Total"]<= 1){ ?>
								<div class="row">
									<div class="col-sm-1">
										<input type="radio" name="prorealizados" value="5">
									</div>
									<div class="col-sm-11">
										CONCEPTOS: Propuestas de iluminación que no hayan llegado a la etapa de realización, cuyo objetivo sea resolver, mejorar o rescatar algún espacio interior o exterior.
									</div>
								</div>
							<?php } ?>
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
						<input type="text" name="nomproyecto" required class="form-control input-reg">
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-3 col-sm-offset-2">
						<p class="v-middle">Uso del inmueble:</p>
					</div>
					<div class="col-sm-5 usoinmueble">
						<input type="text" name="usoinmueble" required  class="form-control input-reg">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 col-sm-offset-2">
						<p class="v-middle">Tipo de obra:</p>
					</div>
					<div class="col-sm-5 tipobra">
						<input type="radio" name="tipobra" required value="0">&emsp;Pública<br>
						<input type="radio" name="tipobra" value="1">&emsp;Privada
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 col-sm-offset-2">
						<p class="v-middle">Finalización de la obra:</p>
					</div>
					<div class="col-sm-5 finalobra">
						<input type="text" name="finalobra"  required class="form-control input-reg">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 col-sm-offset-2">
						<p class="v-middle">Diseñador de iluminación:</p>
					</div>
					<div class="col-sm-5 disenadorilumi">
						<input type="text" name="disenadorilumi" required class="form-control input-reg">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 col-sm-offset-2">
						<p class="v-middle">Dirección del proyecto:</p>
					</div>
					<div class="col-sm-5 dirproyecto">
						<input type="text" name="dirproyecto" required class="form-control input-reg">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 col-sm-offset-2">
						<p class="v-middle">Colaboradores:</p>
					</div>
					<div class="col-sm-5 colaboradores">
						<input type="text" name="colaboradores" required class="form-control input-reg">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 col-sm-offset-2">
						<p class="v-middle">Proyecto Arq. por:</p>
					</div>
					<div class="col-sm-5 proyectoarq">
						<input type="text" name="proyectoarq"  required class="form-control input-reg">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 col-sm-offset-2">
						<p class="v-middle">Fotógrafo:</p>
					</div>
					<div class="col-sm-5 fotografo">
						<input type="text" name="fotografo"  required class="form-control input-reg">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 col-sm-offset-2">
						<p class="v-middle">Describe tu proyecto en 800 palabras.(max):</p>
					</div>
					<div class="col-sm-5 fotografo">
						<textarea name="desc_proyecto" rows="8" class="form-control input-reg"></textarea>
						<!--<input type="text" name="fotografo"  required class="form-control input-reg">-->
					</div>
				</div>
				<div class="row">
					<div class="col-sm-8 col-sm-offset-2">
						<h3>Imagénes del proyecto:</h3>
						<p>A continuación podrás subir las imagenes de tu proyecto. Recuerda que hay un limite maximo de
						6 archivos y que estos no deben pesar más de 6MB. Para mas información sobre los formatos,
						resolución y tipo de fotografías consulta las bases.
						</p>
					</div>

				</div>
				<div class="row p-top-25">
					<div class="col-sm-8 col-sm-offset-2 text-center">
						<div class="preview">
							<output id="result" />
						</div>
					</div>		
				</div>
				<div class="row">
					<div class="col-sm-4 col-sm-offset-6 text-right">
						<img src="assets/images/circle.png" id="add_more" width="30">
					</div>
				</div>
				<!--<div class="row">
					<div class="col-sm-4 col-sm-offset-6 text-center">
						
						<input type="button"  class="upload" value="Add More Files"/>
					</div>
				</div>-->
				<div class="row">
					<div class="col-lg-6 col-lg-offset-3">
						<span id="progress-message" class="text-center"></span>
						<progress class="upload-img tool" id="progress" value="0" max="100" data-toggle="tooltip" title="0%"></progress>													
					</div>
				</div>
				<div class="row p-top-50">
					<div class="col-sm-4 col-sm-offset-6 text-center">
						<button type="submit" class="form-control yellow p-top-9">GUARDAR PROYECTO</button>
					</div>
				</div>
					<br>
					<br>				
			</form>
		</div>
	</div>
	<?php 
		}else{
	?>
		<div class="row" id="in">
			<div class="col-lg-6 col-lg-offset-3 p-top-50">
				AL PARECER HAS AGOTADO TU CANTIDAD DE PROYECTOS POR USUARIO!
			</div>
		</div>
	<?php
		}
	 ?>
</div>