<?php
/**
 * Class Database PDO
 *
 * @Author: ricardo_date@hotmail.com
 * License MIT
 * Copyright version 1.0
 * 23 Septiembre 2016
 *
 */
class Database
{
	/**
	 * Database Host
	 *
	 * @const DB_HOST
	 * @type string
	 */
	 
	const DB_HOST = 'localhost';
	
	/**
	 * Database Name
	 *	
	 * @const DB_NAME
	 * @type string
	 */
	 
	const DB_NAME = 'const_construlita_2017_1';

	/**
	 * Database db
	 *	
	 * @var db
	 * @type string
	 */	
	 
	public $db;
	
	/**
	 * Database Host
	 * @var dbUser
	 * @type string
	 */
	 
	private $dbUser = [
							'admin'=>[
										'user'=>'const_test',
										'password'=>'Xe)(3NV1ScL)'
										
									],
							'read'=>[
										'user'=>'',
										'password'=>''							
									],
							'writer'=>[
										'user'=>'',
										'password'=>''							
										]
							];
	
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
	
	/**
     *
	 * Writer
	 * Select, Update, Delete ..
	 * 
	 * @return object
	 */
	 
	protected function admin()
	{
		$username = $this->dbUser['admin']['user'];
		$password = $this->dbUser['admin']['password'];
		
		$connection = $this->connection($username,$password);
		return $connection;
		
	}
	
	/**
     *
	 * Connection
	 * 
	 * @param $username
	 * @param $password
	 * @return object PDO
	 */
	 
	 public function connection($username,$password)
	 {
		$this->db = new PDO('mysql:host='.self::DB_HOST.';dbname='.self::DB_NAME,$username,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		return $this->db;
		 
	 }
	 
	/*
	 * Destruct
	 * We need destruct connection
	 *
	 * @throw PDOException
	 * @return null or Exception
	 */
	 function __destruct(){
		 try{
			 $this->db = null;
		 }catch(PDOException $e){
			 
		 }
		 
	 }	 
	 
}