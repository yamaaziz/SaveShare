<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php
//Save Share 2014
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
    	$data28['following_info3'] = $this->collect_followersname2();
    	$data28['following_info4'] = $this->collect_followingname2();
    	$data28['no_of_followers'] = $this->count_no_of_followers();
    	$data28['no_of_followings'] = $this->count_no_of_followings();
    	//Load Views
    	$this->load->view('templates/header');
    	$this->load->view('profile/followers/show_followers', $data28);
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
    	$id = $this->session->userdata('user_id');
    	return $this->follower_model->get_following_username2($id);
    }

    public function collect_followingname2() {
    	$id = $this->session->userdata('user_id');
    	$following_id1 = $this->follower_model->get_followingdata($id);
    	$following_id2 = get_object_vars($following_id1);
    	return $this->follower_model->get_following_username2($following_id2);
    }
    

    public function collect_followersname() {
    	$id = $this->session->userdata('user_id');
    	return $this->follower_model->get_follower_username2($id);
    }

    public function collect_followersname2() {
    	$id = $this->session->userdata('user_id');
    	$follower_id1 = $this->follower_model->get_followersdata($id);
    	$follower_id2 = get_object_vars($follower_id1);
    	return $this->follower_model->get_follower_username2($follower_id2);
    }
    
    
    public function count_no_of_followers() {
    	$id = $this->session->userdata('user_id');
    	return $this->follower_model->count_followers($id);
    }
    
    public function count_no_of_followings() {
    	$id = $this->session->userdata('user_id');
    	return $this->follower_model->count_followings($id);
    } 

	public function show_followersname() {
		//Load Data
		$data28['following_info3'] = $this->collect_followersname();
		$data28['following_info4'] = $this->collect_followingname();
    	//Load Views
		$this->load->view('profile/templates/header');
		$this->load->view('profile/economy/show_followers', $data28);
		$this->load->view('profile/templates/footer');
	}

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