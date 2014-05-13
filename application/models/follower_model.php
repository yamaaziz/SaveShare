<?php
class Follower_model extends CI_Model{

	public function __construct()
       {
            parent::__construct();
            // Your own constructor code
       }

	public function get_followersid($id) {
		$this->db->select("
			followers.follower_id,
			");

		$this->db->from('followers');
		$this->db->where('followers.user_id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_followingid($id) {
		$this->db->select("
			followers.user_id,
			");

		$this->db->from('followers');
		$this->db->where('followers.follower_id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_follower_username($id_array) {
		$resultat = array();
		$index = 0;
		$antal = count($id_array);
		if ($antal != 0) {
			foreach (range(0, $antal-1) as $whatever) {
    			$this->db->select("
				users.username
				");
	
				$this->db->from('users');
				$this->db->where('users.id', array_values(array_values($id_array)[$index])[0]);
				$query = $this->db->get();
					$subresultat = $query->result_array();
					array_push($resultat, $subresultat);
					$index = $index + 1;
					}
				}
		return $resultat;
		}

	public function get_following_username($id_array) {
		$resultat = array();
		$index = 0;
		$antal = count($id_array);
		if ($antal != 0) {
			foreach (range(0, $antal-1) as $whatever) {
    			$this->db->select("
				users.username
				");
	
				$this->db->from('users');
				$this->db->where('users.id', array_values(array_values($id_array)[$index])[0]);
				$query = $this->db->get();
					$subresultat = $query->result_array();
					array_push($resultat, $subresultat);
					$index = $index + 1;
					}
				}
		return $resultat;
		}
		
	public function unfollow($id, $profile_id) {
		$follow_data = array(
			'follower_id'	=>		$id,                    
			'user_id'		=>		$profile_id,
						);	
		$delete = $this->db->delete('followers', $follow_data);
		return $delete;
		}	
	
	
	public function follow($id, $profile_id) {
		$follow_data = array(
			'follower_id'	=>		$id,                    
			'user_id'		=>		$profile_id,
						);	
		$insert = $this->db->insert('followers', $follow_data);
		return $insert;
		}
}

/*End of file follower_model.php*/
/*Location: ./application/models/follower_model.php */