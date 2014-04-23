<?php
class Economy_model extends CI_Model{
	
	public function __construct()
       {
            parent::__construct();
            // Your own constructor code
       }

	
	public function set_economy($id){
		
		$economy = array(
			'e_id'				=>		$id,
			'total_savings'		=>		$this->input->post('total_savings'),
			'funds'				=>		$this->input->post('funds'),
			'shares'			=>		$this->input->post('shares'),
			'bonds'				=>		$this->input->post('bonds'),
			'commodities'		=>		$this->input->post('commodities'),                    
			'properties'		=>		$this->input->post('properties'),
			'saving_account'	=>		$this->input->post('saving_account'),
			'other_savings'		=>		$this->input->post('other_savings'),
			'total_liabilities' =>		$this->input->post('total_liabilities'),
			'housing_loan'		=>		$this->input->post('housing_loan'),
			'construction_loan'	=>		$this->input->post('construction_loan'),
			'private_loan'		=>		$this->input->post('private_loan'),                    
			'student_loan'		=>		$this->input->post('student_loan'),
			'senior_loan'		=>		$this->input->post('senior_loan'),
			'other_liabilities'	=>		$this->input->post('other_liabilities')		
        );
        
        //Make NULL values
        $insert = $this->db->update('economy', $economy);
        return $insert;
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
/*End of file economy_model.php*/
/*Location: ./application/models/economy_model.php */