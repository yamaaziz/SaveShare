<?php
class User_model extends CI_Model{
	
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
		return $insert;
		
		//Skapa economy table
		
		
		//$this->db->where($essential);
		//$this->db->get('id');
		//$eid = $this->db->get('users');
		//$ecid = get_object_vars($eid);
		 
		//$economy = $this->db->query("INSERT INTO economy (e_id) VALUES ('".$ecid."')");
		  		 				
		//$this->db->set('e_id', $ecid['id']);  
		//$economy = $this->db->insert('economy');
		
		
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