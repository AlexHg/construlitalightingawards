<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<div class="container-fluid">
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
	</style>
	<br>
	<div class="row" style="position: relative;">
		<div class="col-sm-12 titles-back"></div>
		<div class="col-sm-4 col-sm-offset-4 titles text-uppercase texto text-center"><?php echo $projects['name']; ?></div>
	</div>
<!-- 	<div class="row title-section">
		<div class="col-lg-12 text-center text-uppercase p-top-15 f-gray title-big titles">
			<div class="row">
				<div class="col-sm-4 hidden-xs"><img src="assets/images/yellow.jpg" alt="consulta las bases" class="img-responsive"></div>
				<div class="col-sm-4"><?php echo $projects['name']; ?></div>
				<div class="col-sm-4 hidden-xs"><img src="assets/images/yellow.jpg" alt="consulta las bases" class="img-responsive"></div>
			</div>
		</div>
	</div> -->
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
</div>
	<div class="row">

		<br>
		<div class="col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2">
			<div class="row">
				<div >
					<a href="details?id=<?php echo $projects['id_project']; ?>"><i class="glyphicon glyphicon-arrow-left"></i> Regresar</a>
				</div>	
				<br>
			</div>
	<?php
		$decode = json_decode($calif['matriz']);
		$selected = "class='active-star'";
	?>
				<br>
				<br>				
		</div>
	</div>

<style type="text/css">
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

		<div class="col-sm-10 col-sm-offset-1 p-top-50">
			<div class="table-responsive">
            <table class="table table-bordered table-hover text-center" >
                <thead class="yellow">
                    <tr>
                        <td>Proyecto</td>
                        <td>CONCEPTO Y OBJETIVO FUNCIONAL</td>
                        <td>SELECCIÓN Y APLICACIÓN DE LUMINARIOS</td>
                        <td>SOLUCIÓN TÉCNICA Y ESTÉTICA</td>
                        <td>INNOVACIÓN E IMPACTO SOCIAL</td>
                        <td>Promedio</td>
                    </tr>
                </thead>
                <tbody class="tbody-uploads">
                	<tr>
                		<td class="middle"><?php echo $projects['name'] ?></td>
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
                		<td class="middle">
                			<div>
                				<input type="hidden" name="json" class="json">
                				<p class="promedio"><?php echo isset($calif['stars'])?$calif['stars']:'0'; ?></p>
                			</div>
                		</td>
                	</tr>
                </tbody>
            </table>
			</div>
        </div>
        <div class="col-sm-10 col-sm-offset-1">

        		<div class="form-group">
        			<label for="comments">Comentarios</label>
        			<textarea name="comments" id="comments" class="form-control" rows="6"><?php echo $calif['comments']; ?></textarea>
        		</div>
        		<div class="form-group">
        			<button type="button" class="btn btn-register titles save-stars">Confirmar calificación</button>
        		</div>
        	
        </div>

</div>
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