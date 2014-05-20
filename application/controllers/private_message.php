<?php ob_start(); ?>
<?php

class Private_message extends CI_Controller{
	public function index(){
		if(!$this->is_signed_in()){
			redirect('account/sign_in');
			//set session data 'need login' och skriv ut felmeddelande
			//redirect('users/login');
		}
		else{
			$this->load->view('profile/templates/header');
			$this->load->view('private_message/pm_layout');
			$this->load->view('profile/templates/footer');
		}
	}
	
	public function conversation(){
	
	$participant_b = strtolower($this->input->post('participant_b'));
	
	//If conversation does not exist AND participant_B is not empty AND initiating conversation is successfull, do: something 
	//else: 
	if(!$this->private_message_model->conversation_exists($participant_b)){
		if(!empty($participant_b)){
			if($this->private_message_model->create_conversation($participant_b)){
			//do something
			}
		}
	}
	else{
	}
		
	}
	public function incoming_message(){
		
	}
	public function outgoing_message(){
		
	}
	public function view_message(){
		$this->load->view('private_message/show_message');
		
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