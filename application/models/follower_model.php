<?php
//Save Share 2014
class Follower_model extends CI_Model{

	public function __construct()
       {
            parent::__construct();
            // Your own constructor code
       }

	public function get_followersdata($id) { /*detta är en ju en array.*/
		$this->db->select("
			followers.follower_id,
			");

		$this->db->from('followers');
		$this->db->where('followers.user_id', $id); /*Nu får man vilka som följer den som är inloggad.*/
		$query = $this->db->get();
		return $query->row();

	}

	public function get_followingdata($id) {
		$this->db->select("
			followers.user_id
			");

		$this->db->from('followers');
		$this->db->where('followers.follower_id', $id); /*Nu får man vilka den som är inloggad följer.*/
		$query = $this->db->get();
		return $query->row();

		}

	public function get_follower_username2($follower_id) {
		$this->db->select("
			users.username
			");

		$this->db->from('users');
		$this->db->where('users.id', array_values($follower_id)[0]);
		$query = $this->db->get();
			if ($query->num_rows() == 1) {
				return $query->row();
				}
	}

	public function get_following_username2($fuser_id) {
		$this->db->select("
			users.username
			");

		$this->db->from('users');
		$this->db->where('users.id', array_values($fuser_id)[0]);
		$query = $this->db->get();
			if ($query->num_rows() == 1) {
				return $query->row();
				}
	}
	
	public function count_followers($id) {
		$this->db->query('SELECT COUNT("follower_id") FROM followers WHERE follower_id = 3');
	/*här ska det vara nåt med rows.*/
	}
	
	public function count_followings($id) {
		$this->db->query('SELECT COUNT("user_id") FROM followers WHERE user_id = 3');
	/*här ska det vara nåt med rows.*/
	}
	}
/*End of file follower_model.php*/
/*Location: ./application/models/follower_model.php */