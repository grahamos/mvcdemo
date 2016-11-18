<?php

class Login extends Controller {

	function __construct() {
		parent::__construct();	
	}
	
	function index() 
	{	// Renders the Submit, username, and password boxes from login/index in the views
		$this->view->render('login/index'); 
	}
	
	function run()
	{
		$this->model->run();
	}
	

}