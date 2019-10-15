<?php
/**
 * Class actions about allbums
 *
 * @Author: ricardo_date@hotmail.com
 * License MIT
 * Copyright version 1.0
 * 23 Septiembre 2016
 *
 */
require_once "Database.php";
class User extends Database
{
	
	/**
	 * construct null
	 *
	 */
	
	public function __construct(){}
	
	/**
	 * clone
	 *
	 */	
	
	public function __clone() {}

	public function finishRegister($token){
		$us = new User();
		$user = $us->getInfoUSer($token);
		//print_r($user);

		if($user['rol'] == 0 && $user['name'] != NULL &&
		$user['lastname'] != NULL &&
		$user['email'] != NULL &&
		$user['phone'] != NULL &&
		$user['path_image'] != NULL &&
		$user['country'] != NULL &&
		$user['municipio'] != NULL &&
		$user['estado'] != NULL &&
		$user['profession'] != NULL &&
		$user['labor_situation'] != NULL
		/*$user['business'] != NULL*/) return true;

		return false;
	}
	public function verify(){
		$us = new User();
		if(isset($_SESSION['login'])){
			if($_SESSION['login'] == 'active'){
				return true;
				/*if(isset($_SESSION['active']) && $_SESSION['active'] == 1){
					return true;
					
				}else{
					$_SESSION['alerta'] = ["status"=>"Te registraste exitosamente.","message"=>" A continuación recibirás un correo electrónico de confirmación."];
					return false;
				}*/
			}else{
				$_SESSION['alerta'] = ["status"=>"","message"=>"Por favor inicia sesión."];
				return false;
			}
		}else{
			$_SESSION['alerta'] = ["status"=>"","message"=>"Por favor inicia sesión."];
			return false;
		}
		
	}

	/*
	 *
	 * Insert project by user
	 *
	 */		

	public function insertProjectUser($path)
	{
		if(isset($_POST['prorealizados'],$_POST['nomproyecto'],$_POST['usoinmueble'],$_POST['tipobra'],$_POST['finalobra'],$_POST['disenadorilumi'],$_POST['dirproyecto'],$_POST['colaboradores'],$_POST['proyectoarq'],$_POST['fotografo']) && $_POST['prorealizados'] != "" && $_POST['nomproyecto'] !="" && $_POST['usoinmueble']!="" && $_POST['tipobra']!="" && $_POST['finalobra']!="" && $_POST['disenadorilumi']!="" && $_POST['dirproyecto']!="" && $_POST['colaboradores']!="" && $_POST['proyectoarq']!="" && $_POST['fotografo']!=""){
			return $this->newProject($path,$_POST['prorealizados'],$_POST['nomproyecto'],$_POST['usoinmueble'],$_POST['tipobra'],$_POST['finalobra'],$_POST['disenadorilumi'],$_POST['dirproyecto'],$_POST['colaboradores'],$_POST['proyectoarq'],$_POST['fotografo'],$_POST['descripcion'],$_POST['video']);
		}else{
			return false;
		}
	}


	public function updateProjectUser()
	{
		if(isset($_POST['prorealizados'],$_POST['nomproyecto'],$_POST['usoinmueble'],$_POST['tipobra'],$_POST['finalobra'],$_POST['disenadorilumi'],$_POST['dirproyecto'],$_POST['colaboradores'],$_POST['proyectoarq'],$_POST['fotografo']) && $_POST['prorealizados'] != "" && $_POST['nomproyecto'] !="" && $_POST['usoinmueble']!="" && $_POST['tipobra']!="" && $_POST['finalobra']!="" && $_POST['disenadorilumi']!="" && $_POST['dirproyecto']!="" && $_POST['colaboradores']!="" && $_POST['proyectoarq']!="" && $_POST['fotografo']!=""){
				
				return $this->updateProject($_GET["last"],$_POST['prorealizados'],$_POST['nomproyecto'],$_POST['usoinmueble'],$_POST['tipobra'],$_POST['finalobra'],$_POST['disenadorilumi'],$_POST['dirproyecto'],$_POST['colaboradores'],$_POST['proyectoarq'],$_POST['fotografo'],$_POST['descripcion'],$_POST['video']);

		}else{
			return false;
		}
	}

	/*
	 *
	 * Login user
	 * @param $_POST["username"]
	 * @param $_POST["password"]
	 *
	 */		

	public function login()
	{
		if(isset($_POST['username']) && $_POST['username'] != "" ){
			if( filter_var($_POST['username'], FILTER_VALIDATE_EMAIL) == true){

				if(isset($_POST['password']) && $_POST['password'] != "" ){	
					if(strlen($_POST['password'])>7 ){


						$username = strtolower(trim($_POST['username']));
						$password = trim($_POST['password']);
						
						$user = $this->authUser($username,$password);
						if(!$user){
							$_SESSION['alerta'] = ['status'=>'Error! ','message'=>'Este correo no esta registrado.'];
							header('Location: sesion');	
						}else{
							if(password_verify($password, $user["password"])){
								
								
								$_SESSION['login'] = 'active';
								$_SESSION['name'] = $user['name'];
								$_SESSION['lastname'] = $user['lastname'];
								$_SESSION['email'] = $user['email'];
								$_SESSION['active'] = $user['active'];
								$_SESSION['profile'] = $user['path_image'];
								$_SESSION['token_session'] = $user['token_session'];
								$_SESSION['id_user'] = $user['id_user'];
								$_SESSION['rol'] = $user['rol'];


								if($user['rol'] == 1){
									header('Location: list-users');
								}elseif($user['rol'] == 2){
									header('Location: proyectos-sin-calificar');
									
								}elseif($user['rol'] == 3){
									header('Location: dashboard');
									
								}else{
									echo "participante no redir ".$user['rol'];
									header("Location: participante");exit();
									
									#header('Location: upload-project-confirm');
								}

							}else{
								$_SESSION['alerta'] = ["status"=>"Error! ","message"=>"Contraseña incorrecta intenta nuevamente."];
								header('Location: sesion/');
							}
						}
						
					}else{
						$_SESSION['alerta'] =  ["status"=>"Error! ","message"=>"Contraseña mínimo de 8 caracteres."];
						header('Location: sesion');
					}

				}else{
					$_SESSION['alerta'] =  ["status"=>"Error! ","message"=>"Ingresa una contraseña válida"];
					header('Location: sesion');
				}

			}else{
				$_SESSION['alerta'] =  ["status"=>"Error! ","message"=>"Ingresa un correo válido."];
				header('Location: sesion');
			}

		}else{
			$_SESSION['alerta'] =  ["status"=>"Error! ","message"=>"Ingresa un usuario válido"];
			header('Location: sesion');
		}
	}
	


	public function login_un($usr,$pass)
	{
		if(isset($usr) && $usr != "" ){
			if( filter_var($usr, FILTER_VALIDATE_EMAIL) == true){

				if(isset($pass) && $pass != "" ){	
					if(strlen($pass)>7 ){


					

					$username = strtolower(trim($usr));
					$password = trim($pass);
						
						$user = $this->authUser($username,$password);
						if(!$user){
							$_SESSION['alerta'] = ['status'=>'Error! ','message'=>'Este correo no esta registrado.'];
							header('Location: sesion');	
						}else{
							if(password_verify($password, $user["password"])){
								//echo "on verify".$user['rol'];
								$_SESSION['login'] = 'active';
								$_SESSION['name'] = $user['name'];
								$_SESSION['lastname'] = $user['lastname'];
								$_SESSION['email'] = $user['email'];
								$_SESSION['active'] = $user['active'];
								$_SESSION['profile'] = $user['path_image'];
								$_SESSION['token_session'] = $user['token_session'];
								$_SESSION['id_user'] = $user['id_user'];
								$_SESSION['rol'] = $user['rol'];

								if($user['rol'] == 1){
									header('Location: list-users');
								}elseif($user['rol'] == 2){
									header('Location: proyectos-sin-calificar');
									
								}elseif($user['rol'] == 3){
									header('Location: dashboard');
									
								}else{
									header('Location: participante');
									#header('Location: upload-project-confirm');
								}

							}else{
								$_SESSION['alerta'] = ["status"=>"Error! ","message"=>"Contraseña incorrecta intenta nuevamente."];
								header('Location: sesion');
							}
						}
						
					}else{
						$_SESSION['alerta'] =  ["status"=>"Error! ","message"=>"Contraseña mínimo de 8 caracteres."];
						header('Location: sesion');
					}

				}else{
					$_SESSION['alerta'] =  ["status"=>"Error! ","message"=>"Ingresa una contraseña válida"];
					header('Location: sesion');
				}

			}else{
				$_SESSION['alerta'] =  ["status"=>"Error! ","message"=>"Ingresa un correo válido."];
				header('Location: sesion');
			}

		}else{
			$_SESSION['alerta'] =  ["status"=>"Error! ","message"=>"Ingresa un usuario válido"];
			header('Location: sesion');
		}
	}


