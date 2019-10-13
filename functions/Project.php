<?php 
require_once "Database.php";

/*
	 *
	 * @param lastinsertId
	 *
	 */


class Project extends Database
{

	public function __construct(){}

	public function createProject($pathP)
	{
		if(isset($_POST['prorealizados'],$_POST['nomproyecto'],$_POST['usoinmueble'],$_POST['tipobra'],$_POST['finalobra'],$_POST['disenadorilumi'],$_POST['dirproyecto'],$_POST['colaboradores'],$_POST['proyectoarq'],$_POST['fotografo']) && $_POST['prorealizados'] != "" && $_POST['nomproyecto'] !="" && $_POST['usoinmueble']!="" && $_POST['tipobra']!="" && $_POST['finalobra']!="" && $_POST['disenadorilumi']!="" && $_POST['dirproyecto']!="" && $_POST['colaboradores']!="" && $_POST['proyectoarq']!="" && $_POST['fotografo']!=""){
		
				return $this->insertProject($pathP,$_POST[''],$_POST['prorealizados'],$_POST['nomproyecto'],$_POST['usoinmueble'],$_POST['tipobra'],$_POST['finalobra'],$_POST['disenadorilumi'],$_POST['dirproyecto'],$_POST['colaboradores'],$_POST['proyectoarq'],$_POST['fotografo']);

		}else{
			return false;
		}



     }




     	public function insertProject($pathP,$category,$name_project,$inmueble,$type,$final_date,$designer,$direction,$members,$projects_by,$photo)
	{
		try
		{
				$query = 'INSERT INTO project
							(time_save,category,name_project,inmueble,type_work,final_date,designer,direction,members,project_by,photographer,path_project) 
							VALUES(:time_save,:category,:name_project,:inmueble,:type_work,:final_date,:designer,:direction,:members,:project_by,:photographer,:path_project)';
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
				$stmt->bindParam(':path_project',$pathP ,PDO::PARAM_STR);	

				$stmt->execute();
				
				
				return $conn->lastInsertId();
			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
		
		
		
			}

/*
 * Get project by User
 * @param String token_session
 * @return array
 *
 */

	public function getProjects($token)
	{
		try
		{
				$query = 'SELECT * FROM project where id_usuario = :id_usuario AND status = 1';
				$conn = parent::admin();
				$stmt = $conn->prepare($query);

				$stmt->bindParam(':id_usuario', $_SESSION['id_user'],PDO::PARAM_INT);
				$stmt->execute();

				
				if( $stmt ==  true ){
					return $stmt->fetchAll(PDO::FETCH_ASSOC);		
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
	public function getProjectByUs($id)
	{
		try
		{
				$query = 'SELECT * FROM project where token_session = :token_session AND status = :status AND id_project = :id';
				$conn = parent::admin();
				$stmt = $conn->prepare($query);

				$status = 0;
				$stmt->bindParam(':token_session', $_SESSION["token_session"],PDO::PARAM_STR);
				$stmt->bindParam(':status', $status,PDO::PARAM_INT);
				$stmt->bindParam(':id', $id,PDO::PARAM_STR);
				$stmt->execute();


				
				if( $stmt ==  true ){
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


	public function getProjectByUsConf($id)
	{
		try
		{
				$query = 'SELECT * FROM project where id_usuario = :id_usuario AND status = :status AND id_project = :id';
				$conn = parent::admin();
				$stmt = $conn->prepare($query);

				$status = 1;
				session_start();
				$stmt->bindParam(':id_usuario', $_SESSION["id_user"],PDO::PARAM_STR);
				$stmt->bindParam(':status', $status,PDO::PARAM_INT);
				$stmt->bindParam(':id', $id,PDO::PARAM_STR);
				$stmt->execute();

				if( $stmt ==  true ){
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

	public function getProjectAdmin($id)
	{
		try
		{
				$query = 'SELECT * FROM project where id_project = :id';
				$conn = parent::admin();
				$stmt = $conn->prepare($query);

				$stmt->bindParam(':id', $id,PDO::PARAM_STR);
				$stmt->execute();

				if( $stmt ==  true ){
					return $stmt->fetch(PDO::FETCH_ASSOC);		
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

	public function getScoreProjectAdmin($id)
	{
		try
		{
				$query = 'SELECT * FROM rating_project_user where id_project = :id';
				$conn = parent::admin();
				$stmt = $conn->prepare($query);

				$stmt->bindParam(':id', $id,PDO::PARAM_STR);
				$stmt->execute();

				if( $stmt ==  true ){
					return $stmt->fetch(PDO::FETCH_ASSOC);		
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

	public function getProjectByUsConff($id)
	{
		try
		{
				$query = 'SELECT * FROM project where status = :status AND id_project = :id';
				$conn = parent::admin();
				$stmt = $conn->prepare($query);

				$status = 1;
				
				$stmt->bindParam(':status', $status,PDO::PARAM_INT);
				$stmt->bindParam(':id', $id,PDO::PARAM_STR);
				$stmt->execute();

				if( $stmt ==  true ){
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

}