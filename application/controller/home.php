<?php
/**
 * Home Page Controller
 */
class Home extends Controller {
	
	public function __construct($controller,$action) {

		// load core controller functions
		parent::__construct($controller, $action);

		// load post model
		$this->load_model('Post');
		
		// load user model
		$this->load_model('User');
		
	}
	
	public function index() {

		// Load search page
		$this->home_page();
	}
	
	public function home_page()  {

		// get posts
		$posts = $this->get_model('Post')->getAll();	

		// send post data to view
		$this->get_view()->set('posts', $posts);

		// if logged in
		if (isset($_SESSION['USER'])) {
		
			// get user details
			$this->get_view()->set('user', $_SESSION['USER']);		
		}
		
		// Render view
		$this->get_view()->render('home');
	}
}