	public function recovery(){

		$token = $this->generateTokenPassword($_POST['email']);

		$texto = "Solicitaste cambiar tu contraseña, para ello deberás dar clic en el botón, si no fuiste tu ignora este correo.";
		$emailContents = $this->getEmailContents(
							array(
								'title'     => 'Recuperar contraseña',
								'body'      => $texto, 
								'titleButon'=> "Cambiar contraseña",
								'url'       => $token));
		$to      = trim($_POST['email']);
		$subject = "Cambio de contraseña Construlita Lighting Awards 2019";
		$message = $emailContents;
		$headers =  'From: Construlita Lighting Awards <organizadores@awards.construlitalighting.com>';
		$headers .= '' . " \n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";							

		if ( mail($to, $subject,$message, $headers) ){

			return true;

		}else{
			return false;
		}

	}
	/*
	 *
	 * Create New User
	 * @return array or false
	 *
	 */
	 
	public function createUser($path)
	{
		if( filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == true){
			
			if(isset($_POST['name']) && $_POST['name'] != ""){
				
				if(isset($_POST['lastname']) && $_POST['lastname'] != ""){
					
					if(isset($_POST['password']) && isset($_POST['password2'])){
					
						
						if(strlen($_POST['password']) > 7 && strlen($_POST['password2'])>7){
							#print_r($_POST);
							if($_POST['password'] == $_POST['password2'] ){
								#print_r($_POST);
								$duplicate = $this->checkUser();

								if($duplicate['Total'] == 0){

									$id = $this->insertUser($path);
									if($id != null && $id != "null" && id!= ""){
										$url = $this->waitVerification($id["lastId"],$_POST['password'],$_POST['email']);
										

										$_SESSION["username"]= strtolower(trim($_POST['email']));;
										$_SESSION["password"]= trim($_POST['password']);
										$texto = "Te registraste exitosamente. Por favor, inicia sesión para continuar con tu proceso.";
										$emailContents = $this->getEmailContents(
															array(
																'title'     => 'Confirmar cuenta',
																'body'      => $texto, 
																'titleButon'=> "Confirmar",
																'url'       => $url));
										$to      = $_POST['email'];
										$subject = "Confirmación de cuenta Construlita Lighting Awards 2019";
										$message = $emailContents;
										
										$headers =  'From: Construlita Lighting Awards <organizadores@awards.construlitalighting.com>';
										$headers .= '' . " \n";
										$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";							

										mail($to, $subject,$message, $headers);	
										
										//$token = password_hash($_POST["email"], PASSWORD_DEFAULT);
										return['status'=>true,'token'=>$id["token"],'last'=>$id["lastId"],'message'=>' Por favor, verifica tu cuenta de correo electrónico en este momento o al finalizar de completar tu registro.'];
									}else{
										return['status'=>'error','type'=>'temporally','message'=>'Lo sentimos en este momento no podemos procesar tu solicitud.'];
									}
									

								}else{
									return['status'=>'error','type'=>'temporally','message'=>'Este correo ya esta registrado, intenta iniciando sesión o recupera tu contraseña.'];
								}


							}else{
								return['status'=>'error','type'=>'password','message'=>'Las contraseñas deben ser idénticas.'];

							}
						}else{
							return['status'=>'error','type'=>'password','message'=>'Longitud mínima de contraseña 8 carácteres.'];
						}
					}else{
						return['status'=>'error','type'=>'password','message'=>'Proporciona una contraseña.'];

					}
				}else{
					return['status'=>'error','type'=>'lastname','message'=>'Indica un apellido válido.'];
				}
			}else{
				return ['status'=>'error','type'=>'name','message'=>'Indica un nombre válido.'];
			}
		}else{
			return ['status'=>'error','type'=>'email','message'=>'El correo proporcionado es inválido.'];
		}
	}


	/*
	 *
	 * Create a new project 
	 *
	 */
	 
