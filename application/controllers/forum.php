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
    	$this->load->view('forum/forum');
    	$this->load->view('profile/templates/footer');    	       
	}	

			
}	
/* End of file economy.php */
/* Location: ./application/controllers//economy.php */