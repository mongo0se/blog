<?php
/**
 * Home Page Controller
 */
class Home extends Controller {
	
	public function __construct($controller, $action) {

		// load core controller functions
		parent::__construct($controller, $action);

		// load post model
		$this->load_model('Post');
		
		// load user model
		$this->load_model('User');
	}
	
	// homepage
	public function index() {

		// show page 1
		$this->page();
	}
	
	// show page of results
	public function page ($pageNo = 0) {
		
		// default page size is 5
		$pageSize = 5;
		$this->get_view()->set('pageSize', $pageSize);		
		
		// get total
		$totalNo = count($this->get_model('Post')->getAll());
		$this->get_view()->set('total', $totalNo);	
		
		// pass current page no
		$this->get_view()->set('currentPage', $pageNo);		
		
		// number of pages
		$this->get_view()->set('totalPages', $totalNo / $pageSize);
		
		// starting position
		$start = $pageNo * $pageSize;
		
		// ending position
		$end = $start + $pageSize;
		
		// get range of results
		$posts = $this->get_model('Post')->getRange($start, $end);	

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
