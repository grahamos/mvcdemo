<?php

class Help extends Controller {
	function __construct() {
		parent::__construct();
		echo "We are inside Help<br/>";
	}
	
	public function other($arg = false) {
		echo "We are inside other<br/>";
		echo 'Optional: ' . $arg;
		require 'models/help_model.php';
		$model = new Help_Model();
	}
}