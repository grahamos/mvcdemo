<?php

class Error extends Controller {
	public function __construct() {
		parent::__construct();
		echo 'This is an error<br/>';
		
		$this->view->msg = 'This page dosent exist';
		$this->view->render('errors/index');
		
	}
}