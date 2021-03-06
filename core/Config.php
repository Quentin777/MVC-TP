<?php
namespace Core; // Initialise autoloader.php dans le dossier Core qui contient toutes les classes.
/**
* class pour la configuration du site
*/

class Config
{
	private static $_instance;
	private $settings = [];

	public static function getInstance($file){
		if(is_null(self::$_instance)){
			self::$_instance = new Config($file);
		}
		return self::$_instance;
	}
	
	public function __construct($file){
		$this->settings = require($file);
	}

	public function get($key){
		if (!isset($this->settings[$key])){
			return null;
		}
		return $this->settings[$key];
	}
}