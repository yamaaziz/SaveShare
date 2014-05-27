<?php ob_start(); ?>
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
    		global $data;
    		
    		$this->session->set_userdata('slug', $slug);
    		$id = $this->account_model->get_id($slug);
    		$data['user_info']		= 	$this->collect_userinfo($id);
    		$data['economy_info']	=	$this->collect_economyinfo($id);
    		$data['followers_name'] = $this->get_followernames();
    		$data['following_name'] = $this->get_followingnames();
    		$data['privacy'] = $this->account_model->get_privacy_data($id);
    		$data['slug'] = $slug;

    		//Load Views
    		$this->load->view('profile/templates/header');
	    	$this->load->view('profile/profile_layout', $data);
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
		$username = $this->session->userdata('slug');
		$profile_id = $this->get_visiting_id();
		$this->follower_model->follow($id, $profile_id);
		redirect("profile/" . $username);
	}
	
	public function unfollow() {
		$id = $this->session->userdata('user_id');
		$username = $this->session->userdata('slug');
		$profile_id = $this->get_visiting_id();
		$this->follower_model->unfollow($id, $profile_id);
		redirect("profile/" . $username);
	}
	
	public function get_visiting_id() {
		$username = $this->session->userdata('slug');
		$id = $this->account_model->get_id($username);
		return $id;
	}

 	private function get_id(){
	 	return $id = $this->session->userdata('user_id');
 	}
 	
 	public function home(){
 		if(!$this->is_signed_in()){
	    	redirect('account/sign_in');
    	}
    	else{
    		$this->load->view('profile/templates/header');
			$this->load->view('home/home');
			$this->load->view('profile/templates/footer');	
    	}
	}
	public function contact(){
		if(!$this->is_signed_in()){
	    	redirect('account/sign_in');
    	}
    	else{
    		$this->load->view('profile/templates/header');
			$this->load->view('home/home');
			$this->load->view('profile/templates/footer');	
    	}
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