<!--A model is an object representing data or even activity, e.g. a database table or even some plant-floor production-machine process.-->

<?php

class Help_Model extends Model {
	public function __construct() {
		echo 'Help model';
	}
	
	public function blah() {
		return 10 + 10;
	}
}