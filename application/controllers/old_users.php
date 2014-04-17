<?php
//SaveShare 2014
class Users extends CI_Controller{
	
	public function __construct()
       {
            parent::__construct();
            // Your own constructor code
       }

	public function login(){
		
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		
		$this->form_validation->set_error_delimiters('<p class="text-error">');

		if($this->form_validation->run() == FALSE){
		
			$this->redirect_to_login();			
		}
		
		else{
			//Retrieve what user posted in the form. Strings corresponds to the field names in the form.
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			//Retrieve user_id from user_model
			$user_id = $this->user_model->login_user($username,$password);
			
			//Validate user
			if($user_id){
				//Create array of user data
				$user_data = array(
					'user_id'	=>	$user_id,
					'username'	=>	$username,
					'logged_in'	=>	TRUE
				);
				//Add userdata to session
				$this->session->set_userdata($user_data);
				redirect('start/load_profile');
			}
			else{
				//Set error message
				$this->session->set_flashdata('login_failed', 'Invalid username or password'); //Kanske ändra till set_message
				$this->redirect_to_login();
			}
			
		}
		
	}
	
	public function redirect_to_login(){
		//Skicka med scriptet och kör det i start
		//<script>$('#sign_in_form').modal('show');</script>
		$data['trigger_modal']='custom_login_script.js';
		$this->load->view('start', $data);
		
		

	}

}
/* End of file users.php */
/* Location: ./application/controllers//users.php */