<?php
/**
 * Contact Page Controller
 */
class Contact extends Controller {
	
	public function __construct($controller,$action) {

		// load core controller functions
		parent::__construct($controller, $action);

	}
	
	public function index() {

		// hard coded contact info
		$contactInfo = array(
			'email' => 'info@this-project.com',
			'tel' => '07920123456'		
		);
		
		// get user details
		$this->get_view()->set('contactInfo', $contactInfo);		
		
		// Render view
		$this->get_view()->render('contact');
	}
}
