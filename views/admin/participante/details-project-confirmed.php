<script type="text/javascript">
			function goBack() {
			    window.history.back();
			}
</script>

<ol class="breadcrumb">
    <li><a href="participante"><i class="fa fa-home"></i></a></li>
    <li>Proyecto</li>
</ol>

<div class="container-fluid">
	<div class="row" style="position: relative;">
		<div class="col-sm-12 titles-back"></div>
		<div class="col-sm-4 col-sm-offset-4 titles text-uppercase texto text-center"><?php echo $projects['name']; ?></div>
	</div>

	<?php if(isset($_SESSION['alerta'])){ ?>
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1 p-top-50">
				<div class="alert alert-success">
				  <strong><?php echo $_SESSION['alerta']["status"]; ?></strong> <?php echo $_SESSION['alerta']["message"]; ?>
				</div>
			</div>
		</div>
	<?php unset($_SESSION['alerta']);} ?>

	<div class="row">		
		<div class="col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2 p-top-50">
			
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

			<!-- test tabs navs -->
			<div class="row">
				<div class="col-sm-12 col-md-12 ">


<div class="tab-content">
	<?php
	if( $projects['video'] != "" && $projects['video'] != NULL ){
	?>
	<div id="video" class="">
	<div class="row">
		<div class="col-sm-12 col-md-8 col-md-offset-2">
			<blockquote>
				<p class="v-middle">Video:</p>
				<footer>
					<a  data-id="<?php echo $projects['video']; ?>"  class="see-video" data-toggle="modal" data-target="#video-preview" >Ver ahora</a>
				</footer>
			</blockquote>
		</div>
	</div>
	</div>
	<?php
	}  
	?>
		<br><br>
  <div id="categoria" class="">
