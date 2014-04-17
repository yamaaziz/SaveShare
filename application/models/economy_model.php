<?php
class Economy_model extends CI_Model{
	
	public function __construct()
       {
            parent::__construct();
            // Your own constructor code
       }

	
	public function set_economy(){
		
		$economy = array(
			'e_id'				=>		$this->session->userdata('user_id'),
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
        $insert = $this->db->insert('economy', $economy);
        return $insert;
	}
		
}
/*End of file table_model.php*/
/*Location: ./application/models/table_model.php */