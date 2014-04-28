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
    	$follow_data['followers_name'] = $this->collect_followersname();
    	$follow_data['following_name'] = $this->collect_followingname();
    	$follow_data['no_of_followers'] = $this->count_no_of_followers();
    	$follow_data['no_of_followings'] = $this->count_no_of_followings();
    	$follow_data['testar'] = $this->testar();
    	//Load Views
    	$this->load->view('templates/header');
    	$this->load->view('profile/followers/show_followers', $follow_data);
    	$this->load->view('templates/footer');
	    	    	}
    }
    public function collect_followersname() {
    	$id = $this->session->userdata('user_id');
    	$follower_id1 = $this->follower_model->get_followersid($id);
    	$follower_id2 = get_object_vars($follower_id1);
    	return $this->follower_model->get_follower_username($follower_id2);
    }

    public function collect_followingname() {
    	$id = $this->session->userdata('user_id');
    	$following_id1 = $this->follower_model->get_followingid($id);
    	$following_id2 = get_object_vars($following_id1);
    	return $this->follower_model->get_following_username($following_id2);
    }

    public function count_no_of_followers() {
    	$id = $this->session->userdata('user_id');
    	return $this->follower_model->count_followers($id);
    }

    public function count_no_of_followings() {
    	$id = $this->session->userdata('user_id');
    	return $this->follower_model->count_followings($id);
    }
    
    public function testar() {
    	$id = $this->session->userdata('user_id');
    	return $this->follower_model->get_followersid2($id);
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