<?php
//GMAN
class Bootstrap {
	public function __construct() {
		$url = isset($_GET['url']) ? $_GET['url'] : null; 			// Fixes no page to find error
		$url = rtrim($url, '/');
		$url  = explode('/', $url);
		
		//print_r ($url);
		
		if(empty($url[0])) {											// Mvc is now index
			require 'controllers/index.php';
			$controller = new Index();
			$controller->index();				// Call index method for Custom controller so constuctor bypasses page call 
			return false; 											// Prevents code below running
		}
		
		$file = 'controllers/' . $url[0] . '.php';					
		if(file_exists($file)) {
			require $file;
		} else {
			require 'controllers/error.php';							// Get error.php file from controllers
			$controller = new Error();								// New instance will render msg from errors/index.php
		}
		
		$controller = new $url[0];
		
		// Calling methods
		if(isset($url[2])) {
			if(method_exists($controller, $url[1])) {
				$controller->{$url[1]}($url[2]);
			} else {
				echo 'errr';
			}
		} else {
			
			if(isset($url[1])) {
			$controller->{$url[1]}();
			} else {
				$controller->index();
			}
		}
	}
}