<?php
//Save Share 2014
class Search_model extends CI_Model{

	public function __construct(){
		parent::__construct();
		// Your own constructor code
	}
	public function adv_search(){		

		$username	=	$this->input->post('username');
		$birth_year	=	$this->input->post('birth_year');
		$gender		=	$this->input->post('gender');
		$city		=	$this->input->post('city');
		$occupation	=	$this->input->post('occupation');
		$income		=	$this->input->post('income');
		
		$this->db->like('username', $username);
		if(!empty($this->input->post('gender'))){
			$this->db->like('gender', $gender);
		}
		if(!empty($this->input->post('city'))){
			$this->db->like('city', $city);
		}
		if(!empty($this->input->post('occupation'))){
			$this->db->like('occupation', $occupation);
		}
		 
		$this->db->select("
			users.id,
			users.username,
			users.birth_year,
			users.gender,
			users.city,
			users.occupation,
			users.income
			");
		$query = $this->db->get('users');
		
		if ($query->num_rows() > 0) {
			$query_array = $query->result_array();	
			return $query_array;
		}
	}

	public function search() {
		$username =	$this->input->post('search_data');
		$this->db->like('username', $username);		 
		$this->db->select('id');
		$query = $this->db->get('users');
		
		if ($query->num_rows() > 0) {
		
			$query = $query->row();
			$query_array = get_object_vars($query);	
			return $query_array['id'];			
		}
	}
	public function get_autocomplete($search_data) {
        $this->db->select('users.username');
        $this->db->select('users.city');
        $this->db->like('users.username', $search_data, 'after');
        return $this->db->get('users', 10);
    }
    public function get_autocompleteMessage($message_search){
    	$this->db->select('users.username');
    	$this->db->like('users.username', $message_search, 'after');
	    return $this->db->get('users', 10);
    }
}