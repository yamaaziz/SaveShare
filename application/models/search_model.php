<?php
//Save Share 2014
class Search_model extends CI_Model{

	public function __construct(){
		parent::__construct();
		// Your own constructor code
	}
	public function adv_search(){		

		$username	=	$this->input->post('username');
		$age		=	$this->input->post('age');
		$gender		=	$this->input->post('gender');
		$city		=	$this->input->post('city');
		$occupation	=	$this->input->post('occupation');
		$income		=	$this->input->post('income');
		
		$this->db->like('username', $username);
		//$this->db->where('birth_year', $birth_year);
		//$this->db->where('gender', $gender); 
		//$this->db->or_like('city', $city);
		//$this->db->or_like('occupation', $occupation);
		//$this->db->or_like('income', $income);
		 
		$this->db->select('id');
		$query = $this->db->get('users');
		
		if ($query->num_rows() > 0) {
		
			$query = $query->row();
			$query_array = get_object_vars($query);	
			return $query_array['id'];
			
		}

	}
	
	public function search(){		

		$username	=	$this->input->post('search');
				
		$this->db->like('username', $username);		 
		$this->db->select('id');
		$query = $this->db->get('users');
		
		if ($query->num_rows() > 0) {
		
			$query = $query->row();
			$query_array = get_object_vars($query);	
			return $query_array['id'];			
		}
	}



}