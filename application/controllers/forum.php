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
		$data['thread'] = $this->forum_model->get_threads();
		
    	$this->load->view('profile/templates/header');
    	$this->load->view('forum/forum_layout', $data);
    	$this->load->view('profile/templates/footer');    	       
	}	


	public function validate_forum(){ 
	    	$this->form_validation->set_rules('topic','Topic','required|trim|xss_clean');
	    	$this->form_validation->set_rules('message','Message','required|trim|xss_clean');
	    	$this->form_validation->set_error_delimiters('<p class="text-error">','</p>');
			
			if($this->form_validation->run() == FALSE)
			{
				$this->index();
				}
			
			else {
					$id = $this->session->userdata('user_id');
					if($this->forum_model->create_thread($id))
		           {
		           
		           		$this->forum_model->create_message($id);
				   		//$this->session->set_flashdata('start_thread_succeeded', 'You did successfully start a thread.');
		                $this->index();
		           }
		           else
		           {
			           //Skriv ut ett felmeddelande. 'Gick inte att registrera dig.'
		           }
				
			}
			
		}
		
	public function view($slug){
		$data['news_item'] = $this->forum_model->get_threads($slug);
	
		if (empty($data['news_item']))
		{
			show_404();
		}
	
		$data['topic'] = $data['news_item']['topic'];
	
		$this->load->view('profile/templates/header', $data);
		$this->load->view('forum/view', $data);
		$this->load->view('profile/templates/footer');
		
		}

			
}	
/* End of file forum.php */
/* Location: ./application/controllers/forum.php */