	public function newProject($path,$category,$name_project,$inmueble,$type,$final_date,$designer,$direction,$members,$projects_by,$photo,$desc_project,$video)
	{
		try
		{
				$query = 'INSERT INTO project
							(token_session,time_save,category,name_project,inmueble,type_work,final_date,designer,direction,members,project_by,photographer,desc_project,path_project,url_video) 
							VALUES(:token_session,:time_save,:category,:name_project,:inmueble,:type_work,:final_date,:designer,:direction,:members,:project_by,:photographer,:desc_project,:path_project,:url_video)';
				$conn = parent::admin();
				$stmt = $conn->prepare($query);

				$now = date('Y-m-d H:i:s');

				$cat = trim($category);
				$nam = trim($name_project);
				$inm = trim($inmueble);
				$typ = trim($type);
				$fin = trim($final_date);
				$des = trim($designer);
				$dir = trim($direction);
				$mem = trim($members);
				$pro = trim($projects_by);
				$pho = trim($photo);
				$dsc = trim($desc_project);

				session_start();
				$stmt->bindParam(':token_session', $_SESSION["token_session"],PDO::PARAM_STR);
				$stmt->bindParam(':time_save',$now,PDO::PARAM_STR);
				$stmt->bindParam(':category', $cat ,PDO::PARAM_INT);
				$stmt->bindParam(':name_project',$nam ,PDO::PARAM_STR);
				$stmt->bindParam(':inmueble',$inm ,PDO::PARAM_STR);
				$stmt->bindParam(':type_work',$typ ,PDO::PARAM_STR);	
				$stmt->bindParam(':final_date',$fin ,PDO::PARAM_STR);
				$stmt->bindParam(':designer',$des ,PDO::PARAM_STR);
				$stmt->bindParam(':direction', $dir ,PDO::PARAM_STR);
				$stmt->bindParam(':members', $mem ,PDO::PARAM_STR);
				$stmt->bindParam(':project_by',$pro ,PDO::PARAM_STR);
				$stmt->bindParam(':photographer',$pho ,PDO::PARAM_STR);
				$stmt->bindParam(':desc_project',$dsc ,PDO::PARAM_STR);		
				$stmt->bindParam(':path_project',$path ,PDO::PARAM_STR);
				$stmt->bindParam(':url_video',$video ,PDO::PARAM_STR);	

				$stmt->execute();
				
				
				return $conn->lastInsertId();
			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}


	 
	public function updateProject($last,$category,$name_project,$inmueble,$type,$final_date,$designer,$direction,$members,$projects_by,$photo,$desc,$video)
	{
		try
		{
				$query = 'UPDATE project
							SET time_save = :time_save
								,category = :category
								,name_project = :name_project
								,inmueble = :inmueble
								,type_work = :type_work
								,final_date = :final_date
								,designer = :designer
								,members = :members
								,direction = :direction
								,project_by = :project_by
								,photographer = :photographer
								,desc_project = :desc_project
								,url_video = :url_video
								WHERE  id_project = :id_project';
				$conn = parent::admin();
				$stmt = $conn->prepare($query);

				$now = date('Y-m-d H:i:s');

				$cat = trim($category);
				$nam = trim($name_project);
				$inm = trim($inmueble);
				$typ = trim($type);
				$fin = trim($final_date);
				$des = trim($designer);
				$dir = trim($direction);
				$mem = trim($members);
				$pro = trim($projects_by);
				$pho = trim($photo);
				$dsc = trim($desc);

				$stmt->bindParam(':id_project', $last);
				$stmt->bindParam(':time_save',$now,PDO::PARAM_STR);
				$stmt->bindParam(':category', $cat ,PDO::PARAM_STR);
				$stmt->bindParam(':name_project',$nam ,PDO::PARAM_STR);
				$stmt->bindParam(':inmueble',$inm ,PDO::PARAM_STR);
				$stmt->bindParam(':type_work',$typ ,PDO::PARAM_STR);	
				$stmt->bindParam(':final_date',$fin ,PDO::PARAM_STR);
				$stmt->bindParam(':designer',$des ,PDO::PARAM_STR);
				$stmt->bindParam(':direction', $dir ,PDO::PARAM_STR);
				$stmt->bindParam(':members', $mem ,PDO::PARAM_STR);
				$stmt->bindParam(':project_by',$pro ,PDO::PARAM_STR);
				$stmt->bindParam(':photographer',$pho ,PDO::PARAM_STR);	
				$stmt->bindParam(':desc_project',$dsc ,PDO::PARAM_STR);	
				$stmt->bindParam(':url_video',$video ,PDO::PARAM_STR);	 

				$stmt->execute();
				
				if($stmt == true){
					return true;
				}else{
					return false;
				}
			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}

	public function updateStatusProject($id)
	{
		try
		{
				$query = 'UPDATE project SET status = "1" WHERE id_project = :id_project';
				$conn = parent::admin();
				$stmt = $conn->prepare($query);

				$status = 1;
				session_start();
				$stmt->bindParam(':id_project',$id ,PDO::PARAM_INT);
				$stmt->execute();
			
				//print_r($id);
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}


	public function deleteProject($id)
	{
		try
		{
				$query = 'DELETE  FROM project WHERE id_project = :id';

				$conn = parent::admin();
				$stmt = $conn->prepare($query);


				$stmt->bindParam(':id', $id ,PDO::PARAM_INT);
				$stmt->execute();

				$count = $stmt->rowCount();
				
				if( $count > 0 ){
					return true;
				}else{
					return false;
				}
			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}

	/*
	 *
	 * Create New User
	 * @param $_POST["name"]
	 * @param $_POST["lastname"]
	 * @param $_POST["email"]
	 * @param $_POST["password"]
	 * @return Int 
	 *
	 */
	 
	public function insertUser($path)
	{
		try
		{
				$query = 'INSERT INTO user(token_session,name,lastname,email,password,time_register)  VALUES(:token_session,:name,:lastname,:email,:password,:time_register)';
				$conn = parent::admin();
				$stmt = $conn->prepare($query);

				$now = date('Y-m-d H:i:s');
				$token = password_hash($_POST["email"], PASSWORD_DEFAULT);
				$password = password_hash($_POST["password"], PASSWORD_DEFAULT);

				$name = trim($_POST['name']);
				$lastname = trim($_POST['lastname']);
				$email = strtolower(trim($_POST['email']));

				$imagen = "public/img-profiles/".$_POST['imagen'];

				$stmt->bindParam(':name', $name,PDO::PARAM_STR);
				$stmt->bindParam(':token_session',$token,PDO::PARAM_STR);
				$stmt->bindParam(':lastname', $lastname ,PDO::PARAM_STR);
				$stmt->bindParam(':email', $email,PDO::PARAM_STR);
				$stmt->bindParam(':password',$password,PDO::PARAM_STR);

				$stmt->bindParam(':time_register',$now,PDO::PARAM_STR);	
				$stmt->execute();
				
				$last = $conn->lastInsertId();
				
				return ["lastId"=>$last,"token"=>$token];
			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}

	public function insertUser2($path)
	{
		try
		{
				$query = 'INSERT INTO user(token_session,name,lastname,email,password,labor_situation,profession,business,members,street_number,colonia,municipio,estado,country,phone,path_image,time_register) VALUES(:token_session,:name,:lastname,:email,:password,:labor_situation,:profession,:business,:members,:street_number,:colonia,:municipio,:estado,:country,:phone,:path_image,:time_register)';
				$conn = parent::admin();
				$stmt = $conn->prepare($query);

				$now = date('Y-m-d H:i:s');
				$token = password_hash($_POST["email"], PASSWORD_DEFAULT);
				$password = password_hash($_POST["password"], PASSWORD_DEFAULT);

				$name = trim($_POST['name']);
				$lastname = trim($_POST['lastname']);
				$email = strtolower(trim($_POST['email']));

				$imagen = "public/img-profiles/".$_POST['imagen'];

				$stmt->bindParam(':name', $name,PDO::PARAM_STR);
				$stmt->bindParam(':token_session',$token,PDO::PARAM_STR);
				$stmt->bindParam(':lastname', $lastname ,PDO::PARAM_STR);
				$stmt->bindParam(':email', $email,PDO::PARAM_STR);
				$stmt->bindParam(':password',$password,PDO::PARAM_STR);

				$stmt->bindParam(':labor_situation',$_POST['situacion'],PDO::PARAM_STR);
				$stmt->bindParam(':profession',$_POST['estudios'],PDO::PARAM_STR);
				$stmt->bindParam(':business',$_POST['business'],PDO::PARAM_STR);
				$stmt->bindParam(':members',$_POST['group'],PDO::PARAM_STR);
				$stmt->bindParam(':street_number', $_POST['calle'],PDO::PARAM_STR);
				$stmt->bindParam(':colonia',$_POST['colonia'],PDO::PARAM_STR);	
				$stmt->bindParam(':municipio',$_POST['municipio'],PDO::PARAM_STR);
				$stmt->bindParam(':estado',$_POST['estado'],PDO::PARAM_STR);
				$stmt->bindParam(':country',$_POST['pais'],PDO::PARAM_STR);
				$stmt->bindParam(':phone',$_POST['telefono'],PDO::PARAM_STR);
				$stmt->bindParam(':path_image',$imagen,PDO::PARAM_STR);

				$stmt->bindParam(':time_register',$now,PDO::PARAM_STR);	
				$stmt->execute();
				
				$last = $conn->lastInsertId();
				
				return ["lastId"=>$last,"token"=>$token];
			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}

	/*
	 *
	 * Get users
	 * @param String token_session
	 * @return array 
	 *
	 */
	 
	public function getInfoUSer($token)
	{
		try
		{
				$query = 'SELECT name,lastname,email,rol,active,labor_situation,profession,business,members,street_number,colonia,
					municipio,estado,country,phone,path_image FROM user WHERE token_session = :token_session';
				$conn = parent::admin();
				$stmt = $conn->prepare($query);

				$stmt->bindParam(':token_session',$token,PDO::PARAM_STR);

				$stmt->execute();
				
				$last = $conn->lastInsertId();
				
				return $stmt->fetch(PDO::FETCH_ASSOC);
			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}

	public function getInfoUSerId($token)
	{
		try
		{
				$query = 'SELECT name,lastname,email,rol,active,labor_situation,profession,business,members,street_number,colonia,
					municipio,estado,country,phone,path_image FROM user WHERE id_user = :token_session';
				$conn = parent::admin();
				$stmt = $conn->prepare($query);

				$stmt->bindParam(':token_session',$token,PDO::PARAM_STR);

				$stmt->execute();
				
				$last = $conn->lastInsertId();
				
				return $stmt->fetch(PDO::FETCH_ASSOC);
			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}

	public function getAllUsers()
	{
		try
		{
				$query = 'SELECT t1.*,
							(SELECT count(*)
						    FROM project as t2
						    WHERE t1.id_user = t2.id_usuario
						    ) as "total" 
						FROM user as t1';
				$conn = parent::admin();
				$stmt = $conn->prepare($query);


				$stmt->execute();
				
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}


	public function getById($id)
	{
		try
		{
				$query = 'SELECT * 
							FROM user
							WHERE id_user = :id_user';
				$conn = parent::admin();
				$stmt = $conn->prepare($query);

				$stmt->bindParam(':id_user',$id,PDO::PARAM_INT);
				$stmt->execute();
				
				
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}


	public function getByIdProj($id)
	{
		try
		{
				$query = 'SELECT * 
							FROM project
							WHERE id_usuario = :id_usuario';
				$conn = parent::admin();
				$stmt = $conn->prepare($query);

				$stmt->bindParam(':id_usuario',$id,PDO::PARAM_INT);
				$stmt->execute();
				
				
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}

	/*
	 *
	 * Update profile user
	 * @return Boolean true || false
	 *
	 */
	 
	public function updateUser($path = null)
	{
		try
		{
				if($path == null){
					$query = 'UPDATE user 
								SET name = :name,
									lastname = :lastname,
									labor_situation = :labor_situation, 
									profession = :profession, 
									business = :business, 
									members = :members,
									street_number = :street_number,
									colonia = :colonia,
									municipio = :municipio,
									estado = :estado,
									country = :country,
									phone = :phone
								WHERE id_user = :id_user';
				}else{
					$query = 'UPDATE user 
								SET name = :name,
									lastname = :lastname,
									labor_situation = :labor_situation, 
									profession = :profession, 
									business = :business, 
									members = :members,
									street_number = :street_number,
									colonia = :colonia,
									municipio = :municipio,
									estado = :estado,
									country = :country,
									phone = :phone,
									path_image = :path_image
								WHERE id_user = :id_user';
				}

				$conn = parent::admin();
				$stmt = $conn->prepare($query);

				session_start();
				$stmt->bindParam(':name',$_POST['name'],PDO::PARAM_STR);
				$stmt->bindParam(':lastname',$_POST['lastname'],PDO::PARAM_STR);
				$stmt->bindParam(':labor_situation',$_POST['situacion'],PDO::PARAM_STR);
				$stmt->bindParam(':profession',$_POST['estudios'],PDO::PARAM_STR);
				$stmt->bindParam(':business',$_POST['business'],PDO::PARAM_STR);
				$stmt->bindParam(':members',$_POST['group'],PDO::PARAM_STR);
				$stmt->bindParam(':street_number', $_POST['calle'],PDO::PARAM_STR);
				$stmt->bindParam(':colonia',$_POST['colonia'],PDO::PARAM_STR);	
				$stmt->bindParam(':municipio',$_POST['municipio'],PDO::PARAM_STR);
				$stmt->bindParam(':estado',$_POST['estado'],PDO::PARAM_STR);
				$stmt->bindParam(':country',$_POST['pais'],PDO::PARAM_STR);
				$stmt->bindParam(':phone',$_POST['telefono'],PDO::PARAM_STR);
				$stmt->bindParam(':id_user',$_SESSION['id_user'],PDO::PARAM_STR);
				if($path != null){
					$stmt->bindParam(':path_image',$path,PDO::PARAM_STR);
				}


				$stmt->execute();
				
				$count = $stmt->rowCount();
				if($stmt == true){
					return true;
				}else{
					return false;
				}
				//return $count;
				/*if($count == 1){
					return ['status'=>'success','message'=>'Actualizacion correcta'];
				}else{
					return ['status'=>'error','message'=>'Actualizacion incorrecta'];
				}*/
			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}

	public function updateUserId($path = null)
	{
		try
		{
				if($path == null){
					$query = 'UPDATE user 
								SET name = :name,
									lastname = :lastname,
									labor_situation = :labor_situation, 
									profession = :profession, 
									business = :business, 
									members = :members,
									street_number = :street_number,
									colonia = :colonia,
									municipio = :municipio,
									estado = :estado,
									country = :country,
									phone = :phone
								WHERE id_user = :id_user';
				}else{
					$query = 'UPDATE user 
								SET name = :name,
									lastname = :lastname,
									labor_situation = :labor_situation, 
									profession = :profession, 
									business = :business, 
									members = :members,
									street_number = :street_number,
									colonia = :colonia,
									municipio = :municipio,
									estado = :estado,
									country = :country,
									phone = :phone,
									path_image = :path_image
								WHERE id_user = :id_user';
				}

				$conn = parent::admin();
				$stmt = $conn->prepare($query);

				session_start();
				$stmt->bindParam(':name',$_POST['name'],PDO::PARAM_STR);
				$stmt->bindParam(':lastname',$_POST['lastname'],PDO::PARAM_STR);
				$stmt->bindParam(':labor_situation',$_POST['situacion'],PDO::PARAM_STR);
				$stmt->bindParam(':profession',$_POST['estudios'],PDO::PARAM_STR);
				$stmt->bindParam(':business',$_POST['business'],PDO::PARAM_STR);
				$stmt->bindParam(':members',$_POST['group'],PDO::PARAM_STR);
				$stmt->bindParam(':street_number', $_POST['calle'],PDO::PARAM_STR);
				$stmt->bindParam(':colonia',$_POST['colonia'],PDO::PARAM_STR);	
				$stmt->bindParam(':municipio',$_POST['municipio'],PDO::PARAM_STR);
				$stmt->bindParam(':estado',$_POST['estado'],PDO::PARAM_STR);
				$stmt->bindParam(':country',$_POST['pais'],PDO::PARAM_STR);
				$stmt->bindParam(':phone',$_POST['telefono'],PDO::PARAM_STR);
				$stmt->bindParam(':id_user',$_POST['id_user'],PDO::PARAM_STR);
				if($path != null){
					$stmt->bindParam(':path_image',$path,PDO::PARAM_STR);
				}


				$stmt->execute();
				
				$count = $stmt->rowCount();
				if($stmt == true){
					return true;
				}else{
					return false;
				}
				//return $count;
				/*if($count == 1){
					return ['status'=>'success','message'=>'Actualizacion correcta'];
				}else{
					return ['status'=>'error','message'=>'Actualizacion incorrecta'];
				}*/
			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}

	public function updateUserPassword($email,$password)
	{
		try
		{
				$query = 'UPDATE user 
							SET password = :pass1
							WHERE email = :email';

				$conn = parent::admin();
				$stmt = $conn->prepare($query);

				$pass = password_hash($password, PASSWORD_DEFAULT);
				$stmt->bindParam(':pass1',$pass,PDO::PARAM_STR);
				$stmt->bindParam(':email',$email,PDO::PARAM_STR);	

				$stmt->execute();
				
				$count = $stmt->rowCount();
				if($stmt == true){
					return $count;
				}else{
					return $count;
				}
			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}

	public function updateUserEdit($path)
	{
		try
		{
				$query = 'UPDATE user 
							SET labor_situation = :labor_situation, 
								profession = :profession, 
								business = :business, 
								members = :members,
								street_number = :street_number,
								colonia = :colonia,
								municipio = :municipio,
								estado = :estado,
								country = :country,
								phone = :phone,
								path_image = :path_image
							WHERE token_session = :token_session';

				$conn = parent::admin();
				$stmt = $conn->prepare($query);

				$stmt->bindParam(':labor_situation',$_POST['situacion'],PDO::PARAM_STR);
				$stmt->bindParam(':profession',$_POST['estudios'],PDO::PARAM_STR);
				$stmt->bindParam(':business',$_POST['business'],PDO::PARAM_STR);
				$stmt->bindParam(':members',$_POST['group'],PDO::PARAM_STR);
				$stmt->bindParam(':street_number', $_POST['calle'],PDO::PARAM_STR);
				$stmt->bindParam(':colonia',$_POST['colonia'],PDO::PARAM_STR);	
				$stmt->bindParam(':municipio',$_POST['municipio'],PDO::PARAM_STR);
				$stmt->bindParam(':estado',$_POST['estado'],PDO::PARAM_STR);
				$stmt->bindParam(':country',$_POST['pais'],PDO::PARAM_STR);
				$stmt->bindParam(':phone',$_POST['telefono'],PDO::PARAM_STR);
				$stmt->bindParam(':token_session',$_SESSION['token_session'],PDO::PARAM_STR);
				$stmt->bindParam(':path_image',$path,PDO::PARAM_STR);	

				$stmt->execute();
				
				$count = $stmt->rowCount();
				if($stmt == true){
					return $count;
				}else{
					return $count;
				}
				//return $count;
				/*if($count == 1){
					return ['status'=>'success','message'=>'Actualizacion correcta'];
				}else{
					return ['status'=>'error','message'=>'Actualizacion incorrecta'];
				}*/
			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}

	/*
	 *
	 * Check duplicate email
	 * @param String email
	 * @return Int or false 
	 * 
	 */
	 
	public function checkUser()
	{
		try
		{
				$query = 'SELECT count(*) as Total  FROM user where email = :email ';
				$conn = parent::admin();
				$stmt = $conn->prepare($query);

				$stmt->bindParam(':email', $_POST['email'],PDO::PARAM_STR);
				$stmt->execute();

				$count = $stmt->rowCount();
				
				// if( $count>0 ){
				return $stmt->fetch(PDO::FETCH_ASSOC);		
				// }else{
				// 	return false;
				// }
				
				
			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}


	/*
	 *
	 * Update status user
	 * @param String
	 *
	 */
	 
	public function unlockUser($id)
	{
		try
		{
				$query = 'UPDATE user SET active = :active WHERE id_user = :id_user';

				$conn = parent::admin();
				$stmt = $conn->prepare($query);

				$active = 1;
				$stmt->bindParam(':active', $active ,PDO::PARAM_INT);
				$stmt->bindParam(':id_user', $id ,PDO::PARAM_INT);
				$stmt->execute();

				$count = $stmt->rowCount();
				
				if( $count > 0 ){
					return true;
				}else{
					return false;
				}
			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}


	/*
	 *
	 * Get files
	 * @return file
	 *
	 */

	public function getEmailContents(array $vars)
	{
	  extract($vars);
	  ob_start();
	  include 'mailing/template.php';
	  return ob_get_clean();
	}

	/*
	 *
	 * waitVerification
	 * @param lastinsertId
	 * @return string
	 *
	 */
	 
	public function waitVerification($id,$password,$email)
	{
		try
		{
				$query = 'INSERT INTO containment(id_user,token,time_create) VALUES(:id_user,:token,:time_create)';
				$conn = parent::admin();
				$stmt = $conn->prepare($query);

				$now = date('Y-m-d H:i:s');
				$hash = password_hash($password, PASSWORD_DEFAULT);

				$stmt->bindParam(':id_user', $id,PDO::PARAM_INT);
				$stmt->bindParam(':token', $hash,PDO::PARAM_STR);
				$stmt->bindParam(':time_create',$now,PDO::PARAM_STR);	
				$stmt->execute();
				
				if( $stmt == true ){
					return "http://www.construlitalighting.com/cla/validate?token=".$hash."&email=".$email;
				}
			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}


	public function generateTokenPassword($email)
	{
		try
		{
				$query = 'INSERT INTO containment_password(email,token,time_register) VALUES(:email,:token,:time_register)';
				$conn = parent::admin();
				$stmt = $conn->prepare($query);
				
				$now = date('Y-m-d H:i:s');
				$email = trim($email);
				$token = password_hash($email.$now, PASSWORD_DEFAULT);

				$stmt->bindParam(':email', $email,PDO::PARAM_STR);
				$stmt->bindParam(':token',$token,PDO::PARAM_STR);
				$stmt->bindParam(':time_register',$now,PDO::PARAM_STR);	
				$stmt->execute();
				
				if( $stmt == true ){
					return "http://www.construlitalighting.com/cla/save-password?token=".$token."&email=".$email;
				}
			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}

	/*
	 *
	 * Check token exist
	 * @param $_GET["token"]
	 * @param $_GET["email"]
	 * @return bool
	 *
	 */
	 
	public function verifyToken($token,$email)
	{
		try
		{
				$query = 'SELECT t1.id_containment,t2.id_user
							FROM containment as t1 
						    INNER JOIN user t2
						    ON t2.id_user = t1.id_user 
						    WHERE token = :token
						    AND t2.email =:email';

				$conn = parent::admin();
				$stmt = $conn->prepare($query);

				$hash = password_hash($password, PASSWORD_DEFAULT);

				$stmt->bindParam(':token', $token ,PDO::PARAM_STR);
				$stmt->bindParam(':email', $email ,PDO::PARAM_STR);
				$stmt->execute();

				$count = $stmt->rowCount();
				
				if( $count == 1 ){
					return $stmt->fetch();
				}else{
					return false;
				}
			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}


	public function verifyTokenPassword($token,$email)
	{
		try
		{
				$query = 'SELECT id_containment,email
							FROM containment_password
						    WHERE token = :token
						    AND email =:email';

				$conn = parent::admin();
				$stmt = $conn->prepare($query);

				$tk = trim($token);
				if(filter_var($email, FILTER_VALIDATE_EMAIL)){
					$emai = $email;
				}else{
					$emai = "";
				}
				
				$stmt->bindParam(':token', $tk ,PDO::PARAM_STR);
				$stmt->bindParam(':email', $emai ,PDO::PARAM_STR);
				$stmt->execute();

				$count = $stmt->rowCount();
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				if( $count == 1 ){
					return [$row['id_containment'],$row['email']];
				}else{
					return false;
				}
			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}
	/*
	 *
	 * Delete token confirm
	 * @param String id 
	 * @return bool
	 *
	 */
	 
	public function deleteToken($id)
	{
		try
		{
				$query = 'DELETE  FROM containment WHERE id_containment = :id';

				$conn = parent::admin();
				$stmt = $conn->prepare($query);

				$hash = password_hash($password, PASSWORD_DEFAULT);

				$stmt->bindParam(':id', $id ,PDO::PARAM_INT);
				$stmt->execute();

				$count = $stmt->rowCount();
				
				if( $count > 0 ){
					return true;
				}else{
					return false;
				}
			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}	 


	public function deleteTokenPassword($id)
	{
		try
		{
				$query = 'DELETE  FROM containment_password WHERE id_containment = :id';

				$conn = parent::admin();
				$stmt = $conn->prepare($query);


				$stmt->bindParam(':id', $id ,PDO::PARAM_INT);
				$stmt->execute();

				$count = $stmt->rowCount();
				
				if( $count > 0 ){
					return true;
				}else{
					return false;
				}
			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}	

	/*
	 *
	 * Auth Login
	 * @param String token
	 * @return location
	 *
	 */
	 
	public function authUser($username,$password)
	{
		try
		{

			$query = 'SELECT * FROM user WHERE email = :email';

			$conn = parent::admin();
			$stmt = $conn->prepare($query);

			$stmt->bindParam(':email', $username ,PDO::PARAM_INT);
			$stmt->execute();

			if( $stmt == true ){
				return $stmt->fetch();
			}

			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}
	public function userInfoId($id)
	{
		try
		{
			$query = 'SELECT * FROM user WHERE id_user = :id_usuario';

			$conn = parent::admin();
			$stmt = $conn->prepare($query);

			session_start();
			$stmt->bindParam(':id_usuario', $id ,PDO::PARAM_STR);
			$stmt->execute();

			if( $stmt == true ){
				return $stmt->fetch();
			}

			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}
	public function userInfo()
	{
		try
		{
			$query = 'SELECT * FROM user WHERE id_user = :id_usuario';

			$conn = parent::admin();
			$stmt = $conn->prepare($query);

			session_start();
			$stmt->bindParam(':id_usuario', $_SESSION["id_user"] ,PDO::PARAM_STR);
			$stmt->execute();

			if( $stmt == true ){
				return $stmt->fetch();
			}

			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}

	/*
	 *
	 * Auth Login
	 * @param String token
	 * @return location
	 *
	 */

	public function getprojectByUserNoLog($last)
	{
		try
		{

			$query = 'SELECT * FROM project WHERE id_project = :id_project'; //AND status = 0 ';

			$conn = parent::admin();
			$stmt = $conn->prepare($query);

			session_start();
			$stmt->bindParam(':id_project', $last ,PDO::PARAM_STR);

			$stmt->execute();

			if( $stmt == true ){
				return $stmt->fetch(PDO::FETCH_ASSOC);
			}

			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}

	public function getprojectByUser($last)
	{
		try
		{

			$query = 'SELECT * FROM project WHERE id_usuario = :id_usuario AND id_project = :id_project'; //AND status = 0 ';

			$conn = parent::admin();
			$stmt = $conn->prepare($query);

			session_start();
			$stmt->bindParam(':id_usuario', $_SESSION["id_user"] ,PDO::PARAM_STR);
			$stmt->bindParam(':id_project', $last ,PDO::PARAM_STR);

			$stmt->execute();

			if( $stmt == true ){
				return $stmt->fetch(PDO::FETCH_ASSOC);
			}

			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}
	public function getUserProjects($user_id)
	{
		try
		{

			$query = 'SELECT * FROM project WHERE id_usuario = :id_usuario'; //AND status = 0 ';

			$conn = parent::admin();
			$stmt = $conn->prepare($query);

			session_start();
			$stmt->bindParam(':id_usuario', $user_id ,PDO::PARAM_STR);

			$stmt->execute();

			if( $stmt == true ){
				return $stmt->fetch(PDO::FETCH_ASSOC);
			}

			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}
	public function allUsersProy()
	{
		try
		{

			$query = 'SELECT DISTINCT user.*, (select count(*) FROM project where user.id_user = project.id_usuario) as projects FROM project RIGHT JOIN user ON user.id_user = project.id_usuario WHERE user.rol = 0';
			#$query = 'SELECT user.* FROM project RIGHT JOIN user ON user.id_user = project.id_usuario WHERE project.name IS NULL AND user.rol = 0';

			$conn = parent::admin();
			$stmt = $conn->prepare($query);

			$stmt->execute();

			if( $stmt == true ){
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}

			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}

	public function noProjects()
	{
		try
		{

			$query = 'SELECT DISTINCT user.*, (select count(*) FROM project where user.id_user = project.id_usuario) FROM project RIGHT JOIN user ON user.id_user = project.id_usuario WHERE project.name IS NULL AND user.rol = 0';
			#$query = 'SELECT user.* FROM project RIGHT JOIN user ON user.id_user = project.id_usuario WHERE project.name IS NULL AND user.rol = 0';

			$conn = parent::admin();
			$stmt = $conn->prepare($query);

			$stmt->execute();

			if( $stmt == true ){
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}

			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}


	public function incompleteProjects()
	{
		try
		{

			$query = 'SELECT DISTINCT user.*, (select count(*) FROM project where user.id_user = project.id_usuario AND project.status = 0) as projects FROM `user` RIGHT JOIN project ON user.id_user = project.id_usuario WHERE rol = 0 AND project.status = 0 ORDER BY user.id_user ASC';
			#$query = 'SELECT user.* FROM `user` RIGHT JOIN project ON user.id_user = project.id_usuario WHERE rol = 0 AND project.status = 0 ORDER BY user.id_user ASC';

			$conn = parent::admin();
			$stmt = $conn->prepare($query);

			$stmt->execute();

			if( $stmt == true ){
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}

			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}

	public function completeProjects()
	{
		try
		{

			$query = 'SELECT DISTINCT user.*, (select count(*) FROM project where user.id_user = project.id_usuario AND project.status = 1) as projects FROM `user` RIGHT JOIN project ON user.id_user = project.id_usuario WHERE rol = 0 AND project.status = 1 ORDER BY user.id_user ASC';
			#$query = 'SELECT user.* FROM `user` RIGHT JOIN project ON user.id_user = project.id_usuario WHERE rol = 0 AND project.status = 1 ORDER BY user.id_user ASC';

			$conn = parent::admin();
			$stmt = $conn->prepare($query);

			$stmt->execute();

			if( $stmt == true ){
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}

			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}

	public function completeProjectsId()
	{
		try
		{


			$query = 'SELECT user.* FROM `user` RIGHT JOIN project ON user.id_user = project.id_usuario WHERE rol = 0 AND project.status = 1 AND id_user = '.$_SESSION["id_user"].' ORDER BY user.id_user ASC';

			$conn = parent::admin();
			$stmt = $conn->prepare($query);

			$stmt->execute();

			if( $stmt == true ){
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}

			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}

	public function getAllProjectsAdmin()
	{
		try
		{


			$query = 'SELECT *
							FROM project';

			$conn = parent::admin();
			$stmt = $conn->prepare($query);

			$stmt->execute();

			if( $stmt == true ){
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}

			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}

	public function getAllProjects($page)
	{
		try
		{


			$query = 'SELECT t1.*,
							 t1.name as name_project,
							 (SELECT count(*) FROM project WHERE status =1) as indice,
			   			     t2.*,
							 (SELECT stars 
							 	FROM rating_project_user 
							 	WHERE id_user = :id_user
							 	AND id_project = t1.id_project) as stars
							FROM project as t1
							INNER JOIN user as t2
							ON t1.id_usuario=t2.id_user
							WHERE t1.status = 1
							ORDER BY t1.time_save DESC
							LIMIT :start,:offset';

			$conn = parent::admin();
			$stmt = $conn->prepare($query);

			$end = 6;
			$start = intval(($page-1)*$end);

			$stmt->bindParam(':id_user', $_SESSION["id_user"] ,PDO::PARAM_INT);
			$stmt->bindParam(':start', $start ,PDO::PARAM_INT);
			$stmt->bindParam(':offset', $end ,PDO::PARAM_INT);

			$stmt->execute();

			if( $stmt == true ){
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}

			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}


	public function getAllProjectsQualify($page)
	{
		try
		{


			$query = 'SELECT t1.*,
							t1.name as name_project,
							 (SELECT count(*) FROM project WHERE status =1) as indice,
			   			     t2.*,
							 (SELECT stars 
							 	FROM rating_project_user 
							 	WHERE id_user = :id_user
							 	AND id_project = t1.id_project) as stars
							FROM project as t1
							INNER JOIN user as t2
							ON t1.id_usuario=t2.id_user
							WHERE t1.status = 1
							ORDER BY stars DESC, t1.time_save DESC';
							// LIMIT :start,:offset';

			$conn = parent::admin();
			$stmt = $conn->prepare($query);

			$end = 6;
			$start = intval(($page-1)*$end);

			$stmt->bindParam(':id_user', $_SESSION["id_user"] ,PDO::PARAM_INT);
			// $stmt->bindParam(':start', $start ,PDO::PARAM_INT);
			// $stmt->bindParam(':offset', $end ,PDO::PARAM_INT);

			$stmt->execute();

			// if( $stmt == true ){
			// 	return $stmt->fetchAll(PDO::FETCH_ASSOC);
			// }
			if( $stmt == true ){
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$data = [];
				$x = 0;
				foreach ($result as $key => $value) {
					if($value['stars'] != ""){
						$value['iscal'] = 1;
						$data[$x] = $value;
						$x++;
					}
				}
				
				return $data;
				
			}
			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
		}
	}


	public function getAllProjectsScore($page)
	{
		try
		{


			$query = 'SELECT t1.*,
							t1.name as name_project,
							 (SELECT count(*) FROM project WHERE status =1) as indice,
			   			     t2.*,
							 (SELECT SUM(stars) 
							 	FROM rating_project_user 
							 	WHERE id_project = t1.id_project) as stars,
							 t1.name as project
							FROM project as t1
							INNER JOIN user as t2
							ON t1.id_usuario=t2.id_user
							WHERE t1.status = 1
							ORDER BY t1.time_save DESC
							LIMIT :start,:offset';

			$conn = parent::admin();
			$stmt = $conn->prepare($query);

			$end = 6;
			$start = intval(($page-1)*$end);

			//$stmt->bindParam(':id_user', $_SESSION["id_user"] ,PDO::PARAM_INT);
			$stmt->bindParam(':start', $start ,PDO::PARAM_INT);
			$stmt->bindParam(':offset', $end ,PDO::PARAM_INT);

			$stmt->execute();

			if( $stmt == true ){
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}

			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
		}
	}


	public function getAllProjectsScoreByCategory($id)
	{
		try
		{


			$query = 'SELECT t1.*,
							 t1.name as name_project,
			   			     t2.*,
							 (SELECT SUM(stars) 
							 	FROM rating_project_user 
							 	WHERE id_project = t1.id_project) as stars,
							 t1.name as project
							FROM project as t1
							INNER JOIN user as t2
							ON t1.id_usuario=t2.id_user
							WHERE t1.status = 1
							AND t1.category = :category
							ORDER BY t1.time_save DESC';

			$conn = parent::admin();
			$stmt = $conn->prepare($query);


			$stmt->bindParam(':category', $id ,PDO::PARAM_INT);

			$stmt->execute();

			if( $stmt == true ){
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}

			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
		}
	}

	public function getAllProjectsUnQualify($page)
	{
		try
		{


			$query = 'SELECT t1.*,
							t1.name as name_project,
							 (SELECT count(*) FROM project WHERE status =1) as indice,
			   			     t2.*,
							 (SELECT stars 
							 	FROM rating_project_user 
							 	WHERE id_user = :id_user
							 	AND id_project = t1.id_project) as stars
							FROM project as t1
							INNER JOIN user as t2
							ON t1.id_usuario=t2.id_user
							WHERE t1.status = 1
							ORDER BY t1.time_save DESC';
							// LIMIT :start,:offset';

			$conn = parent::admin();
			$stmt = $conn->prepare($query);

			$end = 6;
			$start = intval(($page-1)*$end);

			$stmt->bindParam(':id_user', $_SESSION["id_user"] ,PDO::PARAM_INT);
			// $stmt->bindParam(':start', $start ,PDO::PARAM_INT);
			// $stmt->bindParam(':offset', $end ,PDO::PARAM_INT);

			$stmt->execute();

			if( $stmt == true ){
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$data = [];
				$x = 0;
				foreach ($result as $key => $value) {
					if($value['stars'] == ""){
						$data[$x] = $value;
						$x++;
					}
				}
				return $data;
				
			}

			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
		}
	}

	public function getAllProjectsbyCategoryQualify($id)
	{
		try
		{


			$query = 'SELECT   t1.*,
							   t1.name as name_project,
							   t2.*,
							   (SELECT  stars 
								FROM rating_project_user 
								WHERE rating_project_user.id_user = :id_user
						        AND id_project = t1.id_project) AS stars
							FROM project as t1
							INNER JOIN user as t2
							ON t1.id_usuario=t2.id_user
							WHERE t1.status = 1
							AND t1.category = :category
							ORDER BY stars DESC, t1.time_save DESC';

			$conn = parent::admin();
			$stmt = $conn->prepare($query);

			$stmt->bindParam(':category', $id ,PDO::PARAM_INT);
			$stmt->bindParam(':id_user', $_SESSION["id_user"] ,PDO::PARAM_INT);

			$stmt->execute();

			if( $stmt == true ){
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$data = [];
				$x = 0;
				foreach ($result as $key => $value) {
					if($value['stars'] != ""){
						$value['iscal'] = 1;
						$data[$x] = $value;
						
						$x++;
					}
				}

				
				return $data;
				
			}

			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}

	public function getAllProjectsbyCategoryUnQualify($id)
	{
		try
		{


			$query = 'SELECT   t1.*,
								t1.name as name_project,
							   t2.*,
							   (SELECT  stars 
								FROM rating_project_user 
								WHERE rating_project_user.id_user = :id_user
						        AND id_project = t1.id_project) AS stars
							FROM project as t1
							INNER JOIN user as t2
							ON t1.id_usuario=t2.id_user
							WHERE t1.status = 1
							AND t1.category = :category
							ORDER BY t1.time_save DESC';

			$conn = parent::admin();
			$stmt = $conn->prepare($query);

			$stmt->bindParam(':category', $id ,PDO::PARAM_INT);
			$stmt->bindParam(':id_user', $_SESSION["id_user"] ,PDO::PARAM_INT);

			$stmt->execute();

			if( $stmt == true ){
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$data = [];
				$x = 0;
				foreach ($result as $key => $value) {
					if($value['stars'] == ""){
						$data[$x] = $value;
						$x++;
					}
				}

				return $data;
				
			}

			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}

	public function getAllProjectsbyCategory($id)
	{
		try
		{


			$query = 'SELECT   t1.*,
								t1.name as name_project,
							   t2.*,
							   (SELECT  stars 
								FROM rating_project_user 
								WHERE rating_project_user.id_user = :id_user
						        AND id_project = t1.id_project) AS stars
							FROM project as t1
							INNER JOIN user as t2
							ON t1.id_usuario=t2.id_user
							WHERE t1.status = 1
							AND t1.category = :category
							ORDER BY t1.time_save DESC';

			$conn = parent::admin();
			$stmt = $conn->prepare($query);

			$stmt->bindParam(':category', $id ,PDO::PARAM_INT);
			$stmt->bindParam(':id_user', $_SESSION["id_user"] ,PDO::PARAM_INT);

			$stmt->execute();

			if( $stmt == true ){
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}

			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}


	public function getImagesByCategory($id)
	{
		try
		{


			$query = 'SELECT t1.id_project,t1.category,t1.name,t2.name as name_user,t2.lastname as lastname_user, t3.*
							FROM project as t1
							INNER JOIN user as t2
							ON t1.id_usuario=t2.id_user
							INNER JOIN project_img as t3
							ON t1.id_project=t3.id_project
							WHERE t1.status = 1
							AND t1.category = :category
							GROUP BY t1.id_project
							ORDER BY t1.time_save DESC';

			$conn = parent::admin();
			$stmt = $conn->prepare($query);

			$stmt->bindParam(':category', $id ,PDO::PARAM_INT);

			$stmt->execute();

			if( $stmt == true ){
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}

			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}

	public function getprojectUnconfirmed()
	{
		try
		{

			$query = 'SELECT * FROM project WHERE id_usuario = :id_usuario ';

			$conn = parent::admin();
			$stmt = $conn->prepare($query);

			$stmt->bindParam(':id_usuario', $_SESSION["id_user"] ,PDO::PARAM_STR);

			$stmt->execute();

			if( $stmt == true ){
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}

			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}


	public function getUsedCategory($cat)
	{
		try
		{

			$query = 'SELECT count(*) as Total FROM project WHERE id_usuario = :id_usuario  AND category = :cat';

			$conn = parent::admin();
			$stmt = $conn->prepare($query);

			$stmt->bindParam(':id_usuario', $_SESSION["id_user"] ,PDO::PARAM_STR);
			$stmt->bindParam(':cat', $cat ,PDO::PARAM_INT);

			$stmt->execute();

			if( $stmt == true ){
				return $stmt->fetch();
			}

			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}

	public function getRate($id)
	{
		try
		{

			$query = 'SELECT sum(t1.stars) as promedio
						from rating_project_user as t1
					    where t1.id_project = :id';

			$conn = parent::admin();
			$stmt = $conn->prepare($query);

			$stmt->bindParam(':id', $id ,PDO::PARAM_INT);

			$stmt->execute();

			if( $stmt == true ){
				return $stmt->fetch();
			}

			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}


	public function getRateJudge($id)
	{
		try
		{

			$query = 'SELECT  t1.name,
								t1.lastname,
						        ( SELECT stars
									FROM rating_project_user
										WHERE id_project = :id AND id_user = t1.id_user) as rate
							FROM user as t1
						    WHERE t1.rol = 2';

			$conn = parent::admin();
			$stmt = $conn->prepare($query);

			$stmt->bindParam(':id', $id ,PDO::PARAM_INT);

			$stmt->execute();

			if( $stmt == true ){
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}

			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}

	public function getImages($id)
	{
		try
		{
				$query = 'SELECT *
							FROM project_img
								WHERE  id_project = :id_project';

				$conn = parent::admin();
				$stmt = $conn->prepare($query);
				//echo "si";

				//$pr = trim($proyectosRealizados);

				$stmt->bindParam(':id_project',$id,PDO::PARAM_INT);

				$stmt->execute();
				
				
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}

	public function stepOne($proyectosRealizados,$name)
	{
		try
		{
				$query = 'INSERT INTO project
							(id_usuario,category,name) 
							VALUES(:id_usuario,:category,:name)';
				$conn = parent::admin();
				$stmt = $conn->prepare($query);

				$pr = trim($proyectosRealizados);
				$nm = trim($name);

				session_start();
				$stmt->bindParam(':id_usuario', $_SESSION['id_user'],PDO::PARAM_INT);
				$stmt->bindParam(':category',$pr,PDO::PARAM_INT);
				$stmt->bindParam(':name',$nm,PDO::PARAM_STR);

				$stmt->execute();
				
				
				return $conn->lastInsertId();
			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}

	public function stepOneUpdate($id,$proyectosRealizados,$name)
	{
		try
		{
				$query = 'UPDATE project
							SET category = :category,
								name = :name

								WHERE  id_project = :id_project';

				$conn = parent::admin();
				$stmt = $conn->prepare($query);

				$pr = trim($proyectosRealizados);
				$nm = trim($name);

				session_start();
				$stmt->bindParam(':category', $pr,PDO::PARAM_INT);
				$stmt->bindParam(':id_project',$id,PDO::PARAM_INT);
				$stmt->bindParam(':name',$nm,PDO::PARAM_STR);

				$stmt->execute();
				
				
				return $id;
			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}

	public function stepTwo($id, $name, $pais, $ciudad, $end, $disil, $colaboradores, $arquitecto, $descripcion)
	{

		try
		{

				$query = 'UPDATE project
							SET name = :name,
								pais = :pais,
								ciudad = :ciudad,
								end = :end,
								disenador = :disil,
								colaboradores = :colaboradores,
								arquitecto = :arquitecto,
								descripcion = :descripcion
								WHERE  id_project = :id_project';

				$conn = parent::admin();
				$stmt = $conn->prepare($query);
				
				session_start();
				$stmt->bindParam(':id_project', $id,PDO::PARAM_STR);

				$stmt->bindParam(':name', $name,PDO::PARAM_STR);
				$stmt->bindParam(':pais', $pais,PDO::PARAM_STR);
				$stmt->bindParam(':ciudad', $ciudad,PDO::PARAM_STR);
				$stmt->bindParam(':end', $end,PDO::PARAM_STR);
				$stmt->bindParam(':disil', $disil,PDO::PARAM_STR);
				$stmt->bindParam(':colaboradores', $colaboradores,PDO::PARAM_STR);
				$stmt->bindParam(':arquitecto', $arquitecto,PDO::PARAM_STR);
				$stmt->bindParam(':descripcion', $descripcion,PDO::PARAM_STR);

				$stmt->execute();
				
				
				return true;
			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}


	public function stepThree($id, $fotografo, $video, $cred_video)
	{
		try
		{

				$query = 'UPDATE project
							SET fotografo = :fotografo,
								video = :video,
								cred_video = :cred_video

								WHERE  id_project = :id_project';

				$conn = parent::admin();
				$stmt = $conn->prepare($query);

				session_start();
				$stmt->bindParam(':fotografo',$fotografo,PDO::PARAM_STR);
				$stmt->bindParam(':video',$video,PDO::PARAM_STR);
				$stmt->bindParam(':cred_video',$cred_video,PDO::PARAM_STR);

				$stmt->bindParam(':id_project',$id,PDO::PARAM_INT);

				$stmt->execute();
				
				
				return true;
			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}


	public function stepFour($id,$video)
	{
		try
		{

				$query = 'UPDATE project
							SET video = :video

								WHERE  id_project = :id_project';

				$conn = parent::admin();
				$stmt = $conn->prepare($query);

				$vid = trim($video);

				session_start();
				$stmt->bindParam(':video',$vid,PDO::PARAM_STR);


				$stmt->bindParam(':id_project',$id,PDO::PARAM_INT);

				$stmt->execute();
				
				
				return true;
			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}

	public function addFileImagen($id_project,$url)
	{
		try
		{
				$query = 'INSERT INTO project_img(id_project,url,created_at) VALUES(:id_project,:url,:created_at)';
				$conn = parent::admin();
				$stmt = $conn->prepare($query);
				
				$now = date('Y-m-d H:i:s');

				$stmt->bindParam(':id_project',$id_project,PDO::PARAM_INT);
				$stmt->bindParam(':url',$url,PDO::PARAM_STR);	
				$stmt->bindParam(':created_at',$now,PDO::PARAM_STR);	
				$stmt->execute();
				
				return $conn->lastInsertId();
			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}


	public function deleteFileImagen($id)
	{
		try
		{
				$query = 'DELETE  FROM project_img WHERE id_img = :id';

				$conn = parent::admin();
				$stmt = $conn->prepare($query);


				$stmt->bindParam(':id', $id ,PDO::PARAM_INT);
				$stmt->execute();

				return true;
			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}



	public function getPdf($id)
	{
		try
		{
				$query = 'SELECT *
						  FROM project
						  WHERE  id_project = :id_project';

				$conn = parent::admin();
				$stmt = $conn->prepare($query);

				$stmt->bindParam(':id_project',$id,PDO::PARAM_INT);

				$stmt->execute();
				
				
				return $stmt->fetch(PDO::FETCH_ASSOC);
			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}


	public function updatePdf($pdf,$idProject)
	{
		try
		{
				$query = 'UPDATE project
							SET pdf = :pdf

								WHERE  id_project = :id_project';

				$conn = parent::admin();
				$stmt = $conn->prepare($query);

				$vid = trim($video);

				session_start();
				$stmt->bindParam(':pdf',$pdf,PDO::PARAM_STR);


				$stmt->bindParam(':id_project',$idProject,PDO::PARAM_INT);

				$stmt->execute();
				
				
				return true;
			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}


	public function setError($e)
	{

		$date = date("Y:m:d H:i:s");		
		$file = 'error_log.txt';
		$current = file_get_contents($file);
		$current .="Time: ";
		$current .= $date;
		$current .= "\r\n";
		$current .="Url: ";
		$current .= $_SERVER['REQUEST_URI'];				
		$current .= "\r\n";				
		$current .= "TypeError: ";
		$current .= $e;
		file_put_contents($file, $current);
			
	}	
}