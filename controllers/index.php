<?php

class Index extends Controller {

	function __construct() {
		parent::__construct();
	}
	
	function index() {
		//echo 'INSIDE INDEX INDEX'; 			*TESTER*
		$this->view->render('index/index'); // Renders text from the index/index in Views
	}
	
	function details() {
		$this->view->render('index/index');
	}
	
}