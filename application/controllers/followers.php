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
    	$follow_data['followers_name'] = $this->get_followernames();
    	$follow_data['following_name'] = $this->get_followingnames();
    	//Load Views
    	$this->load->view('profile/templates/header');
    	$this->load->view('profile/followers/show_followers', $follow_data);
    	$this->load->view('profile/templates/footer');
	    	    	}
    }
    
    public function get_followernames() {
    	$id = $this->session->userdata('user_id');
		$id_array = $this->follower_model->get_followersid($id);
		$name_array = $this->follower_model->get_follower_username($id_array);
		return $name_array;
	}
	
	public function get_followingnames() {
    	$id = $this->session->userdata('user_id');
		$id_array = $this->follower_model->get_followingid($id);
		$name_array = $this->follower_model->get_following_username($id_array);
		return $name_array;
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