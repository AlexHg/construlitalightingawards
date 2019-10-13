<div class="container-fluid">
	<div class="row title-imagen" style="background-image: url('assets/images/proyectos.png');"></div> 
<!-- 	<div class="row">
		<img src="assets/images/step-3.png" class="img-responsive" alt="registrar nuevo proyecto en construlita">
	</div> -->
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3 p-top-50">
			<h2 class="titles">CONFIRMAR PROYECTO</h2>
			<p>Puedes participar con dos proyectos como máximo por categoría.</p>
			<h2 class="titles">Mis proyectos</h2>
			<p>A continuación, se enlistan tus proyectos registrados.</p>
		</div>

	</div>
	<!-- begin -->
	<div class="row">

		<?php
			if ( count($projects) == 0 ) {
		?>
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3">
				<p>No has registrado ningún proyecto hasta el momento</p>
			</div>
		</div>
		
		<?php
			}
		?>
		<!-- Proyectos finalizados -->
		<?php
		foreach($projects as $key => $project){ 
			if ($key == 0) {
				echo "<div class='col-sm-12 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3'>";
				echo "<h2 class='titles'>PROYECTOS FINALIZADOS</h2>";
				echo "</div>";
			}
			$galery = new User();	
			$images = $galery->getImages($project["id_project"]);
			if( $project["status"] == 1 ){ 	
		?>
			<div class="col-sm-12 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
				<div class="media">
				  <div class="media-left">
				    <img src="<?php echo $images[0]['url']; ?>" class="media-object" style="width:73px;">
				  </div>
				  <div class="media-body">
					<div class="list-group">
						<div class="row list-group-item gray">
							<div class="col-sm-6 f-white">
									<?php
											switch ($project["category"]) {
											 	case 1:
											 		$proyect = "ESPACIOS DE VIVIENDA";
											 		break;
											 	case 2:
											 		$proyect = "ESPACIOS COMERCIALES Y DE HOSPITALIDAD";
											 		break;
											 	case 3:
											 		$proyect = "ESPACIOS PRODUCTIVOS Y EDUCATIVOS";
											 		break;
											 	case 4:
											 		$proyect = "ESPACIOS PÚBLICOS";
											 		break;
											 	case 5:
											 		$proyect = "CONCEPTOS";
											 		break;
											 	default;
											 		break;
											 } 
										 ?>
									    <h4 class="media-heading"><?php echo $project["name_project"];  ?></h4>
									    <p><?php echo $proyect;  ?></p>							
							</div>
							<div class="col-sm-6" data-id="<?php echo $project["id_project"];  ?>">
								<a href="details-project-confirmed?id=<?php echo $project["id_project"]; ?>" class="btn yellow"> <i class="glyphicon glyphicon-ok"></i>&emsp;Ver&emsp;</a>
							</div>

						</div>	
					</div>
				  </div>
				</div>
			</div>
		<?php
			}
		}
		?>

		<!-- Proyectos inconclusos -->
		<?php
			foreach($projects as $key => $project){ 
				$galery = new User();	
				$images = $galery->getImages($project["id_project"]);
				if ($key == 0) {
					echo "<div class='col-sm-12 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3'>";
					echo "<h2 class='titles'>PROYECTOS PENDIENTES</h2>";
					echo "</div>";
				}
				if( $project["status"] == 0 ){ 
		 ?>	
		<div class="col-sm-12 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
			<div class="media">
			  <div class="media-left">
			    <img src="<?php echo $images[0]['url']; ?>" class="media-object" style="width:73px;">
			  </div>
			  <div class="media-body">
				<div class="list-group">
					<div class="row list-group-item gray">
						<div class="col-sm-6 f-white">
								<?php
										switch ($project["category"]) {
										 	case 1:
										 		$proyect = "ESPACIOS DE VIVIENDA";
										 		break;
										 	case 2:
										 		$proyect = "ESPACIOS COMERCIALES Y DE HOSPITALIDAD";
										 		break;
										 	case 3:
										 		$proyect = "ESPACIOS PRODUCTIVOS Y EDUCATIVOS";
										 		break;
										 	case 4:
										 		$proyect = "ESPACIOS PÚBLICOS";
										 		break;
										 	case 5:
										 		$proyect = "CONCEPTOS";
										 		break;
										 	default;
										 		break;
										 } 
									 ?>
								    <h4 class="media-heading"><?php echo $project["name_project"];  ?></h4>
								    <p><?php echo $proyect;  ?></p>							
						</div>
						<div class="col-sm-6" data-id="<?php echo $project["id_project"];  ?>">
							<?php 
								if( $project["status"] == 1 ){ 

							?>
							<a href="details-project-confirmed?id=<?php echo $project["id_project"]; ?>" class="btn yellow"> <i class="glyphicon glyphicon-ok"></i>&emsp;Ver&emsp;</a>
							<?php
								}else{ 
							 ?>
							<a href="finalize?id=<?php echo $project["id_project"]; ?>" class="btn yellow cn concursar">Concursar</a>
							<a href="details-project?id=<?php echo $project["id_project"];  ?>" class="btn btn-default">Modificar</a>
							<a href="" data-toggle="modal" data-target="#elm" class="btn btn-default eli">Eliminar</a>
							<?php 
								}
							 ?>
						</div>

					</div>	
				</div>
			  </div>
			</div>

		</div>
		<?php 
				}
			}
		 ?>
		<br><br>
	</div>
	<!-- final -->

 	<div class="row">
		<div class="col-lg-6 col-lg-offset-3 p-top-100">
			<div class="row">
				<div class="col-lg-6">
					<a href="upload-project" class="btn black f-white hoverWhite">REGISTRAR OTRO PROYECTO</a>
				</div>
			</div>
		</div>
	</div> 
	<!-- Modal -->
	<div id="cnf" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-lg">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        
	      </div>
	      <div class="modal-body">
		      	<div class="row">
		      		<div class="col-sm-10 col-sm-offset-1">
				        <h2>Condiciones legales:</h2>
				        <div class="row">
				        	<div class="col-sm-1">
				        		<input type="checkbox" name="final" value="1" /><br />
				        	</div>
				        	<div class="col-sm-11">
				        		<h2>DECLARACIÓN DE LIBERACIÓN DE MATERIALES</h2>
				        		<p>En relación a los materiales empleados para el registro de sus proyectos en CLA, el participante que se suscribe, declara ser el propietario de los derechos de autor (o actuar a nombre de este) del material y otorga a Construlita Lighting International S.A. de C.V., el derecho no exclusivo para utilizar todas las fotografías, renders, videos, audios, datos sobre el proyecto (excepto los datos clasificados como confidenciales) y materiales presentados en al momento de registro a través del <a href="http://www.construlitalighting.com/awards_2016/" target="_blank">portal</a>, para fines promocionales, educativos y de difusión. También autoriza a utilizar las imágenes en medios de comunicación de cualquier tipo, en todo el mundo, de forma permanente. </p>
				        		<p>El participante propietario declara que sustenta los derechos de autor sobre los proyectos presentados para la exhibición y distribución de los materiales presentados como parte de la convocatoria de los CLA, garantiza y representa que posee todos los derechos o facultades sobre las fotografías, videos y materiales presentados y por este medio declara y mantiene a Construlita Lighting International S.A. de C.V., empresas relacionadas a Grupo Construlita, licenciatarios, colaboradores y cesionarios de las marcas Construlita y Tecno Lite, miembros del jurado así como a sus empresas y medios asociados fuera de cualquier controversia ocasionada por perjuicio, reclamo, daño, responsabilidad legal, costos y gastos que surjan de la utilización de los mencionados materiales. El concursante autoriza en este acto el uso de los materiales antes mencionados y registrados en el expediente del proyecto.</p>
				        		<p>He leído y acepto las presentes bases, términos y condiciones y es mi deseo participar en Construlita Lighting Awards 2017 (CLA 2017).</p>
				        	</div>
		      		</div>
		      	</div>
		      	<div class="row">
		      		<div class="col-sm-10 col-sm-offset-1 text-center p-top-50">
		      			<a href="finalize?id=<?php echo $_GET["last"] ?>" class="text-center rc btn yellow">&emsp;ENVIAR PROYECTO&emsp;</a>
		      		</div>
		      		
		      	</div>
		      					        	
	        </div>
	      </div>
	      <div class="modal-footer p-0">
	      <img src="assets/images/footer-cnf.jpg" class="img-responsive">
	      </div>
	    </div>

	  </div>
	</div>
	<div id="elm" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        
	      </div>
	      <div class="modal-body">
		      	<div class="row">
		      		<div class="col-sm-10 col-sm-offset-1 text-center">
				        <h2>¿Estas seguro que deseas eliminar este proyecto?</h2>
				    </div>
		      	</div>
		      	<div class="row">
		      		<div class="col-sm-10 col-sm-offset-1 text-center t-top-25">
		      			<a href="#" class="el text-center btn yellow">Eliminar</a>
		      		</div>
		      		
		      	</div>
		      					        	
	        </div>
	      </div>
	      <div class="modal-footer">

	      </div>
	    </div>

	  </div>
	</div>
</div>
<script type="text/javascript">
</script>