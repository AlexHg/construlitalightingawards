<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<div class="container-fluid">
	<div class="row p-top-50">
	<h2 class="text-center">Conoce los proyectos concursantes.</h2>
	<?php 
		// echo "<pre>";
		// print_r($projects);
		// echo "</pre>";
	 ?>
	<!-- filter -->
	<div class="col-sm-8 col-sm-offset-2 text-center p-top-bottom-25 titles">
			<a href="?cat=1" class="hvr-sink btn yellow m-top-5">
				<i class="fa fa-search" aria-hidden="true"></i> <span>EDIFICACIÓN</span>
			</a>
			<a href="?cat=2" class="hvr-sink btn yellow m-top-5">
				<i class="fa fa-search" aria-hidden="true"></i> <span>SERVICIOS Y HOSPITALIDAD</span>
			</a>
			<a href="?cat=3" class="hvr-sink btn yellow m-top-5">
				<i class="fa fa-search" aria-hidden="true"></i> <span>COMERCIAL</span>
			</a>
			<a href="?cat=4" class="hvr-sink btn yellow m-top-5">
				<i class="fa fa-search" aria-hidden="true"></i> <span>EXTERIOR</span>
			</a>
			<a href="?cat=5" class="hvr-sink btn yellow m-top-5">
				<i class="fa fa-search" aria-hidden="true"></i> <span>CONCEPTOS</span>
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
								  <strong>Búsqueda completada!</strong>
								  <a href="registro" class="color-a">REGISTRATE</a> 
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
							    <?php 
							    //var_dump($project);
							     ?>
								<?php $stars = ($project['stars'] =="") && ($project['master'] != $_SESSION['id_user']) ?0:$project['stars'];
								
										$galery = new User();

										$images = $galery->getImages($project['id_project']);
								 ?>
							      <a class="judge-img showcase stylus" style="background-image:url('<?php echo $images[0]["url"]; ?>') ; " data-copy="<?php echo $project['name_project']; ?>" data-ruta="<?php echo $project['path_project']."/"; ?>" data-toggle="modal" data-target=".galeria">
							      <div class="second">
							      	<p class="text-center">
							      		<?php

							      			echo "<span class=text-uppercase>".$project['name_project']."</span><br>"; 
							      			echo "Por: ".$project['name']." ".$project['lastname']; 
							      		?>
							      	</p>
							      	
							      </div>
							      	
							      </a>
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
	<!-- modal for projects 2017 -->
<div class="modal fade galeria" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content text-center">
    <!-- -->
    <style type="text/css">
    	.carrusel{
    		background-size: cover;
    		background-repeat: no-repeat;
    		background-position: top center;
    		width:485px;
    		height:485px;
    	}
    	.next{
    		position:absolute;
    		bottom:0;
    		right:8%;
    		margin-bottom:-35px;
    		opacity: 1;
    	}
    	.next a{
    		opacity:1;
    		background-image:none!important;
    		padding:5px 30px 20px 30px;;
    		margin-right:5px;
    		position:relative;
    	}
    	.next a span{
		    position: absolute;
		    top: 50%!important;
		    transform: translateY(-50%)!important;
		    left: 0!important;
		    right: 0!important;
		    margin: 0 auto!important;
    	}
		.modal {
		  text-align: center;
		  padding: 0!important;
		}

		.modal:before {
		  content: '';
		  display: inline-block;
		  height: 100%;
		  vertical-align: middle;
		  margin-right: -4px;
		}

		.modal-dialog {
		  display: inline-block;
		  text-align: left;
		  vertical-align: middle;
		}
		.lab{
			position: absolute;
			right: 28%;
			bottom: 0;
			margin-bottom: -41px;
		}
    </style>
    <div class="row">
		<div class="col-sm-10 col-sm-offset-1 text-center m-10-60">
		  <div id="myCarousel" class="carousel slide" data-ride="carousel">
		    <!-- Wrapper for slides -->
		    <div class="carousel-inner" role="listbox">
		    	<br>
		    	<div class="item active">
		    		<div class="row">
		    		<div class="col-md-10 col-md-offset-1">
						<img src="public/realizados/edificacion/Edificacion-corporativotrade.jpg" class="img-responsive center-h" alt="Chania"> 
		    		</div>
		    		</div>	
		    	</div>
		    	<div class="item">
		    		<div class="row">
		    		<div class="col-md-10 col-md-offset-1">
						<img src="public/realizados/edificacion/Edificacion-sophia.jpg" class="img-responsive center-h" alt="Chania"> 
		    		</div>
		    		</div>
		    	</div>
		    	<div class="item">
		    		<div class="row">
		    		<div class="col-md-10 col-md-offset-1">
						<img src="public/realizados/edificacion/Edificacion.corporativo arrow.jpg" class="img-responsive center-h" alt="Chania"> 
		    		</div>
		    		</div>
		    	</div>
		    
		    </div>
		    <!-- Left and right controls -->
		  	<div class="col-md-12" style="position:relative">
		  		<p class="lab">Salón de eventos San Isidro</p>
			   	<div class="next">
				    <a class="left carousel-control yellow" href="#myCarousel" role="button" data-slide="prev">
				      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				      <span class="sr-only">Previous</span>
				    </a>
				    <a class="right carousel-control yellow" href="#myCarousel" role="button" data-slide="next">
				      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				      <span class="sr-only">Next</span>
				    </a>
			   	</div>
			</div>
		  </div>
	
		  	
	
		</div>
    </div>
    <!-- -->
    </div>
  </div>
</div>

	<!-- end filter-->
<script src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
<script type="text/javascript">


</script>
	  
	</div>
</div>