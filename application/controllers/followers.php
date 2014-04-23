<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php

class Followers extends CI_Controller{
	
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
        $data28['following_info1'] = $this->collect_followers();
    	$data28['following_info2'] = $this->collect_following();
    	//Load Views
    	$this->load->view('templates/header');
    	$this->load->view('profile/economy/show_followers', $data28);
    	$this->load->view('templates/footer');
	    	    	}
    }

    public function collect_following() {
    	$id = $this->session->userdata('user_id');
    	return $this->follower_model->get_followingdata($id);
    }
    
    public function collect_followers() {
    	$id = $this->session->userdata('user_id');
    	return $this->follower_model->get_followersdata($id);
    }

    public function collect_followingname() {
    	$name = $this->session->userdata('username');
    	return $this->follower_model->get_following_username($id);
    }

    public function collect_followersname() {
    	$name = $this->session->userdata('username');
    	return $this->follower_model->get_follower_username($id);
    }

    public function show_followersname() {
        //Load Data
        $data28['following_info3'] = $this->collect_followersname();
    	$data28['following_info4'] = $this->collect_followingname();
    	//Load Views
    	$this->load->view('templates/header');
    	$this->load->view('profile/economy/show_followers', $data28);
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
/* End of file followers.php */
/* Location: ./application/controllers/followers.php */