<?php
//Save Share 2014
class Follower_model extends CI_Model{

	public function __construct()
       {
            parent::__construct();
            // Your own constructor code
       }

	public function get_followersdata($id) {
		$this->db->select("
			followers.follower_id,
			followers.user_id
			");

		$this->db->from('followers');
		$this->db->where('followers.user_id', $id); /*Nu får man vilka som följer den som är inloggad.*/
		$query = $this->db->get();
			if ($query->num_rows() == 1) {
				return $query->row();
				}
	}

	public function get_followingdata($id) {
		$this->db->select("
			followers.follower_id,
			followers.user_id
			");

		$this->db->from('followers');
		$this->db->where('followers.follower_id', $id); /*Nu får man vilka den som är inloggad följer.*/
		$query = $this->db->get();
			if ($query->num_rows() == 1) {
				return $query->row();
				}
		}
		
	public function get_follower_username($id) {
		$this->db->select("
			users.username
			");

		$this->db->from('users');
		$this->db->where('users.id', $id);
		$this->db->where('followers.follower_id', $id);
		$query = $this->db->get();
			if ($query->num_rows() == 1) {
				return $query->row();
				}
	}
	
	public function get_following_username($id) {
		$this->db->select("
			users.username
			");

		$this->db->from('users');
		$this->db->where('users.id', $id);
		$this->db->where('followers.user_id', $id);
		$query = $this->db->get();
			if ($query->num_rows() == 1) {
				return $query->row();
				}
	}
	}
/*End of file follower_model.php*/
/*Location: ./application/models/follower_model.php */