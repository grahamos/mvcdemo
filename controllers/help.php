<?php

/* A controller action returns something called an action result. An action result is what a controller action returns in response to a browser request.
 
 Controllers process incoming requests, handle user input and interactions, and execute appropriate application logic. A controller class typically calls a separate view component to generate the HTML markup for the request.
The base class for all controllers is the ControllerBase class, which provides general MVC handling. The Controller class inherits from ControllerBase and is the default implement of a controller. The Controller class is responsible for the following processing stages:

Locating the appropriate action method to call and validating that it can be called.
Getting the values to use as the action method's arguments.
Handling all errors that might occur during the execution of the action method.*/

class Help extends Controller {
	function __construct() {
		parent::__construct();
	}
	
	public function index() {									// Custom controller so constuctor bypasses page call 
		$this->view->render('help/index');						// Renders the text from Views/Help index file
	}
	
	public function other($arg = false) {
		
		require 'models/help_model.php';
		$model = new Help_Model();								 // New help_model instance
		$this->view->blah = $model->blah();						// Calling blah() in help_model
	}
}