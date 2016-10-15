<?php

class User extends Model {
	
	public function __construct() {
		// Load core model functions
		parent::__construct();
	}
	
	public function getAll() {

		// Return the database query using Mysqlidb database class
		$results = $this->db->query("SELECT id, email, password_hash FROM users");

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
		$results = $this->db->query("SELECT id, email, password_hash FROM users WHERE id = {$id}");
		$row = $results->fetch_assoc();
		return $row;
	}
	
	/**
	 * Check user Credentials
	 */
	public function checkUserCredentials($username, $password) {
		
		// if empty username or password
		if (empty($username) || empty($password)) {
			
			// abort
			return false;
		}
		
		// for each user on record
		foreach ($this->getAll() as $user) {
			
			// user found
			if (strtolower($username) == strtolower($user['email'])) {
				
				// check password
				if (sha1($password) == $user['password_hash']) {
					
					// password correct
					return $user;
				}
			}
		}
	}
}
