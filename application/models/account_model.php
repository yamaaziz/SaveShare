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
		
		//Kalla på user model
		
		//returnera värden
		
		return $insert;
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