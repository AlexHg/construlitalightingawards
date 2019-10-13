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
class Judge extends Database
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


	/*
	 *
	 * route update or insert stars
	 * @param int
	 * @param int
	 * @param int
	 *
	 */
	 
	public function routeStars($id_project,$stars,$id_user,$matriz,$comments)
	{

		$find = $this->findStars($id_project,$id_user);
		if($find != false){

			$result = $this->updateStars($find['id_rating'],$id_user,$stars,$matriz,$comments);
			
		}else{

			$result = $this->setStars($id_project,$id_user,$stars,$matriz,$comments);

		}

		return $result;
	}


	/*
	 *
	 * Find stars
	 * @param int
	 * @param int
	 * @param int
	 *
	 */
	 
	public function findStars($id_project,$id_user)
	{
		try
		{
				$query = 'SELECT * FROM rating_project_user WHERE id_project = :id_project  AND id_user = :id_user';
				$conn = parent::admin();
				$stmt = $conn->prepare($query);

				$stmt->bindParam(':id_project',$id_project, PDO::PARAM_INT);
				$stmt->bindParam(':id_user', $id_user ,PDO::PARAM_INT);

				$stmt->execute();
				
				$count = $stmt->rowCount();
				
				if($count > 0 ){

					return $stmt->fetch(PDO::FETCH_ASSOC);;

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
	 * New star judge
	 * @param int
	 * @param int
	 * @param int
	 *
	 */
	 
	public function setStars($id_project,$id_user,$stars,$matriz,$comments)
	{
		try
		{
				$query = 'INSERT INTO rating_project_user
							(id_project,matriz,id_user,stars,comments,time_register) 
							VALUES(:id_project,:matriz,:id_user,:stars,:comments,:time_register)';
				$conn = parent::admin();
				$stmt = $conn->prepare($query);

				$now = date('Y-m-d H:i:s');

				$stmt->bindParam(':id_project',$id_project, PDO::PARAM_INT);
				$stmt->bindParam(':id_user', $id_user ,PDO::PARAM_INT);
				$stmt->bindParam(':stars',$stars ,PDO::PARAM_INT);
				$stmt->bindParam(':comments',$comments ,PDO::PARAM_STR);
				$stmt->bindParam(':time_register',$now ,PDO::PARAM_STR);
				$stmt->bindParam(':matriz',$matriz );

				$stmt->execute();
				
				
				
				if($stmt ==  true){

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
	 * Update star judge
	 * @param int
	 * @param int
	 * @param int
	 *
	 */
	 
	public function updateStars($id_rating,$id_user,$stars,$matriz,$comments)
	{
		try
		{
				$query = 'UPDATE rating_project_user
							SET stars = :stars,
								time_register = :time_register,
								comments = :comments,
								matriz = :matriz
							WHERE id_rating = :id_rating AND id_user = :id_user';
				$conn = parent::admin();
				$stmt = $conn->prepare($query);

				$now = date('Y-m-d H:i:s');

				$stmt->bindParam(':stars',$stars, PDO::PARAM_INT);
				$stmt->bindParam(':id_rating', $id_rating ,PDO::PARAM_INT);
				$stmt->bindParam(':id_user',$id_user ,PDO::PARAM_INT);
				$stmt->bindParam(':time_register',$now ,PDO::PARAM_STR);
				$stmt->bindParam(':comments',$comments ,PDO::PARAM_STR);
				$stmt->bindParam(':matriz',$matriz );

				$stmt->execute();
				
				$count = $stmt->rowCount();
				
				if($count > 0){

					return true;

				}else{

					return false;

				}
				return $conn->lastInsertId();
			
			
		}
		catch(PDOException $e)
		{
			var_dump($e);
			//$this->setError($e);
		}
	}

	public function getSt($id_project)
	{
		try
		{
				$query = 'SELECT * FROM rating_project_user WHERE id_project = :id_project  AND id_user = :id_user';
				$conn = parent::admin();
				$stmt = $conn->prepare($query);

				session_start();
				$stmt->bindParam(':id_project',$id_project, PDO::PARAM_INT);
				$stmt->bindParam(':id_user', $_SESSION['id_user'] ,PDO::PARAM_INT);

				$stmt->execute();
				
				$count = $stmt->rowCount();
				
				if($count > 0 ){

					return $stmt->fetch(PDO::FETCH_ASSOC);;

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