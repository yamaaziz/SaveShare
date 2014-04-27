<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php
//Save Share 2014
class Profile extends CI_Controller{
	
	public function __construct(){
	
		parent::__construct();
            // Your own constructor code           
    }

    public function index(){
    
    	if(!$this->is_signed_in()){
	    	redirect('account/sign_in');
    	}
    		//Load Data
    		$id = $this->get_id();
    		$data1['user_info']		= 	$this->collect_userinfo($id);
    		$data1['economy_info']	=	$this->collect_economyinfo($id);
    		//Load Views
    		$this->load->view('profile/templates/header');
	    	$this->load->view('profile/profile_layout', $data1);
	    	$this->load->view('profile/templates/footer');    	    
    }
    
    private function collect_userinfo($id) {	
    	return $this->profile_model->get_userdata($id);
    }
     
	private function collect_economyinfo($id) {
		return $this->economy_model->get_economydata($id);
    }
    	
 	private function get_id(){
	 	return $id = $this->session->userdata('user_id');
 	}

<<<<<<< HEAD
		$this->show_profile_settings();
		}
		else
		{
           if($bla/*Modellen lyckas update info*/)
           {
           		//Skicka till profilsidan
   
           }
           else
           {
	           //Skriv ut ett felmeddelande. 'Gick inte att registrera dig.'
           }
		}	
 
    }

    public function advanced_search(){ 
    	
    	
    	$this->form_validation->set_rules('username','Username','trim|xss_clean');
    	$this->form_validation->set_rules('birth_year','birth_year','trim|xss_clean');
    	$this->form_validation->set_rules('gender','Gender','trim|xss_clean');
    	$this->form_validation->set_rules('city','City','trim|xss_clean');
    	$this->form_validation->set_rules('income','Income','trim|xss_clean');
    	
    	$this->form_validation->set_error_delimiters('<p class="text-error">','</p>');
		
		
		if($this->form_validation->run() == FALSE){
				
				$this->load->view('templates/header');
		    	$this->load->view('profile/search/advanced_search');
		    	$this->load->view('templates/footer');
				}
		else
		{

    	
    	if($this->search_model->adv_search()){
           		
           
           $data1['user_info']		= 	$this->collect_user();
		   $data1['economy_info']	=	$this->collect_economy();
    		//Load Views
			$this->load->view('templates/header');
	    	$this->load->view('profile/search/search_result', $data1);
	    	$this->load->view('templates/footer'); 
	    	
           }
           else
           {
           $this->load->view('templates/header');
		   $this->load->view('profile/search/no_find');
	    	$this->load->view('templates/footer');
           }
           
        }
    		
             	    
    }      
	    		    
    
    
    public function collect_user() {
    	$id = $this->search_model->adv_search();
    	$var = get_object_vars($id);
        // Pass the results to the view.
    	return $this->profile_model->get_userdata($var['id']);
    }
     
	public function collect_economy() {	
	//Hämta username och userid
	$id = $this->search_model->adv_search();
	$var = get_object_vars($id);
	return $this->economy_model->get_economydata($var['id']);

    }

    //you should extend Start so this function is included 
=======
>>>>>>> yamas-gren
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