<!-- 	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
		<h3 class="titles">CATEGORÍA</h3>	
		</div>
	</div> -->
	<div class="row">
		<?php 
		switch ($projects['category']) {
			case 1:
			?>

			<div class="row">
				<div class="col-sm-12 col-md-8 col-md-offset-2">
					<blockquote>
						<p class="v-middle">Categoría:</p>
						<footer>
						ESPACIOS DE VIVIENDA: Buscamos proyectos en los que la iluminación mejore la habilidad de cualquier espacio residencial. También se incluyen fraccionamientos y conjuntos habitacionales.
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
						<p class="v-middle">Categoría:</p>
						<footer>
						ESPACIOS COMERCIALES: Buscamos proyectos que potencien la finalidad comercial del espacio y mejoren la exhibición de productos. Esta categoría incluye tiendas minoristas y mayoristas como: tiendas especializadas, departamentales, de autoservicio, agencias vehiculares, fashion malls y otros complejos comerciales. 
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
						<p class="v-middle">Categoría:</p>
						<footer>
						ESPACIOS DE TRABAJO: Buscamos proyectos en los que la iluminación facilite el desarrollo de actividades orientadas al servicio y la productividad. Esta categoría incluye: oficinas, centros de salud, hospitales, bodegas y naves industriales, plantas manufactureras, parques industriales, planteles educativos, edificios públicos y sucursales bancarias.
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
						<p class="v-middle">Categoría:</p>
						<footer>
						ESPACIOS PÚBLICOS: Buscamos espacios exteriores cuya iluminación cubra una necesidad funcional específica, facilite la movilidad en cualquier escala o realce los atributos arquitectónicos y patrimoniales del espacio, inmueble o monumento que ilumina. Esta categoría incluye proyectos de alumbrado público, iluminación de puentes, túneles, estructuras, monumentos y fachadas, así como plazas y jardines públicos.
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
						<p class="v-middle">Categoría:</p>
						<footer>
						INSTALACIÓN ARTÍSTICA: Buscamos piezas de iluminación que hayan sido exhibidas durante un periodo acotado de tiempo o formen parte de una colección específica. En esta categoría también se incluyen proyectos de iluminación escénica, iluminación de eventos e intervenciones lumínicas temporales. 
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
						<p class="v-middle">Categoría:</p>
						<footer>
						ESPACIOS DE HOSPITALIDAD: Buscamos proyectos cuya iluminación genere atmósferas y ambientes confortables en espacios como: centros turísticos y culturales, museos, centros de convenciones y espectáculos, hoteles, restaurantes, cafeterías, teatros, cines, foros y arenas. 
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
  </div>


	<br><br>
  <div id="datos" class="">
<!-- 	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
		<h3 class="titles">DATOS GENERALES</h3>	
		</div>
	</div> -->
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
  </div>
   <div id="diseno" class="tab-pane fade">
<!-- 		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
			<h3 class="titles">DISEÑO</h3>	
			</div>
		</div> -->
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
		<?php if ( $projects['pdf'] != "" ){ ?>
		<div class="row">
			<div class="col-sm-12 col-md-8 col-md-offset-2">
				<blockquote>
					<p class="v-middle">Análisis técnico documento:</p>
					<footer>
						<a href="" data-toggle="modal" data-target="#pdf">Ver pdf</a>
					</footer>
				</blockquote>
			</div>
		</div>
		<?php } ?>
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
  </div>
</div>
				</div>
			</div>
  			<!-- end tabs -->

			<div class="row">

			<!-- description -->
<!-- 			<div class="row">
				<div class="col-sm-12 col-md-8 col-md-offset-2">
					<p class="v-middle">Descripción de proyecto:</p>
				</div>
				<div class="col-sm-12 col-md-8 col-md-offset-2">
					<textarea name="desc_proyecto" rows="8" required class="form-control input-reg"><?php echo trim($projects['desc_project']); ?></textarea>
				</div>
			</div> -->

			<!-- images,video -->

			<!-- information adittional-->

<!--  			  <div class="row">
				<div class="col-sm-8 col-sm-offset-2">
					<div class="col-sm-8 col-sm-offset-2 rating-st ">
						<table cla></table>
						<div><p>Califica este proyecto</p></div>
						<div class="stars">
							
							<form action="" data-project="<?php echo $_GET['id'];  ?>" >

							  <?php $stars = $_GET["stars"] ?>
							  <input class="star star-5-" <?php echo $stars==5?"checked":""; ?> id="star-5-" type="radio" name="star"  data-cal="5"/>
							  <label class="star star-5-" for="star-5-"></label>


							  <input class="star star-4-" <?php echo $stars==4?"checked":""; ?> id="star-4-" type="radio" name="star" data-cal="4"/>
							  <label class="star star-4-" for="star-4-"></label>


							  <input class="star star-3-" <?php echo $stars==3?"checked":""; ?> id="star-3-" type="radio" name="star" data-cal="3-"/>
							  <label class="star star-3-" for="star-3-"></label>


							  <input class="star star-2-" <?php echo $stars==2?"checked":""; ?> id="star-2-" type="radio" name="star" data-cal="2"/>
							  <label class="star star-2-" for="star-2-"></label>


							  <input class="star star-1-" <?php echo $stars==1?"checked":""; ?> id="star-1-" type="radio" name="star" data-cal="1"/>
							  <label class="star star-1-" for="star-1-"></label>

							</form>
						</div>
					
					</div>
				</div>

			</div> -->

				<br>
				<br>				
		</div>
	</div>
</div>
<!-- open video-->
<div class="modal fade" id="video-preview" role="dialog">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body contain-video">
        <iframe id="iframe" width="100%" height="515" src="https://www.youtube.com/embed/" frameborder="0" allowfullscreen></iframe>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>
<!-- open pdf-->
<div class="modal fade" id="pdf" role="dialog">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
        <iframe src="http://docs.google.com/gview?url=http://www.construlitalighting.com/cla/public/pdf/<?php echo $projects['pdf'] ?>&embedded=true" 
			style="width:100%; height:500px;" frameborder="0"></iframe>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>
<!-- <div class="modal modal-fullscreen fade" id="pdf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">              
      <div class="modal-body">
      	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>
    </div>
  </div>
</div> -->

<!-- open imagen -->
<div class="modal modal-fullscreen fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">              
      <div class="modal-body">
      	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <img src="" class="imagepreview" style="width: 100%;" >
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
<script>
	
		$('.pop').on('click', function() {
			$('.imagepreview').attr('src', $(this).find('img').attr('src'));
			$('#imagemodal').modal('show');   
		});	

</script>
<script type="text/javascript">
	$('.see-video').on('click',function(){
		var url = $(this).data('id');
		console.log(url);
		$('.contain-video').empty();
		$('.contain-video').html('<iframe id="iframe" width="100%" height="515" src="https://www.youtube.com/embed/'+url+'" frameborder="0" allowfullscreen></iframe>')
	});

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