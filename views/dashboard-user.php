<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
	.change-orient{
		cursor: pointer;
	}

	.no-line-height{
		line-height: 18px !important;
	}
</style>
<div class="container-fluid">
	<div class="row title-imagen" style="background-image: url('assets/images/datos.png');"></div> 
<!-- 	<div class="row">
		<img src="assets/images/step-1.png" id="temporally" class="img-responsive" alt="registrar nuevo proyecto en construlita">
	</div> -->
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3 p-top-50">
		<div class="row">
			<div class="col-lg-6" style="padding-bottom:20px;">
				<a href="dashboard" ><img src="assets/images/regresar.png"></a>
			</div>	
		</div>

			<span class="before-1">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<h3>DATOS GENERALES</h3>		
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<p class="v-middle">Nombre:</p>
					</div>
					<div class="col-sm-6 name">
						<p><?php echo $user_info['name'];?></p>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-3 col-sm-offset-1">
						<p class="v-middle">Apellidos:</p>
					</div>
					<div class="col-sm-6 lastname">
						<p><?php echo $user_info['lastname'];?></p>
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
							<p><?php echo $user_info['labor_situation'];?></p>
						</div>
					</div>
				

				<br>
				<div class="row">
					<div class="col-sm-3 col-sm-offset-1">
						<p class="v-middle">Profesión / Estudios:</p>
					</div>
					<div class="col-sm-6 estudios">
						<p><?php echo $user_info['profession'];?></p>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-3 col-sm-offset-1">
						<p class="v-middle">Empresa o Institución:</p>
					</div>
					<div class="col-sm-6 business">
						<p><?php echo $user_info['business'];?></p>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-3 col-sm-offset-1">
						<p class="v-middle no-line-height">Integrantes de grupo u otros colaboradores:</p>
					</div>
					<div class="col-sm-6 group">
						<p><?php echo $user_info['members'];?></p>
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
						<p><?php echo $user_info['street_number'];?></p>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-3 col-sm-offset-1">
						<p class="v-middle">Colonia:</p>
					</div>
					<div class="col-sm-6 colonia">
						<p><?php echo $user_info['colonia'];?></p>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-3 col-sm-offset-1">
						<p class="v-middle no-line-height">Municipio o delegación:</p>
					</div>
					<div class="col-sm-6 municipio">
						<p><?php echo $user_info['municipio'];?></p>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-3 col-sm-offset-1">
						<p class="v-middle">Estado:</p>
					</div>
					<div class="col-sm-6 estado">
						<p><?php echo $user_info['estado'];?></p>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-3 col-sm-offset-1">
						<p class="v-middle">País:</p>
					</div>
					<div class="col-sm-6 pais">
						<p><?php echo $user_info['country'];?></p>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-3 col-sm-offset-1">
						<p class="v-middle">Teléfono:</p>
					</div>
					<div class="col-sm-6 telefono">
						<p><?php echo $user_info['phone'];?></p>
					</div>
				</div>
				
				<br><br>
				<div class="row">
					<div class="col-sm-9 col-sm-offset-1">
						<h3>FOTOGRAFÍA DE PERFIL</h3>
						<img src="<?php echo $user_info['path_image']; ?>" class="img-responsive">
					</div>

				</div>
					<br>
			</span>
			<span>
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<?php
						foreach($user_proj as $key => $project){ 
							if ($key == 0) {
								echo "<div class='col-sm-12'>";
								echo "<h3 class='titles'>PROYECTOS FINALIZADOS</h3>";
								echo "</div>";
							}
							$galery = new User();	
							$images = $galery->getImages($project["id_project"]);
							if( $project["status"] == 1 ){ 	
						?>
							<div class="col-sm-12">
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
												<a href="dashboard-project-details?id=<?php echo $project["id_project"]; ?>" class="btn yellow"> <i class="glyphicon glyphicon-ok"></i>&emsp;Detalles&emsp;</a>
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
							foreach($user_proj as $key => $project){ 
								$galery = new User();	
								$images = $galery->getImages($project["id_project"]);
								if ($key == 0) {
									echo "<div class='col-sm-12'>";
									echo "<h3 class='titles'>PROYECTOS PENDIENTES</h3>";
									echo "</div>";
								}
								if( $project["status"] == 0 ){ 
						 ?>	
						<div class="col-sm-12">
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
											<a href="dashboard-project-details?id=<?php echo $project["id_project"]; ?>" class="btn yellow"> <i class="glyphicon glyphicon-ok"></i>&emsp;Detalles&emsp;</a>
	
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
					</div>
				</div>
			</span>


		</div>
	</div>
</div>