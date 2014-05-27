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
		if(!$this->is_signed_in()){
	    	redirect('account/sign_in');
    	}
    	else{
			//Load Views
			$data['thread'] = $this->forum_model->get_threads();
			
	    	$this->load->view('profile/templates/header');
	    	$this->load->view('forum/forum_layout', $data);
	    	$this->load->view('profile/templates/footer');  
    	}		       
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
				if($this->forum_model->create_thread($id)){
		           
	           		//$this->forum_model->create_message($id);
			   		//$this->session->set_flashdata('start_thread_succeeded', 'You did successfully start a thread.');
			   		redirect('forum');		           }
		           else
		           {
			           //Skriv ut ett felmeddelande. 'Gick inte att registrera dig.'
		           }
				
			}
		}
		
	public function validate_message(){ 
	    	$this->form_validation->set_rules('answer','Answer','xss_clean');
	    	
	    	$this->form_validation->set_error_delimiters('<p class="text-error">','</p>');
			
			if($this->form_validation->run() == FALSE){
				$this->index();
			}
			
			else {
					
					$id = $this->session->userdata('user_id');
					$slug= $this->forum_model->create_message($id);
					redirect("forum/$slug");			
			}
		}
		
	public function view($slug){
		if(!$this->is_signed_in()){
	    	redirect('account/sign_in');
    	}
    	else{
	    	$data['thread_item'] = $this->forum_model->get_threads($slug);
			$data['messages'] = $this->forum_model->get_messages($slug);
			$data['slug'] = $slug;
			
			//$data[] = $this->forum_model->get_username();
	
			if (empty($data['thread_item']))
			{
				show_404();
			}
		
			//$data['topic'] = $data['news_item']['topic'];
		
			$this->load->view('profile/templates/header', $data);
			$this->load->view('forum/view', $data);
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
/* End of file forum.php */
/* Location: ./application/controllers/forum.php */