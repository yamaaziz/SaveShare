<?php
class Profile_model extends CI_Model{
	
	public function __construct()
       {
            parent::__construct();
            // Your own constructor code
       }
       
	public function get_userdata($id) {
		$this->db->select("
			users.birth_year,
			users.gender,
			users.city,
			users.occupation,
			users.income
			");

		$this->db->from('users');
		$this->db->where('users.id', $id);
		$query = $this->db->get();
			if ($query->num_rows() == 1) {
				return $query->row();
				}
	}
}
