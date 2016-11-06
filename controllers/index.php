<?php

/* A controller action returns something called an action result. An action result is what a controller action returns in response to a browser request.
 
 Controllers process incoming requests, handle user input and interactions, and execute appropriate application logic. A controller class typically calls a separate view component to generate the HTML markup for the request.
The base class for all controllers is the ControllerBase class, which provides general MVC handling. The Controller class inherits from ControllerBase and is the default implement of a controller. The Controller class is responsible for the following processing stages:

Locating the appropriate action method to call and validating that it can be called.
Getting the values to use as the action method's arguments.
Handling all errors that might occur during the execution of the action method.*/

class Index extends Controller {
	
	function __construct() {
		parent::__construct();
	}
	
	public function index() {
		echo 'INDEX INDEX INDEX';	
		$this->view->render('Index/index');  					 // Will require header & footer unless different instruction
	}
	
	public function details() {
		echo $this->view->render('Index/index');
	}
}
