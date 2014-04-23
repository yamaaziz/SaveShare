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
    	else { 			
    		//Load Data
    		$data1['user_info']		= 	$this->collect_userinfo();
    		$data1['economy_info']	=	$this->collect_economyinfo();
    		//Load Views
    		$this->load->view('templates/header');
	    	$this->load->view('profile/profile_layout', $data1);
<<<<<<< HEAD
	    	$this->load->view('templates/footer');    
	    	}	    
    }
    
    public function show_settings(){
=======
	    	$this->load->view('templates/footer');
	    	    	}
    }

    public function show_settings() {
>>>>>>> pr/2
    	$this->load->view('templates/header');
    	$this->load->view('profile/settings/settings_layout');
    	$this->load->view('templates/footer');   
    }
    
<<<<<<< HEAD
    public function show_economy(){
     	$data1['economy_data']	=	$this->collect_economyinfo();
=======
    public function show_economy() {
>>>>>>> pr/2
    	$this->load->view('templates/header');
    	$this->load->view('profile/economy/add_economy', $data1);
    	$this->load->view('templates/footer');    	    
    }
    
    public function collect_userinfo() {
    	$id = $this->session->userdata('user_id');
    	return $this->profile_model->get_userdata($id);
    }
    
    public function collect_economyinfo() {
    	$id = $this->session->userdata('user_id');
    	return $this->economy_model->get_economydata($id);
    }
    
    public function advanced_search() {
    	$this->load->view('templates/header');
    	$this->load->view('profile/search/advanced_search');
    	$this->load->view('templates/footer');    	    
    }

    //you should extend Start so this function is included 
    private function is_signed_in() {
	
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