<div class="container-fluid">
	<div class="row yellow p-top-bottom-25 m-top-bottom-20">
		<div class="col-lg-12 text-uppercase text-center f-black">
			<h2>registro</h2>
		</div>
	</div>
	<div class="row">
		<img src="assets/images/step-2.png" class="img-responsive" alt="registrar nuevo proyecto en construlita">
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
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3 p-top-50">
			<form id="new-project" method="POST" <?php echo isset($_GET['id'])?"action=upload-update?last=".$_GET["id"]."&path=".$projects["path_project"]:"upload";?> enctype="multipart/form-data" >
				<div class="row">
					<div class="col-sm-8 col-sm-offset-2">
						<h3 >Datos del proyecto</h3>
						<p>Introduce la información del proyecto que deseas registrar. Si quieres mas de un proyecto debes terminar el registro actual para iniciar uno nuevo.</p>		
					</div>
						<div class="col-sm-8 col-sm-offset-2">
							<h3>Categoría</h3>
						</div>
						<div class="col-sm-5 situacion">
							<p class="text-right">PROYECTOS REALIZADOS</p>
						</div>
						<div class="col-sm-5 prorealizados">
								<div class="row">
									<div class="col-sm-1">
										<input type="radio" name="prorealizados" <?php echo  $projects['category']==1?"checked=checked":""; ?> value="1" required>
									</div>
									<div class="col-sm-11">
										EDIFICACIÓN:iluminación arquitectónica realizada para espacios de trabajo,
										centros de salud, hospitales, escuelas, universidades y otros espacios de usos
										múltiples y generales.
									</div>
								</div>
								<div class="row">
									<div class="col-sm-1">
										<input type="radio" name="prorealizados" <?php echo  $projects['category']==2?"checked=checked":""; ?> value="2">
									</div>
									<div class="col-sm-11">
										SERVICIOS Y HOSPITALIDAD: iluminación de proyectos enfocados en servicios tales como hoteles, restaurantes, cafeterías, centros culturales y de entretenimiento, bibliotecas, entre otros. 
									</div>
								</div>
								<div class="row">
									<div class="col-sm-1">
										<input type="radio" name="prorealizados" <?php echo  $projects['category']==3?"checked=checked":""; ?> value="3">
									</div>
									<div class="col-sm-11">
										COMERCIAL: diseño de iluminación interior para espacios comerciales tales como tiendas departamentales, boutiques, agencias vehiculares, tiendas minoristas y complejos comerciales. 
									</div>
								</div>
								<div class="row">
									<div class="col-sm-1">
										<input type="radio" name="prorealizados" <?php echo  $projects['category']==4?"checked=checked":""; ?> value="4">
									</div>
									<div class="col-sm-11">
										EXTERIOR: proyectos de iluminación exterior desarrollados para espacios públicos, plazas, parques, monumentos, fachadas, puentes e instalaciones deportivas. 
									</div>
								</div>
								<br>
								<p class="text-left">PROYECTOS NO REALIZADOS</p>
								<div class="row">
									<div class="col-sm-1">
										<input type="radio" name="prorealizados" <?php echo  $projects['category']==5?"checked=checked":""; ?> value="5">
									</div>
									<div class="col-sm-11">
										CONCEPTOS: Propuestas de iluminación que no hayan llegado a la etapa de realización, cuyo objetivo sea resolver, mejorar o rescatar algún espacio interior o exterior.
									</div>
								</div>
						</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-8 col-sm-offset-2">
						<p>Las categorías anteriores se utilizan para organizar los proyectos elegibles y ayudar a los jueces en la revisión de los mismos. En caso
						de ser necesario, los organizadores se reservan el derecho de cambiar los proyectos de la categoría en que fueron inscritos</p>		
					</div>
				</div>
				<br>
				<div class="row">
				<div class="col-sm-3 col-sm-offset-2">
					<p class="v-middle">Nombre del proyecto:</p>
				</div>
				<div class="col-sm-5 nomproyecto">
					<input type="text" name="nomproyecto" value="<?php echo $projects['name_project']; ?>" required class="form-control input-reg">
					<input type="hidden" name="unrequired">
				</div>
			  </div>
			
			<div class="row">
				<div class="col-sm-3 col-sm-offset-2">
					<p class="v-middle">Uso del inmueble:</p>
				</div>
				<div class="col-sm-5 usoinmueble">
					<input type="text" name="usoinmueble" value="<?php echo $projects['inmueble']; ?>"  required  class="form-control input-reg">
				</div>
			</div>
			<div class="row">
			  <div class="col-sm-3 col-sm-offset-2">
			  <p class="v-middle">Tipo de obra:</p>
		     </div>
		     <div class="col-sm-5 tipobra">
			   <input type="radio" name="tipobra" <?php echo  $projects['type_work']==0?"checked=checked":""; ?> required value="0">&emsp;Pública<br>

			   <input type="radio" name="tipobra" <?php echo  $projects['type_work']==1?"checked=checked":""; ?> value="1">&emsp;Privada

		    </div>
			</div>
			<div class="row">
				<div class="col-sm-3 col-sm-offset-2">
					<p class="v-middle">Finalización de la obra:</p>
				</div>
				<div class="col-sm-5 finalobra">
					<input type="text" name="finalobra" value="<?php echo $projects['final_date']; ?>"  required class="form-control input-reg">
				</div>
			  </div>
			  <div class="row">
				<div class="col-sm-3 col-sm-offset-2">
					<p class="v-middle">Diseñador de iluminación:</p>
				</div>
				<div class="col-sm-5 disenadorilumi">
					<input type="text" name="disenadorilumi" value="<?php echo $projects['designer']; ?>" required class="form-control input-reg">
				</div>
			  </div>
			  <div class="row">
				<div class="col-sm-3 col-sm-offset-2">
					<p class="v-middle">Dirección del proyecto:</p>
				</div>
				<div class="col-sm-5 dirproyecto">
					<input type="text" name="dirproyecto" value="<?php echo $projects['direction']; ?>" required class="form-control input-reg">
				</div>
			  </div>
			  <div class="row">
				<div class="col-sm-3 col-sm-offset-2">
					<p class="v-middle">Colaboradores:</p>
				</div>
				<div class="col-sm-5 colaboradores">
					<input type="text" name="colaboradores" value="<?php echo $projects['members']; ?>" required class="form-control input-reg">
				</div>
			  </div>
			  <div class="row">
				<div class="col-sm-3 col-sm-offset-2">
					<p class="v-middle">Proyecto Arq. por:</p>
				</div>
				<div class="col-sm-5 proyectoarq">
					<input type="text" name="proyectoarq" value="<?php echo $projects['project_by']; ?>"  required class="form-control input-reg">
				</div>
			  </div>
			  <div class="row">
				<div class="col-sm-3 col-sm-offset-2">
					<p class="v-middle">Fotógrafo:</p>
				</div>
				<div class="col-sm-5 fotografo">
					<input type="text" name="fotografo" value="<?php echo $projects['photographer']; ?>"  required class="form-control input-reg">
				</div>
			  </div>
			  <div class="row">
				<div class="col-sm-3 col-sm-offset-2">
					<p class="v-middle">Describe tu proyecto en 800 palabras.(max):</p>
				</div>
				<div class="col-sm-5 fotografo">
					<textarea name="desc_proyecto" rows="8" required class="form-control input-reg"><?php echo trim($projects['desc_project']); ?></textarea>
				</div>
			  </div>
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
					<h3>Video:</h3>
					<p>Si cuentas con un video que quieras que aparezca en tu proyecto a evaluar por favor comparte tu url de tu video.
					</p>
				</div>

			</div>
			<div class="row">
				<div class="col-sm-3 col-sm-offset-2">
					<p class="v-middle">URL de tu Video:</p>
				</div>
				<div class="col-sm-5 fotografo">
					<input type="url" name="url" value="<?php echo trim($projects['url_video']); ?>" class="form-control input-reg">
					<!--<input type="text" name="fotografo"  required class="form-control input-reg">-->
				</div>
			</div>
			  <div class="row">
				<div class="col-sm-8 col-sm-offset-2">
					<h3>Imagénes del proyecto:</h3>
					<p>A continuación podrás subir las imagenes de tu proyecto. Recuerda que hay un limite maximo de
					6 archivos y que estos no deben pesar más de 6MB. Para mas información sobre los formatos,
					resolución y tipo de fotografías consulta las bases.
					</p>
				</div>

			</div>
			<?php 
				$galery = new Galery();	
				$images = $galery->getFiles($projects["path_project"]);

			 ?>
			<div class="row p-top-25">
				<div class="col-sm-8 col-sm-offset-2 text-center">
					<div class="preview">
						<output id="result" />
					</div>
				</div>		
			</div>

			<div class="row">
				<div>
					<?php
						foreach($images as $img){
					?>
					<div class="col-sm-3 text-center p-bottom-20">
						<div class="close-img">
							<img class="img-responsive exist" src="<?php echo $projects["path_project"]."/".$img; ?>">
							<img src="assets/images/close.png" data-id="<?php echo $projects["path_project"]."/".$img; ?>" data-toggle="modal" data-target="#del-img" class="close-del" alt="delete" style="width: 40px;">
						</div>
					</div>
					<?php
						}

					?>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2 text-center">
					<div class="col-sm-4 col-sm-offset-6 text-right">
						<img src="assets/images/circle.png" id="add_more_exist" width="30">
					</div>
				</div>
			</div>
			<!--<div class="row">
				<div class="col-sm-4 col-sm-offset-6 text-center">
					
					<input type="button"  class="upload" value="Add More Files"/>
				</div>
			</div>-->
			<div class="row">
				<div class="col-lg-6 col-lg-offset-3">
					<span id="progress-message" class="text-center"></span>
					<progress class="upload-img tool" id="progress" value="0" max="100" data-toggle="tooltip" title="0%"></progress>													
				</div>
			</div>
			<div class="row p-top-50">
				<div class="col-sm-4 col-sm-offset-6 text-center">
					<button type="submit" class="form-control yellow p-top-9">GUARDAR PROYECTO</button>
				</div>
			</div>
				<br>
				<br>				
			</form>
		</div>
	</div>
</div>
	<div id="del-img" class="modal fade" role="dialog">
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