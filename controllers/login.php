<?php

class Login extends Controller {

	function __construct() {
		parent::__construct();	
	}
	
	function index() 
	{	// Renders the Submit, username, and password boxes from login/index in the views
		echo HASH::create('md5', 'test', HASH_PASSWORD_KEY);
		$this->view->render('login/index'); 
	}
	
	function run()
	{
		$this->model->run();
	}
	

}