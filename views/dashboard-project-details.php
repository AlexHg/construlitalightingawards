<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<div class="container-fluid">
<!-- 	<div class="row title-section">
		<div class="col-lg-12 text-center text-uppercase p-top-15 f-gray title-big titles">
			<div class="row">
				<div class="col-sm-4 hidden-xs"><img src="assets/images/yellow.jpg" alt="consulta las bases" class="img-responsive"></div>
				<div class="col-sm-4"><?php echo $projects['name']; ?></div>
				<div class="col-sm-4 hidden-xs"><img src="assets/images/yellow.jpg" alt="consulta las bases" class="img-responsive"></div>
			</div>
		</div>
	</div> -->
	<br>
	<style type="text/css">
		.titles-back{
			background-image: url('assets/images/untitle.jpg');
			background-repeat: no-repeat;
			background-size: cover;
			height: 40px;
		}
		.texto{
			position: absolute;
			font-size: 28px;
			color:#656469;
			font-weight:bold;
			padding-top: 2px;
		}

td.middle{
	text-align:center!important;; 
	vertical-align:middle!important;
}
.rating {
  unicode-bidi: bidi-override;
  direction: rtl;
  width:200px;
  margin: 0 auto;
}
.rating > span {
  display: inline-block;
  position: relative;
  width: 1.1em;
  font-size: 22px;
}
.rating > span:hover:before,
.rating > span:hover ~ span:before {
   content: "\2605";
   position: absolute;
   color:#FFBB19;
}

.active-star:before{
   content: "\2605";
   position: absolute;
   color:#FFBB19;	
}
</style>
	<div class="row" style="position: relative;">
		<div class="col-sm-12 titles-back"></div>
		<div class="col-sm-4 col-sm-offset-4 titles text-uppercase texto text-center"><?php echo $projects['name']; ?></div>
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

	?>
<div class="fixed">
<!-- 	<div><p>Califica este proyecto</p></div> -->
<!-- 	<div class="stars">
		
		<form action="" data-project="<?php echo $_GET['id'];  ?>" >

		  <?php $stars = $_GET["stars"] ?>
		  <input class="star star-5" <?php echo $stars==5?"checked":""; ?> id="star-5" type="radio" name="star"  data-cal="5"/>
		  <label class="star star-5" for="star-5"></label>


		  <input class="star star-4" <?php echo $stars==4?"checked":""; ?> id="star-4" type="radio" name="star" data-cal="4"/>
		  <label class="star star-4" for="star-4"></label>


		  <input class="star star-3" <?php echo $stars==3?"checked":""; ?> id="star-3" type="radio" name="star" data-cal="3"/>
		  <label class="star star-3" for="star-3"></label>


		  <input class="star star-2" <?php echo $stars==2?"checked":""; ?> id="star-2" type="radio" name="star" data-cal="2"/>
		  <label class="star star-2" for="star-2"></label>


		  <input class="star star-1" <?php echo $stars==1?"checked":""; ?> id="star-1" type="radio" name="star" data-cal="1"/>
		  <label class="star star-1" for="star-1"></label>


		</form>
	</div> -->
</div>
	<div class="row">

		
		<div class="col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2 p-top-50">
			<?php
			$ruta ="";
				if( isset($_SESSION['rol'] ) ){
					if( $_SESSION['rol'] == 2 ){
						$ruta = "judge";
					}	
				}else{$ruta = "proyectos-participantes";} 
			?>
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
					<a href="<?php echo $ruta; ?>" onclick="goBack()"><img src="assets/images/regresar.png"></a>
				</div>	

			</div>
