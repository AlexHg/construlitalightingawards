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
        cursor:pointer;
        transition:all .2s;
    }
    .rating > span:hover{
        transform:scale(1.3);
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

<ol class="breadcrumb">
    <li><a><i class="fa fa-home"></i></a></li>
    <li>Proyecto</li>
</ol>

<div class="">

    <div class="widget">
        <div class="widget-advanced">
            <!-- Widget Header -->
            <div class="widget-header text-center themed-background-dark">
                <h3 class="widget-content-light">
                    <a><?php echo strtoupper($projects["name"]) ?></a><br>
                    <small><?php category_name($projects["category"]) ?></small>
                </h3>
            </div>
            <!-- END Widget Header -->

            <!-- Widget Main -->
            <div class="widget-main">
                <a class="widget-image-container animation-fadeIn">
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
                            <li><b>País:</b> <?php echo $projects['pais']; ?></li>
                            <li><b>Ciudad:</b> <?php echo $projects['ciudad']; ?></li>
                            <li><b>Finalización del proyecto:</b> <?php echo $projects['end']; ?></li>                 
                        </ul>
                        
                    </div>
                    <div class="col-sm-7">
                        <!--<h3 class="sub-header">Concepto inicial y alcance</h3>
                        <p><?php echo $projects['alcance']; ?></p>-->

                        <h3 class="sub-header">Información de la categoría</h3>
                        <p>
                            <?php 
                                switch ($projects['category']) {
                                    case 1: ?>
                                        <b> ESPACIOS DE VIVIENDA</b><br> 
                                        Buscamos proyectos en los que la iluminación mejore la habilidad de cualquier espacio residencial. También se incluyen fraccionamientos y conjuntos habitacionales.
                                    <?php break;
                                    case 2: ?>
                                        <b>ESPACIOS COMERCIALES</b><br>   
                                        Tiendas departamentales, boutiques, agencias vehiculares, tiendas minoristas, complejos comerciales, centros turísticos, museos y centros culturales, centros de convenciones, hoteles, restaurantes, bares, cafés, teatros, cines, foros, arenas y centros de espectáculos. 
                                    <?php break;
                                    case 3: ?>
                                        <b>ESPACIOS DE TRABAJO</b><br>
                                        Buscamos proyectos en los que la iluminación facilite el desarrollo de actividades orientadas al servicio y la productividad. Esta categoría incluye: oficinas, centros de salud, hospitales, bodegas y naves industriales, plantas manufactureras, parques industriales, planteles educativos, edificios públicos y sucursales bancarias.
                                    <?php break;
                                    case 4: ?>
                                        <b>ESPACIOS PÚBLICOS</b><br> 
                                        Buscamos espacios exteriores cuya iluminación cubra una necesidad funcional específica, facilite la movilidad en cualquier escala o realce los atributos arquitectónicos y patrimoniales del espacio, inmueble o monumento que ilumina. Esta categoría incluye proyectos de alumbrado público, iluminación de puentes, túneles, estructuras, monumentos y fachadas, así como plazas y jardines públicos.
                                    <?php break;
                                    case 5: ?>
                                        <b>INSTALACIÓN ARTÍSTICA</b><br>
                                        Buscamos piezas de iluminación que hayan sido exhibidas durante un periodo acotado de tiempo o formen parte de una colección específica. En esta categoría también se incluyen proyectos de iluminación escénica, iluminación de eventos e intervenciones lumínicas temporales. 
                                    <?php break;
                                    case 6: ?>
                                        <b>ESPACIOS DE HOSPITALIDAD</b><br>
                                        Buscamos proyectos cuya iluminación genere atmósferas y ambientes confortables en espacios como: centros turísticos y culturales, museos, centros de convenciones y espectáculos, hoteles, restaurantes, cafeterías, teatros, cines, foros y arenas. 
                                    <?php break;
                                    default:
                                        break;
                                }
                            ?>
                        </p>

                        <h3 class="sub-header">
                            Brief del proyecto 
                        </h3>
                        <div style="display:flex;">
                            <div id="pdfUpl">
                                <?php
                                    if( $projects['pdf']!= "" && $projects['pdf']!= NULL ) { 
                                ?>
                                    <br>
                                    <a href="public/pdf/<?php echo $projects['pdf'] ?>" class="see" target="_blank" style="display:block;max-width:100px;overflow-x:hidden;margin-right:2rem;margin-top:-2rem;">
                                        <img src="https://png.icons8.com/color/1600/pdf-2.png" style="max-width:100px;">
                                        <small style="display:block;white-space: nowrap;"><?php echo $projects['pdf']; ?></small>
                                    </a>
                                    
                                <?php
                                }  
                                ?>
                            </div>
                            <p><?php echo $projects['analisis']; ?></p>
                        </div>                         
                        
                    </div>
                    <div class="col-sm-12">
                        <?php
                            if( isset($_SESSION['rol'] ) ){
                                if( $_SESSION['rol'] == 2 ){
                        ?>
                        <div class="modal-body"><br/><br/><br/>
                            <!-- begin -->
                            <?php
                                $decode = json_decode($calif['matriz']);
                                $selected = "class='active-star'";
                            ?>
                                <div class="table-responsive">
                                    <input type="hidden" name="json" class="json">
                                    <h3 style="text-align:right;">Promedio: <span  class="promedio"><?php echo isset( $calif['stars'] )? number_format( floatval($calif['stars']),2 ):'0'; ?></span></h3>
                                    <table class="table table-bordered table-hover text-center" >
                                        <thead class="yellow">
                                            <tr>
                                                <td>Concepto y objetivo funcional</td>
                                                <td>Selección y aplicación de luminarios</td>
                                                <td>Solución técnica y estética</td>
                                                <td>Innovación e impacto social</td>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody-eval">
                                            <tr>
                                                
                                                <td>
                                                    <div class="one" data-project="<?php echo $_GET['id'] ?>">
                                                        <input type="hidden" name="one" value="<?php echo isset($decode->uno)?$decode->uno:''; ?>" >
                                                        <div class="rating">
                                                            <span <?php echo $decode->uno >= 5?$selected:''; ?> data-cal="5">☆</span>
                                                            <span <?php echo $decode->uno >= 4?$selected:''; ?> data-cal="4">☆</span>
                                                            <span <?php echo $decode->uno >= 3?$selected:''; ?> data-cal="3">☆</span>
                                                            <span <?php echo $decode->uno >= 2?$selected:''; ?> data-cal="2">☆</span>
                                                            <span <?php echo $decode->uno >= 1?$selected:''; ?> data-cal="1">☆</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="two" data-project="<?php echo $_GET['id'] ?>">
                                                        <input type="hidden" name="two" value="<?php echo isset($decode->dos)?$decode->dos:''; ?>" >
                                                        <div class="rating">
                                                            <span <?php echo $decode->dos >= 5?$selected:''; ?> data-cal="5">☆</span>
                                                            <span <?php echo $decode->dos >= 4?$selected:''; ?> data-cal="4">☆</span>
                                                            <span <?php echo $decode->dos >= 3?$selected:''; ?> data-cal="3">☆</span>
                                                            <span <?php echo $decode->dos >= 2?$selected:''; ?> data-cal="2">☆</span>
                                                            <span <?php echo $decode->dos >= 1?$selected:''; ?> data-cal="1">☆</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="three" data-project="<?php echo $_GET['id'] ?>">
                                                        <input type="hidden" name="three" value="<?php echo isset($decode->tres)?$decode->tres:''; ?>" >
                                                        <div class="rating">
                                                            <span <?php echo $decode->tres >= 5?$selected:''; ?> data-cal="5">☆</span>
                                                            <span <?php echo $decode->tres >= 4?$selected:''; ?> data-cal="4">☆</span>
                                                            <span <?php echo $decode->tres >= 3?$selected:''; ?> data-cal="3">☆</span>
                                                            <span <?php echo $decode->tres >= 2?$selected:''; ?> data-cal="2">☆</span>
                                                            <span <?php echo $decode->tres >= 1?$selected:''; ?> data-cal="1">☆</span>
                                                        </div>
                                                    </div>	
                                                </td>
                                                <td>
                                                    <div class="four" data-project="<?php echo $_GET['id'] ?>">
                                                        <input type="hidden" name="four" value="<?php echo isset($decode->cuatro)?$decode->cuatro:''; ?>" >
                                                        <div class="rating">
                                                            <span <?php echo $decode->cuatro >= 5?$selected:''; ?> data-cal="5">☆</span>
                                                            <span <?php echo $decode->cuatro >= 4?$selected:''; ?> data-cal="4">☆</span>
                                                            <span <?php echo $decode->cuatro >= 3?$selected:''; ?> data-cal="3">☆</span>
                                                            <span <?php echo $decode->cuatro >= 2?$selected:''; ?> data-cal="2">☆</span>
                                                            <span <?php echo $decode->cuatro >= 1?$selected:''; ?> data-cal="1">☆</span>
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-12">

                                        <div class="form-group">
                                        <br><br>
                                            <label for="comments">Comentarios</label>
                                            <textarea name="comments" id="comments" class="form-control" rows="6"><?php echo $calif['comments']; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-register titles save-stars">Confirmar calificación</button>
                                        </div>
                                    
                                </div>
                                <!-- end -->

                            </div>			
                            <?php
                                    }	
                                } 
                            ?>

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
<script type="text/javascript">

$("body").on('click','.rating>span',function(){

    $(this).parent().find('.active-star').removeClass('active-star');
    var stars = $(this).data('cal');
    var id = $(this).parent().parent().data('project');
    $(this).parent().parent().find('input[type=hidden]').val(stars);
    var span = $(this).parent().find('span');
    console.log(span);
    span.each(function(index,element){
        var str = $(element).data('cal');
        if(str <= stars){
            $(element).addClass('active-star');
        }
    });
    //$(this).addClass('active-star');
    var cal = createJson();
    var comentarios = $('textarea[name=comments]').val();

    $('input[name=json]').val( JSON.stringify(cal) );
    


});

$("body").on('click','.save-stars',function(){

    var id = $('.one').data('project');
    var comentarios = $('textarea[name=comments]').val();
    var cal = createJson();
    var promedio = $('.promedio').text();
    $('input[name=json]').val( JSON.stringify(cal) );
    json = $('input[name=json]').val();

    $.ajax({
        url: 'stars',
        type: 'POST',
        // dataType : 'json',
        data:  { id_project:id,
                 stars:promedio,
                 caracteristicas:json,
                 comentarios:comentarios
               },
        success: function(msg) {

            if(msg == true){
                swal(
                  '',
                  'Se han asignado '+promedio+' estrellas a este proyecto!',
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

function createJson(){

    var one = parseInt( typeof($('.one input[name=one]').val()) == 'undefined'?0:$('.one  input[name=one]').val() );
    var two = parseInt( typeof($('.two input[name=two]').val()) == 'undefined'?0:$('.two input[name=two]').val() );
    var three = parseInt( typeof($('.three input[name=three]').val()) == 'undefined'?0:$('.three input[name=three').val() );
    var four = parseInt( typeof($('.four input[name=four]').val()) == 'undefined'?0:$('.four input[name=four').val() );

    var cal = { 'uno': one, 'dos': two, 'tres': three, 'cuatro': four}
    var promedio = (one+two+three+four)/4;
    $('.promedio').text(promedio);

    return cal;

}

</script>