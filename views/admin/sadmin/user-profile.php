
<div class="breadcrumb" style="display:flex;justify-content:space-between;">
    <ol class="breadcrumb" style="margin:0;padding:0;">
        <li><a><i class="fa fa-home"></i></a></li>
        <li>Vista de proyecto</li>
    </ol>
    <div style="display:none;" >
        <a href="#bloquear">Bloquear usuario</a> | 
        <a href="user-profile-edit?id=<?php echo $_GET['id']; ?>">Editar perfil</a>
    </div>
</div>

<div class="container-fluid">

	<div class="content-header content-header-media" style="margin-top:2px;">
		<div class="header-section">
			<img src="<?php echo $user_info['path_image']; ?>" alt="Avatar" style="width:63px; height:63px;background:white;border:3px solid white;" class="pull-right img-circle">
			<h1><?php echo $user_info['name']." ".$user_info['lastname'];?> <br> 
			<small><?php echo $user_info['profession'];?>, <?php echo $user_info['labor_situation'];?></small></h1>
		</div>
		<!-- For best results use an image with a resolution of 2560x248 pixels (You can also use a blurred image with ratio 10:1 - eg: 1000x100 pixels - it will adjust and look great!) -->
		<img src="<?php echo (new User())->getImages($projects[0]['id_project'])[0]['url']; ?>" alt="header image" class="animation-pulseSlow" style="height:auto;margin-top:-50%;">
	</div>

	<div class="row">
		<div class="block">
			<!-- Info Title -->
			<div class="block-title" style="display:flex;justify-content:space-between;">
				<!--<div class="block-options pull-right">
					<a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="" data-original-title="Friend Request"><i class="fa fa-plus"></i></a>
					<a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="" data-original-title="Hire"><i class="fa fa-briefcase"></i></a>
				</div>-->
				<h2>Acerca de <strong><?php echo $user_info['name']." ".$user_info['lastname'];?></strong></h2>
			</div>
			<!-- END Info Title -->

			<!-- Info Content -->
			<table class="table table-borderless table-striped">
				<tbody>
					<tr>
						<td><strong>Teléfono:</strong></td>
						<td><?php echo $user_info['phone'];?></td>
					</tr>
					<tr>
						<td><strong>Correo:</strong></td>
						<td><?php echo $user_info['email'];?></td>
					</tr>
					<tr>
						<td style="width: 20%;"><strong>Actividad:</strong></td>
						<td><?php echo $user_info['labor_situation'];?></td>
					</tr>
					<tr>
						<td><strong>Profesión / Estudios:</strong></td>
						<td><?php echo $user_info['profession'];?></td>
					</tr>
					<tr>
						<td><strong>Empresa o Institución:</strong></td>
						<td><?php echo $user_info['business'];?></td>
					</tr>
					<tr>
						<td><strong>Colaboradores:</strong></td>
						<td><?php echo $user_info['members'];?></td>
					</tr>

					<tr>
						<td><strong>Red social:</strong></td>
						<td><?php echo $user_info['estado'];?></td>
					</tr>

					<!--<tr>
						<td><strong>Calle y número:</strong></td>
						<td><?php echo $user_info['street_number'];?></td>
					</tr>
					<tr>
						<td><strong>Colonia:</strong></td>
						<td><?php echo $user_info['colonia'];?></td>
					</tr>
					<tr>
						<td><strong>Estado:</strong></td>
						<td><?php echo $user_info['estado'];?></td>
					</tr>
					<tr>-->
						<td><strong>Ciudad de residencia:</strong></td>
						<td><?php echo $user_info['municipio'];?></td>
					</tr>
					
					<tr>
						<td><strong>País:</strong></td>
						<td><?php echo $user_info['country'];?></td>
					</tr>
										
				</tbody>
			</table>
			<!-- END Info Content -->
		</div>

		<div class="block1">
			<?php
				function category_name($id) {
					switch ($id) {
							case 1:
								$proyect = "ESPACIOS DE VIVIENDA";
								break;
							case 2:
								$proyect = "ESPACIOS COMERCIALES";
								break;
							case 3:
								$proyect = "ESPACIOS DE TRABAJO";
								break;
							case 4:
								$proyect = "ESPACIOS PÚBLICOS";
								break;
							case 5:
								$proyect = "INSTALACIÓN ARTÍSTICA";
								break;
							case 6:
								$proyect = "ESPACIOS DE HOSPITALIDAD";
								break;
							default;
								break;
					} 
					echo $proyect;
				}
			?>
			<?php 
				function category_image($id){
					$cat_image = "";
					switch ($id) {
						case 1: 
							$cat_image = "espacios-de-vivienda.png";
						break;
						case 2: 
							$cat_image = "espacios-comerciales.png";
						break;
						case 3: 
							$cat_image = "espacios-de-trabajo.png";
						break;
						case 4: 
							$cat_image = "espacios-publicos.png";
						break;
						case 5: 
							$cat_image = "instalacion-artistica.png";
						break;
						case 6:  
							$cat_image = "espacios-de-hospitalidad.png";
						break;
						default:
							break;
					}
					echo $cat_image;
				}
			?>
			<section class="content">			
				<div>
					<?php if(count($projects) == 0){ ?>
						<div class="row">
							<div class="col-sm-8 col-sm-offset-2 text-center">
								<div class="alert ">
				
									<strong>No se ha encontrado ningun proyecto registrado por este usuario.</strong> 
								</div>								
							</div>
						</div>
					<?php }else{ ?>
						<?php foreach($projects as $key=>$project){ ?>
							<?php 
								
								$stars = $project['stars'];
								$galery = new User();
								$images = $galery->getImages($project['id_project']);
								$cat = $project['category'];
								#print_r($project);
							?>
							<div class="col-sm-6 col-md-4">
								<div class="widget">
									<div class="widget-advanced">
										<!-- Widget Header -->
										<div class="widget-header text-center themed-background-dark-default" style="background-image:url('<?php echo $images[0]["url"]; ?>');background-position: center;">
											<div class="widget-options">
												<!--<button class="btn btn-xs btn-default" data-toggle="tooltip" title="Love it!"><i class="fa fa-heart text-danger"></i></button>-->
											</div>
											<h3 class="widget-content-light">
												<a href="dashboard-project-details?id=<?php echo $project['id_project'];  ?>&stars=<?php echo $stars; ?>"
													class="themed-color-default" 
													style="background:rgba(0,0,0,.8);padding:4px 10px;display:inline-block;font-size:1.5rem;color:#F6A803!important;" >
													<?php echo $project['name']; ?>
												</a>
												<br>
												<small style="background:rgba(0,0,0,.8);padding:4px 10px;margin-top:1rem;display:inline-block;font-size:1.2rem;"><?php echo category_name($cat); ?></small>
											</h3>
										</div>
										<!-- END Widget Header -->

										<!-- Widget Main -->
										<div class="widget-main">
											<a href="dashboard-project-details?id=<?php echo $project['id_project'];  ?>&stars=<?php echo $stars; ?>" class="widget-image-container animation-fadeIn">
												<span class="widget-icon themed-background-default" style="background:url('resources/admin/img/cla/categoria/<?php category_image($cat); ?>')"></span>
											</a>
											<a href="dashboard-project-details?id=<?php echo $project['id_project'];  ?>&stars=<?php echo $stars; ?>" class="btn btn-sm btn-default pull-right">
												<i class="fa fa-calendar"></i> <?php echo $project['time_save']; ?>
											</a>
											<a href="dashboard-project-details?id=<?php echo $project['id_project'];  ?>&stars=<?php echo $stars; ?>" class="btn btn-sm <?php echo ($project['status'] == 1)? "btn-success":"btn-warning"; ?>"> <?php echo ($project['status'] == 1)? "Postulado":"Pendiente" ; ?></a>
										</div>
										<!-- END Widget Main -->
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-4" style="display:none">
								<div class="thumbnail">
									<a class="judge-img" data-red style="background-image:url('<?php echo $images[0]["url"]; ?>') ; " href="proyecto-detalles?id=<?php echo $project['id_project'];  ?>&stars=<?php echo $stars; ?>"></a>
									<div class="caption">
										<?php if($_SESSION['rol'] == 1){ //for admin ?>
											<a href="proyecto-detalles?id=<?php echo $project['id_project'];  ?>&stars=<?php echo $stars; ?>">
												<h3> <?php echo $project['name_project']; ?></h3>
												<h4>Por <?php echo $project['name'].$project['lastname']; ?></h4>
												<h5>Registrado: <?php echo $project['time_save']; ?></h5>
												<h6>
													Promedio de calificaciones de este proyecto:
													<?php 
														require_once "functions/User.php";
														$user = new User();
														$rate = $user->getRate($project['id_project']);
														$judges = $user->getRateJudge($project['id_project']);
														$promedio = $rate['promedio'] ==  null ? "0":$rate['promedio'];
														echo $promedio;
													?>
												</h6>
												<?php 
													echo "<table class=table>";
													echo "<thead>";
													echo "<tr>";
													echo "<th>Nombre del jurado</th>";
													echo "<th>Estrellas</th>";
													echo "</tr>";
													echo "</thead>";
													echo "<tbody>";
													foreach ($judges as $key => $judge) {
														$rates = $judge['rate'] == ''?"Sin calificación":$judge['rate'];
														echo "<tr>";
														echo "<th>".$judge['name']." ".$judge['lastname']."</th>";
														echo "<th>".$rates."</th>";
														echo "</tr>";
													}
													echo "</tbody>";
													echo "</table>";
												?>
											</a>
										<?php }elseif($_SESSION["rol"] == 2){ // for judge ?>
											<a href="proyecto-detalles?id=<?php echo $project['id_project'];  ?>&stars=<?php echo $stars; ?>">
												<h3> <?php echo $project['name_project']; ?></h3>
												<h4>Por <?php echo $project['name']." ".$project['lastname'];  ?></h4>
												<h5>Registrado: <?php echo $project['time_save']; ?></h5>
												<h6>Click en el proyecto para más información.</h6>
											</a>
									<div>
									<div class="text-center color-a">
										Promedio: <?php echo isset($project['stars'])?$project['stars']:'0'; ?>
									</div>
								</div>
								<div class="clearfix"></div>
									<?php }else{ ?>
										<a href="detalles?id=<?php echo $project['id_project'];  ?>&stars=<?php echo $stars; ?>">
											<h3> <?php echo $project['name_project']; ?></h3>
											<h4>Por <?php echo $project['name']." ".$project['lastname'];  ?></h4>
											<h5>Registrado: <?php echo $project['time_save']; ?></h5>
											<h6>Click en el proyecto para más información.</h6>
										</a>
									<?php } ?>
								</div>
							</div>
							</div>
						<?php
						}
					}
					?>
				</div>
			</section>
		</div>
		
	</div>
</div>