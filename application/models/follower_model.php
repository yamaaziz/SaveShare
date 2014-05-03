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

	public function count_followings($id) { 
		$this->db->select("
			followers.follower_id
			");

		$this->db->from('followers');
		$this->db->where('followers.follower_id', $id);
		$query = $this->db->get();
		return $query->num_rows();
	}
	
	public function count_followers($id) { /*Man måste ju kolla hur många gånger man själv förekommer i motsatt kolumn*/
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
		/*return array_column($query, 'user_id');*/ /*mysql_fetch_array*/
		return $query->result_array(); /*Returnerar en array? eller array i array? eller array med nycklar?*/
	}

	public function get_followingid2($id) {
		$this->db->select("
			followers.user_id,
			");

		$this->db->from('followers');
		$this->db->where('followers.follower_id', $id);
		$query = $this->db->get();
		return $query->result_array(); /*Returnerar arrayer i arrayer?*/
	}

	public function get_follower_username2($id_array) { /*Denna ska kunna ta en array med index men nu tar den arrayer i arrayer.*/
		$resultat = array();
		$index = 0;
		$antal = count($id_array);
		foreach (range(0, $antal-1) as $whatever) {/*For index in range som i python. Behövs en till for-loop om det är arrayer i arrayer? nej för det */
    		$this->db->select("
			users.username
			");

			$this->db->from('users');
			$this->db->where('users.id', array_values(array_values($id_array)[$index])[0]);
			$query = $this->db->get();/*om den får flera träffar kanske det inte går. man kanke behöver en if-sats?*/
				$subresultat = $query->result_array();
				array_push($resultat, $subresultat);/*lägg resultatet längst bak i en array*/
				$index = $index + 1;
				}
		return $resultat;
		}

}

/*End of file follower_model.php*/
/*Location: ./application/models/follower_model.php */