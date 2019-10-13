
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container-fluid">
	<div class="row title-imagen" style="background-image: url('assets/images/datos-pooyecto.png');"></div> 
	<style type="text/css">
		.erase-img{
			cursor:pointer;
		}
		.contador{
		    position: absolute;
		    right: 0;
		    margin-top: -25px;
		    margin-right: 18px;
		}
		textarea{
			padding: 20px;
		}
		.change-o{
			cursor:pointer;
		}
	</style>
<!-- 	<div class="row yellow p-top-bottom-25 m-top-bottom-20">
		<div class="col-lg-12 text-uppercase text-center f-black">
			<h2>registro</h2>
		</div>
	</div>
	<div class="row">
		<img src="assets/images/step-2.png" class="img-responsive" alt="registrar nuevo proyecto en construlita">
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

		if( ($category[0]["Total"]+$category[1]["Total"]+$category[2]["Total"]+$category[3]["Total"]+$category[4]["Total"]) <= 9  ){

			/*
			 * Create dir temp for images
			 *
			 */
			$microtime =  microtime(true);
			$md5 = md5($microtime);
	?>
	<div class="row" id="in" data-carpet="<?php echo $md5; ?>">
		<div class="col-lg-8 col-lg-offset-2 p-top-50">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<a href="upload-project-confirm" onclick="goBack()"><img src="assets/images/regresar.png"></a>
			</div>	
		</div>
<!-- 			<form id="new-project" method="POST" action="upload-complete"> -->
				<!-- Step one -->
				<input type="hidden" name="project" <?php echo isset($projects)?'value='.$projects['id_project']:''; ?> >
				<input type="hidden" name="directory">
				<div class="row info-1">
					<div class="col-sm-8 col-sm-offset-2">
						<h3 class="titles">DATOS DEL PROYECTO</h3>
						<p>Completa la información que se pide a continuación sobre tu proyecto participante. <br>
						   Si deseas registrar más de un proyecto, debes terminar el registro actual para iniciar uno nuevo.
						</p>		
					</div>
						<div class="col-sm-8 col-sm-offset-2">
							<h4 class="titles">CATEGORÍAS</h4>
						</div>
						<div class="col-sm-3 col-sm-offset-2 situacion">
							
						</div>
						<div class="col-sm-5 prorealizados">
							<p class="text-left">PROYECTOS REALIZADOS</p>
							<?php 

							$exist1 = $category[0]['Total'] == 1?'disabled':'';
							$exist2 = $category[1]['Total'] == 1?'disabled':'';
							$exist3 = $category[2]['Total'] == 1?'disabled':'';
							$exist4 = $category[3]['Total'] == 1?'disabled':'';
							$exist5 = $category[4]['Total'] == 1?'disabled':''; 
							?>
							
								<div class="row">
									<div class="col-xs-1 col-sm-2 col-md-1">
										<input type="radio" name="prorealizados" value="1" <?php echo $projects['category']==1?'checked ':''; echo $exist1; ?> required>
									</div>
									<div class="col-xs-11 col-sm-10 col-md-11">
										ESPACIOS DE VIVIENDA: Residencial, medio, interés social y fraccionamientos urbanos.
									</div>
								</div>
							
							
								<div class="row">
									<div class="col-xs-1 col-sm-2 col-md-1">
										<input type="radio" name="prorealizados" value="2" <?php echo $projects['category']==2?'checked ':''; echo $exist2;?> >
									</div>
									<div class="col-xs-11 col-sm-10 col-md-11">
										ESPACIOS COMERCIALES Y DE HOSPITALIDAD: Tiendas departamentales, boutiques, agencias vehiculares, tiendas minoristas, complejos comerciales, centros turísticos, museos y centros culturales, centros de convenciones, hoteles, restaurantes, bares, cafés, teatros, cines, foros, arenas y centros de espectáculos. 
									</div>
								</div>

								<div class="row">
									<div class="col-xs-1 col-sm-2 col-md-1">
										<input type="radio" name="prorealizados" value="3" <?php echo $projects['category']==3?'checked ':''; echo $exist3;?> >
									</div>
									<div class="col-xs-11 col-sm-10 col-md-11">
										ESPACIOS PRODUCTIVOS Y EDUCATIVOS: Oficinas, centros de salud, hospitales, bodegas y naves industriales, plantas, parques industriales, manufactureras, planteles educativos, bibliotecas.
									</div>
								</div>

								<div class="row">
									<div class="col-xs-1 col-sm-2 col-md-1">
										<input type="radio" name="prorealizados" value="4" <?php echo $projects['category']==4?'checked ':''; echo $exist4;?> >
									</div>
									<div class="col-xs-11 col-sm-10 col-md-11">
										ESPACIOS PÚBLICOS: Alumbrado público, puentes y túneles, estructuras, monumentos y fachadas, plazas y jardines públicos, estadios e instalaciones deportivas, aeropuertos, terminales.
									</div>
								</div>
					
							<br>
							<p class="text-left">PROYECTOS NO REALIZADOS</p>
	
								<div class="row">
									<div class="col-xs-1 col-sm-2 col-md-1">
										<input type="radio" name="prorealizados" value="5" <?php echo $projects['category']==5?'checked ':''; echo $exist5;?> >
									</div>
									<div class="col-xs-11 col-sm-10 col-md-11">
										CONCEPTOS: Propuestas de iluminación que no hayan llegado a la etapa de realización y cuyo objetivo sea resolver, mejorar o rescatar algún espacio interior o exterior.
									</div>
								</div>

								<div class="row">
									<div class="col-sm-12">
										<h3><span class="label label-danger" id="info-1"></span></h3>
									</div>					
								</div>

						</div>

						<br>
						<div class="row">
							<div class="col-sm-8 col-sm-offset-2">
								<p>Nota: Las categorías anteriores se utilizan para organizar los proyectos elegibles y ayudar a los jueces en la revisión de los mismos. En caso de ser necesario, los organizadores se reservan el derecho de cambiar los proyectos de la categoría en que fueron inscritos.</p>		
							</div>
						</div>
						<div class="row p-top-50">
							<div class="col-sm-4 col-sm-offset-6 text-center">
								<button class="form-control yellow p-top-9 activate-p" data-action="next" data-actual="info-1" data-s="info-2">SIGUIENTE</button>
							</div>
						</div>
				
				</div>
				<br>

				<!-- Step two -->
				<div class="row info-2">
					<div class="col-sm-8 col-sm-offset-2">
						<h4 class="titles">DATOS GENERALES</h4>
					</div>
					<div class="row">
						<div class="col-sm-3 col-sm-offset-2">
							<p class="v-middle">Nombre del proyecto:</p>
						</div>
						<div class="col-sm-5 namep">
							<input type="text" name="namep" value="<?php echo $projects['name']; ?>" required  class="form-control input-reg">
							<h3><span class="label label-danger" id="info-2-name"></span></h3>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3 col-sm-offset-2">
							<p class="v-middle">Descripción:</p>
						</div>
						<div class="col-sm-8 col-sm-offset-2">
							<p>
								Para los miembros del jurado es de suma importancia conocer tu proyecto a detalle, así como el proceso que se llevó a cabo. Recuerda que la descripción escrita y el material audiovisual que adjuntes más adelante serán los únicos medios por los que el jurado tendrá contacto con el proyecto. No olvides agregar la información más relevante (500 palabras máximo).
							</p>
						</div>
						<div class="col-sm-8 desc_proyecto col-sm-offset-2">
							<textarea name="desc_proyecto" required rows="5"  class="form-control input-reg count-word"><?php echo $projects['descripcion']; ?></textarea>
							<span class="contador"></span>
							<h3><span class="label label-danger" id="info-2-descripcion"></span></h3>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm-3 col-sm-offset-2">
							<p class="v-middle">Uso del inmueble:</p>
						</div>
						<div class="col-sm-5 usoinmueble">
							<input type="text" name="usoinmueble" value="<?php echo $projects['uso']; ?>" required  class="form-control input-reg">
							<h3><span class="label label-danger" id="info-2-uso"></span></h3>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-3 col-sm-offset-2">
							<p class="v-middle">Direccion:</p>
						</div>
						<div class="col-sm-5 direccion">
							<input type="text" name="direccion" value="<?php echo $projects['uso']; ?>" required  class="form-control input-reg">
							<h3><span class="label label-danger" id="info-2-direccion"></span></h3>
						</div>
					</div>
					

					<div class="row">
						  <div class="col-sm-3 col-sm-offset-2">
						  <p class="v-middle">Sector de construcción:</p>
					     </div>
					     <div class="col-sm-5 tipobra">
						   <input type="radio" name="tipobra" <?php echo $projects['tipo']==0?'checked':''; ?> required value="0">&emsp;Pública<br>
						   <input type="radio" name="tipobra" <?php echo $projects['tipo']==1?'checked':''; ?> value="1">&emsp;Privada
						   <br>
						   <h3><span class="label label-danger" id="info-2-tipo"></span></h3>
					    </div>
					</div>


					<div class="row">
						<div class="col-sm-3 col-sm-offset-2">
							<p class="v-middle">Fecha de término de la construcción:</p>
						</div>
						<div class="col-sm-5 finalobra">
							<input type="date" name="finalobra" value="<?php echo $projects['end']; ?>" required class="form-control input-reg">
							<h3><span class="label label-danger" id="info-2-final"></span></h3>
						</div>
				  	</div>

					<div class="row">
						<div class="col-sm-3 col-sm-offset-2">
							<p class="v-middle">Arquitecto:</p>
						</div>
						<div class="col-sm-5 proyectoarq">
							<input type="text" name="proyectoarq" value="<?php echo $projects['arquitecto']; ?>" required class="form-control input-reg">
							<h3><span class="label label-danger" id="info-2-arquitecto"></span></h3>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-3 col-sm-offset-2">
							<p class="v-middle">Fotógrafo:</p>
						</div>
						<div class="col-sm-5 fotografo">
							<input type="text" name="fotografo" value="<?php echo $projects['fotografo']; ?>" required class="form-control input-reg">
							<h3><span class="label label-danger" id="info-2-fotografo"></span></h3>
						</div>
					</div>

					<div class="row p-top-50">
						<div class="col-sm-4 col-sm-offset-2 text-center">
							<button class="form-control yellow p-top-9 activate-p" data-action="prev" data-actual="info-2" data-s="info-1">ANTERIOR</button>
						</div>
						<div class="col-sm-4  text-center">
							<button class="form-control yellow p-top-9 activate-p" data-action="next" data-actual="info-2" data-s="info-3">SIGUIENTE</button>
						</div>
					</div>
			  	</div>
				<!-- Step three -->
				<div class="row info-3">
					<div class="col-sm-8 col-sm-offset-2">
						<h4 class="titles">DISEÑO Y CONCEPTO</h4>
					</div>

					<div class="row">
						<div class="col-sm-3 col-sm-offset-2">
							<p class="v-middle">Diseñador de iluminación:</p>
						</div>
						<div class="col-sm-5 disenadorilumi">
							<input type="text" name="disenadorilumi" value="<?php echo $projects['disenador']; ?>" required class="form-control input-reg">
							<h3><span class="label label-danger" id="info-3-disenador"></span></h3>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-3 col-sm-offset-2">
							<p class="v-middle">Colaboradores:</p>
						</div>
						<div class="col-sm-5 colaboradores">
							<input type="text" name="colaboradores" value="<?php echo $projects['colaboradores']; ?>" required class="form-control input-reg">
							<h3><span class="label label-danger" id="info-3-colaborador"></span></h3>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-3 col-sm-offset-2">
							<p class="v-middle">Concepto inicial y alcance:</p>
						</div>
						<div class="col-sm-8 col-sm-offset-2">
							<p>
								Describe detalladamente el concepto del que partió tu proyecto de iluminación y el alcance que tuviste en su realización (200 palabras máximo).
							</p>
						</div>
						<div class="col-sm-8 alcance col-sm-offset-2">
							<textarea name="alcance" required rows="5"  class="form-control input-reg count-word"><?php echo $projects['alcance']; ?></textarea>
							<span class="contador"></span>
							<h3><span class="label label-danger" id="info-3-alcance"></span></h3>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-3 col-sm-offset-2">
							<p class="v-middle">Mantenimiento y operación:</p>
						</div>
						<div class="col-sm-8 col-sm-offset-2">
							<p>Describe la tecnología empleada en tu diseño de iluminación y su funcionamiento.</p>
						</div>
						<div class="col-sm-8 mantenimiento col-sm-offset-2">
							<textarea name="mantenimiento" required rows="5"  class="form-control input-reg count-word"><?php echo $projects['mantenimiento']; ?></textarea>
							<span class="contador"></span>
							<h3><span class="label label-danger" id="info-3-mantenimiento"></span></h3>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-3 col-sm-offset-2">
							<p class="v-middle">Análisis técnico:</p>
						</div>
						<div class="col-sm-8 col-sm-offset-2">
							<p>
								Incluir si hay algún análisis de carácter técnico que sustente el proyecto (200 palabras máximo).
							</p>
						</div>
						<div class="col-sm-8 analisis col-sm-offset-2">
							<textarea name="analisis" required rows="5"  class="form-control input-reg count-word"><?php echo $projects['analisis']; ?></textarea>
							<span class="contador"></span>
							<h3><span class="label label-danger" id="info-3-analisis"></span></h3>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-3 col-sm-offset-2">
<!-- 							<p class="v-middle">Análisis técnico:</p> -->
						</div>
						<div class="col-sm-8 col-sm-offset-2">
							<p>
								Te invitamos a que incluyas un archivo PDF del análisis realizado para tu proyecto.
							</p>
						</div>
						<div class="col-sm-8 pdf col-sm-offset-2">
							<input type="file" name="pdf" id="pdf" class="form-control">
							<br>
							<progress id="upload-ajax"></progress>
							<span class="contador"></span>
							<h3><span class="label label-danger" id="info-3-pdf"></span></h3>
			                <table class="table table-bordered table-hover" id="pdfs">
			                    <thead>
			                        <tr>
			                            <td>Nombre del archivo</td>
			                            <td>Preview</td>
			                            <td>Eliminar</td>
			                        </tr>
			                    </thead>
			                    <tbody class="uploads-pdf">
			                    	<?php
			                    	if( $projects['pdf']!= "" && $projects['pdf']!= NULL ) { 
			                    	?>
			                    	<tr>
			                    		<td><?php echo $projects['pdf']; ?></td>
			                    		<td><a href="http://docs.google.com/gview?url=http://www.construlitalighting.com/cla/public/pdf/<?php echo $projects['pdf'] ?>&embedded=true" class="see" target="_blank">Ver</a></td>
			                    		<td><a class="delete-pdf" data-name="<?php echo $projects['pdf'] ?>">Eliminar</a></td>
			                    	</tr>
			                    	<?php
			                    	}  
			                    	?>
			                    </tbody>
			                </table>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm-4 col-sm-offset-2">
							<p class="v-middle">Sistema de control de iluminación:</p>
						</div>
						<div class="col-sm-8 iluminacion col-sm-offset-2">
							<textarea name="iluminacion" required rows="5"  class="form-control input-reg count-word"><?php echo $projects['iluminacion']; ?></textarea>
							<span class="contador"></span>
							<h3><span class="label label-danger" id="info-3-iluminacion"></span></h3>
						</div>
					</div>

					<div class="row p-top-50">
						<div class="col-sm-4 col-sm-offset-2 text-center">
							<button class="form-control yellow p-top-9 activate-p" data-action="prev" data-actual="info-3" data-s="info-2">ANTERIOR</button>
						</div>
						<div class="col-sm-4  text-center">
							<button class="form-control yellow p-top-9 activate-p" data-action="next" data-actual="info-3" data-s="info-4">SIGUIENTE</button>
						</div>
					</div>
				</div>

				<!-- Step Four -->
				<div class="row info-4">
					<div class="col-sm-8 col-sm-offset-2">
						<h4 class="titles">MATERIAL GRÁFICO Y AUDIOVISUAL</h4>
					</div>

					<div class="row">
						<div class="col-sm-3 col-sm-offset-2">
							<p class="v-middle">Video</p>
						</div>
						<div class="col-sm-8 col-sm-offset-2">
							<p>
								Si cuentas con un video de tu proyecto a evaluar, por favor comparte la dirección URL (opcional).<br>
								Si tu proyecto incluye aplicaciones de luz dinámica, cambios de temperatura o color y/o atenuaciones, es OBLIGATORIO que incluyas un video en el que se puedan apreciar los efectos.

							</p>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-3 col-sm-offset-2">
							<p class="v-middle">Dirección URL:</p>
						</div>
						<div class="col-sm-5 video">
							<input type="text" name="video" value="<?php echo $projects['video']; ?>" required class="form-control input-reg">
						</div>
					</div>


					<div class="row">
						<div class="col-sm-3 col-sm-offset-2">
							<p class="v-middle">Imágenes</p>
						</div>
						<div class="col-sm-8 col-sm-offset-2">
							<p>
								A continuación, podrás subir las imágenes de tu proyecto, Recuerda que hay un límite máximo de 12 archivos por proyecto y te recomendamos que no pesen más de 10 MB cada uno. Para más información sobre los formatos, resolución y tipo de fotografías consulta las BASES. 
								Nota: Favor de incluir imágenes sin contribución de luz natural.
							</p>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-8 col-sm-offset-2">
							<form action="upload-img-ajax" class="dropzone" id="my-dropzone">
							  <div class="fallback">
							    <input name="file" type="file" multiple />
							  </div>
							</form>
						</div>
					</div>

			        <div class="row">
			            <div class="col-sm-8 col-sm-offset-2">
			                <table class="table table-bordered table-hover" id="added-articles">
			                    <thead>
			                        <tr>
			                            <td>PREVIEW</td>
			                            <td>NOMBRE DE ARCHIVO</td>
			                            <td>ACCIÓN</td>
			                            <td>ROTAR</td>
			                        </tr>
			                    </thead>
			                    <tbody class="tbody-uploads">

			                    </tbody>
			                </table>
			            </div>
			        </div>

			        <div class="row"  id="message-processing" style="display:none;">
			        	<div class="col-sm-8 col-sm-offset-2 text-center">
			        		<div class="alert alert-warning">
							  <strong>Se esta procesando la imagen y optmizando, esto puede tomar unos minutos.</strong>
							</div>
			        	</div>
			        	
			        </div>


					<div class="row p-top-50">
						<div class="col-sm-4 col-sm-offset-2 text-center">
							<button  class="form-control yellow p-top-9 activate-p" data-action="prev" data-actual="info-4" data-s="info-3">ANTERIOR</button>
						</div>
						<div class="col-sm-4  text-center">
							<button  class="form-control yellow p-top-9 activate-p" data-action="next" data-actual="info-4" data-s="">GUARDAR PROYECTO</button>
						</div>
					</div>

				</div>

				<br>
				<br>				
<!-- 			</form> -->
		</div>
	</div>
	<?php 
		}else{
	?>
		<div class="row" id="in">
			<div class="col-lg-6 col-lg-offset-3 p-top-50">
				AL PARECER HAS AGOTADO TU CANTIDAD DE PROYECTOS POR USUARIO!
			</div>
		</div>
	<?php
		}
	 ?>
