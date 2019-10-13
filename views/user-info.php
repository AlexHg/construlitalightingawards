<div class="container-fluid">
	<div class="row p-top-50 hola">
		<div class="row title-imagen" style="background-image: url('assets/images/info.png');"></div> 
		<div class="container">

	       <?php 
	       	foreach ($user_info as $key => $value) {
	       		echo "<h2 class='titles'>DATOS DEL PARTICIPANTE</h2>";
	       		echo "<p>Nombre: ".$value['name']." ".$value['lastname']."</p>";
	       		echo "<p>Email: ".$value['email']."</p>";
	       		echo "<h2 class='titles'>OCUPACIÓN</h2>";
	       		echo "<p>Situacion laboral: ".$value['labor_situation']."</p>";
	       		echo "<p>Profesión: ".$value['profession']."</p>";
	       		echo "<p>Empresa: ".$value['business']."</p>";
	       		echo "<p>Integrantes: ".$value['members']."</p>";
	       		echo "<h2 class='titles'>INFORMACIÓN DE CONTACTO</h2>";
	       		echo "<p>Calle y número: ".$value['street_number']."</p>";
	       		echo "<p>Colonia: ".$value['colonia']."</p>";
	       		echo "<p>Municipio: ".$value['municipio']."</p>";
	       		echo "<p>Estado: ".$value['estado']."</p>";
	       		echo "<p>Pais: ".$value['country']."</p>";
	       		echo "<p>Teléfono: ".$value['phone']."</p>";

	       	}
	       	echo "<h2 class='titles text-uppercase'>Proyectos realizados</h2>";
	       	foreach ($user_proj as $key => $value) {
	       		
	       		echo "<p><a href='details?id=".$value['id_project']."&stars=0'>".$value['name']."</a></p>"; 

	       	}
	       ?>
		</div>
	</div>
</div>
