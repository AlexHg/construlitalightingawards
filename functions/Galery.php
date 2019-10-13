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
class Galery extends Database
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
	 * get routes images
	 * @param String
	 * @return array or false
	 */

	function getFiles($ruta)
	{

		if (is_dir($ruta))
		{
			if ($aux = opendir($ruta))
			{
				
				$imgs = [];
				while (($archivo = readdir($aux)) !== false)
				{
					
					if ($archivo!="." && $archivo!="..")
					{
					  
					   $archivo."<br>";
					  if($pos === false ){
					  }
					  else{
							
							$imgs[] = $archivo;	
					  }					  
					}
					else{
					}
				}
				closedir($aux);
				return $imgs;
			}
		}
		else
		{
		   return $result = 0;
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