</div>
	<div id="del-imag" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        
	      </div>
	      <div class="modal-body">
		      	<div class="row">
		      		<div class="col-sm-10 col-sm-offset-1 text-center">
				        <h3>¿Estas seguro que deseas eliminar esta imagen definitivamente?</h3>
				    </div>
		      	</div>
		      	<div class="row">
		      		<div class="col-sm-10 col-sm-offset-1 text-center t-top-25">
		      			<a href="#" class="del-img text-center btn yellow">Eliminar</a>
		      			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		      		</div>
		      		
		      	</div>
		      					        	
	        </div>
	      </div>
	      <div class="modal-footer">

	      </div>
	    </div>

	  </div>


	    <!-- Modal content-->
	<div id="cnf" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        
	      </div>
	      <div class="modal-body">
		      	<div class="row">
		      		<div class="col-sm-10 col-sm-offset-1">
				        <h1 class="titles">Condiciones legales:</h1>
				        <br>
				        <div class="row">
				        	<div class="col-sm-1">
				        		<input type="checkbox" name="final" value="1" /><br />
				        	</div>
				        	<div class="col-sm-11">
				        		<h2 class="titles" style="margin-top: 0;">CONDICIONES LEGALES</h2>
				        		<h2 class="titles">DECLARACIÓN DE LIBERACIÓN DE MATERIALES</h2>
				        		<p>En relación a los materiales empleados para el registro de sus proyectos en <b>Construlita Lighting Awards 2018</b>, el participante que suscribe, declara ser el propietario de los derechos de autor (o actuar a nombre de este) del material y otorga a Construlita Lighting International S.A. de C.V., el derecho no exclusivo para utilizar todas las fotografías, renders, videos, audios, datos sobre el proyecto (excepto los datos clasificados como confidenciales) y materiales presentados al momento del registro a través del <a href="http://www.construlitalighting.com/cla/" target="_blank" class="color-a">portal</a>, para fines promocionales, educativos y de difusión. También autoriza a utilizar las imágenes en medios de comunicación de cualquier tipo, en todo el mundo, de forma permanente.</p>
				        		<p>El participante propietario declara que sustenta los derechos de autor sobre los proyectos presentados para la exhibición y distribución de los materiales como parte de la convocatoria de los <b>Construlita Lighting Awards 2018</b>, garantiza y representa que posee todos los derechos o facultades sobre las fotografías, videos y materiales presentados y por este medio declara y mantiene a Construlita Lighting International S.A. de C.V., empresas relacionadas a GrupoConstrulita, licenciatarios, colaboradores y cesionarios de las marcas Construlita y Tecno Lite, miembros del jurado, así como a sus empresas y medios asociados, fuera de cualquier controversia ocasionada por perjuicio, reclamo, daño, responsabilidad legal, costos y gastos que surjan de la utilización de los mencionados materiales. El concursante autoriza en este acto el uso de los materiales antes mencionados y registrados en el expediente del proyecto.</p>
				        		<p>He leído y acepto las presentes bases, términos y condiciones y es mi deseo participar en Construlita Lighting Awards 2018.</p>
				        	</div>
		      		</div>
		      	</div>
		      	<div class="row">
		      		<div class="col-sm-10 col-sm-offset-1 text-center p-top-50">
		      			<a onclick="saveAll()" class="text-center rc btn yellow">&emsp;ENVIAR PROYECTO&emsp;</a>
		      		</div>
		      		
		      	</div>
		      					        	
	        </div>
	      </div>
<!-- 	      <div class="modal-footer p-0">
	      <img src="assets/images/footer-cnf.jpg" class="img-responsive">
	      </div> -->
	    </div>
	</div>
<!-- pdf -->
<!-- <div class="modal fade" id="see-pdf" role="dialog">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
        <iframe id="frame" src="http://docs.google.com/gview?url=http://www.construlitalighting.com/cla/public/pdf/<?php echo $projects['pdf'] ?>&embedded=true" 
			style="width:100%; height:500px;"  id="" frameborder="0"></iframe>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div> -->

</div>
<!-- Preview pdf -->
<script type="text/javascript">
	// $('.see').on('click',function(){
	// 	var name = $(this).data('name');
	// 	$('#frame').attr('src','frame" src="http://docs.google.com/gview?url=http://www.construlitalighting.com/cla/public/pdf/'+name+'&embedded=true');
	// });


	
</script>
