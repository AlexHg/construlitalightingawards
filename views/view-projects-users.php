<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<div class="container-fluid">
		<div class="row title-imagen" style="background-image: url('assets/images/proyectos-participantes.png');"></div> 
	<div class="row p-top-50">
	<?php 
		// echo "<pre>";
		// print_r($projects);
		// echo "</pre>";
	 ?>
	<!-- filter -->
	<div class="col-sm-8 col-sm-offset-2 text-center p-top-bottom-25">
			<a href="?cat=1" class="hvr-sink btn yellow m-top-5">
				<i class="fa fa-search" aria-hidden="true"></i> <span>ESPACIOS DE VIVIENDA</span>
			</a>
			<a href="?cat=2" class="hvr-sink btn yellow m-top-5">
				<i class="fa fa-search" aria-hidden="true"></i> <span>ESPACIOS COMERCIALES Y DE HOSPITALIDAD</span>
			</a>
			<a href="?cat=3" class="hvr-sink btn yellow m-top-5">
				<i class="fa fa-search" aria-hidden="true"></i> <span>ESPACIOS PRODUCTIVOS Y EDUCATIVOS</span>
			</a>
			<a href="?cat=4" class="hvr-sink btn yellow m-top-5">
				<i class="fa fa-search" aria-hidden="true"></i> <span>ESPACIOS PÚBLICOS</span>
			</a>
			<a href="?cat=5" class="hvr-sink btn yellow m-top-5">
				<i class="fa fa-search" aria-hidden="true"></i> <span>CONCEPTOS</span>
			</a>
			<a href="proyectos-participantes" class="hvr-sink btn yellow m-top-5">
				<i class="fa fa-search" aria-hidden="true"></i> <span>TODOS</span>
			</a>
		
	</div>
		<section class="content">
						
						<div>
							<?php 

							//var_dump($projects);
						if(count($projects) == 0){
						?>
						<div class="row">
							<div class="col-sm-8 col-sm-offset-2 text-center">
								<div class="alert ">
				
								  <strong>No se ha encontrado algun proyecto en esta categoría.</strong> 
								</div>								
							</div>

						</div>
						<?php
						}else{
						?>
						<?php
							
							foreach($projects as $key=>$project){
							?>

							  <div class="col-sm-6 col-md-4">
							    <div class="thumbnail">
								<?php $stars = ($project['stars'] =="") && ($project['master'] != $_SESSION['id_user']) ?0:$project['stars'];
								
										$galery = new User();

										$images = $galery->getImages($project['id_project']);
								 ?>
							      <a class="judge-img" data-red style="background-image:url('<?php echo $images[0]["url"]; ?>') ; " href="detalles-proyecto?id=<?php echo $project['id_project'];  ?>&stars=<?php echo $stars; ?>">
							      	
							      </a>
							      <div class="caption">
							      	<?php
							      		if($_SESSION['rol'] == 1){
							      			//for admin
							      	?>
								      	<a href="detalles-proyecto?id=<?php echo $project['id_project'];  ?>&stars=<?php echo $stars; ?>">
								        	<h3> <?php echo $project['name_project']; ?></h3>
								        	<h4>Por <?php echo $project['name'].$project['lastname']; ?></h4>
								        	<h5>Registrado: <?php echo $project['time_save']; ?></h5>
								        	<h6>Promedio de calificaciones de este proyecto:
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
							      	<?php
							      		}elseif($_SESSION["rol"] == 2){
							      			// for judge
							      	?>
								      	<a href="detalles-proyecto?id=<?php echo $project['id_project'];  ?>&stars=<?php echo $stars; ?>">
								        	<h3> <?php echo $project['name_project']; ?></h3>
								        	<h4>Por <?php echo $project['name']." ".$project['lastname'];  ?></h4>
								        	<h5>Registrado: <?php echo $project['time_save']; ?></h5>
								        	<h6>Click en el proyecto para más información.</h6>
								        </a>
									<div>

										<div class="text-center color-a">
											Promedio: <?php echo isset($project['stars'])?$project['stars']:'0'; ?>
										</div>
<!-- 									  <div class="stars">
									    <form action="" data-project="<?php echo $project['id_project'];  ?>" >
									      <input class="star star-5-<?php echo $key; ?>" <?php echo $stars==5?"checked":""; ?> id="star-5-<?php echo $key; ?>" type="radio" name="star"  data-cal="5"/>
									      <label class="star star-5-<?php echo $key; ?>" for="star-5-<?php echo $key; ?>"></label>


									      <input class="star star-4-<?php echo $key; ?>" <?php echo $stars==4?"checked":""; ?> id="star-4-<?php echo $key; ?>" type="radio" name="star" data-cal="4"/>
									      <label class="star star-4-<?php echo $key; ?>" for="star-4-<?php echo $key; ?>"></label>


									      <input class="star star-3-<?php echo $key; ?>" <?php echo $stars==3?"checked":""; ?> id="star-3-<?php echo $key; ?>" type="radio" name="star" data-cal="3"/>
									      <label class="star star-3-<?php echo $key; ?>" for="star-3-<?php echo $key; ?>"></label>


									      <input class="star star-2-<?php echo $key; ?>" <?php echo $stars==2?"checked":""; ?> id="star-2-<?php echo $key; ?>" type="radio" name="star" data-cal="2"/>
									      <label class="star star-2-<?php echo $key; ?>" for="star-2-<?php echo $key; ?>"></label>


									      <input class="star star-1-<?php echo $key; ?>" <?php echo $stars==1?"checked":""; ?> id="star-1-<?php echo $key; ?>" type="radio" name="star" data-cal="1"/>
									      <label class="star star-1-<?php echo $key; ?>" for="star-1-<?php echo $key; ?>"></label>

									    </form>
									  </div> -->

									</div>
									<div class="clearfix"></div>
							      	<?php
							      		}else{
							      	?>
								      	<a href="detalles-proyecto?id=<?php echo $project['id_project'];  ?>&stars=<?php echo $stars; ?>">
								        	<h3> <?php echo $project['name_project']; ?></h3>
								        	<h4>Por <?php echo $project['name']." ".$project['lastname'];  ?></h4>
								        	<h5>Registrado: <?php echo $project['time_save']; ?></h5>
								        	<h6>Click en el proyecto para más información.</h6>
								        </a>
							      	<?php
							      		}
							      	 ?>
							      </div>
							    </div>
							  </div>
							<?php
							}
						}
							?>
						</div>
				
				
		
		</section>
		<div class="clearfix"></div>
		<section>
			<div class="col-sm-4 col-sm-offset-4 text-center">
				<ul class="pagination">
				<?php 
					$pages = ceil($indice/6);


					for($x=1; $x <= $pages; $x++){
						$active = isset($_GET['page']) && $_GET['page']== $x?"class=active":"";
				?>
					  <li <?php echo $active; ?>>
					  	<a href="?page=<?php echo $x; ?>"><?php echo $x; ?></a>
					  </li>
				<?php
					}
				 ?>
				</ul>
			</div>
		</section>
	<!-- end filter-->
<script src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
<script type="text/javascript">

	$("input[name=star]").on('click',function(){
		var stars = $(this).data('cal');
		var id = $(this).parent().data('project');
	
			$.ajax({
			    url: 'stars',
			    data:  {id_project:id, 
			    		stars :stars},
			    type: 'POST',

				beforeSend: function( xhr ) {
					
				},
			    success: function(msg) {
			    	if(msg == true){
						swal(
						  'Correcto!',
						  'Se han asignado '+stars+' estrellas a este proyecto!',
						  'success'
						)
			    	}else{
						swal(
						  '',
						  'Lo sentimos en este momento no podemos procesar tu solicitud, intenta mas tarde.',
						  'error'
						)
			    	}
			    },
			    error: function(msg) {
			    	console.log(msg);
					swal(
					  '',
					  'Lo sentimos en este momento no podemos procesar tu solicitud, intenta mas tarde.',
					  'error'
					)
			    }
			   
			})

	});

</script>
	  
	</div>
</div>