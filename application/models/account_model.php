<?php
class Account_model extends CI_Model{
	
	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
	}

	public function login_user($username,$password){

		$this->db->where('username',$username);
		$result=$this->db->get('users');
		if($result->num_rows==1){
			$hash = $result->row(2)->password;
			
			if(password_verify($password,$hash)){
		
			return $result->row(0)->id;
			
			}
		}	
		else{
			return FALSE;
		}
		
		
	}
	
	public function create_user(){
		
		$optional = array(
			'birth_year'	=>		$this->input->post('birth_year'),                    
			'gender'		=>		$this->input->post('gender'),
			'city'			=>		$this->input->post('city'),
			'occupation'	=>		$this->input->post('occupation'),
			'income'		=>		$this->input->post('income')
			);
			
		$optional_clean = $this->set_NULL($optional);
		
		$essential = array(
		'username'		=>		$this->input->post('username'),
		'password'		=>		password_hash($this->input->post('password'), PASSWORD_DEFAULT),
		'email'			=>		$this->input->post('email')
		);
		
		$new_user = $essential+$optional_clean;			
		
		$insert = $this->db->insert('users', $new_user);
		
		
		//Skapa economy table
		
		//Hämta user id
		$this->db->select('users.id');
		$this->db->from('users');
		$this->db->where('username', $this->input->post('username'));
		$query = $this->db->get();
		if ($query->num_rows() == 1)
		{
			$this->economy_model->create_economy($query->row(0));
		}
		
		return $insert;
		}
		
	public function change_settings(){
	
		$id = $this->session->userdata('user_id');		
		$optional = array(
			'birth_year'	=>		$this->input->post('birth_year'),                    
			'gender'		=>		$this->input->post('gender'),
			'city'			=>		$this->input->post('city'),
			'occupation'	=>		$this->input->post('occupation'),
			'income'		=>		$this->input->post('income')
			);
			
		$optional_clean = $this->set_NULL($optional);
		
		$essential = array(
			'username'		=>		$this->input->post('username_'),
			//'password'		=>		password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'email'			=>		$this->input->post('email')
			);
		
		$user = $essential+$optional_clean;	
				
		$this->db->where('id', $id);
		$insert = $this->db->update('users', $user);
		
        return $insert;
	}
	
	//Save this function for later where you search for other users
	public function get_id($username){
	
		$this->db->select("users.id");
		$this->db->from('users');
		$this->db->where('users.id', $username);
		
		$query = $this->db->get();
			if ($query->num_rows() == 1) {
				return $query->row(0)->id;
				}
	}
	public function get_userdata($id) {
		$this->db->select("
			users.username,
			users.email,
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

	
	public function set_NULL($optional){
	
		foreach($optional as $key=>$value){
			if(empty($value)){
				$optional[$key] = NULL;
			}
		}
		return $optional;

	}
}
/*End of file account_model.php*/
/*Location: ./application/models/account_model.php */