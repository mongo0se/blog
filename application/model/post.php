<?php

class Post extends Model {
	
	public function __construct() {
		// Load core model functions
		parent::__construct();
	}
	
	// get all post entries
	public function getAll() {

		// Return the database query using Mysqlidb database class
		$results = $this->db->query("SELECT id, title, summary, body FROM posts");

		$posts = array();

		while ($row = $results->fetch_assoc()) {
			$posts[] = $row;
		}

		return $posts;
	}
	
	// get a range of results
	public function getRange($start, $stop) {

		// Return the database query using Mysqlidb database class
		$results = $this->db->query("SELECT id, title, summary, body FROM posts WHERE id > ".$start." AND id <= ".$stop);

		$posts = array();

		while ($row = $results->fetch_assoc()) {
			$posts[] = $row;
		}

		return $posts;
	}
	
	// find post entry by id
	public function findById($id) {

		// if no id passed to method
		if (!$id) {
			
			// abort
			return false;
		}

		// Return the database query using Mysqlidb database class
		$results = $this->db->query("SELECT id, title, summary, body FROM posts WHERE id = {$id}");
		$row = $results->fetch_assoc();
		return $row;
	}
	
	// update post table with new data
	public function update($post) {
		
		// if updating existing record
		if ($post['id']){ 
			
			// update
			$this->db->query("UPDATE posts SET title = '".$post['title']."', summary = '".$post['summary']."', body = '".$post['body']."' WHERE id = '".$post['id']."'");
        } else {
			
			// insert
			$this->db->query("INSERT INTO posts (`title`,`body`, `summary`) VALUES ('".$post['title']."','".$post['body'].", ".$post['summary']."')");
		
			// redirect user to their new masterpiece
			header('Location: ' . PATH . '/posts/view/' .  $this->db->insert_id);
		}
		
		// return true
		return true;
	}
}
