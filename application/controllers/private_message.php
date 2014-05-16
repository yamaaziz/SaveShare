<?php

class Private_message extends CI_Controller{
	public function index(){
		if(!$this->is_signed_in()){
			redirect('users/sign_in');
			//set session data 'need login' och skriv ut felmeddelande
			//redirect('users/login');
		}
		else{
			$this->load->view('profile/templates/header');
			$this->load->view('private_message/pm_layout');
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
/* End of file private_message.php */
/* Location: ./application/controllers/private_message.php */