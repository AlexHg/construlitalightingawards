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
class Optimize extends Database
{
	
	public function upload($path,$width,$height)
	{
		$kraken = new Kraken("1be6fad861cd118d7e7f21e46f1bed96", "84930be2c0055aef7c89d6e1a383fbc40bca8807");

		$params = array(
		    "url" => $path,
		    "wait" => true,
		    "resize" => array(
		        "width" => $width,
		        "height" => $height,
		        "strategy" => "auto"
		    ),
		    "lossy" => true,
		);

		$data = $kraken->url($params);
		$result = "";

		if ($data["success"]) {
		    $result = [ 'status'=> true, 'url' => $data["kraked_url"] ];
		} else {
		    $result = [ 'status' => false, 'message' => $data["message"] ];
		}

		return $result;
	}

	public function downloadImagen($url,$dest,$file)
	{
		$source = file_get_contents($url);
		file_put_contents("$dest/$file", $source);

		return "$dest/$file";
	}

	
}