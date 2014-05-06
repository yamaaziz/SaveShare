<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php
//Save Share 2014
class Forum extends CI_Controller{
	
	public function __construct()
       {
            parent::__construct();
            // Your own constructor code
       }
	   
	public function index(){		
		//Load Views
    	$this->load->view('profile/templates/header');
    	$this->load->view('forum/forum_layout');
    	$this->load->view('profile/templates/footer');    	       
	}	


	public function validate_forum(){ 
	    	$this->form_validation->set_rules('topic','Topic','trim|xss_clean');
	    	$this->form_validation->set_rules('message','Message','xss_clean');
	    	
	    	
	    	$this->form_validation->set_error_delimiters('<p class="text-error">','</p>');
			
			if($this->form_validation->run() == FALSE)
			{
				$this->forum();
			}
			
			else {
					$id = $this->session->userdata('user_id');
					if($this->forum_model->create_thread($id))
		           {
				   		//$this->session->set_flashdata('start_thread_succeeded', 'You did successfully start a thread.');
		                redirect('forum');
		           }
		           else
		           {
			           //Skriv ut ett felmeddelande. 'Gick inte att registrera dig.'
		           }
				
			}
			
		}
		
		

			
}	
/* End of file forum.php */
/* Location: ./application/controllers/forum.php */