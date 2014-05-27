<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php
//Save Share 2014
class Home extends CI_Controller{

	public function index(){
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