<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php

class Profile extends CI_Controller{
	
	public function __construct(){
	
		parent::__construct();
            // Your own constructor code           
    }
    
    public function index(){
    
    	if(!$this->is_signed_in()){
	    	redirect('users/sign_in');
	    	//set session data 'need login' och skriv ut felmeddelande
	    	//redirect('users/login');
    	}		
    		//Load Data
    		$data1['user_info']		= 	$this->collect_userinfo();
    		$data1['economy_info']	=	$this->collect_economyinfo();
    		//Load Views
    		$this->load->view('templates/header');
	    	$this->load->view('profile/profile_layout', $data1);
	    	$this->load->view('templates/footer');
	    
    }
    public function show_settings(){
    	$this->load->view('templates/header');
    	$this->load->view('profile/settings/settings_layout');
    	$this->load->view('templates/footer');
    	    
    }
    public function show_profile_settings(){
    	//Load Profile Data
    	$id = $this->session->userdata('user_id');
    	$data['profile_data'] = $this->profile_model->get_userdata($id);
    	
    	//View data
    	$this->load->view('templates/header');
    	$this->load->view('profile/settings/profile_settings', $data);
    	$this->load->view('templates/footer');
    }
    public function validate_settings(){
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

		$this->show_profile_settings();
		}
		else
		{
           if($bla/*Modellen lyckas update info*/)
           {
           		//Skicka till profilsidan
   
           }
           else
           {
	           //Skriv ut ett felmeddelande. 'Gick inte att registrera dig.'
           }
		}	
    	
	    
    }
    
    public function show_economy(){
    	$this->load->view('templates/header');
    	$this->load->view('profile/economy/add_economy');
    	$this->load->view('templates/footer');    	    
    }
    
    public function collect_userinfo(){
    	$id = $this->session->userdata('user_id');
    	return $this->profile_model->get_userdata($id);
    }
    
    public function collect_economyinfo() {
    	$id = $this->session->userdata('user_id');
    	return $this->economy_model->get_economydata($id);
    }
    
    public function advanced_search(){
    	$this->load->view('templates/header');
    	$this->load->view('profile/search/advanced_search');
    	$this->load->view('templates/footer');    	    
    }

    //you should extend Start so this function is included 
    private function is_signed_in(){
	
		if($this->session->userdata('logged_in')){
			return TRUE;
		}
		
		else{
			return FALSE;
		}
	}

}
/* End of file profile.php */
/* Location: ./application/controllers//profile.php */