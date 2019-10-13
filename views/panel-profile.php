<div class="container-fluid">
	<br> 
	<div class="row title-imagen" style="background-image: url('assets/images/datos.png');"></div> 
<!-- 	<div class="row yellow p-top-bottom-25 m-top-bottom-20">
		<div class="col-lg-12 text-uppercase text-center f-black">
			<h2>Datos de</h2>
		</div>
	</div> -->
	<?php 
		$user = new User();
		$info = $user->getInfoUSer($_SESSION['token_session']);
		// $galery = new Galery();
		// $imagen_profile = $galery->getFiles($info["path_image"]);
		
		
	 ?>
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3 p-top-25">
		
		    <div class="thumbnail">
		      
		        <img src="<?php echo $info['path_image']; ?>" alt="<?php echo $info['name']; ?>" style="height:300px" class="img-responsive">
		        <div class="caption">
				  <div>
				  	Nombre: <?php echo $info['name'].' '.$info['lastname']; ?>
				  </div>
				  <div>
				  	Email: <?php echo $info['email']?>
				  </div>
		        </div>
		    </div>
		</div>
	</div>
    <div class="row" style="position: relative;display: block;height:30px;">
    	<div class="col-sm-12">
    		<a href="edit-profile" >
			<div style="position: absolute;right:0;">
			  
			  	<img src="assets/images/editar.png">
			  
			</div>	
			</a>
    	</div>
    </div>
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3 p-top-25">
			<h2>Mis proyectos</h2>
			<p>A continuación se enlistan todos tus proyectos registrados en la plataforma.</p>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6 col-lg-offset-3 p-top-25">
			<!-- test begin -->
		<!-- Proyectos finalizados -->
		<?php
		foreach($projects as $key => $project){ 
			if ($key == 0) {
				echo "<div class='col-sm-12'>";
				echo "<h2 class='titles'>PROYECTOS FINALIZADOS</h2>";
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
					echo "<div class='col-sm-12'>";
					echo "<h2 class='titles'>PROYECTOS PENDIENTES</h2>";
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
			<!-- test end -->
			<div class="p-top-50 text-left">
				<?php
					if(count($projects) == 1 || count($projects) <=6){
				?>
<!-- 					<a href="upload-project"><i class="glyphicon glyphicon-plus"></i> Agregar un proyecto</a> -->
					<br>
<!-- 					<a href="upload-project-confirm"><i class="glyphicon glyphicon-eye-open"></i> Ver proyectos pendientes</a> -->
				<?php
					}
				?>
			</div>
		</div>
	</div>


</div>