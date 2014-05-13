<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php
//Save Share 2014
class Profile extends CI_Controller{
	
	public function __construct(){
	
		parent::__construct();
            // Your own constructor code           
    }

    public function index($slug = ''){
    
    	if(!$this->is_signed_in()){
	    	redirect('account/sign_in');
    	}
    	else{
    		if (empty($slug))
			{
			show_404();
			}
    		//Load Data
    		//convert username to id
    		$id = $this->account_model->get_id($slug);
    		$data1['user_info']		= 	$this->collect_userinfo($id);
    		$data1['economy_info']	=	$this->collect_economyinfo($id);
    		$data1['followers_name'] = $this->get_followernames();
    		$data1['following_name'] = $this->get_followingnames();
    		$data1['privacy'] = $this->account_model->get_privacy_data($id);

    		//Load Views
    		$this->load->view('profile/templates/header');
	    	$this->load->view('profile/profile_layout', $data1);
	    	$this->load->view('profile/templates/footer');
	    }    	    
    }
    
    private function collect_userinfo($id) {	
    	return $this->account_model->get_userdata($id);
    }
     
	private function collect_economyinfo($id) {
		return $this->economy_model->get_economydata($id);
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
	
	public function follow() {
		$id = $this->session->userdata('user_id');
		$profile_id = $this->get_visiting_id();
		//$profile_id = 20;
		echo '????????????????????????????????????????????????????????????';
		$this->follower_model->follow($id, $profile_id);
		echo '!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!';
		$username = $this->session->userdata('username');
		redirect('profile/$username');
	}
	
	public function unfollow() {
		$id = $this->session->userdata('user_id');
		$profile_id = $this->get_visiting_id();
		//$profile_id = 20;
		$this->follower_model->unfollow($id, $profile_id);
		$username = $this->session->userdata('username');
		redirect('profile/$username');
	}
	
	public function get_visiting_id() {
		$username = $this->session->userdata('username');
		$id = $this->account_model->get_id($username);
		return $id;
	}

 	private function get_id(){
	 	return $id = $this->session->userdata('user_id');
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
/* End of file profile.php */
/* Location: ./application/controllers//profile.php */