<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php
//SaveShare 2014
class Users extends CI_Controller{
	
	public function __construct()
       {
            parent::__construct();
            // Your own constructor code
       }

	public function sign_in(){
		$this->form_validation->set_rules('username_','Username','required|min_length[4]|trim|xss_clean|');
		$this->form_validation->set_rules('password_','Password','required|min_length[4]|max_length[128]|trim|xss_clean|callback_verify_credentials');
		
		$this->form_validation->set_error_delimiters('<p class="text-error">','</p>');

		if($this->form_validation->run() == FALSE){
			$this->load_modal($option = 'sign_in');			
		}
		
		else{
			redirect('profile');
		}
		
	}
	public function sign_up(){
		$this->form_validation->set_rules('username','Username','required|min_length[4]|max_length[12]|is_unique[users.username]|trim|xss_clean');
		$this->form_validation->set_rules('password','Password','required|min_length[4]|max_length[128]|trim|xss_clean');
		$this->form_validation->set_rules('password_confirmation','Password Confirmation','required|min_length[4]|max_length[128]|matches[password]|trim|xss_clean');
		
		$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]|trim|xss_clean');
		$this->form_validation->set_rules('birth_year','Birth year','trim|xss_clean');
		$this->form_validation->set_rules('gender','gender','trim|xss_clean');
		$this->form_validation->set_rules('city','City','trim|xss_clean');
		$this->form_validation->set_rules('occupation','Occupation','trim|xss_clean');
		$this->form_validation->set_rules('income','Income','trim|xss_clean');
		
		$this->form_validation->set_error_delimiters('<p class="text-error">','</p>');
		
		if($this->form_validation->run() == FALSE){

		$this->load_modal($option = 'sign_up');	
		}
		else
		{
           if($this->user_model->create_user())
           {
           		//Skriv ut ett meddelande. 'Registrering lyckades. Logga in.'
 
		   		
                redirect('users/sign_in');
           }
           else
           {
	           //Skriv ut ett felmeddelande. 'Gick inte att registrera dig.'
           }
		}	
	}
	
	public function sign_out(){
        //Unset user data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->sess_destroy();
        
         //Set message
        $this->session->set_flashdata('logged_out', 'You have been logged out');
        redirect('start');
    }
	
	//**********************************************************************************************************************************// 
	// 	This function is called by the callback rule from set_rules for password. verify_credentials either returns TRUE or FALSE. This	//
	//	corresponds to whether the user is successfully logged in or not. If it returns FALSE, the form_validation will run FALSE and	//
	//	the login process will be unsuccessful.																							//
	//**********************************************************************************************************************************//

	public function verify_credentials(){
		//Retrieve username and password from the form.
		$username = $this->input->post('username_');
		$password = $this->input->post('password_');
		//Retrieve user_id from user_model. login_user returns FALSE if the username & password does not match the one in the DB.
		$user_id = $this->user_model->login_user($username,$password);
		
		//Validate user and prepare a session for user
		if($user_id){
			//Create array of user data
			$user_data = array(
				'user_id'	=>	$user_id,
				'username'	=>	$username,
				'logged_in'	=>	TRUE
			);
			//Add userdata to session
			$this->session->set_userdata($user_data);
			return TRUE;
		}
		else{
			//This is almost an ugly solution. Still uncertain on how the callback function works, but it prints
			//'Invalid username or password' if you leave the username field empy. Implying that is checked the DB
			//against an empy string as username, which is clearly wrong procedure. Not sure if this is the case,
			//but the below code will fix the error message.
			
			if ($username !=''){
				$this->form_validation->set_message('verify_credentials', 'Invalid username or password');
				
			}
			else{
				$this->form_validation->set_message('verify_credentials', '');
				
			}
			return FALSE;
			
			
		}
			
	}
		
	//**********************************************************************************************************************************//
	//This custom script will trigger the sign in modal on the start page to show. The filename is saved in the variable $data that		//		
	//is passed on to start. In start, the variable $trigger_modal will load the variable $data and a php echo function will echo ""; 	//								//the full pathway to the script, which will then execute and trigger the modal to show. This is neccessary do to because of 		//								//the way the sign in component is built. The sign in modal is a external view that is loaded on the start page by CLICKING a 		//								//button. This button triggers the modal to show. And this is exactly what this custom javascript replicates. It artificially 		//								//CLICKS the button.																												//
	//**********************************************************************************************************************************//
	
	public function load_modal($option){
	
		if($option == 'sign_in'){
			$data['pathway'] = $option . '.js';
			$this->load->view('start',$data);
			
		}
		
		if($option == 'sign_up'){
			$data['pathway'] = $option . '.js';
			$this->load->view('start',$data);
		
		}	
	}	
}	
/* End of file users.php */
/* Location: ./application/controllers//users.php */