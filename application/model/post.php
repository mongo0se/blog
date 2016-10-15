<?php

class Post extends Model {
	
	public function __construct() {
		// Load core model functions
		parent::__construct();
	}
	
	public function getAll() {

		// Return the database query using Mysqlidb database class
		$results = $this->db->query("SELECT id, title, body FROM posts");

		$posts = array();

		while ($row = $results->fetch_assoc()) {
			$posts[] = $row;
		}

		return $posts;
	}
	
	public function findById($id) {

		if (!$id) {
			return false;
		}

		// Return the database query using Mysqlidb database class
		$results = $this->db->query("SELECT id, title, body FROM posts WHERE id = {$id}");
		$row = $results->fetch_assoc();
		return $row;
	}
	
}
