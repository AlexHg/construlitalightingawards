<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<meta charset="utf-8" /> 
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">		
	<link rel="icon" href="assets/images/favicon.ico" />
	<?php echo $author; ?>
	<?php echo $description; ?>
	<?php echo $keyword; ?>
	<link rel="stylesheet" type="text/css" href="assets/css/normalize.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/css/app.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/owl.theme.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.css" />
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/sweetalert2/6.2.7/sweetalert2.min.css" />
    <!-- dropzone -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.css" />
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
	  ga('create', 'UA-91045338-1', 'auto');
	  ga('send', 'pageview');
	</script>
</head>
<body>
	<div class="container-fluid">
		<!--<div class="row yellow">
			<div class="col-lg-4 col-lg-offset-8 text-right p-top-10">
					Construlita Lighting Awards 2017
			</div>
		</div> -->
		<div class="hidden-sm hidden-md hidden-lg row imageMain alt-responsive" data-spy="affix" data-offset-top="50">
			&nbsp;
		</div>
		<div class="row imageMain main" data-spy="affix" data-offset-top="50">
			<div class="container-fluid">
				<a href="./">
					<div class="hidden-xs col-sm-4 col-lg-4 h-59">
						&nbsp;
					</div>
				</a>
				<div class="col-xs-12 col-sm-8 col-lg-8 text-right padding-auto">
					<?php
						if(isset($_SESSION["token_session"])){
							if($_SESSION["rol"] == 2){
							//echo "<a href='list-users' class='boton-sesion btn btn-register text-uppercase titles'>Usuarios registrados</a> ";
							echo "<a href='proyectos-sin-calificar' class='btn btn-register text-uppercase'>Proyectos sin calificar</a> ";
							echo "<a href='proyectos-calificados' class='boton-sesion btn btn-register text-uppercase titles'>Proyectos calificados</a> ";
							echo "<a href='logout' class='boton-sesion btn btn-register text-uppercase titles'>Cerrar sesión</a>";
							}elseif($_SESSION["rol"] == 3){
								echo "<a href='dashboard' class='btn btn-register text-uppercase'>Usuarios registrados</a> ";
								echo "<a href='dashboard-project-all' class='boton-sesion btn btn-register text-uppercase titles'>Proyectos finalizados</a> ";
								echo "<a href='logout' class='boton-sesion btn btn-register text-uppercase titles'>Cerrar sesión</a>";
							}else{
							echo "<a href='account-profile' class='btn btn-register text-uppercase'>Mi perfil</a> ";
							echo "<a href='logout' class='btn btn-register text-uppercase'>Cerrar sesión</a>";
							}
						}else{
							echo "<a href='sesion' class='btn btn-register text-uppercase'>Iniciar sesión</a>	";
							//echo "<a href='registro' class='btn btn-register text-uppercase'>registrarme</a>";
						}
					?>			
					<button class="menu-show">
						<span class="symbol-minus"></span>
						<span class="symbol-minus"></span>
						<span class="symbol-minus"></span>
					</button> 
				</div>
			</div>
		</div>
				<div id="construlita" class="overlay">
					<a href="javascript:void(0)" class="closebtn">&times;</a>
					<div class="overlay-content">
					<div class="row">
						<div class="col-lg-6 col-lg-offset-3">
							<a href="./">Construlita Lighting Awards 2018</a>
							<hr class="bottom-menu">
							<a href="ganadores">Conoce a los ganadores 2018</a>
							<hr class="bottom-menu">
							<a href="terminos-y-condiciones">Bases</a>
							<hr class="bottom-menu">
							<a href="categorias-realizados">Categorías</a>
							<hr class="bottom-menu">
							<a href="reconocimientos">Reconocimientos</a>
							<hr class="bottom-menu">
							<a href="proyectos-participantes">Proyectos Participantes 2018</a>
							<hr class="bottom-menu">
							<a href="ganadores">Conoce a los Ganadores</a>
							<hr class="bottom-menu">
							<a href="faqs">FAQ's</a>
							<hr class="bottom-menu">
							<!--<a href="sesion">REGISTRO</a>
							<hr class="bottom-menu">-->
						</div>
					</div>			
				</div>
		</div>
	</div>
		<?php
			echo $body_content;
		?>
	<footer class="imageSubmain">
		<div class="container-fluid text-center">
			<div class="row p-top-50-20">
				<div class="col-sm-10 col-sm-offset-1">
					<div class="row">
						<ul class="nav nav-pills nav-justified text-right">
							<li><img src="assets/images/logo1.png" class="img-responsive" alt="" /></li>
							<li><img src="assets/images/logo2.png" class="img-responsive" alt="" /></li>
							<li><img src="assets/images/logo3.png" class="img-responsive" alt="" /></li>
							<li><img src="assets/images/logo4.png" class="img-responsive expo" alt="" /></li>
						</ul>
						<!--<div class="col-md-3 integrantes">
						<img src="assets/images/grupo-construlita.png" class="img-responsive" alt="" />
						</div>
						<div class="col-md-3 integrantes">
							<img src="assets/images/construlita.png" class="img-responsive" alt="" />
						</div>
						<div class="col-md-3 integrantes">
							<img src="assets/images/tecnolite.png" class="img-responsive" alt="" />
						</div>
						<div class="col-md-3 integrantes">
							<img src="assets/images/ela2017.png" class="img-responsive" alt="" />
						</div> -->
					</div>
				</div>
			</div>
			<br>
			<div class="row p-top-15">
				<div class="col-lg-10 col-lg-offset-1 f-grays">	
					<div>
						CONTACTO: 
						<a href="mailto:Organizadores@awards.construlitalighting.com" class="f-grays">
							organizadores@awards.construlitalighting.com
						</a>
					</div>
					<div>
					</div>
					<div>
					</div>
					<div>
						<a href="terminos-y-condiciones" class="f-grays">Términos y Condiciones</a>  | 
						<a href="aviso-de-privacidad" class="f-grays">Aviso de Privacidad</a>
					</div>
					
				</div>
			</div>
		</div>
	</footer>
    <!-- dropzone -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.js"></script>

	<script src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
	<script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>	
	<script type="text/javascript" src="https://cdn.jsdelivr.net/sweetalert2/6.2.7/sweetalert2.min.js"></script>
	<script type="text/javascript" src="assets/js/app-construlita.js"></script>
	<script type="text/javascript" src="assets/js/app-construlita2.js"></script>
	<script type="text/javascript" src="assets/js/construlita.js"></script>
</body>
</html>			
