<style type="text/css">
	.item img{
		margin: 0 auto;
	}
	.top-50-60{
		margin-top: 50px;
		margin-bottom: 56px;
	}
	.carousel-indicators {
	    position: absolute;
	     bottom: 120px; 
	}
</style>
<div class="container-fluid top-50-60">
	<div class="row" style="padding-bottom: 21px;">
		<div class="col-sm-8 col-sm-offset-2">
			<a href="proyectos-participantes"><img src="assets/images/regresar.png"></a><br>
		</div>	
	</div>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				  <ol class="carousel-indicators">
				<?php  
					foreach($projects as $key => $project){
				?>
					<li data-target="#myCarousel" data-slide-to="<?php echo $key+1; ?>" class="<?php echo $key==0?'active':''; ?>" ></li>
				<?php
					}
				?>
				  </ol>
				<div class="carousel-inner" role="listbox">
				<?php  
					foreach($projects as $key => $project){
				?>
			  	 	<div class="item pop <?php echo $key==0?'active':''; ?>">
			  	 		<a href="detalles-proyecto?id=<?php echo $project['id_project']; ?>">
			  	 			<img src="<?php echo $project['url']; ?>">
							<div class="bgtitle text-center">
								<p><?php echo $project['name']; ?></p>
								<p><?php echo $project['name_user']." ".$project['lastname_user']; ?></p>
								<p>Ver mas información</p>
							</div>
			  	 		</a>
			  	 		
			  	 	</div>
				<?php
					}
				?>
				</div>
				  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
				</div>
		</div>
	</div>
</div>