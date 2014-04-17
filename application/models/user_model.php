<?php
class User_model extends CI_Model{
	
	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
	}

	public function login_user($username,$password){

		//GET HASH FROM DB
		$this->db->where('username',$username);
		//$this->db->get('users');
		$result=$this->db->get('users');
		if($result->num_rows==1){
			$hash = $result->row(2)->password;
			
			if(password_verify($password,$hash)){
		
			//hämta user_ID och returnera det
			return $result->row(0)->id;
			//return TRUE;
			}
		}
		//$p_hash = '$2y$10$KFfo3wt7W9TQD.L4VhrH2.oZpZ379APLQE8AD.3lAmcXUpm0duQy2';
		//PASS ON HASH AND PLAINTEXT PASSWORD TO P_VERIFICATION
		
		else{
			return FALSE;
		}
		
		//Validate credentials
		/*$this->db->where('username',$username);
		$this->db->where('password',$password);
		
		$result = $this->db->get('users');
		if($result->num_rows()==1){
			return $result->row(0)->id; //kolla upp row(0)
		}*/
		
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
		'email'			=>		$this->input->post('email'),
		);
		
		$new_user = $essential+$optional_clean;
			
		$insert = $this->db->insert('users', $new_user);
		
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
/*End of file user_model.php*/
/*Location: ./application/models/user_model.php */