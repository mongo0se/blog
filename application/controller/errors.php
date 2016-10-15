<?php
/**
 * Error Page
 */
class Errors extends Controller {
	
	public function __construct($controller, $action) {

		// load core controller functions
		parent::__construct($controller, $action);
		
	}
	
	public function index() {

		// 404
        $this->get_view()->set('error_code', 404);

		// Render view
		$this->get_view()->render('errors');
	}
}
