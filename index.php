<?php

	session_start(); 
	date_default_timezone_set('America/Mexico_City');	
	
	require 'libraries/flight/Flight.php';
	require 'libraries/vendor/autoload.php';
	require 'functions/Galery.php';
	require 'functions/User.php';
	require 'functions/Project.php';
	require 'functions/Judge.php';
	require 'functions/Optimize.php';

	define('KB', 1024);
	define('MB', 1048576);
	define('GB', 1073741824);
	define('TB', 1099511627776);
		
	Flight::set('flight.views.path', 'views');

	//$host = "http://localhost/CLA18/";
	$host = "https://www.construlitalighting.com/cla/";

	#PAGINA 2019 
		// Home	
		Flight::route('/', function(){ 

			$data['title'] = 'Construlita Lighting Awards 2017';
			$data['author'] = '';
			$data['description'] = '';
			$data['keyword'] = '';
			$data['collections']= isset($categories) ? $categories : "";
			$data['instance']= isset($instance) ? $instance : "";

			Flight::render('site2019/home', $data,'body_content'); 
			Flight::render('layout/base');

		});

		// Home 7 marzo borrar cuando salga	
		Flight::route('/7marzohome', function(){ 

			$data['title'] = 'Construlita Lighting Awards 2017';
			$data['author'] = '';
			$data['description'] = '';
			$data['keyword'] = '';
			$data['collections']= isset($categories) ? $categories : "";
			$data['instance']= isset($instance) ? $instance : "";

			Flight::render('site2019/7marzohome', $data,'body_content'); 
			Flight::render('layout/base');

		});

		// Home revisión Ari	
		Flight::route('/homeBAK', function(){ 

			$data['title'] = 'Construlita Lighting Awards 2017';
			$data['author'] = '';
			$data['description'] = '';
			$data['keyword'] = '';
			$data['collections']= isset($categories) ? $categories : "";
			$data['instance']= isset($instance) ? $instance : "";

			Flight::render('site2019/homeBAK', $data,'body_content'); 
			Flight::render('layout/base');

		});

		// Otras ediciones
		Flight::route('/otras-ediciones', function(){

			$data['title'] = 'Construlita Lighting Awards 2017';
			$data['author'] = '';
			$data['description'] = '';
			$data['keyword'] = '';
			$data['collections']= isset($categories) ? $categories : "";
			$data['instance']= isset($instance) ? $instance : "";

			Flight::render('site2019/otras-ediciones', $data,'body_content'); 
			Flight::render('layout/base');

		});
		Flight::route('/faqs', function(){

			$data['title'] = 'Construlita Lighting Awards 2017';
			$data['author'] = '';
			$data['description'] = '';
			$data['keyword'] = '';
			$data['collections']= isset($categories) ? $categories : "";
			$data['instance']= isset($instance) ? $instance : "";

			Flight::render('site2019/faqs', $data,'body_content'); 
			Flight::render('layout/base');

		});
		Flight::route('/jurado', function(){

			$data['title'] = 'Construlita Lighting Awards 2017';
			$data['author'] = '';
			$data['description'] = '';
			$data['keyword'] = '';
			$data['collections']= isset($categories) ? $categories : "";
			$data['instance']= isset($instance) ? $instance : "";

			Flight::render('site2019/jurado', $data,'body_content'); 
			Flight::render('layout/base');

		});
		Flight::route('/liberacion-de-materiales', function(){

			$data['title'] = 'Construlita Lighting Awards 2017';
			$data['author'] = '';
			$data['description'] = '';
			$data['keyword'] = '';
			$data['collections']= isset($categories) ? $categories : "";
			$data['instance']= isset($instance) ? $instance : "";

			Flight::render('site2019/liberacion-de-materiales', $data,'body_content'); 
			Flight::render('layout/base');

		});
		Flight::route('/proyecto-1', function(){

			$data['title'] = 'Construlita Lighting Awards 2017';
			$data['author'] = '';
			$data['description'] = '';
			$data['keyword'] = '';
			$data['collections']= isset($categories) ? $categories : "";
			$data['instance']= isset($instance) ? $instance : "";

			Flight::render('site2019/proyecto-1', $data,'body_content'); 
			Flight::render('layout/base');

		});
		Flight::route('/proyectos-participantes', function(){

			$data['title'] = 'Construlita Lighting Awards 2017';
			$data['author'] = '';
			$data['description'] = '';
			$data['keyword'] = '';
			$data['collections']= isset($categories) ? $categories : "";
			$data['instance']= isset($instance) ? $instance : "";

			Flight::render('site2019/proyectos-participantes', $data,'body_content'); 
			Flight::render('layout/base');

		});
		Flight::route('/proyectos-participantes/@proyecto', function($proyecto){
			//echo "hola ".$proyecto;
			$data['title'] = 'Construlita Lighting Awards 2017';
			$data['author'] = '';
			$data['description'] = '';
			$data['keyword'] = '';
			$data['collections']= isset($categories) ? $categories : "";
			$data['instance']= isset($instance) ? $instance : "";

			Flight::render('site2019/proyectos-participantes/'.$proyecto/*, $data,'body_content'*/); 
			//Flight::render('layout/base');

		});
		Flight::route('/reconocimientos', function(){

			$data['title'] = 'Construlita Lighting Awards 2017';
			$data['author'] = '';
			$data['description'] = '';
			$data['keyword'] = '';
			$data['collections']= isset($categories) ? $categories : "";
			$data['instance']= isset($instance) ? $instance : "";

			Flight::render('site2019/reconocimientos', $data,'body_content'); 
			Flight::render('layout/base');

		});
		Flight::route('/convocatoria', function(){

			$data['title'] = 'Construlita Lighting Awards 2017';
			$data['author'] = '';
			$data['description'] = '';
			$data['keyword'] = '';
			$data['collections']= isset($categories) ? $categories : "";
			$data['instance']= isset($instance) ? $instance : "";

			Flight::render('site2019/convocatoria', $data,'body_content'); 
			Flight::render('layout/base');

		});
		Flight::route('/reglamento', function(){

			$data['title'] = 'Construlita Lighting Awards 2017';
			$data['author'] = '';
			$data['description'] = '';
			$data['keyword'] = '';
			$data['collections']= isset($categories) ? $categories : "";
			$data['instance']= isset($instance) ? $instance : "";

			Flight::render('site2019/reglamento', $data,'body_content'); 
			Flight::render('layout/base');

		});
	# end PAGINA 2019

	Flight::route('/sesion', function(){

		$data['title'] = 'Construlita Sesión';
		$data['author'] = '';
		$data['description'] = '';
		$data['keyword'] = '';
		$data['collections']= isset($categories) ? $categories : "";
		$data['instance']= isset($instance) ? $instance : "";

		Flight::render('site2019/registro', $data,'body_content'); 
		Flight::render('layout/base');

	});
	Flight::route('/recuperar-password', function(){

		$data['title'] = 'Construlita recuperar contraseña';
		$data['author'] = '';
		$data['description'] = '';
		$data['keyword'] = '';
		
		Flight::render('recuperar-password', $data,'body_content');
		Flight::render('layout/base');
		
	});	
		// Create User registro
		Flight::route('POST /create', function(){


			//Create name directory of photo profile
			// $url = "null";
			// $path = 'tmp/';
			// $dest = 'public/img-profiles';
			// $name = $_FILES['img_perfil']['name'];
			// $array = explode('.', $_FILES['img_perfil']['name']);
			// $extension = end($array);
			// move_uploaded_file($_FILES['img_perfil']['tmp_name'], "$path/$name");
	
			// $path = "$host$path$name";
			// $kraken = new Optimize();
			// $optimizer = $kraken->upload($path,1380,670);
			// if( $optimizer['status'] == true ){
			// 	$url_kraken = $optimizer['url'];
			// 	$url = $kraken->downloadImagen($url_kraken,$dest,$name);
			// }
			
			$user = new User();
			$create = $user->createUser($url);

			#print_r($create);
			#print_r($create["message"]);
			$data["message"] = $create["message"];
			if(intval($create['status']) == 1){
				if(isset($_SESSION["username"],$_SESSION["password"])){
					$user = new User();
					$login = $user->login_un($_SESSION["username"],$_SESSION["password"]);
					
				}else{
					$user = new User();
					$login = $user->login();
					
				}
				header("Location: ".$host."editar-perfil"); 
	
			}else if(isset($data["message"])){
				header("Location: ".$host."sesion?message=".$data["message"]); 
			}
			Flight::render('site2019/registro-message', $data,'body_content'); 
			Flight::render('layout/base');
			
		});	

	# PARTICIPANTE
		Flight::route('/participante', function(){

			$user = new User();
			if( $user->verify() != true ){
				Flight::redirect('sesion');
			}

			$project = new User();
			$projects = $user->getprojectUnconfirmed();

			$data['title'] = 'Construlita Confirmar proyecto';
			$data['author'] = '';
			$data['description'] = '';
			$data['keyword'] = '';
			$data['projects']= $projects;
			Flight::render('admin/participante/component/header', $data,'header'); 
			Flight::render('admin/participante/component/subheader', $data,'subheader'); 
			Flight::render('admin/participante/component/leftside-profile', $data,'profile'); 
			Flight::render('admin/participante/main', $data,'content'); 
			Flight::render('admin/participante/layout/base', $data,'body_content');
			Flight::render('layout/admin-base');
		});

		Flight::route('/proyecto', function(){
			$user = new User();
			if( $user->verify() != true ){
				Flight::redirect('sesion');
			}

			if(isset($_GET['id'])){
				$project = new Project();
				$projects = $project->getProjectByUsConf($_GET['id']);

				if($projects!= false ){

					$data['title'] = 'Construlita cuenta';
					$data['author'] = '';
					$data['description'] = '';
					$data['keyword'] = '';
					$data['projects']= $projects;
					

					Flight::render('admin/participante/component/header', $data,'header'); 
					Flight::render('admin/participante/component/subheader', $data,'subheader'); 
					Flight::render('admin/participante/component/leftside-profile', $data,'profile'); 
					Flight::render('admin/participante/proyecto', $data,'content');
					Flight::render('admin/participante/layout/base', $data,'body_content');
					Flight::render('layout/admin-base');

				}else{
					Flight::redirect('/participante');
				}
			}else{
				Flight::redirect('/participante');
			}
		});
		// first screen on user login
		Flight::route('/editar-proyecto', function(){
			$user = new User();
			if( $user->verify() != true ){
				Flight::redirect('sesion');
			}

			if(isset($_GET['id'])){
				$project = new User();
				//Se agregao el status 1 para poder modificar aun asi 
				$projects = $project->getprojectByUser($_GET['id']);

				// if($projects!= false ){
					$cat1 = $user->getUsedCategory(1);
					$cat2 = $user->getUsedCategory(2);
					$cat3 = $user->getUsedCategory(3);
					$cat4 = $user->getUsedCategory(4);
					$cat5 = $user->getUsedCategory(5);
					$categorys = [$cat1,$cat2,$cat3,$cat4,$cat5];
					$data['title'] = 'Construlita cuenta';
					$data['author'] = '';
					$data['description'] = '';
					$data['keyword'] = '';
					$data['projects'] = $projects;
					$data['category'] = $categorys;
					$data['user'] = $usrInfo;
					$data['title2'] = "Editar <b>proyecto</b>";
					//Flight::render('details-project', $data,'body_content');
					#Flight::render('upload-project-1', $data,'body_content');
					#Flight::render('layout/base-1');
					Flight::render('admin/participante/component/header', $data,'header'); 
					Flight::render('admin/participante/component/subheader', $data,'subheader'); 
					Flight::render('admin/participante/component/leftside-profile', $data,'profile'); 
					#Flight::render('admin/participante/proyecto', $data,'content');
					Flight::render('admin/participante/proyecto-nuevo', $data,'content'); 
					Flight::render('admin/participante/layout/base', $data,'body_content');
					Flight::render('layout/admin-base');

				// }else{
				// 	Flight::redirect('account-profile');
				// }

			}else{
				Flight::redirect('account-profile');
			}

		});
		Flight::route('/proyectos-pendientes', function(){

			$user = new User();
			if( $user->verify() != true ){
				Flight::redirect('sesion');
			}

			$project = new User();
			$projects = $user->getprojectUnconfirmed();

			$data['title'] = 'Construlita Confirmar proyecto';
			$data['author'] = '';
			$data['description'] = '';
			$data['keyword'] = '';
			$data['projects']= $projects;
			Flight::render('admin/participante/component/header', $data,'header'); 
			Flight::render('admin/participante/component/subheader', $data,'subheader'); 
			Flight::render('admin/participante/component/leftside-profile', $data,'profile'); 
			Flight::render('admin/participante/proyectos-pendientes', $data,'content'); 
			Flight::render('admin/participante/layout/base', $data,'body_content');
			Flight::render('layout/admin-base');

		});

		Flight::route('/proyectos-postulados', function(){

			$user = new User();
			if( $user->verify() != true ){
				Flight::redirect('sesion');
			}

			$project = new User();
			$projects = $user->getprojectUnconfirmed();

			$data['title'] = 'Construlita Confirmar proyecto';
			$data['author'] = '';
			$data['description'] = '';
			$data['keyword'] = '';
			$data['projects']= $projects;
			Flight::render('admin/participante/component/header', $data,'header'); 
			Flight::render('admin/participante/component/subheader', $data,'subheader'); 
			Flight::render('admin/participante/component/leftside-profile', $data,'profile'); 
			Flight::render('admin/participante/proyectos-postulados', $data,'content'); 
			Flight::render('admin/participante/layout/base', $data,'body_content');
			Flight::render('layout/admin-base');

		});

		Flight::route('/proyecto-nuevo', function(){

			$user = new User();
			if( $user->verify() != true ){
				Flight::redirect('sesion');
			}
			$project = new Project();
			$user = new User();
			$projects = $project->getProjects(10);
			$cat1 = $user->getUsedCategory(1);
			$cat2 = $user->getUsedCategory(2);
			$cat3 = $user->getUsedCategory(3);
			$cat4 = $user->getUsedCategory(4);
			$cat5 = $user->getUsedCategory(5);
			$categorys = [$cat1,$cat2,$cat3,$cat4,$cat5];
			$data['title'] = 'Construlita Datos del proyecto';
			$data['author'] = '';
			$data['description'] = '';
			$data['keyword'] = '';
			$data['category']= $categorys;
			$data['title2'] = "Proyecto <b>nuevo</b>";
			Flight::render('admin/participante/component/header', $data,'header'); 
			Flight::render('admin/participante/component/subheader', $data,'subheader'); 
			Flight::render('admin/participante/component/leftside-profile', $data,'profile'); 
			Flight::render('admin/participante/proyecto-nuevo', $data,'content'); 
			Flight::render('admin/participante/layout/base', $data,'body_content');
			Flight::render('layout/admin-base');

			//Flight::render('upload-project-1', $data,'body_content');
			//Flight::render('layout/base-1');


		});
		Flight::route('/postular', function(){
			$user = new User();
			if( $user->verify() != true ){
				Flight::redirect('sesion');
			}
			$project = new Project();
			$user = new User();

			$id = $_GET["id"];
			$msg = $user->updateStatusProject($id);
			//print_r($msg);
			header("Location: ".$host."proyecto?id=".$id);

		});
		

		Flight::route('/editar-perfil', function(){
			$user = new User();
			if( $user->verify() != true ){
				Flight::redirect('sesion');
			}

			$project = new User();
			$projects = $user->getprojectUnconfirmed();
			$galery = new Galery();
			$usrInfo = $user->userInfo();
			$images = $galery->getFiles($usrInfo['path_image']);

			$data['title'] = 'Construlita registro';
			$data['author'] = '';
			$data['description'] = '';
			$data['keyword'] = '';
			$data['user']= $usrInfo;
			#$data['profile'] = $images[0];
			$data['projects']= $projects;

			Flight::render('admin/participante/component/header', $data,'header'); 
			Flight::render('admin/participante/component/subheader', $data,'subheader'); 
			Flight::render('admin/participante/component/leftside-profile', $data,'profile'); 
			Flight::render('admin/participante/editar-perfil', $data,'content'); 
			Flight::render('admin/participante/layout/base', $data,'body_content');
			Flight::render('layout/admin-base');

		});

	# end PARTICIPANTE

	# JURADO
	# end JURADO


	# Dashboard ADMIN
		Flight::route('/generate', function(){
			echo password_hash("@Cloudy51", PASSWORD_DEFAULT);
		});
		
		Flight::route('/dashboard', function(){

			$user = new User();
			if( $user->verify() != true ){
				Flight::redirect('sesion');
			}elseif( $_SESSION['rol'] == 3){
			}else{
				$_SESSION['alerta'] = ["status"=>"Error! ","message"=>"No tienes los privilegios necesarios para acceder a esta sección."];
				Flight::redirect('sesion');
			}

			$allUsers = $user->allUsersProy();
			$noProjects = $user->noProjects();
			$incompleteProjects = $user->incompleteProjects();
			$completeProjects = $user->completeProjects();


			$data['title'] = 'Construlita Lighting Awards 2017';
			$data['author'] = '';
			$data['description'] = '';
			$data['keyword'] = '';
			$data['allUsers'] = $allUsers;
			$data['noProjects'] = $noProjects;
			$data['incompleteProjects'] = $incompleteProjects;
			$data['completeProjects'] = $completeProjects;

			Flight::render('admin/sadmin/component/header', $data,'header'); 
			Flight::render('admin/sadmin/component/subheader', $data,'subheader'); 
			Flight::render('admin/sadmin/component/leftside-profile', $data,'profile'); 
			//Flight::render('admin/sadmin/proyectos-list', $data,'content'); 
			Flight::render('admin/sadmin/users', $data,'content');
			Flight::render('admin/sadmin/layout/base', $data,'body_content');
			Flight::render('layout/admin-base');
			
			//Flight::render('layout/base');

		});
		Flight::route('/user-profile', function(){

			$user = new User();
			if( $user->verify() != true ){
				Flight::redirect('sesion');
			}elseif( $_SESSION['rol'] == 3){
			}else{
				$_SESSION['alerta'] = ["status"=>"Error! ","message"=>"No tienes los privilegios necesarios para acceder a esta sección."];
				Flight::redirect('sesion');
			}

			if(isset($_GET['id'])){

			$user_i = new User();
			$user = $user_i->getById($_GET['id']);

			$proy = $user_i->getByIdProj($user[0]["id_user"]);

			$data['title'] = 'Construlita Lighting Awards 2017';
			$data['author'] = '';
			$data['description'] = '';
			$data['keyword'] = '';
			$data['user_info'] = $user[0];
			$data['projects'] = $proy;
			Flight::render('admin/sadmin/component/header', $data,'header'); 
			Flight::render('admin/sadmin/component/subheader', $data,'subheader'); 
			Flight::render('admin/sadmin/component/leftside-profile', $data,'profile'); 
			//Flight::render('admin/sadmin/proyectos-list', $data,'content'); 
			Flight::render('admin/sadmin/user-profile', $data,'content');
			Flight::render('admin/sadmin/layout/base', $data,'body_content');
			Flight::render('layout/admin-base');



			}else{
				Flight::redirect('list-users');
			}

		});
		Flight::route('/user-profile-edit', function(){
			$user = new User();
			if( $user->verify() != true ){
				Flight::redirect('sesion');
			}
			if(isset($_GET['id'])){
			$project = new User();
			$projects = $user->getprojectUnconfirmed();
			$galery = new Galery();
			$usrInfo = $user->userInfoId($_GET['id']);
			$images = $galery->getFiles($usrInfo['path_image']);

			$data['title'] = 'Construlita registro';
			$data['author'] = '';
			$data['description'] = '';
			$data['keyword'] = '';
			$data['user']= $usrInfo;
			#$data['profile'] = $images[0];
			$data['projects']= $projects;

			Flight::render('admin/sadmin/component/header', $data,'header'); 
			Flight::render('admin/sadmin/component/subheader', $data,'subheader'); 
			Flight::render('admin/sadmin/component/leftside-profile', $data,'profile'); 
			Flight::render('admin/sadmin/editar-perfil', $data,'content'); 
			Flight::render('admin/sadmin/layout/base', $data,'body_content');
			Flight::render('layout/admin-base');
			}else{
				Flight::redirect('list-users');
			}
		});
		Flight::route('/dashboard-project-all', function(){

			$user = new User();
			if( $user->verify() != true ){
				Flight::redirect('sesion');
			}elseif($_SESSION['rol'] == 3){
			}else{
				$_SESSION['alerta'] = ["status"=>"Error! ","message"=>"No tienes los privilegios necesarios para acceder a esta sección."];
				Flight::redirect('sesion');
			}
			
			$user = new User();
			
			if(isset($_GET['cat']) || $_GET['cat'] == 1 || $_GET['cat'] == 2 || $_GET['cat'] == 3 || $_GET['cat'] == 4 || $_GET['cat'] == 5){
				$projects = $user->getAllProjectsScoreByCategory($_GET['cat']);
			}else{

				$page = isset($_GET['page'])?intval($_GET['page']):1;
				$projects = $user->getAllProjectsScore($page);
				
			}


			$data['title'] = 'Construlita Lighting Awards 2017';
			$data['author'] = '';
			$data['description'] = '';
			$data['keyword'] = '';
			$data['projects']= $projects;
			$data['indice']= $projects[0]['indice'];
			$data['url'] = 'dashboard-project-all';
			Flight::render('admin/sadmin/component/header', $data,'header'); 
			Flight::render('admin/sadmin/component/subheader', $data,'subheader'); 
			Flight::render('admin/sadmin/component/leftside-profile-cat', $data,'profile'); 
			Flight::render('admin/sadmin/proyectos-list', $data,'content');
			//Flight::render('admin/sadmin/users', $data,'content');
			Flight::render('admin/sadmin/layout/base', $data,'body_content');
			Flight::render('layout/admin-base');
			//Flight::render('layout/base');

		});

		Flight::route('/dashboard-user', function(){

			$user = new User();
			if( $user->verify() != true ){
				Flight::redirect('sesion');
			}elseif( $_SESSION['rol'] == 3){
			}else{
				$_SESSION['alerta'] = ["status"=>"Error! ","message"=>"No tienes los privilegios necesarios para acceder a esta sección."];
				Flight::redirect('sesion');
			}

			if(isset($_GET['id'])){

			$user_i = new User();
			$user = $user_i->getById($_GET['id']);

			$proy = $user_i->getByIdProj($user[0]["id_user"]);

			$data['title'] = 'Construlita Lighting Awards 2017';
			$data['author'] = '';
			$data['description'] = '';
			$data['keyword'] = '';
			$data['user_info'] = $user[0];
			$data['user_proj'] = $proy;
				
			Flight::render('dashboard-user', $data,'body_content');
			Flight::render('layout/base');

			}else{
				Flight::redirect('list-users');
			}

		});

		Flight::route('/dashboard-project-details', function(){

			$user = new User();
			if( $user->verify() != true ){
				Flight::redirect('sesion');
			}elseif( $_SESSION['rol'] == 3){
			}else{
				$_SESSION['alerta'] = ["status"=>"Error! ","message"=>"No tienes los privilegios necesarios para acceder a esta sección."];
				Flight::redirect('sesion');
			}
			
			if(isset($_GET['id'])){

			$project = new Project();
			$proy = $project->getProjectAdmin( $_GET['id'] );
			$score = $project->getScoreProjectAdmin( $_GET['id'] );

			$data['title'] = 'Construlita Lighting Awards 2017';
			$data['author'] = '';
			$data['description'] = '';
			$data['keyword'] = '';
			$data['projects'] = $proy;
			$data['score'] = $score ;
			Flight::render('admin/sadmin/component/header', $data,'header'); 
			Flight::render('admin/sadmin/component/subheader', $data,'subheader'); 
			Flight::render('admin/sadmin/component/leftside-profile', $data,'profile'); 
			#Flight::render('dashboard-project-details', $data,'content');
			Flight::render('admin/sadmin/proyecto', $data,'content');  
			Flight::render('admin/sadmin/layout/base', $data,'body_content');
			Flight::render('layout/admin-base');


			}else{
				Flight::redirect('list-users');
			}

		});

		Flight::route('/dashboard-project-edit', function(){
			$user = new User();
			if( $user->verify() != true ){
				Flight::redirect('sesion');
			}

			if(isset($_GET['id'])){
				$project = new User();
				//Se agregao el status 1 para poder modificar aun asi 
				$projects = $project->getprojectByUserNoLog($_GET['id']);

				// if($projects!= false ){
					$cat1 = $user->getUsedCategory(1);
					$cat2 = $user->getUsedCategory(2);
					$cat3 = $user->getUsedCategory(3);
					$cat4 = $user->getUsedCategory(4);
					$cat5 = $user->getUsedCategory(5);
					$categorys = [$cat1,$cat2,$cat3,$cat4,$cat5];
					$data['title'] = 'Construlita cuenta';
					$data['author'] = '';
					$data['description'] = '';
					$data['keyword'] = '';
					$data['projects']= $projects;
					$data['category']= $categorys;
					$data['user']= $usrInfo;
					$data['title2'] = "Editar <b>proyecto</b>";
					//Flight::render('details-project', $data,'body_content');
					#Flight::render('upload-project-1', $data,'body_content');
					#Flight::render('layout/base-1');
					Flight::render('admin/sadmin/component/header', $data,'header'); 
					Flight::render('admin/sadmin/component/subheader', $data,'subheader'); 
					Flight::render('admin/sadmin/component/leftside-profile', $data,'profile'); 
					#Flight::render('admin/participante/proyecto', $data,'content');
					Flight::render('admin/sadmin/editar-proyecto', $data,'content'); 
					Flight::render('admin/sadmin/layout/base', $data,'body_content');
					Flight::render('layout/admin-base');

				// }else{
				// 	Flight::redirect('account-profile');
				// }

			}else{
				Flight::redirect('account-profile');
			}

		});		
	# End dashboard ADMIN

	Flight::route('/info', function(){

		phpinfo();

	});

	Flight::route('/rotate', function(){

		if( isset($_POST['orientation'],$_POST['name']) ){
			$orientation = $_POST['orientation'];
			$filename = $_POST['name'];
			$rotateFilename = "public/projects/$filename";
			$orientationLeft = 90;
			$orientationRight = -90;
			$degrees = $orientation == "left"?$orientationLeft:$orientationRight;


			$fileType = strtolower(substr($filename, strrpos($filename, '.') + 1));

			echo $fileType;
			if($fileType == 'png' || $fileType == 'PNG'){
			   header('Content-type: image/png');
			   $source = imagecreatefrompng($rotateFilename);
			   $bgColor = imagecolorallocatealpha($source, 255, 255, 255, 127);
			   // Rotate
			   $rotate = imagerotate($source, $degrees, $bgColor);
			   imagesavealpha($rotate, true);
			   imagepng($rotate,$rotateFilename);

			}

			if($fileType == 'jpg' || $fileType == 'jpeg'){
			   header('Content-type: image/jpeg');
			   $source = imagecreatefromjpeg($rotateFilename);
			   // Rotate
			   $rotate = imagerotate($source, $degrees, 0);
			   imagejpeg($rotate,$rotateFilename);
			}

			imagedestroy($source);
			imagedestroy($rotate);

			echo "sucess";
		}else{
			echo "failed";
		}


	});

	Flight::route('/ganadores', function(){

		$data['title'] = 'Construlita Lighting Awards 2017';
		$data['author'] = '';
		$data['description'] = '';
		$data['keyword'] = '';
		$data['collections']= $categories;
		$data['instance']= $instance;
		Flight::render('winners', $data,'body_content');
		Flight::render('layout/base');

	});

	Flight::route('/ganadores-2018', function(){

		$data['title'] = 'Construlita Lighting Awards 2018';
		$data['author'] = '';
		$data['description'] = '';
		$data['keyword'] = '';
		$data['collections']= $categories;
		$data['instance']= $instance;
		Flight::render('winners-2018', $data,'body_content');
		Flight::render('layout/base');

	});

	Flight::route('/detalles', function(){

		if(isset($_GET['id'])){
			$project = new Project();
			$projects = $project->getProjectByUsConff($_GET['id']);

			if($projects!= false ){

				$data['title'] = 'Construlita cuenta';
				$data['author'] = '';
				$data['description'] = '';
				$data['keyword'] = '';
				$data['projects']= $projects;
				Flight::render('evaluation', $data,'body_content');
				Flight::render('layout/base');

			}else{
				Flight::redirect('account-profile');
			}

		}else{
			Flight::redirect('account-profile');
		}

	});
	
	// JUEZ	
	Flight::route('/juez', function(){
		
		$user = new User();
		
		if(isset($_GET['cat']) || $_GET['cat'] == 1 || $_GET['cat'] == 2 || $_GET['cat'] == 3 || $_GET['cat'] == 4 || $_GET['cat'] == 5){
			$projects = $user->getAllProjectsbyCategory($_GET['cat']);
		}else{

			$page = isset($_GET['page'])?intval($_GET['page']):1;
			$projects = $user->getAllProjects($page);
			
		}

		$data['title'] = 'Construlita Lighting Awards 2017';
		$data['author'] = '';
		$data['description'] = '';
		$data['keyword'] = '';
		$data['projects']= $projects;
		$data['indice']= $projects[0]['indice'];
		Flight::render('judge-public', $data,'body_content');
		Flight::render('layout/base');

	});

	Flight::route('/editar-perfil-jurado', function(){
		$user = new User();
		if( $user->verify() != true ){
			Flight::redirect('sesion');
		}

		$project = new User();
		$projects = $user->getprojectUnconfirmed();
		$galery = new Galery();
		$usrInfo = $user->userInfo();
		$images = $galery->getFiles($usrInfo['path_image']);

		$data['title'] = 'Construlita registro';
		$data['author'] = '';
		$data['description'] = '';
		$data['keyword'] = '';
		$data['user']= $usrInfo;
		#$data['profile'] = $images[0];
		$data['projects']= $projects;

		Flight::render('admin/jurado/component/header', $data,'header'); 
		Flight::render('admin/jurado/component/subheader', $data,'subheader'); 
		Flight::render('admin/jurado/component/leftside-profile', $data,'profile'); 
		Flight::render('admin/jurado/editar-perfil', $data,'content'); 
		Flight::render('admin/jurado/layout/base', $data,'body_content');
		Flight::render('layout/admin-base');

	});

	Flight::route('/proyectos-sin-calificar', function(){
		$user = new User();
		if( $user->verify() != true ){
			Flight::redirect('sesion');
		}elseif($_SESSION['rol'] == 1 || $_SESSION['rol'] == 2){
		}else{
			$_SESSION['alerta'] = ["status"=>"Error! ","message"=>"No tienes los privilegios necesarios para acceder a esta sección."];
			Flight::redirect('sesion');
		}
		
		$user = new User();
		
		if(isset($_GET['cat']) || $_GET['cat'] == 1 || $_GET['cat'] == 2 || $_GET['cat'] == 3 || $_GET['cat'] == 4 || $_GET['cat'] == 5){
			$projects = $user->getAllProjectsbyCategoryUnQualify($_GET['cat']);
		}else{

			$page = isset($_GET['page'])?intval($_GET['page']):1;
			$projects = $user->getAllProjectsUnQualify($page);
			
		}
		// var_dump($projects);
		// echo "<pre>";
		// var_dump($projects);
		// echo "</pre>";
		$data['title'] = 'Construlita Lighting Awards 2017';
		$data['author'] = '';
		$data['description'] = '';
		$data['keyword'] = '';
		$data['projects']= $projects;
		$data['uncalfz'] = count($projects);
		$data["calfz"] = count($user->getAllProjectsQualify($page));
		$data['indice']= $projects[0]['indice'];
		$data['url'] = 'proyectos-sin-calificar';
		/*Flight::render('judge-view', $data,'body_content');
		Flight::render('layout/base');*/

		Flight::render('admin/jurado/component/header', $data,'header'); 
		Flight::render('admin/jurado/component/subheader', $data,'subheader'); 
		Flight::render('admin/jurado/component/leftside-profile-cat', $data,'profile'); 
		Flight::render('admin/jurado/proyectos-list', $data,'content'); 
		Flight::render('admin/jurado/layout/base', $data,'body_content');
		Flight::render('layout/admin-base');
	});

	Flight::route('/proyectos-calificados', function(){
		$user = new User();
		if( $user->verify() != true ){
			Flight::redirect('sesion');
		}elseif($_SESSION['rol'] == 1 || $_SESSION['rol'] == 2){
		}else{
			$_SESSION['alerta'] = ["status"=>"Error! ","message"=>"No tienes los privilegios necesarios para acceder a esta sección."];
			Flight::redirect('sesion');
		}
		
		$user = new User();
		
		if(isset($_GET['cat']) || $_GET['cat'] == 1 || $_GET['cat'] == 2 || $_GET['cat'] == 3 || $_GET['cat'] == 4 || $_GET['cat'] == 5){
			$projects = $user->getAllProjectsbyCategoryQualify($_GET['cat']);
		}else{

			$page = isset($_GET['page'])?intval($_GET['page']):1;
			$projects = $user->getAllProjectsQualify($page);
			
		}

		$data['title'] = 'Construlita Lighting Awards 2017';
		$data['author'] = '';
		$data['description'] = '';
		$data['keyword'] = '';
		$data['projects']= $projects;
		$data['uncalfz'] = count($user->getAllProjectsUnQualify($page));
		$data["calfz"] = count($projects);
		$data['indice']= $projects[0]['indice'];
		$data['url'] = 'proyectos-calificados';
		/*Flight::render('judge-view', $data,'body_content');
		Flight::render('layout/base');*/

		Flight::render('admin/jurado/component/header', $data,'header'); 
		Flight::render('admin/jurado/component/subheader', $data,'subheader'); 
		Flight::render('admin/jurado/component/leftside-profile-cat', $data,'profile'); 
		Flight::render('admin/jurado/proyectos-list', $data,'content'); 
		Flight::render('admin/jurado/layout/base', $data,'body_content');
		Flight::render('layout/admin-base');
	});

	Flight::route('/proyecto-detalles', function(){

		$user = new User();
		if( $user->verify() != true ){
			Flight::redirect('sesion');
		}

		if(isset($_GET['id'])){
			$project = new Project();
			$judge = new Judge();

			$projects = $project->getProjectByUsConff($_GET['id']);
			// cuando se necesite bloquear modificacion de proyectos confirmados
			//if($projects!= false ){
				$calificacion = $judge->getSt($_GET['id']);

				$data['title'] = 'Construlita cuenta';
				$data['author'] = '';
				$data['description'] = '';
				$data['keyword'] = '';
				$data['projects']= $projects;
				$data['calif'] = $calificacion;
				//Flight::render('evaluation', $data,'body_content');
				//Flight::render('layout/base');

			// }else{
			// 	Flight::redirect('account-profile');
			// }

			Flight::render('admin/jurado/component/header', $data,'header'); 
			Flight::render('admin/jurado/component/subheader', $data,'subheader'); 
			Flight::render('admin/jurado/component/leftside-profile', $data,'profile'); 
			Flight::render('admin/jurado/proyecto', $data,'content');
			//Flight::render('evaluation', $data,'content'); 
			Flight::render('admin/jurado/layout/base', $data,'body_content');
			Flight::render('layout/admin-base');

		}else{
			Flight::redirect('account-profile');
		}

	});
	// Flight::route('/proyectos-participantes', function(){
		
	// 	$user = new User();
		
	// 	if(isset($_GET['cat']) || $_GET['cat'] == 1 || $_GET['cat'] == 2 || $_GET['cat'] == 3 || $_GET['cat'] == 4 || $_GET['cat'] == 5){
	// 		$projects = $user->getAllProjectsbyCategory($_GET['cat']);
	// 	}else{

	// 		$page = isset($_GET['page'])?intval($_GET['page']):1;
	// 		$projects = $user->getAllProjects($page);
			
	// 	}

	// 	$data['title'] = 'Construlita Lighting Awards 2017';
	// 	$data['author'] = '';
	// 	$data['description'] = '';
	// 	$data['keyword'] = '';
	// 	$data['projects']= $projects;
	// 	$data['indice']= $projects[0]['indice'];
	// 	Flight::render('view-projects-users', $data,'body_content');
	// 	Flight::render('layout/base');
	// });

	Flight::route('/proyectos-participantes', function(){

		$data['title'] = 'Proyectos participantes 2018';
		$data['author'] = '';
		$data['description'] = '';
		$data['keyword'] = '';

		Flight::render('proyectos-participantes-2018', $data,'body_content');
		Flight::render('layout/base');

	});

	Flight::route('/galeria-de-proyectos', function(){
		
		$user = new User();
		
		if(isset($_GET['cat']) || $_GET['cat'] == 1 || $_GET['cat'] == 2 || $_GET['cat'] == 3 || $_GET['cat'] == 4 || $_GET['cat'] == 5){
			$projects = $user->getImagesByCategory($_GET['cat']);
		}

		$data['title'] = 'Galería de proyectos';
		$data['author'] = '';
		$data['description'] = '';
		$data['keyword'] = '';
		$data['projects']= $projects;
		Flight::render('galeria-participantes-2018', $data,'body_content');
		Flight::render('layout/base');

	});


	Flight::route('/judge', function(){

		$user = new User();
		if( $user->verify() != true ){
			Flight::redirect('sesion');
		}elseif($_SESSION['rol'] == 1 || $_SESSION['rol'] == 2){
		}else{
			$_SESSION['alerta'] = ["status"=>"Error! ","message"=>"No tienes los privilegios necesarios para acceder a esta sección."];
			Flight::redirect('sesion');
		}
		
		$user = new User();
		
		if(isset($_GET['cat']) || $_GET['cat'] == 1 || $_GET['cat'] == 2 || $_GET['cat'] == 3 || $_GET['cat'] == 4 || $_GET['cat'] == 5){
			$projects = $user->getAllProjectsbyCategory($_GET['cat']);
		}else{

			$page = isset($_GET['page'])?intval($_GET['page']):1;
			$projects = $user->getAllProjects($page);
			
		}

		$data['title'] = 'Construlita Lighting Awards 2017';
		$data['author'] = '';
		$data['description'] = '';
		$data['keyword'] = '';
		$data['projects']= $projects;
		$data['indice']= $projects[0]['indice'];
		Flight::render('judge', $data,'body_content');
		Flight::render('layout/base');

	});





	// Este caso solo aplica para los superadmnistradores
	// Flight::route('/list-users', function(){

	// 	$user = new User();
	// 	if( $user->verify() != true ){
	// 		Flight::redirect('sesion');
	// 	}elseif( $_SESSION['rol'] == 2){
	// 	}else{
	// 		$_SESSION['alerta'] = ["status"=>"Error! ","message"=>"No tienes los privilegios necesarios para acceder a esta sección."];
	// 		Flight::redirect('sesion');
	// 	}

	// 	$user = new User();
	// 	$users = $user->getAllUsers();


	// 	$data['title'] = 'Construlita Lighting Awards 2017';
	// 	$data['author'] = '';
	// 	$data['description'] = '';
	// 	$data['keyword'] = '';
	// 	$data['users'] = $users;

	// 	Flight::render('list-users', $data,'body_content');
	// 	Flight::render('layout/base');

	// });

	Flight::route('/user-details', function(){

		if(isset($_GET['id'])){

		$user_i = new User();
		$user = $user_i->getById($_GET['id']);

		$proy = $user_i->getByIdProj($user[0]["id_user"]);

		$data['title'] = 'Construlita Lighting Awards 2017';
		$data['author'] = '';
		$data['description'] = '';
		$data['keyword'] = '';
		$data['user_info'] = $user;
		$data['user_proj'] = $proy;

		Flight::render('user-info', $data,'body_content');
		Flight::render('layout/base');

		}else{
			Flight::redirect('list-users');
		}

		$user = new User();
		$users = $user->getAllUsers();

	});


	Flight::route('POST /stars', function(){

		$judge = new Judge();

		$id_user = $_SESSION["id_user"];
		$matriz = $_POST["caracteristicas"];
		$comments = $_POST["comentarios"];

		$apply = $judge->routeStars(intval($_POST['id_project']),$_POST['stars'],intval($id_user),$matriz,$comments);
		echo Flight::json($apply);

	});


	Flight::route('/details', function(){

		$user = new User();
		if( $user->verify() != true ){
			Flight::redirect('sesion');
		}

		if(isset($_GET['id'])){
			$project = new Project();
			$judge = new Judge();

			$projects = $project->getProjectByUsConff($_GET['id']);
			// cuando se necesite bloquear modificacion de proyectos confirmados
			//if($projects!= false ){
				$calificacion = $judge->getSt($_GET['id']);

				$data['title'] = 'Construlita cuenta';
				$data['author'] = '';
				$data['description'] = '';
				$data['keyword'] = '';
				$data['projects']= $projects;
				$data['calif'] = $calificacion;
				Flight::render('evaluation', $data,'body_content');
				Flight::render('layout/base');

			// }else{
			// 	Flight::redirect('account-profile');
			// }

		}else{
			Flight::redirect('account-profile');
		}

	});

	Flight::route('/detalles-proyecto', function(){

		if(isset($_GET['id'])){
			$project = new Project();
			$judge = new Judge();

			$projects = $project->getProjectByUsConff($_GET['id']);
			// cuando se necesite bloquear modificacion de proyectos confirmados
			//if($projects!= false ){
				$calificacion = $judge->getSt($_GET['id']);

				$data['title'] = 'Construlita cuenta';
				$data['author'] = '';
				$data['description'] = '';
				$data['keyword'] = '';
				$data['projects']= $projects;
				$data['calif'] = $calificacion;
				Flight::render('evaluation', $data,'body_content');
				Flight::render('layout/base');

			// }else{
			// 	Flight::redirect('account-profile');
			// }

		}else{
			Flight::redirect('proyectos-participantes');
		}

	});


	Flight::route('/evaluation', function(){

		$user = new User();
		if( $user->verify() != true ){
			Flight::redirect('sesion');
		}

		if(isset($_GET['id'])){
			$project = new Project();
			$judge = new Judge();
			$calificacion = $judge->getSt($_GET['id']);
			$projects = $project->getProjectByUsConff($_GET['id']);
			if($projects!= false ){

				$data['title'] = 'Construlita cuenta';
				$data['author'] = '';
				$data['description'] = '';
				$data['keyword'] = '';
				$data['projects'] = $projects;
				$data['calif'] = $calificacion;
				Flight::render('stars', $data,'body_content');
				Flight::render('layout/base');

			}else{
				Flight::redirect('account-profile');
			}

		}else{
			Flight::redirect('account-profile');
		}

	});

	// Registro
	/*Flight::route('/sesion', function(){

		$data['title'] = 'Construlita registro';
		$data['author'] = '';
		$data['description'] = '';
		$data['keyword'] = '';
		$data['collections']= $categories;
		$data['instance']= $instance;
		Flight::render('iniciar-sesion', $data,'body_content');
		Flight::render('layout/base');

	});*/

	Flight::route('/edit-profile', function(){

		$user = new User();
		if( $user->verify() != true ){
			Flight::redirect('sesion');
		}
		$galery = new Galery();

		$usrInfo = $user->userInfo();

		$images = $galery->getFiles($usrInfo['path_image']);

		$data['title'] = 'Construlita registro';
		$data['author'] = '';
		$data['description'] = '';
		$data['keyword'] = '';
		$data['user']= $usrInfo;
		$data['profile'] = $images[0];
		Flight::render('edit-profile', $data,'body_content');
		Flight::render('layout/base');

	});

	//OLD
	// Flight::route('POST /create', function(){


	// 	//Create name directory of photo profile
	// 	$url = "null";
	// 	$path = 'tmp/';
	// 	$dest = 'public/img-profiles';
	// 	$name = $_FILES['img_perfil']['name'];
	// 	$array = explode('.', $_FILES['img_perfil']['name']);
	// 	$extension = end($array);
	// 	move_uploaded_file($_FILES['img_perfil']['tmp_name'], "$path/$name");

	// 	$path = "$host$path$name";
	// 	$kraken = new Optimize();
	// 	$optimizer = $kraken->upload($path,1380,670);
	// 	if( $optimizer['status'] == true ){
	// 		$url_kraken = $optimizer['url'];
	// 		$url = $kraken->downloadImagen($url_kraken,$dest,$name);
	// 	}
	// 	$user = new User();
	// 	$create = $user->createUser($url);
	// 	echo $create['status'];

	// });




	// Create User registro
	Flight::route('POST /update', function(){


		//Create name directory of photo profile
		$url = "";
		$path = 'tmp/';
		$dest = 'public/img-profiles';
		$rand = rand(1,30).'-';
		$name = $rand.$_FILES['avatar']['name'];
		$array = explode('.', $_FILES['avatar']['name']);
		$extension = end($array);
		move_uploaded_file($_FILES['avatar']['tmp_name'], "$path/$name");

		$path = "http://www.construlitalighting.com/cla/$path$name";
		$kraken = new Optimize();
		$optimizer = $kraken->upload($path,1380,670);
		if( $optimizer['status'] == true ){
			$url_kraken = $optimizer['url'];
			$url = $kraken->downloadImagen($url_kraken,$dest,$name);
		}
		$user = new User();
		$create = $user->updateUser($path);
		#echo $url;
		#print_r($_FILES['avatar']);
		#Flight::redirect('/login');
		header('Location: ' . $_SERVER['HTTP_REFERER']);

	});

	Flight::route('POST /update-us', function(){


		//Create name directory of photo profile
		$url = "";
		$path = 'tmp/';
		$dest = 'public/img-profiles';
		$rand = rand(1,30).'-';
		$name = $rand.$_FILES['avatar']['name'];
		$array = explode('.', $_FILES['avatar']['name']);
		$extension = end($array);
		move_uploaded_file($_FILES['avatar']['tmp_name'], "$path/$name");

		$path = "http://www.construlitalighting.com/cla/$path$name";
		$kraken = new Optimize();
		$optimizer = $kraken->upload($path,1380,670);
		if( $optimizer['status'] == true ){
			$url_kraken = $optimizer['url'];
			$url = $kraken->downloadImagen($url_kraken,$dest,$name);
		}
		$user = new User();
		$create = $user->updateUserId($path);
		#echo $url;
		#print_r($_FILES['avatar']);
		#Flight::redirect('/login');
		header('Location: ' . $_SERVER['HTTP_REFERER']);

	});

	// Create User registro
	Flight::route('POST /upload-img-ajax', function(){
		
		//return;
		list($ancho, $alto, $tipo, $atributos) = getimagesize($_FILES['file']['tmp_name']);

		if ($alto >= 720 && $ancho >= 720){
			$size = $_FILES['file']['size'];
			if ($size < 11*MB){
				// var_dump($_FILES);
				// var_dump($_POST);

				$url = "null";
				$path = 'tmp/';
				$dest = 'public/projects';
				$rand = rand(1,30).'-';
				$name = $rand.$_FILES['file']['name'];

				move_uploaded_file($_FILES['file']['tmp_name'], "$path/$name");

				$pathLocal = "http://www.construlitalighting.com/cla/$path$name";
				//$url =
				$kraken = new Optimize();
				$optimizer = $kraken->upload($pathLocal,1380,600);
				
				if( $optimizer['status'] == true ){
					$url_kraken = $optimizer['url'];
					$url = $kraken->downloadImagen($url_kraken,$dest,$name);
				}

				$user = new User();
				$save = $user->addFileImagen($_POST['id_project'],$url);

				// Compare images similares
				if($file_uploaded == true)
				{
					echo json_encode(['status' => 'success']);

				} else {
					echo json_encode(['status' => 'errorsi']);
				}
			}else{
				echo json_encode(['status' => 'errorFileSize', "size" => $size ]);
			}
		}else{
			echo json_encode(['status' => 'errorFileW', "width" => $ancho, "height" => $alto ]);
		}
		

	});

	Flight::route('POST /delete-img-ajax', function(){

		$id = $_POST['id'];
		$user = new User();
		$save = $user->deleteFileImagen($id);
		echo $save;

	});

	Flight::route('/get-images', function(){

		$user = new User();
		$get = $user->getImages($_GET['id']);
		echo json_encode($get);

	});



	Flight::route('/info', function(){

		phpinfo();

	});

	// Create profile user
	Flight::route('/profile', function(){

		header('Content-Type: application/json');
		$user = new User();

		// header('Content-Type: application/json');
		// $user = new User();
		// $microtime =  microtime(true);
		// $md5 = md5($_POST['token'].$microtime);
		// while (file_exists('public/users/'.$md5)) {
		// 	$microtime =  microtime(true);
		// 	$md5 = md5($_POST['token'].$microtime);
		// }
		// mkdir('public/users/'.$md5,0777,true);
		// $path = 'public/users/'.$md5;

		// $array = explode('.', $_FILES['img_perfil']['name']);
		// $extension = end($array);

		// move_uploaded_file($_FILES['img_perfil']['tmp_name'], $path."/profile.".$extension);
		// $updateProfile = $user->updateUser($path);
		// echo json_encode($updateProfile);


	});

	Flight::route('/update-profile', function(){

		if($_POST["path"] == ""){
			$microtime =  microtime(true);
			$md5 = md5($_POST['token'].$microtime);
			while (file_exists('public/users/'.$md5)) {
				$microtime =  microtime(true);
				$md5 = md5($_POST['token'].$microtime);
			}
			mkdir('public/users/'.$md5,0777,true);
			$path = 'public/users/'.$md5;
		}else{
			$path = $_POST["path"];
		}

		if($_FILES['file']['error'] == 4 || $_FILES['file']['size'] == 0){
		}else{

			$galery = new Galery();
			$images = $galery->getFiles($path);
			if(count($images) != 0){
				unlink($path."/".$images[0]);
			}
			
			$array = explode('.', $_FILES['file']['name']);
			$extension = end($array);
			move_uploaded_file($_FILES['file']['tmp_name'], $path."/profile.".$extension);
		}
		$user = new User();
		$update = $user->updateUserEdit($path);
		Flight::redirect('account-profile');
	});
	

	Flight::route('POST /project', function(){

		header('Content-Type: application/json');
		$project = new Project();

        while (file_exists('public/users/'.$md5)) 
        {
			$microtime =  microtime(true);
			$md5 = md5($_POST['token'].$microtime);
		}
		mkdir('public/projects/'.$md5,0777,true);
		$pathP = 'public/projects/'.$md5;

		$array = explode('.', $_FILES['img_perfil']['name']);
		$extension = end($array);
		move_uploaded_file($_FILES['img_perfil']['tmp_name'], $path."/proyectos.".$extension);

		$insert = $project->createProject($pathP);
		echo json_encode($insert);
		var_dump($_POST);	

	});

	// Validate token 
	Flight::route('GET /validate', function(){


		$user = new User();
		$exist = $user->verifyToken($_GET["token"],$_GET["email"]);
		if($exist != false){
			$actionDelete = $user->deleteToken($exist["id_containment"]);
			$unlockUser = $user->unlockUser($exist["id_user"]);
			$status = "<br>Tu cuenta se ha confirmado correctamente, ahora puedes iniciar sesión para verificar el status de tus proyectos.<br><img src='assets/images/done.png' width='80'>";
		}else{
			$status = "<br>Lo sentimos, no podemos confirmar esta cuenta ya que no encontramos iformación necesaria para completar el proceso.<br><img src='assets/images/error.png' width='80'>";
		}

		$data['title'] = 'Construlita Validar Cuenta';
		$data['author'] = '';
		$data['description'] = '';
		$data['keyword'] = '';
		$data['status']= $status;
		Flight::render('validate', $data,'body_content');
		Flight::render('layout/base');

	});


	// Login
	Flight::route('/login', function(){
		if(isset($_SESSION["username"],$_SESSION["password"])){
			$user = new User();
			$login = $user->login_un($_SESSION["username"],$_SESSION["password"]);
			
		}else{
			$user = new User();
			$login = $user->login();
			
		}

	});


	// Login
	Flight::route('/logout', function(){

			// Unset all of the session variables.
			unset($_SESSION['alerta']);
			$_SESSION = array();

			// If it's desired to kill the session, also delete the session cookie.
			// Note: This will destroy the session, and not just the session data!
			if (ini_get("session.use_cookies")) 
			{
				$params = session_get_cookie_params();
				setcookie(session_name(), '', time() - 42000,
					$params["path"], $params["domain"],
					$params["secure"], $params["httponly"]
				);
			}
			// Finally, destroy the session.
			session_destroy();
			session_start();
			$status["status"] = "Success";
			$status["message"] = "Logout exitoso";
			$_SESSION["alerta"] = ["status"=>"Correcto! ","message"=>"Se ha cerrado tu sesión correctamente."];
			Flight::redirect('sesion');

	});

	// first screen on user login
	Flight::route('/details-project', function(){
		$user = new User();
		if( $user->verify() != true ){
			Flight::redirect('sesion');
		}

		if(isset($_GET['id'])){
			$project = new User();
			//Se agregao el status 1 para poder modificar aun asi 
			$projects = $project->getprojectByUser($_GET['id']);

			// if($projects!= false ){
				$cat1 = $user->getUsedCategory(1);
				$cat2 = $user->getUsedCategory(2);
				$cat3 = $user->getUsedCategory(3);
				$cat4 = $user->getUsedCategory(4);
				$cat5 = $user->getUsedCategory(5);
				$categorys = [$cat1,$cat2,$cat3,$cat4,$cat5];
				$data['title'] = 'Construlita cuenta';
				$data['author'] = '';
				$data['description'] = '';
				$data['keyword'] = '';
				$data['projects']= $projects;
				$data['category']= $categorys;
				//Flight::render('details-project', $data,'body_content');
				Flight::render('upload-project-1', $data,'body_content');
				Flight::render('layout/base-1');

			// }else{
			// 	Flight::redirect('account-profile');
			// }

		}else{
			Flight::redirect('account-profile');
		}

	});


	Flight::route('/recovery', function(){
		

		if( isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){
			$user = new User();
			$exist = $user->checkUser();
			if($exist['Total'] == 1){
				$status = $user->recovery();
				if($status){
					$_SESSION['alerta'] = ["type"=>"success","status"=>"","message"=>"Por favor, revisa tu bandeja de correo electrónico, ya que hemos enviado un enlace para poder cambiar tu contraseña."];
					Flight::redirect('sesion');
				
				}else{
					$_SESSION['alerta'] = ["type"=>"danger
					","status"=>"error","message"=>"En estos momentos no podemos procesar tu solicitud, intenta mas tarde."];
					Flight::redirect('sesion');
				
				}
				Flight::render('layout/base');
				
			}else{
				$_SESSION['alerta'] = ["status"=>"error","message"=>"Este correo electrónico no esta registrado."];
				Flight::redirect('sesion');
			}
		}else{
			$_SESSION['alerta'] = ["status"=>"error","message"=>"Proporciona un correo electrónico válido."];
			Flight::redirect('sesion');
		}
		
	});


	Flight::route('/save-password', function(){

		$user = new User();
		$chekin = $user->verifyTokenPassword($_GET['token'],$_GET['email']);
	

		$data['title'] = 'Construlita Validar autorización';
		$data['author'] = '';
		$data['description'] = '';
		$data['keyword'] = '';
		$data['auth'] = $chekin;

		Flight::render('site2019/recovery', $data,'body_content');
		Flight::render('layout/base');

	});


	Flight::route('POST /save-new-password', function(){

		if(isset($_POST['pass1'],$_POST['pass2'],$_POST['id'],$_POST['email'])){
			$pass1 = trim($_POST['pass1']);
			$pass2 = trim($_POST['pass2']);
			if($pass1 == $pass2){
					$user  = new User();
					$change = $user->updateUserPassword($_POST['email'],$pass1);
					if($change){
						$deleteToken = $user->deleteTokenPassword($_POST['token']);
						$_SESSION['alerta'] = ["status"=>"Correcto !","message"=>"Tu contraseña se ha cambiado exitosamente, ahora puedes iniciar sesión."];
						Flight::redirect('sesion');
					}else{
						$_SESSION['alerta'] = ["status"=>"Error !","message"=>"Ocurrio un problema mientras procesabamos tu solicitud, intenta nuevamente."];
						Flight::redirect('sesion');		
					}
			}else{
				echo "Proporciona contraseñas iguales.";
			}
		}else{
			echo "Completa todos los campos requeridos.";
		}

	});

	Flight::route('/details-project-confirmed', function(){
		$user = new User();
		if( $user->verify() != true ){
			Flight::redirect('sesion');
		}

		if(isset($_GET['id'])){
			$project = new Project();
			$projects = $project->getProjectByUsConf($_GET['id']);

			if($projects!= false ){

				$data['title'] = 'Construlita cuenta';
				$data['author'] = '';
				$data['description'] = '';
				$data['keyword'] = '';
				$data['projects']= $projects;
				Flight::render('details-project-confirmed', $data,'body_content');
				Flight::render('layout/base');

			}else{
				Flight::redirect('account-profile');
			}

		}else{
			Flight::redirect('account-profile');
		}


	});



	// first screen on user login
	/*Flight::route('/account-profile', function(){
		$user = new User();
		if( $user->verify() != true ){
			Flight::redirect('sesion');
		}
		$project = new Project();
		$projects = $project->getProjects($_SESSION["token_session"]);
		$data['title'] = 'Construlita Datos del participante';
		$data['author'] = '';
		$data['description'] = '';
		$data['keyword'] = '';
		$data['projects']= $projects;
		Flight::render('panel-profile', $data,'body_content');
		Flight::render('layout/base');


	});*/

	// you can upload a project step-1
	// Flight::route('/upload-project-1', function(){

	// 	$user = new User();
	// 	if( $user->verify() != true ){
	// 		Flight::redirect('sesion');
	// 	}
	// 	$project = new Project();
	// 	$user = new User();
	// 	$projects = $project->getProjects($_SESSION["token_session"]);
	// 	$cat1 = $user->getUsedCategory(1);
	// 	$cat2 = $user->getUsedCategory(2);
	// 	$cat3 = $user->getUsedCategory(3);
	// 	$cat4 = $user->getUsedCategory(4);
	// 	$cat5 = $user->getUsedCategory(5);
	// 	$categorys = [$cat1,$cat2,$cat3,$cat4,$cat5];
		
	// 	$data['title'] = 'Construlita Nuevo proyecto';
	// 	$data['author'] = '';
	// 	$data['description'] = '';
	// 	$data['keyword'] = '';
	// 	$data['projects']= $projects;
	// 	$data['category']= $categorys;
	// 	Flight::render('upload-project', $data,'body_content');
	// 	Flight::render('layout/base');


	// });

	// // for testunit @TODO delete
	 Flight::route('/upload-project', function(){

	 	$user = new User();
	 	if( $user->verify() != true ){
	 		Flight::redirect('sesion');
	 	}
	 	$project = new Project();
	 	$user = new User();
	 	$projects = $project->getProjects(10);
	 	$cat1 = $user->getUsedCategory(1);
	 	$cat2 = $user->getUsedCategory(2);
	 	$cat3 = $user->getUsedCategory(3);
	 	$cat4 = $user->getUsedCategory(4);
	 	$cat5 = $user->getUsedCategory(5);
	 	$categorys = [$cat1,$cat2,$cat3,$cat4,$cat5];
	 	$data['title'] = 'Construlita Datos del proyecto';
	 	$data['author'] = '';
	 	$data['description'] = '';
	 	$data['keyword'] = '';
	 	$data['category']= $categorys;
	 	Flight::render('upload-project-1', $data,'body_content');
	 	Flight::render('layout/base-1');


	 });

	Flight::route('POST /delete-pdf', function(){

		$user = new User();
		if( $user->verify() != true ){
			Flight::redirect('sesion');
		}
		
		header('Content-Type: application/json');
		$path = 'public/pdf';
		$instance = new User();
		$project = $instance->getPdf($_POST['id']);

		if( $project['pdf'] != "" ){
			$fileOld = $path.'/'.$project['pdf'];
			if ( file_exists($fileOld) ) {
			    unlink($fileOld);
			    $instance->updatePdf('',$_POST['id']);
			}
		}

		

		echo json_encode(  $project['pdf'] );

	});

	Flight::route('POST /upload-pdf', function(){

		$user = new User();
		if( $user->verify() != true ){
			Flight::redirect('sesion');
		}

		header('Content-Type: application/json');
		$path = 'public/pdf';
		$name = $_FILES['ispdf']['name'];
		$random = rand(5, 15).'-';
		$newName = $random.$name;
		$instance = new User();
		$project = $instance->getPdf($_POST['id']);
		$size = $_FILES['ispdf']['size'];

		if ($size > 4*MB){
			echo json_encode(['status' => 'errorFileSize', "size" => $size]);
			return;
		}

		if( $project['pdf'] != "" ){
			$fileOld = $path.'/'.$project['pdf'];
			if ( file_exists($fileOld) ) {
			    unlink($fileOld);
			}
		}
		move_uploaded_file($_FILES['ispdf']['tmp_name'], "$path/$newName");
		$instance->updatePdf($newName,$_POST['id']);

		echo json_encode( $newName );

	});

	Flight::route('POST /save-project-o', function(){

		$user = new User();
		if( $user->verify() != true ){
			Flight::redirect('sesion');
		}

		$user = new User();
		// Steps One
		$action = $_POST['step'];
		$id = $_POST['id_project'];
		$proyectoRealizado = $_POST['category'];
		$name = $_POST['name'];
		// Step Two
		$descripcion = $_POST['descripcion'];
		$uso = $_POST['uso'];
		$direccion = $_POST['direccion'];
		$tipo = $_POST['tipo'];
		$end = $_POST['final'];
		$arquitecto = $_POST['arquitecto'];
		$fotografo = $_POST['fotografo'];
		// Step Three
		$disenador = $_POST['disenador'];
		$colaboradores = $_POST['colaborador'];
		$alcance = $_POST['alcance'];
		$mantenimiento = $_POST['mantenimiento'];
		$analisis = $_POST['analisis'];
		//$pdf = $_FILE['pdf'];
		$iluminacion = $_POST['iluminacion'];
		// Step Four
		$video = $_POST['video'];

		switch ($action) {
			case 'one':
				if($id == ""){
					echo $user->stepOne($proyectoRealizado,$name);
				}else{
					echo $user->stepOneUpdate($id,$proyectoRealizado,$name);
				}
				break;
			case 'two':
				echo $user->stepTwo($id,$name,$descripcion,$uso,$direccion,$tipo,$end,$arquitecto,$fotografo);
				break;
			case 'three':
				echo $user->stepThree($id,$disenador,$colaboradores,$alcance,$mantenimiento,$analisis,$iluminacion);
				break;
			case 'four':
				echo $user->stepFour($id,$video);
				header("Location: ".$host."upload-project-confirm");
				
				break;
			
			default:
				break;
		}


	});

	Flight::route('POST /save-project', function(){
		
		$user = new User();
		if( $user->verify() != true ){
			Flight::redirect('sesion');
		}

		$user = new User();
		// Steps One
		$action = $_POST['step'];
		$id = $_POST['id_project'];
		$proyectoRealizado = $_POST['category'];
		$name = $_POST['name'];
		// Step Two
		
		$pais = $_POST['pais'];
		$ciudad = $_POST['ciudad'];
		$end= $_POST['final'];
		$disil= $_POST['disil'];
		$colaboradores= $_POST['colaboradores'];
		$arquitecto = $_POST['arquitecto'];
		$descripcion = $_POST['descripcion'];

		// Step Three
		$fotografo = $_POST['fotografo'];
		$video = $_POST['video'];
		$cred_video = $_POST['cred_video'];

		//$pdf = $_FILE['pdf'];

		switch ($action) {
			case 'one':
				if($id == ""){
					echo $user->stepOne($proyectoRealizado,$name);
				}else{
					echo $user->stepOneUpdate($id,$proyectoRealizado,$name);
				}
				break;
			case 'two':
				
				echo $user->stepTwo($id, $name, $pais, $ciudad, $end, $disil, $colaboradores, $arquitecto, $descripcion);
				break;
			case 'three':
				echo $user->stepThree($id,$fotografo,$video,$cred_video);
				//header("Location: ".$host."proyecto");
				break;
			case 'four':
				//echo $user->stepFour($id,$video);
				//header("Location: ".$host."proyecto");
				
				break;
			
			default:
				break;
		}


	});

	// confirm a project step-1.2 
	Flight::route('/upload', function(){

		/*$imagenes = $_POST['base64[]'];
		foreach($imagenes as $key=>$imagen){
			//$filename = $key."ok";
			//$directory = "test";
			mkdir('public/test/'.$key,0777,true);
			//$this->uploadBase64($imagen, $filename, $directory);
		}/*

	/*function uploadBase64($input, $filename, $directory){
	    list($type, $input) = explode(';', $input);
	    list(, $input) = explode(',', $input);
	    $data = base64_decode($input);
	    $typeFile = explode(':', $type);
	    $extension = explode('/', $typeFile[1]);
	    $ext = $extension[1];
	    $fullPath = 'public/test/'.$filename.'.'.$ext;
	    // Guardas $data, que es el archivo convertido
  	}*/


	
		header('Content-Type: application/json');
		$microtime =  microtime(true);
		$md5 = md5($microtime);

        while (file_exists('public/projects/'.$md5)) 
        {
			$microtime =  microtime(true);
			$md5 = md5($microtime);
		}
		$pathP = 'public/projects/'.$md5;
		$user = new User();
		$insert = $user->insertProjectUser($pathP);

		if($insert !=  false){
			mkdir('public/projects/'.$md5,0777,true);
			if($_FILES){
				
				for($x=0; $x < count($_FILES["photo"]["name"]); $x++){

					$completo = explode('.', $_FILES["photo"]["name"][$x]);
					$extension = end($completo);

					if(move_uploaded_file($_FILES["photo"]["tmp_name"][$x], $pathP."/".$_FILES["photo"]["name"][$x]) ){


					}else{
						echo json_encode(["status"=>"error","message"=>"Ocurrio un error mientras procesabamos tus imagenes, intenta mas tarde."]);
					}
				}
				echo json_encode(["status"=>"success","message"=>"Tu nuevo proyecto ha sido completado con éxito.","last"=>$insert]);
			}else{
				echo json_encode(["status"=>"error","message"=>"La información de tu proyecto ha sido guardada con éxito, pero tus imagenes aún no han sido completadas."]);
			}
		}else{
			echo json_encode(["status"=>"error","message"=>"Lo sentimos en este momento no podemos procesar tu solicitud."]);
		}


	});

	// confirm a project step-1.2 
	Flight::route('/upload-complete', function(){
	
		
		$user = new User();
		$pathP = 'public/projects/'.$_POST['dir'];
        if(!file_exists('public/projects/'.$_POST['dir'])) 
        {
			mkdir('public/projects/'.$_POST['dir'],0777,true);
		}
		$insert = $user->insertProjectUser($pathP);
		if($insert != false){
			Flight::json(["status"=>"success","message"=>"Tu nuevo proyecto ha sido completado con éxito.","path"=>$pathP]);
		}else{
			Flight::json(["status"=>"error","message"=>"Lo sentimos en este momento no podemos procesar tu solicitud."]);
		}

	});


	// confirm a project step-1.2 
	Flight::route('/cls', function(){

		function uploadBase64($input,$filename,$dir){

		    list($type, $input) = explode(';', $input);
		    list(, $input) = explode(',', $input);
		    $data = base64_decode($input);
		    $typeFile = explode(':', $type);
		    $extension = explode('/', $typeFile[1]);
		    $ext = $extension[1];
		    $fullPath = 'public/projects/'.$dir.'/'.$filename;
		    file_put_contents($fullPath , $data);
		    // Guardas $data, que es el archivo convertido
  		}
  		$md5 = $_POST['dir'];
        if(!file_exists('public/projects/'.$md5)) 
        {
			mkdir('public/projects/'.$md5,0777,true);
		}
		
  		$imagen = uploadBase64($_POST['imagen'],$_POST['name'],$md5);
  		$array = ["status"=>"success","dir"=>$md5];
  		Flight::json($array);
		//echo "Proceso completo";

	});


	Flight::route('/clsf', function(){

		var_dump($_FILES);

		// function uploadBase64($input,$filename,$dir){

		//     list($type, $input) = explode(';', $input);
		//     list(, $input) = explode(',', $input);
		//     $data = base64_decode($input);
		//     $typeFile = explode(':', $type);
		//     $extension = explode('/', $typeFile[1]);
		//     $ext = $extension[1];
		//     $fullPath = 'public/projects/'.$dir.'/'.$filename;
		//     file_put_contents($fullPath , $data);
		//     // Guardas $data, que es el archivo convertido
  // 		}
  // 		$md5 = $_POST['dir'];
  //       if(!file_exists('public/projects/'.$md5)) 
  //       {
		// 	mkdir('public/projects/'.$md5,0777,true);
		// }
		
  // 		$imagen = uploadBase64($_POST['imagen'],$_POST['name'],$md5);
  // 		$array = ["status"=>"success","dir"=>$md5];
  // 		Flight::json($array);
	

	});


	// confirm a project step-1.2 
	Flight::route('/upload-img', function(){

		//upload img
		if($_FILES['temporal']){
			
			for($x=0; $x < count($_FILES["photo"]["name"]); $x++){

				$completo = explode('.', $_FILES["photo"]["name"][$x]);
				$extension = end($completo);

				if(move_uploaded_file($_FILES["photo"]["tmp_name"][$x], $pathP."/".$_FILES["photo"]["name"][$x]) ){


				}else{
					echo json_encode(["status"=>"error","message"=>"Ocurrio un error mientras procesabamos tus imagenes, intenta mas tarde."]);
				}
			}
		}


	});

	Flight::route('/upload-update', function(){


		header('Content-Type: application/json');
		$user = new User();
		$insert = $user->updateProjectUser();
		

			if($_FILES){
				
				for($x=0; $x < count($_FILES["photo"]["name"]); $x++){

					$completo = explode('.', $_FILES["photo"]["name"][$x]);
					$extension = end($completo);

					if(move_uploaded_file($_FILES["photo"]["tmp_name"][$x], $_GET['path']."/".$_FILES["photo"]["name"][$x]) ){


					}else{
						echo json_encode(["status"=>"error","message"=>"Ocurrio un error mientras procesabamos tus imagenes, intenta mas tarde."]);
					}
				}
				echo json_encode(["status"=>"success","message"=>"Tu nuevo proyecto ha sido completado con éxito.","last"=>$insert]);
			}else{
				echo json_encode(["status"=>"success","message"=>"Tu nuevo proyecto ha sido completado con éxito.","last"=>"1"]);
			}
		/*if($insert != false){
			Flight::redirect('upload-project-confirm?last='.$insert);
		}else{
			Flight::redirect('account-profile');
		}*/

			

	});


	Flight::route('/del-img', function(){

			$ruta  = $_POST["id"];
			if(unlink($ruta)){
				echo true;
			}
			else{
				echo false;
			}		

	});




	// you cn edit project or confirm edit
	Flight::route('/finalize', function(){

		$user = new User();
		$insert = $user->updateStatusProject($_GET["id"]);

		Flight::redirect('upload-project-confirm');

	});


	// you cn edit project or confirm edit
	Flight::route('/delete', function(){

		$user = new User();
		$insert = $user->deleteProject($_GET["id"]);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		//Flight::redirect('upload-project-confirm');

	});

	Flight::route('/upload-project-confirm', function(){

		$user = new User();
		if( $user->verify() != true ){
			Flight::redirect('sesion');
		}

		$project = new User();
		$projects = $user->getprojectUnconfirmed();

		$data['title'] = 'Construlita Confirmar proyecto';
		$data['author'] = '';
		$data['description'] = '';
		$data['keyword'] = '';
		$data['projects']= $projects;
		Flight::render('upload-project-confirm', $data,'body_content');
		Flight::render('layout/base');
	});

	// Registro
	Flight::route('/registro', function(){		
	// 		//Flight::redirect('sesion');
	 	$data['title'] = 'Construlita registro';
	 	$data['author'] = '';
	 	$data['description'] = '';
	 	$data['keyword'] = '';
	 	$data['collections']= isset($categories) ? $categories : "";
		$data['instance']= isset($instance) ? $instance : "";
	 	Flight::render('registro2', $data,'body_content');
	 	Flight::render('layout/base');
	});

	Flight::route('/registro2', function(){

		
			//Flight::redirect('sesion');
		

		$data['title'] = 'Construlita registro';
		$data['author'] = '';
		$data['description'] = '';
		$data['keyword'] = '';
		$data['collections']= $categories;
		$data['instance']= $instance;
		Flight::render('registro2', $data,'body_content');
		Flight::render('layout/base');

	});

	Flight::route('/rotate-profile', function(){

		if( isset($_POST['orientation'],$_POST['name']) ){
			$orientation = $_POST['orientation'];
			$filename = $_POST['name'];
			$rotateFilename = "public/img-profiles/$filename";
			$orientationLeft = 90;
			$orientationRight = -90;
			$degrees = $orientation == "left"?$orientationLeft:$orientationRight;


			$fileType = strtolower(substr($filename, strrpos($filename, '.') + 1));

			echo $fileType;
			if($fileType == 'png' || $fileType == 'PNG'){
			   header('Content-type: image/png');
			   $source = imagecreatefrompng($rotateFilename);
			   $bgColor = imagecolorallocatealpha($source, 255, 255, 255, 127);
			   // Rotate
			   $rotate = imagerotate($source, $degrees, $bgColor);
			   imagesavealpha($rotate, true);
			   imagepng($rotate,$rotateFilename);

			}

			if($fileType == 'jpg' || $fileType == 'jpeg'){
			   header('Content-type: image/jpeg');
			   $source = imagecreatefromjpeg($rotateFilename);
			   // Rotate
			   $rotate = imagerotate($source, $degrees, 0);
			   imagejpeg($rotate,$rotateFilename);
			}

			imagedestroy($source);
			imagedestroy($rotate);

			echo "sucess";
		}else{
			echo "failed";
		}


	});

	// Create User registro
	Flight::route('POST /upload-profile-ajax', function(){

		// var_dump($_FILES);
		// var_dump($_POST);

		$url = "null";
		$path = 'tmp/';
		$dest = 'public/img-profiles';
		$rand = rand(1,9).'-';
		$name = $rand.$_FILES['file']['name'];

		move_uploaded_file($_FILES['file']['tmp_name'], "$path/$name");

		$pathLocal = "$host$path$name";
		$kraken = new Optimize();
		$optimizer = $kraken->upload($pathLocal,1380,600);
		if( $optimizer['status'] == true ){
			$url_kraken = $optimizer['url'];
			$url = $kraken->downloadImagen($url_kraken,$dest,$name);
		}

		// $user = new User();
		// $save = $user->addFileImagen($_POST['id_project'],$url);

		// Compare images similares
		if($url != "")
		{
			echo json_encode(['status' => 'success', 'name' => $name ]);

		} else {
			echo json_encode(['status' => 'error']);
		}
		

	});

	Flight::route('POST /get-email', function(){
	    	$user = new User();
			$exist = $user->checkUser();

			echo json_encode($exist);
	});


	// CATEGORIAS REALIZADAS
		Flight::route('/categorias-realizados', function(){

			$data['title'] = "Construlita Categorias realizadas";
			$data['author'] = '';
			$data['description'] = '';
			$data['keyword'] = '';
			$data['collections']= isset($categories) ? $categories : "";
			$data['instance']= isset($instance) ? $instance : "";
			Flight::render('categorias-realizados.php', $data,'body_content');
			Flight::render('layout/base');

		});

	// CATEGORIAS CONCEPTOS
		Flight::route('/categorias-concepto', function(){

			$data['title'] = "Construlita Categorias concepto";
			$data['author'] = '';
			$data['description'] = '';
			$data['keyword'] = '';
			$data['collections']= isset($categories) ? $categories : "";
			$data['instance']= isset($instance) ? $instance : "";
			Flight::render('categorias-concepto.php', $data,'body_content');
			Flight::render('layout/base');

		});

	// CATEGORIAS REALIZADOS
		Flight::route('POST /get-categorias', function(){

			header('Content-Type: application/json');
			$galery = new Galery();
			$images = $galery->getFiles($_POST['link']);
			echo json_encode($images);
			

		});



	// RECONOCIMIENTOS
		Flight::route('/reconocimientos', function(){

			$data['title'] = "Construlita Reconocimientos";
			$data['author'] = '';
			$data['description'] = '';
			$data['keyword'] = '';
			$data['collections']= isset($categories) ? $categories : "";
			$data['instance']= isset($instance) ? $instance : "";
			Flight::render('reconocimientos.php', $data,'body_content');
			Flight::render('layout/base');
			

		});

		Flight::route('/faqs', function(){

			$data['title'] = "Construlita FAQ'S";
			$data['author'] = '';
			$data['description'] = '';
			$data['keyword'] = '';
			$data['collections']= isset($categories) ? $categories : "";
			$data['instance']= isset($instance) ? $instance : "";
			Flight::render('faqs', $data,'body_content');
			Flight::render('layout/base');

		});


	// Terminos y condiciones
		Flight::route('/terminos-y-condiciones', function(){

			$data['title'] = 'Construlita Términos y condiciones';
			$data['author'] = '';
			$data['description'] = '';
			$data['keyword'] = '';
			$data['collections']= isset($categories) ? $categories : "";
			$data['instance']= isset($instance) ? $instance : "";
			Flight::render('terminosycondiciones', $data,'body_content');
			Flight::render('layout/base');

		});

	// Aviso de privacidad
		Flight::route('/aviso-de-privacidad', function(){

			$data['title'] = 'Construlita Aviso de privacidad';
			$data['author'] = '';
			$data['description'] = '';
			$data['keyword'] = '';
			$data['collections']= isset($categories) ? $categories : "";
			$data['instance']= isset($instance) ? $instance : "";
			Flight::render('aviso-de-privacidad', $data,'body_content');
			Flight::render('layout/base');

		});


	Flight::start();