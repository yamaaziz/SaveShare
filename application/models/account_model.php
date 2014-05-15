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
		'email'			=>		$this->input->post('email'),
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
			$this->account_model->create_privacy($query->row(0));
		}
		
		return $insert;
		}	
	
	public function change_profile_settings(){
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

	public function change_security_settings($new_password, $id){
		$new_password_hash = array('password'	=>	password_hash($new_password, PASSWORD_DEFAULT));
		$this->db->where('id', $id);
		$insert = $this->db->update('users', $new_password_hash);
		
		return $insert;
	}
	
	public function change_privacy_settings() {
		$id = $this->session->userdata('user_id');		
		$optional = array(
			'p_gender'		=>		$this->input->post('birth_year'),                    
			'p_age'			=>		$this->input->post('gender'),
			'p_city'		=>		$this->input->post('city'),
			'p_occupation'	=>		$this->input->post('occupation'),
			'p_income'		=>		$this->input->post('income'),
			'p_savings'		=>		$this->input->post('savings'),
			'p_lias'		=>		$this->input->post('lias'),
			'p_dsavings'	=>		$this->input->post('savings_cart'),
			'p_dlias'		=>		$this->input->post('lias_chart'),
			'p_following'	=>		$this->input->post('following'),
			'p_search'		=>		$this->input->post('search')
			);

		//$optional_clean = $this->set_NULL($optional);	
		//$optional_clean = $this->update($optional, 2);
				
		$this->db->where('p_id', $id);
		$insert = $this->db->update('privacy', $optional);
		
        return $insert;
	}
	
	//Save this function for later where you search for other users
	//säg till Johanna om dessa flyttas, då ska vägen i profile-funktionerna ändras också
	public function get_id($username){
	
		$this->db->select("users.id");
		$this->db->from('users');
		$this->db->where('users.username', $username);
		
		$query = $this->db->get();
			if ($query->num_rows() == 1) {
				return $query->row(0)->id;
				}
	}

	public function find_email($email){
		$this->db->select("users.email, users.id");
		$this->db->from('users');
		$this->db->where('users.email', $email);
		$query = $this->db->get();
			if ($query->num_rows() == 1) {
				$query = $query->row();
				$query_array = get_object_vars($query);	
				return $query_array;
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
 	
 	public function get_privacy_data($id) {
 		$this->db->select("
 			privacy.p_id,
 			privacy.p_age,
 			privacy.p_gender,
 			privacy.p_city,
 			privacy.p_occupation,
 			privacy.p_income,
 			privacy.p_savings,
 			privacy.p_lias,
 			privacy.p_dsavings,
 			privacy.p_dlias,
 			privacy.p_following,
 			privacy.p_search
 			");
 			
 		$this->db->from('privacy');
 		$this->db->where('privacy.p_id', $id);
 		$query = $this->db->get();
 		if ($query->num_rows() == 1) {
				return $query->row();
				}
 		}
 		
 		public function create_privacy($data){
    	$data1 = get_object_vars($data);
    	$privacy = array(
    		'privacy.p_id'			=>	$data1['id'],
			'privacy.p_age'			=>	2,
			'privacy.p_gender'		=>	2,
			'privacy.p_city'		=>	2,
			'privacy.p_occupation'	=>	2,                    
			'p_income'				=>	2,
			'p_savings'				=>	2,
			'p_lias'				=>	2,
			'p_dsavings'			=>	2,
			'p_dlias'				=>	2,
			'p_following'			=>	2,
			'p_search'				=>	2		
        );

		$insert = $this->db->insert('privacy', $privacy);
        return $insert; 
    }
}
/*End of file account_model.php*/
/*Location: ./application/models/account_model.php */