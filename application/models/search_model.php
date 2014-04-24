<?php
class Search_model extends CI_Model{
	
	public function __construct()
       {
            parent::__construct();
            // Your own constructor code
       }


public function adv_search(){		
			
			$username	=		$this->input->post('username');
			$age		=		$this->input->post('age');                    
			$gender		=		$this->input->post('gender');
			$city		=		$this->input->post('city');
			$occupation	=		$this->input->post('occupation');
			$income		=		$this->input->post('income');
                
	        $this->db->like('username', $username);
			//$this->db->where('birth_year', $birth_year);
			//$this->db->where('gender', $gender); 
			$this->db->like('city', $city);
			//$this->db->like('occupation', $occupation);
			//$this->db->like('income', $income); 
	
	        $this->db->select('id');
			$query = $this->db->get('users');

	        // Return the results.
	        return $query->row();
	    
	      }

}