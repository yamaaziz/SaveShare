<?php
class Follower_model extends CI_Model{

	public function __construct()
       {
            parent::__construct();
            // Your own constructor code
       }

/*ENSKILDA VÄRDEN*/

	public function get_followersid($id) { /*detta är en ju en array.*/
		$this->db->select("
			followers.follower_id,
			");

		$this->db->from('followers');
		$this->db->where('followers.user_id', $id); /*Nu får man vilka som följer den som är inloggad, men de måste läggas i en array?*/
		$query = $this->db->get();
		return $query->row(); /*Denna kanske bara tar första raden?*/
	}

	public function get_followingid($id) { 
		$this->db->select("
			followers.user_id
			");

		$this->db->from('followers');
		$this->db->where('followers.follower_id', $id); /*Nu får man vilka den som är inloggad följer.*/
		$query = $this->db->get();
		return $query->row();
	}

	public function get_follower_username($follower_id) { /*Dessa funktioner kan bara ta en användare i taget, men det är nog ok.*/
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

	public function get_following_username($fuser_id) {
		$this->db->select("
			users.username
			");

		$this->db->from('users');
		$this->db->where('users.id', array_values($fuser_id)[0]); /*En array med bara ett värde i.*/
		$query = $this->db->get();
			if ($query->num_rows() == 1) {
				return $query->row();
				}
	}

	public function count_followers($id) {
		$this->db->select("
			followers.follower_id
			");

		$this->db->from('followers');
		$this->db->where('followers.follower_id', $id);
		$query = $this->db->get();
		return $query->num_rows();
	}
	
	public function count_followings($id) {
		$this->db->select("
			followers.user_id
			");

		$this->db->from('followers');
		$this->db->where('followers.user_id', $id);
		$query = $this->db->get();
		return $query->num_rows();
	}
/*ARRAY*/
	public function get_followersid2($id) {
		$this->db->select("
			followers.follower_id,
			");

		$this->db->from('followers');
		$this->db->where('followers.user_id', $id);
		$query = $this->db->get();
		return $query->result_array(); /*Returnerar en array? eller array i array? eller array med nycklar?*/
	}

	public function get_followingid2($id) {
		$this->db->select("
			followers.user_id,
			");

		$this->db->from('followers');
		$this->db->where('followers.follower_id', $id);
		$query = $this->db->get();
		return $query->result_array(); /*Returnerar en array?*/
	}
	
	public function get_follower_username2($result_array) { /*Denna ska kunna ta en array.*/
		$resultat = array();
		foreach (range(0, count($result_array)) as $index) {  /*For index in range som i python.*/
    		$this->db->select("
			users.username
			");

		$this->db->from('users');
		$this->db->where('users.id', array_values($result_array)[$index]);
		$query = $this->db->get();
		$subresultat = $query->row();
		array_push($resultat, $subresultat); /*lägg resultatet längst bak i en array*/
		return $resultat;
		}
	}
}
/*End of file follower_model.php*/
/*Location: ./application/models/follower_model.php */