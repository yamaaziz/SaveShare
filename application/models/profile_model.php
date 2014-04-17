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
	
	public function get_economydata($id) {
		$this->db->select("
			economy.e_id,
			economy.total_savings,
			economy.funds,
			economy.shares,
			economy.bonds,
			economy.commodities,
			economy.properties,
			economy.saving_account,
			economy.other_savings,
			economy.total_liabilities,
			economy.housing_loan,
			economy.construction_loan,
			economy.private_loan,
			economy.student_loan,
			economy.senior_loan,
			economy.other_liabilities
			");
		
		$this->db->from('economy');
		$this->db->where('economy.e_id', $id);
		$query = $this->db->get();
			if ($query->num_rows() == 1) {
				return $query->row();
				}
	}
}
