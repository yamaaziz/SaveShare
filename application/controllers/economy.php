<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php
//SaveShare 2014
class Economy extends CI_Controller{
	
	public function __construct()
       {
            parent::__construct();
            // Your own constructor code
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
				//Gör nått ...
				redirect('profile/economy');
				}
		else
		{
		 if($this->economy_model->set_economy()){
           		
           redirect('profile');
           }
           else
           {
	           //Skriv ut ett felmeddelande. 'Gick inte att registrera dig.'
           }
               
		}	
	}
				
}	
/* End of file users.php */
/* Location: ./application/controllers//users.php */