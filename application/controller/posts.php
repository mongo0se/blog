<?php
/**
 * Edit Post Page Controller
 * This is where we add and edit posts
 */
class Posts extends Controller {

	public function __construct($controller, $action) {

		// load core controller functions
		parent::__construct($controller, $action);

		// load post model
		$this->load_model('Post');
		
		// load user model
		$this->load_model('User');	
	}

	// edit form	
	public function edit($postId) {

		// if user not logged in 
		if (!(isset($_SESSION['USER']))) {
			
			/* 404 for now, but should be 403 */
			$this->error404();
		}

		// get post data
		$post = $this->get_model('Post')->findById($postId);

		// if user not logged in 
		if (!$post) {
			
			// 404
			$this->error404();
		}

		// send post data to view
		$this->get_view()->set('post', $post);
		
		// Render view
		$this->get_view()->render('edit');
	}
	
	// view post
	public function view($postId) {
		
		// get posts
		$post = $this->get_model('Post')->findById($postId);	

		// if post does not exist
		if (!$post) {
			$this->error404();
		}

		// send post data to view
		$this->get_view()->set('post', $post);
		
		// Render view
		$this->get_view()->render('view');
	}
	
	public function error404() {
		header('Location: ' . PATH . '/errors');
	}
}
