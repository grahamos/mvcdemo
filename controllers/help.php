<?php

class Help extends Controller {

	function __construct() {
		parent::__construct();
	}
	
	function index() {  // Will render text from help/index in the views.
		$this->view->render('help/index'); 	
	}

	public function other($arg = false) { // *REDUNDENT?
		
		require 'models/help_model.php';
		$model = new Help_Model();
		$this->view->blah = $model->blah();
		
	}

}