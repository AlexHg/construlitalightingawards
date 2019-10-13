<div class="container-fluid">
	<div class="row p-top-50 hola">
		<div class="container">
		  	<div class="row title-imagen" style="background-image: url('assets/images/usuarios.png');"></div> 
		  	<div class="row">
		  		<div class="col-sm-12">
					<ul class="nav nav-tabs">
					  <li class="active"><a data-toggle="tab" href="#noprojects">Usuarios sin proyectos</a></li>
					  <li><a data-toggle="tab" href="#incomplete">Usuarios con proyectos sin concursar</a></li>
					  <li><a data-toggle="tab" href="#complete">Usuarios con proyectos finalizados</a></li>
					</ul>
		  		</div>
				<div class="tab-content">
				  <div id="noprojects" class="tab-pane fade in active">
			
					<table class="table table-hover">
						<thead>
						  <tr>
						    <th>Nombre completo</th>
						    <th>Detalles</th>
						  </tr>
						</thead>
						<tbody>
							<?php
								foreach ($noProjects as $key => $nopro) {
									echo "<tr>";
									echo "<td>".$nopro['name']." ".$nopro['lastname']."</td>";
									echo "<td><a class='btn btn-default btn-large' href='dashboard-user?id=".$nopro['id_user']."' >Mas info</a></td>";
									echo "<tr>";
								}  
							?>
						</tbody>
					</table>
				  </div>
				  <div id="incomplete" class="tab-pane fade">
				 
					<table class="table table-hover">
						<thead>
						  <tr>
						    <th>Nombre completo</th>
						    <th>Detalles</th>
						  </tr>
						</thead>
						<tbody>
							<?php
								foreach ($incompleteProjects as $incompl) {
									echo "<tr>";
									echo "<td>".$incompl['name'].$incompl['lastname']."</td>";
									echo "<td><a class='btn btn-default btn-large' href='dashboard-user?id=".$incompl['id_user']."' >Mas info</a></td>";
									echo "<tr>";
								}  
							?>
						</tbody>
					</table>
				  </div>
				  <div id="complete" class="tab-pane fade">
				    
					<table class="table table-hover">
						<thead>
						  <tr>
						    <th>Nombre completo</th>
						    <th>Detalles</th>
						  </tr>
						</thead>
						<tbody>
							<?php
								foreach ($completeProjects as $complet) {
									echo "<tr>";
									echo "<td>".$complet['name'].$complet['lastname']."</td>";
									echo "<td><a class='btn btn-default btn-large' href='dashboard-user?id=".$complet['id_user']."' >Mas info</a></td>";
									echo "<tr>";
								}  
							?>
						</tbody>
					</table>
				  </div>
				</div>
		  	</div>
		</div>
	</div>
</div>
