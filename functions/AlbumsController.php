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
class Albums extends Database
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
	 * Gets all categories for carousel
	 * @return array or false
	 *
	 */
	
	public function getAllCategories()
	{
		try
		{
				$query = 'SELECT idcategorias as id_Cat, categoryname as label, categorynumber as OrderCategory, categorysort as sort FROM categorias ORDER BY sort ';
				$conn = parent::admin();
				$stmt = $conn->prepare($query);
				
				$stmt->execute();
				
				$rows = $stmt->FetchAll(PDO::FETCH_ASSOC);
				$counts = $stmt->rowCount();
				if($counts > 0)
				{
					return $rows;
				}
				else{
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
	 * Gets all albums of 
	 * @return array or false
	 *
	 */
	 
	public function getAllAlbums($id)
	{
		try
		{
				$query = 'SELECT t1.idalbums as id_album, t1.albumname as name_album, t1.album as name,t1.description, t1.categorynumber as id_category, t2.categoryname
						FROM albums as t1
						LEFT JOIN categorias as t2
						on t2.categorynumber = t1.categorynumber
						WHERE t1.categorynumber =:id_category ';
				$conn = parent::admin();
				$stmt = $conn->prepare($query);
				$stmt->bindParam(':id_category', $id,PDO::PARAM_INT);	
				$stmt->execute();
				
				$rows = $stmt->FetchAll(PDO::FETCH_ASSOC);
				$counts = $stmt->rowCount();
				if($counts > 0)
				{
					return $rows;
				}
				else{
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
	 * Gets all albums of 
	 * @return array or false
	 *
	 */
	 
	public function getInfoAlbum($id)
	{
		try
		{
				$query = 'SELECT album as name, albumname as dirsecondary, description, categorynumber as dirmain FROM albums WHERE idalbums = :id';
				$conn = parent::admin();
				$stmt = $conn->prepare($query);
				$stmt->bindParam(':id', $id,PDO::PARAM_INT);	
				$stmt->execute();
				
				$rows = $stmt->FetchAll(PDO::FETCH_ASSOC);
				$counts = $stmt->rowCount();
				if($counts > 0)
				{
					return $rows;
				}
				else{
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
	 * Gets first image of folder
	 * @return string
	 *
	 */

	function getFirstImage($ruta)
	{
		if (is_dir($ruta))
		{
			// Abrimos el directorio y comprobamos que
			if ($aux = opendir($ruta))
			{
				$contador=0;
				while (($archivo = readdir($aux)) !== false)
				{
					if ($archivo!="." && $archivo!="..")
					{
					  $imagenes[$contador]= $archivo;
					  $contador++;						  
					}
					else{
					}
				}
				return $imagenes;
				closedir($aux);
			}
			else{
				return false;
			}
		}
		else
		{
		   return false;
		}
	}


	function get_dir($ruta){ 
	   // abrir un directorio y listarlo recursivo 
	   if (is_dir($ruta)) { 
	      if ($dh = opendir($ruta)) { 
	         while (($file = readdir($dh)) !== false) { 
	            //esta línea la utilizaríamos si queremos listar todo lo que hay en el directorio 
	            //mostraría tanto archivos como directorios 
	            //echo "<br>Nombre de archivo: $file : Es un: " . filetype($ruta . $file); 
	            if (is_dir($ruta . $file) && $file!="." && $file!=".."){ 
	               //solo si el archivo es un directorio, distinto que "." y ".." 
	               echo "<br>Directorio: $ruta$file"; 
	               listar_directorios_ruta($ruta . $file . "/"); 
	            } 
	         } 
	      closedir($dh); 
	      } 
	   }else 
	      echo "<br>No es ruta valida"; 
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