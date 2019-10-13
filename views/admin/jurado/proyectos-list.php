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
<div class="breadcrumb" style="padding:0;margin:0;display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;">
	<ol class="breadcrumb" style="margin-bottom:0px;">
		<li><a><i class="fa fa-home"></i></a></li>
		<li>Lista de proyectos</li>
	</ol>

	<div style="padding-right:10px;">  
	<?php if($uncalfz == 0) {?>
		No quedan más proyectos por calificar.
	<?php } else { ?>
		Haz calificado <b><? echo $calfz."</b> de <b>".($uncalfz+$calfz); ?></b> proyectos.
	<?php } ?>
	</div>
</div>

<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<div class="container-fluid">
		
	<div class="row">
	<?php 
		// echo "<pre>";
		// print_r($projects);
		// echo "</pre>";
	 ?>
	
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
						<?php $stars = $project['stars'];
							
							$galery = new User();

							$images = $galery->getImages($project['id_project']);
							$cat = $project['category'];
						?>

						<div class="col-sm-6 col-md-4">
							<div class="widget pcard" style="position:relative;">
								<?php if($project['iscal'] == 1 && $key <= 4){ ?>
									<div style="position:absolute;top:-15px;z-index:1000;right:-20px;filter: grayscale(<?php echo 25*$key; ?>%);" class="sepia ">
										<img src="resources/admin/img/ribbon.png" style="width:40px;">
										<span style="position:absolute;top:8px;width:100%;text-align:center;color:red;font-weight:1000;"><? echo $key+1; ?></span> 
									</div>
									
								<?php } ?>
								<div class="widget-advanced">
									<!-- Widget Header -->
									<div class="widget-header text-center themed-background-dark-default" style="background-image:url('<?php echo $images[0]["url"]; ?>');background-position: center;">
										<div class="widget-options">
											<!--<button class="btn btn-xs btn-default" data-toggle="tooltip" title="Love it!"><i class="fa fa-heart text-danger"></i></button>-->
										</div>
										<h3 class="widget-content-light">
											<a href="proyecto-detalles?id=<?php echo $project['id_project'];  ?>&stars=<?php echo $stars; ?>"
												class="themed-color-default" 
												style="background:rgba(0,0,0,.8);padding:4px 10px;display:inline-block;font-size:1.5rem;color:#F6A803!important;" >
												<?php echo $project['name_project']; ?>
											</a>
											<br>
											<small style="background:rgba(0,0,0,.8);padding:4px 10px;margin-top:1rem;display:inline-block;font-size:1.2rem;"><?php echo category_name($cat); ?></small>
										</h3>
									</div>
									<!-- END Widget Header -->

									<!-- Widget Main -->
									<div class="widget-main">
										<a href="proyecto-detalles?id=<?php echo $project['id_project'];  ?>&stars=<?php echo $stars; ?>" class="widget-image-container animation-fadeIn">
											<span class="widget-icon themed-background-default" style="background:url('resources/admin/img/cla/categoria/<?php category_image($cat); ?>')"></span>
										</a>
										<a href="proyecto-detalles?id=<?php echo $project['id_project'];  ?>&stars=<?php echo $stars; ?>" class="btn btn-sm btn-default pull-right">
											<i class="fa fa-calendar"></i> <?php echo $project['time_save']; ?>
										</a>
										<a href="proyecto-detalles?id=<?php echo $project['id_project'];  ?>&stars=<?php echo $stars; ?>" class="btn btn-sm btn-success" >Calificación: <?php echo $stars ==  null ? "0": $stars; ?></a>
									</div>
									<!-- END Widget Main -->
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
			<div class="col-sm-4 col-sm-offset-4 text-center" style="display:none;">
				<ul class="pagination">
				<?php 
					$pages = ceil($indice/6);


					for($x=1; $x <= $pages; $x++){
						$active = isset($_GET['page']) && $_GET['page']== $x?"class=active":"";
				?>
					  <li <?php echo $active; ?>>
					  	<a href="<?php echo $url;?>?page=<?php echo $x; ?>"><?php echo $x; ?></a>
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