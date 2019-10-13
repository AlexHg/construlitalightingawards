<div class="container-fluid">
	<div class="row p-top-50 hola">
		<div class="container">
		  	<div class="row title-imagen" style="background-image: url('assets/images/usuarios.png');"></div> 
	       <?php 

	       ?>
		  <table class="table table-hover">
		    <thead>
		      <tr>
		        <th>Nombre completo</th>
		        <th>Correo electrónico</th>
		        <th>Profesion</th>
		        <th class='text-center'>Proyectos registrados</th>
		      </tr>
		    </thead>
		    <tbody>
		    <?php 
		    	foreach ($users as $key => $value) {
		    		if($value["rol"] == 1 || $value["rol"] == 2){

		    		}else{
		    		$profesion = $value['profession'] == ""?"Pendiente ...":$value['profession'];
		    		
		    		echo "<tr>";
		    		echo "<td><a href=user-details?id=".$value['id_user'].">".$value['name'].' '.$value['lastname']."</a></td>";
		    		echo "<td><a href=user-details?id=".$value['id_user'].">".$value['email']."</a></td>";
		    		echo "<td><a href=user-details?id=".$value['id_user'].">".$profesion."</a></td>";
		    		echo "<td class='text-center'><a href=user-details?id=".$value['id_user'].">".$value['total']."</a></td>";
		    		echo "</tr>";
		    	
		    		}
		    	}
		     ?>
		    </tbody>
		  </table>
		</div>
	</div>
</div>
