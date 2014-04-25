<?php
class Economy_model extends CI_Model{
	
	public function __construct()
       {
            parent::__construct();
            // Your own constructor code
       }
       
    public function create_economy($data){
    	$data1 = get_object_vars($data);
    	$economy = array(
    		'e_id'				=>		$data1['id'],
			'funds'				=>		NULL,
			'shares'			=>		NULL,
			'bonds'				=>		NULL,
			'commodities'		=>		NULL,                    
			'properties'		=>		NULL,
			'saving_account'	=>		NULL,
			'other_savings'		=>		NULL,
			'housing_loan'		=>		NULL,
			'construction_loan'	=>		NULL,
			'private_loan'		=>		NULL,                    
			'student_loan'		=>		NULL,
			'senior_loan'		=>		NULL,
			'other_loan'		=>		NULL		
        );

		$insert = $this->db->insert('economy', $economy);
        return $insert;
	    
    }
	
	public function set_economy($id){
		
		$economy = array(
			'funds'				=>		$this->input->post('funds'),
			'shares'			=>		$this->input->post('shares'),
			'bonds'				=>		$this->input->post('bonds'),
			'commodities'		=>		$this->input->post('commodities'),                    
			'properties'		=>		$this->input->post('properties'),
			'saving_account'	=>		$this->input->post('saving_account'),
			'other_savings'		=>		$this->input->post('other_savings'),
			'housing_loan'		=>		$this->input->post('housing_loan'),
			'construction_loan'	=>		$this->input->post('construction_loan'),
			'private_loan'		=>		$this->input->post('private_loan'),                    
			'student_loan'		=>		$this->input->post('student_loan'),
			'senior_loan'		=>		$this->input->post('senior_loan'),
			'other_loan'		=>		$this->input->post('other_loan')		
        );
        
        $this->db->where('economy.e_id', $id);
		$insert = $this->db->update('economy', $economy);
        return $insert;
				     
	}
	
	
		public function get_economydata($id) {
		$this->db->select("
			economy.e_id,
			economy.funds,
			economy.shares,
			economy.bonds,
			economy.commodities,
			economy.properties,
			economy.saving_account,
			economy.other_savings,
			economy.housing_loan,
			economy.construction_loan,
			economy.private_loan,
			economy.student_loan,
			economy.senior_loan,
			economy.other_loan
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