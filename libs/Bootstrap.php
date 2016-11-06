<?php

class Bootstrap {
	public function __construct() {
		$url = isset($_GET['url']) ? $_GET['url'] : null; 			// Fixes no page to find error
		$url = rtrim($url, '/');
		$url  = explode('/', $url);
		
		//print_r ($url);
		
		if(empty($url[0])) {											// Mvc is now index
			require 'controllers/index.php';
			$controller = new Index();
			return false; 											// Prevents code below running
		}
		
		$file = 'controllers/' . $url[0] . '.php';
		if(file_exists($file)) {
			require $file;
		} else {
			require 'controllers/error.php';
			$controller = new Error();
		}
		
		$controller = new $url[0];
		
		if(isset($url[2])) {
			$controller->{$url[1]}($url[2]);
		} else {
			
		if(isset($url[1])) 
			$controller->{$url[1]}();
		}
	 }
}