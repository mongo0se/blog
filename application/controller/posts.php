<?php
/**
 * Edit Post Page Controller
 * This is where we add and edit posts
 */
class Posts extends Controller {
	
	public $messages = array();
	public $errors = array();

	public function __construct($controller, $action) {

		// load core controller functions
		parent::__construct($controller, $action);

		// load post model
		$this->load_model('Post');
		
		// load user model
		$this->load_model('User');	
	}

	// edit form	
	public function edit($postId = null) {

		// if user not logged in 
		if (!(isset($_SESSION['USER']))) {
			
			/* 404 for now, but should be 403 */
			$this->error404();
		}

		// if post Id received
		if ($postId) {

			// get post data
			$post = $this->get_model('Post')->findById($postId);

			// if user not logged in 
			if (!$post) {
				
				// 404
				$this->error404();
			}

			// send post data to view
			$this->get_view()->set('post', $post);
			
		}
		
		// add messages and errors to view
		$this->get_view()->set('messages', $this->messages);
		$this->get_view()->set('errors', $this->errors);
		
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
	
	// display error 404
	public function error404() {
		
		/* @todo
		 * Move this functionality into its own helper, so one error method
		 * can take different error codes as an argument.
		 */
		
		// redirect user back to root directory
		header('Location: ' . PATH . '/errors');
	}
	
	// save post details
	public function save($postId = null) {
		
		// get data from form
		$formPost = $this->get_post();
		
		// get title
		$title = $this->validateString($formPost['title']);
		
		// get summary
		$summary = $this->validateString($formPost['summary']);
		
		// get body
		$body = $this->validateString($formPost['body']);
		
		// if no errors
		if (count($this->errors) == 0) {
			
			// updated post entry
			$updatedPost = array(
				'id' => $postId,
				'title' => $title,
				'summary' => $summary,
				'body' => $body 
			);
			
			// save data
			$post = $this->get_model('Post')->update($updatedPost);	
			
			// add success message to messages
			$this->messages[] = 'Saved Successfully.';
		
		}
		
		// send back to form
		$this->edit($postId);
	}
	
	// validate string
	private function validateString($string, $maxLength = 255) {
	
		// basic santisation
		$string = filter_var($string, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
		
		// if string is too long
		if (strlen($string) > $maxLength) {
			
			// append to errors
			$this->errors[] = 'Value is too long';
		}
		
		// if string is too short
		if (strlen($string) < 3) {
			
			// append to errors
			$this->errors[] = 'You need to enter more than three characters';
		}
		
		// return sanitised string
		return $string;
	}
}
