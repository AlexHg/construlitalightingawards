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

<script type="text/javascript">
    function goBack() {
        window.history.back();
    }
</script>

<div class="breadcrumb" style="display:flex;justify-content:space-between;">
    <ol class="breadcrumb" style="margin:0;padding:0;">
        <li><a><i class="fa fa-home"></i></a></li>
        <li>Proyecto</li>
    </ol>
    <div style="" >
        <!--<a href="#bloquear">Bloquear</a> | -->
        <a href="dashboard-project-edit?id=<?php echo $_GET['id']; ?>">Editar proyecto</a>
    </div>
</div>

<div class="">

    <div class="widget">
        <div class="widget-advanced">
            <!-- Widget Header -->
            <div class="widget-header text-center themed-background-dark">
                <h3 class="widget-content-light">
                    <a href="page_ready_elearning_course_lessons.html"><?php echo strtoupper($projects["name"]) ?></a><br>
                    <small><?php category_name($projects["category"]) ?></small><br>

                </h3>
            </div>
            <!-- END Widget Header -->

            <!-- Widget Main -->
            <div class="widget-main">
                <a href="#" class="widget-image-container animation-fadeIn">
                <?php 
                    $cat_image = "";
                    switch ($projects['category']) {
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
                ?>
                <span class="widget-icon themed-background-default" 
                
                    style="background:url('resources/admin/img/cla/categoria/<?php echo $cat_image; ?>')">
                </span>
                </a>

                <?php if(isset($_SESSION['alerta'])){ ?>
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1 p-top-50">
                            <div class="alert alert-success">
                                <strong>
                                    <?php echo $_SESSION['alerta']["status"]; ?>
                                </strong> 
                                <?php echo $_SESSION['alerta']["message"]; ?>
                            </div>
                        </div>
                    </div>
                <?php unset($_SESSION['alerta']);} ?>
                    
                <div class="row">
                    <div class="col-sm-5">
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
                    </div>
                    
                    <div class="col-sm-7">
                        <h3 class="sub-header">Descripción del proyecto</h3>
                        <p><?php echo $projects['descripcion']; ?></p>
                    </div>
                
                </div>
                
                <div class="row">
                    <div class="col-sm-5">
                        <h3 class="sub-header">Información general</h3>
                        <style>
                            .geninfo{
                                padding-left:10px;
                            }
                            .geninfo li{
                                list-style:none;
                            }
                        </style>
                        <ul class="geninfo">
                            <?php if( $projects['video'] != "" && $projects['video'] != NULL ){?>
                                <li><b>Video:</b> <a href="<?php echo $projects['video']; ?>" target="_blank" >Ver ahora</a></li>                                
                            <?php } ?> 
                            <li><b>Diseño de iluminación por:</b> <?php echo $projects['disenador']; ?></li>        
                            <li><b>ID del Participante:</b> <?php echo $projects['id_usuario'];?></li>
                            <li><b>Créditos del video:</b> <?php echo $projects['cred_video']; ?></li>
                            <li><b>Fotografo:</b> <?php echo $projects['fotografo']; ?></li>
                            <li><b>País:</b> <?php echo $projects['pais']; ?></li>
                            <li><b>Ciudad:</b> <?php echo $projects['ciudad']; ?></li>
                            <li><b>Finalización del proyecto:</b> <?php echo $projects['end']; ?></li>
                            <li><b>Colaboradores:</b> <?php echo $projects['colaboradores']; ?></li>
                            <li><b>Arquitectura por:</b> <?php echo $projects['arquitecto']; ?></li>


                        </ul>


                        
                    </div>
                    <div class="col-sm-7">
                        <!-- <h3 class="sub-header">Concepto inicial y alcance</h3>
                        <p><?php echo $projects['alcance']; ?></p> -->

                        <h3 class="sub-header">Información de la categoría</h3>
                        <p>
                            <?php 
                                switch ($projects['category']) {
                                    case 1: ?>
                                        <b>ESPACIOS DE VIVIENDA: </b><br> 
                                        Buscamos proyectos en los que la iluminación mejore la habilidad de cualquier espacio residencial. También se incluyen fraccionamientos y conjuntos habitacionales.
                                    <?php break;
                                    case 2: ?>
                                        <b>ESPACIOS COMERCIALES: </b><br>   
                                        Buscamos proyectos que potencien la finalidad comercial del espacio y mejoren la exhibición de productos. Esta categoría incluye tiendas minoristas y mayoristas como: tiendas especializadas, departamentales, de autoservicio, agencias vehiculares, fashion malls y otros complejos comerciales. 
                                    <?php break;
                                    case 3: ?>
                                        <b>ESPACIOS DE TRABAJO: </b><br>
                                        Buscamos proyectos en los que la iluminación facilite el desarrollo de actividades orientadas al servicio y la productividad. Esta categoría incluye: oficinas, centros de salud, hospitales, bodegas y naves industriales, plantas manufactureras, parques industriales, planteles educativos, edificios públicos y sucursales bancarias.
                                    <?php break;
                                    case 4: ?>
                                        <b>ESPACIOS PÚBLICOS: </b><br> 
                                        Buscamos espacios exteriores cuya iluminación cubra una necesidad funcional específica, facilite la movilidad en cualquier escala o realce los atributos arquitectónicos y patrimoniales del espacio, inmueble o monumento que ilumina. Esta categoría incluye proyectos de alumbrado público, iluminación de puentes, túneles, estructuras, monumentos y fachadas, así como plazas y jardines públicos.
                                    <?php break;
                                    case 5: ?>
                                        <b>INSTALACIÓN ARTÍSTICA: </b><br>
                                        Buscamos piezas de iluminación que hayan sido exhibidas durante un periodo acotado de tiempo o formen parte de una colección específica. En esta categoría también se incluyen proyectos de iluminación escénica, iluminación de eventos e intervenciones lumínicas temporales. 
                                    <?php break;
                                    case 6: ?>
                                        <b>ESPACIOS DE HOSPITALIDAD: </b><br>
                                        Buscamos proyectos cuya iluminación genere atmósferas y ambientes confortables en espacios como: centros turísticos y culturales, museos, centros de convenciones y espectáculos, hoteles, restaurantes, cafeterías, teatros, cines, foros y arenas. 
                                    <?php break;
                                    default:
                                        break;
                                }
                            ?>
                        </p>

                        <h3 class="sub-header">
                            Brief del proyecto 
                            <small><a href="" data-toggle="modal" data-target="#pdf">Ver pdf</a></small>
                        </h3>
                        <p><?php echo $projects['analisis']; ?></p>
                        
                    </div>
                    
                </div>
                
            </div>
            <!-- END Widget Main -->
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