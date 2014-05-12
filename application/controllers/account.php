<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php
//Save Share 2014
class Account extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		// Your own constructor code
	}
	public function index(){
		//Load Views
		$this->load->view('profile/templates/header');
		$this->load->view("account/settings/settings_layout");
		$this->load->view('profile/templates/footer');
	}

	public function sign_in(){
		$this->form_validation->set_rules('username_','Username','required|min_length[4]|trim|xss_clean|');
		$this->form_validation->set_rules('password_','Password','required|min_length[4]|max_length[128]|trim|xss_clean|callback_verify_sign_in');
		
		$this->form_validation->set_error_delimiters('<p class="text-error">','</p>');

		if($this->form_validation->run() == FALSE){
			$this->load_modal($option = 'sign_in');			
		}
		
		else{
			$this->session->set_flashdata('sign_in_succeeded', 'You were successfully signed in.');
			redirect('profile');
		}
		
	}
	public function sign_up(){
		$this->form_validation->set_rules('username','Username','required|min_length[4]|max_length[12]|is_unique[users.username]|trim|xss_clean');
		$this->form_validation->set_rules('password','Password','required|min_length[4]|max_length[128]|trim|xss_clean');
		$this->form_validation->set_rules('password_confirmation','Password Confirmation','required|min_length[4]|max_length[128]|matches[password]|trim|xss_clean');
		
		$this->form_validation->set_rules('email','Email','required|max_length[60]|valid_email|is_unique[users.email]|trim|xss_clean');
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
           if($this->account_model->create_user())
           {
		   		$this->session->set_flashdata('sign_up_succeeded', 'You were successfully signed up.');
                redirect('account/sign_in');
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
	
    public function profile_settings(){
		//Load Profile Data
	    $id = $this->session->userdata('user_id');
	    $data['profile_data'] = $this->account_model->get_userdata($id);	
		//View data
		$this->load->view('profile/templates/header');
		$this->load->view('account/settings/profile_settings', $data);
		$this->load->view('profile/templates/footer');
		
	}
    public function security_settings(){
		$this->load->view('profile/templates/header');
		$this->load->view('account/settings/security_settings');
		$this->load->view('profile/templates/footer');
    }
    
    public function privacy_settings() {
		//Load Profile Data
		$id = $this->session->userdata('user_id');
    	$data['profile_data'] = $this->account_model->get_userdata($id);
    	$data['privacy'] = $this->account_model->get_privacy_data($id);
    	//View data
    	$this->load->view('profile/templates/header');
    	$this->load->view('account/settings/privacy_settings', $data);
    	$this->load->view('profile/templates/footer');
    }
    
    public function validate_profile_settings(){
    	//Load Data
    	$id = $this->session->userdata('user_id');
	    $profile_data = get_object_vars($this->account_model->get_userdata($id));
    	
    	if($this->input->post('username_') != $profile_data['username'])
    	{
    		$this->form_validation->set_rules('username_','Username','required|min_length[4]|max_length[12]|is_unique[users.username]|trim|xss_clean');	
    	}
    	else
    	{
    		$this->form_validation->set_rules('username_','Username','required|min_length[4]|max_length[12]|trim|xss_clean');	
    	}
    	
		$this->form_validation->set_rules('password_','Password','required|min_length[4]|max_length[128]|trim|xss_clean|callback_verify_profile_settings_password');
		
		if($this->input->post('email') != $profile_data['email'])
		{
			$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]|trim|xss_clean');
		}
		else
		{
			$this->form_validation->set_rules('email','Email','required|valid_email|trim|xss_clean');
		}
		
		$this->form_validation->set_rules('birth_year','Birth year','trim|xss_clean');
		$this->form_validation->set_rules('gender','gender','trim|xss_clean');
		$this->form_validation->set_rules('city','City','trim|xss_clean');
		$this->form_validation->set_rules('occupation','Occupation','trim|xss_clean');
		$this->form_validation->set_rules('income','Income','trim|xss_clean');
		
		$this->form_validation->set_error_delimiters('<p class="text-error">','</p>');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->profile_settings();
		}
		else
		{
			if($this->account_model->change_profile_settings()){
				//Flashdata is shown in the view after a HTTP (location) redirect. It may work with a refresh as well.
				//If you load a view after setting flashdata, the message is shown the next time you load the page, therefore
				//you must use redirect() with flashdata. You can use set_message together with load();
				$this->session->set_flashdata('profile_settings_succeeded', 'Your profile settings was successfully changed.');
				redirect('profile');
			}
			else{
				//Unsuccessful update
			}
			
			/*$data['username_'] = $this->input->post('username_');
			$data['password_'] = $this->input->post('password_');
			$data['password_confirmation'] = $this->input->post('password_confirmation');
			$data['email'] = $this->input->post('email');
			$data['birth_year'] = $this->input->post('birth_year');
			$data['gender'] = $this->input->post('gender');
			$data['city'] = $this->input->post('city');
			$data['occupation'] = $this->input->post('occupation');
			$data['income'] = $this->input->post('income');
				
			$this->load->view('success',$data);*/
			
		}	
	}
	
    public function validate_security_settings(){
    	$this->form_validation->set_rules('old_password','Old Password','required|min_length[4]|max_length[128]|trim|xss_clean|callback_verify_security_settings_password');
		$this->form_validation->set_rules('new_password','New Password','required|min_length[4]|max_length[128]|trim|xss_clean');
		$this->form_validation->set_error_delimiters('<p class="text-error">','</p>');
		if($this->form_validation->run() == FALSE)
		{
			$this->security_settings();
		}
		else{
			$new_password = $this->input->post('new_password');
			
			if($this->account_model->change_security_settings($new_password)){
		
			$this->session->set_flashdata('security_settings_succeeded', 'Your security settings was successfully changed.');
			redirect('profile');
				
			}
		}
    }
    
    public function validate_privacy_settings() {
    	$id = $this->session->userdata('user_id');
	    $privacy_data = get_object_vars($this->account_model->get_privacy_data($id));
	    $this->form_validation->set_rules('gender','gender','trim|xss_clean');
	    $this->form_validation->set_rules('age','age','trim|xss_clean');
	    $this->form_validation->set_rules('city','city','trim|xss_clean');
	    $this->form_validation->set_rules('occupation','occupation','trim|xss_clean');
	    $this->form_validation->set_rules('income','income','trim|xss_clean');
	    $this->form_validation->set_rules('savings','savings','trim|xss_clean');
	    $this->form_validation->set_rules('lias','lias','trim|xss_clean');
	    //$this->form_validation->set_rules('following','following','trim|xss_clean');
	    //$this->form_validation->set_rules('search','search','trim|xss_clean');
	    
		if($this->form_validation->run() == FALSE)
		{
			$this->privacy_settings();
		}
		else 
		{
			if($this->account_model->change_privacy_settings()){
				//Flashdata is shown in the view after a HTTP (location) redirect. It may work with a refresh as well.
				//If you load a view after setting flashdata, the message is shown the next time you load the page, therefore
				//you must use redirect() with flashdata. You can use set_message together with load();
				$this->session->set_flashdata('privacy_settings_succeeded', 'Your privacy settings was successfully changed.');
				redirect('profile');
			}
			else{
				//Unsuccessful update
			}
			}
    	}
	
	//**********************************************************************************************************************************// 
	// 	This function is called by the callback rule from set_rules for password. verify_sign_in either returns TRUE or FALSE. This	//
	//	corresponds to whether the user is successfully logged in or not. If it returns FALSE, the form_validation will run FALSE and	//
	//	the login process will be unsuccessful.																							//
	//**********************************************************************************************************************************//

	public function verify_sign_in(){
	
		$username = $this->input->post('username_');
		$password = $this->input->post('password_');
		
		//Retrieve user_id from account_model. login_user returns FALSE if the username & password does not match the one in the DB.
		$user_id = $this->account_model->login_user($username,$password);
		
		//Validate user and prepare a session for user
		if($user_id){
			//Create array of user data
			$user_data = array(
				'user_id'	=>	strtolower($user_id),
				'username'	=>	$username,
				'logged_in'	=>	TRUE
			);
			//Add userdata to session
			$this->session->set_userdata($user_data);
			return TRUE;
		}
		else{
			//This is almost an ugly solution. Still uncertain on how the callback function works, but it prints
			//'Invalid username or password' if you leave the username field empy. Implying that it checked the DB
			//against an empy string as username, which is clearly wrong procedure. Not sure if this is the case,
			//but the below code will fix the error message.
			
			if ($username !=''){
				$this->form_validation->set_message('verify_sign_in', 'Invalid username or password');
				
			}
			else{
				$this->form_validation->set_message('verify_sign_in', '');
				
			}
			return FALSE;
		}
			
	}
	public function verify_profile_settings_password(){
		//Load Data
    	$id = $this->session->userdata('user_id');
	    $profile_data = get_object_vars($this->account_model->get_userdata($id));
	    
	    $username = $profile_data['username'];
		$password = $this->input->post('password_');
		
		$user_id = $this->account_model->login_user($username,$password);
		
		if($user_id){
			//Create array of user data
			$user_data = array(
				'user_id'	=>	$user_id,
				'username'	=>	$this->input->post('username_'),
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
				$this->form_validation->set_message('verify_profile_settings_password', 'Invalid password.');
				
			}
			else{
				$this->form_validation->set_message('verify_profile_settings_password', '');
				
			}
			return FALSE;
		}
	}
	public function verify_security_settings_password(){
		$username = $this->session->userdata('username');
		$password = $this->input->post('old_password');
		
		$user_id = $this->account_model->login_user($username,$password);
		
		if($user_id){
			return TRUE;
		}
		else{
		//This is almost an ugly solution. Still uncertain on how the callback function works, but it prints
		//'Invalid username or password' if you leave the username field empy. Implying that is checked the DB
		//against an empy string as username, which is clearly wrong procedure. Not sure if this is the case,
		//but the below code will fix the error message.
			if ($username !=''){
				$this->form_validation->set_message('verify_profile_settings_password', 'Invalid password.');
				
			}
			else{
				$this->form_validation->set_message('verify_profile_settings_password', '');
				
			}
		return FALSE;
		}
		
	}
		
	//**********************************************************************************************************************************//
	//This custom script will trigger the sign in modal on the start page to show. The filename is saved in the variable $data that		//		
	//is passed on to start. In start, the variable $trigger_modal will load the variable $data and a php echo function will echo   	//
	//the full pathway to the script, which will then execute and trigger the modal to show. This is neccessary to do because of 		//
	//the way the sign in component is built. The sign in modal is an external view that is loaded on the start page by CLICKING a 		//
	//button. This button triggers the modal to show. And this is exactly what this custom javascript replicates. It artificially 		//
	//CLICKS the button.																												//
	//**********************************************************************************************************************************//
	
	//I realize now that this is overkill. I can simply put the pathway in the view withtin the if statement, but this is more bad ass.
	
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
/* End of file account.php */
/* Location: ./application/controllers//account.php */