<!-- 			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
					<a href="<?php echo $ruta; ?>"><i class="glyphicon glyphicon-arrow-left"></i> Regresar</a>
				</div>	

			</div> -->
			<!-- Slider begin -->
			<div class="row">
				<div class="col-sm-12 col-md-8 col-md-offset-2">
				<!-- begin -->
				<br>
					<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<?php 
						$galery = new User();
						$images = $galery->getImages($projects['id_project']);
					 ?>
					  <ol class="carousel-indicators">
					  	<?php 
					  	foreach ($images as $key => $value) {
					  	?>

							<li data-target="#myCarousel" data-slide-to="<?php echo $key;?>" class="<?php echo $key+1==1?'active':''; ?>" >
							</li>

					  	<?php
					  	}
					  	?>
					  </ol>

					  <div class="carousel-inner" role="listbox">
					  	<?php
			
					  	foreach ($images as $key => $img) {
					  	?>
					  	 	<div class="item pop <?php echo $key+1==1?"active":"";?>">
					  	 		<img src="<?php echo $img['url']; ?>">
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
					<!--<div id="myModal" class="modal">
					  <span class="close">&times;</span>
					  <img class="modal-content" id="img01">
					</div>-->

			
				<!-- final -->
				</div>
			</div>
			<!-- Slider end -->
			<?php
			if($projects['video'] != ""){
				if ($projects['type_video'] == "vimeo") {
			?>
			<div class="row">
				<div class="col-sm-12 col-md-8 col-md-offset-2">
					<blockquote>
						<p class="v-middle">Video:</p>
						<footer>
							<a href="<?php echo $projects['video']; ?>" data-id="<?php echo $projects['video']; ?>" class="open-v-vimeo"  data-toggle="modal" data-target="#open" >Ver ahora</a>
						</footer>
					</blockquote>
				</div>
			</div>
			<?php
				}else{
			?>
			<div class="row">
				<div class="col-sm-12 col-md-8 col-md-offset-2">
					<blockquote>
						<p class="v-middle">Video:</p>
						<footer>
							<a href="<?php echo $projects['video']; ?>" data-id="<?php echo $projects['video']; ?>" class="open-v"  data-toggle="modal" data-target="#open" >Ver ahora</a>
						</footer>
					</blockquote>
				</div>
			</div>
			<?php
				}
			} 
			?>
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
				<h3 class="titles">CATEGORÍA</h3>	
				</div>
			</div>
			<div class="row">
				<?php 
				switch ($projects['category']) {
					case 1:
					?>

					<div class="row">
						<div class="col-sm-12 col-md-8 col-md-offset-2">
							<blockquote>
								<p class="v-middle">Categoria:</p>
								<footer>
								ESPACIOS DE VIVIENDA: Residencial, medio, interés social y fraccionamientos urbanos.
								</footer>
							</blockquote>
						</div>
					</div>

					<?php
						break;
					case 2:
					?>

					<div class="row">
						<div class="col-sm-12 col-md-8 col-md-offset-2">
							<blockquote>
								<p class="v-middle">Categoria:</p>
								<footer>
								COMERCIAL: Tiendas departamentales, boutiques, agencias vehiculares, tiendas minoristas, complejos comerciales, centros turísticos, museos y centros culturales, centros de convenciones, hoteles, restaurantes, bares, cafés, teatros, cines, foros, arenas y centros de espectáculos. 
								</footer>
							</blockquote>
						</div>
					</div>
				
					<?php
						break;
					case 3:
					?>

					<div class="row">
						<div class="col-sm-12 col-md-8 col-md-offset-2">
							<blockquote>
								<p class="v-middle">Categoria:</p>
								<footer>
								ESPACIOS PRODUCTIVOS Y EDUCATIVOS: Oficinas, centros de salud, hospitales, bodegas y naves industriales, plantas, parques industriales, manufactureras, planteles educativos, bibliotecas.
								</footer>
							</blockquote>
						</div>
					</div>

					<?php
						break;
					case 4:
					?>

					<div class="row">
						<div class="col-sm-12 col-md-8 col-md-offset-2">
							<blockquote>
								<p class="v-middle">Categoria:</p>
								<footer>
								ESPACIOS PÚBLICOS: Alumbrado público, puentes y túneles, estructuras, monumentos y fachadas, plazas y jardines públicos, estadios e instalaciones deportivas, aeropuertos, terminales.
								</footer>
							</blockquote>
						</div>
					</div>

					<?php
						break;
					case 5:
					?>

					<div class="row">
						<div class="col-sm-12 col-md-8 col-md-offset-2">
							<blockquote>
								<p class="v-middle">Categoria:</p>
								<footer>
								HOSPITALIDAD: Tiendas departamentales, boutiques, agencias vehiculares, tiendas minoristas, complejos comerciales, centros turísticos, museos y centros culturales, centros de convenciones, hoteles, restaurantes, bares, cafés, teatros, cines, foros, arenas y centros de espectáculos. 
								</footer>
							</blockquote>
						</div>
					</div>
					<?php
						break;
					case 6:
					?>
					<div class="row">
						<div class="col-sm-12 col-md-8 col-md-offset-2">
							<blockquote>
								<p class="v-middle">Categoria:</p>
								<footer>
								HOSPITALIDAD: Tiendas departamentales, boutiques, agencias vehiculares, tiendas minoristas, complejos comerciales, centros turísticos, museos y centros culturales, centros de convenciones, hoteles, restaurantes, bares, cafés, teatros, cines, foros, arenas y centros de espectáculos. 
								</footer>
							</blockquote>
						</div>
					</div>
					<?php
						break;
					default:
						break;
				}
				 ?>
			</div>
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
				<h3 class="titles">DATOS GENERALES</h3>	
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-md-8 col-md-offset-2">
					<blockquote>
						<p class="v-middle">Nombre del proyecto:</p>
						<footer>
							<?php echo $projects['name']; ?>
						</footer>
					</blockquote>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-md-8 col-md-offset-2">
					<blockquote>
						<p class="v-middle">Descripción:</p>
						<footer>
							<?php echo $projects['descripcion']; ?>
						</footer>
					</blockquote>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-md-8 col-md-offset-2">
					<blockquote>
						<p class="v-middle">Uso del inmueble:</p>
						<footer>
							<?php echo $projects['uso']; ?>
						</footer>
					</blockquote>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-md-8 col-md-offset-2">
					<blockquote>
						<p class="v-middle">Direccion:</p>
						<footer>
							<?php echo $projects['direccion']; ?>
						</footer>
					</blockquote>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-md-8 col-md-offset-2">
					<blockquote>
						<p class="v-middle">Sector de construcción:</p>
						<footer>
							<?php echo $projects['tipo']==0?'Publica':'Privada'; ?>
						</footer>
					</blockquote>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-md-8 col-md-offset-2">
					<blockquote>
						<p class="v-middle">Fecha de término de la construcción:</p>
						<footer>
							<?php echo $projects['end']; ?>
						</footer>
					</blockquote>
				</div>
			</div>
<?php  
			if( $_SESSION['rol'] == 3 ) {
	
?>
			<div class="row">
				<div class="col-sm-12 col-md-8 col-md-offset-2">
					<blockquote>
						<p class="v-middle">Arquitecto:</p>
						<footer>
							<?php echo $projects['arquitecto']; ?>
						</footer>
					</blockquote>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-md-8 col-md-offset-2">
					<blockquote>
						<p class="v-middle">Fotógrafo:</p>
						<footer>
							<?php echo $projects['fotografo']; ?>
						</footer>
					</blockquote>
				</div>
			</div>
<?php  
			}
?>
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
				<h3 class="titles">DISEÑO</h3>	
				</div>
			</div>
<?php  
			if( $_SESSION['rol'] == 3 ) {
	
?>
			<div class="row">
				<div class="col-sm-12 col-md-8 col-md-offset-2">
					<blockquote>
						<p class="v-middle">Diseñador de iluminación:</p>
						<footer>
							<?php echo $projects['disenador']; ?>
						</footer>
					</blockquote>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-md-8 col-md-offset-2">
					<blockquote>
						<p class="v-middle">Colaboradores:</p>
						<footer>
							<?php echo $projects['colaboradores']; ?>
						</footer>
					</blockquote>
				</div>
			</div>
<?php  
			}
?>
			<div class="row">
				<div class="col-sm-12 col-md-8 col-md-offset-2">
					<blockquote>
						<p class="v-middle">Concepto inicial y alcance:</p>
						<footer>
							<?php echo $projects['alcance']; ?>
						</footer>
					</blockquote>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-md-8 col-md-offset-2">
					<blockquote>
						<p class="v-middle">Mantenimiento y operación:</p>
						<footer>
							<?php echo $projects['mantenimiento']; ?>
						</footer>
					</blockquote>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-md-8 col-md-offset-2">
					<blockquote>
						<p class="v-middle">Análisis técnico:</p>
						<footer>
							<?php echo $projects['analisis']; ?>
						</footer>
					</blockquote>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-md-8 col-md-offset-2">
					<blockquote>
						<p class="v-middle">Sistema de control de iluminación:</p>
						<footer>
							<?php echo $projects['iluminacion']; ?>
						</footer>
					</blockquote>
				</div>
			</div>
			<?php
				if( isset($_SESSION['rol'] ) ){
					if( $_SESSION['rol'] == 2 ){
			?>
			<div class="row">
				<div class="col-sm-6 col-sm-offset-2">
					<!-- evaluation?id=<?php echo $projects['id_project']; ?>	 -->
					<a href="#" class="btn yellow" data-toggle="modal" data-target="#calificar">CALIFICAR</a>
				</div>			
			</div>					
			<?php
					}	
				} 
			?>
<?php
	if( isset($_SESSION['rol'] ) ){
		if( $_SESSION['rol'] == 2 ){
?>

<?php
		}
	}	
?>
			
		</div>
	</div>
</div>
<div class="modal modal-fullscreen fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">              
      <div class="modal-body">
      	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
        <img src="" class="imagepreview" style="width: 100%;" >
      </div>
    </div>
  </div>
</div>
  <div class="modal fade" id="open" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
<!--         <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div> -->
        <div class="modal-body text-center">
            <iframe width="100%" height="500px" id="video" src="" frameborder="0" allowfullscreen></iframe>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
<style type="text/css">
	/* .modal-fullscreen */

	.modal-fullscreen {
	  background: transparent;
	}
	.modal-fullscreen .modal-content {
	  background: transparent;
	  border: 0;
	  -webkit-box-shadow: none;
	  box-shadow: none;
	}

	/* .modal-fullscreen size: we use Bootstrap media query breakpoints */

	.modal-fullscreen .modal-dialog {
	  margin: 0;
	  margin-right: auto;
	  margin-left: auto;
	  width: 100%;
	}
	@media (min-width: 768px) {
	  .modal-fullscreen .modal-dialog {
	    width: 750px;
	  }
	}
	@media (min-width: 992px) {
	  .modal-fullscreen .modal-dialog {
	    width: 970px;
	  }
	}
	@media (min-width: 1200px) {
	  .modal-fullscreen .modal-dialog {
	     width: 1170px;
	  }
	}
</style>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
<script>
	
		$('.pop').on('click', function() {
			$('.imagepreview').attr('src', $(this).find('img').attr('src'));
			$('#imagemodal').modal('show');   
		});	

		$('body').on('click','.open-v',function(e){
			e.preventDefault();
			var id = $(this).data('id');
			$('#video').attr("src","https://www.youtube.com/embed/"+id);
		});
		$('body').on('click','.open-v-vimeo',function(e){
			e.preventDefault();
			console.log("vimeos");
			var id = $(this).data('id');
			$('#video').attr("src","https://player.vimeo.com/video/"+id+"?autoplay=1&loop=1&autopause=0");
		});
</script>

