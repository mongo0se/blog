<?php
/**
 * Admin Login Form
 */
class Login extends Controller {
	
	public function __construct($controller,$action) {

		// load core controller functions
		parent::__construct($controller, $action);
		
		// lost user model
		$this->load_model('User');
	}

	// login form	
	public function index($errors = null) {
		
		// send to views
		$this->get_view()->set('errors', $errors);

		// Render view
		$this->get_view()->render('login');
	}

	// check details against database
	public function login() {

		$errors = array();
	
		// get post details
		$post = $this->get_post();
		
		// check against user table
		$user = $this->get_model('User')->checkUserCredentials($post['username'], $post['password']);	
	
		// if no credentials found
		if (!$user) {
			
			// error
			$errors[] = 'Invalid Username or Password.';
			
			// redirect to login page
			$this->index($errors);
			
		} else {
		
			// log user in
			$_SESSION['USER'] = $user;
			
			// redirect to homepage
			header('Location: '. PATH);
		}
	}
	
	// end session
	public function end() {
		
		// remove user from session
		unset($_SESSION['USER']);
		
		// send back to homepage
		header('Location: '. PATH);
	}
}
