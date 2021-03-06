<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php
//Save Share 2014
class Economy extends CI_Controller{
	
	public function __construct()
       {
            parent::__construct();
            // Your own constructor code
       }
	   
	public function index(){
		if(!$this->is_signed_in()){
	    	redirect('account/sign_in');
    	}
    	else{
	    	//Load Data
			$data['economy_data']=$this->collect_economyinfo();
			//Load Views
	    	$this->load->view('profile/templates/header');
	    	$this->load->view('economy/add_economy_layout', $data);
	    	$this->load->view('profile/templates/footer'); 
    	}       
	}
	
		
	public function submit_economy(){
		//Set rules
		$this->form_validation->set_rules('total_savings','Total savings','trim|xss_clean|numeric');
		$this->form_validation->set_rules('funds','Funds','trim|xss_clean|numeric');
		$this->form_validation->set_rules('shares','Shares','trim|xss_clean|numeric');
		$this->form_validation->set_rules('bonds','Bonds','trim|xss_clean|numeric');
		$this->form_validation->set_rules('commodities','Commodities','trim|xss_clean|numeric');
		$this->form_validation->set_rules('properties','Properties','trim|xss_clean|numeric');
		$this->form_validation->set_rules('saving_account','Bank account','trim|xss_clean|numeric');
		$this->form_validation->set_rules('other_savings','Other savings','trim|xss_clean|numeric');
		$this->form_validation->set_rules('total_liabilities','Total liabilities','trim|xss_clean|numeric');
		$this->form_validation->set_rules('housing_loan','Housing loan','trim|xss_clean|numeric');
		$this->form_validation->set_rules('construction_loan','Construction loan','trim|xss_clean|numeric');
		$this->form_validation->set_rules('private_loan','Private loan','trim|xss_clean|numeric');
		$this->form_validation->set_rules('student_loan','Student loan','trim|xss_clean|numeric');
		$this->form_validation->set_rules('senior_loan','Senior loan','trim|xss_clean|numeric');
		$this->form_validation->set_rules('other_liabilities','Other liabilities','trim|xss_clean|numeric');
		
		
		$this->form_validation->set_error_delimiters('<p class="text-error">','</p>');
		
		
		if($this->form_validation->run() == FALSE){		
				$data['economy_data']	=	$this->collect_economyinfo();
												
				$this->load->view('profile/templates/header');
				$this->load->view('economy/add_economy_layout', $data);
				$this->load->view('profile/templates/footer');
				}
		else
		{
			$id = $this->session->userdata('user_id');
			if($this->economy_model->set_economy($id))
			{	$this->session->set_flashdata('economy_succeeded', 'Your economy was successfully submitted.');
				$username = $this->get_username();
				redirect("profile/$username");
			}
			else
			{
				//Skriv ut fel meddelande
			}
               
		}	
	}
	
	private function collect_economyinfo() {
		$id = $this->session->userdata('user_id');
		return $this->economy_model->get_economydata($id);
	}
	private function get_username(){
	 	$username = $this->session->userdata('username');
	 	return $username;
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
/* End of file economy.php */
/* Location: ./application/controllers//economy.php */